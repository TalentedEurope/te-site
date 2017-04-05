@extends('layouts.app')

@section('page-title') {!! trans('validators.manage_validators') !!} @endsection

@section('content')

<div class="container validators">
  <div class="row">
    <h1 class="page-title">{!! trans('validators.validators') !!}</h1>

    @if (isset($profileErrors) && $profileErrors->all())
      <div class="text-left">
        <p>{!! trans('reg-profile.institution_fix_the_following_errors') !!}:</p>
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
        <p>
          <a class="btn btn-primary" href="{{ url('/profile/edit') }}"><i class="fa fa-btn fa-cogs"></i> {{ trans('global.set_up_my_profile') }}</a></li>
        </p>
        <br/>
      </div>
    @endif

    <div class="v-container">
      <validators></validators>
      <div class="clearfix"></div>
      <div class="col-sm-6 sm-no-padding-left">
          <h2>{!! trans('validators.add_new') !!}</h2>
          <form enctype='multipart/form-data'  class="well form-vertical" role="form" method="POST" action="{{ route('add_validator') }}" >
              {{ csrf_field() }}

              <text-box-form code="email" label="{!! trans('reg-profile.email') !!}" placeholder="{!! trans('reg-profile.email') !!}" value="{{ old('email') }}"
                  required errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              <hr>
              <p class="text-right">
              <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                {!! trans('validators.send_invitation') !!}
              </button>
              </p>
          </form>
      </div>
      <div class="col-sm-6 sm-no-padding-right">
        <h2>{!! trans('validators.invites_pending') !!}</h2>
         <div class="well">
            <table class=" table table-striped">
              <thead>
                <tr>
                  <th>{!! trans('reg-profile.email') !!}</th>
                  <th>{!! trans('validators.date_sent') !!}</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sent as $req)
                  <tr>
                    <td>{{ $req->email }}</td>
                    <td>{{ $req->created_at->format('d/m/Y') }}</td>
                    <td><a href="{{ route('delete_invite', [$req->id]) }}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> {!! trans('validators.cancel') !!}</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          <p><em>{!! trans('validators.note_invites_are_only_valid_14_days') !!}</em></p>
              </div>
      </div>


    </div>
  </div>
  <div class="row">


  </div>
</div>

@endsection
