@extends('cssp.layouts.master')

@section('content')
<br>
<a style="font-size:27px;"><b>เพิ่มรายการขาย</b></a>
{!! Form::open(['action' => ['SaleController@update', $sdata->id], 'method' => 'PUT']) !!}
<div class="row">

<div class="card" style="background-color:#f4f6f7;margin-top:10px;width:520px;" >
<div class="card-header text-white bg-dark"><a style="padding:-10px 0px -10px 0px;font-size:18px">บริษัท</a></div>
    <div class="card-body">
    <div class="form-group">
        {{Form::label('namecompany', 'ชื่อบริษัท')}}
        {{Form::text('namecompany',$sdata->company->name,['class' => 'form-control','placeholder' => 'ชื่อบริษัท'])}}
    </div>
    <div class="form-group">
            {{Form::label('email', 'E-mail')}}
            {{Form::text('cemail',$sdata->company->email,['class' => 'form-control','placeholder' => 'E-mail'])}}
        </div>
    <div class="form-group">
        {{Form::label('tel', 'เบอร์โทรศัพท์')}}
        {{Form::text('tel',$sdata->company->tel,['class' => 'form-control','placeholder' => 'เบอร์โทรศัพท์'])}}
    </div>
    <div class="form-group">
        {{Form::label('address', 'ที่อยู่')}}
        {{Form::textarea('address',$sdata->company->address,['class' => 'form-control','placeholder' => 'ที่อยู่'])}}
    </div>
    </div>
    </div>
    
    <div class="card" style="background-color:#f4f6f7;margin-top:10px;width:520px;margin-left:20px" >
    <div class="card-header text-white bg-dark"><a style="padding:-10px 0px -10px 0px;font-size:18px">โปรแกรม</a></div>
    <div class="card-body">
    <div class="form-group">
            {{Form::label('nameprogram', 'ชื่อโปรแแกรม')}}
            {{Form::text('nameprogram',$sdata->program->name,['class' => 'form-control','placeholder' => 'ชื่อโปรแกรม'])}}
        </div>
        <div class="form-group">
            {{Form::label('detailprogram', 'รายละเอียด')}}
            {{Form::textarea('detailprogram',$sdata->program->detail,['class' => 'form-control','placeholder' => 'รายละเอียด'])}}
        </div>    
        <div class="form-group">
            {{Form::label('price', 'ราคาโปรแกรม')}}
            {{Form::text('price',$sdata->program->price,['class' => 'form-control','placeholder' => 'ราคาโปรแกรม'])}}
        </div>          
        <div class="form-group">
            {{Form::label('sold', 'วันที่ขาย')}}
            <input type="date" name="sold" value="{{$sdata->program->solddate}}">
        </div>
        <div class="form-group">
            {{Form::label('start', 'วันที่เริ่มดูแล')}}
            <input type="date" name="start" value="{{$sdata->program->startdate}}">
        </div>
        <div class="form-group">
            {{Form::label('start', 'วันที่สิ้นสุด')}}
            <input type="date" name="end" value="{{$sdata->program->enddate}}">
        </div>
    </div>
    </div>
    </div>
    <style>
    .subbtn{
        margin-left:235px;
    }
    </style>
    {{Form::submit('Submit',['class' => 'btn btn-outline-primary subbtn'])}}
{!! Form::close() !!}  
@endsection
<script>
    $(".Delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });
</script>