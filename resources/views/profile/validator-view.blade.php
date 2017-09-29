@extends('../layouts.app')

@section('page-title') {{ $user->name }} {{ $user->surname }} {!! trans('reg-profile.profile') !!} @endsection
@section('page-class') unique-profile company @endsection

@section('content')
<div class="container">
  <div class="row profile">
    <div class="col-xs-12">
      <div class="well profile-main-info">
        <h2 class="title">{!! $user->getFullNameAttribute() !!}</h2>
        <p class="subtitle">{!! $validator->institution->user->name !!}</p>
      </div>

      <div class="well">
        <h3 class="section-title">
          <i class="fa fa-users" aria-hidden="true"></i>
          {!! trans('reg-profile.refereed_students') !!}
        </h3>
        @if ($validator->validationRequest->count())
          <ul class="validated-students-cards clearfix">
            @foreach ($validator->validationRequest as $validation_request)
              @if ($validation_request->student->user)
              <li>
                <a href="/profile/{{$validation_request->student->user->getSlug()}}/{{$validation_request->student->user->id}}">
                  <strong><i class="icon fa fa-user"></i>  {{$validation_request->student->user->getFullNameAttribute()}}</strong>
                </a>
              </li>
              @endif
            @endforeach
          </ul>
        @else
          {!! trans('reg-profile.no_refereed_students') !!}
        @endif
      </div>
    </div>
  </div>


</div>
@endsection
