
   <!-- title unixdev -->
   <title>เพิ่มรายชื่อพนักงาน</title>
    <!-- add icon link -->
    <link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
@extends('cssp.layouts.master')

@section('content')
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);">
                <div class="card-header" style="font-size:20px;background-color: #343A40;color:aliceblue"><b>{{ __('เพิ่มรายชื่อพนักงาน') }}</b></div>

                <div class="card-body" style="background-color: #FFF;">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ-นามสกุล') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อผู้ใช้') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                           

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="language" class="col-md-4 col-form-label text-md-right">{{ __('ภาษาที่ใช้') }}</label>

                            <div class="col-md-6">
                                <input id="language" type="text" class="form-control" name="language"  required> 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('ตำแหน่ง') }}</label>

                            <div class="col-md-6">
                                <input id="position" type="text" class="form-control" name="position"  required> 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('แผนก') }}</label>

                            <div class="col-md-6">
                            <select id="dep_id" class="finput form-control{{ $errors->has('company_id') ? ' is-invalid' : '' }}" name="dep_id" required>
                                <option>กรุณาเลือกแผนก</option>
                                    @foreach($department as $dep)                                
                                    <option value="{{$dep->id}}">{{$dep->name}}</option>
                                    @endforeach
                            </select>
                            </div>
                        </div>
                                                 

                            
                                <input id="company_id" type="hidden" name="company_id" value="{{1}}">
                            
                        

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่าน') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ลงทะเบียน') }}
                                </button>
                            </div>
                        </div>
                        <input id="status" type="hidden" name="status" value="{{2}}">   
                        <input id="approve" type="hidden" name="approve" value="{{1}}">  
                        <input id="admin" type="hidden" name="admin" value="{{1}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
