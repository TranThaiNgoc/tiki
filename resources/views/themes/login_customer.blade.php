@extends('layouts.app1')
@section('title', 'Đăng nhập')
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
							<h1><i class="fa fa-lock " aria-hidden="true"></i> Đăng nhập</h1>
						</div>
						@if(session('thongbaoloi'))
							<div class="alert alert-danger">
								{{ session('thongbaoloi') }}
							</div>
						@endif
						<div class="input-group py-2">
							<div class="input-group-prepend">
								<span class="input-group-text"><i style="font-size: 17pt;" class="fa fa-user"
									aria-hidden="true"></i></span>
								</div>
								<input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Địa chỉ email" />
							</div>

							<div class="input-group py-2">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-key icon"></i></span>
								</div>
								<input type="Password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Mật khẩu" />
							</div>
							<div class="py-3 text-center">
								<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-off"></span>Login</button>

								<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-remove"></span>Login with
									Facebook
								</button>
							</div>
							<div class="footer py-3 text-center">
								<p>Không có tài khoản! <a href="{{ route('register_customer') }}">Đăng ký ngay</a></p>
								<p>Quên mật khẩu <a href="#">Tìm Lại?</a></p>
							</div>
						</div>
					</div>
				</form>
			</div>
		</section>


	</div>
	@stop