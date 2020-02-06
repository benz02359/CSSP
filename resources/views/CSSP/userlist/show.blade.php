@extends('cssp.layouts.master')

@section('content')
<div class="row">
        <div class="col-9" style="padding-left:32px"><h2><b>รายชื่อผู้ใช้ในบริษัท {{$user->company['name']}}</b></h2></div>
        <div class="col-3" style="padding-left:130px;padding-bottom:16px"><a href="/registerstaff" class="btn btn-primary">เพิ่มรายชื่อ</a></div>
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
						<th>#</th>
						<th>ชื่อ</th>
						<th>แผนก</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
				@if(($userincom->id !== $user->id))
				@endif

					@forelse ($users as $userl)
					
					@if (( Auth::user()->company_id == $userl->company_id) and ( Auth::user()->id != $userl->id))
					
					<tr>
						<th></th>
						<td>{{$userl->name }}</td>
						<td></td>
						<td></td>
						
						
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