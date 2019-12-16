@extends('layouts.app')

@section('content')
    <h1>สร้างกระทู้ใหม่</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'หัวข้อ')}}
            {{Form::text('title','',['class' => 'form-control','placeholder' => 'ใส่หัวข้อที่ต้องการ'])}}
        </div>
        <div class="form-group">
            {{Form::label('text', 'ข้อความ')}}
            {{Form::textarea('text', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'ใส่ข้อความที่ต้องการ'])}}
        </div>
        <div class="form-group">
            {{Form::label('catagory', 'หมวดหมู่')}}
            <table class="table table-bordered">
            @foreach ($categories as $cate)        
            <td>
            {{Form::label('catagory', $cate->name)}}
            {{Form::checkbox('catagory', $cate->id)}}
            </td>
            @endforeach
            </table>
        </div>
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}    
@endsection