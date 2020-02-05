
@extends('cssp.layouts.master')


@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.example_hq {
    color: #494949 !important;
    text-transform: uppercase;
    text-decoration: none;
    margin-left: 100px;
    padding: 2px 35px 2px 35px;
    margin-top: 15px;
    color: #d3be00;

    border: 4px solid #f3e034 !important;
    display: inline-block;
    transition: all 0.4s ease 0s;
}
.example_hq:hover {
    color: #494949;
    background-color: #f3e034;
    border-color: #f3e034;
    transition: all 0.4s ease 0s;
}
button a:hover,button a:link{
    text-decoration: none;
    color: black;
}

/* profile */
/* Profile container */
.profile {
  margin: 10px 0px 20px 80px;
  
}

/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #efefef;
  border-radius: 5% !important;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  margin-left:250px;
  width: 130px;
  height: 50%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}
.profile-pic{
  float: auto;
  margin: 0 auto;
  margin-left:140px;
  width: 130px;
  height: 50%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #343A40;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #343A40;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 12px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 13px;
  font-weight: 600;
  padding: 6px 10px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}
    
.profile-usermenu {
  margin-top: 15px;
  padding-left:38px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
  
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}


.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 460px;
}
    </style>
    <br>
    <div class="row profile">
		<div class="col-md-5">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-pic">
					<img src="<?php echo asset('assets/img/unixdevlogo2.png'); ?>" >
                </div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
                    {{$hq->name}}
					</div>
					<div class="profile-usertitle-job">
                    {{$hq->name}} <br> Customer Service
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav" style="font-size:17px;">
						<li>
							<a >
                            <i class="fa fa-home" style="font-size:24px;"></i> 
                            {{$hq->address}} </a>
						</li>
						<li>
							<a style="margin-right:215px">
                            <i class="fa fa-mobile" style="font-size:24px;padding-left:9px"></i>
                            {{$hq->tel}} </a>
						</li>
						<li>
							<a>
							<i class="fa fa-envelope" style="font-size:22px"></i>
							{{$hq->email}} </a>
                        </li>
                        
						<li>
                           
						</li>
                    </ul>
                    <div class="profile-userbuttons">
                            <a href="/hq/{{1}}/edit" class="btn btn-outline-warning">แก้ไขข้อมูลบริษัท</a>
                    </div>
				</div>
				<!-- END MENU -->
			</div>

@endsection