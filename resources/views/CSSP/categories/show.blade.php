@extends('cssp.layouts.master')

@section('content')
<button class="btn btn-primary" onclick="goBack()" >Go Back</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<div class="row">
		<div class="col-md-8">
			<h1>หมวดหมู่ {{ $cate->name }}</h1> 
			<h3>มีทั้งหมด {{ $cate->posts()->count() }}ปัญหา
			{{ Form::open( ['action' => 'CategoryController@addcate', 'method' => "POST"]) }}
			<input list="post_id" name="post_id">
			<datalist id="post_id" name="post_id">
			@foreach($posts as $p)
			  <option value="{{$p->id}}">{{$p->title}}
			@endforeach
			</datalist>
			<input id="cate_id" type="hidden" name="cate_id" value="{{$cate->id}}"> 
			{{ Form::submit('เพิ่มปัญหา', ['class' => 'btn btn-success']) }}
			{{ Form::close() }}</h3>
		</div>
		<div class="col-md-2">
			<a href="{{ route('categories.edit', $cate->id) }}" class="btn btn-primary">แก้ไขชื่อหมวดหมู่</a>
		</div>
		<div class="col-md-2">
			{{ Form::open(['route' => ['categories.destroy', $cate->id], 'method' => 'DELETE']) }}
				{{ Form::submit('ลบหมวดหมู่', ['class' => 'btn btn-danger btn-block']) }}
			{{ Form::close() }}
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Tags</th>
						
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach ($postcate as $pc)
					<tr>
						<th></th>
						@foreach($pc->post as $post)
						<td><a href="/posts/{{$post->id}}">{{ $post->title}}</a></td>
						@endforeach
						<td></td>
						<!--<td><a href="" class="btn btn-default btn-xs">View</a></td>-->
					</tr>
					@endforeach
					
					<tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection