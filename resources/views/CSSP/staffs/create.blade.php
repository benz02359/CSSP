@extends('cssp.layouts.master')
 <!-- title unixdev -->
 <title> เพิ่มรายชื่อพนักงาน </title>
<!-- add icon link -->
<link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
@section('content')
<button class="btn btn-primary" onclick="goBack()" >Go Back</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
    <h1>เพิ่มรายชื่อ/h1>
    {!! Form::open(['action' => 'StaffsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name', 'ชื่อ')}}
            {{Form::text('name','',['class' => 'form-control','placeholder' => 'ชื่อ'])}}
        </div>
        <div class="form-group">
                {{Form::label('email', 'E-mail')}}
                {{Form::text('email','',['class' => 'form-control','placeholder' => 'E-mail'])}}
            </div>
        <div class="form-group">
            {{Form::label('tel', 'เบอร์โทรศัพท์')}}
            {{Form::text('tel','',['class' => 'form-control','placeholder' => 'เบอร์โทรศัพท์'])}}
        </div>
        <div class="form-group">
            {{Form::label('language', 'ภาษาที่ใช้')}}
            {{Form::text('language','',['class' => 'form-control','placeholder' => 'ภาษาที่ใช้เขียนโปรแกรม'])}}
        </div>
        <div class="form-group">
            {{Form::label('postion', 'ตำแหน่ง')}}
            {{Form::text('postion','',['class' => 'form-control','placeholder' => 'ตำแหน่ง'])}}
        </div>
        <div class="form-group">
            {{Form::label('dep', 'แผนก')}}
            {{Form::text('dep','',['class' => 'form-control','placeholder' => 'แผนก'])}}
        </div>
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}    
@endsection