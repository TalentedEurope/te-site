<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('meta')
  <title>@yield('page-title') | {{ env('SITE_TITLE','Talented Europe') }}</title>
  <!-- Fonts -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:200,400,700,400italic,200italic,700italic,900' rel='stylesheet' type='text/css'>
  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="{{ elixir('css/site.css') }}">
  <link rel="apple-touch-icon" sizes="57x57" href="{{ URL::asset('img/favicon/apple-icon-57x57.png') }}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ URL::asset('img/favicon/apple-icon-60x60.png') }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('img/favicon/apple-icon-72x72.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('img/favicon/apple-icon-76x76.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('img/favicon/apple-icon-114x114.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ URL::asset('img/favicon/apple-icon-120x120.png') }}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('img/favicon/apple-icon-144x144.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ URL::asset('img/favicon/apple-icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('img/favicon/apple-icon-180x180.png') }}">
  <link rel="icon" type="image/png" sizes="192x192" href="{{ URL::asset('img/favicon/android-icon-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('img/favicon/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ URL::asset('img/favicon/favicon-96x96.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('img/favicon/favicon-16x16.png') }}">

  <script type="text/javascript">
    TE = {}
  </script>
</head>

<body id="app-layout" class="@yield('page-class') ">
  <nav class="navbar navbar-alt navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="{{ asset('img/logo-header.png') }}" alt="{{ env('SITE_TITLE','Talented Europe') }}">
        </a>
      </div>
      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="main-navbar nav navbar-nav">
          <li class="hidden-sm" ><p class="navbar-text" style="
            ">I'm looking for:</p>
          </li>
          <li @yield('menu-student')><a href="{{ url('/search/students') }}">Students</a></li>
          <li @yield('menu-company')><a href="{{ url('/search/companies') }}">Companies</a></li>
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right languages-nav">
          <li><a href="?lang=en">EN</a></li>
          {{--
          <li><a href="?lang=es">ES</a></li>
          <li><a href="?lang=it">IT</a></li>
          <li><a href="?lang=de">DE</a></li>
          <li><a href="?lang=fr">FR</a></li>
          <li><a href="?lang=sk">SK</a></li>
          --}}
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
          <li><a href="{{ url('/login') }}">Login</a></li>
          <li><a href="{{ url('/register') }}">Register</a></li>
          @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name ? Auth::user()->name : Auth::user()->email }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ url('/profile/edit') }}"><i class="fa fa-btn fa-user"></i> Profile</a></li>

              <li><a href="{{ url('/profile/edit') }}"><i class="fa fa-btn fa-cogs"></i> Settings</a></li>

              <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  @if(Session::has('success_message'))
      <div class="container">
        <div class="alert alert-success" role="alert">{{ Session::get('success_message') }}</div>
      </div>
  @endif

  @if(Session::has('error_message'))
      <div class="container">
        <div class="alert danger-success" role="alert">{{ Session::get('error_message') }}</div>
      </div>
  @endif

  @yield('content')
  <div class="pre-footer">
    <div class="container">
      <div class="col-sm-6">
        <a href="{{ url('/') }}">
          <img class="te-logo" src="{{ asset('img/logo-header.png') }}" alt="{{ env('SITE_TITLE','Talented Europe') }}">
        </a>
        <ul class="navigation" role="nav">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ url('/cookies') }}">Cookies</a></li>
          <li><a href="{{ url('/cookies') }}">Privacy Policy</a></li>
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
        <ul class="partner-list" class="menu">
          <li><a href="http://erasmusplus.iespuertodelacruz.es">IES Puerto de la Cruz</a></li>
          <li><a href="http://cifpcesarmanrique.es/">CIFP César Manrique</a></li>
          <li><a href="http://europeanprojects.org/">European Projects Association</a></li>
          <li><a href="http://web.tuke.sk/kj/english_version.htm">Technical University of Kosice</a></li>
          <li><a href="http://www.beds.ac.uk/">University of Bedfordshire</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer">
    <div class="ue-logos row xs12">
      <div class="logo">
        <img src="{{ asset('/img/logo-footer-erasmus.png') }}" width="174" alt="Erasmus+">
      </div>
      <div class="logo">
        <img src="{{ asset('/img/logo-footer-cofunded-ue.png') }}" width="160" alt="Co-funded by the Erasmus+ Programme of the European Union">
      </div>
      <div class="logo">
        <img src="{{ asset('/img/logo-footer-gob-espana-y-sepie.svg') }}" width="240" alt="Gobierno de españa and Sepie">
      </div>
    </div>
  </div>
  <!-- JavaScripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  {{--
  <script src="{{ elixir('js/app.js') }}"></script> --}}
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>


  <script src="{{ elixir('js/build.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</body>

</html>
