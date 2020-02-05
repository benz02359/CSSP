@extends('cssp.layouts.master')
 <!-- title unixdev -->
 <title> แก้ไขข้อมูลโปรแกรม {{$program->name}}  </title>
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
    width: 600px;
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
<div class="card-header" style="font-size: 22px;background-color: #343A40;color:aliceblue;border-radius: 12px 12px 0 0;"><b>แก้ไขข้อมูลของบริษัท {{$program->name}}  </b></div>
    {!! Form::open(['action' => ['ProgramController@update', $program->id], 'method' => 'PUT']) !!}
<div class="form-group row" style="padding-top:20px">            
        <div class="col-3 tstyle">{{Form::label('name', 'ชื่อ')}}</div>
            <div class="col-8"> {{Form::text('name',$program->name,['class' => 'form-control','placeholder' => 'ชื่อ'])}}
        </div></div>
        <div class="form-group row">
            <div class="col-3 tstyle">{{Form::label('detail', 'รายละเอียด')}}</div>
            <div class="col-8">{{Form::textarea('detail',$program->detail,['class' => 'form-control','placeholder' => 'รายละเอียด'])}}
        </div></div>
        <div class="form-group row">
            <div class="col-3 tstyle">{{Form::label('price', 'ราคาโปรแกรม')}}</div>
            <div class="col-8">{{Form::text('price',$program->price,['class' => 'form-control','placeholder' => 'ราคาโปรแกรม'])}}
        </div></div>
        <div class="form-group row ">
            <div class="col-3 tstyle">{{Form::label('sold', 'วันที่ขาย')}}</div>
            <div class="col-8"><input type="date" name="sold" value="{{$program->solddate}}">
            </div></div>
            <div class="form-group row">
            <div class="col-3 tstyle">{{Form::label('start', 'วันที่เริ่มดูแล')}}</div>
            <div class="col-8"><input type="date" name="start" value="{{$program->startdate}}">
            </div></div>
            <div class="form-group row">
            <div class="col-3 tstyle">{{Form::label('start', 'วันที่สิ้นสุด')}}</div>
            <div class="col-8"><input type="date" name="end" value="{{$program->enddate}}"> 
            </div></div>

        <div class="form-group col-12" style="margin-left:200px">
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('บันทึกการแก้ไข',['class' => 'btn btn-outline-success'])}}
        </div>
    {!! Form::close() !!}    
</div>   
@endsection