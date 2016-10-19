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
  </head>

  <body>
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
          <ul class="nav navbar-nav navbar-right login">
            <li><a href="{{ URL::to('/login') }}">{!! trans('global.login_btn') !!}</a></li>
            <li><a href="{{ URL::to('/register') }}">{!! trans('global.register_btn') !!}</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="hero">
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
          <h1>
            {!! trans('landing.tagline') !!}
          </h1>

          <h2>{!! trans('landing.coming_soon') !!}</h2>

          <ul class="countdown">
            <li>
              <span id="days" class="days">00</span>
              <p class="days_ref">{{ trans('landing.days') }}</p>
            </li>
            <li>
              <span id="hours" class="hours">00</span>
              <p class="hours_ref">{{ trans('landing.hours') }}</p>
            </li>
            <li>
              <span id="mins" class="minutes">00</span>
              <p class="minutes_ref">{{ trans('landing.minutes') }}</p>
            </li>
            <li>
              <span id="secs" class="seconds last">00</span>
              <p class="seconds_ref">{{ trans('landing.seconds') }}</p>
            </li>
          </ul>

          <div class="hidden-xs">
            <a href="#about" class="btn btn-primary">
              {{ trans('landing.more') }}
              <i class="fi flaticon-dragdown"></i>
            </a>
          </div>
        </div>
      </div>
    </header>


    <section id="about" class="about content-box col-md-6">
      <div class="content">
        <div class="vertical-centered">
          <h1>{!! trans('landing.what_is_title') !!}</h1>
          <p>{!! trans('landing.what_is_text_1') !!}</p>
          <p>{!! trans('landing.what_is_text_2') !!}</p>
          <a href="{{ URL::asset('docs/'.App::getLocale().'/TalentedEuropeBrochure.pdf') }}" target="_blank" class="btn">
            <i class="fi flaticon-cloud-download"></i>
            {!! trans('landing.what_is_cta') !!}
          </a>
        </div>
      </div>
    </section>

    <section class="content-box content-image first-image col-md-6">
      <div class="overlay"></div>
    </section>

    <section class="content-box content-image second-image col-md-6">
      <div class="overlay"></div>
    </section>

    <section id="subscribe" class="subscribe content-box col-md-6">
      <div class="content">
        <div class="vertical-centered">
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
                <a class="twitter" href="https://twitter.com/talentedeurope" style="color: #13A4FF;">
                  <i class="fi flaticon-twitter"></i>
                </a>
              </li>
              <li>
                <a class="youtube" href="https://www.youtube.com/channel/UCkj5UUptbZnQ5kvxVpDfkBw" style="color: #D01717;">
                  <i class="fi flaticon-youtube"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>


    <div class="footer">
      <div class="ue-logos row xs12">
        <div class="logo">
          <img src="{{ URL::asset('img/logo-footer-erasmus.png') }}" width="174" alt="Erasmus+">
        </div>
        <div class="logo">
          <img src="{{ URL::asset('img/logo-footer-cofunded-ue.png') }}" width="160" alt="Co-funded by the Erasmus+ Programme of the European Union">
        </div>
        <div class="logo">
          <img src="{{ URL::asset('img/logo-footer-gob-espana-y-sepie.svg') }}" width="240" alt="Gobierno de españa and Sepie">
        </div>
      </div>
    </div>

    <script src="{{ URL::asset('js/conditionizr/conditionizr.js') }}"></script>
    <script src="{{ URL::asset('js/conditionizr/ios.js') }}"></script>
    <script src="{{ URL::asset('js/jdoom.min.js') }}"></script>
    <script src="{{ URL::asset('js/landing.js') }}"></script>

  </body>
</html>
