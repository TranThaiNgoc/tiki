@extends('layouts.app1')
@section('title','Sản phẩm')
@section('content')
<div id="body">
	@include('layouts.menu')
	<section id="payment">
		<div class="container py-4">
			@if(count(session('thongbao')))
			<div class="alert alert-success">
				{{ session('thongbao') }}
			</div>
			@endif
			<form action="" method="post">
				@csrf
				<div class="row">
					<div class="col-md-7">
						<h4 class="d-flex align-items-center">
							<strong class="text-uppercase">Thông tin liên hệ</strong>
						</h4>
						<div clas="error">
							<div class="alert alert-danger rounded-0" hidden>
								Xin vui lòng nhập họ tên người liên hệ
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-4 my-2 my-md-0">
								<input class="form-control" type="text" value="{{ Auth::user()->name }}" name="name" placeholder="Họ và tên">
							</div>
							<div class="col-md-4 my-2 my-md-0">
								<input class="form-control" type="text" value="{{ Auth::user()->phone }}" name="phone" placeholder="Số điện thoại..">
							</div>
							<div class="col-md-4 my-2 my-md-0">
								<input class="form-control" type="text" value="{{ Auth::user()->email }}" name="email" placeholder="Email liên hệ">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12 my-2 my-md-0">
								<textarea class="form-control" name="address" cols="4">{!! Auth::user()->address !!}</textarea>
							</div>
						</div>
						<h4 class="d-flex align-items-center mt-md-5 mt-3">
							<strong class="text-uppercase">Chọn đơn vị vận chuyển</strong>
						</h4>
						<div id="shipper">
							<div class="form-group row shipper">
								<div class="col-lg-6 col-md-8 shipper-company">
									<label class="shipper-box">
										<div class="shipper-logo">
											<img src="https://media.vutaweb.com/uploads/system/2019-04-05/giao-hang-nhanh-size-305x3051_size_305x305.png"
											alt="">
										</div>
										<div class="shipper-content">
											<div class="shipper-desc">Vận chuyển bởi</div>
											<div class="shipper-title">Giao Hàng Nhanh</div>
										</div>
										<div class="shipper-check">
											<i class="fa fa-check text-primary" aria-hidden="true"></i>
										</div>
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<h6 class="text-uppercase btn btn-primary d-block rounded-0">Đơn hàng({{ Cart::count() }} sản phẩm)</h6>
						<div class="overflow-auto">
							<table class="table table-middle table-small w-100">
								<thead style="font-size: 10pt">
									<tr>
										<th>Sản phẩm</th>
										<th>Số lượng</th>
										<th>Thành tiền</th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $value)
									<tr>
										<td>
											<input type="hidden" name="product[]" value="{{$value->name}}">
											<b class="la-text-normal">{{ $value->name }}</b>
										</td>
										<td class="text-center">
											<input type="hidden" name="number" value="{{ $value->qty }}">
											{{ $value->qty }}
										</td>
										<td class="text-danger la-text-normal text-right">{{ number_format($value->price,0,',','.') }}đ</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="d-block border border-muted py-4 px-3 bg-light" style="font-size: 10pt;">
							<div class="row py-2">
								<div class="col-6">
									Phí vận chuyển:
								</div>
								<div class="col-6 text-danger text-right">
									<input type="hidden" name="transport" value="{{ (strlen(Cart::total()) >= 8) ? 0 : '30,000' }}">
									<span class="font-weight-bold">{{ (strlen(Cart::total()) >= 8) ? 0 : '30,000' }}đ</span>
								</div>
							</div>
							<div class="row py-2">
								<div class="col-6">
									Tổng tiền:
								</div>
								<div class="col-6 text-danger text-right">
									<span class="font-weight-bold la-text-large">{{ Cart::total() }}đ</span>
								</div>
							</div>
						</div>
							<small class="text-danger text-small">*Miễn phí giao hàng đối vs đơn hàng trên 200.000đ</small>
						<div class="row mt-3 text-center">
							<div class="col-md-6 text-md-left text-center py-3 py-md-0">
								<a href="#" class="backlink">
									<i class="fa fa-long-arrow-left" aria-hidden="true"></i>
									Tiếp tục mua hàng
								</a>
							</div>
							<div class="col-md-6 text-md-right text-center">
								<button type="submit" href="#" class="btn border-0 btn-danger">
									Thanh Toán
									<i class="fa fa-angle-right" aria-hidden="true"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>

</div>
@stop