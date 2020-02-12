@extends('cssp.layouts.master')
<!-- title unixdev -->
<title> รายละเอียดหมวดหมู่{{ $cate->name }} </title>
<!-- add icon link -->
<link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
@section('content')
<style>
.btndel{
	width: 155px;
	font-size:18px;
}
</style>
<BR>
<div class="row">
		<div class="col-md-6">
			<h2>หมวดหมู่ {{ $cate->name }}</h2> 
			<h5>มีทั้งหมด {{ $postcate->count() }} ปัญหา
			
				{{ Form::open( ['action' => 'CategoryController@addcate', 'method' => "POST"]) }}
					<select id="post_id" name="post_id">
						<option>เลือกกระทู้ปัญหาที่ต้องการเพิ่ม</option>
							@foreach($posts as $p)                              
						<option value="{{$p->id}}">{{$p->title}}
							@endforeach
					</select>

				<input id="cate_id" type="hidden" name="cate_id" value="{{$cate->id}}"> 
				{{ Form::submit('เพิ่มปัญหา', ['class' => 'btn btn-success']) }}
				{{ Form::close() }}</h5>
			</div>
	</div>
	<div class="row">
		<div class="col-md-4" style="text-align: center">
			<table class="table">
				<thead>
					<tr>
						<th>รายการปัญหาในหมวดหมู่{{ $cate->name }} </th>
					</tr>
				</thead>

				<tbody>
					@foreach ($postcate as $pc)
					<tr>
						@foreach($pc->post as $post)
						<td><a href="/posts/{{$post->id}}">{{ $post->title}}</a></td>
						@endforeach
						<!--<td><a href="" class="btn btn-default btn-xs">View</a></td>-->
					</tr>
					@endforeach
					
					<tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-1"> <br>  </div>
		<div class="col-md-2"> 
			<!-- Button trigger modal -->
			<button style="width: 155px;font-size:18px"  class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
			แก้ไขชื่อหมวดหมู่
			</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">แก้ไขชื่อหมวดหมู่</h5>
					</button>
				</div>
				<div class="modal-body">
					{{ Form::model($cate, ['route' => ['categories.update', $cate->id], 'method' => "PUT"]) }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					{{ Form::submit('Save Changes', ['class' => 'btn btn-success']) }}
    				{{ Form::close() }}
				</div>
				</div>
			</div>
			</div>
			 {{ Form::open(['route' => ['categories.destroy', $cate->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("ต้องการที่จะลบโปรแกรม" $program->name" ใช่ไหม?")']) }}
				{{ Form::submit('ลบหมวดหมู่', ['class' => 'btn btn-outline-danger btn-block btndel']) }}
			{{ Form::close() }}  </div>
		

	</div>
@endsection