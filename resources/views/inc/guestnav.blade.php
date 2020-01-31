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

    <div class="top-right links">
        @auth
            <a href="{{ url('/home') }}">หน้าหลัก</a>
        @else
            <a href="{{ route('login') }}">ลงชื่อเข้าสู่ระบบ</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">สมัครสมาชิก</a>
            @endif
        @endauth
    </div>
</nav>