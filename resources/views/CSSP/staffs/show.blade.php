@extends('cssp.layouts.master')
<style>
body{
    background-image: src="<?php echo asset('assets/img/logofull.png'); ?>";
}
</style>
@section('content')
<button style="margin:15px 0px 20px 0px" class="btn btn-outline-warning" onclick="goBack()" >Go Back</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<h1>รายละเอียดพนักงาน</h1>
<div class="row">
    <div class="col-10"> <style>p{margin-left:20px;font-size:20px;}</style>
        <p>ชื่อ: {{$staff->name}}</p>
        <p>E-mail: {{$staff->email}}</p>
        <p>เบอร์โทรศัพท์: {{$staff->tel}}</p>
        <p>ภาษาที่ใช้: {{$staff->language}}</p>
        <p>ตำแหน่ง: {{$staff->position}}</p>
        @foreach ($deps as $dep)
        <p>แผนก: {{$dep->name}}</p>
        @endforeach
    </div>
</div>
<div class="row"div>
    <div style="margin-left:60px;margin-right:15px">   <a href="/staffs/{{$staff->id}}/edit" class="btn btn-outline-info">Edit</a></div> 
    <div>    {!!Form::open(['action' => ['StaffController@destroy', $staff->id], 'method' => 'POST', 'class' => 'float-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
        {!!Form::close()!!}
    </div>
</div>
@endsection