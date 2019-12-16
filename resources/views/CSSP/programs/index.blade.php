@extends('cssp.layouts.master')

@section('content')
<a href="/programs" class="btn btn-primary">Back</a>
    <h1>โปรแกรม</h1><a href="/programs/create" class="btn btn-primary">เพิ่มรายการโปรแกรมที่ขาย</a>
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
                <table class="table" style="background-color: white " >
                    <thead>
                        <tr>
                            <th>ชื่อโปรแกรม</th>
                            <th>คำอธิบาย</th>
                            <th>บริษัทที่เป็นเจ้าของ</th>
                            <th>วันที่เริ่มดูแล</th>
                            <th>วันสิ้นสุด</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        
                        @foreach ($programs as $pro)
                        
                        <tr>
                            <td><a href="{{ route('programs.show', $pro->id ) }}" class="btn btn-default btn-xs">{{ $pro->name }}</a></td>
                            <td>{{$pro->detail}}</td>
                            <td><a href="{{ route('companies.show', $pro->company->id ) }}" class="btn btn-default btn-xs">{{ $pro->company->name }}</a></td>
                            <td>{{$solddate = date('d F Y', strtotime($pro->solddate))}}</td>
                            <td>{{$startdate = date('d F Y', strtotime($pro->startdate))}}</td>
                            <td>{{$enddate = date('d F Y', strtotime($pro->enddate))}}</td>
                            <!--<td><a href="{{ route('programs.show', $pro->id ) }}" class="btn btn-default btn-xs">View</a></td>-->
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
    
@endsection