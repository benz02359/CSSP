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
        <link rel="stylesheet" type="text/css" href="<?php echo asset('assets/css/aboutstyle.css'); ?>">
    </head>
    <body style="background-image: url('assets/img/aboutbg.png');">
        <div class="flex position-ref">
        <a href="/"><img src="<?php echo asset('assets/img/logofull2.png'); ?>"style="width:20%;margin-left:50px">
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3874.933140372404!2d100.54408431483084!3d13.782903990327386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29c1c2bd74901%3A0xb1cf8e49b39937be!2z4Lia4Lij4Li04Lip4Lix4LiXIOC4ouC4ueC4meC4tOC4geC4i-C5jOC5gOC4lOC4nyDguIjguLPguIHguLHguJQgKFVuaXhkZXYgQ28uLCBMdGQuKQ!5e0!3m2!1sth!2sth!4v1552663243182" width="400" height="300" padding-top="10px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
       
            <br>
</div> 
        </body>
</html>
