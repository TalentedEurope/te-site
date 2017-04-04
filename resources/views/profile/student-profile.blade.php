<div class="container">
  <div class="row profile">
      @if($public)
      <div class="col-xs-12 alert alert-danger">
          <p>{!! trans('reg-profile.want_to_view_all_details_of_student') !!} <a href="{{ url('/register') }}">{!! trans('global.register_btn') !!}</a></p>
      </div>
      @endif

    <div class="col-xs-12 col-sm-8 col-md-9 sm-no-padding-left">
      <div class="well student-name">
        <h2 class="title">{{ $user->name }} {{ $user->surname }}</h2>
        @if (isset($mainStudy))
        <p class="subtitle">{{ $mainStudy['name'] }}</p>
        @endif
      </div>

      <div class="well">
        <h3 class="section-title"> <i class="fa fa-info" aria-hidden="true"></i> {!! trans('reg-profile.about') !!}</h3>
        <ul class="student-specs">
        @if (isset($mainStudy))
        <li><strong><i class="icon fa fa-graduation-cap"></i>  {!! trans('reg-profile.education') !!}: </strong>
        {{ $mainStudy['level'] }} in {{ $mainStudy['name'] }}</li>
        @endif
        @if ($user->country && $student->nationality)
          <li><strong><i class="icon fa fa-map-marker"></i>  {!! trans('reg-profile.lives_in') !!}: </strong> {{ $user->city }}, <em>{{ $countries[$user->country] }} </em> | <strong> {!! trans('reg-profile.nationality') !!}: </strong> {{ $nationalities[$student->nationality]  }} </li>
        @endif
        @if ($student->birthdate)
        <li><strong><i class="icon fa fa-calendar"></i>  {!! trans('reg-profile.born_on') !!}: </strong> {{ Carbon\Carbon::parse($student->birthdate)->format('d/m/Y') }}</li>
        @endif
        @if ($student->talent)
        <li><strong><i class="icon fa fa-lightbulb-o"></i> {!! trans('reg-profile.my_talent') !!}:</strong> {{ $student->talent }} </span></li>
        @endif
        </ul>
        <hr>
        <div class="row">
          @if ($student->valid == "validated" && $student->validationRequest)
            @if ($student->validationRequest)
              <p class="validated-by col-sm-6"><span class="btn btn-lg"><strong><i class="fa fa-star icon"></i> {!! trans('reg-profile.refereed_by') !!}:
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
            <p class="validated-by col-sm-6"><span class="btn btn-lg"><strong><em>{!! trans('reg-profile.refereeing_pending') !!}</em></strong></span></p>
          @endif
          @if ($student->curriculum && !$public)
          <p class="col-sm-6"><a class="btn btn-lg btn-primary pull-right"
             href="{{ route('get_curriculum', ['id' => $user->id]) }}"> <i class="fa fa-cloud-download" aria-hidden="true"></i> {!! trans('reg-profile.student_europass') !!}</a></p>
          @endif
        </div>
      </div>

      @if ($student->professionalSkills->count())
      <div class="well">
        <div class="skills">
          <h3 class="section-title"> <i class="fa fa-cogs" aria-hidden="true"></i> {!! trans('reg-profile.skills') !!}</h3>
          <div class="row">
            <div class="col-sm-6"><h4>{!! trans('reg-profile.professional') !!}</h4>
              <ul class="skills">
                <!-- <li class="important">Lorem ipsum</li> -->
                @foreach ($student->professionalSkills as $skill)
                  <li>{{ $skill->name }}</li>
                @endforeach
              </ul>
            </div>
            <div class="col-sm-6"><h4>{!! trans('reg-profile.personal') !!}</h4>
              <ul class="skills">
                @foreach ($student->groupedPersonalSkills() as $skill)
                  <li @if($skill['repeated']) class="important" @endif >{{ $skill['name'] }}</li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        @if (!isset($validating))
          <div class="row">
            <div class="col-sm-12">
              <h5>{!! trans('reg-profile.legend') !!}</h5>
              <ul class="legend">
                <li><span class="important"> </span> {!! trans('reg-profile.set_by_both_parties') !!}</li>
                <li><span> </span> {!! trans('reg-profile.set_by_referee_or_student') !!}</li>
              </ul>
            </div>
          </div>
        @endif
      </div>
      @endif

      @if ($student->studies->count())
      <div class="well">
        <div class="studies">
          <h3 class="section-title"> <i class="fa fa fa-graduation-cap" aria-hidden="true"></i> {!! trans_choice('reg-profile.study', 2) !!}</h3>
          <ul class="timeline">
            @foreach ($student->studies as $study)
            <li>
              @if ($study->field)
                <p class="date">{{ $studyFields[$study->field] }} - {{ $study->institution_name }}</p>
              @else
                <p class="date">{{ $study->institution_name }}</p>
              @endif

              <h4>{{ $study->name }} | <em>{{ $studyLevels[$study->level] }}</em></h4>
              <p>
                @if ($study->certificate && !$public)
                <a class="btn btn-primary btn-link"
                   href="{{ route('get_study_certificate', ['id' => $user->id, 'studyId' => $study->id]) }}">
                  <i class="fa fa-cloud-download"></i>
                  {!! trans('reg-profile.student_study_grade_card') !!}
                </a>
                @endif
                @if ($study->gradecard  && !$public)
                <a class="btn btn-primary btn-link" href="{{ route('get_study_gradecard', ['id' => $user->id, 'studyId' => $study->id]) }}">
                  <i class="fa fa-cloud-download"></i> {!! trans('reg-profile.student_certificate') !!}
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
          <h3 class="section-title"> <i class="fa fa fa-trophy" aria-hidden="true"></i> {!! trans('reg-profile.student_training') !!}</h3>
          <ul class="timeline">
            @foreach ($student->training as $training)
            <li>
              @if ($training->date != '0000-00-00')
              <p class="date">{{ Carbon\Carbon::parse($training->date)->format('Y') }}</p>
              @else
              <p class="date">{!! trans('reg-profile.date_not_specified') !!}</p>
              @endif
              <h4>{{ $training->name }}</h4>
              @if ($training->certificate && !$public)
              <p><a class="btn btn-primary btn-link"
                    href="{{ route('get_training_certificate', ['id' => $user->id, 'studyId' => $training->id]) }}"><i class="fa fa-cloud-download"></i> {!! trans('reg-profile.student_certificate') !!}</a></p>
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
          <h3 class="section-title"> <i class="fa fa fa-language" aria-hidden="true"></i> {!! trans('reg-profile.student_languages') !!}</h3>
          <ul class="cards clearfix">
            @foreach ($student->languages as $language)
            @if ($language->name)
              <li>
                <h4>{{ $languages[$language->name] }} | <em>{{ $languageLevels[$language->level] }}</em></h4>
                @if ($language->certificate && !$public)
                <p><a class="btn btn-primary btn-link"
                      href="{{ route('get_language_certificate', [
                                'id' => $user->id,
                                'studyId' => $language->id]) }}"><i class="fa fa-cloud-download"></i> {!! trans('reg-profile.student_certificate') !!}</a>
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
          <h3 class="section-title"> <i class="fa fa fa-suitcase" aria-hidden="true"></i> {!! trans('reg-profile.student_work_experience') !!}</h3>
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

    <div class="col-xs-12 col-sm-4 col-md-3 sm-no-padding-right text-center contact-info">
      <div class="well">
        @if ($user->image && !$public)
        <figure>
          <img src="{{ $user->getPhoto() }}" alt="{{ $user->name }} {{ $user->surname }}" class="img-circle img-responsive">
        </figure>
        @endif
        <div class="contact">
          <h3>{!! trans('reg-profile.get_in_contact') !!}</h3>
          <hr>
          <p><i class="fa icon fa-envelope"></i> {!! trans('reg-profile.email') !!}: <a href="mailto:{{ $user->email }}">
          {{ $user->email }}</a></p>
          @if ($user->phone)
          <p><i class="fa icon fa-phone"></i> {!! trans('reg-profile.phone') !!}:  <a href="tel:{{ $user->phone }}">{{ $user->phone }}</a></p>
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
