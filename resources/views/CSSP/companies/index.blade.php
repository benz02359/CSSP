@extends('cssp.layouts.master')
 <!-- title unixdev -->
 <title> รายชื่อบริษัทและโปรแกรม </title>
<!-- add icon link -->
<link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
@section('content')
<style>
.com a:link,.com td a.link,.com td a.link:hover,.com td,a:visited{
	font-size:14px;
	color:#000;
}
</style>

<div class="row" style="margin:12px 0px 6px 28px">
	<div class="col-8" style="font-size:28px"><b>รายชื่อบริษัทและโปรแกรม</b></div>
	<div class="col-2"><a style="margin-left:30px" href="/companies/create" class="btn btn-outline-secondary">เพิ่มบริษัทลูกค้า</></a></div>
</div>   
		 <!--@if (count($companies) > 0)
        @foreach ($companies as $company)
        <div class="card padding p-3">
            <h3><a href="/companies/{{$company->id}}">{{$company->name}}</a></h3>
        </div>            
        @endforeach
    @else
    @endif-->

    <div class="row com" style="margin-left:35px">
		<div class="col-md-10">
			<table class="table table-bordered" style="background-color: white " >
				<thead class="thead-dark" style="font-size:20px">
					<tr>
						<th width='67%'>ชื่อบริษัท</th>
						<th width='33%'>โปรแกรม</th>
						
					</tr>
				</thead>

				<tbody>
					@php
					$row = 0;
					$rowspan = 0;
					$count = 0;
					@endphp

					@foreach ($companies as $com )
					
					<tr>
						@php
						$count = 0;
						$rowspan = count($com->program);
						@endphp
						<td rowspan="{{$rowspan}}"><a style="font-size:19px;" href="{{ route('companies.show', $com->id ) }}">{{$com->name }}</a><br/> ที่อยู่: {{ $com->address }}<br/> เบอร์โทร: {{ $com->tel }}<br/> E-mail: {{ $com->email }}</td>
						
						
						@foreach($com->program as $pro)
						@php
						$count += 1
						@endphp
						<td><a style="padding-left:1px;font-size:16px" href="{{ route('programs.show', $pro->id ) }}" >{{$count}}. {{$pro->name}}</a></td>	
						</tr><tr>					
						@endforeach	
					</tr>	
					@endforeach
					
				</tbody>
			</table>
		</div>
    
@endsection