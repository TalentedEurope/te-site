@extends('layouts.app')

@section('page-title')Register @endsection

@section('content')
<div class="container">
  <div class="row">
        @if (isset($request))
          <div class="alert alert-success col-sm-6 col-sm-offset-3  col-md-4 col-md-offset-4" role="alert">
            You have been invited by {{ $request->validator_name }}
          </div>
        @endif

    <div class="well auth-box col-sm-6 col-sm-offset-3  col-md-4 col-md-offset-4">
      <form class="form-horizontal" role="form" method="POST"
      @if (isset($request))
      action="{{ url('/register?req_id='.$request->id) }}">
      @else
      action="{{ url('/register') }}">
      @endif
        {!! csrf_field() !!}
        <h2 class="page-title">Register</h2>


        @if ($errors->count())
          <div class="alert alert-danger" role="alert">
            {!! trans('register.there_have_been_some_errors') !!}
          </div>
        @endif
        <div>
          @if ($errors->has('type'))
          <span class="help-block">
            <strong>{{ $errors->first('type') }}</strong>
          </span>
          @endif
          <p><strong>{!! trans('register.i_am_a') !!}:</strong></p>
          <div class="user-type @if ($errors->has('type')) alert alert-danger @endif">
            <div class="radio-check" @if (isset($request)) style="display:none" @endif>
              <input id="Student" type="radio" name="type" value="student"             @if (old('type') == "student") checked @endif>
              <label for="Student">
                <i class="fa fa-user" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="{!! trans_choice('global.student', 1) !!}"></i>
              </label>
            </div>

            <div class="radio-check">
              <input id="Institution" type="radio" name="type" value="institution" @if (old('type') == "institution" || isset($request) ) checked @endif>
              <label for="Institution" data-toggle="tooltip" data-placement="bottom" title="{!! trans_choice('global.institution', 1) !!}"><i class="fa fa-university" aria-hidden="true"></i></label>
            </div>

            <div class="radio-check" @if (isset($request)) style="display:none" @endif>
              <input id="Company" type="radio" name="type" value="company" @if (old('type') == "company") checked @endif>
              <label for="Company"><i data-toggle="tooltip" data-placement="bottom" title="{!! trans_choice('global.company', 1) !!}" class="fa fa-building" aria-hidden="true"></i></label>
            </div>
          </div>
          @if ($errors->has('name'))
          <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
          @endif
          <input @if (old('type') && old('type') != "institution") style="display: none" @endif style="display: none" id="name" name="name" class="{{ $errors->has('name') ? ' has-error' : '' }}" type="text" placeholder="{!! trans('reg-profile.name') !!}" value="{{ old('name') }}">

          @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
          <input required id="email"  name="email" class="{{ $errors->has('email') ? ' has-error' : '' }}" type="text" placeholder="{!! trans('reg-profile.email') !!}" value="{{ old('email') }}">

          @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
          <input required id="password"  name="password" class="{{ $errors->has('password') ? ' has-error' : '' }}" type="password" placeholder="{!! trans('reg-profile.password') !!}">
          <input required id="password" name="password_confirmation" class="{{ $errors->has('password') ? ' has-error' : '' }}" type="password" placeholder="{!! trans('reg-profile.confirm_password') !!}">


          @if ($errors->has('terms'))
          <span class="help-block">
            <strong>{{ $errors->first('terms') }}</strong>
          </span>
          @endif
          <div class="checkbox @if ($errors->has('terms')) alert alert-danger @endif">
            <label>
              <input required type="checkbox"  name="terms"></input> {!! trans('reg-profile.i_agree_with') !!} <a target="_blank" href="{{ url('/terms') }}">{!! trans('reg-profile.the_terms_of_use') !!}</a>
            </label>
          </div>
          <p class="text-center"><em>{!! trans('register.all_fields_are_required') !!}</em></p>

          <button type="submit" class="btn btn-primary">
            {!! trans('global.register_btn') !!}
          </button>
        </div>
      </form>
      <div>
        <br>
        <p>
          <a class="btn btn-link" href="{{ url('/password/reset') }}">{!! trans('reg-profile.forgot_password') !!}</a> | <a class="btn btn-link" href="{{ url('/login') }}">{!! trans('global.login_btn') !!}</a>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script>
jQuery(document).ready(function() {
  if (jQuery("input#Institution").is(':checked')) {
      jQuery("input#name").show().attr('required',true);
  }

  jQuery(".user-type input").change(function() {
    var type = jQuery(this).attr("id");
    if (type == "Institution") {
      jQuery("input#name").show().attr('required',true);
    } else {
      jQuery("input#name").hide().removeAttr('required');
    }
  });

});
</script>
@endsection
