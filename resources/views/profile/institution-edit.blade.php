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
              <h4>{!! trans('reg-profile.about') !!}</h4>

              <select-form code="type" label="{!! trans('reg-profile.institution_type') !!}" placeholder=" - {!! trans('reg-profile.institution_type') !!} - " required
                  values='{!! json_encode($types, JSON_HEX_APOS) !!}' value="{{ old('type', $institution->type) }}" related-options="true"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></select-form>

              <text-box-form code="name" label="{!! trans('reg-profile.name') !!}" placeholder="{!! trans('reg-profile.name') !!}" value="{{ old('name', $user->name) }}"
                  required errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

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

              <text-box-form code="overseer" label="{!! trans('reg-profile.legal_representative') !!}"
                  placeholder="{!! trans('reg-profile.legal_representative') !!}" value="{{ old('overseer', $institution->overseer) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <div class="row">
                <div class="col-sm-6">
                  <text-box-form code="fiscal_id" label="{!! trans('reg-profile.fiscal_id') !!}" placeholder="{!! trans('reg-profile.fiscal_id') !!}"
                    value="{{ old('fiscal_id', $institution->fiscal_id) }}"
                    errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
                </div>
                <div class="col-sm-6">
                  <text-box-form code="pic" label="{!! trans('reg-profile.institution_pic') !!}" placeholder="{!! trans('reg-profile.institution_pic') !!}"
                    value="{{ old('pic', $institution->pic) }}"
                    errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
                </div>
              </div>

              <div class="form-group @if ($errors->has('image')) alert alert-danger   @endif  ">
                @if ($errors->has('image'))
                <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                </span> @endif
                <div class="hide-from-app">
                  <label for="image">{{ trans('reg-profile.logo') }}</label>
                  <input type="file" id="image" name="image" accept="image/*">
                </div>
              </div>

              @if ($user->image != "default.png") 
                <div class="checkbox">
                  <label><input type="checkbox" name="deletePhoto" value="deletePhoto">{!! trans('reg-profile.delete_photo') !!}</label>
                </div>
              @endif

              @if (!$institution->certificate)
              <div class="alert alert-info">
                {{ trans('reg-profile.required_cert_warning') }}
              </div>
              @endif

              <div class="hide-from-app">
              <file-form code="certificate" label="{!! trans('reg-profile.institution_certificate') !!}" download-text="{!! trans('reg-profile.student_download_certificate') !!}" has-file="{{ $institution->certificate }}"
                  file-url="{{ URL::to('/profile/certificate/' . $user->id . '/institution') }}" errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></file-form>
              </div>
              <p class="help-block"><a target="_blank" href="{{ URL::asset('docs/'.App::getLocale().'/ProofOfAuthenticityForEducationInstitute.docx') }}">{!! trans('reg-profile.institution_certificate_template_download') !!}</a></p>

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
                  value="{{ old('website', $institution->website) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>


              <hr>
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
                  value="{{ old('notification_name', $institution->notification_name) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form type="email" code="notification_email" label="{!! trans('reg-profile.email') !!}" placeholder="{!! trans('reg-profile.email') !!}"
                  value="{{ old('notification_email', $institution->notification_email) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <text-box-form type="email" code="contact_email" label="{!! trans('reg-profile.public_email') !!}" placeholder="{!! trans('reg-profile.public_email') !!}"
                  value="{{ old('contact_email', $institution->contact_email) }}"
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
