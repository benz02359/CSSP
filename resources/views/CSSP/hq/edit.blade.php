@extends('cssp.layouts.master')

@section('content')
<style>
.edit-hq{
    width:700px;
    margin-left:35px;
    font-size:18px;
}
.example_hq {
    color: #494949 !important;
    text-transform: uppercase;
    text-decoration: none;
    margin-left: 20px;
    padding: 2px 30px 2px 30px;
    margin-top: 15px;
    background: #ffffff;
    border: 4px solid #f6b93b !important;
    display: inline-block;
    transition: all 0.4s ease 0s;
}
.example_hq:hover , .submitbutton:hover {
    color: #ffffff !important;
    background: #f6b93b;
    border-color: #f6b93b !important;
    transition: all 0.4s ease 0s;
}
.submitbutton{
    margin-left:200px;
    color: #494949 !important;
    text-transform: uppercase;
    text-decoration: none;
    margin-left: 40px;
    padding: 2px 35px 2px 35px;
    margin-top: 15px;
    background: #ffffff;
    border: 4px solid #f6b93b !important;
    display: inline-block;
    transition: all 0.4s ease 0s;
}
button a:hover,button a:link{
    text-decoration: none;
    color: black;
}
.resize{
 
}
    </style>
<diV style="margin:15px 0px 15px 0px"></diV>
    <h2><b>แก้ไขข้อมูล</b></h2>
    <div class="edit-hq">
        {!! Form::open(['action' => ['HQController@update', $hq->id], 'method' => 'PUT']) !!}
        <div class="form-group">
                {{Form::label(' Name', 'ชื่อบริษัท')}} {{Form::text('name',$hq->name,['class' => 'form-control','placeholder' => 'ชื่อ'])}}
            </div>
            <div class="form-group resize" >
                {{Form::label('address', 'ที่อยู่บริษัท')}}
                {{Form::textarea('address',$hq->address,['class' => 'form-control','placeholder' => 'ที่อยู่'])}}
            </div>
            <div class="form-group">
                {{Form::label('tel', 'เบอร์โทรศัพท์')}}
                {{Form::text('tel',$hq->tel,['class' => 'form-control','placeholder' => 'เบอร์โทรศัพท์'])}}
            </div> 
            <div class="form-group">
                    {{Form::label('email', 'อีเมล')}}
                    {{Form::text('email',$hq->email,['class' => 'form-control','placeholder' => 'E-mail'])}}
                </div>
                
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Submit',['class' => 'btn btn-outline-success foat-center'])}} 
    </div>
@endsection