@extends('../layouts.app')

@section('page-title') My Profile @endsection
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
      <h1 class="page-title">My profile</h1>
      <div class="col-sm-4 col-md-4 col-xs-12">
        <img src="{{ asset($user->getPhoto()) }}" alt="" class="img-responsive" />
      </div>
      <div class="col-sm-8 col-md-8 col-xs-12">
        <!-- Content -->
        <ul id="profile-tabs" class="nav nav-tabs" data-hashtab="true">
          <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
          <li><a href="#contact" data-toggle="tab">Contact Person</a></li>
          <li><a href="#password" data-toggle="tab">Change your password</a></li>
        </ul>
        <div id="profileTab" class="tab-content well">
          <div class="tab-pane active in" id="profile">
            <form enctype='multipart/form-data'  class="form-vertical" role="form" method="POST" action="{{ route('update_profile'). '#profile' }}" >
              {{ csrf_field() }}
              <h4>About</h4>

              <select-form code="type" label="{!! trans('reg-profile.institution_type') !!}" placeholder=" - {!! trans('reg-profile.institution_type') !!} - " required
                  values='{!! json_encode($types, JSON_HEX_APOS) !!}' value="{{ old('type', $institution->type) }}" related-options="true"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></select-form>

              <text-box-form code="name" label="{!! trans('reg-profile.name') !!}" placeholder="{!! trans('reg-profile.name') !!}" value="{{ old('name', $user->name) }}"
                  required errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <div class="row">
                <text-box-form class="col-sm-6" code="email" label="{!! trans('reg-profile.email') !!}" placeholder="{!! trans('reg-profile.email') !!}" readonly
                    value="{{ old('email', $user->email) }}"
                    errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
                <text-box-form class="col-sm-6" code="phone" label="{!! trans('reg-profile.phone') !!}" placeholder="{!! trans('reg-profile.phone') !!}"
                    value="{{ old('phone', $user->phone) }}"
                    errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              </div>

              <text-box-form code="overseer" label="{!! trans('reg-profile.legal_representative') !!}"
                  placeholder="{!! trans('reg-profile.legal_representative') !!}" value="{{ old('overseer', $institution->overseer) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <div class="row">

                <text-box-form class="col-sm-6" code="fiscal_id" label="{!! trans('reg-profile.fiscal_id') !!}" placeholder="{!! trans('reg-profile.fiscal_id') !!}"
                  required value="{{ old('fiscal_id', $institution->fiscal_id) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

                <text-box-form class="col-sm-6" code="pic" label="{!! trans('reg-profile.institution_pic') !!}" placeholder="{!! trans('reg-profile.institution_pic') !!}"
                  required value="{{ old('pic', $institution->pic) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              </div>

              <div class="form-group @if ($errors->has('image')) alert alert-danger   @endif  ">
                @if ($errors->has('image'))
                <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                </span> @endif
                <label for="image">{{ trans('reg-profile.logo') }}</label>
                <input type="file" id="image" name="image" accept="image/*">
              </div>

              <file-form code="certificate" label="{!! trans('reg-profile.institution_certificate') !!}" download-text="Download certificate" has-file="{{ $institution->certificate }}"
                  file-url="{{ URL::to('/profile/certificate/' . $user->id . '/institution') }}" errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></file-form>

              <p class="help-block"><a target="_blank" href="{{ asset('docs/certificate_template.pdf') }} ">{!! trans('reg-profile.institution_certificate_template_download') !!}. </a></p>

              <hr>
              <h4>{!! trans('reg-profile.address') !!}</h4>
              <text-box-form code="address" label="{!! trans('reg-profile.address') !!}" placeholder="{!! trans('reg-profile.address') !!}"
                  value="{{ old('address', $user->address) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <div class="row">
                <text-box-form class="col-sm-4" code="postal_code" label="{!! trans('reg-profile.postal_code') !!}" placeholder="{!! trans('reg-profile.postal_code') !!}"
                    value="{{ old('postal_code', $user->postal_code) }}" minlength="3"
                    errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
                <text-box-form class="col-sm-8" code="city" label="{!! trans('reg-profile.city') !!}" placeholder="{!! trans('reg-profile.city') !!}"
                    required value="{{ old('city', $user->city) }}"
                    errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              </div>

              <select-form code="country" label="{!! trans('reg-profile.country') !!}" placeholder=" - {!! trans('reg-profile.country') !!} - " required
                  values='{!! json_encode($countries, JSON_HEX_APOS) !!}' value="{{ old('country', $user->country) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></select-form>

              <hr class="separator">
              <button type="submit" class="btn btn-primary">Update settings</button>
            </form>
          </div>
          <div class="tab-pane fade" id="contact">
            <h4>{!! trans('reg-profile.company_contact_person') !!}</h4>
            <label>Setup an alternative contact user that will receive all the notifications instead of the main account</label>
            <form class="form-vertical" role="form" method="POST" action="{{ route('update_profile'). '#contact' }}" >
              {{ csrf_field() }}
              <text-box-form code="notification_name" label="{!! trans('reg-profile.name') !!}" placeholder="{!! trans('reg-profile.name') !!}"
                  value="{{ old('notification_name', $institution->notification_name) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form type="email" code="notification_email" label="{!! trans('reg-profile.email') !!}" placeholder="{!! trans('reg-profile.email') !!}"
                  value="{{ old('notification_email', $institution->notification_email) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <hr>
              <button type="submit" class="btn btn-primary">Update settings</button>
            </form>
          </div>

          <div class="tab-pane fade" id="password">
            <p><span class="h4">Change your password</span></p>
            <form class="form-vertical" role="form" method="POST" action="{{ route('update_profile'). '#password' }}">
              {{ csrf_field() }}
              <text-box-form type="password" code="password" label="New Password"
                  required placeholder="New Password" value="" no-validate
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form type="password" code="password_confirm" label="Repeat new Password"
                  required placeholder="Repeat new Password" value="" no-validate
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <hr>
              <button type="submit" class="btn btn-primary">Save new password</button>
            </form>
          </div>
          <!-- End of content -->
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
