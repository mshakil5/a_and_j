<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>A  And J Construction</title>
	<meta charset="utf-8">
	
	
	<meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=0.8">
      <meta name="description" content="We A and J Construction is the Best Construction Company">
       <meta name="keywords" content="cementwork, construction,contructing,Plumbing, brickwork,block work, wall,basement, home refurbish, newbuild home, builder, cheap contractor, expert,Pavers Work,Stone Work,Brownstone work,Brick Work,Concrete Work,Pavers Work,Stone Work,Brownstone work">
      
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KKDL92Q');</script>
<!-- End Google Tag Manager —>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KKDL92Q"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KKDL92Q');</script>
<!-- End Google Tag Manager —>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KKDL92Q"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	
	
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link name="favicon" type="image/x-icon" href="{{ asset(\App\Models\CompanyDetail::first()->fav_icon) }}" rel="shortcut icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{ asset('assets/css/animate.css')}}">
	
	<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css')}}">

	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/jquery.timepicker.css')}}">
	
	<link rel="stylesheet" href="{{ asset('assets/css/flaticon.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css')}}">
	<style>
		.popup-gallery a {
			display: inline-block;
			width: 100%;
		}

		.project .text {

			position: relative;
			margin-top: -100px;
		}
		

		.project .icon {

			width: 70px;
			height: 70px;
			background: #fc5e28;
			margin: 0 auto;
			z-index: 1;
			position: absolute;
			top:14%;
			left: 40%;
			color: #fff;
			opacity: 0;
		}
		.project:hover .icon{
			opacity: 1;
		}
		.popup-gallery a img {
			height: auto;
			width: 100%;
		}
	</style>
</head>
<body>
	
	






     

    @include('frontend.inc.header')
    
    @yield('content')

    @include('frontend.inc.footer') 





		
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" class="fa fa-close"></span>
						</button>
					</div>
					<div class="modal-body p-4 p-md-5">
						<form action="#" class="appointment-form ftco-animate">
							<h3>Request Quote</h3>
							<div class="">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="First Name">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Last Name">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Phone">
								</div>
							</div>
							<div class="">
								<div class="form-group">
									<div class="form-field">
										<div class="select-wrap">
											<div class="icon"><span class="fa fa-chevron-down"></span></div>
											<select name="" id="" class="form-control">
												<option value="">Select Your Services</option>
												<option value="">Architecture</option>
												<option value="">Renovation</option>
												<option value="">Construction</option>
												<option value="">Interior &amp; Exterior</option>
												<option value="">Chemical Research</option>
												<option value="">Petroleum &amp; Gas</option>
												<option value="">Other Services</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="">
								<div class="form-group">
									<textarea name="" id="" cols="30" rows="4" class="form-control" placeholder="Message"></textarea>
								</div>
								<div class="form-group">
									<input type="submit" value="Request A Quote" class="btn btn-primary py-3 px-4">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

		<script src="{{ asset('assets/js/jquery.min.js')}}"></script>
		{{-- <script src="{{ asset('assets/js/jquery-migrate-3.0.1.min.js')}}"></script> --}}
		<script src="{{ asset('assets/js/popper.js')}}"></script>
		<script src="{{ asset('assets/js/popper.min.js')}}"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
		<script src="{{ asset('assets/js/jquery.easing.1.3.js')}}"></script>
		<script src="{{ asset('assets/js/jquery.waypoints.min.js')}}"></script>
		<script src="{{ asset('assets/js/jquery.stellar.min.js')}}"></script>
		<script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
		<script src="{{ asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{ asset('assets/js/jquery.animateNumber.min.js')}}"></script>
		<script src="{{ asset('assets/js/bootstrap-datepicker.js')}}"></script>
		<script src="{{ asset('assets/js/jquery.timepicker.min.js')}}"></script>
		<script src="{{ asset('assets/js/scrollax.min.js')}}"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
		<script src="{{ asset('assets/js/google-map.js')}}"></script>
		
		<script src="{{ asset('assets/js/main.js')}}"></script>
		<script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>

        @yield('scripts')
		<script>
			jQuery(document).ready(function () {
				jQuery('.popup-gallery').magnificPopup({
					delegate: 'a',
					type: 'image',
					callbacks: {
						elementParse: function (item) {
							console.log(item.el.context.className);
							if (item.el.context.className == 'video') {
								item.type = 'iframe',
									item.iframe = {
										patterns: {
											youtube: {
												index: 'youtube.com/',
	
												id: 'v=',
												src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe. 
											},
											vimeo: {
												index: 'vimeo.com/',
												id: '/',
												src: '//player.vimeo.com/video/%id%?autoplay=1'
											},
											gmaps: {
												index: '//maps.google.',
												src: '%id%&output=embed'
											}
										}
									}
							} else {
								item.type = 'image',
									item.tLoading = 'Loading image #%curr%...',
									item.mainClass = 'mfp-img-mobile',
									item.image = {
										tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
									}
							}
	
						}
					},
					gallery: {
						enabled: true,
						navigateByImgClick: true,
						preload: [0, 1]
					}
	
				});
	
			});
		</script>
	</body>
	
	</html>