@extends('cssp.layouts.master')
 <!-- title unixdev -->
 <title> แก้ไขข้อมูลบริษัท{{$company->name}}tle>
<!-- add icon link -->
<link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
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
    max-width: 500px;
    max-height: null;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}
</style><br>
<button class="btn btn-outline-warning" onclick="goBack()" >ย้อนกลับ</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<div class="card"> 
<div class="card-header" style="font-size: 22px;background-color: #343A40;color:aliceblue;border-radius: 12px 12px 0;"><b>แก้ไขข้อมูลของบริษัท {{$company->name}} </b></div>
    {!! Form::open(['action' => ['CompanyController@update', $company->id], 'method' => 'PUT']) !!}
    <div class="form-group row" style="padding-top:20px">
            <div class="col-3 tstyle">{{Form::label('name', 'ชื่อ')}}</div>
            <div class="col-8">{{Form::text('name',$company->name,['class' => 'form-control','placeholder' => 'ชื่อ'])}}
        </div></div>
        <div class="form-group row">
            <div class="col-3 tstyle">{{Form::label('email', 'E-mail')}}</div>
            <div class="col-8">{{Form::text('email',$company->email,['class' => 'form-control','placeholder' => 'E-mail'])}}
        </div></div>
        <div class="form-group row">
            <div class="col-3 tstyle">{{Form::label('tel', 'เบอร์โทรศัพท์')}}</div>
            <div class="col-8">{{Form::text('tel',$company->tel,['class' => 'form-control','placeholder' => 'เบอร์โทรศัพท์'])}}
        </div></div>
        <div class="form-group row">
            <div class="col-3 tstyle">{{Form::label('address', 'ที่อยู่')}}</div>
            <div class="col-8">{{Form::textarea('address',$company->address,['class' => 'form-control','placeholder' => 'ที่อยู่'])}}
        </div></div>        
        <div class="form-group col-12" style="margin-left:200px">
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('บันทึกการแก้ไข',['class' => 'btn btn-outline-success'])}}
        </div>
    {!! Form::close() !!}    
</div>
@endsection