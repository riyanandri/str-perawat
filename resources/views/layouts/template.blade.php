<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	
	<!-- PAGE TITLE HERE -->
    <title>@yield('title')</title>
	
	<!-- FAVICONS ICON -->
	{{-- <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}"> --}}
	<link href="{{ asset('assets/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/vendor/nouislider/nouislider.min.css') }}">
	
	<!-- Style css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
	@stack('css')
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    @include('components.preloader')
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
		@include('components.nav-header')
        <!--**********************************
            Nav header end
        ***********************************-->
		
		
		<!--**********************************
            Header start
        ***********************************-->
        @include('components.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('components.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			@yield('content')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		


		
        <!--**********************************
            Footer start
        ***********************************-->
        @include('components.footer')
        <!--**********************************
            Footer end
        ***********************************-->

	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
	{{-- <script src="{{ asset('assets/vendor/chart.js/Chart.bundle.min.js') }}"></script> --}}
	<script src="{{ asset('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
	
	{{-- <!-- Apex Chart -->
	<script src="{{ asset('assets/vendor/apexchart/apexchart.js') }}"></script>
	
	<script src="{{ asset('assets/vendor/chart.js/Chart.bundle.min.js') }}"></script> --}}
	
	<!-- Chart piety plugin files -->
    {{-- <script src="{{ asset('assets/vendor/peity/jquery.peity.min.js') }}"></script> --}}
	<!-- Dashboard 1 -->
	{{-- <script src="{{ asset('assets/js/dashboard/dashboard-1.js') }}"></script> --}}
	
	<script src="{{ asset('assets/vendor/owl-carousel/owl.carousel.js') }}"></script>
	
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
	<script src="{{ asset('assets/js/dlabnav-init.js') }}"></script>
	<script src="{{ asset('assets/js/demo.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script> --}}
    @stack('js')
	<script>
		function cardsCenter()
		{
			
			/*  testimonial one function by = owl.carousel.js */
			
	
			
			jQuery('.card-slider').owlCarousel({
				loop:true,
				margin:0,
				nav:true,
				//center:true,
				slideSpeed: 3000,
				paginationSpeed: 3000,
				dots: true,
				navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:1
					},	
					800:{
						items:1
					},			
					991:{
						items:1
					},
					1200:{
						items:1
					},
					1600:{
						items:1
					}
				}
			})
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				cardsCenter();
			}, 1000); 
		});
		
	</script>

</body>
</html>