@extends('layouts.master')

@section('title', 'PCHC Patient Portal Authorization')

@section('content')
  <div class="row">
    <div class="col-xs-12">
      <h2>Patient Verification</h2>
      <div class="panel panel-primary">
        <div class="panel-body">
          Please complete this section by <strong>{{ $time_auth_expires->toDayDateTimeString() }}</strong>
        </div>
      </div>

      @include('patients.attempts')
      {!! Form::open(array(
        'action' => array(
          'PatientController@postVerify', $token
        ),
        'class' => 'form-horizontal'
      )) !!}
        <div class="form-group">
          <label class="control-label col-sm-3">Authorization Token</label>
          <div class="col-sm-9">
            <p class="form-control-static">{{ $token }}</p>
          </div>
        </div>
        <div class="form-group">
          {!! Form::label('email', 'Email Address', array(
            'class' => 'control-label col-sm-3',
          ) ) !!}
          <div class="col-sm-9">
            {!! Form::email('email', Input::old('email'), array(
              'placeholder' => 'example@example.com',
              'class' => 'form-control',
              'required' => TRUE
            )) !!}
          </div>
        </div>

        <div class="form-group">
          {!! Form::label('dob', 'Date of Birth', array(
            'class' => 'control-label col-sm-3',
          ) ) !!}
          <div class="col-sm-9">
            <div class="row">
              <div class="col-xs-4">
                {!! Form::selectRange('dob_year', 2015, 1915, NULL, array(
                  'class' => 'form-control',
                  'placeholder' => 'Year',
                  'required' => TRUE
                )) !!}
              </div>
              <div class="col-xs-4">
                {!! Form::selectMonth('dob_month', NULL, array(
                  'class' => 'form-control',
                  'placeholder' => 'Month',
                  'required' => TRUE
                )) !!}
              </div>
              <div class="col-xs-4">
                {!! Form::selectRange('dob_day', 01, 31, NULL, array(
                  'class' => 'form-control',
                  'placeholder' => 'Day',
                  'required' => TRUE
                )) !!}
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-9 col-sm-offset-3">
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
