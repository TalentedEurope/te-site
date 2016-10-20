@extends('../layouts.app')

@section('page-title') Search for @endsection
@section('page-class') search students @endsection
@section('meta')
  <meta id="token" content="{{ $token }}" />
@endsection

@section('content')
<div class="container v-container">
  <search collective="{{ $type }}"></search>
</div>
@endsection
