@extends('../layouts.app')

@section('page-title') My Profile @endsection
@section('page-class') my-profile @endsection

@section('meta')
  <meta id="token" content="{{ $token }}" />
@endsection

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
          <li><a href="#contact" data-toggle="tab">Contact Person</a></li>
          <li><a href="#password" data-toggle="tab">Change your password</a></li>
        </ul>
        <div id="profileTab" class="tab-content well">
          <div class="tab-pane active in" id="profile">
          <form enctype='multipart/form-data'  class="form-vertical" role="form" method="POST" action="{{ route('update_profile'). '#profile' }}" >
              {{ csrf_field() }}
              <!-- name -->
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

              <div class="form-group{{ $errors->has('name') ? ' alert alert-danger' : '' }}">
                <!-- <label for="name">Name</label> -->
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name', $user->name) }}">
                @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>

              <div class="row">
                <div class="col-sm-6 form-group{{ $errors->has('fiscal_id') ? ' alert alert-danger' : '' }}">
                    <!-- <label for="Legal representative">Name</label> -->
                    <input type="text" class="form-control" id="fiscal_id" name="fiscal_id" placeholder="Fiscal id" value="{{ old('fiscal_id', $company->fiscal_id) }}"> @if ($errors->has('fiscal_id'))
                    <span class="help-block">
                      <strong>{{ $errors->first('fiscal_id') }}</strong>
                    </span> @endif
                </div>

                <div class="col-sm-6 form-group{{ $errors->has('overseer') ? ' alert alert-danger' : '' }}">
                  <!-- <label for="Legal representative">Name</label> -->
                  <input type="text" class="form-control" id="overseer" name="overseer" placeholder="Legal representative" value="{{ old('overseer', $company->overseer) }}"> @if ($errors->has('overseer'))
                  <span class="help-block">
                    <strong>{{ $errors->first('overseer') }}</strong>
                  </span> @endif
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6 form-group{{ $errors->has('email') ? ' alert alert-danger' : '' }}">
                  <!-- <label for="email">Email</label> -->
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" readonly value="{{ old('email', $user->email) }}"> @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span> @endif
                </div>
                <div class="col-sm-6 form-group{{ $errors->has('phone') ? ' alert alert-danger' : '' }}">
                  <!-- <label for="phone">Phone</label> -->
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ old('phone', $user->phone) }}">
                  @if ($errors->has('phone'))
                  <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('activity') ? ' alert alert-danger' : '' }}">
                <!-- <label for="activity">activity</label> -->
                <div class="select-holder">
                  <select class="form-control" id="activity" name="activity">
                    <option value="" selected>Activity Sector</option>
                    @foreach ($activities as $code => $activity)
                      <option value="{{ $code }}" @if($company->activity == $code) selected @endif >{{ $activity }}</option>
                    @endforeach
                  </select>
                </div>
                @if ($errors->has('activity'))
                <span class="help-block">
                  <strong>{{ $errors->first('activity') }}</strong>
                </span> @endif
              </div>
              <div class="form-group">
                <label for="image">Company Logo</label>
                <input type="file" id="image" name="image">
              </div>
              <hr class="separator">
              <h4>Social networks and website</h4>
              <div class="form-group{{ $errors->has('facebook') ? ' alert alert-danger' : '' }}">
                <!-- <label for="facebook">Facebook page url</label> -->
                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook page url" value="{{ old('facebook', $user->facebook) }}"> @if ($errors->has('facebook'))
                <span class="help-block">
                  <strong>{{ $errors->first('facebook') }}</strong>
                </span> @endif
              </div>
              <div class="form-group{{ $errors->has('twitter') ? ' alert alert-danger' : '' }}">
                <!-- <label for="twitter">Twitter page url</label> -->
                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter page url" value="{{ old('twitter', $user->twitter) }}"> @if ($errors->has('twitter'))
                <span class="help-block">
                  <strong>{{ $errors->first('twitter') }}</strong>
                </span> @endif
              </div>
              <div class="form-group{{ $errors->has('linkedin') ? ' alert alert-danger' : '' }}">
                <!-- <label for="linkedin">linkedin page url</label> -->
                <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Linkedin page url" value="{{ old('linkedin', $user->linkedin) }}"> @if ($errors->has('linkedin'))
                <span class="help-block">
                  <strong>{{ $errors->first('linkedin') }}</strong>
                </span> @endif
              </div>
              <div class="form-group{{ $errors->has('website') ? ' alert alert-danger' : '' }}">
                <!-- <label for="website">website page url</label> -->
                <input type="text" class="form-control" id="website" name="website" placeholder="Website url" value="{{ old('website', $company->website) }}"> @if ($errors->has('website'))
                <span class="help-block">
                  <strong>{{ $errors->first('website') }}</strong>
                </span> @endif
              </div>
              <hr class="separator">
              <h4>Address</h4>
              <div class="form-group{{ $errors->has('address') ? ' alert alert-danger' : '' }}">
                <!-- <label for="address">Address</label> -->
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ old('address', $user->address) }}"> @if ($errors->has('address'))
                <span class="help-block">
                  <strong>{{ $errors->first('address') }}</strong>
                </span> @endif
              </div>
              <div class="row">
                <div class="col-sm-4 form-group{{ $errors->has('postal_code') ? ' alert alert-danger' : '' }}">
                  <!-- <label for="postal_code">Postal Code</label> -->
                  <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Postal Code" value="{{ old('postal_code', $user->postal_code) }}"> @if ($errors->has('postal_code'))
                  <span class="help-block">
                    <strong>{{ $errors->first('postal_code') }}</strong>
                  </span> @endif
                </div>
                <div class="col-sm-8 form-group{{ $errors->has('city') ? ' alert alert-danger' : '' }}">
                  <!-- <label for="city">City</label> -->
                  <input type="text" class="form-control" id="city" name="city" placeholder="City" value="{{ old('city', $user->city) }}"> @if ($errors->has('city'))
                  <span class="help-block">
                    <strong>{{ $errors->first('city') }}</strong>
                  </span> @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('country') ? ' alert alert-danger' : '' }}">
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
                </span> @endif
              </div>
              <hr class="separator">
              <div class="form-group{{ $errors->has('talent') ? ' alert alert-danger' : '' }}">
                <label for="talent">What is talent for you? (Max 300 characters)</label>
                <textarea class="form-control" id="talent" name="talent" placeholder="Explain us what is talent for you in a few words (max 300).">{{ old('talent', $company->talent) }}</textarea>
                <?php $errors->has('talent') ?>
                @if ($errors->has('talent'))
                <span class="help-block">
                  <strong>{{ $errors->first('talent') }}</strong>
                </span> @endif
              </div>
              <div class="form-group{{ $errors->has('personalSkills') ? ' alert alert-danger' : '' }}">
                <label for="personalSkills">Desired personal skills max: 6</label>
                <ul class="selected-skills list-unstyled">
                  @foreach ($company->personalSkills as $skill)
                    <li class="btn btn-default"><input type="hidden" name="personalSkills[]" value="{{ $skill->id }}" > {{ $skill[App::getLocale()] }}
                    <a title="remove" href="javascript:void(0)"><i class="fa fa-close" aria-hidden="true"></i></a>
                    </li>
                  @endforeach
                </ul>
                <textarea class="form-control" id="desired_skills" name="desired_skills" placeholder="A list of the most valuable skills for the company"></textarea>
                @if ($errors->has('personalSkills'))
                <span class="help-block">
                  <strong>{{ $errors->first('personalSkills') }}</strong>
                </span> @endif
              </div>
              <hr>
              <button type="submit" class="btn btn-primary">Update settings</button>
            </form>
          </div>
          <div class="tab-pane fade" id="contact">
            <h4>Contact person</h4>
            <label>Setup an alternative contact user that will receive all the notifications instead of the main account</label>
            <form class="form-vertical" role="form" method="POST" action="{{ route('update_profile'). '#contact' }}" >
              {{ csrf_field() }}
              <div class="form-group{{ $errors->has('notification_name') ? ' alert alert-danger' : '' }}">
                <!-- <label for="notification_name">Name</label> -->
                <input type="text" class="form-control" id="notification_name" name="notification_name" placeholder="Name" value="{{ old('notification_name', $company->notification_name) }}"> @if ($errors->has('notification_name'))
                <span class="help-block">
                  <strong>{{ $errors->first('notification_name') }}</strong>
                </span> @endif
              </div>
              <div class="form-group{{ $errors->has('notification_email') ? ' alert alert-danger' : '' }}">
                <!-- <label for="email">Email</label> -->
                <input type="email" class="form-control" id="notification_email" name="notification_email" placeholder="Contact email" value="{{ old('contact_name', $company->notification_email) }}"> @if ($errors->has('notification_email'))
                <span class="help-block">
                  <strong>{{ $errors->first('notification_email') }}</strong>
                </span> @endif
              </div>
              <hr>
              <button type="submit" class="btn btn-primary">Update settings</button>
            </form>
          </div>
          <div class="tab-pane fade" id="password">
            <p><span class="h4">Change your password</span></p>
            <form class="form-vertical" role="form" method="POST" action="{{ route('update_profile'). '#password' }}">
              {{ csrf_field() }}
              <div class="form-group{{ $errors->has('password') ? ' alert alert-danger' : '' }}">
                <!-- <label for="password">New Password</label> -->
                <input type="password" class="form-control" id="password" name="password" placeholder="New password"> @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span> @endif
              </div>
              <div class="form-group{{ $errors->has('password_confirm') ? ' alert alert-danger' : '' }}">
                <!-- <label for="password_confirm">Repeat new Password</label> -->
                <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Repeat new password"> @if ($errors->has('password_confirm'))
                <span class="help-block">
                  <strong>{{ $errors->first('password_confirm') }}</strong>
                </span> @endif
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
