@extends('cssp.layouts.master')

@section('content')
<button class="btn btn-primary" onclick="goBack()" >Go Back</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<hr>
<h1>เพิ่มรายการโปรแกรมที่ขาย</h1>
{!! Form::open(['action' => 'ProgramController@store', 'method' => 'POST']) !!}
<div class="form-group">
    {{Form::label('name', 'ชื่อ')}}
    {{Form::text('name','',['class' => 'form-control','placeholder' => 'ชื่อ'])}}
</div>
<div class="form-group">
    {{Form::label('detail', 'รายละเอียด')}}
    {{Form::textarea('detail','',['class' => 'form-control','placeholder' => 'รายละเอียด'])}}
</div>
<input type="hidden" name="company" value="{{$company->id}}">
<!--<div class="form-group">
    {{Form::label('company', 'บริษัทที่ใช้')}}
    {!! Form::select('company', $company, null, ['class' => 'form-control']) !!} 
</div>-->
<div class="form-group">
    {{Form::label('sold', 'วันที่ขาย')}}
    <input type="date" name="sold" value="sold">
</div>
<div class="form-group">
    {{Form::label('start', 'วันที่เริ่มดูแล')}}
    <input type="date" name="start" value="start">
</div>
<div class="form-group">
    {{Form::label('start', 'วันที่สิ้นสุด')}}
    <input type="date" name="end" value="end">
</div>
{{Form::submit('Submit',['class' => 'btn btn-primary'])}}
{!! Form::close() !!}     
@endsection