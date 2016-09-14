@extends('layouts.app') @section('content')
<div class="container">
  <div class="row">
    <div class="well auth-box col-sm-6 col-sm-offset-3  col-md-4 col-md-offset-4">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        {!! csrf_field() !!}
        <h2 class="page-title">Register as validator</h2>
        <div>
          <input id="institution" readonly="true" required name="institution" class="{{ $errors->has('email') ? ' has-error' : '' }}" type="text" placeholder="Institution" value="Institution: IES Puerto de la Cruz">
          @if ($errors->has('name'))
          <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
          @endif
          <input id="name" required name="name" class="{{ $errors->has('name') ? ' has-error' : '' }}" type="text" placeholder="Name" value="{{ old('name') }}">
          @if ($errors->has('surname'))
          <span class="help-block">
            <strong>{{ $errors->first('surname') }}</strong>
          </span>
          @endif
          <input id="surname" required name="surname" class="{{ $errors->has('surname') ? ' has-error' : '' }}" type="text" placeholder="Surname" value="{{ old('surname') }}">
          @if ($errors->has('department'))
          <span class="help-block">
            <strong>{{ $errors->first('department') }}</strong>
          </span>
          @endif
          <input id="department" required name="department" class="{{ $errors->has('department') ? ' has-error' : '' }}" type="text" placeholder="Department" value="{{ old('department') }}">
          @if ($errors->has('position'))
          <span class="help-block">
            <strong>{{ $errors->first('position') }}</strong>
          </span>
          @endif
          <input id="position" required name="position" class="{{ $errors->has('position') ? ' has-error' : '' }}" type="text" placeholder="Position" value="{{ old('position') }}">
          <hr>
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
