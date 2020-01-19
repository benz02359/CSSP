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
@foreach ($program as $p)
<div style="font-size:22px"><b>รายละเอียดของโปรแกรม {{$p->name}}</b></div>
@endforeach
<div class="row">



<div class="card" style="background-color:#f4f6f7;margin-top:10px;width:520px;margin-left:20px" >
    <div class="card-header text-white bg-dark"><a style="padding:-10px 0px -10px 0px;font-size:18px">รายละเอียดบริษัท</a></div>
    <div class="card-body">
@foreach ($company as $c)
    <p>บริษัทที่ซื้อ: <a href="/companies/{{$c->id}}">{{$c->name}}</a><br>
    ที่อยู่: {{$c->address}}<br>
    เบอร์โทรศัพท์: {{$c->tel}}<br>
    E-mail: {{$c->email}}</p>
@endforeach
</div></div>
<div class="card" style="background-color:#f4f6f7;margin-top:10px;width:520px;margin-left:20px" >
    <div class="card-header text-white bg-dark"><a style="padding:-10px 0px -10px 0px;font-size:18px">รายละเอียดโปรแกรม</a></div>
    <div class="card-body">
@foreach ($program as $p)
    <p>ชื่อโปรแกรม: <a href="/programs/{{$p->id}}">{{$p->name}}</a><br>
    รายละเอียด: {{$p->detail}}<br>
    ราคาโปรแกรม: {{$p->price}} บาท<br>
    ชื้อเมื่อ: {{$p->solddate}}<br>
    วันที่เริ่ม: {{$p->startdate}}<br>
    วันที่สิ้นสุด: {{$p->enddate}}</p>
@endforeach
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

    {!!Form::open(['action' => ['SaleController@destroy', $sale->id], 'method' => 'POST'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-outline-danger deletebtn'])}}
    {!!Form::close()!!}
</div>
@endsection