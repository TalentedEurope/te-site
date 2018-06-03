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
          <li @yield('menu-student')><a href="{{ url('/search/students') }}">{!! trans('global.students_graduates') !!}</a></li>
          <li @yield('menu-company')><a href="{{ url('/search/companies') }}">{!! trans_choice('global.company', 2) !!}</a></li>
          <li @yield('menu-institution')><a href="{{ url('/search/institutions') }}">{!! trans_choice('global.institution', 2) !!}</a></li>
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right languages-nav">
          <li><a href="?lang=en">EN</a></li>

          <li><a href="?lang=es">ES</a></li>
          <li><a href="?lang=it">IT</a></li>
          <li><a href="?lang=de">DE</a></li>
          <li><a href="?lang=fr">FR</a></li>
          <li><a href="?lang=sk">SK</a></li>

        </ul>

        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
          <li><a href="{{ url('/login') }}">{!! trans('global.login_btn') !!}</a></li>
          <li><a href="{{ url('/register') }}">{!! trans('global.register_btn') !!}</a></li>
          @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              @if (isset($alertCount))
                <span class="badge">{{ $alertCount }}</span>
              @endif
              <span class="user">{{ Auth::user()->name ? Auth::user()->name . " " . Auth::user()->surname : Auth::user()->email }}</span> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              @if (Auth::user()->isA('student') || Auth::user()->isA('company'))
                <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i> {!! trans('navbar.profile') !!}</a></li>
              @endif

              @if (Auth::user()->isA('company'))
                <li><a href="{{ url('/alerts') }}"><i class="fa fa-btn fa-envelope"></i> {!! trans('navbar.alerts') !!}</a></li>
              @elseif (Auth::user()->isA('institution'))
                <li><a href="{{ url('/validators') }}"><i class="fa fa-btn fa-balance-scale"></i> {!! trans('validators.validators') !!}</a></li>
              @elseif (Auth::user()->isA('validator'))
                <li><a href="{{ url('/validate') }}"><i class="fa fa-btn fa-users"></i> {!! trans('validators.my_students') !!}</a></li>
              @endif

              <li><a href="{{ url('/profile/edit') }}"><i class="fa fa-btn fa-cogs"></i> {!! trans('navbar.settings') !!}</a></li>
              <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> {!! trans('global.logout_btn') !!}</a></li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
