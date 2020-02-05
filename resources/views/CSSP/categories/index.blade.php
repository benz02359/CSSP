@extends('cssp.layouts.master')
<!-- title unixdev -->
<title> หมวดหมู่ปัญหา </title>
<!-- add icon link -->
<link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
@section('content')
<style>
body{
	font-size: 14px;
}
.dep tbody td a,.dep a.link,.dep a:hover,.dep a.link:hover{
	color: #000;
}
</style>
<br>
<div class="row ">
<div class="col-md-2"></div>
		<div class="col-md-3">
			<h2>หมวดหมู่</h2> <br>
					@foreach ($categories as $category)
						<a style="text-align:center" href="{{ route('categories.show', $category->id) }}"><button type="button" class="list-group-item list-group-item-action">{{ $category->name }}</button></a>

					@endforeach
		</div> <!-- end of .col-md-8 -->

		<div style="width:30px"> </div>
		<div class="col-md-3" style="text-align:center;margin-top:24px">
			<div class="well">
				{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
					<h3>เพิ่มหมวดหมู่</h3>
					{{ Form::text('name', null, ['class' => 'form-control','placeholder' => 'ชื่อหมวดหมุ่']) }}
					{{ Form::submit('สร้างหมวดหมู่ใหม่', ['class' => 'btn btn-outline-primary btn-block btn-h1-spacing']) }}
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>

    
@endsection