@section('page-title')Sign up @endsection

@extends('layouts.app') @section('content')
<div class="container">
  <div class="row">
    <div class="well auth-box col-sm-6 col-sm-offset-3  col-md-4 col-md-offset-4">
      <form class="form-horizontal" role="form" method="POST" action="{{ route('post_register_validator', $invite->uid) }}">
        {!! csrf_field() !!}
        <h2 class="page-title">{!! trans('register.register_as_validator') !!}</h2>
        <div>
          <input type="hidden" value="{{ $invite->id }}" name="invite">

          <input id="institution" readonly="true" required name="institution" class="{{ $errors->has('email') ? ' has-error' : '' }}" type="text" placeholder="{!! trans('global.institution_singular') !!}" value="{{ $invite->institution->user->name }}">
          @if ($errors->has('name'))
          <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
          @endif
          <input id="name" required name="name" class="{{ $errors->has('name') ? ' has-error' : '' }}" type="text" placeholder="{!! trans('reg-profile.name') !!}" value="{{ old('name') }}">
          @if ($errors->has('surname'))
          <span class="help-block">
            <strong>{{ $errors->first('surname') }}</strong>
          </span>
          @endif
          <input id="surname" required name="surname" class="{{ $errors->has('surname') ? ' has-error' : '' }}" type="text" placeholder="{!! trans('reg-profile.surname') !!}" value="{{ old('surname') }}">
          @if ($errors->has('department'))
          <span class="help-block">
            <strong>{{ $errors->first('department') }}</strong>
          </span>
          @endif
          <input id="department" required name="department" class="{{ $errors->has('department') ? ' has-error' : '' }}" type="text" placeholder="{!! trans('reg-profile.validator_department') !!}" value="{{ old('department') }}">
          @if ($errors->has('position'))
          <span class="help-block">
            <strong>{{ $errors->first('position') }}</strong>
          </span>
          @endif
          <input id="position" required name="position" class="{{ $errors->has('position') ? ' has-error' : '' }}" type="text" placeholder="{!! trans('reg-profile.position') !!}" value="{{ old('position') }}">
          <hr>
          @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
          <input id="email" required readonly="true" name="email" class="{{ $errors->has('email') ? ' has-error' : '' }}" type="text" placeholder="{!! trans('reg-profile.email') !!}" value="{{ old('email', $email) }}">
          @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
          <input id="password" required name="password" class="{{ $errors->has('password') ? ' has-error' : '' }}" type="password" placeholder="{!! trans('reg-profile.password') !!}">
          <input id="password" name="password_confirm" class="{{ $errors->has('password_confirm') ? ' has-error' : '' }}" type="password" placeholder="{!! trans('reg-profile.confirm_password') !!}">

          <div class="checkbox checkbox-agree @if ($errors->has('terms')) alert alert-danger @endif">
            <label>
              <input required type="checkbox" name="terms"/> {!! trans('reg-profile.i_agree_with') !!} <a target="_blank" href="{{ url('/terms') }}">{!! trans('reg-profile.the_terms_of_use') !!}</a>
            </label>
          </div>
          <div class="checkbox checkbox-agree @if ($errors->has('privacy_policy')) alert alert-danger @endif">
            <label>
              <input required type="checkbox" name="privacy_policy"/> {!! trans('reg-profile.i_agree_with') !!} <a target="_blank" href="{{ url('/privacy-policy') }}">{!! trans('reg-profile.the_privacy_policy') !!}</a>
            </label>
          </div>
          <div class="checkbox checkbox-agree @if ($errors->has('legal_warning')) alert alert-danger @endif">
            <label>
              <input required type="checkbox" name="legal_warning"/> {!! trans('reg-profile.i_agree_with') !!} <a target="_blank" href="{{ url('/legal-warning') }}">{!! trans('reg-profile.the_legal_warning') !!}</a>
            </label>
          </div>
          <div class="checkbox checkbox-agree @if ($errors->has('cookies')) alert alert-danger @endif">
            <label>
              <input required type="checkbox" name="cookies"/> {!! trans('reg-profile.i_agree_with') !!} <a target="_blank" href="{{ url('/cookies') }}">{!! trans('reg-profile.the_cookies') !!}</a>
            </label>
          </div>

          <div class="captcha">
            {!! app('captcha')->display(); !!}
          </div>
          <button type="submit" class="btn btn-primary">
            {!! trans('global.register_btn') !!}
          </button>
        </div>
      </form>
      <div>
        <br>
        <p>
          <a class="btn btn-link" href="{{ url('/password/reset') }}">{!! trans('reg-profile.forgot_password') !!}</a> | <a class="btn btn-link" href="{{ url('/auth/login') }}">{!! trans('global.login_btn') !!}</a>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
