@extends('layouts.app1')
@section('title','giới thiệu')
@section('content')
<div id="body">
	@include('layouts.menu')

	<section id="about">
		<div class="main-about">
			<img src="./public/images/banner2.jpg" alt="">
		</div>
		<article class="d-flex flex-column flex-md-row align-items-center pt-3">
			<div class="w-100 w-md-50">
				<div class="box">
					<div class="feed px-3">
						<h2>Lịch Sử Hình Thành</h2>
						<p>Thương hiệu điện máy VUTA được thành lập từ tháng 3 năm 2010, là một trong       những thương hiệu thời trang nam uy tín
							hàng đầu Việt Nam. Với sự quản lý chặt chẽ, chuyên nghiệp của đội ngũ quản lý; Sự tận tâm của nhân viên bán hàng… là những yếu tố làm nên thương hiệu điện máy VUTA lớn mạnh như hiện
							nay.
						</p>
					</div>
				</div>  
			</div>
			<div class="w-100 w-md-50">
				<div class="box">
					<img src="https://goo.gl/xEOETU" alt="">
				</div>
			</div>
		</article>
		<article class="d-flex flex-column flex-md-row align-items-center">
			<div class="w-100 w-md-50 order-1 order-md-0">
				<div class="box">
					<img src="https://goo.gl/xEOETU" alt="">

				</div>
			</div>
			<div class="w-100 w-md-50 order-0 order-md-1">
				<div class="box">
					<div class="feed px-3">
						<h2>Quan Niệm</h2>
						<p>VUTA luôn quan niệm thời trang là sự tìm tòi và sáng tạo nên những sản phẩm      của VUTA đều được thiết kế riêng với sự
							trẻ
							trung, hiện đại để mang lại guu thời trang hợp mốt nhất cho các bạn trẻ. Các dòng sản phẩm của VUTA không ngừng đa
							dạng, tất cả tạo nên vẻ đẹp hoàn hảo, hiện đại, phong cách cho phái mạnh
						</p>
					</div>
				</div>
			</div>
		</article>
		<article class="d-flex flex-column flex-md-row align-items-center">
			<div class="w-100 w-md-50">
				<div class="box">
					<div class="feed px-3">
						<h2>Chất Lượng</h2>
						<p>Bên cạnh đó VUTA luôn đặt mình vào tâm lý và quyền lợi của khách hàng để         tung ra những sản phẩm thời trang chất lượng
							tốt nhất, mẫu mã cực đẹp, mới lạ nhưng với giá cả cực kì hấp dẫn, cạnh tranh nhất.
						</p>
					</div>
				</div>
			</div>
			<div class="w-100 w-md-50">
				<div class="box">
					<img src="https://timo.vn/wp-content/uploads/2018/04/POST_FB-04-1200x631.jpg" alt="">
				</div>
			</div>
		</article>
		<article class="d-flex flex-column flex-md-row align-items-center">
			<div class="w-100 w-md-50 order-1 order-md-0">
				<div class="box">
					<img src="https://goo.gl/xEOETU" alt="">

				</div>
			</div>
			<div class="w-100 w-md-50 order-0 order-md-1">
				<div class="box">
					<div class="feed px-3">
						<h2>Tiện Ích</h2>
						<p>Hiện nay, thương hiệu thời trang nam VUTA phát triển ngày càng lớn mạnh  Đồng Nai và Vũng Tàu. Ngoài ra, nhằm tạo sự tiện lợi mua sắm tối đa cho khách hàng, VUTA phát triển hệ thống bán hàng online, giao hàng đến tận tay người tiêu dùng trên toàn quốc.</p>
					</div>
				</div>
			</div>
		</article>
		<div class="about-footer text-center d-flex flex-column py-5">
			<h2>Thank You So Much</h2>
			<h4 class="px-md-5 px-3">If you only knew that I exist to love the rest of life left me in this very ostil place for
				my love and so pleasing to
				my eyes, the altarpiece of my most beautiful and even mysterious serious story.
			</h4>
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