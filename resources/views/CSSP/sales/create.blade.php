@extends('cssp.layouts.master')

@section('content')
<br>
<a style="font-size:27px;"><b>เพิ่มรายการขาย</b></a>
{!! Form::open(['action' => 'SaleController@store', 'method' => 'POST']) !!}
<div class="row">

<div class="card" style="background-color:#f4f6f7;margin-top:10px;width:520px;" >
<div class="card-header text-white bg-dark"><a style="padding:-10px 0px -10px 0px;font-size:18px">บริษัท</a></div>
    <div class="card-body">
    <div class="form-group">
        {{Form::label('namecompany', 'ชื่อบริษัท')}}
        {{Form::text('namecompany','',['class' => 'form-control','placeholder' => 'ชื่อบริษัท'])}}
    </div>
    <div class="form-group">
            {{Form::label('email', 'E-mail')}}
            {{Form::text('cemail','',['class' => 'form-control','placeholder' => 'E-mail'])}}
        </div>
    <div class="form-group">
        {{Form::label('tel', 'เบอร์โทรศัพท์')}}
        {{Form::text('tel','',['class' => 'form-control','placeholder' => 'เบอร์โทรศัพท์'])}}
    </div>
    <div class="form-group">
        {{Form::label('address', 'ที่อยู่')}}
        {{Form::textarea('address','',['class' => 'form-control','placeholder' => 'ที่อยู่'])}}
    </div>
    </div>
    </div>
    
    <div class="card" style="background-color:#f4f6f7;margin-top:10px;width:520px;margin-left:20px" >
    <div class="card-header text-white bg-dark"><a style="padding:-10px 0px -10px 0px;font-size:18px">โปรแกรม</a></div>
    <div class="card-body">
    <div class="form-group">
            {{Form::label('nameprogram', 'ชื่อโปรแแกรม')}}
            {{Form::text('nameprogram','',['class' => 'form-control','placeholder' => 'ชื่อโปรแกรม'])}}
        </div>
        <div class="form-group">
            {{Form::label('detailprogram', 'รายละเอียด')}}
            {{Form::textarea('detailprogram','',['class' => 'form-control','placeholder' => 'รายละเอียด'])}}
        </div>    
        <div class="form-group">
            {{Form::label('price', 'ราคาโปรแกรม')}}
            {{Form::text('price','',['class' => 'form-control','placeholder' => 'ราคาโปรแกรม'])}}
        </div>          
        <div class="form-group">
            {{Form::label('sold', 'วันที่ขาย')}}
            <input type="date" name="sold" value="sold">
        </div>
        <div class="form-group">
            {{Form::label('start', 'วันที่เริ่มดูแล')}}
            <input type="date" name="start" value="start">
        </div>
        <div class="form-group">
            {{Form::label('start', 'วันที่สิ้นสุด')}}
            <input type="date" name="end" value="end">
        </div>
        <!--<div class="form-group">
            {{Form::label('detail', 'รายละเอียดการขาย')}}
            {{Form::text('detail','',['class' => 'form-control','placeholder' => 'รายละเอียด'])}}
        </div>-->
    </div>
    </div>
    </div>
<br>
<div class="card" style="background-color:#f4f6f7;margin-top:10px;width:600px;margin-left:200px" >
    <div class="card-header text-white bg-dark"><h2><a style="padding:-10px 0px -10px 0px;margin-right:290px;font-size:18px">ลงทะเบียนตัวแทน</a>
    <button class="btn btn-outline-warning" onclick="myFunction(); return false;"  id="myButton" >ลงทะเบียนภายหลัง</h2> </div>
    <div class="card-body">
    <div id="myDIV">
    <div class="form-group">
        <!--<form method="POST" action="{{ route('register') }}">-->
            @csrf   

            <div class="form-group">
                {{Form::label('name', 'ชื่อ-นามสกุล')}}
            <div>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="กรุณาใส่ชื่อของคุณ" required>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            </div>

            <div class="form-group">
                {{Form::label('username', 'ชื่อผู้ใช้')}}

                <div>
                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="กรุณาใส่ชื่อผู้ใช้ของคุณ" >
                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                {{Form::label('email', 'E-mail')}}
                <div>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="กรุณาใส่ชื่อของคุณ เช่น a@mail.com" >
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                {{Form::label('password', 'รหัสผ่าน')}}
                <div>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="กรุณาใส่รหัสผ่านของคุณ ความยาวไม่น้อยกว่า6ตัว" >
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>                          

            <div class="form-group">
                {{Form::label('password-comfirm', 'ยืนยันรหัสผ่าน')}}
                <div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="กรุณายืนยันรหัสผ่านของคุณ">
                </div>
            </div>
            
            <input id="status" type="hidden" name="status" value="{{3}}">  
            <input id="approve" type="hidden" name="approve" value="{{1}}">  
            <input id="admin" type="hidden" name="admin" value="{{1}}">
            
        <!--</form>-->
    </div>
    </div>
    <style>
    .subbtn{
        margin-left:235px;
    }
    </style>
    {{Form::submit('Submit',['class' => 'btn btn-outline-primary subbtn'])}}
{!! Form::close() !!}  

<script>
function myFunction() {
    var x = document.getElementById("myDIV");
    var btn = document.getElementById("myButton");
    if (x.style.display === "none") {
    x.style.display = "block";
    btn.value = "ลงทะเบียนภายหลัง";
    btn.innerHTML = "ลงทะเบียนภายหลัง";
    document.getElementById("name").required = true;
    document.getElementById("username").required = true;
    document.getElementById("email").required = true;
    document.getElementById("password").required = true;
    document.getElementById("password-confirm").required = true;

    document.getElementById("name").disabled = false;
    document.getElementById("username").disabled = false;
    document.getElementById("email").disabled = false;
    document.getElementById("password").disabled = false;
    document.getElementById("password-confirm").disabled = false;
    } else {
    x.style.display = "none";
    btn.value = "ลงทะเบียนตอนนี้";
    btn.innerHTML = "ลงทะเบียนตอนนี้";
    document.getElementById("name").required = false;
    document.getElementById("username").required = false;
    document.getElementById("email").required = false;
    document.getElementById("password").required = false;
    document.getElementById("password-confirm").required = false;
    
    document.getElementById("name").disabled = true;
    document.getElementById("username").disabled = true;
    document.getElementById("email").disabled = true;
    document.getElementById("password").disabled = true;
    document.getElementById("password-confirm").disabled = true;
    }
}
</script> 
@endsection