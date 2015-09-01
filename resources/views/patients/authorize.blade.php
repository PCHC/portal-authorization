@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2">
      <h1>Authorization Form</h1>
      {!! Form::open(array(
        'action' => array(
          'PatientController@postAuthorize', $token
        ),
        'class' => 'form-horizontal'
      )) !!}
      {!! Form::hidden('id', $patient->id) !!}
      <p class="lead">{{ $patient->first_name }} {{ $patient->last_name }}<br />
      <small>Date of Birth: {{ Carbon::createFromFormat('Y-m-d', $patient->dob)->toFormattedDateString() }}</small></p>

      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

      <div class="form-group">
        <div class="col-xs-11 col-xs-offset-1">
          <label>
            {!! Form::checkbox('auth_confirmed', TRUE) !!} I authorize this thing.
          </label>
         </div>
       </div>

      <div class="form-group">
        <div class="col-xs-11 col-xs-offset-1">
          {!! Form::button('Submit', array(
            'type'=>'submit',
            'class'=>'btn btn-primary'
          )) !!}
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
@endsection
