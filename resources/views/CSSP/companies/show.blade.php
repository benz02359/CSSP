@extends('cssp.layouts.master')
 <!-- title unixdev -->
 <title> ข้อมูลของบริษัท{{$company->name}} </title>
<!-- add icon link -->
<link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
@section('content')
<style>

.card {
  background: white;
  margin: 30px 30px;
  border-radius: 12px;
  box-sizing: border-box;
  padding: 0px 15px 0px 15px;
  max-width: 600px;
  max-height: null;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.thumbnail {
  background-color: #343A40;
  color:#FFF;
  width: 500px;
  padding: 5px;
  text-align: center;
  margin: 0px 0px  25px -15px;
  border-radius: 12px 12px 0px 0px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.title {
  margin-top: -150px;
  padding: 5px;
  color: #FFF;
  font-size: 28px;
  margin-top: 20px;
}
.description {
  margin: 0 0 (gutters * 2);
}
p{
  margin-top: -10px;
  font-size: 18px;
}
</style>
<!--<button class="btn btn-primary" onclick="goBack()" {{ url()->previous() }}>Go Back</button>-->
<br>
<div class="card" style="width: 500px">
    <div class="products">
        <div class="thumbnail"><h3>ข้อมูลบริษัท{{$company->name}}</h3></div>

    <p>ชื่อ: {{$company->name}}</p>
    <p>ที่อยู่: {{$company->address}}</p>
    <p>เบอร์โทรศัพท์: {{$company->tel}}</p>
    <p>E-mail: {{$company->email}}</p>
    
    <a href="/companies/{{$company->id}}/edit" class="btn btn-warning">แก้ไข</a> <a href="/companies/{{$company->id}}/editp" class="btn btn-info">เพิ่มรายการโปรแกรมที่ขาย</a>   

        
        {!!Form::open(['action' => ['CompanyController@destroy', $company->id], 'method' => 'POST', 'class' => 'float-right', 'onsubmit' => 'return confirm("ต้องการที่จะลบใช่ไหม?")'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('ลบ', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
    </div>
</div>
@endsection