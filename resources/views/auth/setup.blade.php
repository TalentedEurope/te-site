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

    <div class="well auth-box col-sm-6 col-sm-offset-3  col-md-4 col-md-offset-4">
      <form class="form-horizontal" role="form" method="POST"
      @if (isset($request))
      action="{{ url('/register?req_id='.$request->id) }}">
      @else
      action="{{ url('/setup') }}">
      @endif
        {!! csrf_field() !!}
        <h2 class="page-title">{!! trans('register.complete_register') !!}</h2>


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
              <label for="Institution" data-toggle="tooltip" data-placement="bottom" title="{!! trans('global.institution_singular') !!}"><i class="fa fa-university" aria-hidden="true"></i></label>
            </div>

            <div class="radio-check">
              <input id="Validator" type="radio" name="type" value="validator" @if (old('type') == "validator" || isset($request) ) checked @endif>
              <label for="Validator" data-toggle="tooltip" data-placement="bottom" title="{!! trans('validators.validators') !!}"><i class="fa fa-certificate" aria-hidden="true"></i></label>
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

          @if ($errors->has('surname'))
          <span class="help-block">
            <strong>{{ $errors->first('surname') }}</strong>
          </span>
          @endif
          <input @if (old('type') && old('type') != "institution") style="display: none" @endif style="display: none" id="surname" name="surname" class="{{ $errors->has('surname') ? ' has-error' : '' }}" type="text" placeholder="{!! trans('reg-profile.surname') !!}" value="{{ old('surname') }}">

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
                <input id="institution_name"  name="institution_name" class="{{ $errors->has('institution_name') ? ' has-error' : '' }}" type="text" placeholder="{!! trans('reg-profile.name') !!}" value="{{ old('institution_name') }}">

                @if ($errors->has('institution_email'))
                <span class="help-block">
                  <strong>{{ $errors->first('institution_email') }}</strong>
                </span>
                @endif
                <input id="institution_email"  name="institution_email" class="{{ $errors->has('institution_email') ? ' has-error' : '' }}" type="text" placeholder="{!! trans('reg-profile.email') !!}" value="{{ old('institution_email') }}">
              </div>

          </div>



          @if ($errors->has('terms'))
          <span class="help-block">
            <strong>{{ $errors->first('terms') }}</strong>
          </span>
          @endif
          <div class="text-center @if ($errors->has('terms')) alert alert-danger @endif">
            <label>
              <input required type="checkbox"  name="terms"></input> {!! trans('reg-profile.i_agree_with') !!} <a target="_blank" href="{{ url('/terms') }}">{!! trans('reg-profile.the_terms_of_use') !!}</a>
            </label>
          </div>

          <button type="submit" class="btn btn-primary">
            {!! trans('register.complete_register') !!}
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.3/jquery.autocomplete.min.js"></script>
<script>
jQuery(document).ready(function() {
  if (jQuery("input#Institution").is(':checked')) {
      jQuery("input#name").show().attr('required',true);
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
    jQuery("input#name").hide().removeAttr('required');
    if (type == "Institution") {
      jQuery("input#name").show().attr('required',true);
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
  });

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
