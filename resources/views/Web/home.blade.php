<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> unixdev customer service</title>
        <!-- add icon link -->
        <link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">

        <!-- Styles -->
        <script type="text/javascript" src=<?php echo asset('assets/js/card.js'); ?>></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
    <div class="flex position-ref">
    <a href="/"><img src="<?php echo asset('assets/img/logofull.png'); ?>"style="width:20%;margin-left:50px">
            <div class="top-right links"> 
                        @guest                           
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))                         
                                    <a href="{{ route('registeruser') }}" >{{ __('Register') }}</a>                        
                            @endif
                        @else
                                                            
                            @if (Auth::user()->status!=4)
                            @endif

                                <a href="#" role="button"  aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                                </a>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('ลงชื่อออก') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                </div>
                            </li>
                        @endguest
            </div>  </div>
        </nav>
<ul class="card-list">
	
<li class="card">
        <a class="card-image" href="/posts" style="background-image: url('assets/img/solution.jpg');" data-image-full="assets/img/solution.jpg">
			<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/310408/lets-go-100.jpg" alt="let's go" />
		</a>
		<a class="card-description" href="/posts" target="_blank">
			<h2>กระทู้</h2>
			<!--<p>all Post</p>-->
		</a>
	</li>

	<li class="card">
		<a class="card-image" href="http://127.0.0.1:8000/aboutpage" style="background-image: url('assets/img/about.jpg');" data-image-full="assets/img/about.jpg">
            <img src="<?php echo asset('assets/img/logofull.png'); ?>" />
		</a>
        <a class="card-description" href="http://127.0.0.1:8000/aboutpage">
			<h2>ติดต่อเรา</h2>
			<!--<p>ALL ABOUT US</p>-->
		</a>
	</li>
	
	<li class="card">
		<a class="card-image" href="https://www.unixdev.co.th/" target="_blank" style="background-image: url('assets/img/product.jpg');" data-image-full="assets/img/product.jpg">
			<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/310408/beautiful-game-100.jpg" alt="The Beautiful Game" />
		</a>
		<a class="card-description" href="https://www.unixdev.co.th/" target="_blank">
			<h2>เว็บไซต์หลัก</h2>
			<!--<p>ALL OF PRODUCT FROM US</p>-->
		</a>
	</li>
    
</ul>
        </body>
        <script src="{{asset('/js/app.js')}}" charset="utf-8"></script>
</html>
