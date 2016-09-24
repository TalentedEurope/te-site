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
          <li><a href="#contact" data-toggle="tab">Alternative Contact</a></li>
          <li><a href="#password" data-toggle="tab">Change your password</a></li>
        </ul>
        <div id="profileTab" class="tab-content well">
          <div class="tab-pane active in" id="profile">
            <form class="form-vertical" role="form" method="POST" action="{{ url('/profile#profile') }}">
              {{ csrf_field() }}
              <h4>About</h4>
              <div class="row">
                <div class="col-sm-4 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <div class="select-holder">
                    <select class="form-control" id="type" name="type">
                      <option value="" selected>Institution Type</option>
                      <option>HEI</option>
                      <option>VET</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-8 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <div class="radio-holder">
                    <label class="radio-inline"><input type="radio" name="subtype">UFA</label>
                    <label class="radio-inline"><input type="radio" name="subtype">HIS</label>
                  </div>
                </div>
              </div>
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <!-- <label for="name">Name</label> -->
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="">
                @if ($errors->has('name'))
                <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <!-- <label for="email">Email</label> -->
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="">
                @if ($errors->has('email'))
                <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('person_in_charge') ? ' has-error' : '' }}">
                <!-- <label for="Legal representative">Name</label> -->
                <input type="text" class="form-control" id="person_in_charge" name="person_in_charge" placeholder="Legal representative" value="">
                @if ($errors->has('person_in_charge'))
                <span class="help-block">
                <strong>{{ $errors->first('person_in_charge') }}</strong>
                </span>
                @endif
              </div>
              <div class="row">
                <div class="col-sm-6 form-group{{ $errors->has('fiscal_id') ? ' has-error' : '' }}">
                  <!-- <label for="Fiscal ID">Name</label> -->
                  <input type="text" class="form-control" id="fiscal_id" name="fiscal_id" placeholder="Fiscal ID" value="">
                  @if ($errors->has('fiscal_id'))
                  <span class="help-block">
                  <strong>{{ $errors->first('fiscal_id') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="col-sm-6 form-group{{ $errors->has('PIC') ? ' has-error' : '' }}">
                  <!-- <label for="Fiscal ID">Name</label> -->
                  <input type="text" class="form-control" id="PIC" name="PIC" placeholder="PIC" value="">
                  @if ($errors->has('PIC'))
                  <span class="help-block">
                  <strong>{{ $errors->first('PIC') }}</strong>
                  </span>
                  @endif
                </div>

              </div>

              <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" id="logo" name="logo">
              </div>

              <div class="form-group">
                <label for="certificate">Certificate of authenticity</label>
                <input type="file" id="certificate" name="certificate">
                <p class="help-block">Signature and stamp required <br/><a href="{{ asset('docs/certificate_template.pdf') }} ">Download template. </a></p>
              </div>


              <hr>
              <h4>Address</h4>
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
            <h4>Alternative contact</h4>
            <label>Setup an alternative contact user that will receive all the notifications instead of the main account</label>
            <form class="form-vertical" role="form" method="POST" action="{{ url('/profile#password') }}">
              {{ csrf_field() }}
              <div class="form-group{{ $errors->has('contact_name') ? ' has-error' : '' }}">
                <!-- <label for="contact_name">Name</label> -->
                <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Name" value="">
                @if ($errors->has('contact_name'))
                <span class="help-block">
                <strong>{{ $errors->first('contact_name') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('contact_email') ? ' has-error' : '' }}">
                <!-- <label for="email">Email</label> -->
                <input type="email" class="form-control" id="contact_email" name="contact_email" placeholder="Contact email" value="">
                @if ($errors->has('contact_email'))
                <span class="help-block">
                <strong>{{ $errors->first('contact_email') }}</strong>
                </span>
                @endif
              </div>
              <hr>
              <button type="submit" class="btn btn-primary">Update settings</button>
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
