@extends('../layouts.app')

@section('page-title') My Profile @endsection
@section('page-class') my-profile @endsection

@section('content')

<div class="container edit-profile">
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <h1 class="page-title">My profile</h1>
      <div class="col-sm-4 col-md-4 col-xs-12">
        <img src="http://placehold.it/400x400" alt="" class="img-responsive" />
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
              <p><span class="h4">About me</span></p>
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <!-- <label for="name">Name</label> -->
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="">
                @if ($errors->has('name'))
                <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                <!-- <label for="surname">Surname</label> -->
                <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" value="">
                @if ($errors->has('surname'))
                <span class="help-block">
                <strong>{{ $errors->first('surname') }}</strong>
                </span>
                @endif
              </div>

              <div class="row">
                <div class="col-sm-6 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <!-- <label for="email">Email</label> -->
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="">
                  @if ($errors->has('email'))
                  <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="col-sm-6 form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                  <!-- <label for="phone">Phone</label> -->
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="">
                  @if ($errors->has('phone'))
                  <span class="help-block">
                  <strong>{{ $errors->first('phone') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('nationality') ? ' has-error' : '' }}">
                <!-- <label for="nationality">Nationality</label> -->
                <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Nationality" value="">
                @if ($errors->has('nationality'))
                <span class="help-block">
                <strong>{{ $errors->first('nationality') }}</strong>
                </span>
                @endif
              </div>


              <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                <label for="birthdate">Birthdate</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Birthdate" value="">
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

              <hr>
              <h4>Social networks</h4>
              <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                <!-- <label for="facebook">Facebook page url</label> -->
                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook page url" value=""> @if ($errors->has('facebook'))
                <span class="help-block">
                  <strong>{{ $errors->first('facebook') }}</strong>
                </span> @endif
              </div>
              <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                <!-- <label for="twitter">Twitter page url</label> -->
                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter page url" value=""> @if ($errors->has('twitter'))
                <span class="help-block">
                  <strong>{{ $errors->first('twitter') }}</strong>
                </span> @endif
              </div>
              <p><span class="h4">Address</span></p>
              <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <!-- <label for="address">Address</label> -->
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="">
                @if ($errors->has('address'))
                <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
                </span>
                @endif
              </div>
              <div class="row">
              <div class="col-sm-4 form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                <!-- <label for="postal_code">Postal Code</label> -->
                <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Postal Code" value="">
                @if ($errors->has('postal_code'))
                <span class="help-block">
                <strong>{{ $errors->first('postal_code') }}</strong>
                </span>
                @endif
              </div>
              <div class="col-sm-8 form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                <!-- <label for="city">City</label> -->
                <input type="text" class="form-control" id="city" name="city" placeholder="City" value="">
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
                    <option>Spain</option>
                    <option>United Kingdom</option>
                    <option>France</option>
                    <option>Italy</option>
                  </select>
                </div>
                @if ($errors->has('country'))
                <span class="help-block">
                <strong>{{ $errors->first('country') }}</strong>
                </span>
                @endif
              </div>

              <hr>
              <button type="submit" class="btn btn-primary">Update settings</button>
            </form>
          </div>
          <div class="tab-pane fade" id="contact">
            <p><span class="h4">Academic information</span></p>
            <hr>
            <div class="form-group">
              <label for="europass">Europass curriculum</label>
              <input type="file" id="europass" name="europass">
            </div>
            <hr>
            <div class="study">
              <p><span class="h4">Studies #1</span> <a class="pull-right" href="#"><i class="fa fa-plus-square" aria-hidden="true"></i> add more</a></p>
              <form class="form-vertical" role="form" method="POST" action="{{ url('/profile#contact') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('institution_name') ? ' has-error' : '' }}">
                  <!-- <label for="institution_name">Institution name</label> -->
                  <input type="text" class="form-control" id="institution_name" name="institution_name" placeholder="Institution name" value="">
                  @if ($errors->has('institution_name'))
                  <span class="help-block">
                  <strong>{{ $errors->first('institution_name') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="row">
                  <div class="col-sm-8 form-group{{ $errors->has('studies_name') ? ' has-error' : '' }}">
                    <!-- <label for="studies_name">Institution name</label> -->
                    <input type="text" class="form-control" id="studies_name" name="studies_name" placeholder="Course/Studies name" value="">
                    @if ($errors->has('studies_name'))
                    <span class="help-block">
                    <strong>{{ $errors->first('studies_name') }}</strong>
                    </span>
                    @endif
                  </div>
                  <div class="col-sm-4">
                    <div class="select-holder">
                      <select class="form-control" id="country" name="country">
                        <option value="" selected>Level</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="certificate">Certificate</label>
                  <input type="file" id="certificate" name="certificate">
                </div>

                <div class="form-group">
                  <label for="gradecard">Gradecard</label>
                  <input type="file" id="gradecard" name="gradecard">
                </div>

                <div class="form-group{{ $errors->has('study_field') ? ' has-error' : '' }}">
                  <div class="select-holder">
                    <select class="form-control" id="study_field" name="study_field">
                      <option value="" selected>Field of studies</option>
                    </select>
                  </div>
                </div>
                <hr>
              </div><!-- study -->
              <div class="language">
                <p><span class="h4">Language #1</span><a class="pull-right" href="#"><i class="fa fa-plus-square" aria-hidden="true"></i> add more</a></p>

                <div class="form-group{{ $errors->has('language_name') ? ' has-error' : '' }}">
                <!-- <label for="email">Email</label> -->
                <input type="email" class="form-control" id="language_name" name="language_name" placeholder="Language name" value="">
                  @if ($errors->has('language_name'))
                  <span class="help-block">
                  <strong>{{ $errors->first('language_name') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group{{ $errors->has('language-level') ? ' has-error' : '' }}">
                  <div class="select-holder">
                    <select class="form-control" id="language-level" name="language-level">
                      <option value="" selected>Level</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="certificate">Certificate</label>
                  <input type="file" id="certificate" name="certificate">
                </div>
                <hr>
              </div><!-- end of language -->

              <div class="training">
                <p><span class="h4">Training #1</span><a class="pull-right" href="#"><i class="fa fa-plus-square" aria-hidden="true"></i> add more</a></p>

                <div class="form-group{{ $errors->has('training_name') ? ' has-error' : '' }}">
                <!-- <label for="training_name">Email</label> -->
                <input type="email" class="form-control" id="training_name" name="training_name" placeholder="Course name" value="">
                  @if ($errors->has('training_name'))
                  <span class="help-block">
                  <strong>{{ $errors->first('training_name') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('training_date') ? ' has-error' : '' }}">
                  <label for="training_date">Date</label>
                  <input type="date" class="form-control" id="training_date" name="training_date" placeholder="training_date" value="">
                  @if ($errors->has('training_date'))
                  <span class="help-block">
                  <strong>{{ $errors->first('training_date') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="training_certificate">Certificate</label>
                  <input type="file" id="training_certificate" name="training_certificate">
                </div>
                <hr>
              </div><!-- end of training -->

              <div class="work_experience">
                <p><span class="h4">Work Experience #1</span><a class="pull-right" href="#"><i class="fa fa-plus-square" aria-hidden="true"></i> add more</a></p>

                <div class="row">
                  <div class="col-sm-6 form-group{{ $errors->has('work_from') ? ' has-error' : '' }}">
                    <label for="work_from">From</label>
                    <input type="date" class="form-control" id="work_from" name="work_from" placeholder="work_from" value="">
                    @if ($errors->has('work_from'))
                    <span class="help-block">
                    <strong>{{ $errors->first('work_from') }}</strong>
                    </span>
                    @endif
                  </div>

                  <div class="col-sm-6 form-group{{ $errors->has('work_to') ? ' has-error' : '' }}">
                    <label for="work_to">To</label>
                    <input type="date" class="form-control" id="work_to" name="work_to" placeholder="work_to" value="">
                    @if ($errors->has('work_to'))
                    <span class="help-block">
                    <strong>{{ $errors->first('work_to') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group{{ $errors->has('work_company_name') ? ' has-error' : '' }}">
                <!-- <label for="work_company_name">Company name</label> -->
                <input type="email" class="form-control" id="work_company_name" name="work_company_name" placeholder="Company name" value="">
                  @if ($errors->has('work_company_name'))
                  <span class="help-block">
                  <strong>{{ $errors->first('work_company_name') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('work_position') ? ' has-error' : '' }}">
                <!-- <label for="work_position">Position</label> -->
                <input type="email" class="form-control" id="work_position" name="work_position" placeholder="Position" value="">
                  @if ($errors->has('work_position'))
                  <span class="help-block">
                  <strong>{{ $errors->first('work_position') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('training_date') ? ' has-error' : '' }}">
                  <label for="training_date">Date</label>
                  <input type="date" class="form-control" id="training_date" name="training_date" placeholder="training_date" value="">
                  @if ($errors->has('training_date'))
                  <span class="help-block">
                  <strong>{{ $errors->first('training_date') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="training_certificate">Certificate</label>
                  <input type="file" id="training_certificate" name="training_certificate">
                </div>
                <hr>
              </div><!-- end of Work_experience -->

              <div class="form-group{{ $errors->has('profesional_skills') ? ' has-error' : '' }}">
                <label for="email">Professional skills</label>
                <input type="email" class="form-control" id="profesional_skills" name="profesional_skills" placeholder="Professional skills" value="">
                @if ($errors->has('profesional_skills'))
                  <span class="help-block">
                  <strong>{{ $errors->first('profesional_skills') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('personal_skills') ? ' has-error' : '' }}">
                <label for="email">Personal skills (max 6 skills)</label>
                <input type="email" class="form-control" id="personal_skills" name="personal_skills" placeholder="Personal skills" value="">
                @if ($errors->has('personal_skills'))
                  <span class="help-block">
                  <strong>{{ $errors->first('personal_skills') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('talent') ? ' has-error' : '' }}">
                <label for="talent">My talent (max 300 characters)</label>
                <textarea class="form-control" id="talent" name="talent" placeholder="Describe briefly your talent."></textarea>
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
            <p><span class="h4">Validate your profile</span></p>
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
            <p><span class="h4">Change your password</span></p>
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