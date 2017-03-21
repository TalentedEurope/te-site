@extends('layouts.app')

@section('page-title') {!! trans('validators.my_students') !!} @endsection

@section('content')

<div class="container">
  <div class="row">
    <h1 class="page-title col-sm-12">{!! trans('validators.my_students') !!}</h1>
    @if (!Auth::user()->userable->canValidate() && Auth::user()->userable->institution)
    <div class="alert alert-warning">
      {{ Auth::user()->userable->institution->user->name }} {!! trans('validators.user_hasnt_complete_filling_its_profile') !!}
    </div>
    @endif
    </div>
    <div class="v-container">
      <students-validation></students-validation>
    </div>
  </div>
</div>
@endsection
