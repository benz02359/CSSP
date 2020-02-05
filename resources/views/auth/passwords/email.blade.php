   <!-- title unixdev -->
   <title> ลืมรหัสผ่าน</title>
    <!-- add icon link -->
    <link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
    
@extends('web.app')

@section('content')
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
			height: 205px;
			width: 660px;
			margin-top: 40px;
			margin-bottom: auto;
			background: #f39c12;
			position: relative;
			display: flex;
			justify-content: center;
			flex-direction: column;
			padding: 15px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius: 5px;

		}
		.brand_logo_container {
			position: absolute;
			height: 148px;
			width: 155px;
			top: -75px;
			border-radius: 50%;
			background: #E1E1E1;
			padding: 10px;
			text-align: center;
		}
		.brand_logo {
			height: 128px;
			width: 135px;
			background-color: none;
			border-radius: 50%;
			/* border: 2px solid white; */
		}
		.form_container {
			margin-top: 100px;
		}
		.login_btn {
			width: 100%;
			background: #4c4c4c !important;
			color: white !important;
		}
		.login_btn:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.login_container {
			padding: 0 2rem;
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
		}
		.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
			background-color: #4c4c4c !important;
		}
</style>
<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="<?php echo asset('assets/img/logo2.png'); ?>" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center">
                <div class="col-12" style="text-align: center;margin:80px 0px 0px 0px"><h3>{{ __('ป้อนอีเมล์ของท่านเพื่อรีเซ็ทรหัสผ่าน') }}</h3>
		
				
                    @if (session('status'))
                        <div role="alert" >
                            {{ __('คำขอเปลี่ยนรหัสผ่านถูกส่งไปยังอีเมลของคุณ') }}
                        </div>
					@endif
					</div>
				</div>
				<div class="justify-content-center" style="margin:0px 11px 10px 15px">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

						<div class="input-group-append">
								<span class="input-group-text">e-mail</span>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
								@endif
								<div class="d-flex justify-content-center ">
								<button type="submit" class="btn login_btn">{{ __('ส่งคำขอเปลี่ยนรหัสผ่าน') }}</button>
								</div>
						</div>
				</div>
					</form>
    </div>
</div>
@endsection
