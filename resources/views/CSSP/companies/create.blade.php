@extends('cssp.layouts.master')

@section('content')
<button class="btn btn-primary" onclick="goBack()" >Go Back</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
    <h1>เพิ่มรายชื่อ</h1>
    {!! Form::open(['action' => 'CompanyController@store', 'method' => 'POST']) !!}
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
            {{Form::label('address', 'ที่อยู่')}}
            {{Form::textarea('address','',['class' => 'form-control','placeholder' => 'ที่อยู่'])}}
        </div>
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}    
@endsection