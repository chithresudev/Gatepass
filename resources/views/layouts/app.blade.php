<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/gatepass.css') }}" rel="stylesheet">
    @stack('styles')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-0">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img width="185px" src="{{ asset('images/logo_web.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>

        </nav>
        @php
        $route = Route::currentRouteName();
        @endphp
  <aside class="side-bar" id="desktop_panel">
          <ul class="sidebar-height">
           <li {{ ($route == 'project.dashboard') ? 'class=active' : '' }}>
              <a href="{{ route('project.dashboard') }}">
                <i class="fa fa-tachometer" aria-hidden="true"></i>
              </a>
            <span>Dashboard</span>
           </li>

           <li {{ $route == 'project.index' ? 'class=active' : '' }}>
              <a href="{{ route('project.index') }}">
                <i class="fa fa-video-camera" aria-hidden="true"></i>
              </a>
            <span>Project</span>
           </li>

           <li {{ $route == 'hdd.index' ? 'class=active' : '' }}>
              <a href="{{ route('hdd.index') }}">
                <i class="fa fa-camera-retro" aria-hidden="true"></i>
              </a>
            <span>Hard Disk</span>
           </li>

           <li {{ $route == 'users' ? 'class=active' : '' }}>
            <a href="{{ route('users') }}">
                <i class="fa fa-cog" aria-hidden="true"></i>
            </a>
            <span>Users</span>

           </li>

      </ul>
      </aside>
        <main>
            @yield('content')
        </main>
    </div>
<!-- Scripts -->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@stack('scripts')
</body>
</html>
