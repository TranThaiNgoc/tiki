@extends('layouts.app1')
@section('title','Liên hệ')
@section('content')
<div id="body">
	@include('layouts.menu')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12 p-3 home-title">
					<div class="d-md-inline-block text-md-left text-center text-primary title-content">
						<div class="be-text-large d-md-inline-block d-block">
							<ul class="nolist be-breadcrumb text-uppercase d-inline-flex">
								<li><a href="#">Trang chủ</a></li>
								<li><a href="#">Liên Hệ</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="contact py-3">
		<div class="container animated fadeIn">
			<div class="row">
				<div class="col-12 py-3">
					<h1 class="header-title text-primary">Liên Hệ</h1>
					<hr>
				</div>
				<div class="col-12" id="parent">
					<div class="row">
						<div class="col-md-6">
							<iframe
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d981.1956252414682!2d107.07818448809473!3d10.359268318779883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31756ff34707b7ad%3A0x57f311cbed9ff724!2zQ8OUTkcgVFkgQ-G7lCBQSOG6pk4gQ8OUTkcgTkdI4buGIFZVVEFURUNI!5e0!3m2!1svi!2s!4v1554688314358!5m2!1svi!2s"
							width="100%" height="320px" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
						<div class="col-md-6">
							<form action="" class="contact-form" method="post">
								<div class="form-group">
									<input type="text" class="form-control w-100 mr-0" id="name" name="nm" placeholder="Name"
									required="" autofocus="">
								</div>
								<div class="form-group form_left">
									<input type="email" class="form-control w-100 mr-0" id="email" name="em" placeholder="Email"
									required="">
								</div>

								<div class="form-group">
									<input type="text" class="form-control w-100 mr-0" id="phone"
									onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10"
									placeholder="Mobile No." required="">
								</div>
								<div class="form-group">
									<textarea class="form-control textarea-contact" rows="3" id="comment" name="FB"
									placeholder="Type Your Message/Feedback here..." required=""></textarea>
								</div>
								<button class="btn btn-default btn-send my-3 my-md-0"> <span class="glyphicon glyphicon-send"></span>
									Send
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
</div>
@stop
