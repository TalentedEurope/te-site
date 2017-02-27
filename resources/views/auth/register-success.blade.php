@extends('layouts.app')

@section('page-title')Register success @endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="well auth-box col-sm-6 col-sm-offset-3  col-md-4 col-md-offset-4">
      <h2>Thank You for Signing Up!</h2>

      @if ($type == "validator")
      <p>Registration complete successfully you may log in now.</p>
      @else
      <p>You will receive an email with instructions about how to confirm your
      account in a few minutes.</p>
      @endif

      <p>
        <a href="{{ url('/') }}" class="btn btn-primary">
          Go back to home
        </a>
      </p>

      @if ($type == "company")
      <p>
        <a href="{{ url('/search') }}" class="btn btn-primary">
          Search students
        </a>
      </p>
      @endif

      @if ($type == "student")
      <p>
        <a href="{{ url('/search') }}" class="btn btn-primary">
          Search companies
        </a>
      </p>
      @endif

    </div>
  </div>
</div>
@endsection
