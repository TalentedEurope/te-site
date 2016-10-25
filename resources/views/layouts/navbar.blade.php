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
              @if (isset($alertCount))
                <span class="badge">{{ $alertCount }}</span>
              @endif
              {{ Auth::user()->name ? Auth::user()->name . " " . Auth::user()->surname : Auth::user()->email }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i> Profile</a></li>
              @if (Auth::user()->isA('company'))
              <li><a href="{{ url('/alerts') }}"><i class="fa fa-btn fa-envelope"></i> Alerts</a></li>
              @endif
              <li><a href="{{ url('/profile/edit') }}"><i class="fa fa-btn fa-cogs"></i> Settings</a></li>

              <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>