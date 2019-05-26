<nav id="navbar" class="">
	<div class="row pl-md-3">
		<div class="col-md-3 order-md-1 order-2">
			<div id="cate_menu" class=' '>
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
@push('script')
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
@endpush