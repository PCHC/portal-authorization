@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
    {!! Form::open(array(
      'action' => array(
        'PatientController@postAuthorize'
      )
    )) !!}
    <div class="title">Authorize</div>

    <div class="form-control">
      {!! Form::button('Submit', array('type'=>'submit')) !!}
    </div>
    {!! Form::close() !!}
@endsection
