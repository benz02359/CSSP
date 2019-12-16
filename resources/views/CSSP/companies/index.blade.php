@extends('cssp.layouts.master')

@section('content')
    <h1>บริษัท</h1><a href="/companies/create" class="btn btn-primary">เพิ่มบริษัทลูกค้า</a>
    <!--@if (count($companies) > 0)
        @foreach ($companies as $company)
        <div class="card padding p-3">
            <h3><a href="/companies/{{$company->id}}">{{$company->name}}</a></h3>
        </div>            
        @endforeach
    @else
    @endif-->

    <div class="row">
		<div class="col-md-12">
			<table class="table" style="background-color: white " >
				<thead>
					<tr>
						<th width='50%'>ชื่อบริษัท</th>
						<th width='50%'>โปรแกรม</th>
						
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
						<td rowspan="{{$rowspan}}"><a href="{{ route('companies.show', $com->id ) }}">{{$com->name }}</a><br/> ที่อยู่: {{ $com->address }}<br/> เบอร์โทร: {{ $com->tel }}<br/> E-mail: {{ $com->email }}</td>
						
						
						@foreach($com->program as $pro)
						@php
						$count += 1
						@endphp
						<td><a href="{{ route('programs.show', $pro->id ) }}" >{{$count}}: {{$pro->name}}</a></td>	
						</tr><tr>					
						@endforeach	
					</tr>	
					@endforeach
					
				</tbody>
			</table>
		</div>
    
@endsection