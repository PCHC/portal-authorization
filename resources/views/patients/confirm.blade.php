@extends('layouts.master')

@section('title', 'Patient Portal Authorization Confirmation')

@section('content')
  <div class="row">
    <div class="col-xs-12">
      <h1>Confirmation</h1>
      <p class="lead">{{ $patient->first_name }} {{ $patient->last_name }}<br />
      <small>Date of Birth: {{ Carbon::createFromFormat('Y-m-d', $patient->dob)->toFormattedDateString() }}</small></p>

      <p>Thank you for signing the authorization form.</p>
    </div>
  </div>
@endsection
