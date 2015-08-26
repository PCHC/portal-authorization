@extends('layouts.master')

@section('title', 'PCHC Patient Portal Authorization')

@section('content')
  <div class="row">
    <div class="col-xs-10 col-xs-offset-1">
      <h1>PCHC Patient Portal Authorization</h1>
      {!! Form::open(array(
        'action' => array(
          'PatientController@postConfirm', $token
        ),
        'class' => 'form-horizontal'
      )) !!}
        <p class="lead">{{ $patient->first_name }} {{ $patient->last_name }}</p>
        <div class="form-group">
          {!! Form::label('email', 'Email Address', array(
            'class' => 'control-label col-sm-2',
          ) ) !!}
          <div class="col-sm-10">
            {!! Form::text('email', NULL, array(
              'placeholder' => 'example@example.com',
              'class' => 'form-control',
            )) !!}
          </div>
        </div>

        <div class="form-group">
          {!! Form::label('dob', 'Date of Birth', array(
            'class' => 'control-label col-sm-2',
          ) ) !!}
          <div class="col-sm-10">
            <select name="dob_year" class="form-control col-xs-4">
              <option>Year</option>
            </select>
            <select name="dob_month" class="form-control col-xs-4">
              <option>Month</option>
            </select>
            <select name="dob_day" class="form-control col-xs-4">
              <option>Day</option>
            </select>
            {!! Form::date('dob', \Carbon\Carbon::now(), array(
              'class' => 'form-control',
            )) !!}
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-10 col-sm-offset-2">
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
