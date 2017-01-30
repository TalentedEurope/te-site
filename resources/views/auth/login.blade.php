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
                <h2 class="page-title">{!! trans('global.login_btn') !!}</h2>
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
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Sign in
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
