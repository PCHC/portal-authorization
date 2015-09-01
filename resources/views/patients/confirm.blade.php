@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2">
      <h1>Confirmation</h1>
      <p class="lead">{{ $patient->first_name }} {{ $patient->last_name }}<br />
      <small>Date of Birth: {{ Carbon::createFromFormat('Y-m-d', $patient->dob)->toFormattedDateString() }}</small></p>

      <p>Thank you for signing the authorization form.</p>
    </div>
  </div>
@endsection
