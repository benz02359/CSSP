@extends('cssp.layouts.master')

@section('content')
<style>
p{
    font-size:18px;
}
a:link{
    color:black;
}
</style>

<br>
<div style="font-size:22px"><b>รายละเอียดของการขายโปรแกรม {{$program->name}}</b></div>
<div class="row">



<div class="card" style="background-color:#f4f6f7;margin-top:10px;width:520px;margin-left:20px" >
    <div class="card-header text-white bg-dark"><a style="padding:-10px 0px -10px 0px;font-size:18px">รายละเอียดบริษัท</a></div>
    <div class="card-body">
    <p>บริษัทที่ซื้อ: <a href="/companies/{{$company->id}}">{{$company->name}}</a><br>
    ที่อยู่: {{$company->address}}<br>
    เบอร์โทรศัพท์: {{$company->tel}}<br>
    E-mail: {{$company->email}}</p>
</div></div>
<div class="card" style="background-color:#f4f6f7;margin-top:10px;width:520px;margin-left:20px" >
    <div class="card-header text-white bg-dark"><a style="padding:-10px 0px -10px 0px;font-size:18px">รายละเอียดโปรแกรม</a></div>
    <div class="card-body">
    <p>ชื่อโปรแกรม: <a href="/programs/{{$program->id}}">{{$program->name}}</a><br>
    รายละเอียด: {{$program->detail}}<br>
    ราคาโปรแกรม: {{$program->price}} บาท<br>
    ชื้อเมื่อ: {{$program->solddate}}<br>
    วันที่เริ่ม: {{$program->startdate}}<br>
    วันที่สิ้นสุด: {{$program->enddate}}</p>
    <!--<h2>รายละเอียด: {{$sale->detail}}</h2>-->
    <!--<p>วันที่ : {{$sale->created_at}}</p>-->
</div></div></div>
<br>
<style>
.deletebtn{
    font-size:18px;
    margin-left:10px;
}
.editbtn{
    font-size:18px;
    margin-left:450px;
}
</style>
<div class="row">
<a href="/sales/{{$sale->id}}/edit" class="btn btn-outline-warning editbtn">แก้ไข</a>

    {!!Form::open(['action' => ['SaleController@destroy', $sale->id], 'method' => 'POST', 'onsubmit' => 'return confirm("ต้องการที่จะลบใช่ไหม?")'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-outline-danger deletebtn'])}}
    {!!Form::close()!!}
</div>
@endsection