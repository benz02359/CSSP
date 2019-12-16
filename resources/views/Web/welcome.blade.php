<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Laravel</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">

<!-- Styles -->

<script type="text/javascript" src=<?php echo asset('assets/js/card.js'); ?>></script>
<link rel="stylesheet" type="text/css" href="<?php echo asset('assets/css/style.css'); ?>">

</head>
<style>
html, body {
background: url("assets/img/bgg.jpg");
background-attachment: scroll;
background-size: 100%;
}
</style>
<body>
<div class="bg">
    <div class="flex position-ref">
        <a href="/"><img src="<?php echo asset('assets/img/logofull.png'); ?>"style="width:20%;margin-left:50px">
            <div class="top-right links"> 
                @guest                           
                    <a class="nav-link" href="{{ route('login') }}">{{ __('เข้าสู่ระบบ') }}</a>
                @if (Route::has('register'))                         
                    <a href="{{ route('registeruser') }}" >{{ __('ลงทะเบียน') }}</a>                        
                @endif

                @else
                <li class="nav-item">
                        <a class="nav-link" href="/posts/create">Create Post</a>
                    </li>
                    <li class="nav-item dropdown">
                        
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Profile</a>
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
            </div>           
    </div> 
</div>  
<div class="content">
<div class="title m-b-md">
UNIXDEV 0
</div>

<div class="seccontent">
ทุกเรื่องที่คุณอยากรู้  ทุกปัญหาที่คุณอยากถาม  มีคนช่วยตอบ
</div>
</div>
<br>
</div> 
<ul class="card-list">
<li class="card">
<a class="card-image" href="/forums" style="background-image: url('assets/img/solution.jpg');" data-image-full="assets/img/solution.jpg">
<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/310408/lets-go-100.jpg" alt="let's go" />
</a>
<a class="card-description" href="#" target="_blank">
<h2>Forums</h2>
<p>all posts</p>
</a>
</li>

<li class="card">
<a class="card-image" href="http://127.0.0.1:8000/aboutpage" style="background-image: url('assets/img/about.jpg');" data-image-full="assets/img/about.jpg">
<img src="<?php echo asset('assets/img/logofull.png'); ?>" />
</a>
<a class="card-description" href="http://127.0.0.1:8000/aboutpage">
<h2>About us</h2>
<p>ALL ABOUT US</p>
</a>
</li>

<li class="card">
<a class="card-image" href="https://www.unixdev.co.th/" target="_blank" style="background-image: url('assets/img/product.jpg');" data-image-full="assets/img/product.jpg">
<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/310408/beautiful-game-100.jpg" alt="The Beautiful Game" />
</a>
<a class="card-description" href="https://www.unixdev.co.th/" target="_blank">
<h2>OUR PRODUCT</h2>
<p>ALL OF PRODUCT FROM US</p>
</a>
</li>

</ul>
</body>
</html>