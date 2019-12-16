<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ config('app.name', 'CustomerServiceSystem') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Scripts -->
    <script src="{{ asset('assets/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
    
    

    <!--<script type="text/javascript" src="{{ asset('/js/cus.js') }}"></script>-->
    
    
    <script src="https://www.gstatic.com/firebasejs/5.4.2/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.4.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.4.2/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.4.2/firebase-storage.js"></script>

    <script>	
    // Initialize Firebase
    var config = {
      apiKey: "AIzaSyDiaUDP4dhP_FUbTXOFa-g7ugATxi9lmdI",
      authDomain: "hdpj-632ed.firebaseapp.com",
      databaseURL: "https://hdpj-632ed.firebaseio.com",
      projectId: "hdpj-632ed",
      storageBucket: "hdpj-632ed.appspot.com",
      messagingSenderId: "120261714092"
    };
    firebase.initializeApp(config);
    var database = firebase.database();

    var lastIndex = 0;  

</script>
<script src="{{asset('/js/app.js')}}" charset="utf-8">
</script>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>


@yield('style')
<style>
.*{
    background-color: #284255;
    box-sizing: border-box;
}
.sidenav {
    height: 100%;
    width: 125px;
    position: fixed;
    z-index: 10;
    top: 0;
    left: 0;
    background-color: #000000;
    overflow-x: hidden;
    padding-top: 20px;
}

.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 15px;
    color: #818181;
    display: block;
}

.sidenav a:hover {
    color: #f1f1f1;
}
.main {
  margin-left: 115px; /* Same as the width of the sidenav */  
  padding: 0px 10px;
}
@media (min-width: 768px){
.col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9 {
    float: left;
}
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 5px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 10px;
  }
}

/* Style the counter cards */
.rep {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #b2b2b2;
  color: white;
}

.fa {font-size:16px;}

.header-primary {
    background-color: #fff;
    height: 50px;
    border-bottom: 1px #ebeef0 solid;
    padding: 0 10px;
    vertical-align: middle;
}
.navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  cursor: pointer;
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

/*.navbar a:hover, .dropdown:hover .dropbtn, .dropbtn:focus {
  background-color: red;
}*/

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.show {
  display: block;
}

.topnav-right {
  float: right;
}
</style>	
</head>
<body>
<nav>@yield('sidenav')</nav>

<!--<div class="sidenav">
  <a href="{{url('/')}}" class="fa fa-home"> Home</a>
  <a href="{{url('/help')}}" class="fa fa-search"> Helper</a>
  <a href="{{url('/contact')}}" class="fa fa-id-card-o"> Contact</a>
  <a href="{{url('/solutions')}}" class="fa fa-question-circle-o"> Solution</a>
  <a href="{{url('/forum')}}" class="fa fa-comments-o"> Forums</a>
  <a href="{{url('/report')}}" class="fa fa-bar-chart-o"> Reports</a>
</div>-->

<div class="sidenav">
           <!-- <a href="{{url('/')}}" class="fa fa-home"> Home</a>
            <a href="{{url('/help')}}" class="fa fa-search"> Helper</a>
            <a href="{{url('/contact')}}" class="fa fa-id-card-o"> Contact</a>
            <a href="{{url('/solution')}}" class="fa fa-question-circle-o"> Solution</a>
            <a href="{{url('/forum')}}" class="fa fa-comments-o"> Forums</a>
            <a href="{{url('/report')}}" class="fa fa-bar-chart-o"> Reports</a> -->
                        
            <a href="{{url('/')}}" > Web</a>
            <a href="{{url('/home')}}" > Home</a>
            
            
            @role('admin')
            @endrole

            @role('staff')
            @endrole

            @role('agent')
            @endrole
            
            <!-- permission -->
            
            @can('managestaff')
            <a href="{{url('/staffs')}}" > Staff</a>
            @endcan

            @can('managecompany')
            <a href="{{url('/companies')}}" > Company</a>
            @endcan

            @can('managecustomer')
            <a href="#" > Customer</a>
            @endcan

            @can('approve')
            <a href="{{url('/users')}}" >Approve</a>
            @endcan

            @can('managedepartment')
            <a href="{{url('/deps')}}" > Department</a>
            @endcan
            
            @can('appointment')
            <a href="#" > Appointment</a>
            @endcan
        
            @can('selling')
            <a href="/sales" > Sale History</a>
            @endcan

            @can('program')
            <a href="{{url('/programs')}}" > Program</a>
            @endcan
            
            @if (Route::has('register'))
            @can('regisuser')
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            <a href="{{ url('registeruser') }}" >RegisterUser</a>
            @endcan
            @endif

            @can('regisstaff')
            <a href="#" > Register Staff</a>
            @endcan

            @can('regisagent')
            <a href="#" > Register Agent</a>
            @endcan

            @can('post')
            <a href="#" > Post</a>
            @endcan

            @can('forum')
            <a href="#" > Forum</a>
            @endcan

            @can('category')
            <a href="#" > Category</a>
            @endcan

            @can('result')
            @endcan
            
</div>
<div id="app" class="main">
    <nav class="navbar">
        <!--<div class="container">-->
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'CustomerServiceSystem') }}
        </a>
        <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>-->

        <!--<div class="collapse navbar-collapse" id="navbarSupportedContent">-->
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
        </ul>

        <!-- Right Side Of Navbar -->
        <!--<ul class="navbar-nav mr-auto">-->
            <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                

                
                
                @else
                <div class="topnav-right">
                <!--<li class="nav-item dropdown">-->
                <div class="dropdown">
                <!--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>-->
                <button class="dropbtn" onclick="myFunction()">
                    {{ Auth::user()->name }} <i class="fa fa-caret-down"></i><!--<span class="caret"></span>-->
                </button>
                <!--</a>-->

                <div class="dropdown-content" id="myDropdown">
                <!--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">-->
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>

                
                <!--</div>-->
                <!--</li>-->
                </div>
                </div>
                <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </div>
                
                
                @endif
                @endguest
                
        <!--</ul>-->
        
        
        <!--</div>-->
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>

</body>
<!--<script src="js/app.js"></script>-->

<footer>@yield('footer')</footer>

<script src="{{asset('/js/app.js')}}" charset="utf-8">
</script>
</html>
