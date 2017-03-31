@extends('layouts.app')
@section('page-title') {!! trans('validators.changed_institution_successfully') !!} @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="well auth-box col-sm-6 col-sm-offset-2  col-md-4 col-md-offset-4">
            <div class="avatar-placeholder">
                <i class="fa fa-check" aria-hidden="true"></i>
            </div>
            <h2 class="page-title">{!! trans('global.successfully_done') !!}</h2>
            <h3>{!! trans('validators.changed_institution_successfully') !!}</h3>
            <p>{!! trans('validators.youll_receive_notifications_from') !!} {{ $institution }}</p>
        </div>
    </div>
</div>
@endsection
