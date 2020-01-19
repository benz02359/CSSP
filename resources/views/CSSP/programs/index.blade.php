@extends('cssp.layouts.master')

@section('content')
<style>
.a_program, .a_program:hover{
    font-size:20px;
    color: #000;
}
</style>

<br><div class="row">
	<div class="col-9" style="padding-left:32px"><h1><b>รายการโปรแกรมและบริษัทที่ซื้อ</b></h1></div>
	<div class="col-3" style="padding-left:90px;padding-bottom:20px;"><a href="/programs/create" style="font-size:20px" class="btn btn-outline-secondary">เพิ่มรายการโปรแกรมที่ขาย</a></div>
	</div>
    <!--@if (count($programs) > 0)
        @foreach ($programs as $pro)
        <div class="card padding p-3">
            <h3><a href="/programs/{{$pro->id}}">{{$pro->name}}</a></h3>
        </div>            
        @endforeach
    @else
    @endif-->

    
    <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered" style="background-color: white;" >
                    <thead class="table table-bordered table-dark" style="text-align:center;">
                        <tr style="font-size:20px">
                            <th>ชื่อโปรแกรม</th>
                            <th>บริษัทที่เป็นเจ้าของ</th>
                            <th>วันที่ซื้อโปรแกรม</th>
                            <th>วันที่เริ่มดูแล</th>
                            <th>วันสิ้นสุด</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        
                        @foreach ($programs as $pro)
                        
                        <tr>
                            <td><a class="a_program" href="{{ route('programs.show', $pro->id ) }}" class="btn btn-default btn-xs">{{ $pro->name }}</a></td>            
                            <td><a class="a_program" href="{{ route('companies.show', $pro->company->id ) }}" class="btn btn-default btn-xs">{{ $pro->company->name }}</a></td>
                            <td style="text-align:center;">{{$solddate = date('d F', strtotime($pro->solddate))}} {{$solddate = date("Y",strtotime($pro->solddate))+543}}</td>
                            <td style="text-align:center;">{{$startdate = date('d F', strtotime($pro->startdate))}} {{$solddate = date("Y",strtotime($pro->solddate))+543}}</td>
                            <td style="text-align:center;">{{$enddate = date('d F', strtotime($pro->enddate))}} {{$solddate = date("Y",strtotime($pro->solddate))+543}}</td>
                            <!--<td><a href="{{ route('programs.show', $pro->id ) }}" class="btn btn-default btn-xs">View</a></td>-->
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
    
@endsection