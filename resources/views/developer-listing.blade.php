@extends('layouts.app')
@section('content')
<!-- ============================ Page Title Start================================== -->
<div class="page-title" style="background:#000 url({{url('front_assets')}}/img/page-top-banner.png) no-repeat;">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 col-md-12">
                     <h2 class="ipt-title">Real Estate Top Developers</h2>
                     <span class="ipn-subtitle text-white">Partner with top developers for unmatched real estate opportunities and growth!</span>
                  </div>
               </div>
            </div>
         </div>
         <!-- ============================ Page Title End ================================== -->
         <!-- start hot selling projects -->
         <section class="mid">
            <div class="container">
              
               <div class="row justify-content-left gx-3 gy-4 property-list">
               @foreach ($builder as $val)
                  <!-- Single Property -->
                  <div class="col-xl-3 col-lg-3 col-md-3">
                     <div class="agent-list-fliop">
                        <div class="builder-list-thumb">
                           <a href="{{url('developer/'.$val->slug)}}">
									   <img src="{{url('uploads/builder/'.$val->image)}}" class="img-fluid rounded"  alt="{{$val->title}}">
								   </a>
                           <a href="{{url('developer/'.$val->slug)}}">
                              <h6 class="builder-title">{{$val->title}}</h6>
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

