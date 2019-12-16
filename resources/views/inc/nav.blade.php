<nav class="navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url('/web') }}">
        {{ config('app.name', 'CSS') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/posts">ปัญหา <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/posts">ข่าว <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/categories">หมวดหมู่ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                    <a class="nav-link" href="/tags">แท็ก <span class="sr-only">(current)</span></a>
                </li>
            <li class="nav-item active">
                    <a class="nav-link" href="/">Dashboard <span class="sr-only">(current)</span></a>
                </li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">                        
            <!-- Authentication Links -->  
            <form action="/search" method="GET">
                <div class="input-group">
                    <input type="search" name="search" class="forn-control">
                    <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">ค้นหา</button>
                    </span>
                </div>
            </form>                      
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">ตั้งกระทู้ใหม่</a>
            </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
            <li class="nav-item">
                    <a class="nav-link" href="/posts/create">ตั้งกระทู้ใหม่</a>
                </li>
                <li class="nav-item dropdown">
                    
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">หน้าของฉัน</a>
                        <a class="dropdown-item" href="/userprofile">ข้อมูลส่วนตัว</a>
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