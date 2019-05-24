<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="{{asset('home/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/fontisto/fontisto.min.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/swiper.min.css')}}">

    <link rel="stylesheet" href="{{asset('home/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/custom.css')}}">
    <title>DIENMAYVT - @yield('title')</title>
    
</head>
<body>
    <div id="app" class="container px-0">
        <!-- SECTION  Header -->
        <header id="header">
            <a href="{{ url('/') }}">
                <div class="banner-top d-none d-md-block">
                    <img src="https://salt.tikicdn.com/ts/banner/5d/43/68/a6dac8067d16c6901e4eae2fa74d50ec.png" alt="">
                </div>
            </a>
            <div class="px-3">
                <div class="row align-items-center py-3">
                    <div class="col-md-2 col-6">
                        <div id="logo">
                            <a href="{{ url('/') }}">
                                <img src="https://salt.tikicdn.com/ts/banner/33/ba/89/54c02d2475983f93a024c0cd13f238e4.png"
                                alt="">
                            </a>
                        </div>
                    </div>
                    <div id="toggle" class="col-6 text-right d-block d-md-none">
                        <a href="#" class="text-white main-navbar-toggle" data-menu>
                            <i class="fi fi-nav-icon-a"></i>
                            <span class="text-uppercase">Menu</span>
                        </a>
                    </div>
                    <div class="col-lg-5 col-md-10">
                        <div class="form-search">
                            <form action="" method="post">
                                <div class="form-group m-0 d-flex flex-row">
                                    <input class="form-control-sm border-0 rounded-0 flex-grow-1" type="text" name="search"
                                    placeholder="Tìm sản phẩm, danh mục ...">
                                    <button class="btn btn-sm btn-warning rounded-0 d-inline px-3" type="submit">
                                        <i class="fi fi-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="header-link d-flex flex-wrap text-white align-items-center">
                            @if(Auth::check())
                            <div class="user-profile col-md-4 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="header-link-icons">
                                        <i class="fi fi-person" aria-hidden="true"></i>
                                    </div>
                                    <div class="flex-grow-1 flex-column items-nav">
                                    <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" class="text-white">   
                                        <div class="text-left">
                                            Xin Chào
                                        </div>
                                        <div class="text-left">
                                            {{Auth::user()->name}}
                                        </div>
                                        <div class="dropdown-menu bg-light">
                                            <div class="p-2">
                                                <a href="{{ route('profile') }}"
                                                class="btn btn-warning form-control btn-sm text-white font-weight-bold text-dark"
                                                type="submit">Quản lý tài khoản</a>
                                            </div>
                                            <div class="p-2">
                                                <a class="btn btn-warning form-control btn-sm text-white font-weight-bold text-dark" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('Đăng Xuất') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="user-profile col-md-4 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="header-link-icons">
                                        <i class="fi fi-person" aria-hidden="true"></i>
                                    </div>
                                    <div class="flex-grow-1 flex-column items-nav">
                                        <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" class="text-white">
                                        <div>
                                            Đăng nhập
                                        </div>
                                        <div>
                                            Tài Khoản
                                        </div>
                                        </a>
                                        <div class="dropdown-menu bg-light">
                                            <div class="p-2">
                                                <a href="{{ route('login_customer') }}"
                                                class="btn btn-warning form-control btn-sm text-white font-weight-bold text-dark"
                                                type="submit">Đăng Nhập</a>
                                            </div>
                                            <div class="p-2">
                                                <a href="{{ route('register_customer') }}"
                                                class="btn btn-warning form-control btn-sm text-white font-weight-bold text-dark"
                                                type="submit">Đăng Ký</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        <div class="noti-items col-md-4 col-6">
                            <div class="d-flex align-items-center">
                                <div class="header-link-icons">
                                    <i class="fi fi-phone" aria-hidden="true"></i>
                                </div>
                                <div class="flex-grow-1 ">
                                    <div>
                                        Hotline
                                    </div>
                                    <div>
                                        1900 1506
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" id="cart" class="col-md-4 text-white">
                            <div class="d-flex align-items-center">
                                <div class="header-link-icons">
                                    <i class="fi fi-shopping-basket"></i>
                                </div>
                                <div class="flex-grow-1 flex-row">
                                    <div>
                                        Giỏ hàng
                                    </div>
                                </div>
                                <div class="">
                                    <label id="cart-number" class="bg-warning mb-0">0</label>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- SECTION  Body -->
    @yield('content')
    <!-- SECTION  Footer -->
    <footer id="footer" class="pt-lg-4">
        <div class="px-3">
            <div class="row align-items-center py-3">
                <div class="col-md-2 col-3">
                    <img src="https://www.kingstonwritersfest.ca/wp-content/uploads/email-icon.png" alt="">
                </div>
                <div class="col-md-4 col-9">
                    <strong>Đăng ký nhận bản tin Shop</strong><br>
                    <span class="text-small">Đừng bỏ lỡ hàng ngàn sản phẩm và chương trình siêu hấp dẫn</span>
                </div>
                <div class="col-md-4">
                    <div class="form-email">
                        <form action="" method="post">
                            <div class="form-group m-0 d-flex flex-row">
                                <input class="form-control-sm flex-grow-1 mr-3" type="text" name="search"
                                placeholder="Địa chỉ email của ban...">
                                <button class="btn btn-sm btn-warning d-inline px-3" type="submit">
                                    Đăng ký
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row footer-main px-3 py-4">
                <div class="col-md-3">
                    <div id="logo-footer">
                        <a href="#">
                            <img src="https://lavima.vn/wp-content/uploads/2018/08/logo-tiki.png" alt="">
                        </a>
                    </div>
                    <div class="py-2">
                        <span class="text-small">
                            Website chúng tôi chuyên cung cấp các sản phẩm chính hãng với đầy đủ các loại sản phẩm cơ điện lạnh, điện gia dụng,...
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row pb-3 pb-md-0">
                        <div class="col-md-6 col-6">
                            <ul class="nolist">
                                <li><a href="#">Menu-footer1</a></li>
                                <li><a href="#">Menu-footer1</a></li>
                                <li><a href="#">Menu-footer1</a></li>
                                <li><a href="#">Menu-footer1</a></li>
                                <li><a href="#">Menu-footer1</a></li>
                                <li><a href="#">Menu-footer1</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-6">
                            <ul class="nolist">
                                <li><a href="#">Menu-footer1</a></li>
                                <li><a href="#">Menu-footer1</a></li>
                                <li><a href="#">Menu-footer1</a></li>
                                <li><a href="#">Menu-footer1</a></li>
                                <li><a href="#">Menu-footer1</a></li>
                                <li><a href="#">Menu-footer1</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="fanpage">
                        <div class="fb-page footer-body" data-href="https://www.facebook.com/zillmaphongba/" data-tabs="timeline"
                        data-width="500" data-height="180" data-small-header="false" data-adapt-container-width="true"
                        data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/zillmaphongba/" class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/zillmaphongba/">Live
                        Game mobile</a></blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white text-center py-3">
                <div class="copyright text-xnomal">
                    @Bản quyền thuộc về shopxyz.com | Thiết kế và phát triển bởi VUTAWEB.COM
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<script src="{{asset('home/js/jquery.min.js')}}"></script>
<script src="{{asset('home/js/popper.min.js')}}"></script>
<script src="{{asset('home/js/bootstrap.min.js')}}"></script>
<script src="{{asset('home/js/swiper.min.js')}}"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=2046573405635669&autoLogAppEvents=1"></script>
<script src="{{asset('home/js/app.js')}}"></script>
@yield('script')
</body>

</html>