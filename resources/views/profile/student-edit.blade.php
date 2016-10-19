@extends('../layouts.app')

@section('page-title') My Profile @endsection
@section('page-class') my-profile @endsection

@section('content')


<div class="container edit-profile">
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
          <li><a href="#contact" data-toggle="tab">Career and Skills</a></li>
          <li><a href="#validation" data-toggle="tab">Validate your profile</a></li>
          <li><a href="#password" data-toggle="tab">Change your password</a></li>
        </ul>
        <div id="profileTab" class="tab-content well">
          <div class="tab-pane active in" id="profile">
            <form class="form-vertical" role="form" method="POST" action="{{ url('/profile#profile') }}">
              {{ csrf_field() }}
              <!-- company_name -->
              <h4>About me</h4>
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <!-- <label for="name">Name</label> -->
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name', $user->name) }}">
                @if ($errors->has('name'))
                <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                <!-- <label for="surname">Surname</label> -->
                <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" value="{{ old('surname', $user->surname) }}">
                @if ($errors->has('surname'))
                <span class="help-block">
                <strong>{{ $errors->first('surname') }}</strong>
                </span>
                @endif
              </div>

              <div class="row">
                <div class="col-sm-6 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <!-- <label for="email">Email</label> -->
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" readonly value="{{ old('email', $user->email) }}">
                  @if ($errors->has('email'))
                  <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="col-sm-6 form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                  <!-- <label for="phone">Phone</label> -->
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ old('phone', $user->phone) }}">
                  @if ($errors->has('phone'))
                  <span class="help-block">
                  <strong>{{ $errors->first('phone') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('nationality') ? ' has-error' : '' }}">
                <!-- <label for="nationality">nationality</label> -->
                <div class="select-holder">
                  <select class="form-control" id="nationality" name="nationality">
                    <option value="" selected>Nationality</option>
                    @foreach ($countries as $code => $nationality)
                      <option value="{{ $code }}" @if($student->nationality == $code) selected @endif >{{ $nationality }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                <label for="birthdate">Birthdate</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Birthdate" value="{{ old('birthdate', $student->birthdate) }}">
                @if ($errors->has('birthdate'))
                <span class="help-block">
                <strong>{{ $errors->first('birthdate') }}</strong>
                </span>
                @endif
              </div>


              <div class="form-group">
                <label for="photo">My Photo</label>
                <input type="file" id="photo" name="photo">
              </div>

              <hr class="separator">
              <h4>Social networks</h4>
              <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                <!-- <label for="facebook">Facebook page url</label> -->
                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook page url" value="{{ old('facebook', $user->facebook) }}"> @if ($errors->has('facebook'))
                <span class="help-block">
                  <strong>{{ $errors->first('facebook') }}</strong>
                </span> @endif
              </div>
              <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                <!-- <label for="twitter">Twitter page url</label> -->
                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter page url" value="{{ old('twitter', $user->twitter) }}"> @if ($errors->has('twitter'))
                <span class="help-block">
                  <strong>{{ $errors->first('twitter') }}</strong>
                </span> @endif
              </div>
              <h4>Address</h4>
              <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <!-- <label for="address">Address</label> -->
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ old('address', $user->address) }}">
                @if ($errors->has('address'))
                <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
                </span>
                @endif
              </div>
              <div class="row">
              <div class="col-sm-4 form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                <!-- <label for="postal_code">Postal Code</label> -->
                <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Postal Code" value="{{ old('postal_code', $user->postal_code) }}">
                @if ($errors->has('postal_code'))
                <span class="help-block">
                <strong>{{ $errors->first('postal_code') }}</strong>
                </span>
                @endif
              </div>
              <div class="col-sm-8 form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                <!-- <label for="city">City</label> -->
                <input type="text" class="form-control" id="city" name="city" placeholder="City" value="{{ old('city', $user->city) }}">
                @if ($errors->has('city'))
                <span class="help-block">
                <strong>{{ $errors->first('city') }}</strong>
                </span>
                @endif
              </div>
              </div>
              <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                <!-- <label for="country">country</label> -->
                <div class="select-holder">
                  <select class="form-control" id="country" name="country">
                    <option value="" selected>Country</option>
                    @foreach ($countries as $code => $country)
                      <option value="{{ $code }}" @if($user->country == $code) selected @endif >{{ $country }}</option>
                    @endforeach
                  </select>
                </div>
                @if ($errors->has('country'))
                <span class="help-block">
                <strong>{{ $errors->first('country') }}</strong>
                </span>
                @endif
              </div>

              <hr class="separator">
              <button type="submit" class="btn btn-primary">Update settings</button>
            </form>
          </div>
          <div class="tab-pane fade" id="contact">
            <form class="form-vertical" role="form" method="POST" action="{{ url('/profile#contact') }}">
            {{ csrf_field() }}

            <h4>Academic information</h4>
            <hr>
            <div class="form-group">
              <label for="europass">Europass curriculum</label>
              <input type="file" id="europass" name="europass">
              @if ($student->curriculum)
                <p class="download-button h4">
                  <a class="btn btn-primary" alt="Download your Europass curriculum" href="{{ URL::to('/profile/curriculum/' . $user->id) }}"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download curriculum</a>
                </p>
              @endif
            </div>
            <hr class="separator">
            @forelse ($student->studies as $study)
            <div class="study">
              <header class="clearfix">
                <h4 class="pull-left">Studies #{{ $loop->index +1 }}</h4>
                <a class="pull-right remove btn-danger btn btn-sm" href="#"><i class="fa fa-close" aria-hidden="true"></i> remove</a>
              </header>
                <div class="form-group{{ $errors->has('institution_name') ? ' has-error' : '' }}">
                  <!-- <label for="institution_name">Institution name</label> -->
                  <input type="text" class="form-control" id="institution_name" name="institution_name" placeholder="Institution name" value="{{ old('institution_name', $study->institution_name) }}">
                  @if ($errors->has('institution_name'))
                  <span class="help-block">
                  <strong>{{ $errors->first('institution_name') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="row">
                  <div class="col-sm-8 form-group{{ $errors->has('studies_name') ? ' has-error' : '' }}">
                    <!-- <label for="studies_name">Institution name</label> -->
                    <input type="text" class="form-control" id="studies_name" name="studies_name" placeholder="Course/Studies name" value="{{ old('studies_name', $study->name) }}">
                    @if ($errors->has('studies_name'))
                    <span class="help-block">
                    <strong>{{ $errors->first('studies_name') }}</strong>
                    </span>
                    @endif
                  </div>
                  <div class="col-sm-4">
                    <div class="select-holder">
                      <select class="form-control" id="country" name="country">
                        <option value="">Level</option>
                        @foreach ($studyLevels as $key => $level)
                          <option value="{{ $key }}" @if ($study->level == $key) selected @endif > {{ $level }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group{{ $errors->has('study_field') ? ' has-error' : '' }}">
                  <div class="select-holder">
                    <select class="form-control" id="study_field" name="study_field">
                        <option value="" selected>Field of studies</option>
                        @foreach ($studyFields as $key => $field)
                          <option value="{{ $key }}" @if ($study->field == $key) selected @endif > {{ $field }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <label for="certificate">Certificate</label>
                  <input type="file" id="certificate" name="certificate">
                  @if ($study->certificate)
                    <p class="download-button h4">
                      <a class="btn btn-primary" alt="Download your certificate" href="{{ URL::to('/profile/certificate/' . $user->id . '/study/' . $study->id) }}"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download Certificate</a>
                    </p>
                  @endif
                </div>
                <hr>
                <div class="form-group">
                  <label for="gradecard">Gradecard</label>
                  <input type="file" id="gradecard" name="gradecard">
                  @if ($study->gradecard)
                    <p class="download-button h4">
                      <a class="btn btn-primary" alt="Download your gradecard" href="{{ URL::to('/profile/gradecard/' . $user->id . '/study/' . $study->id) }}"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download gradecard</a>
                    </p>
                  @endif
                </div>

              @if ($loop->last)
              <hr>
              <p class="text-center">
                <a class="btn btn-default" href="#"><i class="fa fa-plus" aria-hidden="true"></i> add more studies</a>
              </p>
              @endif
                <hr class="separator">
            </div><!-- study -->
            @empty
            <div class="study">
              <header class="clearfix">
                <h4 class="pull-left">Studies 1</h4>
                <a class="hidden pull-right remove btn-danger btn btn-sm" href="#"><i class="fa fa-close" aria-hidden="true"></i> remove</a>
              </header>
              <div class="form-group">
                <!-- <label for="institution_name">Institution name</label> -->
                <input type="text" class="form-control" id="institution_name" name="institution_name" placeholder="Institution name">
              </div>
                <div class="row">
                  <div class="col-sm-8 form-group{{ $errors->has('studies_name') ? ' has-error' : '' }}">
                    <!-- <label for="studies_name">Institution name</label> -->
                    <input type="text" class="form-control" id="studies_name" name="studies_name" placeholder="Course/Studies name">
                  </div>
                  <div class="col-sm-4">
                    <div class="select-holder">
                      <select class="form-control" id="country" name="country">
                        <option value="">Level</option>
                        @foreach ($studyLevels as $key => $level)
                          <option value="{{ $key }}"> {{ $level }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group{{ $errors->has('study_field') ? ' has-error' : '' }}">
                  <div class="select-holder">
                    <select class="form-control" id="study_field" name="study_field">
                        <option value="" selected>Field of studies</option>
                        @foreach ($studyFields as $key => $field)
                          <option value="{{ $key }}"> {{ $field }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <label for="certificate">Certificate</label>
                  <input type="file" id="certificate" name="certificate">
                </div>
                <hr>
                <div class="form-group">
                  <label for="gradecard">Gradecard</label>
                  <input type="file" id="gradecard" name="gradecard">
                </div>
                <hr>
                <p class="text-center">
                  <a class="btn btn-default" href="#"><i class="fa fa-plus" aria-hidden="true"></i> add more studies</a>
                </p>
                <hr class="separator">
            </div><!-- study -->
            @endforelse
            @forelse ($student->training as $training)
              <div class="training">
                <header class="clearfix">
                  <h4 class="pull-left">Training #{{ $loop->index +1 }}</h4>
                  <a class="pull-right remove btn-danger btn btn-sm" href="#"><i class="fa fa-close" aria-hidden="true"></i> remove</a>
                </header>
                <a class="pull-right remove btn-danger btn btn-sm" href="#"><i class="fa fa-close" aria-hidden="true"></i> remove</a>
                </p>
                <div class="form-group{{ $errors->has('training_name') ? ' has-error' : '' }}">
                <!-- <label for="training_name">Email</label> -->
                <input type="email" class="form-control" id="training_name" name="training_name" placeholder="Course name" value="{{ old('training_name', $training->name) }}">
                  @if ($errors->has('training_name'))
                  <span class="help-block">
                  <strong>{{ $errors->first('training_name') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('training_date') ? ' has-error' : '' }}">
                  <label for="training_date">Date</label>
                  <input type="date" class="form-control" id="training_date" name="training_date" placeholder="training_date" value="{{ old('training_date', $training->date) }}">
                  @if ($errors->has('training_date'))
                  <span class="help-block">
                  <strong>{{ $errors->first('training_date') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="training_certificate">Certificate</label>
                  @if ($study->certificate)
                    <p>
                      <a class="btn btn-primary" alt="Download your certificate" href="{{ URL::to('/profile/certificate/' . $user->id . '/training/' . $training->id) }}"><i class="fa fa-cloud-download" aria-hidden="true"></i>Download</a>
                    </p>
                  @endif
                  <input type="file" id="training_certificate" name="training_certificate">
                </div>
                @if ($loop->last)
                <p class="text-center">
                  <a class="btn btn-default" href="#"><i class="fa fa-plus" aria-hidden="true"></i> add more training</a>
                </p>
                @endif
                <hr class="separator">
              </div><!-- end of training -->
            @empty
              <div class="training">
                <header class="clearfix">
                  <h4 class="pull-left">Training #1</h4>
                  <a class="hidden pull-right remove btn-danger btn btn-sm" href="#"><i class="fa fa-close" aria-hidden="true"></i> remove</a>
                </header>
                <div class="form-group">
                  <input type="email" class="form-control" id="training_name" name="training_name" placeholder="Course name">
                </div>

                <div class="form-group{{ $errors->has('training_date') ? ' has-error' : '' }}">
                  <label for="training_date">Date</label>
                  <input type="date" class="form-control" id="training_date" name="training_date" placeholder="training_date">
                </div>
                <div class="form-group">
                  <label for="training_certificate">Certificate</label>
                  <input type="file" id="training_certificate" name="training_certificate">
                </div>
                <p class="text-center">
                  <a class="btn btn-default" href="#"><i class="fa fa-plus" aria-hidden="true"></i> add more training</a>
                </p>
                <hr class="separator">
              </div><!-- end of training -->
            @endforelse
              @forelse ($student->languages as $language)
              <div class="language">
                <header class="clearfix">
                  <h4 class="pull-left">Language #{{ $loop->index +1 }}</h4>
                  <a class="pull-right remove btn-danger btn btn-sm" href="#"><i class="fa fa-close" aria-hidden="true"></i> remove</a>
                </header>
                <div class="form-group{{ $errors->has('language-name') ? ' has-error' : '' }}">
                  <div class="select-holder">
                    <select class="form-control" id="language-name" name="language-name">
                      <option value="" selected>Language</option>
                      @foreach ($languages as $code => $langdata)
                        <option
                            @if ($language->name == $code) selected @endif
                            value="{{ $code }}">{{ $langdata['name'] }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group{{ $errors->has('language-level') ? ' has-error' : '' }}">
                  <div class="select-holder">
                    <select class="form-control" id="language-level" name="language-level">
                      <option value="" selected>Language level</option>
                      @foreach ($languageLevels as $key => $level)
                        <option
                            @if ($language->level == $key) selected @endif
                            value="{{ $key }}">{{ $level }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <label for="certificate">Certificate</label>
                  @if ($study->certificate)
                    <p>
                      <a class="btn btn-primary" alt="Download your certificate" href="{{ URL::to('/profile/certificate/' . $user->id . '/language/' . $language->id) }}"><i class="fa fa-cloud-download" aria-hidden="true"></i>Download</a>
                    </p>
                  @endif
                  <input type="file" id="certificate" name="certificate">
                </div>                <hr>
              </div><!-- end of language -->
              @if ($loop->last)
              <p class="text-center">
                <a class="btn btn-default" href="#"><i class="fa fa-plus" aria-hidden="true"></i> add more languages</a>
              </p>
              @endif
              @empty
                <div class="language">
                  <header class="clearfix">
                    <h4 class="pull-left">Language #1</h4>
                    <a class="pull-right hidden remove btn-danger btn btn-sm" href="#"><i class="fa fa-close" aria-hidden="true"></i> remove</a>
                  </header>
                  <div class="form-group">
                    <div class="select-holder">
                      <select class="form-control" id="language-name" name="language-name">
                        <option value="" selected>Language</option>
                        @foreach ($languages as $code => $langdata)
                          <option value="{{ $code }}">{{ $langdata['name'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-group{{ $errors->has('language-level') ? ' has-error' : '' }}">
                    <div class="select-holder">
                      <select class="form-control" id="language-level" name="language-level">
                        <option value="" selected>Language level</option>
                        @foreach ($languageLevels as $key => $level)
                          <option value="{{ $key }}">{{ $level }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label for="certificate">Certificate</label>
                    <input type="file" id="certificate" name="certificate">
                  </div>
                  <hr>
                </div><!-- end of language -->
                <p class="text-center">
                  <a class="btn btn-default" href="#"><i class="fa fa-plus" aria-hidden="true"></i> add more languages</a>
                </p>
              @endforelse
              <hr class="separator">
              @foreach ($student->experiences as $experience)
              <div class="work_experience">
                <header class="clearfix">
                  <h4 class="pull-left">Work Experience #{{ $loop->index +1 }}</h4>
                  <a class="pull-right remove btn-danger btn btn-sm" href="#"><i class="fa fa-close" aria-hidden="true"></i> remove</a>
                </header>
                <div class="row">
                  <div class="col-sm-6 form-group{{ $errors->has('work_from') ? ' has-error' : '' }}">
                    <label for="work_from">From</label>
                    <input type="date" class="form-control" id="work_from" name="work_from" placeholder="work_from" value="{{ old('work_from', $experience->from) }}">
                    @if ($errors->has('work_from'))
                    <span class="help-block">
                    <strong>{{ $errors->first('work_from') }}</strong>
                    </span>
                    @endif
                  </div>

                  <div class="col-sm-6 form-group{{ $errors->has('work_to') ? ' has-error' : '' }}">
                    <label for="work_to">To</label>
                    <input type="date" class="form-control" id="work_to" name="work_to" placeholder="work_to" value="{{ old('work_to', $experience->until) }}">
                    @if ($errors->has('work_to'))
                    <span class="help-block">
                    <strong>{{ $errors->first('work_to') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group{{ $errors->has('work_company_name') ? ' has-error' : '' }}">
                <!-- <label for="work_company_name">Company name</label> -->
                <input type="email" class="form-control" id="work_company_name" name="work_company_name" placeholder="Company name" value="{{ old('work_company_name', $experience->company) }}">
                  @if ($errors->has('work_company_name'))
                  <span class="help-block">
                  <strong>{{ $errors->first('work_company_name') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('work_position') ? ' has-error' : '' }}">
                <!-- <label for="work_position">Position</label> -->
                <input type="email" class="form-control" id="work_position" name="work_position" placeholder="Position" value="{{ old('work_position', $experience->position) }}">
                  @if ($errors->has('work_position'))
                  <span class="help-block">
                  <strong>{{ $errors->first('work_position') }}</strong>
                  </span>
                  @endif
                </div>
              </div><!-- end of Work_experience -->
              @if ($loop->last)
              <hr>
              <p class="text-center">
                <a class="btn btn-default" href="#"><i class="fa fa-plus" aria-hidden="true"></i> add more work experiences</a>
              </p>
              @endif
              <hr class="separator">

              @endforeach
              <div class="form-group{{ $errors->has('profesional_skills') ? ' has-error' : '' }}">
                <label for="profesional_skills">Professional skills</label>
                <ul class="selected-skills list-unstyled">
                  @foreach ($student->professionalSkills as $skill)
                    <li class="btn btn-default"><input type="hidden" name="profesional_skills" value="{{ $skill->id }}" > {{ $skill->name }}
                      <a title="remove" href="javascript:void(0)"><i class="fa fa-close" aria-hidden="true"></i></a>
                    </li>
                  @endforeach
                </ul>
                <input type="text" class="form-control" id="profesional_skills" placeholder="Add a professional skill" value="">
                @if ($errors->has('profesional_skills'))
                  <span class="help-block">
                  <strong>{{ $errors->first('profesional_skills') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('personal_skills') ? ' has-error' : '' }}">
                <label for="personal_skills">Personal skills (max 6)</label>

                <ul class="selected-skills list-unstyled">
                  @foreach ($student->personalSkills as $skill)
                    <li class="btn btn-default"><input type="hidden" name="profesional_skills" value="{{ $skill->id }}" > {{ $skill[App::getLocale()] }}
                    <a title="remove" href="javascript:void(0)"><i class="fa fa-close" aria-hidden="true"></i></a>
                    </li>
                  @endforeach
                </ul>

                <input type="text" class="form-control" name="personal_skills" placeholder="Personal skills" value="">
                @if ($errors->has('personal_skills'))
                  <span class="help-block">
                  <strong>{{ $errors->first('personal_skills') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('talent') ? ' has-error' : '' }}">
                <label for="talent">My talent (max 300 characters)</label>
                <textarea class="form-control" id="talent" name="talent" placeholder="Describe briefly your talent.">{{ old('talent', $student->talent) }}</textarea>
                @if ($errors->has('talent'))
                <span class="help-block">
                <strong>{{ $errors->first('talent') }}</strong>
                </span>
                @endif
              </div>

              <hr>
              <button type="submit" class="btn btn-primary">Update settings</button>
            </form>
          </div>

          <div class="tab-pane fade" id="validation">
            <h4>Validate your profile</h4>
            <form class="form-vertical" role="form" method="POST" action="{{ url('/profile#validation') }}">
              {{ csrf_field() }}
              <div class="form-group{{ $errors->has('validator_name') ? ' has-error' : '' }}">
                <!-- <label for="validator_name">New validator_name</label> -->
                <input type="text" class="form-control" id="validator_name" name="validator_name" placeholder="Validator name">
                @if ($errors->has('validator_name'))
                <span class="help-block">
                <strong>{{ $errors->first('validator_name') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('validator_email') ? ' has-error' : '' }}">
                <!-- <label for="validator_email">New validator_email</label> -->
                <input type="email" class="form-control" id="validator_email" name="validator_email" placeholder="Validator email">
                @if ($errors->has('validator_email'))
                <span class="help-block">
                <strong>{{ $errors->first('validator_email') }}</strong>
                </span>
                @endif
              </div>
              <hr>
              <button type="submit" class="btn btn-primary">Request a profile validation</button>
            </form>
          </div>

          <div class="tab-pane fade" id="password">
            <h4>Change your password</h4>
            <form class="form-vertical" role="form" method="POST" action="{{ url('/profile#password') }}">
              {{ csrf_field() }}
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <!-- <label for="password">New Password</label> -->
                <input type="password" class="form-control" id="password" name="password" placeholder="New password">
                @if ($errors->has('password'))
                <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('password_confirm') ? ' has-error' : '' }}">
                <!-- <label for="password_confirm">Repeat new Password</label> -->
                <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Repeat new password">
                @if ($errors->has('password_confirm'))
                <span class="help-block">
                <strong>{{ $errors->first('password_confirm') }}</strong>
                </span>
                @endif
              </div>
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