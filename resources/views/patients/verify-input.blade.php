@extends('layouts.master')

@section('title', 'PCHC Patient Portal Authorization')

@section('content')
  <div class="row">
    <div class="col-xs-12">
      {!! Form::open(array(
        'action' => 'PatientController@getVerify',
        'method' => 'get',
        'class' => 'form-horizontal'
      )) !!}
        <div class="form-group">
          <label class="control-label col-sm-3">Authorization Token</label>
          <div class="col-sm-9">
            {!! Form::text('token', NULL, array(
              'placeholder' => 'Authorization Token',
              'class' => 'form-control',
              'required' => TRUE
            )) !!}
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
