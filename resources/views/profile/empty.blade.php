@extends('layouts.app')
@section('page-title') Your profile is empty! @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="well auth-box col-sm-6 col-sm-offset-2  col-md-4 col-md-offset-4">
            <div class="avatar-placeholder">
                <i class="fa fa-pencil" aria-hidden="true"></i>
            </div>
            <h2 class="page-title">Your profile is empty!</h2>
            <div class="text-left">
            <p>We don't have enough data from you to be able to show your profile.</p>

            <p>Please click the following button to fill the required fields.<br/></p>
            </div>
            <p>
              <a class="btn btn-primary" href="{{ url('/profile/edit') }}"><i class="fa fa-btn fa-cogs"></i> Set up my profile</a></li>
            </p>

        </div>
    </div>
</div>
@endsection
