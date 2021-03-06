@extends('cssp.layouts.master')
   <!-- title unixdev -->
   <title>แผนกในบริษัท</title>
    <!-- add icon link -->
    <link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
@section('content')
<style>
.dep tbody td a,.dep a.link,.dep a:hover,.dep a.link:hover{
	font-size:18px;
	color: #000;
}
</style>
<div class="row dep">
	<div class="col-md-1"></div>
		<div class="col-md-6">
			<h2 style="margin:16px 0px 15px 0px"><b>แผนกในบริษัท</b></h2>
			<table class="table teble-light table-hover" style="font-size:17px">
				<thead  class="thead-dark">
					<tr>
						<th style="width:100px;">ชื่อแผนก</th>
						<th style="width:120px;text-align:center;">จำนวนพนักงาน</th>
						<th>ลบแผนก</th>
					</tr>
				@if (count($departments) > 0)
				<tbody>
					@foreach ($departments as $dep) 
			
						<td><a href="{{ route('departments.show', $dep->id) }}">{{ $dep->name}}</a></td>
						<td style="width:100px;text-align:center;"><a>พนักงาน {{ $dep->staff()->count() }} คน</></a></td>
					
						<td style="width:10%;font-size:14px;margin:-5px 0px -20px 0px;text-align: center;">
						@if(count($dep->staff) > 0)
						{{ Form::open(['route' => ['departments.destroy', $dep->id], 'method' => 'DELETE' , 'onsubmit' => 'return confirm("ต้องการที่จะลบใช่ไหม?")' ]) }}
							{{ Form::submit('ลบแผนก', ['class' => 'btn btn-danger', 'disabled'])}}
						{{ Form::close() }}
						@elseif(count($dep->staff) < 1)
						{{ Form::open(['route' => ['departments.destroy', $dep->id], 'method' => 'DELETE' , 'onsubmit' => 'return confirm("ต้องการที่จะลบใช่ไหม?")' ]) }}
							{{ Form::submit('ลบแผนก', ['class' => 'btn btn-danger'])}}
						{{ Form::close() }}
						@endif
						</td>
					</tr>
					
						
					
					
					
					@endforeach
                </tbody>
                @endif
			</table>
		</div> <!-- end of .col-md-8 -->
		<div style="width:30px"> </div>
		<div class="col-md-3" style="text-align:center;">
			<div class="well">
				<br>
				{!! Form::open(['action' => 'DepartmentController@store', 'method' => 'POST']) !!}
					<h2>เพิ่มแผนก</h2>
					{{ Form::text('name', null, ['class' => 'form-control','placeholder' => 'ชื่อแผนก']) }}

					{{ Form::submit('เพิ่มแผนกใหม่', ['class' => 'btn btn-outline-info btn-block fz btn-h1-spacing']) }}
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection

<script>
		$(".Delete").on("submit", function(){
			return confirm("Do you want to delete this item?");
		});
	</script>