@extends('../layouts.app')

@section('page-title') My Profile @endsection
@section('page-class') my-profile @endsection

@section('content')

@section('meta')
  <meta id="token" content="{{ $token }}" />
@endsection

<div class="container v-container edit-profile">
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <h1 class="col-sm-8 col-md-8 col-xs-12 col-sm-offset-2 page-title">My profile</h1>
      <div class="col-sm-8 col-md-8 col-xs-12 col-sm-offset-2">
        <!-- Content -->
        <ul id="profile-tabs" class="nav nav-tabs" data-hashtab="true">
          <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
          @if ($validator->institution)
          <li><a href="#leave-institution" data-toggle="tab">Leave institution?</a></li>
          @endif
          <li><a href="#password" data-toggle="tab">Change your password</a></li>
        </ul>

        <div id="profileTab" class="tab-content well">
          <div class="tab-pane active in" id="profile">
            <form enctype='multipart/form-data'  class="form-vertical" role="form" method="POST" action="{{ route('update_profile'). '#profile' }}" >
              {{ csrf_field() }}
              <!-- company_name -->

              <h4>About</h4>
              <text-box-form code="name" label="{!! trans('reg-profile.name') !!}" placeholder="{!! trans('reg-profile.name') !!}" value="{{ old('name', $user->name) }}"
                  required errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <text-box-form code="surname" label="{!! trans('reg-profile.surname') !!}" placeholder="{!! trans('reg-profile.surname') !!}" value="{{ old('name', $user->surname) }}"
                  required errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <text-box-form code="email" label="{!! trans('reg-profile.email') !!}" placeholder="{!! trans('reg-profile.email') !!}" readonly
                    value="{{ old('email', $user->email) }}"
                    errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <hr>

              @if ($validator->institution)
              <h4>Status</h4>
              <div class="radio">
                <label><input type="radio" @if ($validator->enabled == true) checked @endif name="enabled" value="1">Enabled. You'll receive validation requests unless you or the institution changes the status</label>
              </div>
              <div class="radio">
                <label><input @if ($validator->enabled != true) checked @endif type="radio" name="enabled" value="0">Disabled. You won't receive any validation requests unless you or the institution change the status</label>
              </div>
              <hr>
              @endif

              <h4>My Institution</h4>
              @if ($validator->institution)
              <text-box-form code="email" label="{!! trans('reg-profile.institution') !!}" placeholder="{!! trans('reg-profile.institution') !!}" readonly
                    value="{{ old('institution', $validator->institution->name) }}"
                    errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              @endif
              <text-box-form code="department" label="{!! trans('reg-profile.validator_department') !!}" placeholder="{!! trans('reg-profile.validator_department') !!}" value="{{ old('department', $validator->department) }}"
                  required errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <text-box-form code="position" label="{!! trans('reg-profile.position') !!}" placeholder="{!! trans('reg-profile.position') !!}" value="{{ old('position', $validator->position) }}"
                  required errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>

              <hr>
              <button type="submit" class="btn btn-primary">Update settings</button>
            </form>
          </div>

          @if ($validator->institution)
          <div class="tab-pane fade" id="leave-institution">
            <p><span class="h4">Leave institution?</span></p>
            <form class="form-vertical" role="form" method="POST" action="{{ route('update_profile'). '#leave-institution' }}">
              {{ csrf_field() }}
              <p>Do you want to leave the institution? this will send the pending validation requests back to it, and you won't be able to validate anyone until another institution invites you back</p>
              <input type="hidden" name="leave" value="1">
              <button type="submit" class="btn btn-primary">Yes! Leave school</button>
            </form>
          </div>
          @endif

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
