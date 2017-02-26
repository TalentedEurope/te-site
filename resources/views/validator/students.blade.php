@extends('layouts.app')

@section('page-title')My students @endsection

@section('content')

<div class="container">
  <div class="row">
    <h1 class="page-title">My students</h1>
    @if (!Auth::user()->userable->canValidate())
    <div class="alert alert-warning">
      Your institution hasn't complete filling it's profile. Until this process is complete you cannot validate any student
    </div>
    @endif
    </div>
    <div class="v-container">
      <students-validation></students-validation>
    </div>
  </div>
</div>
@endsection
