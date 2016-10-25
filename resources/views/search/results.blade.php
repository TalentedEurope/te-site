@extends('../layouts.app')

@section('page-title') Search for @endsection
@section('page-class') search students companies @endsection
@section('meta')
  <meta id="token" content="{{ $token }}" />
  <meta id="user_type" content="{{ $userType }}" />
@endsection
@if ($type == 'students')
  @section('menu-student') class="active" @endsection
@endif
@if ($type == 'companies')
  @section('menu-company') class="active" @endsection
@endif

@section('content')
<div class="container v-container">
  <search collective="{{ $type }}"></search>
</div>
@endsection
