@extends('cssp.layouts.master')

@section('content')
<a href="/userprofile" class="btn btn-primary">Back</a>
<hr>
    <h1>แก้ไขข้อมูล</h1>
    {!! Form::open(['action' => ['UserprofileController@update', $user->id], 'method' => 'PUT']) !!}
    <div class="form-group">
            {{Form::label('name', 'ชื่อ')}}
            {{Form::text('name',$user->name,['class' => 'form-control','placeholder' => 'ชื่อ'])}}
        </div>
        <div class="form-group">
                {{Form::label('email', 'E-mail')}}
                {{Form::text('email',$user->email,['class' => 'form-control','placeholder' => 'E-mail'])}}
            </div>
        <div class="form-group">
            {{Form::label('tel', 'เบอร์โทรศัพท์')}}
            {{Form::text('tel',$user->userprofile->tel,['class' => 'form-control','placeholder' => 'เบอร์โทรศัพท์'])}}
        </div>
           
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}    
@endsection