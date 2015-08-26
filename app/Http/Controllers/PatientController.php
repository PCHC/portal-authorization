<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Patient;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        //
        return view('welcome');
    }

    public function getConfirm(Request $request, $token)
    {
        //
        $patient = Patient::where('token', $token)->firstOrFail();
        return view('patients.confirm', ['token' => $token, 'patient' => $patient]);
    }

    public function postConfirm(Request $request, $token)
    {
        //
        $patient = Patient::where('token', $token)->firstOrFail();

        // Increment the number of attempts made
        $patient->attempts++;
        $patient->save();

        if($request->email == $patient->email){
          return view('patients.authorize', ['token' => $token, 'patient' => $patient]);
        } else {
          return view('patients.confirm', ['token' => $token, 'patient' => $patient])->withErrors('Email does not match');
        }
    }

    public function postAuthorize(Request $request)
    {
        //
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
