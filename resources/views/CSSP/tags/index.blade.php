@extends('cssp.layouts.master')

@section('content')
 
<div class="row">
		<div class="col-md-8">
			<h1>แท็ก</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>ชื่อแท็ก</th>
					</tr>
				</thead>
                @if (count($tags) > 0)
				<tbody>
					@foreach ($tags as $tag)
					<tr>
                    <th>{{$tag->id}}</th>
						<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name}}</a></td>
					</tr>
					@endforeach
                </tbody>
                @endif
			</table>
		</div> <!-- end of .col-md-8 -->

		<div class="col-md-3">
			<div class="well">
				{!! Form::open(['action' => 'TagController@store', 'method' => 'POST']) !!}
					<h2>แท็กใหม่</h2>
					{{ Form::label('name', 'ชื่อแท็ก:') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}

					{{ Form::submit('สร้างแท็กใหม่', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection