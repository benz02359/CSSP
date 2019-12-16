@extends('cssp.layouts.master')

@section('content')

<div class="row">
		<div class="col-md-8">
			<h1>หมวดหมู่</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>ชื่อหมวด</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($categories as $category)
					<tr>
						<th>{{ $category->id }}</th>
						<td><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of .col-md-8 -->

		<div class="col-md-3">
			<div class="well">
				{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
					<h2>หมวดหมู่ใหม่</h2>
					{{ Form::label('name', 'ชื่อหมวดหมู่:') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}

					{{ Form::submit('สร้างหมวดหมู่ใหม่', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>

    
@endsection