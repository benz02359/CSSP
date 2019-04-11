<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
            <div class="content">  <br>
                <div class="title m-b-md">
                <b>  ABOUT US </b>
                </div>

                <div class="seccontent">
                <a href="https://www.facebook.com/unixdevth/" target="_blank">
                    <i style="font-size:24px" class="fa">&#xf082;</i>  Unixdev Co.,Ltd
                </a><br>
                <a href="#">
                    <i style="font-size:24px" class="fa">&#xf098;</i>  081-651-9393</a><br>
                    </div>
            </div>
       
            <br>
</div> 
        </body>
</html>
