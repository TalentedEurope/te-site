@extends('../layouts.app')

@section('page-title') Company Profile @endsection
@section('page-class') unique-profile company @endsection

@section('content')
<div class="container">
  <div class="row profile">
    <div class="col-xs-12 col-sm-8 col-md-9">
      <div class="well student-name">
        <h2 class="title">John Doe </h2>
        <p class="subtitle">Company Sector</p>
      </div>

      <div class="well">
        <h3 class="section-title"> <i class="fa fa-info" aria-hidden="true"></i> About</h3>
        <ul class="student-specs">
        <li><strong><i class="icon fa fa-map-marker"></i>  We are in: </strong> Puerto de la Cruz, <em>Spain</em></li>
        <li><strong><i class="icon fa fa-cogs"></i> We're looking for people skilled in: </strong>
              <ul class="skills">
                <li>Lorem ipsum</li>
                <li>Dolor sit amet</li>
                <li>Consectetur adipiscing elit</li>
              </ul>
        </li>
        <li><strong><i class="icon fa fa-lightbulb-o"></i>We think that talent is:</strong> elly apple pie icing. Jelly cupcake tiramisu jelly beans marzipan. Cheesecake jelly-o jelly tootsie roll biscuit chocolate macaroon marshmallow. Jelly-o marshmallow tart donut brownie chocolate topping chocolate cake.</li>
        </ul>
      </div>

    </div>

    <div class="col-xs-12 col-sm-4 col-md-3 text-center contact-info">
      <div class="well">
        <figure>
          <img src="http://placebear.com/g/150/150" alt="" class="img-circle img-responsive">
        </figure>
        <div class="contact">
          <h3>Get in contact</h3>
            <a href="#" class="btn btn-primary btn-nudge btn-lg"><i class="fa fa-bell" aria-hidden="true"></i> I'm here!</a>
            <a href="#" class="btn btn-primary btn-tooltip btn-lg" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Explanation text about what the Hey listen! button does"> ? </a>
          <hr>
          <p><i class="fa icon fa-envelope"></i> Email: <a href="mailto:john@doe.com">john@doe.com</a></p>
          <p><i class="fa icon fa-phone"></i> Phone:  <a href="tel:+13174562564">317-456-2564</a></p>
          <address>
            32 Reading rd, Birmingham<br>
            B26 3QJ, United Kingdom
          </address>
          <ul class="social">
            <li>
              <a href="#">
                <i class="fi flaticon-facebook"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fi flaticon-twitter"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-linkedin"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
