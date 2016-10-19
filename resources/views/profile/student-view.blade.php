@extends('../layouts.app')

@section('page-title') {{ $user->name }} {{ $user->surname }} Profile @endsection
@section('page-class') unique-profile student @endsection

@section('content')
<div class="container">
  <div class="row profile">
      @if($public)
      <div class="col-xs-12 alert alert-danger">
          <p>Do you want to view all the details of this student? <a href="{{ url('/register') }}">Sign up</a></p>
      </div>
      @endif

    <div class="col-xs-12 col-sm-8 col-md-9">
      <div class="well student-name">
        <h2 class="title">{{ $user->name }} {{ $user->surname }}</h2>
        @if (isset($mainStudy))
        <p class="subtitle">{{ $mainStudy['name'] }}</p>
        @endif
      </div>

      <div class="well">
        <h3 class="section-title"> <i class="fa fa-info" aria-hidden="true"></i> About</h3>
        <ul class="student-specs">
        @if (isset($mainStudy))
        <li><strong><i class="icon fa fa-graduation-cap"></i>  Education: </strong>
        {{ $mainStudy['level'] }} in {{ $mainStudy['name'] }}</li>
        @endif
        @if ($user->country && $student->nationality)
          <li><strong><i class="icon fa fa-map-marker"></i>  Lives in: </strong> {{ $user->city }}, <em>{{ $countries[$user->country] }} </em> | <strong> Nationality: </strong> {{ $countries[$student->nationality]  }} </li>
        @endif
        @if ($student->birthdate)
        <li><strong><i class="icon fa fa-calendar"></i>  Born on: </strong> {{ Carbon\Carbon::parse($student->birthdate)->format('d/m/Y') }}</li>
        @endif
        @if ($student->talent)
        <li><strong><i class="icon fa fa-lightbulb-o"></i> My talent:</strong> {{ $student->talent }} </span></li>
        @endif
        </ul>
        <hr>
        <div class="row">
          @if ($student->valid && $student->validationRequest)
            @if ($student->validationRequest)
              <p class="validated-by col-sm-6"><span class="btn btn-lg"><strong><i class="fa fa-star icon"></i> Refereed by:
               </strong>
               <a href="{{
                  route('get_profile',
                    [
                      'slug' => str_slug(
                          $student->validationRequest->validator->user->name . ' ' . $student->validationRequest->validator->user->surname
                      ),
                      'id' => $student->validationRequest->validator->user->id
                    ]) }}">
                  {{ $student->validationRequest->validator->user->name }} {{ $student->validationRequest->validator->user->surname }}
                </a> on {{ Carbon\Carbon::parse($student->validationRequest->updated_at)->format('d/m/Y') }} </span></p>
            @endif

          @else
            <p class="validated-by col-sm-6"><span class="btn btn-lg"><strong><em>Refereeing
 pending</em></strong></span></p>
          @endif
          @if ($student->curriculum && !$public)
          <p class="col-sm-6"><a class="btn btn-lg btn-primary pull-right"
             href="{{ route('get_curriculum', ['id' => $user->id]) }}"> <i class="fa fa-cloud-download" aria-hidden="true"></i> Europass Curriculum</a></p>
          @endif
        </div>
      </div>

      @if ($student->professionalSkills->count())
      <div class="well">
        <div class="skills">
          <h3 class="section-title"> <i class="fa fa-cogs" aria-hidden="true"></i> Skills</h3>
          <div class="row">
            <div class="col-sm-6"><h4>Professional</h4>
              <ul class="skills">
                <!-- <li class="important">Lorem ipsum</li> -->
                @foreach ($student->professionalSkills as $skill)
                  <li>{{ $skill->name }}</li>
                @endforeach
              </ul>
            </div>
            <div class="col-sm-6"><h4>Personal</h4>
              <ul class="skills">
                @foreach ($student->personalSkills as $skill)
                  <li>{{ $skill[App::getLocale()] }}</li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <h5>Legend</h5>
            <ul class="skills">
              <li class="important">Set by both parties</li>
              <li>Set by either the referee or the student</li>
            </ul>
          </div>
        </div>
      </div>
      @endif

      @if ($student->studies->count())
      <div class="well">
        <div class="studies">
          <h3 class="section-title"> <i class="fa fa fa-graduation-cap" aria-hidden="true"></i> Studies</h3>
          <ul class="timeline">
            @foreach ($student->studies as $study)
            <li>
              <p class="date">{{ $studyFields[$study->field] }} - {{ $study->institution_name }}</p>
              <h4>{{ $study->name }} | <em>{{ $studyLevels[$study->level] }}</em></h4>
              <p>
                @if ($study->certificate && !$public)
                <a class="btn btn-primary btn-link"
                   href="{{ route('get_study_certificate', ['id' => $user->id, 'studyId' => $study->id]) }}">
                  <i class="fa fa-cloud-download"></i>
                  Grade card
                </a>
                @endif
                @if ($study->gradecard  && !$public)
                <a class="btn btn-primary btn-link" href="{{ route('get_study_gradecard', ['id' => $user->id, 'studyId' => $study->id]) }}">
                  <i class="fa fa-cloud-download"></i> Certificate
                </a>
                @endif
              </p>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
      @endif

      @if ($student->training->count())
      <div class="well">
        <div class="training">
          <h3 class="section-title"> <i class="fa fa fa-trophy" aria-hidden="true"></i> Training</h3>
          <ul class="timeline">
            @foreach ($student->training as $training)
            <li>
              @if ($training->date != '0000-00-00')
              <p class="date">{{ Carbon\Carbon::parse($training->date)->format('Y') }}</p>
              @else
              <p class="date">Date not specified</p>
              @endif
              <h4>{{ $training->name }}</h4>
              @if ($training->certificate && !$public)
              <p><a class="btn btn-primary btn-link"
                    href="{{ route('get_training_certificate', ['id' => $user->id, 'studyId' => $training->id]) }}"><i class="fa fa-cloud-download"></i> Certificate</a></p>
              @endif
            </li>
            @endforeach
          </ul>
        </div>
      </div>
      @endif

      @if ($student->languages->count())
      <div class="well">
        <div class="languages">
          <h3 class="section-title"> <i class="fa fa fa-language" aria-hidden="true"></i> Languages</h3>
          <ul class="cards clearfix">
            @foreach ($student->languages as $language)
            @if ($language->name)
              <li>
                <h4>{{ $languages[$language->name]['name'] }} | <em>{{ $languageLevels[$language->level] }}</em></h4>
                @if ($language->certificate && !$public)
                <p><a class="btn btn-primary btn-link"
                      href="{{ route('get_language_certificate', [
                                'id' => $user->id,
                                'studyId' => $language->id]) }}"><i class="fa fa-cloud-download"></i> Certificate</a>
                </p>
                @endif
              </li>
            @endif
            @endforeach
          </ul>
        </div>
      </div>
      @endif

      @if ($student->experiences->count())
      <div class="well">
        <div class="experience">
          <h3 class="section-title"> <i class="fa fa fa-suitcase" aria-hidden="true"></i> Work experience</h3>
          <ul class="timeline">
            @foreach ($student->experiences as $experience)
            <li>
              <p class="date">
              @if ($experience->from != '0000-00-00')
              {{ Carbon\Carbon::parse($experience->from)->format('Y') }}
              @endif
              @if ($experience->until != '0000-00-00')
                -
                {{ Carbon\Carbon::parse($experience->until)->format('Y') }}
              @endif
              </p>
              <h4><strong>{{ $experience->position }}</strong> at {{ $experience->company }}</h4>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
      @endif
    </div>

    <div class="col-xs-12 col-sm-4 col-md-3 text-center contact-info">
      <div class="well">
        @if ($user->image && !$public)
        <figure>
          <img src="{{ $user->getPhoto() }}" alt="{{ $user->name }} {{ $user->surname }}" class="img-circle img-responsive">
        </figure>
        @endif
        <div class="contact">
          <h3>Get in contact</h3>
          <hr>
          <p><i class="fa icon fa-envelope"></i> Email: <a href="mailto:{{ $user->email }}">
          {{ $user->email }}</a></p>
          @if ($user->phone)
          <p><i class="fa icon fa-phone"></i> Phone:  <a href="tel:{{ $user->phone }}">{{ $user->phone }}</a></p>
          @endif
          @if ($user->country)
          <address>
            {{ $user->address }}<br/>
            {{ $user->postal_code }} {{ $user->city }}, {{ $countries[$user->country] }}
          </address>
          @endif
          @if ($user->facebook || $user->twitter)
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
            <li>
              <a href="#">
                <i class="fa fa-email"></i>
              </a>
            </li>
          </ul>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection