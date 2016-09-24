@extends('../layouts.app')

@section('page-title') Student Profile @endsection
@section('page-class') unique-profile student @endsection

@section('content')
<div class="container">
  <div class="row profile">
    <div class="col-xs-12 col-sm-8 col-md-9">
      <div class="well student-name">
        <h2 class="title">John Doe </h2>
        <p class="subtitle">Talented in Lorem ipsum</p>
      </div>

      <div class="well">
        <h3 class="section-title"> <i class="fa fa-info" aria-hidden="true"></i> About</h3>
        <ul class="student-specs">
        <li><strong><i class="icon fa fa-graduation-cap"></i>  Education: </strong> Doctorate in Lorem ipsum dolor sit amet Consectetuor</li>
        <li><strong><i class="icon fa fa-map-marker"></i>  Lives in: </strong> Puerto de la Cruz, <em>Spain</em> | <strong> Nationality: </strong> United Kingdom </li>
        <li><strong><i class="icon fa fa-calendar"></i>  Born on: </strong> 17 september 1993</li>
        <li><strong><i class="icon fa fa-lightbulb-o"></i> My talent:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut arcu sed odio vestibulum rhoncus et vel est. Ut id odio eu lorem iaculis posuere quis a elit. Nunc dictum placerat eros, eget pulvinar felis tristique eget. Curabitur fermentum purus vel lorem blandit fringilla. Mauris</span></li>
        </ul>
        <hr>
        <div class="row">
          <p class="validated-by col-sm-6"><span class="btn btn-lg"><strong><i class="fa fa-star icon"></i> Validated by:</strong> <a href="/profile?validator=true">John Smith</a> on 23/12/2016</span></p>
          <p class="col-sm-6"><a class="btn btn-lg btn-primary pull-right" href=""> <i class="fa fa-cloud-download" aria-hidden="true"></i> Europass Curriculum</a></p>
        </div>
      </div>

      <div class="well">
        <div class="skills">
          <h3 class="section-title"> <i class="fa fa-cogs" aria-hidden="true"></i> Skills</h3>
          <div class="row">
            <div class="col-sm-6"><h4>Professional</h4>
              <ul class="skills">
                <li class="important">Lorem ipsum</li>
                <li>Dolor sit amet</li>
                <li>Consectetur adipiscing elit</li>
              </ul>
            </div>
            <div class="col-sm-6"><h4>Personal</h4>
              <ul class="skills">
                <li class="important">Lorem ipsum</li>
                <li>Dolor sit amet</li>
                <li>Consectetur adipiscing elit</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="well">
        <div class="studies">
          <h3 class="section-title"> <i class="fa fa fa-graduation-cap" aria-hidden="true"></i> Studies</h3>
          <ul class="timeline">
            <li>
              <p class="date">1993 - Institution name</p>
              <h4>Name of study | <em>Level Name</em></h4>
              <p><a class="btn btn-primary btn-link" href="#"><i class="fa fa-cloud-download"></i> Grade card</a>  <a class="btn btn-primary btn-link" href="#"><i class="fa fa-cloud-download"></i> Certificate</a> </p>
            </li>
            <li>
              <p class="date">1993 - Institution name</p>
              <h4>Name of study | <em>Level Name</em></h4>
              <p><a class="btn btn-primary btn-link" href="#"><i class="fa fa-cloud-download"></i> Grade card</a>  <a class="btn btn-primary btn-link" href="#"><i class="fa fa-cloud-download"></i> Certificate</a> </p>
            </li>
          </ul>
        </div>
      </div>

      <div class="well">
        <div class="training">
          <h3 class="section-title"> <i class="fa fa fa-trophy" aria-hidden="true"></i> Training</h3>
          <ul class="timeline">
            <li>
              <p class="date">1993</p>
              <h4>Course name</h4>
              <p><a class="btn btn-primary btn-link" href="#"><i class="fa fa-cloud-download"></i> Certificate</a> </p>
            </li>
            <li>
              <p class="date">1993</p>
              <h4>Course name</h4>
              <p><a class="btn btn-primary btn-link" href="#"><i class="fa fa-cloud-download"></i> Certificate</a> </p>
            </li>
          </ul>
        </div>
      </div>

      <div class="well">
        <div class="languages">
          <h3 class="section-title"> <i class="fa fa fa-language" aria-hidden="true"></i> Languages</h3>
          <ul class="cards clearfix">
            <li>
              <h4>Language name | <em>Level</em></h4>
              <p><a class="btn btn-primary btn-link" href="#"><i class="fa fa-cloud-download"></i> Certificate</a> </p>
            </li>
            <li>
              <h4>Language name | <em>Level</em></h4>
              <p><a class="btn btn-primary btn-link" href="#"><i class="fa fa-cloud-download"></i> Certificate</a> </p>
            </li>
            <li>
              <h4>Language name | <em>Level</em></h4>
              <p><a class="btn btn-primary btn-link" href="#"><i class="fa fa-cloud-download"></i> Certificate</a> </p>
            </li>
            <li>
              <h4>Language name | <em>Level</em></h4>
              <p><a class="btn btn-primary btn-link" href="#"><i class="fa fa-cloud-download"></i> Certificate</a> </p>
            </li>

          </ul>
        </div>
      </div>

      <div class="well">
        <div class="experience">
          <h3 class="section-title"> <i class="fa fa fa-suitcase" aria-hidden="true"></i> Work experience</h3>
          <ul class="timeline">
            <li>
              <p class="date">1993 - 1993 </p>
              <h4><strong>Position</strong> at Company name</h4>
            </li>
            <li>
              <p class="date">1993 - 1993 </p>
              <h4><strong>Position</strong> at Company name</h4>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-3 text-center contact-info">
      <div class="well">
        <figure>
          <img src="http://placekitten.com/g/150/150" alt="" class="img-circle img-responsive">
        </figure>
        <div class="contact">
          <h3>Get in contact</h3>
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
                <i class="fa fa-email"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
