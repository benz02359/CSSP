@extends('cssp.layouts.master')
<!-- title unixdev -->
<title>รายชื่อผู้ใช้ในบริษัท$user->company['name']}}</title>
    <!-- add icon link -->
    <link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">

@section('content')
<br>
<div class="row">
        <div class="col-6" style="padding-left:32px"><h2><b>รายชื่อผู้ใช้บริษัท {{$user->company['name']}}</b></h2></div>
        <div class="col-3" style="padding-left:30px;padding-bottom:16px"><a href="/registeruser" class="btn btn-outline-secondary">เพิ่มรายชื่อ</a></div>
    </div>
    <!--@if (count($users) > 0)
        @foreach ($users as $user)
                  
        @endforeach
    @else
    
        
    @endif-->

    <div class="row">
		<div class="col-md-6">
			<table class="table table-hover ">
				<thead class="thead-dark" style="text-align:center">
					<tr>
						<th style="padding-left: 5px">ชื่อ</th>
						<th style="width: 47%">สถานะการใช้งาน</th>
					</tr>
				</thead>

				<tbody class="table-bordered ">
				@if(($userincom->id !== $user->id))
				@endif

					@forelse ($users as $userl)
					
					@if (( Auth::user()->company_id == $userl->company_id) and ( Auth::user()->id != $userl->id))
					
					<tr>
						<td>{{$userl->name }}</td>
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
						{{ Form::submit('อัพเดท', ['class' => 'btn btn-outline-success']) }}
						{{ Form::close() }}</h5></td>
						
						
						<!--<td><a href="{{ route('staffs.show', $userl->id ) }}" class="btn btn-default btn-xs">View</a></td>-->
					</tr>
					@endif 
					
					@empty

					@endforelse
				
				</tbody>
			</table>
		</div>
    </div>
@endsection