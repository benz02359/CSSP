@extends('cssp.layouts.master')

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
                        <a href="/posts/create" class="example_appoint" style="margin: 20px 0px 15px 0px">ตั้งกระทู้</a>
                        <h1><b>กระทู้ทั้งหมด</b></h1>
                        @if(count($posts) > 0)
                            <table class="table table-light table-bordered table-hover table-striped" style="font-size:15px">
                                <tr class="thead-dark" style="text-align: center;">
                                    <th style="width:260px;">หัวข้อกระทู้</th>
                                    <th style="width:125px;">เวลาที่ตั้งกระทู้</th>
                                    <th style="width:100px;">แก้ไขกระทู้</th>
                                    <th style="width:160px;">พนักงานที่ได้รับมอบหมาย</th>
                                    <th style="width:10px;">เลือกพนักงาน</th>
                                    <th style="width:20px;">ยืนยัน</th>
                                </tr>
                                @foreach($posts as $post)
                                    <tr>
                                        <td><a style="font-size:17px" href="/posts/{{$post->id}}" target="_blank">{{$post->title}}</a></td>
                                        <td style="text-align: center;"><small>{{$post->created_at}}</small></td>
                                        <td style="text-align: center;"><a href="/posts/{{$post->id}}/edit" class="btn btn-outline-warning"> แก้ไขกระทู้ </a></td>
                                        <td style="text-align: center;">
                                            {{$post->staff['name']}}
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