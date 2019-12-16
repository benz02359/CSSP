@extends('cssp.layouts.master')

@section('content')
 
<div class="row">
		<div class="col-md-8">
			<h1>แท็ก</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>ชื่อแผนก</th>
					</tr>
				</thead>
                @if (count($departments) > 0)
				<tbody>
					@foreach ($departments as $dep)
					<tr>
                    <th>{{$dep->id}}</th>
						<td><a href="{{ route('departments.show', $dep->id) }}">{{ $dep->name}}</a></td>
						<td style="width:10%">
							<a href="{{ route('departments.edit', $dep->id) }}" class="btn btn-primary pull-right btn-block">Edit</a>
						</td>
						<td style="width:10%">
						{{ Form::open(['route' => ['departments.destroy', $dep->id], 'method' => 'DELETE' , 'onsubmit' => 'return confirm("ต้องการที่จะลบใช่ไหม?")' ]) }}
							{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])}}
						{{ Form::close() }}
						</td>
					</tr>
					
						
					
					
					
					@endforeach
                </tbody>
                @endif
			</table>
		</div> <!-- end of .col-md-8 -->

		<div class="col-md-3">
			<div class="well">
				{!! Form::open(['action' => 'DepartmentController@store', 'method' => 'POST']) !!}
					<h2>เพิ่มแผนก</h2>
					{{ Form::label('name', 'ชื่อแผนก:') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}

					{{ Form::submit('เพิ่มแผนกใหม่', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection

<script>
		$(".Delete").on("submit", function(){
			return confirm("Do you want to delete this item?");
		});
	</script>