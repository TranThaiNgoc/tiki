@extends('layouts.app1')
@section('title','Thông tin cá nhân')
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
							<h1><i class="fa fa-cog" aria-hidden="true"></i> Chỉnh sửa thông tin</h1>
						</div>
						@if(session('thongbao'))
						<div class="alert alert-success">
							{{ session('thongbao') }}
						</div>
						@endif
						<div class="row">
							<div class="col-lg-12 my-2">
								<div class="text-left">
									<span class="form-title">Nhập họ tên:</span>
								</div>
								<div class="col-lg-12 p-0">
									<input class="form-control" name="name" value="{{ isset(Auth::user()->name) ? Auth::user()->name : old('name') }}" type="text" autocomplete="off"
									placeholder="Vui lòng nhập họ tên">
								</div>
								<div class="text-left w-100 mx-2">
									<small class="text-danger">{{ $errors->first('name') }}</small>
								</div>
							</div>
							<div class="col-lg-12 my-2">
								<div class="text-left">
									<span class="form-title">Số điện thoại:</span>
								</div>
								<div class="col-lg-12 p-0">
									<input class="form-control" type="number" name="phone" value="{{ isset(Auth::user()->phone) ? Auth::user()->phone : old('phone') }}" autocomplete="off" placeholder="Nhập số điện thoại...">
								</div>
								<div class="text-left w-100 mx-2">
									<small class="text-danger">{{ $errors->first('phone') }}</small>
								</div>
							</div>
							<div class="col-lg-12 my-2">
								<div class="text-left">
									<span class="form-title">Nhập Địa chỉ nhận hàng</span>
								</div>
								<div class="w-100 p-0">
									<textarea class="form-control" name="address" cols="30" rows="2" placeholder="Nhập lại địa chỉ nhận hàng">{{ isset(Auth::user()->address) ? Auth::user()->address : old('address') }}</textarea>
								</div>
								<div class="text-left w-100 mx-2">
									<small class="text-danger">{{ $errors->first('address') }}</small>
								</div>
							</div>
						</div>
						<div class="py-3 text-center">
							<button type="submit" class="btn btn-success">
								<span class="glyphicon glyphicon-off">
								</span>
								Lưu
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>  

</div>
@stop