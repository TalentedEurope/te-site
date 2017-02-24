@extends('layouts.app')

@section('page-title')Manage validators @endsection

@section('content')

<div class="container validators">
  <div class="row">
    <h1 class="page-title">Validators</h1>
    <div class="v-container">
      <validators></validators>
      <div class="clearfix"></div>
      <div class="col-sm-6">
          <h2>Add a new validator</h2>
          <form enctype='multipart/form-data'  class="well form-vertical" role="form" method="POST" action="{{ route('add_validator') }}" >
              {{ csrf_field() }}

              <text-box-form code="email" label="{!! trans('reg-profile.email') !!}" placeholder="{!! trans('reg-profile.email') !!}" value="{{ old('email') }}"
                  required errors='{!! json_encode($errors->toArray(), JSON_HEX_APOS) !!}'></text-box-form>
              <hr>
              <p class="text-right">
              <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o" aria-hidden="true"></i>
 Send invitation to validator</button>
              </p>
          </form>
      </div>
      <div class="col-sm-6">
        <h2>Invites pending</h2>
         <div class="well">
            <table class=" table table-striped">
              <thead>
                <tr>
                  <th>Email</th>
                  <th>Date sent</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sent as $req)
                  <tr>
                    <td>{{ $req->email }}</td>
                    <td>{{ $req->created_at->format('d/m/Y') }}</td>
                    <td><a href="{{ route('delete_invite', [$req->id]) }}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          <p><em>Note: invites are only valid 14 days after being sent, and they will disapear from this list afterwards</em></p>
              </div>
      </div>


    </div>
  </div>
  <div class="row">


  </div>
</div>

@endsection
