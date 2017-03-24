@extends('layouts.app')
@section('page-title') {!! trans('global.error') !!} 500: {!! trans('error-page.internal_server_error') !!} @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="well auth-box col-sm-6 col-sm-offset-2  col-md-4 col-md-offset-4">
            <div class="avatar-placeholder">
                <i class="fa fa-warning" aria-hidden="true"></i>
            </div>
            <h2 class="page-title">500</h2>
            <h3>{!! trans('error-page.internal_server_error') !!}</h3>
            <p>{!! trans('error-page.an_error_happened') !!}<br/> {!! trans('error-page.meanwhile_can_searching_for') !!} <a href="{{ route('searchStudents') }}">{!! trans_choice('global.student', 2) !!}</a> {!! trans('global.or') !!} <a href="{{ route('searchCompanies') }}">{!! trans_choice('global.company', 2) !!}</a>  </p>
        </div>
    </div>
</div>
@endsection
