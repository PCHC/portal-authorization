@extends('layouts.master')

@section('title', 'AUTHORIZATION for Secure Website Communication – PCHC')

@section('content')
  <div class="row">
    <div class="col-xs-12">
      <h2>Authorization Form</h2>
      {!! Form::open(array(
        'action' => array(
          'PatientController@postAuthorize', $token
        ),
        'class' => 'form-horizontal'
      )) !!}
      {!! Form::hidden('id', $patient->id) !!}
      <p class="lead">Patient Name: {{ $patient->first_name }} {{ $patient->last_name }}<br />
      <small>Date of Birth: {{ Carbon::createFromFormat('Y-m-d', $patient->dob)->toFormattedDateString() }}</small></p>

      <p>By signing this authorization form, I give permission for my provider to manage my medical information for the following purposes:</p>

      <ul>
        <li>Allow me to access to my medical records via eHealth, a secure website</li>
      </ul>

      <p>I understand that my Penobscot Community Health Care (PCHC) provider uses computers and other electronic systems to manage and store my medical records and that these systems help my provider give me high-quality, cost-effective care.</p>

      <ul>
        <li>I understand that the use of my provider’s electronic system is not intended for urgent messages or to provide emergency support in life threatening or critical situations. </li>
        <li>I understand that either my provider or I may choose to stop the use of email communication at any time by contacting the other in writing, by fax or by email. </li>
        <li>I understand I am responsible for changing my user name and/or password at any time I feel it is no longer confidential. </li>
        <li>I understand that I am must tell my provider if my e-mail address changes to ensure the correct e-mail address is listed in my medical record.</li>
      </ul>

      <p>My provider has assured me that all electronic transmissions of medical information follow the required security standards in order to maintain the confidentiality and integrity of my medical information and prevent unauthorized access. I understand I am responsible for the security of my user name and my password. These are needed to access my medical record.</p>

      <p>I authorize my provider to send my medical records to the email address I provide below and any email address I provide in the future, and not to any unauthorized third parties.</p>

      <p>Before signing this Authorization Form, I was made aware of PCHC’s Notice of Privacy Practices. I have been given the opportunity to read the Notice of Privacy Practices or had it explained to me.</p>

      <p>This Authorization is active until canceled in writing on paper or online. <strong>Parent and legal guardian access to a minor patient’s portal is automatically restricted after age 11.</strong> By signing this form, I do not in any way waive my physician-patient privileges.</p>
      <ul>
        <li>I understand that I may obtain a copy of this authorization at any time.</li>
      </ul>

      <div class="well">
      <div class="form-group">
        <div class="col-xs-12">
          <label class="checkbox-inline">
             {!! Form::checkbox('auth_confirmed', TRUE) !!} <strong>I have read this form and had all of my questions answered about using email messaging to establish communication with PCHC providers.<br><br>
             I understand the terms outlined in this form, and I consent to the use of email and other methods of communication with PCHC providers.</strong>
          </label>
         </div>
       </div>
      </div>

      <div class="form-group">
        <div class="col-xs-12">
          {!! Form::button('Submit', array(
            'type'=>'submit',
            'class'=>'btn btn-primary'
          )) !!}
        </div>
      </div>
      {!! Form::close() !!}

      @include('patients.instructions')
    </div>
  </div>
@endsection
