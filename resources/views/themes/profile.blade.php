@extends('layouts.app1')
@section('title','Thông tin cá nhân')
@section('content')
<div id="body">
	@include('layouts.menu')
	<section class="py-lg-4 py-3 bg-light">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Quản Lý Tài Khoản</h1>
				</div>
				<div class="col-md-6 mb-3 mb-md-0">
					<div class="box-porfolio p-3">
						<h5 class="d-inline-block">Thông tin tài khoản</h5>
						<div class="box-porfolio-name">
							<span class="mr-3">{{ Auth::user()->name }}</span>
						</div>
						<div class="box-porfolio-email">
							<span>{{ Auth::user()->email }}</span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="box-porfolio p-3">
						<h5 class="d-inline-block">Sổ địa chỉ</h5>
						<a href="{{ route('edit_profile') }}">Chỉnh sữa</a><br>
						<small>Địa chỉ nhận hàng mặc định</small>
						<div class="box-porfolio-fullname">
							<span class="">{{ Auth::user()->name }}</span>
						</div>
						<div class="box-porfolio-email">
							<span>{!! Auth::user()->address !!}</span>
						</div>
					</div>
				</div>
				<div class="col-md-12 py-3">
					<div class="title-table">
						<div class="d-flex flex-wrap bg-white p-3 border-bottom">
							<h5 class="d-inline-block m-0">Đơn hàng gần đây</h5>
						</div>
					</div>
					<div class="overflow-auto bg-white manage-list-product">
						<table class="w-100 table-divider table-hover" style="min-width: 700px;">
							<thead>
								<tr>
									<th>Đơn hàng số #</th>
									<th>Sản Phẩm</th>
									<th>Ngày đặt hàng</th>
									<th>Tổng cộng</th>
									<th class="text-md-right"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<span>001233</span>
									</td>
									<td>
										<img class="img-thumbnail" src="./public/images/maydanhtrung.jpg" width="70px" alt="">
										<img class="img-thumbnail" src="./public/images/maydanhtrung.jpg" width="70px" alt="">
									</td>
									<td class="text-left">
										<span>4/9/2019</span>
									</td>
									<td class="text-danger la-text-normal">
										400.000vnđ
									</td>
									<td class="text-danger la-text-normal text-right">
										<a class="text-uppercase" href="#">Quản lý</a>
									</td>
								</tr>
								<tr>
									<td>
										<span>002112</span>
									</td>
									<td>
										<img class="img-thumbnail" src="./public/images/maydanhtrung.jpg" width="70px" alt="">
									</td>
									<td class="text-left">
										<span>4/9/2019</span>
									</td>
									<td class="text-danger la-text-normal">
										400.000vnđ
									</td>
									<td class="text-danger la-text-normal text-right">
										<a class="text-uppercase" href="#">Quản lý</a>
									</td>
								</tr>
								<tr>
									<td>
										<span>003332</span>
									</td>
									<td>
										<img class="img-thumbnail" src="./public/images/maydanhtrung.jpg" width="70px" alt="">
									</td>
									<td class="text-left">
										<span>4/9/2019</span>
									</td>
									<td class="text-danger la-text-normal">
										400.000vnđ
									</td>
									<td class="text-danger la-text-normal text-right">
										<a class="text-uppercase" href="#">Quản lý</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>
@stop