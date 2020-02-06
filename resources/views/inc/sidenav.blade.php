<style>
        .sidenav {
            height: 100%;
            width: 200px;
            position: fixed;
            z-index: 10;
            left: 0;
            background-color: #e4e4e4;
            overflow-x: hidden;
            padding-top: 50px;
            margin-top: -30px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
        .sidea{
            color:#000;
            margin-top:6px;
        }
        </style>
<nav class="col-md-2 d-none d-md-block bg-black sidebar">
    <div class="sidebar-sticky">
        <div class="sidenav">
            <ul class="nav flex-column">
                <li class="nav-item">  
                    <a class="nav-link active sidea" href="{{url('/')}}" >
                        หน้าแรก <span class="sr-only"></span>
                    </a>
                </li>
                @role('admin')
                @endrole
    
                @role('staff')
                @endrole
    
                @role('agent')
                <li class="nav-item">  
                    <a class="nav-link active sidea" href="{{url('registeruserbyagent')}}" >
                        สมัครสมาชิก <span class="sr-only"></span>
                    </a>
                </li>
                @endrole
                
                <!--<li class="nav-item">  
                    <a class="nav-link active" href="{{url('/home')}}" >
                        Home <span class="sr-only"></span>
                    </a>
                </li>-->

                @can('hq')
                <li class="nav-item">  
                    <a class="nav-link active sidea" href="{{url('hq')}}" >
                        ข้อมูลของบริษัท<span class="sr-only"></span>
                    </a>
                </li>
                @endcan

                @can('managedepartment')
                <li class="nav-item">  
                    <a class="nav-link active sidea " href="{{url('/departments')}}" >
                        แผนก <span class="sr-only"></span>
                    </a>
                </li>
                @endcan

                @can('managestaff')
                <li class="nav-item">  
                    <a class="nav-link active sidea" href="{{url('/staffs')}}" >
                        พนักงาน <span class="sr-only"></span>
                    </a>
                </li>
                @endcan

                @can('appointment')
                <li class="nav-item">  
                    <a class="nav-link active sidea" href="{{url('/appointment')}}" >
                        มอบหมายงาน <span class="sr-only"></span>
                    </a>
                </li>
                @endcan

                @can('category')
                <li class="nav-item">  
                        <a class="nav-link active sidea" href="{{url('/categories')}}" >
                            หมวดหมู่ปัญหา<span class="sr-only"></span>
                        </a>
                    </li>
                @endcan

                @can('work')
                <li class="nav-item">  
                    <a class="nav-link active sidea" href="{{url('/work')}}" >
                        กระทู้คำถาม <span class="sr-only"></span>
                    </a>
                </li>
                @endcan
                
                @can('managecompany')
                <li class="nav-item">  
                    <a class="nav-link active sidea" href="{{url('/companies')}}" >
                        บริษัทลูกค้า <span class="sr-only"></span>
                    </a>
                </li>
                @endcan
                
                @can('program')
                <li class="nav-item">  
                    <a class="nav-link active sidea" href="{{url('/programs')}}" >
                        โปรแกรมลูกค้า<span class="sr-only"></span>
                    </a>
                </li>
                @endcan

                @can('selling')
                <li class="nav-item">  
                    <a class="nav-link active sidea" href="{{url('/sales')}}" >
                        รายการขาย <span class="sr-only"></span>
                    </a>
                </li>
                @endcan

                <!--@can('managecustomer')
                <li class="nav-item">  
                    <a class="nav-link active" href="{{url('#')}}" >
                        Customer <span class="sr-only"></span>
                    </a>
                </li>
                @endcan-->

                @can('approve')
                <li class="nav-item">  
                    <a class="nav-link active sidea" href="{{url('/users')}}" >
                        อนุมัติบัญชี <span class="sr-only"></span>
                    </a>
                </li>
                @endcan

                @can('userlist')
                <li class="nav-item">  
                    <a class="nav-link active sidea" href="{{url('/userlist')}}" >
                        รายชื่อผู้ใช้ <span class="sr-only"></span>
                    </a>
                </li>
                @endcan 

                @can('alluserlist')
                <li class="nav-item">  
                    <a class="nav-link active sidea" href="{{url('/alluserlist')}}" >
                        รายชื่อผู้ใช้ทั้งหมด <span class="sr-only"></span>
                    </a>
                </li>
                @endcan
                
                @if (Route::has('register'))
                @can('regisuser')
                <li class="nav-item">  
                    <a class="nav-link active sidea" href="{{route('registeruser')}}" >
                        สมัครสมาชิกผู้ใช้ทั่วไป<span class="sr-only"></span>
                    </a>
                </li>
                <!--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>-->
                @endcan
                @endif

                @can('regisstaff')
                <li class="nav-item">  
                    <a class="nav-link active sidea" href="{{url('#')}}" >
                        สมัครสมาชิกพนักงาน<span class="sr-only"></span>
                    </a>
                </li>
                @endcan

                @can('regisagent')
                <li class="nav-item">  
                    <a class="nav-link active sidea" href="{{url('registeragent')}}" >
                        สมัครสมาชิกตัวแทน<span class="sr-only"></span>
                    </a>
                </li>
                @endcan

                <!--@can('post')
                <li class="nav-item">  
                    <a class="nav-link active" href="{{url('#')}}" >
                            Post<span class="sr-only"></span>
                    </a>
                </li>
                @endcan

                @can('forum')
                <li class="nav-item">  
                        <a class="nav-link active" href="{{url('#')}}" >
                                Forum<span class="sr-only"></span>
                        </a>
                    </li>
                <a href="#" > Forum</a>
                @endcan-->

                @can('result')
                <li class="nav-item">  
                        <a class="nav-link active sidea" href="{{url('/report')}}" >
                            รายงาน<span class="sr-only"></span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</nav>
