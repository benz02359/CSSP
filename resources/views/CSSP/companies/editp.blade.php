@extends('cssp.layouts.master')
 <!-- title unixdev -->
 <title> เพิ่มโปรแกรมของบริษัท {{$company->name}} </title>
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
    <div class="card-header" style="font-size: 22px;background-color: #343A40;color:aliceblue;border-radius: 12px 12px 0 0;"><b>เพิ่มโปรแกรมของบริษัท {{$company->name}}</b></div>
                <div class="card-body" style="background-color: #FFF;margin-left:15px">
                    {!! Form::open(['action' => 'ProgramController@store', 'method' => 'POST']) !!}
                    <div class="form-group row">
                        {{Form::label('name', 'ชื่อโปรแกรม')}}
                    <div class="col-md-9">    
                        {{Form::text('name','',['class' => 'form-control','placeholder' => 'ชื่อโปรแกรม'])}}
                    </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('detail', 'รายละเอียด')}}
                     <div class="col-md-9">        
                         {{Form::textarea('detail','',['class' => 'form-control','placeholder' => 'รายละเอียด'])}}
                         </div>
                    </div>
                    <input type="hidden" name="company" value="{{$company->id}}">
                    <!--<div class="form-group">
                        {{Form::label('company', 'บริษัทที่ใช้')}}
                        {!! Form::select('company', $company, null, ['class' => 'form-control']) !!} 
                    </div>-->
                    <div class="form-group row">
                        {{Form::label('price', 'ราคาโปรแกรม')}}
                    <div class="col-md-5">    
                        {{Form::text('price','',['class' => 'form-control','placeholder' => 'ราคาโปรแกรม'])}}
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('sold', 'วันที่ขาย')}}
                    <div class="col-md-9">    
                        <input type="date" name="sold" value="sold">
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('start', 'วันที่เริ่มดูแล')}}
                    <div class="col-md-9">
                        <input type="date" name="start" value="start">
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('start', 'วันที่สิ้นสุด')}}
                    <div class="col-md-9">            
                        <input type="date" name="end" value="end">
                        </div>
                    </div>
                    <div class="form-group col-12" style="margin-left:200px">
                    {{Form::submit('เพิ่มโปรแกรม',['class' => 'btn btn-outline-success ad'])}}
                    {!! Form::close() !!}
                    </div>
            </div>
        </div>
    </div>
</div>     
@endsection