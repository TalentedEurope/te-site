@extends('../layouts.app')

@section('page-title') Search for @endsection
@section('page-class') search students @endsection

@section('content')
<div class="container search students">
  <form class="form-vertical" role="form" method="POST" action="http://te-site.dev/search">
    <div class="row">
      <div class="col-sm-12 well search-bar">
        <div class="form-group col-sm-3">
          <div class="select-holder">
            <select class="form-control" id="country" name="country">
              <option value="" selected="">Search for:</option>
            </select>
          </div>
        </div>
        <div class="form-group col-sm-7">
          <input type="text" class="form-control" id="name" name="name" placeholder="What are you looking for?">
        </div>
        <div class="form-group col-sm-2">
          <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4 col-md-3 search-options">
        <div class="options-title">
          <span class="h3"><i class="fa fa-filter" aria-hidden="true"></i>Filters</span>
        </div>
        <div class="current-search">
          <h3>Current Search</h3>
          <ul>
            <li>Item <button class="remove-item"><i class="fa fa-close" aria-hidden="true"></i></button></li>
            <li>Item <button class="remove-item"><i class="fa fa-close" aria-hidden="true"></i></button></li>
            <li>Item <button class="remove-item"><i class="fa fa-close" aria-hidden="true"></i></button></li>
            <li>Item <button class="remove-item"><i class="fa fa-close" aria-hidden="true"></i></button></li>
            <li>Item <button class="remove-item"><i class="fa fa-close" aria-hidden="true"></i></button></li>
          </ul>
        </div>
        <div class="activity-sector filter-list">
          <h3>Activity Sector</h3>
          <ul>
            <li><label for="study-level"> <input type="checkbox" name="checkboxes" id="study-level" value="1"> Activity 1</label> </li>
            <li><label for="study-level"> <input type="checkbox" name="checkboxes" id="study-level" value="1"> Activity 1 </label> </li>
            <li><label for="study-level"> <input type="checkbox" name="checkboxes" id="study-level" value="1"> Activity 1 </label> </li>
            <li><label for="study-level"> <input type="checkbox" name="checkboxes" id="study-level" value="1"> Activity 1 </label> </li>
            <li><label for="study-level"> <input type="checkbox" name="checkboxes" id="study-level" value="1"> Activity 1 </label> </li>
          </ul>
        </div>
        <div class="language filter-list">
          <h3>Country</h3>
          <ul>
            <li><label for="country"> <input type="checkbox" name="checkboxes" id="country" value="1"> Spain </label> </li>
            <li><label for="country"> <input type="checkbox" name="checkboxes" id="country" value="1"> United Kigndom </label> </li>
            <li><label for="country"> <input type="checkbox" name="checkboxes" id="country" value="1"> France </label> </li>
            <li><label for="country"> <input type="checkbox" name="checkboxes" id="country" value="1"> Italy </label> </li>
            <li><label for="country"> <input type="checkbox" name="checkboxes" id="country" value="1"> Slovenia </label> </li>
          </ul>
        </div>
      </div>
      <div class="col-sm-8 col-md-9">
        <div class="well result-info">
          <span class="h4">We found 30 companies matching your needs</span>
          <p><label class="h5" for="magic-matching"> <input type="checkbox" name="magic-matching" id="magic-matching" value="1"> Search only for companies with matched desired skills <em>(magic matching)</em> </label> </p>
        </div>
        <ul class="results">
          <li class="well profile clearfix">
            <div class="col-sm-12">
              <div class="col-xs-12 col-sm-8 col-md-9">
                <h2 class="title">John Doe LLC.</h2>
                <p><em class="h4">Company Sector</em></p>
                <hr>
                <p class="h4"><strong><i class="fa fa-map-marker"></i> We are in: </strong> Santa Cruz de Tenerife,  Spain.</p>
                <p><strong>We're looking for people skilled in: </strong>
                  <ul class="skills">
                    <li>Lorem ipsum</li>
                    <li>Dolor sit amet</li>
                    <li>Consectetur adipiscing elit</li>
                  </ul>
                </p>
                <p><strong>We think that talent is: </strong> Jelly apple pie icing. Jelly cupcake tiramisu jelly beans marzipan. Cheesecake jelly-o jelly tootsie roll biscuit chocolate macaroon marshmallow. Jelly-o marshmallow tart donut brownie chocolate topping chocolate cake. </p>

                <a href="#" class="btn btn-primary btn-nudge btn-lg" ><i class="fa fa-bell" aria-hidden="true"></i> I'm here!</a>

                <a href="#" class="btn btn-primary btn-tooltip btn-lg" data-toggle="tooltip" data-placement="right" title="Explanation text about what the Hey listen! button does" > ? </a>

              </div>
              <div class="col-xs-12 col-sm-4 col-md-3 text-center">
                <figure>
                  <img src="http://placebear.com/g/150/150" alt="" class="img-circle img-responsive">
                </figure>
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
                      <i class="fa fa-envelope"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
          <!-- Copies -->
          <li class="well profile clearfix">
            <div class="col-sm-12">
              <div class="col-xs-12 col-sm-8 col-md-9">
                <h2 class="title">John Doe LLC.</h2>
                <p><em class="h4">Company Sector</em></p>
                <hr>
                <p class="h4"><strong><i class="fa fa-map-marker"></i> We are in: </strong> Santa Cruz de Tenerife,  Spain.</p>
                <p><strong>We're looking for people skilled in: </strong>
                  <ul class="skills">
                    <li>Lorem ipsum</li>
                    <li>Dolor sit amet</li>
                    <li>Consectetur adipiscing elit</li>
                  </ul>
                </p>
                <p><strong>We think that talent is: </strong> Jelly apple pie icing. Jelly cupcake tiramisu jelly beans marzipan. Cheesecake jelly-o jelly tootsie roll biscuit chocolate macaroon marshmallow. Jelly-o marshmallow tart donut brownie chocolate topping chocolate cake. </p>

                <a href="#" class="btn btn-primary btn-nudge btn-lg" ><i class="fa fa-bell" aria-hidden="true"></i> I'm here!</a>

                <a href="#" class="btn btn-primary btn-tooltip btn-lg" data-toggle="tooltip" data-placement="right" title="Explanation text about what the Hey listen! button does" > ? </a>

              </div>
              <div class="col-xs-12 col-sm-4 col-md-3 text-center">
                <figure>
                  <img src="http://placebear.com/g/150/150" alt="" class="img-circle img-responsive">
                </figure>
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
                      <i class="fa fa-envelope"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
          <li class="well profile clearfix">
            <div class="col-sm-12">
              <div class="col-xs-12 col-sm-8 col-md-9">
                <h2 class="title">John Doe LLC.</h2>
                <p><em class="h4">Company Sector</em></p>
                <hr>
                <p class="h4"><strong><i class="fa fa-map-marker"></i> We are in: </strong> Santa Cruz de Tenerife,  Spain.</p>
                <p><strong>We're looking for people skilled in: </strong>
                  <ul class="skills">
                    <li>Lorem ipsum</li>
                    <li>Dolor sit amet</li>
                    <li>Consectetur adipiscing elit</li>
                  </ul>
                </p>
                <p><strong>We think that talent is: </strong> Jelly apple pie icing. Jelly cupcake tiramisu jelly beans marzipan. Cheesecake jelly-o jelly tootsie roll biscuit chocolate macaroon marshmallow. Jelly-o marshmallow tart donut brownie chocolate topping chocolate cake. </p>
                <a href="#" class="btn btn-primary btn-nudge btn-lg">
                  <i class="fa fa-bell" aria-hidden="true"></i> I'm here!
                </a>
                <a href="#" class="btn btn-primary btn-tooltip btn-lg" data-toggle="tooltip" data-placement="right" title="Explanation text about what the Hey listen! button does" > ? </a>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-3 text-center">
                <figure>
                  <img src="http://placebear.com/g/150/150" alt="" class="img-circle img-responsive">
                </figure>
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
                      <i class="fa fa-envelope"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </li>

          <!-- End of copies -->
        </ul>
      </div>
    </div>
  </form>
</div>
@endsection
