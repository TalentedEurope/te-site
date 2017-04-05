@extends('../layouts.app')

@section('page-title') {!! trans_choice('global.company', 1) !!} {!! trans('reg-profile.profile') !!} @endsection
@section('page-class') unique-profile company @endsection

@section('meta')
  <meta id="token" content="{{ $token }}" />
@endsection

@section('content')
<div class="container v-container">
  <div class="row profile">
    @if($public)
    <div class="col-xs-12 alert alert-danger">
        <p>{!! trans('reg-profile.want_to_show_this_company_how_talented_you_are') !!} <a href="{{ url('/register') }}">{!! trans('global.register_btn') !!}</a></p>
    </div>
    @endif

    <div class="col-xs-12 col-sm-8 col-md-9 sm-no-padding-left">
      <div class="well profile-main-info">
        <h2 class="title">{{ $user->name }} </h2>
        @if ($company->activity)
          <p class="subtitle">{{ $activities[$company->activity] }}</p>
        @endif
      </div>

      <div class="well">
        <h3 class="section-title"> <i class="fa fa-info" aria-hidden="true"></i> {!! trans('reg-profile.about') !!}</h3>
        <ul class="student-specs">
        <li><strong><i class="icon fa fa-map-marker"></i> {!! trans('reg-profile.we_are_in') !!}: </strong> {{ $user->city }}
        @if ($user->country) , <em>{{ $countries[$user->country] }}</em></li> @endif
        @if ($company->personalSkills->count())
        <li><strong><i class="icon fa fa-cogs"></i> {!! trans('reg-profile.we_are_looking_for_people_skilled_in') !!}: </strong>
              <ul class="skills">
                @foreach ($company->personalSkills as $skill)
                  <li>{{ $skill->name }}</li>
                @endforeach
              </ul>
        </li>
        @endif
        @if ($company->talent)
        <li><strong><i class="icon fa fa-lightbulb-o"></i>{!! trans('reg-profile.we_think_that_talent_is') !!}:</strong> {{ $company->talent }}</li>
        @endif
        </ul>
      </div>

    </div>

    <div class="col-xs-12 col-sm-4 col-md-3 sm-no-padding-right text-center contact-info">
      <div class="well">
        @if ($user->image)
        <figure>
          <img src="{{ $user->getPhoto() }}" alt="{{ $user->name }}" class="img-circle img-responsive">
        </figure>
        @endif
        <div class="contact">
          <h3>{!! trans('reg-profile.get_in_contact') !!}</h3>
          <hr>

          <button type="button" class="btn btn-primary see-contact-details">{!! trans('reg-profile.view_contact_details') !!}</button>

          <div class="contact-details hidden">
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
</div>
@endsection
