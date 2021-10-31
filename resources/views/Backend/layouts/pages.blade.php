<!doctype html>
<html class="no-js" lang="en">
<head>
  @include('frontend.includes.header')
  @include('frontend.includes.css')
</head>
<body>
<!-- Pre Loader
============================================ -->
<div class="preloader">
	<div class="loading-center">
		<div class="loading-center-absolute">
			<div class="object object_one"></div>
			<div class="object object_two"></div>
			<div class="object object_three"></div>
		</div>
	</div>
</div>
<!-- Body main wrapper start -->
<div class="wrapper fix">
<!-- Header 1
============================================ -->
<div class="header-area header-absolute header-transparent">
	<div class="header-top d-none d-md-block">
		<div class="container">
			<!-- Header Top -->
		  	@include('frontend.includes.topbar')
		</div>
	</div>
	<div class="header-bottom sticky">
		<div class="container">
			<!-- Menu Header -->
      @include('frontend.includes.menubar')
      <!-- end menu header -->
		</div>
	</div>
</div>
<!-- Hero Slide Area
============================================ -->

  @yield('breadcrumbs')

<!-- Hero Slide Area End
============================================ -->

  <!-- Main body start-->
  @yield('page')
  <!-- Main body end -->


<!-- Footer Area
============================================ -->
@include('frontend.includes.footer')

<!-- JS -->
@include('frontend.includes.scripts')
<script>
      $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 4,
            loop: true,
            margin: 10,
            autoWidth:true,
            responsiveClass:true,
            nav:false,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
                    responsive:{
                    0:{
                        items:1,
                        nav:false
                    },
                    600:{
                        items:2,
                        nav:false
                    },
                    1000:{
                        items:4,
                        nav:false,
                        loop:true
                    }
                }	
        });
        })
        
 </script> 
</body>
</html>
