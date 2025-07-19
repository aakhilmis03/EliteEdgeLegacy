@extends('layouts.app')
@section('content')
<!-- ============================ Page Title Start================================== -->
<div class="page-title" style="background:#000 url({{url('front_assets')}}/img/page-top-banner.png) no-repeat;">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 col-md-12">
                     <h2 class="ipt-title">Developer Profile</h2>
                     <span class="ipn-subtitle"><a href="{{url('/')}}" style="color: #199dff;">Home</a> / <span style="color: #fff;">Developer Profile<span></span>
                  </div>
               </div>
            </div>
         </div>
         <!-- ============================ Page Title End ================================== -->
         <!-- start hot selling projects -->
         <section>
			
				<div class="container">
					<div class="row">
						
						<!-- Side Search -->
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
							<div class="adgt-wriop-block border rounded">
								
								<div class="row" style="padding: 15px;">
                           <div class="col-lg-7 col-md-7">
                              <div class="adgt-wriop-img">
                                 <div class="builder-profile">
                                    <img src="{{url('uploads/builder/'.$builder->image)}}" class="img-fluid" alt="{{$builder->title}}">
                                    <span class="verify-icon"><i class="fa-solid fa-check"></i></span>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-5 col-md-5">
                              <div class="adgt-wriop-criptionxxx">
                                 <h5 class="mb-0" style="margin-top: 25%;"><a href="#">{{$builder->title}}</a></h5>
                                 <span class="font--medium small"><i class="fa-solid fa-location-dot me-2"></i>Gurugram, India</span>
                              </div>
                           </div>
								
								</div>
								
								<div class="adgt-wriop-footer py-3 px-3">
									<h6>About Developer</h6>
									<p>{!! $builder->description !!}</p>
								</div>
							</div>
							<!-- Sidebar End -->
						</div>
						
						<!-- All Lists -->
						<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
							
							
							<div class="row gx-3 gy-4">
								<div class="col-xl-12 col-lg-12 col-md-12 mb-2"><h6>Recently Properties</h6></div>
							</div>
							
							<div class="row gx-3 gy-4">
								
                        @foreach ($developer_property_listing as $val)
						<!-- Single Property -->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="veshm-list-wraps">
								<div class="veshm-type"><span>{{$val->type}}</span></div>
								
								<div class="veshm-list-thumb">
									<a href="{{url('property-details/'.$val->slug)}}" >
										<img src="{{url('uploads/property/'.$val->image)}}" class="img-fluid mx-auto" alt="">
									</a>
								</div>
								<div class="veshm-list-block">
									<div class="veshm-list-head">
										<div class="veshm-list-head-caption">
											<div class="rlhc-price">
												<h4 class="product_name ">{{$val->title}}</h4>
												<div class="rlhc-title-name verified">By {{$builder->title}}</div>
												<div class="list_details"><i class="fa-solid  fa-location-dot"></i>  {{$val->location}}, {{$val->city}} </div>
												<div class="list_details"><i class="fa-solid fa-vector-square"></i>  {{$val->area}} </div>
											</div>
										</div>
									</div>
									<div class="veshm-list-footer">
										<div class="veshm-list-circls">
											<ul>
												<li><p class="listing-price" style="font-size: 14px;"><i class="bi bi-currency-rupee"></i> {{$val->price}} </p></li>
												<li><div class="detailBtn"><a href="{{url('property-details/'.$val->slug)}}" style="font-size: 13.5px;">View Details</a></div></li>
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
						
					</div>
					
				</div>	
			</section>
         <!-- end hot selling projects -->
@endsection

