@extends('cssp.layouts.master')

@section('content')
<a href="/companies" class="btn btn-primary">Back</a>
<hr>
    <h1>แก้ไขข้อมูล</h1>
    {!! Form::open(['action' => ['CompanyController@update', $company->id], 'method' => 'PUT']) !!}
    <div class="form-group">
            {{Form::label('name', 'ชื่อ')}}
            {{Form::text('name',$company->name,['class' => 'form-control','placeholder' => 'ชื่อ'])}}
        </div>
        <div class="form-group">
                {{Form::label('email', 'E-mail')}}
                {{Form::text('email',$company->email,['class' => 'form-control','placeholder' => 'E-mail'])}}
            </div>
        <div class="form-group">
            {{Form::label('tel', 'เบอร์โทรศัพท์')}}
            {{Form::text('tel',$company->tel,['class' => 'form-control','placeholder' => 'เบอร์โทรศัพท์'])}}
        </div>
        <div class="form-group">
            {{Form::label('address', 'ที่อยู่')}}
            {{Form::text('address',$company->address,['class' => 'form-control','placeholder' => 'ที่อยู่'])}}
        </div>        
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}    
@endsection