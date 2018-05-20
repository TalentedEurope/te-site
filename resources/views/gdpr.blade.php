@extends('../layouts.app')

@section('page-title') {{ trans('global.gdpr_updates') }} @endsection

@section('content')
<div class="container edit-profile">
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <h2 class="page-title">{{ trans('global.gdpr_updates') }}</h2>
      <div class="well">
        <p>{!! trans('reg-profile.gdpr_text') !!}</p>
        <hr>
        <p>{!! trans('reg-profile.gdpr_data_text') !!}</p>
        <form action="{{ route('post_gdpr') }}" METHOD="POST">
            {{ csrf_field() }}
            <input type="hidden" name="download" value="1">
            <button type="submit" class="btn btn-primary">{!! trans('reg-profile.gdpr_data_download') !!}</button>
        </form>
        <hr>
      @if (!isset($thanks))
      <form action="{{ route('post_gdpr') }}" METHOD="POST">
          {{ csrf_field() }}
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
           @endif


        <h4>{!! trans('reg-profile.notifications') !!}</h4>
        <div class="radio">
        <label><input type="radio" name="notify_me" value="1">{!! trans('reg-profile.notifications_enabled') !!}</label>
        </div>
        <div class="radio">
        <label><input type="radio" name="notify_me" value="0">{!! trans('reg-profile.notifications_disabled') !!}</label>
        </div>
        <hr class="separator">

        <button type="submit" class="btn btn-primary">{!! trans('reg-profile.update_settings') !!}</button>
      <form>
      @else
        <p>   {!! trans('reg-profile.thanks_gdpr') !!} </p>  
      
      @endif
      


      </div>


    </div>
  </div>
</div>
@endsection
