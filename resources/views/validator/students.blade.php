@extends('layouts.app')

@section('page-title')My students @endsection

@section('content')

<div class="container">
  <div class="row">
    <h1 class="page-title">My students</h1>
    @if (!Auth::user()->userable->canValidate() && Auth::user()->userable->institution)
    <div class="alert alert-warning">
      {{ Auth::user()->userable->institution->user->name }} hasn't complete filling it's profile. Until this process is complete you cannot validate any student
    </div>
    @endif
    </div>
    <div class="v-container">
      <students-validation></students-validation>
    </div>
  </div>
</div>
@endsection
