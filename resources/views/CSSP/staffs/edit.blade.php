 <!-- title unixdev -->
 <title> แก้ไขข้อมูลของพนักงาน </title>
<!-- add icon link -->
<link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
@extends('cssp.layouts.master')

@section('content')
<style>
.tstyle{
    text-align: right;
}
.card{
    background: white;
    margin: 30px 30px;
    border-radius: 12px;
    box-sizing: border-box;
    max-width: 550px;
    max-height: null;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}
</style>
<br>
<button class="btn btn-outline-warning" onclick="goBack()" >ย้อนกลับ</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<div class="card">
    <div class="card-header" style="font-size: 22px;background-color: #343A40;color:aliceblue"><b>แก้ไขข้อมูล</b></div>
    {!! Form::open(['action' => ['StaffController@update', $staff->id], 'method' => 'PUT']) !!}
    <div class="form-group row" style="padding-top:20px">
            <div class="col-3 tstyle">{{Form::label('name','ชื่อ-นามสกุล')}}</div>
            <div class="col-8">{{Form::text('name',$staff->name,['class' => 'form-control','placeholder' => 'ชื่อ'])}}</div>
        </div>
        <div class="form-group row">
            <div class="col-3 tstyle">{{Form::label('e-mail', 'E-mail')}}</div>
            <div class="col-8">{{Form::text('e-mail',$staff->email,['class' => 'form-control','placeholder' => 'E-mail'])}}</div>
            </div>
        <div class="form-group row">    
            <div class="col-3 tstyle">{{Form::label('tel', 'เบอร์โทรศัพท์')}}</div>
            <div class="col-5">{{Form::text('tel',$staff->tel,['class' => 'form-control','placeholder' => 'เบอร์โทรศัพท์'])}}</div>
        </div>
        <div class="form-group row">
            <div class="col-3 tstyle">{{Form::label('language', 'ภาษาที่ใช้')}}</div>
            <div class="col-8">{{Form::text('language',$staff->language,['class' => 'form-control','placeholder' => 'ภาษาที่ใช้เขียนโปรแกรม'])}}</div>
        </div>
        <div class="form-group row ">
            <div class="col-3 tstyle">{{Form::label('position', 'ตำแหน่ง')}}</div>
            <div class="col-8">{{Form::text('position',$staff->position,['class' => 'form-control','placeholder' => 'ตำแหน่ง'])}}</div>
        </div>
        <div class="form-group row">
            <div class="col-3 tstyle">{{Form::label('dep', 'แผนก')}}            </div>
            <div class="col-8">{!! Form::select('dep', $dep, null, ['class' => 'form-control']) !!} </div>
                     
        </div>
        <div class="form-group col-12" style="margin-left:200px">
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('บันทึกการแก้ไข',['class' => 'btn btn-outline-success'])}}
        </div>
    {!! Form::close() !!}    
</div>
@endsection