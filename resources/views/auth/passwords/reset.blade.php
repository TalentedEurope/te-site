@extends('layouts.app')

@section('page-title') Reset Password @endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="well auth-box col-sm-6 col-sm-offset-3  col-md-4 col-md-offset-4">
      <div class="">
        <h2 class="page-title">Reset Password</h2>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
            {!! csrf_field() !!}
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label class="hidden col-md-4 control-label">{!! trans('reg-profile.email') !!}</label>
              <div class="col-sm-12">
                <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="{!! trans('reg-profile.email') !!}">
                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label class="hidden  col-md-4 control-label">New Password</label>
              <div class="col-sm-12">
                <input type="password" class="form-control" name="password" placeholder="New Password">
                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              <label class="hidden col-md-4 control-label">Confirm New Password</label>
              <div class="col-sm-12">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm new password">
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-btn fa-refresh"></i> Reset Password
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
