@extends('layouts.app')
@section('page-title') Cannot change institution @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="well auth-box col-sm-6 col-sm-offset-2  col-md-4 col-md-offset-4">
            <div class="avatar-placeholder">
                <i class="fa fa-warning" aria-hidden="true"></i>
            </div>
            <h2 class="page-title">Error</h2>
            <h3>Cannot change institution</h3>
            <p>Either your invitation is not valid anymore, or you already accepted it</p>
        </div>
    </div>
</div>
@endsection
