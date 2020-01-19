@extends('cssp.layouts.master')

@section('content')
<style>
.dep tbody td a,.dep a.link,.dep a:hover,.dep a.link:hover{
	font-size:18px;
	color: #000;
}
</style>
<div class="row dep">
		<div class="col-md-8">
			<h1 style="margin:16px 0px 15px 0px"><b>แผนกในบริษัท</b></h1>
			<table class="table teble-light" style="font-size:20px">
				<thead  class="thead-dark">
					<tr style="text-align: center;">
						<th style="width:45px;">ลำดับ</th>
						<th style="width:150px;">ชื่อแผนก</th>
						<th style="width:45px;">จำนวนพนักงาน</th>
						<th>แก้ไขชื่อแผนก</th>
						<th>ลบแผนก</th>
					</tr>
				</thead>
                @if (count($departments) > 0)
				<tbody>
					@foreach ($departments as $dep)
					<tr style="text-align: center;">
                    <th>{{$dep->id}}</th>
						<td><a href="{{ route('departments.show', $dep->id) }}">{{ $dep->name}}</a></td>
						<td style="width:70px;"><a >พนักงาน {{ $dep->staff()->count() }} คน</></a></td>
						<td style="width:22%;">
							<a style="color:#F3E034;font-size:16px;" href="{{ route('departments.edit', $dep->id) }}" class="btn btn-outline-warning">แก้ไขชื่อแผนก</a>
						</td>
						<td style="width:10%;">
						{{ Form::open(['route' => ['departments.destroy', $dep->id], 'method' => 'DELETE' , 'onsubmit' => 'return confirm("ต้องการที่จะลบใช่ไหม?")' ]) }}
							{{ Form::submit('ลบแผนก', ['class' => 'btn btn-outline-danger'])}}
						{{ Form::close() }}
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