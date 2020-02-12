@extends('cssp.layouts.master')
 <!-- title unixdev -->
 <title> แก้ไขข้อมูลบริษัท {{$hq->name}} </title>
<!-- add icon link -->
<link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
@section('content')
<style>
.tstyle{
    text-align: right;
}
.card{
    background: white;
    margin: 20px 70px;
    border-radius: 12px;
    box-sizing: border-box;
    width: 550px;
    max-height: null;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}
.edit-hq{
    margin: 5px 20px
}
</style><br>
<button class="btn btn-outline-warning" onclick="goBack()" >ย้อนกลับ</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<diV style="margin:15px 0px 15px 0px"></diV>
<div class="card"> 
<div class="card-header" style="font-size: 22px;background-color: #343A40;color:aliceblue;border-radius: 12px 12px  0 0;"><b>แก้ไขข้อมูลโปรแกรม {{$program->name}} </b></div>
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
        
            <div class="form-group col-12" style="margin-left:160px">
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('บันทึกการแก้ไข',['class' => 'btn btn-outline-success'])}}
            </div>
    </div>
@endsection