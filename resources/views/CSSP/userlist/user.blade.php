@extends('cssp.layouts.master')

@section('content')
<br>
	<div class="row">
        <div class="col-9" style="padding-left:32px"><h2><b>รายชื่อผู้ใช้</b></h2></div>
        <div class="col-3" style="padding-left:130px;padding-bottom:16px"><a  href="/registerstaff"   class="btn btn-outline-secondary right">เพิ่มรายชื่อ</a></div>
    </div>

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
					<th>ชื่อ-นามสกุล</th>
						<th>ชื่อผู้ใช้งาน</th>
						<th>บริษัท</th>
						<th>ตำแหน่ง</th>
						<th>สถานะการใช้งาน</th>
					</tr>
				</thead>

				<tbody>
					
					@foreach ($users as $userl)
					<tr>
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
					</tr>
					@endforeach
					
				</tbody>
			</table>
		</div>
@endsection