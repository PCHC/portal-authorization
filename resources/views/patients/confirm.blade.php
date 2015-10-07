@extends('layouts.master')

@section('title', 'Patient Portal Authorization Confirmation')

@section('content')
  <div class="row">
    <div class="col-xs-12">
      <h2>Authorization Confirmation</h2>
      <p class="lead">{{ $patient->first_name }} {{ $patient->last_name }}<br />
      <small>Date of Birth: {{ Carbon::createFromFormat('Y-m-d', $patient->dob)->toFormattedDateString() }}</small></p>

      <p>Thank you for signing the authorization form.</p>

      @include('patients.instructions')
    </div>
  </div>
@endsection
