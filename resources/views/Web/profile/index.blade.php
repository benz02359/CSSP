@extends('cssp.layouts.master')
 <!-- title unixdev -->
 <title> ข้อมูลส่วนตัว </title>
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
  width: 350px;
  padding: 5px;
  text-align: center;
  margin: 0px 0px  12px -15px;
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
.det{
  margin-top: 3px;
}
</style><br>
<div class="card" style="width: 350px">
        <div class="products">
            <div class="thumbnail"><h3>รายละเอียดพนักงาน</h3></div>
            <div class="col-12" style="margin: 2px 0px 8px 0px;font-size:18px">
            <div class="det"> <b>ชื่อ:</b> {{$user->name}} </div>
            <div class="det"> <b>ขื่อผู้ใช้:</b> {{$user->username}} </div>
            <div class="det"> <b>E-mail:</b> {{$user->email}} </div>
            <div class="det"> <b>เบอร์โทรศัพท์:</b> 
            @if( !isset($user->userprofile['tel']) )
             - 
            @else 
            {{$user->userprofile['tel']}}
            @endif</div>
            <div class="det"> <b>บริษัท:</b> {{$user->company['name']}}</div>
        </div>
        <a  style="margin:0 0 10px 100px" href="/userprofile/{{$user->id}}/edit" class="btn btn-outline-warning">แก้ไขข้อมูลส่วนตัว</a>        

</div>
        @endsection