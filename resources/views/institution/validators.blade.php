@extends('layouts.app')

@section('content')

<div class="container validators">
  <div class="row">
    <h1 class="page-title">Validators</h1>
    <div class="panel panel-default col-sm-12">
      <table class="table table-striped table-hover table-responsive">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Position</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Pol Cámara Solé</td>
            <td>polcmara@gmail.com</td>
            <td>Information Technology</td>
            <td>Teacher</td>
            <td><a href="" class="btn btn-primary"><i class="fa fa-toggle-on" aria-hidden="true"></i> Enable</a></td>
          </tr>
          <tr>
            <td>Pol Cámara Solé</td>
            <td>polcmara@gmail.com</td>
            <td>Information Technology</td>
            <td>Teacher</td>
            <td><a href="" class="btn btn-warning"><i class="fa fa-toggle-off" aria-hidden="true"></i> Disable</a></td>
          </tr>
          <tr>
            <td>Pol Cámara Solé</td>
            <td>polcmara@gmail.com</td>
            <td>Information Technology</td>
            <td>Teacher</td>
            <td><a href="" class="btn btn-primary"><i class="fa fa-toggle-on" aria-hidden="true"></i> Enable</a></td>
          </tr>
          <tr>
            <td>Pol Cámara Solé</td>
            <td>polcmara@gmail.com</td>
            <td>Information Technology</td>
            <td>Teacher</td>
            <td><a href="" class="btn btn-warning"><i class="fa fa-toggle-off" aria-hidden="true"></i> Disable</a></td>
          </tr>
          <tr>
            <td>Pol Cámara Solé</td>
            <td>polcmara@gmail.com</td>
            <td>Information Technology</td>
            <td>Teacher</td>
            <td><a href="" class="btn btn-primary"><i class="fa fa-toggle-on" aria-hidden="true"></i> Enable</a></td>
          </tr>
          <tr>
            <td>Pol Cámara Solé</td>
            <td>polcmara@gmail.com</td>
            <td>Information Technology</td>
            <td>Teacher</td>
            <td><a href="" class="btn btn-warning"><i class="fa fa-toggle-off" aria-hidden="true"></i> Disable</a></td>
          </tr>
          <tr>
            <td>Pol Cámara Solé</td>
            <td>polcmara@gmail.com</td>
            <td>Information Technology</td>
            <td>Teacher</td>
            <td><a href="" class="btn btn-primary"><i class="fa fa-toggle-on" aria-hidden="true"></i> Enable</a></td>
          </tr>
          <tr>
            <td>Pol Cámara Solé</td>
            <td>polcmara@gmail.com</td>
            <td>Information Technology</td>
            <td>Teacher</td>
            <td><a href="" class="btn btn-warning"><i class="fa fa-toggle-off" aria-hidden="true"></i> Disable</a></td>
          </tr>
        </tbody>
      </table>
    </div>

    <h2>Add a new validator</h2>
    <div class="well col-sm-5">
      <form action="{{ url('/validator/add') }}" class="form-inline">
        <div class="form-group">
          <input type="email" class="form-control" id="email" placeholder="Validator email">
        </div>
        <button type="submit" class="btn btn-primary">Send invitation to validator</button>
      </form>
    </div>
  </div>
</div>

@endsection
