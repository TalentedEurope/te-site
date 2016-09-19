@extends('../layouts.app')

@section('page-title') My Profile @endsection
@section('page-class') my-profile @endsection

@section('content')

<div class="container edit-profile">
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <h1 class="col-sm-8 col-md-8 col-xs-12 col-sm-offset-2 page-title">My profile</h1>
      <div class="col-sm-8 col-md-8 col-xs-12 col-sm-offset-2">
        <!-- Content -->
        <ul id="profile-tabs" class="nav nav-tabs" data-hashtab="true">
          <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
          <li><a href="#password" data-toggle="tab">Change your password</a></li>
        </ul>
        <div id="profileTab" class="tab-content well">
          <div class="tab-pane active in" id="profile">
            <form class="form-vertical" role="form" method="POST" action="{{ url('/profile#profile') }}">
              {{ csrf_field() }}
              <!-- company_name -->
              <h4>About</h4>
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
                <!-- <label for="surname">surname</label> -->
                <input type="text" class="form-control" id="surname" name="surname" placeholder="surname" value="">
                @if ($errors->has('surname'))
                <span class="help-block">
                  <strong>{{ $errors->first('surname') }}</strong>
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

              <hr>

              <h4>My Institution</h4>
              <div class="form-group">
                <!-- <label for="department">Institution</label> -->
                <input id="institution" class="form-control" readonly="true" required name="institution"  class="{{ $errors->has('email') ? ' has-error' : '' }}" type="text" placeholder="Institution" value="Institution: IES Puerto de la Cruz">
              </div>

              <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                <!-- <label for="department">department</label> -->
                <input type="text" class="form-control" id="department" name="department" placeholder="Department" value="">
                @if ($errors->has('department'))
                <span class="help-block">
                  <strong>{{ $errors->first('department') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                <!-- <label for="position">position</label> -->
                <input type="text" class="form-control" id="position" name="position" placeholder="Position" value="">
                @if ($errors->has('position'))
                <span class="help-block">
                  <strong>{{ $errors->first('position') }}</strong>
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