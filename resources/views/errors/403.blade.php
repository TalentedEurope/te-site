@extends('layouts.app')
@section('page-title') Error 403: Not allowed @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="well auth-box col-sm-6 col-sm-offset-2  col-md-4 col-md-offset-4">
            <div class="avatar-placeholder">
                <i class="fa fa-warning" aria-hidden="true"></i>
            </div>
            <h2 class="page-title">403</h2>
            <h3>Not allowed</h3>
            <p>You're not allowed to do this action.<br/> You can try searching for <a href="{{ route('searchStudents') }}">students</a> or <a href="{{ route('searchCompanies') }}">companies</a>  </p>
        </div>
    </div>
</div>
@endsection
