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
			<h3>มีทั้งหมด {{ $cate->posts()->count() }} ปัญหา<input list="brow">
			<datalist id="brow">
			  <option value="Internet Explorer">
			  <option value="Firefox">
			  <option value="Chrome">
			  <option value="Opera">
			  <option value="Safari">
			</datalist></h3>
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
					@foreach ($cate->posts as $post)
					<tr>
						<th>{{ $post->id }}</th>
						<td>{{ $post->title }}</td>
						<td>@foreach ($post->tags as $tag)
								<span class="label label-default">{{ $cate->name }}</span>
							@endforeach
							</td>
						<td><a href="{{ route('posts.show', $post->id ) }}" class="btn btn-default btn-xs">View</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection