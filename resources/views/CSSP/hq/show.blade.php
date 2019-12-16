@extends('cssp.layouts.master')

@section('content')
<hr>
<a href="/hq/{{1}}/edit" class="btn btn-primary">แก้ไข</a>
    <h1>ชื่อ: {{$hq->name}}</h1>
    <h1>ที่อยู่: {{$hq->address}}</h1>
    <h1>เบอร์โทรศัพท์: {{$hq->tel}}</h1>
    <h1>E-mail: {{$hq->email}}</h1>
    
    
<hr>
@endsection