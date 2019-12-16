@extends('cssp.layouts.master')

@section('content')
<button class="btn btn-primary" onclick="goBack()" >Go Back</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<hr>
<a href="/sales/{{$sale->id}}/edit" class="btn btn-primary">แก้ไข</a>
<hr>
@foreach ($company as $c)
    <h2>บริษัทที่ซื้อ: <a href="/companies/{{$c->id}}">{{$c->name}}</a></h2>
    <h2>ที่อยู่: {{$c->address}}</h2>
    <h2>เบอร์โทรศัพท์: {{$c->tel}}</h2>
    <h2>E-mail: {{$c->email}}</h2>
@endforeach
<hr>
@foreach ($program as $p)
    <h2>ชื่อโปรแกรม: <a href="/programs/{{$p->id}}">{{$p->name}}</a></h2>
    <p>รายละเอียด: {{$p->detail}}</p>
    <p>ชื้อเมื่อ: {{$p->solddate}}</p>
    <p>วันที่เริ่ม: {{$p->startdate}}</p>
    <p>วันที่สิ้นสุด: {{$p->enddate}}</p>
@endforeach
<hr> 
    <!--<h2>รายละเอียด: {{$sale->detail}}</h2>-->
    <h2>วันที่ : {{$sale->created_at}}</h2>
<hr>
        
    {!!Form::open(['action' => ['SaleController@destroy', $sale->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection