@extends('../layouts.app')

@section('page-title') {!! trans('validators.validating') !!} {{ $user->name }} {{ $user->surname }} {!! trans('reg-profile.profile') !!} @endsection
@section('page-class') validating unique-profile student @endsection

@section('meta')
  <meta id="token" content="{{ $token }}" />
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 alert alert-info">
        @if ($student->valid != 'pending')
          <p>{!! trans('validators.student_already_validated') !!}
            <a class="pull-right" href="#validate">{!! trans('validators.jump_to_results') !!}</a>
          </p>
        @else
        <p>{!! trans('validators.you_are_validating_following_student') !!}:
            <a class="pull-right" href="#validate">{!! trans('validators.jump_to_validation') !!}</a>
        </p>
        @endif
    </div>
  </div>
</div>
@include('profile.student-profile', ['validating' => true])
@if ($student->valid != 'pending')
<a id="validate"></a>
<div class="container v-container">
  <div class="row">
    <div class="col-xs-12 sm-no-padding-left sm-no-padding-right">
      <div class="well">
      <h3 class="section-title"> <i class="fa fa-search" aria-hidden="true"></i> {!! trans('validators.student_validation') !!}</h3>
        @if ($student->valid == 'validated')
        <p>
          <strong class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> {!! trans('validators.valid') !!}</strong></p>
        <p>
          {!! trans('validators.student_passed_validation_successfully') !!}
        </p>
        <p>
          <strong>
            {!! trans('validators.your_comments') !!}:
          </strong>
          {{ $student->validation_comment }}
        </p>
        <p>
          <strong>
            {!! trans('validators.your_chosen_skills') !!}:
          </strong>
        </p>
        <ul class="selected-skills list-unstyled">
        @foreach ($student->personalSkills()->wherePivot('validator', true)->get() as $skill)
              <li class="btn btn-default">
                  {{ $skill[Config::get('app.locale')] }}
              </li>
        @endforeach
        </ul>
        @else
        <p>
          <strong class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> {!! trans('validators.invalid') !!}</strong>
        </p>
        <p>
          {!! trans('validators.student_didnt_meet_criteria') !!}
        </p>
        @endif
      </div>
    </div>
  </div>
</div>
@else
<a id="validate"></a>
<div class="container v-container">
  <div class="row">
    <div class="col-xs-12 sm-no-padding-left sm-no-padding-right">
      <div class="well">
      <h3 class="section-title"> <i class="fa fa-search" aria-hidden="true"></i> {!! trans('validators.student_validation') !!}</h3>
      <p class=" alert alert-warning"><em>{!! trans('validators.make_sure_you_have_reviewed_student') !!}</em></p>

      <div class="clearfix">
      <h4 class="pull-left">{!! trans('validators.this_student_is') !!}:</h4>
      <ul class="nav nav-pills validate-tabs" id="validate-tabs" data-hashtab="true">
        <li><a  href="#valid" data-toggle="tab"><i class="fa fa-check" aria-hidden="true"></i> {!! trans('validators.valid') !!}</a></li>
        <li><a href="#invalid" data-toggle="tab"><i class="fa fa-times" aria-hidden="true"></i> {!! trans('validators.invalid') !!}</a></li>
      </ul>
      </div>
      <div class="tab-content">
        <div class="tab-pane" id="valid">
          <form class="form-vertical" role="form" method="POST" action="{{ route('post_validate_student', [$validation]).'#valid' }}">
            {{ csrf_field() }}
            <input type="hidden" name="status" value="valid">
            <hr/>
            <personal-skills-form label="{!! trans('reg-profile.student_personal_skills') !!} ({!! trans('reg-profile.input_max_characters') !!} 6)"
                values='{!! json_encode($personalSkills, JSON_HEX_APOS) !!}'
                value='{!! json_encode($student->personalSkills()->wherePivot('validator',true)->get(), JSON_HEX_APOS) !!}'
                errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></personal-skills-form>

            <text-area-form code="comment" label="{!! trans('validators.comment') !!}"
                  placeholder="{!! trans('validators.comment') !!}" required
                  value="{{ old('comment', $student->validation_comment) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-area-form>
            <hr>
            <button type="button" class="btn btn-primary finish-validation-button"><i class="fa fa-check" aria-hidden="true"></i> {!! trans('validators.finish_validation') !!}</button>

          </form>

          </div>
        <div class="tab-pane" id="invalid">
          <form class="form-vertical" role="form" method="POST" action="{{ route('post_validate_student', [$validation]).'#invalid' }}">
            {{ csrf_field() }}
            <input type="hidden" name="status" value="invalid">
            <hr/>
            <p>{!! trans('validators.give_us_explanation_of_student_is_not_valid') !!}</p>
            <p><em>{!! trans('validators.note_if_validation_is_passed_as_no_student') !!}</em></p>

            <select-form code="reason" label="{!! trans('students-validation.reason') !!}" placeholder=" - {!! trans('students-validation.reason') !!} - " required
                              values='{!! json_encode($reasons, JSON_HEX_APOS) !!}'
                              value="{{ old('reason') }}"
                              errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></select-form>
            <hr>
            <button type="button" class="btn btn-primary finish-validation-button"><i class="fa fa-times" aria-hidden="true"></i> {!! trans('validators.finish_validation') !!}</button>

          </form>

        </div>
      </div>


    </div>
  </div>

  </div>
</div>
@endif

@endsection
