@extends('../layouts.app')

@section('page-title') {{ $user->name }} {{ $user->surname }} {!! trans('reg-profile.profile') !!} @endsection
@section('page-class') unique-profile student @endsection

@section('content')
@include('profile.student-profile')
@endsection
