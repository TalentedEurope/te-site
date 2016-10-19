@extends('../layouts.app')

@section('page-title') Company Profile @endsection
@section('page-class') unique-profile company @endsection

@section('content')
<div class="container">
  <div class="row profile">
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
        @if ($company->professionalSkills)
        <li><strong><i class="icon fa fa-cogs"></i> We're looking for people skilled in: </strong>
              <ul class="skills">
                @foreach ($company->professionalSkills as $skill)
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
        <figure>
          <img src="{{ $user->getPhoto() }}" alt="{{ $user->name }}" class="img-circle img-responsive">
        </figure>
        <div class="contact">
          <h3>Get in contact</h3>
            @if (Auth::user() && Auth::user()->isA('student'))
            <a href="#" class="btn btn-primary btn-nudge btn-lg"><i class="fa fa-bell" aria-hidden="true"></i> I'm here!</a>
            <a href="#" class="btn btn-primary btn-tooltip btn-lg" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tell the company that you may be interested to work for them"> ? </a>
            @endif
          <hr>
          @if (!$public)
          <p><i class="fa icon fa-envelope"></i> Email: <a href="mailto:{{ $company->notification_email ? $company->notification_email : $user->email }}">
          {{ $company->notification_email ? $company->notification_email : $user->email }}</a></p>
          @endif
          @if ($user->phone)
          <p><i class="fa icon fa-phone"></i> Phone:  <a href="tel:{{ $user->phone }}">{{ $user->phone }}</a></p>
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
              <a target="_blank" href="{{ $user->facebook }}">
                <i class="fi flaticon-facebook"></i>
              </a>
            </li>
            @endif
            @if ($user->twitter)
            <li>
              <a target="_blank" href="{{ $user->twitter }}">
                <i class="fi flaticon-twitter"></i>
              </a>
            </li>
            @endif
            @if ($user->linkedin)
            <li>
              <a target="_blank" href="{{ $user->linkedin }}">
                <i class="fa fa-linkedin"></i>
              </a>
            </li>
            @endif
            @if ($company->website)
            <li>
              <a target="_blank" href="{{ $company->website }}">
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