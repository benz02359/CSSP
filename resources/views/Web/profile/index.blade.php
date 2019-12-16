@extends('cssp.layouts.master')

@section('content')
<a href="/" class="btn btn-primary">Back</a>
<hr>
    <p>ชื่อ-นามสกุล: {{$user->name}}</p>
    <p>ขื่อผู้ใช้: {{$user->username}}</p>
    <p>E-mail: {{$user->email}}</p>
    <p>เบอร์โทรศัพท์: {{$user->userprofile['tel']}}</p>
    <p>บริษัท: {{$user->company['name']}}</p>
    
    <hr>
    <hr>
        <a href="/userprofile/{{$user->id}}/edit" class="btn btn-primary">Edit</a>        
@endsection