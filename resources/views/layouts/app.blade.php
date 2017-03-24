<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

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
    TE.profile = {'modified_fields': false};
    TE.translations = {
      'auth': {!! json_encode(trans('auth'), JSON_HEX_APOS) !!},
      'global': {!! json_encode(trans('global'), JSON_HEX_APOS) !!},
      'landing': {!! json_encode(trans('landing'), JSON_HEX_APOS) !!},
      'pagination': {!! json_encode(trans('pagination'), JSON_HEX_APOS) !!},
      'passwords': {!! json_encode(trans('passwords'), JSON_HEX_APOS) !!},
      'profile': {!! json_encode(trans('profile'), JSON_HEX_APOS) !!},
      'reg-profile': {!! json_encode(trans('reg-profile'), JSON_HEX_APOS) !!},
      'validation': {!! json_encode(trans('validation'), JSON_HEX_APOS) !!},
      'search': {!! json_encode(trans('search'), JSON_HEX_APOS) !!},
      'students-validation': {!! json_encode(trans('students-validation'), JSON_HEX_APOS) !!},
      'validators': {!! json_encode(trans('validators'), JSON_HEX_APOS) !!},
    };
  </script>
</head>

<body id="app-layout" class="@yield('page-class') ">
  @include("layouts.navbar")

  @if(Session::has('success_message'))
      <div class="container">
        <div class="alert alert-success" role="alert">{{ Session::get('success_message') }}</div>
      </div>
  @endif

  @if(Session::has('error_message'))
      <div class="container">
        <div class="alert alert-danger" role="alert">{{ Session::get('error_message') }}</div>
      </div>
  @endif

  @section ('profile_warning')
    @if (!Auth::guest())
      @if (Auth::user()->isA('company') && !Auth::user()->is_filled && rand(0,5) == 0)
      <div class="container">
        <div class="alert alert-warning text-center" role="alert">
          {!! trans('global.not_enough_data_to_show_profile') !!}
          {!! trans('global.click_on_link_to_fill_required_fields') !!}
            <a href="{{ url('/profile/edit') }}"><i class="fa fa-btn fa-cogs"></i> {{ trans('global.set_up_my_profile') }}</a>
        </div>
      </div>
      @endif

      @if (Auth::user()->isA('student') && !Auth::user()->is_filled)
      <div class="container">
        <div class="alert alert-warning text-center" role="alert">
          {!! trans('global.not_enough_data_to_show_profile') !!}
          {!! trans('global.click_on_link_to_fill_required_fields') !!}
            <a href="{{ url('/profile/edit') }}"><i class="fa fa-btn fa-cogs"></i> {!! trans('global.set_up_my_profile') !!}</a>
        </div>
      </div>
      @endif
    @endif
  @show

  @yield('content')
  <div class="pre-footer">
    <div class="container">
      <div class="col-sm-6">
        <a href="{{ url('/') }}">
          <img class="te-logo" src="{{ asset('img/logo-header.png') }}" alt="{{ env('SITE_TITLE','Talented Europe') }}">
        </a>
        <ul class="navigation" role="nav">
          <li><a href="{{ url('/') }}">{!! trans('global.home') !!}</a></li>
          <li><a href="http://blog.talentedeurope.eu" target="_blank">{!! trans('global.blog') !!}</a></li>
          <li><a href="{{ url('/cookies') }}">{!! trans('global.cookies') !!}</a></li>
          <li><a href="{{ url('/privacy-policy') }}">{!! trans('global.privacy_policy') !!}</a></li>
        </ul>
        <ul class="navigation">
          <li>
          {!! trans('global.follow_us') !!}:
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
        <h3>{!! trans('global.footer_partners') !!}</h3>

        <ul class="partner-list">
          <li><a target="_blank" href="http://cifpcesarmanrique.es/"><img src="/img/logo-cifpcesar.png" alt="CIFP César Manrique"></a></li>
          <li><a target="_blank" href="http://erasmusplus.iespuertodelacruz.es"><img src="/img/logo-iespto.png" alt="IES Puerto de la Cruz"></a></li>
          <li><a target="_blank" href="http://europeanprojects.org/"><img src="/img/logo-epa.png" alt="European Projects Association"></a></li>
          <li><a target="_blank" href="http://web.tuke.sk/kj/english_version.htm"><img src="/img/logo-tuke.png" alt="Technical University of Kosice"></a></li>
          <li><a target="_blank" href="http://www.beds.ac.uk/"><img src="/img/logo-ubbs.png" alt="University of Bedfordshire"></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer">
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
  <a href="https://github.com/TalentedEurope/te-site/issues" class="btn btn-danger issue-btn">
  <i class="fa fa-github" aria-hidden="true"></i>
    Report a page error
  </a>

  <!-- JavaScripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  {{--
  <script src="{{ elixir('js/app.js') }}"></script> --}}
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>


  <script src="{{ elixir('js/main-build.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();

      var validate_tabs = $('#validate-tabs');
      if (validate_tabs.data("hashtab")) {
        var hash = window.location.hash;
        validate_tabs.find('a[href="' + hash + '"]').tab('show');
      }

      var profile_tabs = $('#profile-tabs');
      if (profile_tabs.data("hashtab")) {
        // #_ is a hack for avoid anchor jump on load
        var hash = window.location.hash.replace('#', '#_');
        profile_tabs.find('a[data-target="' + hash + '"]').tab('show');
      }

      $('#profile-tabs a').on('click', function(event) {
        event.stopPropagation();

        var element = $(event.target);
        var hash = element.attr('data-target').replace('#_', '#');

        if (!TE.profile.modified_fields) {
          element.tab('show');
          location.hash = hash;
        } else {
          $.confirm({
            title: null,
            content: TE.translations['reg-profile']['tab_changes_not_saved'],
            backgroundDismiss: true,
            buttons: {
              back: {
                text: TE.translations['reg-profile']['continue_without_saving'],
                action: function() {
                  element.tab('show');
                  location.hash = hash;
                  TE.profile.modified_fields = false;
                  return true;
                }
              },
              confirm: {
                text: TE.translations['reg-profile']['save_changes'],
                btnClass: 'btn-info',
                action: function() {
                  var tab_pane_id = $('.nav-tabs .active a')[0].dataset.target;
                  $(tab_pane_id + ' form')[0].submit();
                }
              }
            }
          });
        }
      });
    });
  </script>
  @yield('js')
</body>

</html>
