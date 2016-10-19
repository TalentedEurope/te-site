@extends('layouts.app')
@section('page-title') Error 500: Internal server error @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="well auth-box col-sm-6 col-sm-offset-2  col-md-4 col-md-offset-4">
            <div class="avatar-placeholder">
                <i class="fa fa-warning" aria-hidden="true"></i>
            </div>
            <h2 class="page-title">500</h2>
            <h3> Internal server error</h3>
            <p>An error happened, administrators have been notified and this issue will be fixed soon, please try later.<br/> Meanwhile you can try searching for <a href="{{ route('searchStudents') }}">students</a> or <a href="{{ route('searchCompanies') }}">companies</a>  </p>
        </div>
    </div>
</div>
@endsection
