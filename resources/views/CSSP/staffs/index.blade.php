@extends('cssp.layouts.master')
 <!-- title unixdev -->
 <title> รายชื่อพนักงาน </title>
<!-- add icon link -->
<link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
@section('content')
<style>
.stf td a,.stf a.link,.stf a:hover,.stf a.link:hover{
	font-size:15px;
	color: #000;
}
.stf th{
	font-size:18px;
	color: #FFF;
}
.det{
  margin-top: 5px;
  text-align: left;
}
</style>
<br><div class="row">
	<div class="col-1"></div>
	<div class="col-5" style="padding-left:32px"><h2><b>รายชื่อพนักงาน</b></h2></div>
	<div class="col-3" style="padding-left:130px;padding-bottom:16px"><a href="/registerstaff" class="btn btn-outline-secondary right">เพิ่มรายชื่อพนักงาน</a></div>
	</div>
    <!--@if (count($staffs) > 0)
        @foreach ($staffs as $staff)
        <div class="card padding p-3">
            <h3><a href="/staffs/{{$staff->id}}">{{$staff->name}}</a></h3>
        </div>            
        @endforeach
    @else
    
        
    @endif-->

    <div class="row stf">
	<div class="col-md-1"></div>
		<div class="col-md-8">
			<table class="table  table-bordered table-hover " style="text-align:center">
				<thead class="thead-dark" >
					<tr>
						<th>ชื่อพนักงาน</th>
						<th>ตำแหน่ง</th>
						<th>แผนก</th>
						<th style="width:120px">ข้อมูลเพิ่มเติม</th>
					</tr>
				</thead>

				<tbody>
					
					@foreach ($staffs as $staff)
					
					<tr>
						
						<td><a style="font-size:16px;">{{ $staff->name }}</a></td>
						<td><a style="font-size:16px;">{{ $staff->position }}</a></td>
						<td><a style="font-size:16px">{{ optional($staff->dep)['name'] }}</a></td>
						<td><a class="btn btn-outline-info" href="{{ route('staffs.show', $staff->id ) }}">รายละเอียด</a></td>
					</tr>
					@endforeach
					
				</tbody>
			</table>
		</div>
@endsection