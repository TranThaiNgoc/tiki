@extends('layouts.app1')
@section('title','Giỏ hàng')
@section('content')
<div id="body">
        @include('layouts.menu')
        <section id="s-cart">
            <div class="container py-3">
                @if(Cart::count()>0)
                <form action="" method="post">
                    <div class="py-1 d-inline-flex">
                        <strong class="text-uppercase">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            giỏ hàng của bạn({{ Cart::count() }} sản phẩm)
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
                                @foreach($item as $value)
                                <tr>
                                    <td>
                                        <a href="{{ route('delete',['id'=>$value->rowId]) }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <img class="img-thumbnail" src="{{ $value->options->image }}" width="70px" alt="">
                                    </td>
                                    <td>
                                        <a href="#">
                                            <b class="d-block la-text-normal">{{ $value->name }}</b>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <div class="input-group spinner">
                                            <input type="number" class="form-control-sm border-0 form-control-style rounded-0" value="{{ $value->qty }}" onchange="updateCart(this.value,'{{ $value->rowId }}')" min="1" max="99" style="width: 50px;">
                                        </div>
                                    </td>
                                    <td class="text-danger la-text-normal">
                                        {{ number_format($value->price,0,',','.') }}vnđ
                                    </td>
                                    <td class="text-danger la-text-normal text-right">
                                        {{ number_format($value->price*$value->qty,0,',','.') }}vnđ
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-md-right d-block">
                        <div class="d-inline-block border-bottom border-muted py-4 px-3 text-left col-md-4">
                                <div class="row">
                                    <div class="col-6">
                                    Phí vận chuyển:
                                </div>
                                <div class="col-6 text-right">
                                    <span class="text-danger font-weight-bold">{{ (strlen(Cart::total()) >= 8) ? 0 : '30,000' }}đ</span>
                                </div>
                                <div class="col-6">
                                    <span>Tổng Tiền:</span>
                                </div>
                                <div class="col-6 text-right">
                                    <span class="text-danger font-weight-bold">{{ Cart::total() }}vnđ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <small class="text-md-right d-block text-danger text-small">*Miễn phí giao hàng đối vs đơn hàng trên 200.000đ</small>
                    <div class="row mt-3 text-center">
                        <div class="col-md-6 text-md-left text-center py-3 py-md-0">
                            <a href="{{ url('/') }}" class="backlink">
                                <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                                Tiếp tục mua hàng
                            </a>
                        </div>
                        <div class="col-md-6 text-md-right text-center">
                            <button type="submit" class="btn btn-primary">Cập Nhật Giỏ Hàng</button>
                            <a href="{{ route('order') }}" class="btn btn-danger">
                                Thanh Toán
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </form>
                @else
                <p>Giỏ hàng rỗng</p>
                @endif
            </div>
        </section>

    </div>
@stop
@push('script')
<script type="text/javascript">
    function updateCart(qty, rowId) {
        $.get(
            '{{ route('update') }}',
            {qty:qty,rowId:rowId},
            function(){
                location.reload();
            }
            );
    }
</script>
@endpush
