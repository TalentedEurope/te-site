@extends('layouts.app')
@section('page-title') {!! trans('reg-profile.your_profile_is_empty') !!} @endsection

@section ('profile_warning')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="well auth-box col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <div class="avatar-placeholder">
                <i class="fa fa-pencil" aria-hidden="true"></i>
            </div>
            <h2 class="page-title">{!! trans('reg-profile.not_enough_information') !!}:</h2>
            <div class="text-left">
            <p>{{ trans('global.not_enough_data_to_show_profile') }}</p>

            <p>{!! trans('reg-profile.fix_the_following_errors') !!}:</p>
            @if ($profileErrors->all())
              <div class="alert alert-warning">
              <ul>
              @foreach ($profileErrors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
              </ul>
              </div>
            @endif

            <p>{!! trans('reg-profile.click_on_button_to_fill_required_fields') !!}<br/></p>
            </div>
            <p>
              <a class="btn btn-primary" href="{{ url('/profile/edit') }}"><i class="fa fa-btn fa-cogs"></i> {{ $t('global.set_up_my_profile') }}</a></li>
            </p>

        </div>
    </div>
</div>
@endsection
