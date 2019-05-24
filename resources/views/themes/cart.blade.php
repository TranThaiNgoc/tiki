@extends('layouts.app1')
@section('title','Giỏ hàng')
@section('content')
<div id="body">
        @include('layouts.menu')
        <section id="s-cart">
            <div class="container py-3">
                <form action="" method="post">
                    <div class="py-1 d-inline-flex">
                        <strong class="text-uppercase">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            giỏ hàng của bạn(1 sản phẩm)
                        </strong>
                    </div>
                    <hr>
                    <div class="overflow-auto">
                        <table class="w-100 table-divider" style="min-width: 700px;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Sản Phẩm</th>
                                    <th></th>
                                    <th>Số Lượng</th>
                                    <th>Đơn Giá</th>
                                    <th class="text-md-right">Thành Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="#">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <img class="img-thumbnail" src="./public/images/maydanhtrung.jpg" width="70px" alt="">
                                    </td>
                                    <td>
                                        <a href="#">
                                            <b class="d-block la-text-normal">Máy đánh trứng</b>
                                        </a>
                                        <div class="d-block la-text-normal">
                                            Trọng lượng: 
                                            <b>1000g</b>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="input-group spinner">
                                            <input type="number" class="form-control-sm border-0 form-control-style rounded-0" value="1" min="1" max="99" style="width: 50px;">
                                            <div class="input-group-btn-vertical">
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                                <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-danger la-text-normal">
                                        400.000vnđ
                                    </td>
                                    <td class="text-danger la-text-normal text-right">
                                        400.000vnđ
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-md-right d-block">
                        <div class="d-inline-block border-bottom border-muted py-4 px-3 text-left col-md-4">
                            <div class="row">
                                <div class="col-6">
                                    <span>Tổng Tiền:</span>
                                </div>
                                <div class="col-6 text-right">
                                    <span class="text-danger font-weight-bold">400.000vnđ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 text-center">
                        <div class="col-md-6 text-md-left text-center py-3 py-md-0">
                            <a href="#" class="backlink">
                                <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                                Tiếp tục mua hàng
                            </a>
                        </div>
                        <div class="col-md-6 text-md-right text-center">
                            <button type="submit" class="btn btn-primary">Cập Nhật Giỏ Hàng</button>
                            <a href="#" class="btn btn-danger">
                                Thanh Toán
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>
@stop