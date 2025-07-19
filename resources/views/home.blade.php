@extends('layouts.app')
@section('extra_css')
	<style>
		.vesh-prt-location {
			padding: 2px 2px;
		}
	</style>
@endsection
@section('content')
    <!-- ============================ Hero Banner  Start================================== -->
<section class="hp-header" style="padding: 0px;">
    <div class="hp-gallery" id="hp-gallery">
        <div class="hp-gallery-item" data-index="0">
            <img data-src="{{url('front_assets/img/banner/1.avif')}}" class="lozad" alt="Elite Edge Banner 1"/>
        </div>
        <div class="hp-gallery-item" data-index="1">
            <img data-src="{{url('front_assets/img/banner/2.avif')}}" class="lozad" alt="Elite Edge Banner 2"/>
        </div>
        <div class="hp-gallery-item" data-index="2">
            <img data-src="{{url('front_assets/img/banner/3.avif')}}" class="lozad" alt="Elite Edge Banner 3"/>
        </div>
    </div>
	<div class="hp-header__inner ">
         <div class="hp-searchform bannerContentBox  col-lg-9 col-md-11 col-sm-12 mx-auto">
            <h1 class="hp-searchform__headline text-center">Buy Your Dream Property with <br> <span class="banner-o-e"> Elite Legacy</span></h1>
            <div class="banner-on-form">
               <div class="row">
                  <div class="new-search-properties">
				  <div class="search-from-clasic mt-3">
								<div class="hero-search-content">
								<form method="get" action="{{url('/property/residential')}}" class="home_search">
									<div class="row">
										
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
												<ul class="bannerTab d-none d-sm-block">
													<li class="active"><a href="#" filter_type_val="residential">Residential</a></li>
													<li><a href="#" filter_type_val="commercial">Commercial</a></li>
													<li><a href="#" filter_type_val="sco">SCO</a></li>
													<li ><a href="#" filter_type_val="residential-plots">Residential Plots</a></li>
													<!--<li><a href="#" filter_type_val="upcoming_project">Upcoming Projects</a></li> -->
												</ul>
												<select class="form-control d-block d-sm-none hometype mb-1 propertyType" >
													<option value="residential">Residential</option>
													<option value="commercial">Commercial</option>
													<option value="sco">SCO</option>
													<option value="residential-plots">Residential Plots</option>
												</select>
											</div>
											<div class="col-xl-10 col-lg-10 col-md-9 col-sm-12 top_border_banner_search">
													<!-- @csrf -->
													<input type="hidden" name="type" value="residential" class="type_data">
													<div class="classic-search-box">
														<div class="form-group half-width" >
															<div class="input-with-icon">
																<select class="form-control myselect" style="padding-left: 10px;" name="city">
																	<option value="">All Cities</option> 
																	@foreach($city as $val)
																	<option value="{{$val->id}}">{{$val->title}}</option>
																	@endforeach
																</select>
																<img src="{{url('front_assets')}}/img/pin.svg" width="20">
															</div>
														</div>
														<div class="custom_rb"></div>
														<div class="form-group full">
															<div class="input-with-icon">
																<input type="text" class="form-control" name="q" placeholder="Enter Keywords...">
															</div>
														</div>
													</div>
											</div>
											<div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 top_border_banner_search">
												<div class="form-group mt-1">
													<button type="submit" class="btn btn-primary full-width btn-theme">Search</button>
												</div>
											</div>
										
									</div>
									</form>
								</div>
							</div>
                  </div>
               </div>
            </div>
         </div>
      </div>
</section>
			<!-- ============================ Hero Banner End ================================== -->
			<!-- start hot selling projects -->
			<section class="mid">
				<div class="container">
				
					<div class="row justify-content-left">
						<div class="col-lg-8 col-md-10 text-center1">
							<div class="sec-heading center1 mb-4">
								<h2>Hottest Selling Projects in Gurgaon</h2>
								<p>Discover our well-crafted properties for sale in Gurgaon, opening the door to a world of sophistication that surpasses all expectations.</p>
							</div>
						</div>

						<div class="col-lg-4 col-md-10 justify-content-right">
							<div class="align-to-right mb-2">
								<a href="{{url('hot-selling-projects')}}" class="seeAllProperty">See all Projects <i class="fa-solid fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
					
					<div class="row justify-content-center gx-3 gy-4">
						
						@foreach ($hot_selling_projects as $val)
						<!-- Single Property -->
						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
							<div class="veshm-list-wraps">
								<div class="veshm-type"><span>{{$val->type}}</span></div>
								
								<div class="veshm-list-thumb">
									<a href="{{url('property-details/'.$val->slug)}}" >
									<img data-src="{{url('uploads/property/'.$val->image)}}" class="img-fluid mx-autox lozad">
									</a>
								</div>
								<div class="veshm-list-block">
									<div class="veshm-list-head">
										<div class="veshm-list-head-caption">
											<div class="rlhc-price">
												<h4 class="product_name " title="{{$val->title}}">{!! Str::limit($val->title, 26, ' ...') !!}</h4>
												<div class="rlhc-title-name verified">By {{$val->builder}}</div>
												<div class="list_details"><i class="fa-solid  fa-location-dot"></i>  {{$val->location}}, {{$val->city}} </div>
												<div class="list_details"><i class="fa-solid fa-vector-square"></i>  {{$val->area}} </div>
											</div>
										</div>
									</div>
									<div class="veshm-list-footer">
										<div class="veshm-list-circls">
											<ul>
												<li><p class="listing-price"><i class="bi bi-currency-rupee"></i> {{$val->price}} </p></li>
												<li><div class="detailBtn"><a href="{{url('property-details/'.$val->slug)}}">View Details</a></div></li>
											</ul>
										</div>
									</div>
								</div>
								
							</div>
						</div>
						<!-- End Single Property -->
						@endforeach
					</div>
				</div>
			</section>
			<!-- end hot selling projects -->
			

			<!-- start tools and guids -->
			<section class="bg-light_1" style="padding-top: 10px;">
				<div class="container">
				
					<div class="row justify-content-left">
						<div class="col-lg-12 col-md-112 text-center1">
							<div class="sec-heading center1 mb-4">
								<h2>Everything That You Need In One Place</h2>
							</div>
						</div>

					</div>
					
					<div class="row justify-content-center gx-3 gy-4">
						
						<!-- Single Property -->
						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
							<div class="veshm-grid-blog1 adviceToolBox"  style="background-color: rgb(255 245 228);">
								<div class="tool-advice-icon right"> <img src="{{url('front_assets')}}/img/inventory-icon.png" width="85"> </div>
								<div class="tool-advice-title">Extensive Inventory </div>
								<div class="tool-advice-details">With an extensive inventory at Elite Edge, we help you find the perfect property to match your preferences. </div>
							</div>
						</div>
						<!-- End Single Property -->
						<!-- Single Property -->
						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
							<div class="veshm-grid-blog1 adviceToolBox" style="background-color: #d7f2e3;">
								<div class="tool-advice-icon right"> <img src="{{url('front_assets')}}/img/consultation-icon.png" width="85"> </div>
								<div class="tool-advice-title">Best Consultation </div>
								<div class="tool-advice-details">At Elite Edge, our team of experts provides the best consultation in the market, ensuring you make informed and confident property decisions.</div>
							</div>
						</div>
						<!-- End Single Property -->
						<!-- Single Property -->
						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
							<div class="veshm-grid-blog1 adviceToolBox" style="background-color: #f0f9ff;">
								<div class="tool-advice-icon right"> <img src="{{url('front_assets')}}/img/sales-icon.png" width="85"> </div>
								<div class="tool-advice-title">After Sales Assistance </div>
								<div class="tool-advice-details">Our service does not stop once the deal is closed. At EliteEdge, we have a dedicated team that continues to help our clients with all documentation needs during the post-transactional phases. </div>
							</div>
						</div>
						<!-- End Single Property -->
						<!-- Single Property -->
						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
							<div class="veshm-grid-blog1 adviceToolBox" style="background-color: #d2ee97c7;">
								<div class="tool-advice-icon right"> <img src="{{url('front_assets')}}/img/vastu-icon.png" width="85"> </div>
								<div class="tool-advice-title">Vastu Consultation</div>
								<div class="tool-advice-details">Vaastu is a subtle way of bringing harmony and channeling energy in and around the home. At Elite Edge we offer Vaastu consulting to make a home Vaastu-compliant. </div>
							</div>
						</div>
						<!-- End Single Property -->						
					</div>
				</div>
			</section>
			<!-- end tools and guids -->

			<!-- start top location -->
			<section class="" style="background: #faf8ff;">
				<div class="container">
					<div class="row justify-content-center gx-3 gy-4">
						<!-- Single Property -->
						<div class="col-lg-3 col-md-3">
							<div class="xxx">
								<div class="veshm-location-prt" style=" border: 1px solid #ddd; background: #fff; padding: 15px;">
									<p style="margin: 0;"><b>TOP CITIES</b></p>
									<h2 style="font-size: 18px;">Featured Locations </h2>
									<p>Find your next investment journey from our featured location</p>
									<a href="{{url('/city')}}" >Explore More Cities<i class="fa-regular fa-circle-right ms-2"></i></a>
								</div>							
							</div>
						</div>
						<div class="col-lg-9 col-md-9">
							<div class="row ">
							<!-- End Single Property -->	
							@foreach ($popular_city as $val)
							<!-- Single Property -->
							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
								<div class="veshm-location-prt">
									<div class="veshm-location-lists">{{$val->total_property}} Lists</div>
									<a href="{{url('property-in-'.$val->slug)}}" class="veshm-location-figure">
										<img data-src="{{url('uploads/city/'.$val->image)}}" class="img-fluid lozad" alt="">
									</a>
									<div class="veshm-location-content">
										<a href="{{url('property-in-'.$val->slug)}}">
											<h4>{{$val->title}}</h4>
										</a>
									</div>
								</div>
							</div>
							<!-- End Single Property -->	
							@endforeach
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- end top locations -->
			 <!-- ============================ Choose category Start ================================== -->
			<section class="classic-bg1 mid">
				<div class="container">
					
					<div class="row justify-content-left">
						<div class="col-lg-8 col-md-8 text-center1">
							<div class="sec-heading center1 mb-4">
								<h2>Newly Launched Projects</h2>
							</div>
						</div>
						<div class="col-lg-4 col-md-10 justify-content-right">
							<div class="align-to-right">
								<a href="{{url('newly-launched-projects')}}" class="seeAllProperty">See all Projects <i class="fa-solid fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
					
					
					<div class="row gx-xl-4 gx-lg-4">
						@foreach ($new_launch_projects as $val)
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="vesh-list-categ-box">
								<div class="vesh-categ-list-links" style="padding: 0px;" >
									<div class="">
										<a href="{{url('property-details/'.$val->slug)}}"> 
											<img data-src="{{url('uploads/property/'.$val->image)}}" class="img-fluid mx-auto lozad" style="width: 180px; height:117px; border-radius: 5px 0px 0px 6px;">
										</a>
									</div>
									<div class="vesh-categ-list-content" style="padding: 7px 7px 5px 10px">
										<a href="{{url('property-details/'.$val->slug)}}">
											<h4 class="vesh-content-title">{{ $val->title }}</h4>
											<div class="vesh-prt-location"><i class="fa-solid  fa-location-dot"></i> {{ $val->location }}, {{ $val->city }}</div>
											<div class="vesh-prt-location"><i class="fa-solid fa-vector-square"></i>  {{ $val->area }}</div>
											<div class="vesh-prt-location"><span class="listing-price"><i class="bi bi-currency-rupee"></i> {{ $val->price }}</span></div>
										</a>
									</div>
									
								</div>
							</div>
						</div>
						@endforeach
						
						
					</div>
					
				</div>
			</section>
			<!-- ============================ Choose Categories End ================================== -->

			<!--start how to oprate-->
	<section class="mid" style="padding: 20px; background: #faf8ff;">
		<div class="container">
			
			<div class="row justify-content-center">
				<div class="col-lg-7 col-md-10 text-center">
					<div class="sec-heading center mt-3">
						<h2>How We Operate</h2>
						<p>360&deg; Framework</p>
					</div>
				</div>
			</div>
			
			<div class="row">
				
				<!-- Single Property -->
				<div class="col-xl-12 col-lg-12 col-md-12 col-12">
						<img data-src="{{url('front_assets')}}/img/home-how-it-works.png" class="img-fluid lozad">
				</div>
				
				
				
			</div>
			
		</div>	
	</section>
	<!--end how to oprate-->

			 <!-- start Blog -->
			<section>
				<div class="container">
				
					<div class="row justify-content-center1">
						<div class="col-lg-7 col-md-10 text-center1">
							<div class="sec-heading center1">
								<h2>Trending Real Estate News</h2>
								<p>Stay Updated with the Latest Real Estate News and Make Informed Decisions!</p>
							</div>
						</div>
					</div>
					
					<div class="row g-xl-3 g-lg-3 g-md-3 g-3" id="latest_update_blogsxxx">
						@foreach ($blogs as $val)
						<!-- Single blog Grid -->
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 ">
							<div class="veshm-grid-blog homeBlogsListing blog-item">
								<div class="veshm-grid-blog-thumb">
									<a href="{{url('blog-details/'.$val->slug)}}">
										<img data-src="{{url('uploads/blog/'.$val->image)}}" class="img-fluid lozad" alt="{{$val->title}}">
									</a>
									<span class="blog-date">{{ date('d F, Y', strtotime($val->created_at)) }}</span>
								</div>
								<div class="veshm-grid-blog-body">
									<div class="veshm-grid-body-header">
										<div class="veshm-grid-title"><h4><a href="{{url('blog-details/'.$val->slug)}}">{!! Str::limit($val->title, 68, ' ...') !!}</a></h4></div>
									</div>
									<div class="veshm-grid-body-middle homeBlogShortDesc">
										<p>{!! Str::limit($val->short_description, 160, ' ...') !!} <span><a href="{{url('blog-details/'.$val->slug)}}">Read More</a></span></p>
									</div>
									
								</div>
							</div>
						</div>
						@endforeach
						
					</div>
					

					<div class="row justify-content-center mt-5">
						<div class="col-lg-12 col-md-12 text-center">
							<div class="viewAllBlogsBtn"><a href="{{url('/blog')}}"> View All Blogs </a></div>
						</div>
					</div>

				</div>		
			</section>
			<!-- ================= Blog Grid End ================= -->
<!-- ============================ start partner ================================== -->
<section class="gray">
	<div class="container">
		
		<div class="row align-items-center">
			<div class="row justify-content-left">
				<div class="col-lg-12 col-md-12 text-center">
					<div class="sec-heading center mb-4">
						<h2>Our Real Estate Partner</h2>
					</div>
				</div>
			</div>
			
			<div class="col-xl-12 col-lg-12 col-md-12">
				<div class="side-slide">
				@foreach ($builder as $val)
					<!-- Single Slide -->
					<div class="single-slide">
						<div class="veshm-agent-wrap homeDevelopersLogo">
							<div class="ourPartner">
								<a href="{{url('developer/'.$val->slug)}}">
									<img data-src="{{url('uploads/builder/'.$val->image)}}" class="img-fluid lozad" alt="{{$val->title}}">
								</a>
							</div>
						</div>
					</div>
				@endforeach
					
				</div>
			</div>
			
		</div>
	</div>
</section>
<!-- ============================ End partner End ================================== -->
@endsection
@section('extra_js')
<script>
			$(document).ready(function() {
				$(".bannerTab li").click(function() {
					$(".bannerTab li").removeClass("active");
					$(this).addClass("active");

					var type_data = $(this).find('a').attr('filter_type_val');
					$('.type_data').val(type_data);
					$('.home_search').attr('action',"{{url('property')}}/"+ type_data );
					
				});

				$(".propertyType").on("change",function(){
					var type_data = $(this).val();
					type_data = type_data.replace(" ", "-");
					$('.home_search').attr('action',"{{url('property')}}/"+ type_data );
				});
			});
		</script>
	<script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
<script>
    const observer = lozad();
observer.observe();
</script>	
@endsection
