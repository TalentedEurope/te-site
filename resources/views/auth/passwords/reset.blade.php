@extends('layouts.app')

@section('page-title') {!! trans('reset-password.reset_password') !!} @endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="well auth-box col-sm-6 col-sm-offset-3  col-md-4 col-md-offset-4">
      <div class="">
        @if (isset($_GET['email']))
          <h2 class="page-title">{!! trans('reset-password.set_password') !!}</h2>
        @else
          <h2 class="page-title">{!! trans('reset-password.reset_password') !!}</h2>
        @endif

        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
            {!! csrf_field() !!}
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label class="hidden col-md-4 control-label">{!! trans('reg-profile.email') !!}</label>
              <div class="col-sm-12">
                <input type="email" @if (isset($_GET['email'])) readonly @endif class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="{!! trans('reg-profile.email') !!}">
                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label class="hidden  col-md-4 control-label">{!! trans('reg-profile.new_password') !!}</label>
              <div class="col-sm-12">
                <input type="password" class="form-control" name="password" placeholder="{!! trans('reg-profile.new_password') !!}">
                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              <label class="hidden col-md-4 control-label">{!! trans('reg-profile.repeat_new_password') !!}</label>
              <div class="col-sm-12">
                <input type="password" class="form-control" name="password_confirmation" placeholder="{!! trans('reg-profile.repeat_new_password') !!}">
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

                  @if (isset($_GET['email']))
                    <i class="fa fa-btn fa-refresh"></i> {!! trans('email.institution_account_created_action_4') !!}
                  @else
                    <i class="fa fa-btn fa-refresh"></i> {!! trans('reset-password.reset_password') !!}
                  @endif

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
