@extends('layouts.app')
@section('page-title') Changed Institution successfully @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="well auth-box col-sm-6 col-sm-offset-2  col-md-4 col-md-offset-4">
            <div class="avatar-placeholder">
                <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <h2 class="page-title">Success</h2>
            <h3>Changed your Institution successfully</h3>
            <p>From now on you'll receive validation notifications from {{ $institution }}</p>
        </div>
    </div>
</div>
@endsection
