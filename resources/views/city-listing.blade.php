@extends('layouts.app')
@section('content')
<!-- ============================ Page Title Start================================== -->
<div class="page-title" style="background:#000 url({{url('front_assets')}}/img/page-top-banner.png) no-repeat;">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 col-md-12">
                     <h2 class="ipt-title">Popular Cities</h2>
                     <span class="ipn-subtitle text-white">Explore the most sought-after cities for investment and living!</span>
                  </div>
               </div>
            </div>
         </div>
         <!-- ============================ Page Title End ================================== -->
         <!-- start hot selling projects -->
         <section class="mid">
            <div class="container">
              
               <div class="row justify-content-left gx-3 gy-4 property-list">
						@foreach ($city as $val)
						<!-- Single Property -->
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12" >
							<div class="veshm-location-prt">
								<div class="veshm-location-lists">{{$val->total_property}} Lists</div>
								<a href="{{url('property-in-'.$val->slug)}}" class="veshm-location-figure">
									<img src="{{url('uploads/city/'.$val->image)}}" class="img-fluid" alt="">
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
         </section>
         <!-- end hot selling projects -->
@endsection

