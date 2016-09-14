@extends('layouts.app')

@section('content')

<div class="container nudges">
  <div class="row">
    <h1 class="page-title">My students</h1>
    <div class="panel panel-default col-sm-12">
      <table class="table table-striped table-hover table-responsive">
        <thead>
          <tr>
            <th>Student</th>
            <th>Date of request</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><a href="">Pol Cámara Solé</a></td>
            <td>Two days ago</td>
            <td><span class="label label-default">Pending</span></td>
          </tr>
          <tr>
            <td><a href="">Pol Cámara Solé</a></td>
            <td>Two days ago</td>
            <td><span class="label label-success">Validated</span></td>
          </tr>
          <tr>
            <td><a href="">Pol Cámara Solé</a></td>
            <td>Two days ago</td>
            <td><span class="label label-danger">Not validated</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
