@extends('layouts.app1')
@section('title','Sản phẩm')
@section('content')
<div id="body">
	@include('layouts.menu')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12 mb-3 home-title">
					<div class="d-md-inline-block text-md-left text-center text-primary title-content">
						<div class="be-text-large d-md-inline-block d-block">
							<ul class="nolist be-breadcrumb text-uppercase d-inline-flex">
								<li><a href="{{ url('/') }}">Trang chủ</a></li>
								<li><a href="{{ route('product_type',['slug'=>$product->product_type->slug]) }}">{{ $product->product_type->name }}</a></li>
								<li><a>{{ $product->name }}</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-xl-9 col-lg-8">
					<div class="row">
						<div class="col-md-5">
							<div class="swiper-container swiper-product gallery-top">
								<div class="swiper-wrapper">
									<div class="swiper-slide product-slide" style="background-image:url({{ $product->image1 }})">
									</div>
									<div class="swiper-slide product-slide" style="background-image:url({{ $product->image2 }})">
									</div>
									@if(!is_null($product->image3))
									<div class="swiper-slide product-slide" style="background-image:url({{ $product->image3 }})">
									</div>
									@endif
									@if(!is_null($product->image4))
									<div class="swiper-slide product-slide" style="background-image:url({{ $product->image4 }})">
									</div>
									@endif
								</div>
							</div>
							<div class="swiper-container swiper-thumbs gallery-thumbs">
								<div class="swiper-wrapper justify-content-center">
									<div class="swiper-slide product-slide" style="background-image:url({{ $product->image1 }})">
									</div>
									<div class="swiper-slide product-slide" style="background-image:url({{ $product->image2 }})">
									</div>
									@if(!is_null($product->image3))
									<div class="swiper-slide product-slide" style="background-image:url({{ $product->image3 }})">
									</div>
									@endif
									@if(!is_null($product->image4))
									<div class="swiper-slide product-slide" style="background-image:url({{ $product->image4 }})">
									</div>
									@endif
								</div>
							</div>
						</div>
						<div class="col-md-7">
							<form action="" method="post">
								<div class="detail-product ">
									@if($product->sale == '' || $product->sale == 0)
									<h1 class="title-product py-2 py-md-0">
										{{ $product->name }}
									</h1>
									<div class="price be-text-large border p-3 text-danger border-muted">
										<span class="text-dark be-text-normal">Giá:</span>
										{{ number_format($product->price) }}<small>đ</small>
									</div>
									@else
									<h1 class="title-product py-2 py-md-0">
										{{ $product->name }}<span class="be-text-small text-danger ml-2">-{{ $product->sale }}%</span>
									</h1>
									<div class="price be-text-large border p-3 text-danger border-muted">
										<span class="text-dark be-text-normal">Giá:</span>
										{{ number_format($product->sale_price) }}<small>đ</small>
										<s class="be-text-small text-secondary" data-price="đ" data-price-right>{{ number_format($product->price) }}</s>
									</div>
									@endif
									<div class="mt-3">
										<span class="mr-3">Số lượng còn:</span>
										{{ $product->number }} sản phẩm
									</div>
									<div class="quantily-select mt-3">
										<div class="row input-group number-spinner">
										</div>
									</div>
											<div class="mt-3 row flex-md-row flex-comlumn">
												<div class="col-xl-6 col-md-12 mb-2 mb-xl-0">
													<a class="be-submit font-weight-bold btn btn-primary d-inline-block w-100" href="{{ route('add',['id'=>$product->id]) }}">
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
													Thêm vào giỏ hàng</a>
												</button>
											</div>
											<div class="col-xl-6 col-md-12 mb-2 mb-xl-0">
												<button class="be-submit font-weight-bold btn btn-warning text-light d-inline-block w-100"
												type="submit" name="submit">
												<i class="fa fa-check" aria-hidden="true"></i>
												MUA NGAY
											</button>
										</div>

									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-md-12 px-md-3 px-0">
					<div class="bg-light p-3">
						<h6 class="m-0 font-weight-bold text-uppercase pb-2">Sản phẩm tương tự</h6>
						<ul class="nolist d-block w-100 widget-product">
							@foreach($product_relate as $value)
							<li class="row align-items-center mb-3 position-relative px-3">
								<a href="{{ route('product',['slug'=>$value->slug]) }}" class="col-lg-4 col-3 border border-muted px-0">
									<img src="{{ $value->image1 }}" alt="{{ $value->name }}">
								</a>
								<div class="col-lg-8 col-9">
									<a href="{{ route('product',['slug'=>$value->slug]) }}" class="widget-product__title">{{ $value->name }}</a>
									@if($value->sale != '' || $value->sale != 0)
									<small class="btn-sm btn-danger rounded-0  d-inline-block">Đang khuyến mãi</small>
									<h6 class="text-danger d-block">
										{{ number_format($value->sale_price) }}
										<span>đ</span>
										<s class="be-text-small text-secondary" data-price="đ" data-price-right>{{ number_format($value->price) }}</s>
									</h6>
									@else
									<h6 class="text-danger d-block">
										{{ number_format($value->price) }} đ
									</h6>
									@endif
								</div>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="py-3">
						<div class="pt-1 d-inline-flex align-items-center">
							<strong class="text-uppercase">Chi tiết sản phẩm</strong>
						</div>
						<hr>
						<div class="col-md-12 product-desciptions">
							{!! $product->content !!}
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="py-3">
						<div class="pt-1 d-inline-flex align-items-center">
							<strong class="text-uppercase">Bình luận sản phẩm</strong>
						</div>
						<hr>
						<div class="be-facebook">
							<div class="fb-comments"
							data-href="https://www.facebook.com/zuck?__tn__=%2CdC-R-R&amp;eid=ARBQQoU6kIH0N3ZC_tWNJZC2uhklmuxN0M9UcqIngUtOvFMtch4c1pRkpZR2hlN1tPlzrXVCLgbL_CKM&amp;hc_ref=ARQ167e0IdgK2Vud7BOuvzHSmAqqYTzi05XdbQm41KAMc7mDSWX5C73-JBZVi01c0_0&amp;fref=nf"
							data-numposts="5"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@stop
@section('script')
<script type="text/javascript">
    $(function() {
    var Accordion = function(el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;

        // Variables privadas
        var links = this.el.find('.link');
        // Evento
        links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
    }

    Accordion.prototype.dropdown = function(e) {
        var $el = e.data.el;
            $this = $(this),
            $next = $this.next();

        $next.slideToggle();
        $this.parent().toggleClass('open');

        if (!e.data.multiple) {
            $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
        };
    }   

    var accordion = new Accordion($('#accordion'), false);
});
</script>
@stop