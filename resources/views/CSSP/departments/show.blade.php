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
			<h1>{{ $dep->name }} พนักงาน <small>{{ $dep->staff()->count() }} คน</small></h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('departments.edit', $dep->id) }}" class="btn btn-primary pull-right btn-block" style="margin-top:20px;">Edit</a>
		</div>
		<div class="col-md-2">
			{{ Form::open(['route' => ['departments.destroy', $dep->id], 'method' => 'DELETE']) }}
				{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'style' => 'margin-top:20px;']) }}
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
						<th></th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					
					@foreach ($dep->staff as $staff)
					
					<tr>
						<th>{{ $staff->id }}</th>
						<td>{{ $staff->name }}</td>
						
						<td><a href="{{ route('staffs.show', $staff->id ) }}" class="btn btn-default btn-xs">View</a></td>
					</tr>
					@endforeach
					
				</tbody>
			</table>
		</div>
	</div>
@endsection