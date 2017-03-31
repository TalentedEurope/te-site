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
        <div class="progress-form @if ($user->userable->valid == 'validated' || $user->userable->valid == 'denied') f-100 @elseif ($user->userable->validationRequest) f-50 @elseif ($user->is_filled) f-30 @endif ">
          <div class="line-wrapper">
            <div class="line-background"></div>
            <div class="line-progress"></div>
          </div>
          <span class="number p-0 @if (!$user->is_filled) disabled @endif">1</span>
          <span class="name p-0 @if (!$user->is_filled) disabled @endif">{!! trans('reg-profile.progress_account_setup') !!}</span>
          <span class="number p-50 @if (!$user->userable->validationRequest) disabled @endif">2</span>
          <span class="name p-50 @if (!$user->userable->validationRequest) disabled @endif">{!! trans('reg-profile.progress_refer_your_profile') !!}</span>
          <span class="number p-100 @if ($user->userable->valid == 'denied') invalid @elseif ($user->userable->valid != 'validated') disabled @endif">3</span>
          <span class="name p-100 @if ($user->userable->valid != 'validated' && $user->userable->valid != 'denied') disabled @endif">
            @if ($user->userable->valid == 'denied') {!! trans('reg-profile.progress_not_refereed') !!} @else {!! trans('reg-profile.progress_completed') !!} @endif
          </span>
        </div>

        <ul id="profile-tabs" class="nav nav-tabs" data-hashtab="true">
          <li class="active"><a data-target="#_profile" data-toggle="tab">{!! trans('reg-profile.profile') !!}</a></li>
          <li><a data-target="#_career" data-toggle="tab">{!! trans('reg-profile.career_and_skills') !!}</a></li>
          <li><a data-target="#_refer" data-toggle="tab">{!! trans('reg-profile.get_your_profile_refereed') !!}</a></li>
          <li><a data-target="#_change-password" data-toggle="tab">{!! trans('reg-profile.change_your_password') !!}</a></li>
        </ul>
        <div id="profileTab" class="tab-content well">
          <div class="tab-pane active in" id="_profile">
            <form enctype="multipart/form-data" class="form-vertical" role="form" method="POST" action="{{ route('update_profile'). '#profile' }}">
              {{ csrf_field() }}

              <h4>{!! trans('reg-profile.profile_visibility') !!}</h4>
              <div class="radio">
                <label><input type="radio" @if ($user->visible == true) checked @endif name="visible" value="1">{!! trans('reg-profile.profile_visibility_visible') !!}</label>
              </div>
              <div class="radio">
                <label><input @if ($user->visible != true) checked @endif type="radio" name="visible" value="0">{!! trans('reg-profile.profile_visibility_hidden') !!}</label>
              </div>
              <hr class="separator">
              <h4>About me</h4>

              <text-box-form code="name" label="{!! trans('reg-profile.name') !!}" placeholder="{!! trans('reg-profile.name') !!}" value="{{ old('name', $user->name) }}"
                  required errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form code="surname" label="{!! trans('reg-profile.surname') !!}" placeholder="{!! trans('reg-profile.surname') !!}" value="{{ old('surname', $user->surname) }}"
                  required errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <div class="row">
                <div class="col-sm-6">
                  <text-box-form type="email" readonly code="email" label="{!! trans('reg-profile.email') !!}" placeholder="{!! trans('reg-profile.email') !!}"
                      value="{{ old('email', $user->email) }}"
                      errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
                </div>
                <div class="col-sm-6">
                  <text-box-form code="phone" label="{!! trans('reg-profile.phone') !!}" placeholder="{!! trans('reg-profile.phone') !!}"
                      value="{{ old('phone', $user->phone) }}"
                      errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
                </div>
              </div>

              <select-form code="nationality" label="{!! trans('reg-profile.nationality') !!}" placeholder=" - {!! trans('reg-profile.nationality') !!} - " required
                  values='{!! json_encode($nationalities, JSON_HEX_APOS) !!}'
                  value="{{ old('nationality', $student->nationality) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></select-form>

              <date-form code="birthdate" label="{!! trans('reg-profile.student_birthdate') !!}" placeholder="{!! trans('reg-profile.student_birthdate') !!}" required
                  value="{{ old('birthdate', $student->birthdate) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></date-form>

              <file-form code="image" label="{!! trans('reg-profile.my_photo') !!}" errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></file-form>

              <hr class="separator">

              <h4>Social networks</h4>
              <text-box-form code="facebook" label="{!! trans('reg-profile.facebook_page_url') !!}" placeholder="{!! trans('reg-profile.facebook_page_url') !!}"
                  value="{{ old('facebook', $user->facebook) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form code="twitter" label="{!! trans('reg-profile.twitter_page_url') !!}" placeholder="{!! trans('reg-profile.twitter_page_url') !!}"
                  value="{{ old('twitter', $user->twitter) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              <text-box-form code="linkedin" label="{!! trans('reg-profile.linkedin_page_url') !!}" placeholder="{!! trans('reg-profile.linkedin_page_url') !!}"
                  value="{{ old('linkedin', $user->linkedin) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <h4>{!! trans('reg-profile.address') !!}</h4>
              <text-box-form code="address" label="{!! trans('reg-profile.address') !!}" placeholder="{!! trans('reg-profile.address') !!}" value="{{ old('address', $user->address) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <div class="row">
                <div class="col-sm-4">
                  <text-box-form code="postal_code" label="{!! trans('reg-profile.postal_code') !!}" placeholder="{!! trans('reg-profile.postal_code') !!}"
                      value="{{ old('postal_code', $user->postal_code) }}" minlength="3"
                      errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
                </div>
                <div class="col-sm-8">
                  <text-box-form code="city" label="{!! trans('reg-profile.city') !!}" placeholder="{!! trans('reg-profile.city') !!}"
                      value="{{ old('city', $user->city) }}" required
                      errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
                </div>
              </div>

              <select-form code="country" label="{!! trans('reg-profile.country') !!}" placeholder=" - {!! trans('reg-profile.country') !!} - " required
                  values='{!! json_encode($countries, JSON_HEX_APOS) !!}' value="{{ old('country', $user->country) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></select-form>

              <hr class="separator">

              <button type="submit" class="btn btn-primary">{!! trans('reg-profile.update_settings') !!}</button>
            </form>
          </div>

          <div class="tab-pane fade" id="_career">
            <form class="form-vertical" enctype="multipart/form-data" role="form" method="POST" action="{{ route('update_profile'). '#career' }}">
              {{ csrf_field() }}
              <h4>{!! trans('reg-profile.student_academic_info') !!}</h4>
              <hr>

              <file-form code="curriculum" label="{!! trans('reg-profile.student_europass') !!}" download-text="{!! trans('reg-profile.download_curriculum') !!}" has-file="{{ $student->curriculum }}"
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
              <personal-skills-form label="{!! trans('reg-profile.student_personal_skills') !!} ({!! trans('reg-profile.input_max_characters') !!} 6)"
                  values='{!! json_encode($personalSkills, JSON_HEX_APOS) !!}' readonly='{!! !!$validationReqDate !!}'
                  value='{!! json_encode($student->personalSkills()->wherePivot('validator',false)->get(), JSON_HEX_APOS) !!}'
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></personal-skills-form>

              <text-area-form code="talent" label="{!! trans('reg-profile.student_describe_talent') !!}"
                  placeholder="{!! trans('reg-profile.student_describe_talent') !!}" required
                  value="{{ old('talent', $student->talent) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-area-form>

              <hr>
              <button type="submit" class="btn btn-primary">{!! trans('reg-profile.update_settings') !!}</button>
            </form>
          </div>

          <div class="tab-pane fade" id="_refer">
            <h4>{!! trans('reg-profile.profile_readiness') !!}</h4>

            <p>{!! trans('reg-profile.profile_readiness_explanation') !!}</p>


            <div class="form-group">
              <label>{!! trans('reg-profile.profile_readiness') !!}:</label>
              <div class="progress">
                <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="{{ $fillRate }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $fillRate }}%;">
                  {{ $fillRate }}%
                </div>
              </div>
            </div>

            <p class="small"><em>{!! trans('reg-profile.get_a_better_refeer') !!}</em></p>

            <hr class="separator">
            @if (($user->is_filled && !$user->userable->valid) || ($user->is_filled && $user->userable->valid == 'pending'))

              @if($user->userable->validationRequest)
                <h4>{!! trans('reg-profile.request_is_managed_by') !!}: {{ $user->userable->validationRequest->getValidator() }}</h4>
                <div class="alert alert-info">
                <p>{{ sprintf('Your request was created %s', $user->userable->validationRequest->created_at->diffForHumans()) }}</p>
                <p>{{ sprintf('If your request hasn\'t been completed in %s days you will be able to create a new request', env('CLEANUP_DAYS',14)) }}
                </div>
              @else
                <form class="form-vertical" role="form" method="POST" action="{{ route('request-validation'). '#refer'}}">
                  {{ csrf_field() }}
                  <request-validation countries='{!! json_encode($institutionCountries, JSON_HEX_APOS) !!}'></request-validation>
                </form>

                <hr class="separator">
                <h4>{!! trans('reg-profile.cant_find_your_institution') !!}</h4>

                <p>{!! trans('reg-profile.this_step_sends_an_email_to_your_referee') !!}</p>
                <p>{!! trans('reg-profile.you_must_put_referee_email') !!}</p>

                <form class="form-vertical" role="form" method="POST" action="{{ route('invite-school'). '#refer' }}">
                {{ csrf_field() }}

                <div class="row">
                  <div class="col-sm-6">
                    <text-box-form code="validator_name" label="{!! trans('reg-profile.referee_name') !!}" placeholder="{!! trans('reg-profile.referee_name') !!}"
                          value="{{ old('validator_name', $user->validator_name) }}" required
                          errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'> </text-box-form>
                  </div>
                  <div class="col-sm-6">
                    <text-box-form code="validator_email" label="{!! trans('reg-profile.referee_email') !!}" placeholder="{!! trans('reg-profile.referee_email') !!}"
                          value="{{ old('validator_email', $user->validator_email) }}" required
                          errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'> </text-box-form>
                  </div>
                <div class="row">
                  <hr>
                  <p class="col-sm-12 text-right"><button type="submit" class="btn btn-primary">{!! trans('reg-profile.send_invitation') !!}</button></p>
                </div>
                </form>
              @endif


            @elseif ($user->is_filled && $user->userable->valid == 'validated')
            <p class="h4">{!! trans('reg-profile.profile_validated_successfully') !!}</p>
            <p>{!! trans('reg-profile.referee_said_about_you') !!}: </p>
            <div class="alert alert-info">
              {{ $user->userable->validation_comment }}
            </div>
            @elseif ($user->is_filled && $user->userable->valid == 'denied')
            <p class="h4 alert alert-danger">{!! trans('reg-profile.profile_validated_denied') !!}</p>

            @else
            <p>{!! trans('reg-profile.not_enough_data_to_do_a_refeer') !!}</p>

            <p><strong>{!! trans('reg-profile.fix_the_following_errors') !!}:</strong></p>
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

          <div class="tab-pane fade" id="_change-password">
            <h4>{!! trans('reg-profile.change_your_password') !!}</h4>
            <form class="form-vertical" role="form" method="POST" action="{{ route('update_profile'). '#change-password' }}">
              {{ csrf_field() }}
              <text-box-form type="password" code="password" label="{!! trans('reg-profile.new_password') !!}" placeholder="{!! trans('reg-profile.new_password') !!}" value="" required
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}' no-validate></text-box-form>
              <text-box-form type="password" code="password_confirm" label="{!! trans('reg-profile.repeat_new_password') !!}"
                  placeholder="{!! trans('reg-profile.repeat_new_password') !!}" value="" required
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}' no-validate></text-box-form>

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
