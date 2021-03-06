@extends('cssp.layouts.master')
 <!-- title unixdev -->
 <title> รายการขาย </title>
<!-- add icon link -->
<link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
@section('content')
<div class="row" style="margin:12px 0px 6px 28px">
    <div class="col-6"><h1>รายการขาย</h1></div>
    <div class="col-4" style="padding-left:150px;padding-bottom:20px;"><a href="/programs/create" style="font-size:16px" class="btn btn-outline-secondary">เพิ่มรายการโปรแกรมที่ขาย</a></div>
    <div class="col-2"><a href="/sales/create" class="btn btn-outline-secondary">เพิ่มรายการขาย</a> <br></div>
</div>
<!--@if (count($sales) > 0)
    @foreach ($sales as $sale)
    <div class="card padding p-3">
    <h3><a href="/sales/{{$sale->id}}">บริษัท: {{$sale->company['name']}}| โปรแกรม: {{$sale->program['name']}}</a></h3>
    </div>            
    @endforeach
@else
@endif-->

<div class="row">
        <div class="col-md-11" >
            <table class="table table-bordered table-hover" >
                <thead class="thead-dark">
                    <tr>
                        <th>ชื่อบริษัทลูกค้า</th>
                        <th style="text-align:center;">โปรแกรมที่ซื้อ</th>
                        <th style="text-align:center;">ราคาโปรแกรม</th>
                        <th style="text-align:center;">วันที่ซื้อ</th>
                        <th style="text-align:center;">เพิ่มเติม</th>
                    </tr>
                </thead>

                <tbody>
                    
                    @foreach ($sales as $sale)
                    
                    <tr>
                        <td><a href="{{ route('companies.show', $sale->company->id ) }}" class="btn btn-default btn-xs">{{ $sale->company['name'] }}</a></td>
                        <td style="text-align:center;"><a href="{{ route('programs.show', $sale->program->id ) }}" class="btn btn-default btn-xs">{{ $sale->program->name }}</a></td>
                        <td style="text-align:center;">{{$sale->program->price}} บาท</td>
                        <td style="text-align:center;">{{$solddate = date('d/m/Y', strtotime($sale->program->solddate))}}</td>
                        <td style="text-align:center;"><a href="{{ route('sales.show', $sale->id ) }}" class="btn btn-default btn-xs">เพิ่มเติม</a></td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            
        </div>
@endsection