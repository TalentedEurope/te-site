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
        <div class="progress-form @if ($user->is_filled && $user->userable->valid == 'pending') f-50 @endif @if ($user->userable->valid != 'pending') f-100 @endif ">
          <div class="line-background"></div>
          <div class="line-progress"></div>
          <span class="number p-0">1</span>
          <span class="name p-0">Account setup</span>
          <span class="number p-50 @if (!$user->is_filled && $user->userable->valid == 'pending') disabled @endif">2</span>
          <span class="name p-50 @if (!$user->is_filled && $user->userable->valid == 'pending') disabled @endif">Refer your profile</span>
          <span class="number p-100 @if ($user->userable->valid != 'validated') disabled @endif @if ($user->userable->valid == 'denied') invalid @endif ">3</span>
          <span class="name p-100 @if ($user->userable->valid != 'validated') disabled @endif">Completed</span>
        </div>

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

              <text-box-form code="name" label="{!! trans('reg-profile.name') !!}" placeholder="{!! trans('reg-profile.name') !!}" value="{{ old('name', $user->name) }}"
                  required errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form code="surname" label="{!! trans('reg-profile.surname') !!}" placeholder="{!! trans('reg-profile.surname') !!}" value="{{ old('surname', $user->surname) }}"
                  required errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <div class="row">
                <text-box-form class="col-sm-6" type="email" readonly code="email" label="{!! trans('reg-profile.email') !!}" placeholder="{!! trans('reg-profile.email') !!}"
                    value="{{ old('email', $user->email) }}"
                    errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
                <text-box-form class="col-sm-6" code="phone" label="{!! trans('reg-profile.phone') !!}" placeholder="{!! trans('reg-profile.phone') !!}"
                    value="{{ old('phone', $user->phone) }}"
                    errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              </div>

              <select-form code="nationality" label="{!! trans('reg-profile.nationality') !!}" placeholder=" - {!! trans('reg-profile.nationality') !!} - " required
                  values='{!! json_encode($nationalities, JSON_HEX_APOS) !!}'
                  value="{{ old('nationality', $student->nationality) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></select-form>

              <date-form code="birthdate" label="{!! trans('reg-profile.student_birthdate') !!}" placeholder="{!! trans('reg-profile.student_birthdate') !!}" required
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

              <h4>{!! trans('reg-profile.address') !!}</h4>
              <text-box-form code="address" label="{!! trans('reg-profile.address') !!}" placeholder="{!! trans('reg-profile.address') !!}" value="{{ old('address', $user->address) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <div class="row">
                <text-box-form class="col-sm-4" code="postal_code" label="{!! trans('reg-profile.postal_code') !!}" placeholder="{!! trans('reg-profile.postal_code') !!}"
                    value="{{ old('postal_code', $user->postal_code) }}" minlength="3"
                    errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
                <text-box-form class="col-sm-8" code="city" label="{!! trans('reg-profile.city') !!}" placeholder="{!! trans('reg-profile.city') !!}"
                    value="{{ old('city', $user->city) }}" required
                    errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              </div>

              <select-form code="country" label="{!! trans('reg-profile.country') !!}" placeholder=" - {!! trans('reg-profile.country') !!} - " required
                  values='{!! json_encode($countries, JSON_HEX_APOS) !!}' value="{{ old('country', $user->country) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></select-form>

              <hr class="separator">

              <button type="submit" class="btn btn-primary">Update settings</button>
            </form>
          </div>

          <div class="tab-pane fade" id="career">
            <form class="form-vertical" enctype="multipart/form-data" role="form" method="POST" action="{{ route('update_profile'). '#career' }}">
              {{ csrf_field() }}
              <h4>{!! trans('reg-profile.student_academic_info') !!}</h4>
              <hr>

              <file-form code="curriculum" label="{!! trans('reg-profile.student_europass') !!}" download-text="Download curriculum" has-file="{{ $student->curriculum }}"
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
                  value='{!! json_encode($student->personalSkills()->wherePivot('validator',false)->get(), JSON_HEX_APOS) !!}'
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></personal-skills-form>

              <text-area-form code="talent" label="{!! trans('reg-profile.student_describe_talent') !!}"
                  placeholder="{!! trans('reg-profile.student_describe_talent') !!}" required
                  value="{{ old('talent', $student->talent) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-area-form>

              <hr>
              <button type="submit" class="btn btn-primary">Update settings</button>
            </form>
          </div>

          <div class="tab-pane fade" id="refer">
            <h4>Profile readiness</h4>

            <p>Getting your profile refereed gives a third party opinion of you and helps increasing the possibilities of contact from a company</p>


            <div class="form-group">
              <label>Profile Readiness/Fill rate:</label>
              <div class="progress">
                <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                  60%
                </div>
              </div>
            </div>

            <p class="small"><em>Get a better refeer improving your profile readiness and improve possibility of company contact</em></p>

            <hr class="separator">
            @if ($user->is_filled && $user->userable->valid == 'pending')

              @if($user->userable->validationRequest)
                <h4>Your request is being managed by: {{ $user->userable->validationRequest->getValidator() }}</h4>
                <div class="alert alert-info">
                <p>{{ sprintf('Your request was created %s', '2 days ago') }}</p>
                <p>{{ sprintf('If your request hasn\'t been completed in %s days you will be able to create a new request', env('CLEANUP_DAYS',14)) }}
                </div>
              @else
                <form class="form-vertical" role="form" method="POST" action="{{ route('request-validation') }}">
                  {{ csrf_field() }}
                  <h4>Find your school</h4>
                  <find-your-school countries='{!! json_encode($institutionCountries, JSON_HEX_APOS) !!}'></find-your-school>
                </form>

                <hr class="separator">
                <h4>Can't find your institution? ask your referee and institution to join Talented Europe</h4>

                <p>This step sends an email to your referee with instructions on how to join Talented Europe, automatically registers him as referee once his institution joins, and adds you to the refeeral queue</p>

                <form class="form-vertical" role="form" method="POST" action="{{ route('invite-school') }}">
                {{ csrf_field() }}

                <div class="row">
                  <text-box-form class="col-sm-6" code="validator_name" label="Referee email" placeholder="Referee Name"
                        value="{{ old('validator_name', $user->validator_name) }}"
                        errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'> </text-box-form>

                  <text-box-form class="col-sm-6" code="validator_email" label="Referee email" placeholder="Referee email"
                        value="{{ old('validator_email', $user->validator_email) }}"
                        errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'> </text-box-form>
                        </div>
                <div class="row">
                  <hr>
                  <p class="col-sm-12 text-right"><button type="submit" class="btn btn-primary">Send Invitation</button></p>
                </div>
                </form>
              @endif


            @elseif ($user->is_filled && $user->userable->valid == 'validated')
            <p class="h4">Your profile was validated successfully</p>
            <p>This is what your validator said about you: </p>
            <div class="alert alert-info">
              {{ $user->userable->validation_comment }}
            </div>
            @elseif ($user->is_filled && $user->userable->valid == 'denied')
            <p class="h4 alert alert-danger">Your profile was denied</p>

            @else
            <p>We don't have enough data from you to be able to do a refeer.</p>

            <p><strong>You'll need to fix the following errors:</strong></p>
            @if ($profileErrors->all())
              <div class="alert alert-warning">
              <ul>
              @foreach ($profileErrors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
              </ul>
              </div>
            @endif

            @endif

          </div>

          <div class="tab-pane fade" id="password">
            <h4>Change your password</h4>
            <form class="form-vertical" role="form" method="POST" action="{{ route('update_profile'). '#password' }}">
              {{ csrf_field() }}
              <text-box-form type="password" code="password" label="New Password" placeholder="New Password" value="" required
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}' no-validate></text-box-form>
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
