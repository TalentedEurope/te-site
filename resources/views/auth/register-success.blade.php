@extends('layouts.app')

@section('page-title') {!! trans('register.register_success') !!} @endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="well auth-box col-sm-6 col-sm-offset-3  col-md-4 col-md-offset-4">
      <h2>{!! trans('register.thank_you_for_signing_up') !!}</h2>

      <p>{!! trans('register.you_will_receive_an_email') !!}</p>
      <p>{!! trans('register.confirmation_email_may_take_few_minutes') !!}</p>

      <p>
        <a href="{{ url('/') }}" class="btn btn-primary">
          {!! trans('register.go_back_to_home') !!}
        </a>
      </p>

      @if ($type == "company")
      <p>
        <a href="{{ url('/search') }}" class="btn btn-primary">
          {!! trans('register.search_students') !!}
        </a>
      </p>
      @endif

      @if ($type == "student")
      <p>
        <a href="{{ url('/search') }}" class="btn btn-primary">
          {!! trans('register.search_companies') !!}
        </a>
      </p>
      @endif

    </div>
  </div>
</div>
@endsection
