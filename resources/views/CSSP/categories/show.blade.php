@extends('cssp.layouts.master')

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
			<a style="width: 155px;font-size:18px" href="{{ route('categories.edit', $cate->id) }}" class="btn btn-outline-warning">แก้ไขชื่อหมวดหมู่</a>
			 {{ Form::open(['route' => ['categories.destroy', $cate->id], 'method' => 'DELETE']) }}
				{{ Form::submit('ลบหมวดหมู่', ['class' => 'btn btn-outline-danger btn-block btndel']) }}
			{{ Form::close() }}  </div>
		

	</div>
@endsection