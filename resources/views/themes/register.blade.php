@extends('layouts.app1')
@section('title', 'Đăng ký tài khoản')
@section('content')
<div id="body">
	@include('layouts.menu')
	<section class="py-lg-5 py-3">
		<div class="container">
			<form action="" method="post">
				@csrf
				<div class="row">
					<div class="col-md-6 offset-md-3  p-3 box-login">
						<div class="text-center">
							<h1><i class="fa fa-lock " aria-hidden="true"></i> Đăng Ký</h1>
						</div>
						@if(session('thongbao'))
			                <div class="alert alert-success">
			                    {{session('thongbao')}}
			                </div>
			            @endif
						<div class="row">
							<div class="col-lg-12 my-2">
								<div class="text-left">
									<span class="form-title">Tên khách hàng:</span>
								</div>
								<div class="col-lg-12 p-0">
									<input class="form-control" name="name" value="{{ old('name') }}" type="text" autocomplete="off" placeholder="Vui lòng nhập họ tên">
								</div>
								<div class="text-left w-100 mx-2">
									<small class="text-danger">{{ $errors->first('name') }}</small>
								</div>
							</div>
							<div class="col-lg-6 my-2">
								<div class="text-left">
									<span class="form-title">Địa chỉ email:</span>
								</div>
								<div class="col-lg-12 p-0">
									<input class="form-control" name="email" value="{{ old('email') }}" type="email" autocomplete="off" placeholder="Nhập địa chỉ email">
								</div>
								<div class="text-left w-100 mx-2">
									<small class="text-danger">{{ $errors->first('email') }}</small>
								</div>
							</div>
							<div class="col-lg-6 my-2">
								<div class="text-left">
									<span class="form-title">Số điện thoại:</span>
								</div>
								<div class="col-lg-12 p-0">
									<input class="form-control" name="phone" value="{{ old('phone') }}" type="number" autocomplete="off"
									placeholder="Nhập số điện thoại...">
								</div>
								<div class="text-left w-100 mx-2">
									<small class="text-danger">{{ $errors->first('phone') }}</small>
								</div>
							</div>
							<div class="col-lg-6 my-2">
								<div class="text-left">
									<span class="form-title">Mật khẩu:</span>
								</div>
								<div class="col-lg-12 p-0">
									<input class="form-control" name="password" type="password" autocomplete="off"
									placeholder="Password...">
								</div>
								<div class="text-left w-100 mx-2">
									<small class="text-danger">{{ $errors->first('password') }}</small>
								</div>
							</div>
							<div class="col-lg-6 my-2">
								<div class="text-left">
									<span class="form-title">Nhập Lại Mật khẩu:</span>
								</div>
								<div class="col-lg-12 p-0">
									<input class="form-control" name="password_confirmation" type="password" autocomplete="off"
									placeholder="Regen Password...">
								</div>
								<div class="text-left w-100 mx-2">
									<small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
								</div>
							</div>
						</div>
						<div class="py-3 text-center">
							<button type="submit" class="btn btn-success">
								<span
								class="glyphicon glyphicon-off">
							</span>
							Đăng ký
						</button>
					</div>
					<div class="footer py-3 text-center">
						<p>Đã có tài khoản? <a href="{{ route('login_customer') }}">Đăng nhập</a></p>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>

</div>
@stop