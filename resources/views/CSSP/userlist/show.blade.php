@extends('cssp.layouts.master')

@section('content')

<h1>รายชื่อผู้ใช้ในบริษัท {{$usercompany}}</h1><a href="/registerstaff" class="btn btn-primary">เพิ่มรายชื่อ</a>
    <!--@if (count($users) > 0)
        @foreach ($users as $user)
                  
        @endforeach
    @else
    
        
    @endif-->

    <div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>ชื่อ</th>
						<th>แผนก</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					
					@foreach ($users as $userl)
					@if (($user->company_id == $userl->company_id) &&($user->id !== $userl->id))
					<tr>
						<th></th>
						<td>{{ $userl->name }}</td>
						<td></td>
						
						<td><a href="{{ route('staffs.show', $userl->id ) }}" class="btn btn-default btn-xs">View</a></td>
					</tr>
					@endif 
					@endforeach
					
				</tbody>
			</table>
		</div>
@endsection