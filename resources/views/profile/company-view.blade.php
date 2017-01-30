@extends('../layouts.app')

@section('page-title') Company Profile @endsection
@section('page-class') unique-profile company @endsection

@section('meta')
  <meta id="token" content="{{ $token }}" />
@endsection

@section('content')
<div class="container v-container">
  <div class="row profile">
    @if($public)
    <div class="col-xs-12 alert alert-danger">
        <p>Do you want to show this company how talented you are? <a href="{{ url('/register') }}">{!! trans('global.register_btn') !!}</a></p>
    </div>
    @endif

    <div class="col-xs-12 col-sm-8 col-md-9">
      <div class="well student-name">
        <h2 class="title">{{ $user->name }} </h2>
        @if ($company->activity)
          <p class="subtitle">{{ $activities[$company->activity] }}</p>
        @endif
      </div>

      <div class="well">
        <h3 class="section-title"> <i class="fa fa-info" aria-hidden="true"></i> About</h3>
        <ul class="student-specs">
        <li><strong><i class="icon fa fa-map-marker"></i>  We are in: </strong> {{ $user->city }}
        @if ($user->country) , <em>{{ $countries[$user->country] }}</em></li> @endif
        @if ($company->personalSkills)
        <li><strong><i class="icon fa fa-cogs"></i> We're looking for people skilled in: </strong>
              <ul class="skills">
                @foreach ($company->personalSkills as $skill)
                  <li>{{ $skill->name }}</li>
                @endforeach
              </ul>
        </li>
        @endif
        @if ($company->talent)
        <li><strong><i class="icon fa fa-lightbulb-o"></i>We think that talent is:</strong> {{ $company->talent }}</li>
        @endif
        </ul>
      </div>

    </div>

    <div class="col-xs-12 col-sm-4 col-md-3 text-center contact-info">
      <div class="well">
        @if ($user->image)
        <figure>
          <img src="{{ $user->getPhoto() }}" alt="{{ $user->name }}" class="img-circle img-responsive">
        </figure>
        @endif
        <div class="contact">
          <h3>Get in contact</h3>
            {{-- <alert-button :company-id="{{ $company->id }}" :alertable="{{ $company->alertable }}" placement="bottom"></alert-button> --}}
          <hr>
          @if (!$public)
          <p><i class="fa icon fa-envelope"></i> {!! trans('reg-profile.email') !!}: <a href="mailto:{{ $company->notification_email ? $company->notification_email : $user->email }}">
          {{ $company->notification_email ? $company->notification_email : $user->email }}</a></p>
          @endif
          @if ($user->phone)
          <p><i class="fa icon fa-phone"></i> {!! trans('reg-profile.phone') !!}:  <a href="tel:{{ $user->phone }}">{{ $user->phone }}</a></p>
          @endif
          @if ($user->country)
          <address>
            {{ $user->address }}<br/>
            {{ $user->postal_code }} {{ $user->city }}, {{ $countries[$user->country] }}
          </address>
          @endif
          <ul class="social">
            @if ($user->facebook)
            <li>
              <a target="_blank" href="{{ $user->facebook }}" rel="noopener noreferrer" class="icon-link">
                <i class="fi flaticon-facebook"></i>
              </a>
            </li>
            @endif
            @if ($user->twitter)
            <li>
              <a target="_blank" href="{{ $user->twitter }}" rel="noopener noreferrer" class="icon-link">
                <i class="fi flaticon-twitter"></i>
              </a>
            </li>
            @endif
            @if ($user->linkedin)
            <li>
              <a target="_blank" href="{{ $user->linkedin }}" rel="noopener noreferrer" class="icon-link">
                <i class="fa fa-linkedin"></i>
              </a>
            </li>
            @endif
            @if ($company->website)
            <li>
              <a target="_blank" href="{{ $company->website }}" rel="noopener noreferrer" class="icon-link">
                <i class="fa fa-external-link"></i>
              </a>
            </li>
            @endif

          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
