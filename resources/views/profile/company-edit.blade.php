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

              <h4>Profile Visibility</h4>
              <div class="radio">
                <label><input type="radio" @if ($user->visible == true) checked @endif name="visible" value="1">Visible. Can be searched, viewed</label>
              </div>
              <div class="radio">
                <label><input @if ($user->visible != true) checked @endif type="radio" name="visible" value="0">Hidden. Cannot be searched or viewed</label>
              </div>
              <hr>
              <h4>Notifications</h4>
              <div class="radio">
                <label><input type="radio" @if ($user->notify_me == true) checked @endif name="notify_me" value="1">Enabled. You'll receive emails once a day if a student wants to get in contact with you</label>
              </div>
              <div class="radio">
                <label><input @if ($user->notify_me != true) checked @endif type="radio" name="notify_me" value="0">Disabled. You won't receive any emails, except for announcements about the service</label>
              </div>

              <hr class="separator">
              <h4>About</h4>

              <text-box-form code="name" label="Name" placeholder="Name" value="{{ old('name', $user->name) }}" errors='{!! json_encode($errors, JSON_HEX_APOS) !!}'></text-box-form>

              <div class="row">
                <text-box-form class="col-sm-6" code="fiscal_id" label="Fiscal id" placeholder="Fiscal id" value="{{ old('fiscal_id', $company->fiscal_id) }}" errors='{!! json_encode($errors, JSON_HEX_APOS) !!}'></text-box-form>
                <text-box-form class="col-sm-6" code="overseer" label="Legal representative" placeholder="Legal representative" value="{{ old('overseer', $company->overseer) }}" errors='{!! json_encode($errors, JSON_HEX_APOS) !!}'></text-box-form>
              </div>

              <div class="row">
                <text-box-form class="col-sm-6" code="email" label="Email" placeholder="Email" readonly value="{{ old('email', $user->email) }}" errors='{!! json_encode($errors, JSON_HEX_APOS) !!}'></text-box-form>
                <text-box-form class="col-sm-6" code="phone" label="Phone" placeholder="Phone" value="{{ old('phone', $user->phone) }}" errors='{!! json_encode($errors, JSON_HEX_APOS) !!}'></text-box-form>
              </div>

              <select-form code="activity" label="Activity Sector" placeholder=" - Activity Sector - " values='{!! json_encode($activities, JSON_HEX_APOS) !!}' value="{{ old('activity', $company->activity) }}" errors='{!! json_encode($errors, JSON_HEX_APOS) !!}'></select-form>

              <div class="form-group @if ($errors->has('image')) alert alert-danger   @endif  ">
                @if ($errors->has('image'))
                <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                </span> @endif
                <label for="image">Company Logo</label>
                <input type="file" id="image" name="image" accept="image/*">
              </div>

              <hr class="separator">

              <h4>Social networks and website</h4>
              <text-box-form code="facebook" label="Facebook page url" placeholder="Facebook page url" value="{{ old('facebook', $user->facebook) }}" errors='{!! json_encode($errors, JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form code="twitter" label="Twitter page url" placeholder="Twitter page url" value="{{ old('twitter', $user->twitter) }}" errors='{!! json_encode($errors, JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form code="linkedin" label="Linkedin page url" placeholder="Linkedin page url" value="{{ old('linkedin', $user->linkedin) }}" errors='{!! json_encode($errors, JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form code="website" label="Website url" placeholder="Website url" value="{{ old('website', $company->website) }}" errors='{!! json_encode($errors, JSON_HEX_APOS) !!}'></text-box-form>

              <hr class="separator">

              <h4>Address</h4>
              <text-box-form code="address" label="Address" placeholder="Address" value="{{ old('address', $user->address) }}" errors='{!! json_encode($errors, JSON_HEX_APOS) !!}'></text-box-form>

              <div class="row">
                <text-box-form class="col-sm-4" code="postal_code" label="Postal Code" placeholder="Postal Code" value="{{ old('postal_code', $user->postal_code) }}" errors='{!! json_encode($errors, JSON_HEX_APOS) !!}'></text-box-form>
                <text-box-form class="col-sm-8" code="city" label="City" placeholder="City" value="{{ old('city', $user->city) }}" errors='{!! json_encode($errors, JSON_HEX_APOS) !!}'></text-box-form>
              </div>

              <select-form code="country" label="Country" placeholder=" - Country - " values='{!! json_encode($countries, JSON_HEX_APOS) !!}' value="{{ old('country', $user->country) }}" errors='{!! json_encode($errors, JSON_HEX_APOS) !!}'></select-form>

              <hr class="separator">

              <text-area-form code="talent" label="What is talent for you? (Max 300 characters)" placeholder="Explain us what is talent for you in a few words (max 300)."
                    value="{{ old('talent', $company->talent) }}" errors='{!! json_encode($errors, JSON_HEX_APOS) !!}'></text-area-form>


              <personal-skills-form max-personal-skills="6" values='{!! json_encode($personalSkills, JSON_HEX_APOS) !!}' value='{!! json_encode($company->personalSkills, JSON_HEX_APOS) !!}' errors='{!! json_encode($errors, JSON_HEX_APOS) !!}'>
              </personal-skills-form>

              <hr>

              <button type="submit" class="btn btn-primary">Update settings</button>
            </form>
          </div>

          <div class="tab-pane fade" id="contact">
            <h4>Contact person</h4>
            <label>Setup an alternative contact user that will receive all the notifications instead of the main account</label>
            <form class="form-vertical" role="form" method="POST" action="{{ route('update_profile'). '#contact' }}" >
              {{ csrf_field() }}
              <text-box-form code="notification_name" label="Name" placeholder="Name" value="{{ old('notification_name', $company->notification_name) }}" errors='{!! json_encode($errors, JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form type="email" code="notification_email" label="Email" placeholder="Email" value="{{ old('notification_email', $company->notification_email) }}" errors='{!! json_encode($errors, JSON_HEX_APOS) !!}'></text-box-form>

              <hr>
              <button type="submit" class="btn btn-primary">Update settings</button>
            </form>
          </div>

          <div class="tab-pane fade" id="password">
            <p><span class="h4">Change your password</span></p>
            <form class="form-vertical" role="form" method="POST" action="{{ route('update_profile'). '#password' }}">
              {{ csrf_field() }}
              <text-box-form type="password" code="password" label="New Password" placeholder="New Password" value="" errors='{!! json_encode($errors, JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form type="password" code="password_confirm" label="Repeat new Password" placeholder="Repeat new Password" value="" errors='{!! json_encode($errors, JSON_HEX_APOS) !!}'></text-box-form>

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
