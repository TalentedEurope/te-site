@extends('../layouts.app')

@section('page-title') {!! trans('global.search_info') !!} @endsection
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
  <i class="fa fa-spinner fa-spin fa-3x fa-fw initial-loader"></i>
  <search collective="{{ $type }}"></search>
</div>
@endsection
