@extends('cssp.layouts.master')
 <!-- title unixdev -->
 <title> ข้อมูลของ {{$staff->name}} </title>
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
</style>
    <div class="card" style="width: 350px">
        <div class="products">
            <div class="thumbnail"><h3>รายละเอียดพนักงาน</h3></div>
                <div class="col-12" style="margin: 2px 0px 8px 0px;font-size:18px">
                <div class="det"> <b>ชื่อ:</b> {{$staff->name}} </div>
                <div class="det"> <b>E-mail:</b> {{$staff->email}} </div>
                <div class="det"> <b>เบอร์โทรศัพท์:</b> {{$staff->tel}} </div>
                <div class="det"> <b>ภาษาที่ใช้:</b> {{$staff->language}} </div>
                <div class="det"> <b>ตำแหน่ง:</b> {{$staff->position}} </div>
                @foreach ($deps as $dep)
                <div class="det"> <b>แผนก:</b> {{$dep->name}}</div>
                @endforeach
                </div>

                <div class="row">

            <div style="margin-left:90px;margin-right:15px;padding-bottom:10px;">   <a href="/staffs/{{$staff->id}}/edit" class="btn btn-outline-info">แก้ไข</a></div> 
                <div>    
                  <!--{!!Form::open(['action' => ['StaffController@destroy', $staff->id], 'method' => 'POST', 'class' => 'float-right', 'onsubmit' => 'return confirm("ต้องการที่จะลบข้อมูลพนักงานนี้ใช่หรือไม่?")'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('ลบพนักงาน', ['class' => 'btn btn-outline-danger'])}}
                      
                    {!!Form::close()!!}-->
                    @if(count($staff->posts) > 0)
                    {{ Form::open(['action' => ['StaffController@destroy', $staff->id], 'method' => 'DELETE' , 'onsubmit' => 'return confirm("ต้องการที่จะลบข้อมูลพนักงานนี้ใช่หรือไม่?")' ]) }}
                      {{ Form::submit('ลบพนักงาน', ['class' => 'btn btn-danger', 'disabled'])}}
                    {{ Form::close() }}
                    @elseif(count($staff->posts) < 1)
                    {{ Form::open(['action' => ['StaffController@destroy', $staff->id], 'method' => 'DELETE' , 'onsubmit' => 'return confirm("ต้องการที่จะลบข้อมูลพนักงานนี้ใช่หรือไม่?")' ]) }}
                      {{ Form::submit('ลบพนักงาน', ['class' => 'btn btn-danger'])}}
                    {{ Form::close() }}
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection