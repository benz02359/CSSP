@extends('cssp.layouts.master')
 <!-- title unixdev -->
 <title> ข้อมูลของโปรแกรม{{$program->name}} </title>
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
  max-width: 650px;
  max-height: null;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.thumbnail {
  background-color: #343A40;
  color:#FFF;
  width: 650px;
  padding: 7px;
  text-align: center;
  margin: 0px 0px  12px -15px;
  border-radius: 12px 12px 0px 0px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}
.thumbnails,.thumbnails > a:visited{
  background-color: #343A40;
  color:#FFF;
  width: 650px;
  padding: 9px;
  margin: 0px 0px  0px -15px;
  border-radius: 0px 0px 12px 12px ;
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
</style>
<br>
<div class="card" style="width: 650px">
        <div class="products">
            <div class="thumbnail"><h3>รายละเอียดโปรแกรม  {{$program->name}}</h3></div>
    <p>รายละเอียด: {{$program->detail}}</p>
    <p>ราคา: {{$program->price}} บาท</p>
    <p>ซื้อเมื่อ: {{$program->solddate}}</p>
    <p>วันที่เริ่ม: {{$program->startdate}}</p>
    <p>วันที่สิ้นสุด: {{$program->enddate}}</p>

<p  class="thumbnails"  style="font-size:17px">โปรแกรม {{$program->name}} เป็นของบริษัท
@foreach ($company as $com)
    <a href="{{ route('companies.show', $com->id ) }}">{{$com->name}}</a> </p>
@endforeach

   </div> 
</div> 
   
 <div class="row" style="width: 650px;margin: 0 auto;font-size: 20px">   
        <a style="height: 35px" href="/programs/{{$program->id}}/edit" class="btn btn-outline-info">แก้ไข</a>

        {!!Form::open(['action' => ['ProgramController@destroy', $program->id], 'method' => 'POST', 'class' => 'float-right', 'onsubmit' => 'return confirm("ต้องการที่จะลบโปรแกรม" $program->name" ใช่ไหม?")'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('ลบโปรแกรม', ['class' => 'btn btn-outline-danger'])}}
        {!!Form::close()!!}
 </div> 
@endsection