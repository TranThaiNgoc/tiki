@extends('layouts.app1')
@section('title','Trang chính')
@section('content')
<div id="body">
    <nav id="navbar" class="">
        <div class="row pl-md-3">
            <div class="col-md-3 order-md-1 order-2">
                <div id="cate_menu" class='index '>
                    <a class="text-white main-navbar-toggle">
                        <i class="fi fi-nav-icon-a"></i>
                        <span class="text-uppercase">Danh mục</span>
                    </a>
                    <aside id="dropdown">
                        <ul id="accordion" class="accordion">
                            @foreach($categories as $cate)
                            <li>
                                <div class="link">{{ $cate->name }}</div>
                                <ul class="submenu">
                                    @foreach($cate->product_type as $pro)
                                    <li><a href="{{ route('product_type',['slug' => $pro->slug]) }}">{{ $pro->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div>
            <div class="col-md-9 pl-md-0 order-md-2 order-1 sub-style">
                <div class="sub-menu">
                    <ul class="nolist align-items-center">
                        <li>
                            <a href="{{ url('/') }}">
                                <i class="fi icons-menu fi-home d-block d-md-none"></i>
                                <span class="d-none d-md-block">Trang Chủ</span>
                            </a>

                        </li>
                        <li>
                            <a href="{{ route('about') }}">
                                <i class="fi icons-menu fi-info d-block d-md-none"></i>
                                <span class="d-none d-md-block">Giới Thiệu</span>
                            </a>
                        </li>
                        <li>
                        <li>
                            <a href="{{ route('contact') }}">
                                <i class="fi icons-menu fi-phone d-block d-md-none"></i>
                                <span class="d-none d-md-block">Liên Hệ</span>
                            </a>
                        </li>
                        <li>
                            <i class="fi fi-close-a close-menu text-warning d-block d-md-none"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <section id="slider">
        <div class="row justify-content-end">
            <div class="col-md-9 px-0">
                <div class="swiper-container swiper-main">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="https://23k8dv4brsbv18vf5lh7gb21-wpengine.netdna-ssl.com/wp-content/uploads/2015/04/banner-web-development.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="http://phanmemungdungvn.com/wp-content/themes/webSkytech/image/3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pair-banner py-4">
        <div class="px-3">
            <div class="row">
                <div class="col-md-3 col-6 mb-3 mb-md-0">
                    <a href="#" class="gift-card">
                        <img src="https://salt.tikicdn.com/ts/banner/7f/16/77/74c956f139391e36752b7544f8a0bc92.png" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-6 mb-3 mb-md-0">
                    <a href="#" class="gift-card">
                        <img src="https://salt.tikicdn.com/ts/banner/d3/b1/3e/7cc52fa7aaa4d30a92889dae45d44623.png" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-6 mb-3 mb-md-0">
                    <a href="#" class="gift-card">
                        <img src="https://salt.tikicdn.com/ts/banner/b7/02/38/116c2bf4940cfbb332df6ebcf4f33a98.png" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-6 mb-3 mb-md-0">
                    <a href="#" class="gift-card">
                        <img src="https://salt.tikicdn.com/ts/banner/b9/6e/7e/5e31590b55f2025ef4df8eefdb958a73.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section id="product">
        <div class="px-3 bg-white py-3">
            <h4 class="text-uppercase py-3 mb-0">Sản Phẩm Hot</h4>
            <div class="product-list">
                <div class="row">
                    @foreach($product_view as $value)
                    <div class="col-md-3 col-6 product-list--item">
                        <div class="card card-hover border-0">
                            <div class="card-top text-center pt-2">
                                <a href="{{ route('product',['slug'=>$value->slug]) }}">
                                    <img src="{{ $value->image1 }}"
                                    alt="{{ $value->name }}">
                                </a>
                            </div>
                            <div class="card-body py-2">
                                <a href="{{ route('product',['slug'=>$value->slug]) }}" class="card-title px-3">{{ $value->name }}</a>
                                @if($value->sale = '' || $value->sale == 0)
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