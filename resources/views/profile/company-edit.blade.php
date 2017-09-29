@extends('../layouts.app')

@section('page-title') {!! trans('reg-profile.my_profile') !!} @endsection
@section('page-class') my-profile @endsection

@section('meta')
  <meta id="token" content="{{ $token }}" />
@endsection

@section ('profile_warning')
@endsection

@section('content')
<div class="container v-container edit-profile">
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <h1 class="page-title">{!! trans('reg-profile.my_profile') !!}</h1>
      <div class="col-sm-4 col-md-4 col-xs-12">
        <img src="{{ asset($user->getPhoto()) }}" alt="" class="img-responsive" />
      </div>
      <div class="col-sm-8 col-md-8 col-xs-12">
        <!-- Content -->
        <ul id="profile-tabs" class="nav nav-tabs" data-hashtab="true">
          <li class="active"><a data-target="#_profile" data-toggle="tab">{!! trans('reg-profile.profile') !!}</a></li>
          <li><a data-target="#_contact" data-toggle="tab">{!! trans('reg-profile.company_contact_person') !!}</a></li>
          <li><a data-target="#_change-password" data-toggle="tab">{!! trans('reg-profile.change_your_password') !!}</a></li>
        </ul>
        <div id="profileTab" class="tab-content well">
          <div class="tab-pane active in" id="_profile">
          <form enctype='multipart/form-data'  class="form-vertical" role="form" method="POST" action="{{ route('update_profile'). '#profile' }}" >
              {{ csrf_field() }}

              <h4>{!! trans('reg-profile.profile_visibility') !!}</h4>
              <div class="radio">
                <label><input type="radio" @if ($user->visible == true) checked @endif name="visible" value="1">{!! trans('reg-profile.profile_visibility_visible') !!}</label>
              </div>
              <div class="radio">
                <label><input @if ($user->visible != true) checked @endif type="radio" name="visible" value="0">{!! trans('reg-profile.profile_visibility_hidden') !!}</label>
              </div>
              <hr>
              <h4>{!! trans('reg-profile.notifications') !!}</h4>
              <div class="radio">
                <label><input type="radio" @if ($user->notify_me == true) checked @endif name="notify_me" value="1">{!! trans('reg-profile.notifications_enabled') !!}</label>
              </div>
              <div class="radio">
                <label><input @if ($user->notify_me != true) checked @endif type="radio" name="notify_me" value="0">{!! trans('reg-profile.notifications_disabled') !!}</label>
              </div>

              <hr class="separator">
              <h4>{!! trans('reg-profile.about') !!}</h4>

              <text-box-form code="name" label="{!! trans('reg-profile.name') !!}" placeholder="{!! trans('reg-profile.name') !!}" value="{{ old('name', $user->name) }}"
                  required errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <div class="row">
                <div class="col-sm-6">
                  <text-box-form code="fiscal_id" label="{!! trans('reg-profile.fiscal_id') !!}" placeholder="{!! trans('reg-profile.fiscal_id') !!}"
                      value="{{ old('fiscal_id', $company->fiscal_id) }}"
                      errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
                </div>
                <div class="col-sm-6">
                  <text-box-form code="overseer" label="{!! trans('reg-profile.legal_representative') !!}"
                      placeholder="{!! trans('reg-profile.legal_representative') !!}" value="{{ old('overseer', $company->overseer) }}"
                      errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <text-box-form code="email" label="{!! trans('reg-profile.email') !!}" placeholder="{!! trans('reg-profile.email') !!}" readonly
                      value="{{ old('email', $user->email) }}"
                      errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
                </div>
                <div class="col-sm-6">
                  <text-box-form code="phone" label="{!! trans('reg-profile.phone') !!}" placeholder="{!! trans('reg-profile.phone') !!}"
                      value="{{ old('phone', $user->phone) }}"
                      errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
                </div>
              </div>

              <select-form code="activity" label="{!! trans('reg-profile.company_activity') !!}" placeholder=" - {!! trans('reg-profile.company_activity') !!} - " required
                  values='{!! json_encode($activities, JSON_HEX_APOS) !!}'
                  value="{{ old('activity', $company->activity) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></select-form>

              <div class="form-group @if ($errors->has('image')) alert alert-danger   @endif  ">
                @if ($errors->has('image'))
                <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                </span> @endif
                <div class="hide-from-app">
                  <label for="image">{!! trans('reg-profile.company_logo') !!}</label>
                  <input type="file" id="image" name="image" accept="image/*">
                </div>
              </div>

              @if ($user->image != "default.png") 
                <div class="checkbox">
                  <label><input type="checkbox" name="deletePhoto" value="deletePhoto">{!! trans('reg-profile.delete_photo') !!}</label>
                </div>
              @endif

              <hr class="separator">

              <h4>{!! trans('reg-profile.social_and_web') !!}</h4>
              <text-box-form code="facebook" label="{!! trans('reg-profile.facebook_page_url') !!}" placeholder="{!! trans('reg-profile.facebook_page_url') !!}"
                  value="{{ old('facebook', $user->facebook) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form code="twitter" label="{!! trans('reg-profile.twitter_page_url') !!}" placeholder="{!! trans('reg-profile.twitter_page_url') !!}"
                  value="{{ old('twitter', $user->twitter) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form code="linkedin" label="{!! trans('reg-profile.linkedin_page_url') !!}" placeholder="{!! trans('reg-profile.linkedin_page_url') !!}"
                  value="{{ old('linkedin', $user->linkedin) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form code="website" label="{!! trans('reg-profile.web_url') !!}" placeholder="{!! trans('reg-profile.web_url') !!}"
                  value="{{ old('website', $company->website) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <hr class="separator">

              <h4>{!! trans('reg-profile.address') !!}</h4>
              <text-box-form code="address" label="{!! trans('reg-profile.address') !!}" placeholder="{!! trans('reg-profile.address') !!}"
                  value="{{ old('address', $user->address) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <div class="row">
                <div class="col-sm-4">
                  <text-box-form code="postal_code" label="{!! trans('reg-profile.postal_code') !!}" placeholder="{!! trans('reg-profile.postal_code') !!}"
                      value="{{ old('postal_code', $user->postal_code) }}" minlength="3"
                      errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
                </div>
                <div class="col-sm-8">
                  <text-box-form code="city" label="{!! trans('reg-profile.city') !!}" placeholder="{!! trans('reg-profile.city') !!}"
                      required value="{{ old('city', $user->city) }}"
                      errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
                </div>
              </div>

              <select-form code="country" label="{!! trans('reg-profile.country') !!}" placeholder=" - {!! trans('reg-profile.country') !!} - " required
                  values='{!! json_encode($countries, JSON_HEX_APOS) !!}' value="{{ old('country', $user->country) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></select-form>

              <hr class="separator">

              <text-area-form code="description" label="{!! trans('reg-profile.description') !!} ({!! trans('reg-profile.input_max_characters') !!} 300 characters)"
                  placeholder="{!! trans('reg-profile.description') !!} ({!! trans('reg-profile.input_max_characters') !!} 300)."
                  value="{{ old('description', $company->description) }}" errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-area-form>

              <hr class="separator">

              <text-area-form code="talent" label="{!! trans('reg-profile.company_what_is_talent') !!} ({!! trans('reg-profile.input_max_characters') !!} 300 characters)"
                  placeholder="{!! trans('reg-profile.what_is_talent_for_you_in_a_few_words') !!} ({!! trans('reg-profile.input_max_characters') !!} 300)." required
                  value="{{ old('talent', $company->talent) }}" errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-area-form>


              <personal-skills-form label="{!! trans('reg-profile.student_personal_skills') !!} ({!! trans('reg-profile.input_max_characters') !!} 6)"
                  sublabel="{!! trans('reg-profile.most_valuable_skills_for_company') !!}"
                  values='{!! json_encode($personalSkills, JSON_HEX_APOS) !!}'
                  value='{!! json_encode($company->personalSkills, JSON_HEX_APOS) !!}'
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></personal-skills-form>

              <hr>

              <div>
                <button type="submit" class="btn btn-primary">{!! trans('reg-profile.update_settings') !!}</button>
                <remove-account></remove-account>
              </div>
            </form>
          </div>

          <div class="tab-pane fade" id="_contact">
            <h4>{!! trans('reg-profile.company_contact_person') !!}</h4>
            <label>{!! trans('reg-profile.setup_alternative_contact') !!}</label>
            <form class="form-vertical" role="form" method="POST" action="{{ route('update_profile'). '#contact' }}" >
              {{ csrf_field() }}
              <text-box-form code="notification_name" label="{!! trans('reg-profile.name') !!}" placeholder="{!! trans('reg-profile.name') !!}"
                  value="{{ old('notification_name', $company->notification_name) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form type="email" code="notification_email" label="{!! trans('reg-profile.email') !!}" placeholder="{!! trans('reg-profile.email') !!}"
                  value="{{ old('notification_email', $company->notification_email) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <hr>
              <button type="submit" class="btn btn-primary">{!! trans('reg-profile.update_settings') !!}</button>
            </form>
          </div>

          <div class="tab-pane fade" id="_change-password">
            <p><span class="h4">{!! trans('reg-profile.change_your_password') !!}</span></p>
            <form class="form-vertical" role="form" method="POST" action="{{ route('update_profile'). '#change-password' }}">
              {{ csrf_field() }}
              <text-box-form type="password" code="password" label="{!! trans('reg-profile.new_password') !!}"
                  required placeholder="{!! trans('reg-profile.new_password') !!}" value="" no-validate
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form type="password" code="password_confirm" label="{!! trans('reg-profile.repeat_new_password') !!}"
                  required placeholder="{!! trans('reg-profile.repeat_new_password') !!}" value="" no-validate
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <hr>
              <button type="submit" class="btn btn-primary">{!! trans('reg-profile.save_new_password') !!}</button>
            </form>
          </div>
          <!-- End of content -->
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
