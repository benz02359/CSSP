@extends('cssp.layouts.master')

@section('content')
<h1>รายการขาย</h1><a href="/sales/create" class="btn btn-primary">เพิ่มรายการ</a>
<!--@if (count($sales) > 0)
    @foreach ($sales as $sale)
    <div class="card padding p-3">
    <h3><a href="/sales/{{$sale->id}}">บริษัท: {{$sale->company['name']}}| โปรแกรม: {{$sale->program['name']}}</a></h3>
    </div>            
    @endforeach
@else
@endif-->

<div class="row">
        <div class="col-md-12">
            <table class="table" style="background-color: white " >
                <thead>
                    <tr>
                        <th>ชื่อบริษัทลูกค้า</th>
                        <th>โปรแกรมที่ซื้อ</th>
                        <th>คำอธิบายโปรแกรม</th>
                        <th>ราคาโปรแกรม</th>
                        <th>วันที่ซื้อ</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    
                    @foreach ($sales as $sale)
                    
                    <tr>
                        <td><a href="{{ route('companies.show', $sale->company->id ) }}" class="btn btn-default btn-xs">{{ $sale->company['name'] }}</a></td>
                        <td><a href="{{ route('programs.show', $sale->program->id ) }}" class="btn btn-default btn-xs">{{ $sale->program['name'] }}</a></td>
                        <td>{{$sale->program->detail}}</td>
                        <td>{{$sale->program->price}} บาท</td>
                        <td>{{$solddate = date('d F Y', strtotime($sale->program->solddate))}}</td>
                        <td><a href="{{ route('sales.show', $sale->id ) }}" class="btn btn-default btn-xs">View</a></td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
@endsection