@if ($patient->attempts >= 4)
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>One verification attempt remaining</strong>
</div>
@endif

<div class="progress">
  <div class="progress-bar {{ ($patient->attempts >= 4) ? 'progress-bar-danger' : '' }}" role="progressbar" aria-valuenow="{{ $patient->attempts }}" aria-valuemin="1" aria-valuemax="5" style="min-width: 15em; width: {{ $patient->attempts/MAX_ATTEMPTS*100 }}%;">
    <strong>Verification attempt {{ $patient->attempts }} of {{ MAX_ATTEMPTS }}.</strong>
  </div>
</div>
