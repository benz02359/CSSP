@extends('cssp.layouts.master')
   <!-- title unixdev -->
   <title>รายชื่อผู้ใช้งานทั้งหมด</title>
    <!-- add icon link -->
    <link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
@section('content')
<br>
	<div class="row">
        <div class="col-9" style="padding-left:32px"><h2><b>รายชื่อผู้ใช้ทั้งหมดในระบบ</b></h2></div>
        <div class="col-3" style="padding-left:130px;padding-bottom:16px"></div>
    </div>

    <!--@if (count($users) > 0)
        @foreach ($users as $user)
                  
        @endforeach
    @else
    
        
    @endif-->

    <div class="row">
		<div class="col-md-11">
		<table class="table  table-bordered table-hover " >
				<thead class="thead-dark" style="text-align:center">
					<tr>
					<th>ชื่อ-นามสกุล</th>
						<th>ชื่อผู้ใช้งาน</th>
						<th>บริษัท</th>
						<th>ตำแหน่ง</th>
						<th>สถานะการใช้งาน</th>
					</tr>
				</thead>

				<tbody>
				@if(count($users) >0)
					@foreach ($users as $userl)
					
					<tr>
						<td>{{ $userl->name }}</td>
						<td>{{$userl->username}}</td>
                        <td>{{ $userl->company['name']}}</td>
						<td style="text-align:center">{{ $userl->role->name}}</td>
					{{ Form::open( ['action' => ['UserController@updateapprove',$userl->id], 'method' => "PUT"]) }}
					<td style="text-align:center"><select name="approve" id="approve">

						<option value="1">ใช้งานได้</option>
						<option value="0">รออนุมัติ</option>
						<option value="2">ระงับการใช้งาน</option>
						<option value="{{$userl->approve}}" selected>
						
							@if($userl->approve == 0)
								รออนุมัติ
							
							@elseif($userl->approve == 1)
								ใช้งานได้
							
							@elseif($userl->approve == 2)
								ระงับการใช้งาน
							
							@endif
						</option>
						</select>
						<!--<input id="approve" type="hidden" name="approve" value="">-->
						{{ Form::submit('อัพเดท', ['class' => 'btn btn-success']) }}
						{{ Form::close() }}</h5>
					</td>
					
					</tr>
					
					@endforeach
					@else
					ไม่มีผู้ใช้งาน
					@endif
				</tbody>
			</table>
		</div>
@endsection