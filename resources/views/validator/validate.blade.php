@extends('../layouts.app')

@section('page-title') Validating {{ $user->name }} {{ $user->surname }} Profile @endsection
@section('page-class') validating unique-profile student @endsection

@section('meta')
  <meta id="token" content="{{ $token }}" />
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 alert alert-info">
        @if ($student->valid != 'pending')
          <p>You've already validated this student
            <a class="pull-right" href="#validate">Jump to results</a>
          </p>
        @else
        <p>You're validating the following student:
            <a class="pull-right" href="#validate">Jump to validation</a>
        </p>
        @endif
    </div>
  </div>
</div>
@include('profile.student-profile')
@if ($student->valid != 'pending')
<a id="validate"></a>
<div class="container v-container">
  <div class="row">
    <div class="col-xs-12 sm-no-padding-left sm-no-padding-right">
      <div class="well">
      <h3 class="section-title"> <i class="fa fa-search" aria-hidden="true"></i> Student validation</h3>
        @if ($student->valid == 'validated')
        <p>
          <strong class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Valid</strong></p>
        <p>
          The student passed your validation successfully
        </p>
        <p>
        <strong>
        Your comments:
        </strong>
        {{ $student->validation_comment }}
        </p>
        <p>
        <strong>
        Your chosen skills:
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
          <strong class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Invalid</strong>
        </p>
        <p>
          The student didn't meet the criteria
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
      <h3 class="section-title"> <i class="fa fa-search" aria-hidden="true"></i> Student validation</h3>
      <p class=" alert alert-warning"><em>Please make sure you have reviewed the student profile carefully before validating it</em></p>

      <div class="clearfix">
      <h4 class="pull-left">This student is:</h4>
      <ul class="nav nav-pills" id="validate-tabs" data-hashtab="true">
        <li><a  href="#valid" data-toggle="tab"><i class="fa fa-check" aria-hidden="true"></i>  Valid</a></li>
        <li><a href="#invalid" data-toggle="tab"><i class="fa fa-times" aria-hidden="true"></i>  Invalid</a></li>
      </ul>
      </div>
      <div class="tab-content">
        <div class="tab-pane" id="valid">
          <form class="form-vertical" role="form" method="POST" action="{{ route('post_validate_student', [$validation]).'#valid' }}">
            {{ csrf_field() }}
            <input type="hidden" name="status" value="valid">
            <hr/>
            <personal-skills-form label="Personal skills (max 6)"
                values='{!! json_encode($personalSkills, JSON_HEX_APOS) !!}'
                value='{!! json_encode($student->personalSkills()->wherePivot('validator',true)->get(), JSON_HEX_APOS) !!}'
                errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></personal-skills-form>

            <text-area-form code="comment" label="{!! trans('validate.comment') !!}"
                  placeholder="{!! trans('validate.comment') !!}" required
                  value="{{ old('comment', $student->validation_comment) }}"
                  errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-area-form>
            <hr>
            <button type="button" class="btn btn-primary finish-validation-button"><i class="fa fa-check" aria-hidden="true"></i> Finish validation</button>

          </form>

          </div>
        <div class="tab-pane" id="invalid">
          <form class="form-vertical" role="form" method="POST" action="{{ route('post_validate_student', [$validation]).'#invalid' }}">
            {{ csrf_field() }}
            <input type="hidden" name="status" value="invalid">
            <hr/>
            <p>Please give us an explanation of the reason the student is invalid.</p>
            <p><em>Note: If the validation is passed as "No student" the student will be able to validate his profile again.</em></p>

            <select-form code="reason" label="{!! trans('validate.reason') !!}" placeholder=" - {!! trans('reg-profile.reason') !!} - " required
                              values='{!! json_encode($reasons, JSON_HEX_APOS) !!}'
                              value="{{ old('reason') }}"
                              errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></select-form>
            <hr>
            <button type="button" class="btn btn-primary finish-validation-button"><i class="fa fa-times" aria-hidden="true"></i> Finish validation</button>

          </form>

        </div>
      </div>


    </div>
  </div>

  </div>
</div>
@endif

@endsection
