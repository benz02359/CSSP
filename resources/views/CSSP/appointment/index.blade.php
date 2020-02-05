@extends('cssp.layouts.master')
<!-- title unixdev -->
<title> มอบหมายงาน</title>
<!-- add icon link -->
<link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
@section('content')
<style>
.example_appoint {
    color: #494949 !important;
    text-transform: uppercase;
    text-decoration: none;
    margin-left: 0px;
    padding: 2px 25px 2px 25px;
    margin-top: 15px;
    background: #ffffff;
    border: 4px solid #f6b93b !important;
    display: inline-block;
    transition: all 0.4s ease 0s;
}
.example_appoint:hover {
    color: #ffffff !important;
    background: #f6b93b;
    border-color: #f6b93b !important;
    transition: all 0.4s ease 0s;
}
button a:hover,button a:link{
    text-decoration: none;
    color: black;
}
td a,a.link{
    color: #000;
    text-decoration: none;
}
td a,a.link:hover{
    color: #000;
   text-decoration: none;
}
    </style>

<div>
        <div class="row">
            <div class="col-md-11 col-md-offset-3">
                <div class="panel panel-default">
                    
                    
                    <div class="panel-body">
                    <br><div class="row">
                        <div class="col-9" style="padding-left:32px"><h2><b>กระทู้ทั้งหมด</b></h2></div>
                        <div class="col-3" style="padding-left:130px;padding-bottom:16px"><a href="/posts/create"  class="btn btn-outline-secondary right">ตั้งกระทู้</a></div>
                        </div>

                        @if(count($posts) > 0)
                            <table class="table table-light table-bordered table-hover table-striped" style="font-size:15px">
                                <tr class="thead-dark" style="text-align: center;">
                                    <th style="width:220px;">หัวข้อกระทู้</th>
                                    <th style="width:125px;">เวลาที่ตั้งกระทู้</th>
                                    <th style="width:110px;">แก้ไขกระทู้</th>
                                    <th style="width:170px;">พนักงานที่ได้รับมอบหมาย</th>
                                    <th style="width:10px;">เลือกพนักงาน</th>
                                    <th style="width:20px;">ยืนยัน</th>
                                </tr>
                                @foreach($posts as $post)
                                    <tr>
                                        <td><a style="font-size:17px" href="/posts/{{$post->id}}" target="_blank">{{$post->title}}</a></td>
                                        <td style="text-align: center;"><small>{{$post->created_at}}</small></td>
                                        <td style="text-align: center;"><a href="/posts/{{$post->id}}/edit" class="btn btn-outline-warning"> แก้ไขกระทู้ </a></td>
                                        <td style="text-align: center;">
                                        @if($post->staff == null)
                                            ยังไม่มีพนักงานที่มอบหมาย
                                        @else
                                            {{$post->staff['name']}}
                                            
                                        @endif
                                        </td>
                                        <td style="text-align: center;">                                                                                           
                                            {!!Form::open(['action' => ['AppointmentController@update', $post->id], 'method' => 'PUT', 'class' => 'pull-right'])!!}
                                            
                                                
                                                {!! Form::select('staff',$staff, ['class' => 'form-control'],['placeholder' => 'เลือกพนักงาน']) !!} 
                                                
                                            </td>
                                            <td style="text-align: center;">
                                            {{Form::hidden('_method','PUT')}}
                                            {{Form::submit(' ยืนยัน ',['Class' => 'btn btn-outline-success'])}}
                                            {!!Form::close()!!}  
                                        </td>                                      
                                        </tr>
                                @endforeach
                            </table>
                        @else
                            <p>You have no posts</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection