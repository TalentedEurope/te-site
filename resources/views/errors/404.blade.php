@extends('layouts.app')
@section('page-title') Log in @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="well auth-box col-sm-6 col-sm-offset-2  col-md-4 col-md-offset-4">
            <div class="avatar-placeholder">
                <i class="fa fa-warning" aria-hidden="true"></i>
            </div>
            <h2 class="page-title">404</h2>
            <h3> Page not found</h3>
            <p>We didn't find the page you were looking for.<br/> You can try searching for <a href="{{ route('searchStudents') }}">students</a> or <a href="{{ route('searchCompanies') }}">companies</a>  </p>
        </div>
    </div>
</div>
@endsection
