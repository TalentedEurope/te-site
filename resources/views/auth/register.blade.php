@extends('layouts.app') @section('content')
<div class="container">
  <div class="row">
    <div class="well auth-box col-sm-6 col-sm-offset-3  col-md-4 col-md-offset-4">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        {!! csrf_field() !!}
        <h2 class="page-title">Register</h2>
        <div>
          <p><strong>I am a:</strong></p>
          <div class="user-type">
            <div class="radio-check">
              <input id="Student" type="radio" name="userType" value="student">
              <label for="Student">
                <i class="fa fa-user" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Student"></i>
              </label>
            </div>
            <div class="radio-check">
              <input id="Institution" type="radio" name="userType" value="institution">
              <label for="Institution" data-toggle="tooltip" data-placement="bottom" title="Institution"><i class="fa fa-university" aria-hidden="true"></i></label>
            </div>
            <div class="radio-check">
              <input id="Company" type="radio" name="userType" value="company">
              <label for="Company"><i data-toggle="tooltip" data-placement="bottom" title="Company" class="fa fa-building" aria-hidden="true"></i></label>
            </div>
          </div>
          @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
          <input id="email" required name="email" class="{{ $errors->has('email') ? ' has-error' : '' }}" type="text" placeholder="Email" value="{{ old('email') }}">
          @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
          <input id="password" required name="password" class="{{ $errors->has('password') ? ' has-error' : '' }}" type="password" placeholder="Password">
          <input id="password" name="password_confirmation" class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" type="password" placeholder="Confirm password">
          <div class="checkbox">
            <label>
              <input type="checkbox" required name="remember"></input> I agree with <a target="_blank" href="{{ url('/terms') }}"> the terms of use</a>
            </label>
          </div>
          <div class="captcha">
            {!! app('captcha')->display(); !!}
          </div>
          <button type="submit" class="btn btn-primary">
            Sign up
          </button>
        </div>
      </form>
      <div>
        <br>
        <p>
          <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a> | <a class="btn btn-link" href="{{ url('/auth/login') }}">Sign in</a>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
