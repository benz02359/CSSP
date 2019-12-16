@extends('cssp.layouts.master')

@section('content')

<h1>รายชื่อผู้ใช้ </h1><a href="/registerstaff" class="btn btn-primary">เพิ่มรายชื่อ</a>
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
						<th>บริษัท</th>
						<th>สถานะ</th>
					</tr>
				</thead>

				<tbody>
					
					@foreach ($users as $userl)
					<tr>
						<th></th>
						<td>{{ $userl->name }}</td>
						<td>{{$userl->username}}</td>
                        <td>{{ $userl->company['name']}}</td>
                        <td>{{ $userl->role->name}}</td>
					<td><select>
						<option value="1">ใช้งานได้</option>
						<option value="0">รออนุมัติ</option>
						<option value="2">ระงับการใช้งาน</option>
					<option value="{{$userl->approve}}" selected>{{$userl->approve}}</option>
						</select></td>
						
						<td><a href="{{ route('staffs.show', $userl->id ) }}" class="btn btn-default btn-xs">View</a></td>
					</tr>
					@endforeach
					
				</tbody>
			</table>
		</div>
@endsection