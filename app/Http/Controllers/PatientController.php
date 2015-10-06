<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Patient;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PatientController extends Controller
{
    public function __construct()
    {
      define('MAX_ATTEMPTS',5);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        //
        return view('patients.verify-input');
    }

    public function getVerify(Request $request, $token = NULL)
    {
        if(empty($token)){
          $getToken = $request->get('token');
          if(!empty($getToken)){
            return redirect()->action('PatientController@getVerify', [$getToken]);
          }
          return view('patients.verify-input');
        }

        //
        $patient = Patient::where('token', $token)->first();
        if(empty($patient)){
          return redirect()->action('PatientController@getVerify')->withErrors('Authorization token does not exist. Please enter below:');
        }

        $time_auth_sent = Carbon::createFromFormat('Y-m-d H:i:s', $patient->auth_sent);
        $time_auth_expires = Carbon::createFromFormat('Y-m-d H:i:s', $patient->auth_sent)->addDays(5);

        $auth_active = Carbon::now()->between($time_auth_sent, $time_auth_expires);

        if(!$auth_active){
          return redirect()->action('PatientController@getVerify')->withErrors('Your online authorization has expired. Please call PCHC at 207-945-5247 to continue your Patient Portal Authorization.');
        }

        if($patient->attempts >= MAX_ATTEMPTS){
          return redirect()->action('PatientController@getVerify')->withErrors('You have incorrectly attemted to verify your identity too many times. Please call PCHC at 207-945-5247 to continue your Patient Portal Authorization.');
        }

        return view('patients.verify', ['token' => $token, 'patient' => $patient, 'time_auth_expires' => $time_auth_expires]);
    }

    public function postVerify(Request $request, $token)
    {
      $this->validate($request, [
           'email' => 'required',
           'dob_year' => 'required',
           'dob_month' => 'required',
           'dob_day' => 'required',
       ]);

      $patient = Patient::where('token', $token)->firstOrFail();

      // Increment the number of attempts made
      $patient->attempts++;
      $patient->save();

      $dob = Carbon::createFromDate($request->dob_year, $request->dob_month, $request->dob_day)->toDateString();

      if($request->email == $patient->email && $dob == $patient->dob){
        $request->session()->put('patient_id', $patient->id);
        return redirect()->action('PatientController@getAuthorize', [$token]);
      } else {
        return redirect()->action('PatientController@getVerify', [$token])->withErrors('Email and Date of Birth do not match.');
      }
    }

    public function getAuthorize(Request $request, $token)
    {
      if(!$request->session()->has('patient_id')){
        return redirect()->action('PatientController@getVerify', [$token])->withErrors('Please enter your email and date of birth to verify your identity.');
      }

      $patient = Patient::find( $request->session()->get('patient_id') );

      if($token != $patient->token) {
        return redirect()->action('PatientController@getVerify', [$token])->withErrors('Tokens do not match.');
      }

      return view('patients.authorize', ['token' => $token, 'patient' => $patient]);
    }

    public function postAuthorize(Request $request, $token)
    {
      $this->validate($request, [
           'auth_confirmed' => 'accepted',
       ]);

      $patient = Patient::find($request->id);
      $patient->auth_confirmed = TRUE;
      $patient->save();

      return redirect()->action('PatientController@getConfirm', [$token]);
    }

    public function getConfirm(Request $request, $token)
    {
      if(!$request->session()->has('patient_id')){
        return redirect()->action('PatientController@getVerify', [$token])->withErrors('Please enter your email and date of birth to verify your identity.');
      }

      $patient = Patient::find( $request->session()->get('patient_id') );

      $request->session()->flush();

      return view('patients.confirm', ['patient' => $patient]);
    }

    public function postConfirm(Request $request)
    {
      $this->validate($request, [
           'auth_confirmed' => 'accepted',
       ]);

      $patient = Patient::find($request->id);
      $patient->auth_confirmed = TRUE;
      $patient->save();

      var_dump($patient);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getShow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
