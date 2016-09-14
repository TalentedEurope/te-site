@extends('../layouts.app')

@section('page-title') Search for @endsection
@section('page-class') search students @endsection

@section('content')
<div class="container">
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
        <div class="study-level filter-list">
          <h3>Level of studies</h3>
          <ul>
            <li><label for="study-level"> <input type="checkbox" name="checkboxes" id="study-level" value="1"> Study level 6 </label> </li>
            <li><label for="study-level"> <input type="checkbox" name="checkboxes" id="study-level" value="1"> Study level 6 </label> </li>
            <li><label for="study-level"> <input type="checkbox" name="checkboxes" id="study-level" value="1"> Study level 6 </label> </li>
            <li><label for="study-level"> <input type="checkbox" name="checkboxes" id="study-level" value="1"> Study level 6 </label> </li>
            <li><label for="study-level"> <input type="checkbox" name="checkboxes" id="study-level" value="1"> Study level 6 </label> </li>
          </ul>
        </div>
        <div class="study-field filter-list">
          <h3>Field of studies</h3>
          <ul>
            <li><label for="study-level"> <input type="checkbox" name="checkboxes" id="study-level" value="1"> Field of studies </label> </li>
            <li><label for="study-level"> <input type="checkbox" name="checkboxes" id="study-level" value="1"> Field of studies </label> </li>
            <li><label for="study-level"> <input type="checkbox" name="checkboxes" id="study-level" value="1"> Field of studies </label> </li>
            <li><label for="study-level"> <input type="checkbox" name="checkboxes" id="study-level" value="1"> Field of studies </label> </li>
            <li><label for="study-level"> <input type="checkbox" name="checkboxes" id="study-level" value="1"> Field of studies </label> </li>
            <li class="more"><button><i class="fa fa-plus-square" aria-hidden="true"></i> View More</button></li>
          </ul>
        </div>
        <div class="language filter-list">
          <h3>Languages</h3>
          <ul>
            <li><label for="language"> <input type="checkbox" name="checkboxes" id="language" value="1"> Spanish </label> </li>
            <li><label for="language"> <input type="checkbox" name="checkboxes" id="language" value="1"> English </label> </li>
            <li><label for="language"> <input type="checkbox" name="checkboxes" id="language" value="1"> French </label> </li>
            <li><label for="language"> <input type="checkbox" name="checkboxes" id="language" value="1"> Italian </label> </li>
            <li><label for="language"> <input type="checkbox" name="checkboxes" id="language" value="1"> Slovak </label> </li>
          </ul>
        </div>
        <div class="language filter-list">
          <h3>Country</h3>
          <ul>
            <li><label for="language"> <input type="checkbox" name="checkboxes" id="language" value="1"> Spain </label> </li>
            <li><label for="language"> <input type="checkbox" name="checkboxes" id="language" value="1"> United Kigndom </label> </li>
            <li><label for="language"> <input type="checkbox" name="checkboxes" id="language" value="1"> France </label> </li>
            <li><label for="language"> <input type="checkbox" name="checkboxes" id="language" value="1"> Italy </label> </li>
            <li><label for="language"> <input type="checkbox" name="checkboxes" id="language" value="1"> Slovenia </label> </li>
          </ul>
        </div>
      </div>
      <div class="col-sm-8 col-md-9">
        <div class="well result-info">
          <span class="h4">We found 30 students matching your needs</span>
        </div>
        <ul class="results">
          <li class="well profile clearfix">
            <div class="col-sm-12">
              <div class="col-xs-12 col-sm-8 col-md-9">
                <h2 class="title">John Doe</h2>
                <p><em class="h3">Talented in Lorem ipsum</em></p>
                <hr>
                <p><strong><i class="fa fa-map-marker"></i> Lives in: </strong> Spain.</p>
                <p><strong>Studied: </strong> Doctorate in Lorem ipsum dolor sit amet Consectetuor.</p>
                <p><strong>In: </strong> IES Puerto de la Cruz Telesforo Bravo.</p>
                <p><strong>Skilled in: </strong>
                  <ul class="skills">
                    <li>Lorem ipsum</li>
                    <li>Dolor sit amet</li>
                    <li>Consectetur adipiscing elit</li>
                  </ul>
                </p>
                <p><strong>Languages: </strong>
                  <ul class="skills">
                    <li>Spanish</li>
                    <li>English</li>
                    <li>French</li>
                  </ul>
                </p>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-3 text-center">
                <figure>
                  <img src="http://placekitten.com/g/150/150" alt="" class="img-circle img-responsive">
                  <figcaption class="ratings">
                    <span class="label label-success"><i class="fa fa-star"></i> Validated</span>
                  </figcaption>
                </figure>
                <a class="btn-primary btn view-more">View more</a>
              </div>
            </div>
          </li>
          <!-- Copies -->
          <li class="well profile clearfix">
            <div class="col-sm-12">
              <div class="col-xs-12 col-sm-8 col-md-9">
                <h2 class="title">John Doe</h2>
                <p><em class="h3">Talented in Lorem ipsum</em></p>
                <hr>
                <p><strong><i class="fa fa-map-marker"></i> Lives in: </strong> Spain.</p>
                <p><strong>Studied: </strong> Doctorate in Lorem ipsum dolor sit amet Consectetuor.</p>
                <p><strong>In: </strong> IES Puerto de la Cruz Telesforo Bravo.</p>
                <p><strong>Skilled in: </strong>
                  <ul class="skills">
                    <li>Lorem ipsum</li>
                    <li>Dolor sit amet</li>
                    <li>Consectetur adipiscing elit</li>
                  </ul>
                </p>
                <p><strong>Languages: </strong>
                  <ul class="skills">
                    <li>Spanish</li>
                    <li>English</li>
                    <li>French</li>
                  </ul>
                </p>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-3 text-center">
                <figure>
                  <img src="http://placekitten.com/g/150/150" alt="" class="img-circle img-responsive">
                  <figcaption class="ratings">
                    <span class="label label-success"><i class="fa fa-star"></i> Validated</span>
                  </figcaption>
                </figure>
                <a class="btn-primary btn view-more">View more</a>
              </div>
            </div>
          </li>
          <li class="well profile clearfix">
            <div class="col-sm-12">
              <div class="col-xs-12 col-sm-8 col-md-9">
                <h2 class="title">John Doe</h2>
                <p><em class="h3">Talented in Lorem ipsum</em></p>
                <hr>
                <p><strong><i class="fa fa-map-marker"></i> Lives in: </strong> Spain.</p>
                <p><strong>Studied: </strong> Doctorate in Lorem ipsum dolor sit amet Consectetuor.</p>
                <p><strong>In: </strong> IES Puerto de la Cruz Telesforo Bravo.</p>
                <p><strong>Skilled in: </strong>
                  <ul class="skills">
                    <li>Lorem ipsum</li>
                    <li>Dolor sit amet</li>
                    <li>Consectetur adipiscing elit</li>
                  </ul>
                </p>
                <p><strong>Languages: </strong>
                  <ul class="skills">
                    <li>Spanish</li>
                    <li>English</li>
                    <li>French</li>
                  </ul>
                </p>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-3 text-center">
                <figure>
                  <img src="http://placekitten.com/g/150/150" alt="" class="img-circle img-responsive">
                  <figcaption class="ratings">
                    <span class="label label-success"><i class="fa fa-star"></i> Validated</span>
                  </figcaption>
                </figure>
                <a class="btn-primary btn view-more">View more</a>
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
