@extends('layouts.app')
@section('page-title') {!! trans('reset-password.reset_password') !!} @endsection

<!-- Main Content -->
@section('content')
<div class="container">
  <div class="row">
    <div class="well auth-box col-sm-6 col-sm-offset-2  col-md-4 col-md-offset-4">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
        {!! csrf_field() !!}
        <h2 class="page-title">{!! trans('reset-password.reset_password') !!}</h2>
        <div>
          @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
          <input id="email" name="email" class="{{ $errors->has('email') ? ' has-error' : '' }}" type="text" placeholder="{!! trans('reg-profile.email') !!}" value="{{ old('email') }}">
          <button type="submit" class="btn btn-primary">
            {!! trans('reset-password.send_password_reset') !!}
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
