@extends('layouts.app')
@section('page-title') {!! trans('validators.cannot_change_institution') !!} @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="well auth-box col-sm-6 col-sm-offset-2  col-md-4 col-md-offset-4">
            <div class="avatar-placeholder">
                <i class="fa fa-warning" aria-hidden="true"></i>
            </div>
            <h2 class="page-title">{!! trans('global.error') !!}</h2>
            <h3>{!! trans('validators.cannot_change_institution') !!}</h3>
            <p>{!! trans('validators.invitation_is_not_valid_or_you_accepted_it') !!}</p>
        </div>
    </div>
</div>
@endsection
