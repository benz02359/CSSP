@extends('web.app')

@section('content')
<link href="font-awesome.min.css" rel="stylesheet" type="text/css">
<style>
	/* Coded with love by Mutiullah Samim */
    body,
		html {
			margin: 0;
			padding: 0;
			height: 100%;
			background: #E1E1E1 !important;
		}
		.user_card {
			height: 530px;
			width: 600px;
			margin-top: auto;
			margin-bottom: auto;
			background: #f39c12;
			position: relative;
			display: flex;
			justify-content: center;
			flex-direction: column;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius: 5px;

		}
		.brand_logo_container {
			position: absolute;
			height: 168px;
			width: 175px; 
			top: -90px;
			border-radius: 50% ;
			background: #E1E1E1;
			padding: 10px;
			text-align: center;
		}
		.brand_logo {
		    height: 148px;
			width: 155px;
			background-color: none;
			border-radius: 50% ;
			/*border: 2px solid #f39c12; */
		}
		.form_container {
			margin-top: -15px;
		}
		.login_btn {
			width: 50%;
			background: #4c4c4c !important;
			color: white !important;
		}
		.login_btn:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.login_container {
			margin-bottom: -70px;
			padding: 0;
			width: 520px;
		}
		.input-group-text {
			background: #4c4c4c !important;
			color: white !important;
			border: 0 !important;
			border-radius: 0.25rem 0 0 0.25rem !important;
		}
		.input_user,
		.input_pass:focus {
			box-shadow: none !important;
			outline: 0px !important;
			padding: -5px 0px -5px 0px;
		}
		.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
			background-color: #4c4c4c !important;
		}
		.finput{
			font-size: 14px;
		}
		.form-group{
			margin: 8px 0px 0px 0px;
		}
</style>
<br><br>
<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="<?php echo asset('assets/img/logo2.png'); ?>" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center ">
                    <form method="POST" action="{{ route('register') }}" style="font-size:16px;">
                        @csrf   
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('ชื่อ-นามสกุล') }}</label>

                            <div class="col-md-9">
                                <input aria-label="Small" id="name" type="text" class=" finput form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="กรุณาใส่ชื่อ-นามสกุลของคุณ" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
			<!-- end -------------------------------------------------------------------------- name-->
					 <div class="form-group row">
                            <label for="username" class="col-md-3 col-form-label text-md-right">{{ __('ชื่อผู้ใช้') }}</label>

                            <div class="col-md-9">
                                <input id="username" type="text" class=" finput form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="กรุณาใส่ชื่อผู้ใช้ของคุณ" required>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
			<!-- end -------------------------------------------------------------------------- user-->
						<div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-9">
                                <input id="email" type="email" class="finput form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="กรุณาใส่ชื่อของคุณ เช่น a@mail.com" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
			<!-- end -------------------------------------------------------------------------- user-->
						<div class="form-group row">
                            <label for="company" class="col-md-3 col-form-label text-md-right">{{ __('บริษัท') }}</label>

                            <div class="col-md-9">
                            <select id="company_id" class="finput form-control{{ $errors->has('company_id') ? ' is-invalid' : '' }}" name="company_id" required>
                                <option>กรุณาเลือกบริษัทของคุณ</option>
                                    @foreach($companies as $company)                                
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                            </select>
                            </div>
                        </div>
			<!-- end -------------------------------------------------------------------------- user-->
						<div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label>

                            <div class="col-md-9">
                                <input id="password" type="password" class="finput form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="กรุณาใส่รหัสผ่านของคุณ ความยาวไม่น้อยกว่า6ตัว" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>              
			<!-- end -------------------------------------------------------------------------- user-->
						<div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่าน') }}</label>

                            <div class="col-md-9">
                                <input id="password-confirm" type="password" class="finput form-control" name="password_confirmation" placeholder="กรุณายืนยันรหัสผ่านของคุณ" required>
                            </div>
                        </div>			
			<!-- end -------------------------------------------------------------------------- user-->
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" class="btn login_btn">{{ __('สมัครสมาชิก') }}</button>
				   </div>
				   
			<!-- end -------------------------------------------------------------------------- user-->
				  		 <input id="status" type="hidden" name="status" value="{{4}}"> 
                        <input id="approve" type="hidden" name="approve" value="{{1}}">
                        <input id="admin" type="hidden" name="admin" value="{{0}}">
					</form>
				</div>
		
			</div>
		</div>
	</div>

@endsection
