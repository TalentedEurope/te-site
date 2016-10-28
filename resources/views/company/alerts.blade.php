@section('page-title') My alerts @endsection

@section('meta')
  <meta id="token" content="{{ $token }}" />
@endsection

@extends('layouts.app') @section('content')
<div class="container alerts">
  <div class="row">
    <h1 class="page-title">My Alerts</h1>
    <div class="v-container">
      <alerts></alerts>
    </div>
  </div>
</div>
@endsection
