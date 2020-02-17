@extends('cssp.layouts.master')
   <!-- title unixdev -->
   <title>แผนก{{ $dep->name }} </title>
    <!-- add icon link -->
    <link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
@section('content')
<br>
<button class="btn btn-outline-warning" onclick="goBack()" >Go Back</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<div class="row" style="margin-left: 20px;">
		<div class="col-md-7" style="margin-top:19px;" >
			<h2>แผนก{{ $dep->name }} มีพนักงาน {{ $dep->staff()->count() }} คน</h2>
		</div>
		<div class="col-md-2">
			<!-- Button trigger modal -->
			<button style="color:#c9a44e;font-size:16px;margin-top:19px;" class="btn btn-warning pull-right btn-block" data-toggle="modal"
							data-target="#exampleModal"  data-id="$dep->id" id="link_modal">
								แก้ไขชื่อแผนก
							</button>

							<!-- Modal -->
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
								<div class="modal-header" style="height:55px;background-color:#343A40;color:#FFF">
									<h5 class="modal-title" id="exampleModalLabel">แก้ไขชื่อแผนก</h5>
									</button>
								</div>
								
								<div class="modal-body">
								{{ Form::model($dep, ['route' => ['departments.update', $dep->id], 'method' => "PUT"]) }}
								{{ Form::text('name', null, ['class' => 'form-control']) }}
								</div>
								{{ Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' => 'margin:-20px 200px 10px 180px;']) }}
								{{ Form::close() }}
							</div>
							</div>

		</div></div>
		<div class="col-md-2">
			<!--{{ Form::open(['route' => ['departments.destroy', $dep->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("ต้องการที่จะลบใช่ไหม?")']) }}
				{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'style' => 'margin-top:20px;']) }}
			{{ Form::close() }}-->
			@if(count($dep->staff) > 0)
						{{ Form::open(['route' => ['departments.destroy', $dep->id], 'method' => 'DELETE' , 'onsubmit' => 'return confirm("ต้องการที่จะลบใช่ไหม?")' ]) }}
							{{ Form::submit('ลบแผนก', ['class' => 'btn btn-danger', 'disabled', 'style' => 'margin-top:20px;'])}}
						{{ Form::close() }}
						@elseif(count($dep->staff) < 1)
						{{ Form::open(['route' => ['departments.destroy', $dep->id], 'method' => 'DELETE' , 'onsubmit' => 'return confirm("ต้องการที่จะลบใช่ไหม?")' ]) }}
							{{ Form::submit('ลบแผนก', ['class' => 'btn btn-danger', 'style' => 'margin-top:20px;'])}}
						{{ Form::close() }}
						@endif
		</div>
	</div>

	<div class="row">
		<div class="col-md-7">
			<table class="table teble-light table-hover">
				<thead  class="thead-dark">
					<tr>
						<th>ชื่อ-นามสกุล</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					
					@foreach ($dep->staff as $staff)
					
					<tr>
						<td>{{ $staff->name }}</td>
						<td><a href="{{ route('staffs.show', $staff->id ) }}" class="btn btn-default btn-xs">View</a></td>
					</tr>
					@endforeach
					
				</tbody>
			</table>
		</div>
	</div>
@endsection