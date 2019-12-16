<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CSS') }}</title>

    <!-- Scripts 
    <script src="{{ asset('js/app.js') }}" defer></script>-->
    <script type="text/javascript" rel="script" src="{{asset('js/app.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    .sidenav {
        height: 100%;
        position: fixed;
        z-index: 10;
        left: 0;
        background-color: #eaeaea;
        overflow-x: hidden;
        padding-top: 20px;
    }
    </style>
</head>
<body>
@include('inc.nav')
<div class="container-fluid">
    <div class="row">
        @include('inc.sidenav')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            @include('inc.messages')
            @yield('content')
        </main>                    
    </div>
</div>        
<!-- Scripts 
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>-->
<script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>.
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>
</body>
</html>
