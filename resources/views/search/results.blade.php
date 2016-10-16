@extends('../layouts.app')

@section('page-title') Search for @endsection
@section('page-class') search students @endsection
@section('meta')
  <meta id="token" content="{{ $token }}" />
  <meta id="type" content="{{ $type }}" />
@endsection

@section('content')
<div class="container v-container">
  <search></search>
</div>
@endsection
