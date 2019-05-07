@extends('layouts.app')

@section('page-title') {!! trans('register.register') !!} @endsection

@section('content')
<div class="container">
  <div class="row">
        @if (isset($request))
          <div class="alert alert-success col-sm-6 col-sm-offset-3  col-md-4 col-md-offset-4" role="alert">
            {!! trans('register.invited_by') !!} {{ $request->validator_name }}
          </div>
        @endif

    @if (app('request')->input('see_more'))
      <div class="alert alert-warning col-sm-6 col-sm-offset-3  col-md-4 col-md-offset-4" role="alert">
        {!! trans('reg-profile.to_see_more_details') !!}.
      </div>
    @endif

    <div class="well auth-box col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
      <form class="form-horizontal" role="form" method="POST"
      @if (isset($request))
      action="{{ url('/register?req_id='.$request->id) }}">
      @else
      action="{{ url('/register') }}">
      @endif
        {!! csrf_field() !!}
        <h2 class="page-title">{!! trans('register.register') !!}</h2>

        <div class="social-auth-box">
          <p>
                <a href="{{ url('/auth/google') }}" class="btn btn-default">
                <i class="fa fa-google-plus"></i> {{ trans('global.register_google') }}
                </a>
          </p>
          <p>
            <a href="{{ url('/auth/facebook') }}" class="btn btn-default">
              <i class="fa fa-facebook"></i> {{ trans('global.register_fb') }}
            </a>
          </p>
          <p>
            <a href="{{ url('/auth/twitter') }}" class="btn btn-default">
              <i class="fa fa-twitter"></i> {{ trans('global.register_tw') }}
            </a>
          </p>

          <h2> {{ trans('global.or') }}</h2>
        </div>

        @if ($errors->count())
          <div class="alert alert-danger" role="alert">
            {!! trans('register.there_have_been_some_errors') !!}
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
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
              <input id="Student" type="radio" name="type" value="student" @if (old('type') == "student") checked @endif>
              <label for="Student"><i class="fa fa-user" aria-hidden="true"></i></label>
            </div>

            <div class="radio-check">
              <input id="Institution" type="radio" name="type" value="institution" @if (old('type') == "institution" || isset($request) ) checked @endif>
              <label for="Institution"><i class="fa fa-university" aria-hidden="true"></i></label>
            </div>

            <div class="radio-check" @if (isset($request)) style="display:none" @endif>
              <input id="Validator" type="radio" name="type" value="validator" @if (old('type') == "validator" || isset($request) ) checked @endif>
              <label for="Validator"><i class="fa fa-certificate" aria-hidden="true"></i></label>
            </div>

            <div class="radio-check" @if (isset($request)) style="display:none" @endif>
              <input id="Company" type="radio" name="type" value="company" @if (old('type') == "company") checked @endif>
              <label for="Company"><i class="fa fa-building" aria-hidden="true"></i></label>
            </div>
          </div>

          <div class="user-type-text" id="user_type_text_student" @if (isset($request) || old('type') != "student") style="display:none" @endif>{!! trans('global.student_graduate') !!}</div>
          <div class="user-type-text" id="user_type_text_institution" @if (old('type') != "institution") style="display:none" @endif>{!! trans('global.institution_singular') !!}</div>
          <div class="user-type-text" id="user_type_text_validator" @if (isset($request) || old('type') != "validator") style="display:none" @endif>{!! trans('global.referee_singular') !!}</div>
          <div class="user-type-text" id="user_type_text_company" @if (isset($request) || old('type') != "company") style="display:none" @endif>{!! trans_choice('global.company', 1) !!}</div>

          @if ($errors->has('name'))
          <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
          @endif
          <input @if (old('type') && old('type') != "institution") style="display: none" @endif style="display: none" id="name" name="name" class="{{ $errors->has('name') ? ' has-error' : '' }}" type="text" placeholder="{!! trans('reg-profile.name') !!}" value="{{ old('name') }}">

          @if ($errors->has('surname'))
          <span class="help-block">
            <strong>{{ $errors->first('surname') }}</strong>
          </span>
          @endif
          <input @if (old('type') && old('type') != "institution") style="display: none" @endif style="display: none" id="surname" name="surname" class="{{ $errors->has('surname') ? ' has-error' : '' }}" type="text" placeholder="{!! trans('reg-profile.surname') !!}" value="{{ old('surname') }}">


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
          <input required id="password_confirmation" name="password_confirmation" class="{{ $errors->has('password') ? ' has-error' : '' }}" type="password" placeholder="{!! trans('reg-profile.confirm_password') !!}">

          @if ($errors->has('terms'))
          <span class="help-block">
            <strong>{{ $errors->first('terms') }}</strong>
          </span>
          @endif

          <div id="institution-info" style="display:none">
            <hr/>
              @if ($errors->has('institution'))
              <span class="help-block">
                <strong>{{ $errors->first('institution') }}</strong>
              </span>
              @endif
              <input id="institution"  name="institution" class="{{ $errors->has('institution') ? ' has-error' : '' }}" type="text" placeholder="{!! trans('global.institution_singular') !!}" value="{{ old('institution') }}">

              <input name="invite_institution" id="invite_institution" type="hidden" value="{{ old('invite_institution') }} "/>
              <div id="no-institution">
                <p><strong>{{ trans('reg-profile.cant_find_institution_set_mail') }}</strong></p>

                @if ($errors->has('institution_name'))
                <span class="help-block">
                  <strong>{{ $errors->first('institution_name') }}</strong>
                </span>
                @endif
                <input id="institution_name"  name="institution_name" class="{{ $errors->has('institution_name') ? ' has-error' : '' }}" type="text" placeholder="{!! trans('reg-profile.institution_name') !!}" value="{{ old('institution_name') }}">

                @if ($errors->has('institution_email'))
                <span class="help-block">
                  <strong>{{ $errors->first('institution_email') }}</strong>
                </span>
                @endif
                <input id="institution_email"  name="institution_email" class="{{ $errors->has('institution_email') ? ' has-error' : '' }}" type="text" placeholder="{!! trans('reg-profile.institution_email') !!}" value="{{ old('institution_email') }}">
              </div>

          </div>



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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.3/jquery.autocomplete.min.js"></script>
<script>
jQuery(document).ready(function() {
  if (jQuery("input#Institution").is(':checked')) {
    jQuery("input#name").attr('placeholder', "{!! trans('reg-profile.institution_name') !!}").show().attr('required',true);
    jQuery("input#email").attr('placeholder', "{!! trans('reg-profile.institution_email') !!}")
  }

  if (jQuery("input#Validator").is(':checked')) {
    jQuery("#institution-info").show();
    jQuery("#institution_name").val(jQuery("#institution").val());
    jQuery("#institution").attr('required',true);
    jQuery("input#name").show().attr('required',true);
    jQuery("input#surname").show().attr('required',true);
  }

  jQuery(".user-type input").change(function() {
    var type = jQuery(this).attr("id");
    jQuery("#institution-info").hide();
    jQuery("input#name").hide().attr('placeholder', "{!! trans('reg-profile.name') !!}").removeAttr('required');
    jQuery("input#email").attr('placeholder', "{!! trans('reg-profile.email') !!}")
    jQuery("#no-institution input").attr('required', false);
    if (type == "Institution") {
      jQuery("input#name").attr('placeholder', "{!! trans('reg-profile.institution_name') !!}").show().attr('required',true);
      jQuery("input#email").attr('placeholder', "{!! trans('reg-profile.institution_email') !!}")
      jQuery("input#surname").hide().removeAttr('required');
      jQuery("#institution").removeAttr('required');
    } else if (type == "Validator") {
      jQuery("#institution-info").show();
      jQuery("#institution").attr('required',true);
      jQuery("input#name").show().attr('required',true);
      jQuery("input#surname").show().attr('required',true);
    } else {
      jQuery("input#name").hide().removeAttr('required');
      jQuery("input#surname").hide().removeAttr('required');
      jQuery("#institution").removeAttr('required');
    }
    showUserTypeText()
  });

  function showUserTypeText() {
    $(".user-type-text").hide();
    if ($(".user-type input:checked").length > 0) {
      var type = $(".user-type input:checked").attr("id").toLowerCase();
      $("#user_type_text_" + type).show();
    }
  }

  showUserTypeText();

  if (jQuery("#institution").val() == "") {
    jQuery("#no-institution").hide();
    jQuery("#no-institution input").attr('required',false);
  }

  jQuery("form input").blur(function() {
    if (jQuery("input#Validator").is(':checked') && jQuery("#institution_name").val() != "")
      jQuery("#institution").val(jQuery("#institution_name").val())
  });

  jQuery("#institution").autocomplete({
      autoSelectFirst: true,
      minChars: 3,
      lookup: function (query, done) {
          jQuery("#institution_name").val(query);
          jQuery.get("/api/register/institutions?name="+query, function(res) {
              var sug = res.map(function(item) {
                  return { value: item.name, data: item.id }
              });
              if (sug.length == 0) {
                jQuery("#invite_institution").val("invite");
                jQuery("#no-institution").show();
                jQuery("#no-institution input").attr('required',true);
              } else {
                jQuery("#invite_institution").val("");
                jQuery("#no-institution").hide();
                jQuery("#no-institution input").attr('required',false);
              }
              done({
                  suggestions: sug,
              });
          }).fail(function() {
              jQuery("#invite_institution").val("invite");
              jQuery("#no-institution").show();
              jQuery("#no-institution input").attr('required',true);
              done({
                suggestions: []
              })
          });
      }
  }).blur(function() {
    var query = $(this).val();
    if (query.length > 3) {
      jQuery.get("/api/register/institutions?name="+query, function(res) {
        if (res.length == 0) {
            jQuery("#invite_institution").val("invite");
            jQuery("#no-institution").show();
            jQuery("#no-institution input").attr('required',true);
        } else {
            jQuery("#institution").val(res[0].name);
        }
      });
    }

  });
});
</script>
@endsection
