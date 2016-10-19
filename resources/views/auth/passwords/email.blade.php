@extends('layouts.app')
@section('page-title') Reset Password @endsection

<!-- Main Content -->
@section('content')
<div class="container">
  <div class="row">
    <div class="well auth-box col-sm-6 col-sm-offset-2  col-md-4 col-md-offset-4">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
        {!! csrf_field() !!}
        <h2 class="page-title">Reset password</h2>
        <div>
          @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
          <input id="email" name="email" class="{{ $errors->has('email') ? ' has-error' : '' }}" type="text" placeholder="email" value="{{ old('email') }}">
          <button type="submit" class="btn btn-primary">
            Send password reset link
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
