<nav class="navbar navbar-expand navbar-dark bg-dark sticky-top" style="height:60px;">
    <style>
    .example_c {
    color: #494949 !important;
    text-transform: uppercase;
    text-decoration: none;
    background: #ffffff;
    border: 4px solid #FFF !important;
    display: inline-block;
    transition: all 0.4s ease 0s;
    }
    .example_c:hover {
    color: #ffffff !important;
    background: #f6b93b;
    border-color: #f6b93b !important;
    transition: all 0.4s ease 0s;
    }
    .navbar-dark .navbar-nav .nav-link{
    padding-right:15px;
    font-size: 18px;
    }
    .navbar-dark .navbar-nav .nav-link:hover,
    .navbar-dark .navbar-nav .nav-link:focus {
    color: #ffffff8f;
    font-size: 18px;

    }
    </style>
    <a class="navbar-brand" href="{{ url('/') }}" style="width:180px;margin-left:-20px;margin-top:-5px;">
            <img src="<?php echo asset('assets/img/logofull.png'); ?>"style="width:180px;margin-bottom:-10px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto " style="font-size:22px;margin-right:5px;">
            <li class="nav-item active">
                <a class="nav-link" href="/posts">ตอบปัญหา<span class="sr-only"></a>
            </li>
            <li class="nav-item" style="color:#FFF;font-size:22px">
                    <a class="nav-link"
                    @guest
                        
                    @endguest
                    @if(Auth::user()->role_id === 1 or Auth::user()->role_id === 2)
                        href="/posts/create">
                        @else 
                        href="/posts/create/createquestion">
                    @endif 
                    
                    ตั้งกระทู้ใหม่ </a>
                </li>
            <!--<li class="nav-item active">
                    <a class="nav-link" href="/tags">แท็ก <span class="sr-only">(current)</span></a>
                </li>-->
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto" style="color:#FFF;font-size:14px;margin-top:8px;">                        
            <!-- Authentication Links -->  
            <form action="/search" method="GET">
                <div class="input-group">
                    <input type="search" name="search" class="forn-control">
                    <span class="input-group-prepend">
                        <button type="submit" class="button_cont example_c">ค้นหา</button>
                    </span>
                </div>
            </form>                      
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
            <li class="nav-item" style="color:#FFF;font-size:22px">
                    <a class="nav-link" 
                     @if(Auth::user()->role_id === 1 or Auth::user()->role_id === 2)
                        href="/posts/create">
                        @else 
                        href="/posts/create/createquestion">
                    @endif</a>
                </li>

                <li class="nav-item dropdown" style="font-size:22px;margin-top:3px">
                    
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="font-size:20px">
                        <!--<a class="dropdown-item" href="">หน้าของฉัน</a>-->
                        <a class="dropdown-item" href="/userprofile">ข้อมูลส่วนตัว</a>
                        <a class="dropdown-item" href="/changePassword">เปลี่ยนรหัสผ่าน</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
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
        </ul>
    </div>
</nav>