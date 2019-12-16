<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>CSS</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">

    <!-- Styles -->        
    <script type="text/javascript" src=<?php echo asset('assets/js/card.js'); ?>></script>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('assets/css/solutionstyle.css'); ?>">

    <style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
  -webkit-animation: fadeEffect 1s;
  animation: fadeEffect 1s;
}
/* Fade in tabs */
@-webkit-keyframes fadeEffect {
  from {opacity: 0;}
  to {opacity: 1;}
}

@keyframes fadeEffect {
  from {opacity: 0;}
  to {opacity: 1;}
}
</style>
</head>
<body style="background-image: url('/assets/img/solutionbg.png');">
    <div class="flex position-ref">
    <a href="/"><img src="<?php echo asset('assets/img/logofull3.png'); ?>"style="width:20%;margin-left:50px">
        @if (Route::has('login'))
            <div class="top-right links"> 
                @auth
                    <a href="{{ url('/home') }}">หน้าแรก</a>
                @else
                    <a href="{{ route('login') }}">เข้าสู่ระบบ/สมัครสมาชิก</a>

                @endauth
            </div>
        @endif
    </div>  
    <div>
        <div class="">
            <div class="">
                <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="/forums">กระทู้</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="/forums/create"><i class="glyphicon glyphicon-plus-sign"></i>ตั้งกระทู้ใหม่</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">หมวดหมู่</a>
                        </li>
                    </ul>
                    
                    <form class="form-inline" action="/action_page.php">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                </nav>
            </div>
            
                            <div id="app">
                                <pcreate></pcreate>
                            </div>
                
                        </div>
        <!--</div>--></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> 
</body>
<script src="{{asset('/js/app.js')}}" charset="utf-8"></script>
</html>
