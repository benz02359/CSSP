@extends('cssp.layouts.master')

@section('content')
<style>
.example_hq {
    color: #494949 !important;
    text-transform: uppercase;
    text-decoration: none;
    margin-left: 100px;
    padding: 2px 35px 2px 35px;
    margin-top: 15px;
    color: #d3be00;

    border: 4px solid #f3e034 !important;
    display: inline-block;
    transition: all 0.4s ease 0s;
}
.example_hq:hover {
    color: #212529;
    background-color: #f3e034;
    border-color: #f3e034;
    transition: all 0.4s ease 0s;
}
button a:hover,button a:link{
    text-decoration: none;
    color: black;
}
    </style>
    <br>
<img style="margin-left:250px;width:130px;"
        src="<?php echo asset('assets/img/unixdevlogo.png'); ?>" >
<br>
<br>
    <h4>ชื่อ: {{$hq->name}}</h4>
    <h4>ที่อยู่: {{$hq->address}}</h4>
    <h4>เบอร์โทรศัพท์: {{$hq->tel}}</h4>
    <h4>E-mail: {{$hq->email}}</h4>
    <button class="button_cont example_hq"><a  href="/hq/{{1}}/edit" >แก้ไข</a></button>

    

@endsection