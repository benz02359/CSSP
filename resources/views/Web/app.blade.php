<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> UnixDev Customer Service</title>
    <!-- add icon link -->
    <link rel = "icon" src="<?php echo asset('assets/img/logofull.png'); ?>"  type = "image/x-icon"> 
          

    <!-- Scripts -->
    <script src="{{ asset('assets/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
    <style>
    a:link,a:hover,a:visited{
        color:whitesmoke;
    }
    </style>
    <!-- Styles -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/layout.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-laravel navbar-dark bg-dark" style="height:70px;">
            <a class="navbar-brand" href="{{ url('/') }}" style="width:180px;margin-left:0px;margin-top:3px;margin-right:950px">
            <img src="<?php echo asset('assets/img/logofull.png'); ?>"style="width:180px;margin-bottom:-10px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            </button>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav float-right" style="margin-bottom:0px;width:300px;font-size:18px;">
                        <!-- Authentication Links -->
                        @guest
                            <li >
                                <a style="margin-right:22px;" href="{{ route('login') }}">{{ __('เข้าสู่ระบบ') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a  href="{{ route('registeruser') }}">{{ __('สมัครสมาชิก') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
