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
          <li><a href="#career" data-toggle="tab">Career and Skills</a></li>
          <li><a href="#refer" data-toggle="tab">Get your profile refereed</a></li>
          <li><a href="#password" data-toggle="tab">Change your password</a></li>
        </ul>
        <div id="profileTab" class="tab-content well">
          <div class="tab-pane active in" id="profile">
            <form enctype="multipart/form-data" class="form-vertical" role="form" method="POST" action="{{ route('update_profile'). '#profile' }}">
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
              <h4>About me</h4>

              <text-box-form code="name" label="Name" placeholder="Name" value="{{ old('name', $user->name) }}"
                  required errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form code="surname" label="Surname" placeholder="Surname" value="{{ old('surname', $user->surname) }}"
                  required errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <div class="row">
                <text-box-form class="col-sm-6" type="email" readonly code="email" label="Email" placeholder="Email"
                    value="{{ old('email', $user->email) }}"
                    errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
                <text-box-form class="col-sm-6" code="phone" label="Phone" placeholder="Phone"
                    value="{{ old('phone', $user->phone) }}"
                    errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              </div>

              <select-form code="nationality" label="Nationality" placeholder=" - Nationality - " required
                  values='{!! json_encode($nationalities, JSON_HEX_APOS) !!}'
                  value="{{ old('nationality', $student->nationality) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></select-form>

              <date-form code="birthdate" label="Birthdate" placeholder="Birthdate" required
                  value="{{ old('birthdate', $student->birthdate) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></date-form>

              <file-form code="image" label="My Photo" errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></file-form>

              <hr class="separator">

              <h4>Social networks</h4>
              <text-box-form code="facebook" label="Facebook page url" placeholder="Facebook page url"
                  value="{{ old('facebook', $user->facebook) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form code="twitter" label="Twitter page url" placeholder="Twitter page url"
                  value="{{ old('twitter', $user->twitter) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form code="linkedin" label="Linkedin page url" placeholder="Linkedin page url"
                  value="{{ old('linkedin', $user->linkedin) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <h4>Address</h4>
              <text-box-form code="address" label="Address" placeholder="Address" value="{{ old('address', $user->address) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <div class="row">
                <text-box-form class="col-sm-4" code="postal_code" label="Postal Code" placeholder="Postal Code"
                    value="{{ old('postal_code', $user->postal_code) }}" minlength="3"
                    errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
                <text-box-form class="col-sm-8" code="city" label="City" placeholder="City"
                    value="{{ old('city', $user->city) }}" required
                    errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              </div>

              <select-form code="country" label="Country" placeholder=" - Country - " required
                  values='{!! json_encode($countries, JSON_HEX_APOS) !!}' value="{{ old('country', $user->country) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></select-form>

              <hr class="separator">

              <button type="submit" class="btn btn-primary">Update settings</button>
            </form>
          </div>

          <div class="tab-pane fade" id="career">
            <form class="form-vertical" enctype="multipart/form-data" role="form" method="POST" action="{{ route('update_profile'). '#career' }}">
              {{ csrf_field() }}
              <h4>Academic information</h4>
              <hr>

              <file-form code="curriculum" label="Europass curriculum" download-text="Download curriculum" has-file="{{ $student->curriculum }}"
                  file-url="{{ URL::to('/profile/curriculum/' . $user->id) }}" errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></file-form>

              <hr class="separator">

              <studies studies='{!! json_encode($student->studies, JSON_HEX_APOS) !!}'
                  study-levels='{!! json_encode($studyLevels, JSON_HEX_APOS) !!}'
                  study-fields='{!! json_encode($studyFields, JSON_HEX_APOS) !!}'
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'
                  user-id="{{ Auth::user()->id }}"></studies>

              <trainings trainings='{!! json_encode($student->training, JSON_HEX_APOS) !!}'
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'
                  user-id="{{ Auth::user()->id }}"></trainings>

              <languages languages='{!! json_encode($student->languages, JSON_HEX_APOS) !!}'
                  language-names='{!! json_encode($languages, JSON_HEX_APOS) !!}'
                  language-levels='{!! json_encode($languageLevels, JSON_HEX_APOS) !!}'
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'
                  user-id="{{ Auth::user()->id }}"></languages>

              <experiences experiences='{!! json_encode($student->experiences, JSON_HEX_APOS) !!}'
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'
                  user-id="{{ Auth::user()->id }}"></experiences>

              <professional-skills selected-skills='{!! json_encode($student->professionalSkills, JSON_HEX_APOS) !!}'
                  skills='{!! json_encode($professionalSkills, JSON_HEX_APOS) !!}'
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></professional-skills>

              <personal-skills-form label="Personal skills (max 6)"
                  values='{!! json_encode($personalSkills, JSON_HEX_APOS) !!}'
                  value='{!! json_encode($student->personalSkills, JSON_HEX_APOS) !!}'
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></personal-skills-form>

              <text-area-form code="talent" label="My talent (max 300 characters)"
                  placeholder="Describe briefly your talent." required
                  value="{{ old('talent', $student->talent) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-area-form>

              <hr>
              <button type="submit" class="btn btn-primary">Update settings</button>
            </form>
          </div>

          <div class="tab-pane fade" id="refer">
            <h4>Get your profile refereed</h4>
            <div class="alert alert-danger">
              Profile refereeing will be available soon
            </div>

            <form class="form-vertical" role="form" style="display:none" method="POST" action="{{ route('update_profile'). '#refer' }}">
              {{ csrf_field() }}

              <text-box-form code="validator_name" label="New validator name" placeholder="Referee name" value=""
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form type="email" code="validator_email" label="New validator email" placeholder="Referee email" value=""
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <hr>
              <button type="submit" class="btn btn-primary">Get your profile refereed</button>
            </form>
          </div>

          <div class="tab-pane fade" id="password">
            <h4>Change your password</h4>
            <form class="form-vertical" role="form" method="POST" action="{{ route('update_profile'). '#password' }}">
              {{ csrf_field() }}
              <text-box-form type="password" code="password" label="New Password" placeholder="New Password" value="" required
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form type="password" code="password_confirm" label="Repeat new Password"
                  placeholder="Repeat new Password" value="" required
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}' no-validate></text-box-form>

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
