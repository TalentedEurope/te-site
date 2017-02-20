<!DOCTYPE html>
<html>
  <head>
    <title>Talented Europe</title>
    <link rel="stylesheet" type="text/css" href="{{ elixir("css/landing.css") }}">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:200,400,700,400italic,200italic,700italic,900' rel='stylesheet' type='text/css'>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="{{ trans('landing.meta_title') }}" property="og:title" />
    <meta content="{{ trans('landing.meta_description') }}" name="description" />
    <meta content="{{ URL::to('/') }}" name="url" property="og:url" />
    <meta content="website" name="type" property="og:type" />
    <meta content="{{ URL::asset('img/logo-header.png') }}" name="image" property="og:image" />
    <meta name="mapPoints" id="mapPoints" content='{!! $cities !!}'>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

    <link rel="apple-touch-icon" sizes="57x57" href="{{ URL::asset('img/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ URL::asset('img/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('img/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('img/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('img/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ URL::asset('img/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('img/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ URL::asset('img/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('img/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ URL::asset('img/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ URL::asset('img/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', '{{ env('ANALYTICS',false) }}', 'auto');
      ga('send', 'pageview');

    </script>

    <script type="text/javascript">
      TE = {};
      TE.translations = {
        'en': {
          'auth': {!! json_encode(trans('auth'), JSON_HEX_APOS) !!},
          'global': {!! json_encode(trans('global'), JSON_HEX_APOS) !!},
          'landing': {!! json_encode(trans('landing'), JSON_HEX_APOS) !!},
          'pagination': {!! json_encode(trans('pagination'), JSON_HEX_APOS) !!},
          'passwords': {!! json_encode(trans('passwords'), JSON_HEX_APOS) !!},
          'profile': {!! json_encode(trans('profile'), JSON_HEX_APOS) !!},
          'reg-profile': {!! json_encode(trans('reg-profile'), JSON_HEX_APOS) !!},
          'validation': {!! json_encode(trans('validation'), JSON_HEX_APOS) !!},
        }
      };
    </script>
  </head>

  <body class="v-container">
    <header class="hero">
      <nav class="navbar navbar-inverse navbar-landing navbar-static-top">
        <div class="container">
          <div id="navbar">

            <ul class="nav navbar-nav navbar-right languages-nav">
              <li><a href="?lang=en">EN</a></li>
              <li><a href="?lang=es">ES</a></li>
              <li><a href="?lang=it">IT</a></li>
              <li><a href="?lang=de">DE</a></li>
              <li><a href="?lang=fr">FR</a></li>
              <li><a href="?lang=sk">SK</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right social-nav">
              <li>
                <a href="https://www.facebook.com/Talented-Europe-839419182764068/">
                  <i class="fi flaticon-facebook"></i>
                </a>
              </li>
              <li>
                <a href="https://twitter.com/talentedeurope">
                  <i class="fi flaticon-twitter"></i>
                </a>
              </li>
              <li>
                <a href="https://www.youtube.com/channel/UCkj5UUptbZnQ5kvxVpDfkBw">
                  <i class="fi flaticon-youtube"></i>
                </a>
              </li>
            </ul>

            @if (Auth::user())
            <ul class="nav navbar-nav navbar-right login">
              <li><a href="{{ URL::to('/register') }}">{!! trans('landing.search_btn') !!}</a></li>
              <li><a href="{{ URL::to('/logout') }}">{!! trans('global.logout_btn') !!}</a></li>
            </ul>
            @else
            <ul class="nav navbar-nav navbar-right login">
              <li><a href="{{ URL::to('/login') }}">{!! trans('global.login_btn') !!}</a></li>
              <li><a href="{{ URL::to('/register') }}">{!! trans('global.register_btn') !!}</a></li>
            </ul>
            @endif

          </div>
        </div>
      </nav>

      <div class="hero-video">
        <div class="hero-video-overlay"></div>
        <div class="video-bg cover">
          <div class="video-fg">
              <video autoplay loop="true" width="1280" height="720">
                <source src="video/home-video.mp4" type='video/mp4' />
                <source src="video/home-video.webm" type='video/webm' />
              </video>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row content">
          <img class="logo" src="{{ URL::asset('img/logo-header-alt.png') }}" alt="Talented Europe">

          <div class="search-bar-wrapper">
            <search-bar :show-type-selector="true" :landing="true" :transition="true"></search-bar>
          </div>
        </div>
      </div>
    </header>


    <section id="about" class="about-section clearfix content-section">
      <div class="content">
        <div class="vertical-centered">
          <h1 class="text-center">{!! trans('landing.what_is_title') !!}</h1>
          <p class="col-md-6">{!! trans('landing.what_is_text_1') !!}</p>
          <p class="col-md-6">{!! trans('landing.what_is_text_2') !!}</p>
          <h3 class="text-center col-md-12">{!! trans('landing.what_is_cta') !!}</h3>
          <div class="text-center col-md-12">
            <a href="{{ URL::asset('docs/'.App::getLocale().'/TalentedEuropeBrochureC.pdf') }}" target="_blank" class="btn" onclick="ga('send', 'event', 'Brochure Company', 'Download', '{{ App::getLocale() }}');">
              <i class="fi flaticon-cloud-download"></i>
                {!! explode("|", trans('global.company'))[1] !!}
            </a>
            <a href="{{ URL::asset('docs/'.App::getLocale().'/TalentedEuropeBrochureI.pdf') }}" target="_blank" class="btn" onclick="ga('send', 'event', 'Brochure Institution', 'Download', '{{ App::getLocale() }}');">
              <i class="fi flaticon-cloud-download"></i>
                {!! explode("|", trans('global.institution'))[1] !!}
            </a>
            <a href="{{ URL::asset('docs/'.App::getLocale().'/TalentedEuropeBrochureS.pdf') }}" target="_blank" class="btn" onclick="ga('send', 'event', 'Brochure Student', 'Download', '{{ App::getLocale() }}');">
              <i class="fi flaticon-cloud-download"></i>
                {!! explode("|", trans('global.student'))[1] !!}
            </a>
          </div>
        </div>
      </div>
    </section>

    @if ($talentQuote)
    <section class="quote-section content-section">
      <div class="overlay"></div>
      <div class="content text-center">
        @if ($talentQuote->user->image)
        <a href="{{ route('get_profile', [str_slug($talentQuote->user->name),$talentQuote->user->id]) }}">
        <img width="150" class="round" src="{{ asset('uploads/photo/'.$talentQuote->user->image) }}"/>
        </a>
        @endif
        <p class="quote-text">{{ $talentQuote->talent }}</p>
        <p class="quote-author">{{ $talentQuote->overseer }} - {{ $talentQuote->user->name }} </p>
      </div>
    </section>
    @else
    <section class="quote-section content-section">
      <div class="overlay"></div>
      <div class="content text-center">
        <p class="quote-text">“Hide not your talents, they for use were made,<br/>
            What's a sundial in the shade?”</p>
        <p class="quote-author">Benjamin Franklin</p>
      </div>
    </section>
    @endif

    <section class="logos-carousel-section content-section col-md-12">
      <div class="content">
        <ul class="nav nav-tabs text-center">
          <li role="presentation" class="active">
            <a href="#companies-logos" aria-controls="profile" role="tab" data-toggle="tab">
              <i class="fa fa-building" aria-hidden="true"></i>
              <div>Companies</div>
            </a>
          </li>
          <li role="presentation">
            <a href="#institutions-logos" aria-controls="profile" role="tab" data-toggle="tab">
              <i class="fa fa-university" aria-hidden="true"></i>
              <div>Institutions</div>
            </a>
          </li>
        </ul>

        <div class="tab-content">
          <div role="tabpanel" id="companies-logos" class="@if ($companies->count()) companies-logos @endif tab-pane active">
            @if ($companies->count())
              @foreach ($companies as $company)
                <a href="{{ route('get_profile', [str_slug($company->user->name),$company->user->id]) }}">
                <img width="150" src="{{ asset('uploads/photo/'.$company->user->image) }}"/>
                </a>
              @endforeach
            @else
              <p class="h2 text-center">No companies available</p>
            @endif
          </div>

          <div role="tabpanel" id="institutions-logos" class="tab-pane @if ($institutions->count()) institutions-logos @endif">
            @if ($institutions->count())
              @foreach ($institutions as $institution)
                <a href="{{ route('get_profile', [str_slug($institution->user->name),$institution->user->id]) }}">
                <img width="150" src="{{ asset('uploads/photo/'.$institution->user->image) }}"/>
                </a>
              @endforeach
            @else
              <p class="h2 text-center">No institutions available</p>
            @endif
          </div>
        </div>
      </div>
    </section>


    <section class="stadistics-section content-section col-md-12">
      <div class="content">
        <h1 class="text-center">Stadistics</h1>
        <div class="stadistics-box clearfix">
          <div class="col-xs-3 col-sm-3 text-center">
            <div class="c100 p73 yellow small center">
              <span>{{ $alerts }}</span>
              <div class="slice">
                <div class="bar"></div>
                <div class="fill"></div>
              </div>
            </div>
            <p>Contacts between students and companies</p>
          </div>

          <div class="col-xs-3 col-sm-3 text-center">
            <div class="c100 p{{ round($studentsCount/$totalUserCount*100) }} small center">
              <span>{{ round($studentsCount/$totalUserCount*100) }}%</span>
              <div class="slice">
                <div class="bar"></div>
                <div class="fill"></div>
              </div>
            </div>
            <p>Students</p>
          </div>

          <div class="col-xs-3 col-sm-3 text-center">
            <div class="c100 p{{ round($companiesCount/$totalUserCount*100) }} yellow small center">
              <span>{{ round($companiesCount/$totalUserCount*100) }}%</span>
              <div class="slice">
                <div class="bar"></div>
                <div class="fill"></div>
              </div>
            </div>
            <p>Companies</p>
          </div>

          <div class="col-xs-3 col-sm-3 text-center">
            <div class="c100 p{{ $institutionsCount/$totalUserCount*100 }} small center">
              <span>{{ $institutionsCount/$totalUserCount*100 }}%</span>
              <div class="slice">
                <div class="bar"></div>
                <div class="fill"></div>
              </div>
            </div>
            <p>Institutions</p>
          </div>
        </div>
      </div>
    </section>


    <section class="map-section col-md-12">
      <div class="map"></div>
    </section>


    <section class="students-section content-section col-md-12">
      <div class="content">
        <h1 class="text-center">Recent students</h1>
        <div class="students-box clearfix">
          @if ($recentStudents->count())
            @foreach ($recentStudents as $student)
              <a href="{{ route('get_profile', [str_slug($student->user->name),$student->user->id]) }}" class="col-xs-6 col-sm-4 col-md-2 text-center">
              <img width="150" src="{{ asset('uploads/photo/'.$student->user->image) }}"/>
              <p>{{ $student->user->FullName }}</p>
              </a>
            @endforeach
          @else
            <p class="h2">No students available</p>
          @endif
        </div>
        <div class="text-center">
          <a class="button" href="{{ route('searchStudents') }}">View More</a>
        </div>
      </div>
    </section>


    <section id="subscribe" class="subscribe-section content-section text-center col-md-12">
      <div class="overlay"></div>
      <div class="content">
        <h1>{{ trans('landing.subscribe_title') }}</h1>
        <p>{!! trans('landing.subscribe_text_question') !!}</p>
        <a class="button" href="http://talentedeurope.us13.list-manage.com/subscribe?u=b4e15aa0a9873bc5785280c76&id=2854c91856">{{ trans('landing.subscribe_btn_text') }}</a>

        <div class="social">
          <p>
            {{ trans('landing.subscribe_follow_text') }}
          </p>
          <ul class="nav">
            <li>
              <a class="facebook" href="https://www.facebook.com/Talented-Europe-839419182764068/">
                <i class="fi flaticon-facebook"></i>
              </a>
            </li>
            <li>
              <a class="twitter" href="https://twitter.com/talentedeurope">
                <i class="fi flaticon-twitter"></i>
              </a>
            </li>
            <li>
              <a class="youtube" href="https://www.youtube.com/channel/UCkj5UUptbZnQ5kvxVpDfkBw">
                <i class="fi flaticon-youtube"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </section>


    <div class="pre-footer col-md-12">
      <div class="container">
        <div class="col-sm-6">
          <a href="{{ url('/') }}">
            <img class="te-logo" src="{{ asset('img/logo-header.png') }}" alt="{{ env('SITE_TITLE','Talented Europe') }}">
          </a>
          <ul class="navigation" role="nav">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="http://blog.talentedeurope.eu" target="_blank">Blog</a></li>
            <li><a href="{{ url('/cookies') }}">Cookies</a></li>
            <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
          </ul>
          <ul class="navigation">
            <li>
            Follow us:
            </li>
            <li>
              <a href="https://www.facebook.com/Talented-Europe-839419182764068/">
                <i class="fi flaticon-facebook"></i>
              </a>
            </li>
            <li>
              <a href="https://twitter.com/talentedeurope">
                <i class="fi flaticon-twitter"></i>
              </a>
            </li>
            <li>
              <a href="https://www.youtube.com/channel/UCkj5UUptbZnQ5kvxVpDfkBw">
                <i class="fi flaticon-youtube"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-sm-6">
          <h3>Partners</h3>

          <ul class="partner-list">
            <li><a target="_blank" href="http://erasmusplus.iespuertodelacruz.es"><img src="/img/logo-iespto.png" alt="IES Puerto de la Cruz"></a></li>
            <li><a target="_blank" href="http://cifpcesarmanrique.es/"><img src="/img/logo-cifpcesar.png" alt="CIFP César Manrique"></a></li>
            <li><a target="_blank" href="http://europeanprojects.org/"><img src="/img/logo-epa.png" alt="European Projects Association"></a></li>
            <li><a target="_blank" href="http://web.tuke.sk/kj/english_version.htm"><img src="/img/logo-tuke.png" alt="Technical University of Kosice"></a></li>
            <li><a target="_blank" href="http://www.beds.ac.uk/"><img src="/img/logo-ubbs.png" alt="University of Bedfordshire"></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer col-md-12">
      <div class="ue-logos row xs12">
        <div class="logo">
          <a href="https://ec.europa.eu/programmes/erasmus-plus/" target="_blank"><img src="{{ asset('/img/logo-footer-erasmus.png') }}" width="174" alt="Erasmus+"></a>
        </div>
        <div class="logo">
          <a href="https://ec.europa.eu/programmes/erasmus-plus/" target="_blank"><img src="{{ asset('/img/logo-footer-cofunded-ue.png') }}" width="160" alt="Co-funded by the Erasmus+ Programme of the European Union"></a>
        </div>
        <div class="logo">
          <a href="http://sepie.es/" target="_blank"><img src="{{ asset('/img/logo-footer-gob-espana-y-sepie.svg') }}" width="240" alt="Gobierno de españa and Sepie"></a>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ URL::asset('js/conditionizr/conditionizr.js') }}"></script>
    <script src="{{ URL::asset('js/conditionizr/ios.js') }}"></script>
    <script src="{{ URL::asset('js/slick-carousel/slick.js') }}"></script>
    <script src="{{ URL::asset('js/jdoom.min.js') }}"></script>
    <script src="{{ elixir('js/landing-build.js') }}"></script>

  </body>
</html>
