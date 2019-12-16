<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <title>CSS</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">

    <!-- Styles -->        
    <script type="text/javascript" src=<?php echo asset('assets/js/card.js'); ?>></script>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('assets/css/solutionstyle.css'); ?>">

</head>
<body style="background-image: url('assets/img/solutionbg.png');">
    <div class="flex position-ref">
    <a href="/"><img src="<?php echo asset('assets/img/logofull3.png'); ?>"style="width:20%;margin-left:50px">
        @if (Route::has('login'))
            <div class="top-right links"> 
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>  
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-default" style="border-color:#513ABE" style="border-style: solid" >
                    <div class="panel-heading" style="background-color: #513ABE;color:white"><h1>View Solution</h1></div>
                    <div class="panel-body">            
            <!--<div class="flex-center position-ref full-height"> -->           
                        <div class="content">
                            <div id="app">
                                <sview id="{!!$id!!}"></sview>
                            </div>
                
                        </div>
        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> 
</body>
<script src="{{asset('/js/app.js')}}" charset="utf-8"></script>
</html>
