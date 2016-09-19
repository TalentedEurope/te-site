@extends('../layouts.app')

@section('page-title') Company Profile @endsection
@section('page-class') unique-profile company @endsection

@section('content')
<div class="container">
  <div class="row profile">
    <div class="col-xs-12">
      <div class="well student-name">
        <h2 class="title">John Doe </h2>
        <p class="subtitle">Institution name</p>
      </div>

      <div class="well">
        <h3 class="section-title"> <i class="fa fa-users" aria-hidden="true"></i> Validated students</h3>
        <ul class="cards clearfix">
          <li><strong><i class="icon fa fa-user"></i>  <a href="">Lorem ipsum dolor sit amet</a> </strong></li>
          <li><strong><i class="icon fa fa-user"></i>  <a href="">Lorem ipsum dolor sit amet</a> </strong></li>
          <li><strong><i class="icon fa fa-user"></i>  <a href="">Lorem ipsum dolor sit amet</a> </strong></li>
          <li><strong><i class="icon fa fa-user"></i>  <a href="">Lorem ipsum dolor sit amet</a> </strong></li>
        </ul>
      </div>

    </div>
  </div>
</div>
@endsection
