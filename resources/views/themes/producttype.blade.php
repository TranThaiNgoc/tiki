@extends('layouts.app1')
@section('title','Loại sản phẩm')
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
								<li><a href="{{  url('/') }}">Trang chủ</a></li>
								<li><a href="#">{{ $product_type->name }}</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="products">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="d-md-inline-block text-md-left text-center text-primary title-content">
						<div class="be-text-large text-uppercase d-md-inline-block d-block">
							Sản phẩm {{ $product_type->name }}
						</div>
					</div>
					<hr>
				</div>
				<div class="col-md-12">
					<div class="product-list">
						<div class="row">
							@foreach($product as $value)
							<div class="col-md-3 col-6 product-list--item">
								<div class="card card-hover border-0">
									<div class="card-top text-center pt-2">
										<a href="{{ route('product',['slug'=>$value->slug]) }}">
											<img src="{{ $value->image1}}"
											alt="Card image cap">
										</a>
									</div>
									<div class="card-body py-2">
										<a href="{{ route('product',['slug'=>$value->slug]) }}" class="card-title px-3">{{ $value->name }}</a>
										@if($value->sale == '' || $value->sale == 0)
										<div class="box-price px-3">
											<span class="price">{{ number_format($value->price) }} đ</span>
										</div>
										@else
										<div class="box-price px-3">
											<span class="price">{{ number_format($value->sale_price) }} đ</span>
											<span class="text-secondary text-small">{{ $value->sale }}%</span>
										</div>
										<div class="box-price px-3">
											<s class="old-price text-small">{{ number_format($value->price) }} đ</s>
										</div>
										@endif
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-md-12 py-3">
					<nav aria-label="Page navigation example">
						<ul class="pagination justify-content-center">
							{{ $product->links() }}
						</ul>
					</nav>
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