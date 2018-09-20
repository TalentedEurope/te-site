@extends('layouts.app')
@section('page-title') {!! trans('global.login_btn') !!} @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="well auth-box col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {!! csrf_field() !!}
                <div class="avatar-placeholder">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <h2 class="page-title">{!! trans('login.login_title') !!}</h2>

                <div class="social-auth-box">
                  <p>
                    <a href="{{ url('/auth/facebook') }}" class="btn btn-default">
                      <i class="fa fa-facebook"></i> {{ trans('global.login_fb') }}
                    </a>
                  </p>
                  <p>
                    <a href="{{ url('/auth/twitter') }}" class="btn btn-default">
                      <i class="fa fa-twitter"></i> {{ trans('global.login_tw') }}
                    </a>
                  </p>

                  <h2> {{ trans('global.or') }}</h2>
                </div>

                <div>
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span> @endif
                    <input id="email" name="email" class="{{ $errors->has('email') ? ' has-error' : '' }}" type="text" placeholder="{!! trans('reg-profile.email') !!}" value="{{ old('email') }}"> @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span> @endif
                    <input id="password" name="password" class="{{ $errors->has('password') ? ' has-error' : '' }}" type="password" placeholder="{!! trans('reg-profile.password') !!}">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> {!! trans('login.remember_me') !!}
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        {!! trans('login.login_btn') !!}
                    </button>
                </div>
            </form>
            <div>
                <br/>
                <p>
                  <a class="btn btn-link" href="{{ url('/password/reset') }}">{!! trans('reg-profile.forgot_password') !!}</a> | <a class="btn btn-link" href="{{ url('/register') }}">{!! trans('global.register_btn') !!}</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
