@extends('../layouts.app')

@section('page-title') {!! trans('global.search_info') !!} @endsection
@section('page-class') search institutions @endsection
@section('menu-institution') class="active" @endsection

@section('content')
<div class="container v-container">
  <div class="col-sm-12 sm-no-padding-right" id="results">
  <h1>{{ trans('global.institution_plural') }} </h1>

    <div class="col-sm-12 search-bar">
      <div class="form-group col-sm-10">
          <input type="text" class="quicksearch form-control" placeholder="{{ trans("reg-profile.name") }}">
      </div>
      <div class="form-group col-sm-2">
          <button type="submit" class="btn btn-primary quicksearch-btn">
              <i class="fa fa-search" aria-hidden="true"></i> {{ trans("landing.search_btn") }}
          </button>
      </div>
    </div>

    <br style="clear:both" />

    <div class="well result-info">
        <span class="h4">{{ trans("search.we_found") }} <span class="total-institutions">{{ sizeof($institutions) }}</span> {{ trans('global.institution_plural') }} </span>
    </div>

    <ul class="results list-unstyled">

    @foreach ($institutions as $institution)
      <li class="well profile clearfix institution-item {{ $institution->country }} {{ $institution->userable->type }}">
              <div class="col-xs-12 col-sm-8 col-md-9">
                  <h2 class="title">{{ $institution->name }}</h2>
                  <p><em class="h4">{{ trans('reg-profile.institution_' . strtolower($institution->userable->type)) }} </em></p>
                  <hr>
                  <p class="h4">
                      <strong><i class="fa fa-map-marker"></i> {{ trans('reg-profile.we_are_in') }}: </strong>
                      {{ $institution->city }}, {{ trans('global.'.$institution->country) }}
                  </p>
                  @if ($institution->userable->validators->where('enabled', true)->count())
                  <p>
                      <strong>{{ trans('validators.validators') }} </strong>
                  </p>
                  <ul class="validators list-inline">
                    @foreach ($institution->userable->validators as $validator)
                        @if ($validator->enabled && $validator->user && $validator->user->is_filled)
                        <li><a href="{{ route('get_profile', [$validator->user->getSlug(), $validator->user->id ] ) }}" class="btn btn-primary">{{ $validator->user->fullName }}</a></li>
                        @endif
                    @endforeach
                  </ul>
                  @endif
              </div>
              @if ($institution->image)
              <div class="col-xs-12 col-sm-4 col-md-3 text-center">
                  @if ( $institution->image != 'default.png')
                  <figure>
                      <img alt="{{ $institution->name }}" class="img-responsive" src="{{ asset(\App\Models\User::$photoPath.$institution->image) }}">
                  </figure>
                  @endif
                    @if ($institution->userable->certificate != "")
                      <p>
                      <a href="{{ route('get_institution_certificate', [$institution->id]) }}" class="label label-success"><i class="fa fa-star"></i>
                        {{ trans('students-validation.validated') }}
                      </a>
                      </p>
                    @endif
              </div>
              @endif
        </li>
      @endforeach
    </ul>
  </div>
</div>
@endsection

@section('js')
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

  <script type="text/javascript">
      // quick search regex
      var qsRegex;

      // init Isotope
      var $grid = $('.results').isotope({
        itemSelector: '.institution-item',
        layoutMode: 'vertical',
        vertical: {
          horizontalAlignment: 0.5,
        },
        filter: function() {
          return qsRegex ? $(this).text().match( qsRegex ) : true;
        }
      });


     var interval =  setInterval(function(){ $grid.isotope()  }, 5000);

      $(window).load(function(e) {
	$grid.isotope( )
        clearInterval(interval);
      });


      // use value of search field to filter
      var $quicksearch = $('.quicksearch-btn').click(function() {
        qsRegex = new RegExp( $( '.quicksearch' ).val(), 'gi' );
        $grid.isotope();
        setTimeout(() => {
            jQuery(".total-institutions").text(jQuery(".institution-item:visible").length);
          }, 500);
      }  );

      var $quicksearch = $('.quicksearch').keypress(function(e) {
        if(e.which == 13) {
          qsRegex = new RegExp( $( '.quicksearch' ).val(), 'gi' );
          $grid.isotope();
          setTimeout(() => {
            jQuery(".total-institutions").text(jQuery(".institution-item:visible").length);
          }, 500);
        }
      });

      // debounce so filtering doesn't happen every millisecond
      function debounce( fn, threshold ) {
        var timeout;
        return function debounced() {
          if ( timeout ) {
            clearTimeout( timeout );
          }
          function delayed() {
            fn();
            timeout = null;
          }
          timeout = setTimeout( delayed, threshold || 100 );
        }
      }
  </script>


@endsection
