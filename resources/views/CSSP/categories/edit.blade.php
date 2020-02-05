@extends('cssp.layouts.master')
<!-- title unixdev -->
<title> แก้ไขหมวดหมู่ </title>
<!-- add icon link -->
<link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
@section('content')
<button class="btn btn-primary" onclick="goBack()" >Go Back</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
	{{ Form::model($cate, ['route' => ['categories.update', $cate->id], 'method' => "PUT"]) }}
		
		{{ Form::label('name', "Title:") }}
		{{ Form::text('name', null, ['class' => 'form-control']) }}

		{{ Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' => 'margin-top:20px;']) }}
    {{ Form::close() }}
@endsection