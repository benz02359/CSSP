@extends('cssp.layouts.master')

@section('content')
<button class="btn btn-primary" onclick="goBack()" >Go Back</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<hr>
    <h1>แก้ไขข้อมูล</h1>
    {!! Form::open(['action' => ['ProgramController@update', $program->id], 'method' => 'PUT']) !!}
    <div class="form-group">
            {{Form::label('name', 'ชื่อ')}}
            {{Form::text('name',$program->name,['class' => 'form-control','placeholder' => 'ชื่อ'])}}
        </div>
        <div class="form-group">
                {{Form::label('detail', 'รายละเอียด')}}
                {{Form::textarea('detail',$program->detail,['class' => 'form-control','placeholder' => 'รายละเอียด'])}}
            </div>
        <div class="form-group">
                {{Form::label('sold', 'วันที่ขาย')}}
                <input type="date" name="sold" value="{{$program->solddate}}">
            </div>
            <div class="form-group">
                {{Form::label('start', 'วันที่เริ่มดูแล')}}
                <input type="date" name="start" value="{{$program->startdate}}">
            </div>
            <div class="form-group">
                {{Form::label('start', 'วันที่สิ้นสุด')}}
                <input type="date" name="end" value="{{$program->enddate}}">      
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}    
@endsection