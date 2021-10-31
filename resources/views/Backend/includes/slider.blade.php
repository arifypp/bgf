<div id="main-slide" class="carousel slide" data-ride="carousel">

	<!-- Indicators -->
	<ol class="carousel-indicators visible-lg visible-md">
	@foreach(App\Models\backend\Slider::orderBy('id', 'asc')->get() as $slider)
		<li data-target="#main-slide" data-slide-to="{{ $slider->id }}" class="{{ $loop->first ? 'active' : '' }}"></li>
	@endforeach
	</ol><!--/ Indicators end-->

	<!-- Carousel inner -->
	<div class="carousel-inner">
	@foreach(App\Models\backend\Slider::orderBy('id', 'asc')->get() as $slider)
	<div class="item {{ $loop->first ? 'active' : '' }}" style="background-image:url('{{ asset('assets/images/slider/'.$slider->image) }}')">
			<div class="slider-content">
				<div class="col-md-12 text-center">
					<h2 class="slide-title animated4">{{ $slider->subtitle }}</h2>
					<h3 class="slide-sub-title animated5">{{ $slider->title }}</h3>   
					<p class="slider-description lead animated3">{{ $slider->description }}</p>
					 <p>
						<a href="{{ $slider->buttontext_one_link }}" class="slider btn btn-primary">{{ $slider->buttontext_one }}</a>
						<a href="{{ $slider->buttontext_two_link }}" class="slider btn btn-primary border">{{ $slider->buttontext_two }}</a>
					 </p>      
				</div>
			</div>
		</div><!--/ Carousel item 2 end -->
	@endforeach



	<!-- Controllers -->
	<a class="left carousel-control" href="#main-slide" data-slide="prev">
		<span><i class="fa fa-angle-left"></i></span>
	</a>
	<a class="right carousel-control" href="#main-slide" data-slide="next">
		<span><i class="fa fa-angle-right"></i></span>
	</a>
</div>