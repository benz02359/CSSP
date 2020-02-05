@extends('cssp.layouts.master')
 <!-- title unixdev -->
 <title> เปลี่ยนรหัสผ่าน</title>
<!-- add icon link -->
<link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
@section('content')
<style>
.tstyle{
    text-align: right;
}
.card{
    background: white;
    margin: 30px auto;
    border-radius: 12px;
    box-sizing: border-box;
    width: 400px;
    max-height: null;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}
</style><br>
<div class="card"> 
<div class="card-header" style="font-size: 22px;background-color: #343A40;color:aliceblue;border-radius: 12px 12px 0 0;"><b>เปลี่ยนรหัสผ่าน</b></div>
            <div style="padding:10px 0 0 30px">           
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        
                    <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                        {{ csrf_field() }}

                        <div class="form-group row{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">รหัสผ่านเดิม</label>

                            <div class="col-md-6">
                                <input id="current-password" type="password" class="form-control" name="current-password" required>

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">รหัสผ่านใหม่</label>

                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control" name="new-password" required>

                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new-password-confirm" class="col-md-4 control-label">ยืนยันรหัสผ่านใหม่</label>

                            <div class="col-md-6">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group" style="margin-left:80px">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-outline-success">
                                   เปลี่ยนรหัสผ่าน
                                </button>
                            </div>
                        </div>
                    </form>
</div></div>
@endsection