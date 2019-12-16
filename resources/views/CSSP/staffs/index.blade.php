@extends('cssp.layouts.master')

@section('content')

    <h1>พนักงาน</h1><a href="/registerstaff" class="btn btn-primary">เพิ่มรายชื่อ</a>
    <!--@if (count($staffs) > 0)
        @foreach ($staffs as $staff)
        <div class="card padding p-3">
            <h3><a href="/staffs/{{$staff->id}}">{{$staff->name}}</a></h3>
        </div>            
        @endforeach
    @else
    
        
    @endif-->

    <div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Departments</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					
					@foreach ($staffs as $staff)
					
					<tr>
						<th>{{ $staff->id }}</th>
						<td>{{ $staff->name }}</td>
						<td>{{ $staff->dep['name'] }}</td>
						
						<td><a href="{{ route('staffs.show', $staff->id ) }}" class="btn btn-default btn-xs">View</a></td>
					</tr>
					@endforeach
					
				</tbody>
			</table>
		</div>
@endsection