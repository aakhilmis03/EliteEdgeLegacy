@extends('layouts.app')

@section("extra_css")
   <meta property="og:image" content="{{url('uploads/blog/'.$blog->image)}}">
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
@endsection

@section('content')
<!-- ============================ Page Title Start================================== -->
<div class="page-title" style="background:#000 url({{url('front_assets')}}/img/page-top-banner.png) no-repeat;">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 col-md-12">
                     <h2 class="ipt-title">Blog Details</h2>
                     <span class="ipn-subtitle"><a href="{{url('/')}}" style="color: #199dff;">Home</a> / <span style="color: #fff;">Blog<span> / <span style="color: #fff;">Blog Details<span></span>
                  </div>
               </div>
            </div>
         </div>
         <!-- ============================ Page Title End ================================== -->
          <!-- start hot selling projects -->
          <section class="gray-simple">
			
         <div class="container">
         
            <!-- row Start -->
            <div class="row">
            
               <!-- Blog Detail -->
               <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                  <div class="blog-details single-post-item format-standard mb-4">
                     <div class="post-details">
                     
                        <div class="post-featured-img">
                           <img src="{{url('uploads/blog/'.$blog->image)}}" class="img-fluid rounded" alt="">
                        </div><br>
                        <h3 class="post-title">{{$blog->title}}</h3>
                        <p>{!! $blog->shor_description !!}</p>
                        <p>{!! $blog->description !!}</p>
                        
                     </div>
                     
                     <div class="pst-foot-roiu">								
                        <div class="post-share">
                           <ul class="list">
                              <li><i class="fa-solid fa-share-nodes"></i></li>
                              <li><a href="https://www.facebook.com/sharer/sharer.php?u={{url('blog-details/'.$blog->slug)}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                              <li><a href="https://twitter.com/intent/tweet?text={{url('blog-details/'.$blog->slug)}}"  target="_blank"><i class="fab fa-twitter"></i></a></li>
                              <li><a href="https://www.linkedin.com/sharing/share-offsite/?url={{url('blog-details/'.$blog->slug)}}"  target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                              <!-- <li><a href="#"><i class="fab fa-instagram"></i></a></li> -->
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               
               <!-- Single blog Grid -->
               <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                  <?php /*<div class="box-block-wrap ">
                     <div class="box-block-wrap_header">
                        <h4 class="box-block-wrap_title">Categories</h4>
                     </div>
                     <div class="box-block-wrap-body">
                        <ul class="blog-category">
                        @foreach($category as $val)
												<li><a href="{{url('blog?category='.$val->id)}}">{{$val->title}}</a> <span class="catIcon"><i class="fa-solid fa-arrow-right"></i></span></li>
												@endforeach
                        </ul>
                     </div>
                  </div> */ ?>
                  <div class="pg-side-block ">
                     <div class="pg-side-block-head box_header">
                            <div class="vesh-detail-bloc_header">
                                <h4 class="property_contact_title no-arrow"> Recent Post</h4>
                            </div>
                        </div>
                     <div class="pg-side-block-body">
                     <div class="tab-content" id="pills-tabContent">
                                <div class="">
                                    <div class="pg-side-block-info pt-3 pb-4">
                                        <div class="row gx-xl-4 gx-lg-4">
                     @foreach ($recent_listing as $val)
                        <div class="blog-list-block border">
                           <div class="agent-list-fliop">
                              <div class="blog-list-thumb">
                                 <a href="{{url('blog-details/'.$val->slug)}}"><img src="{{url('uploads/blog/'.$val->image)}}" class="img-fluid rounded" alt=""></a>
                              </div>
                           </div>
                           <div class="agent-list-caption">
                              <div class="agent-title-uio mb-2">
                                 <h5 class="mb-0"><a href="{{url('blog-details/'.$val->slug)}}">{!! Str::limit($val->title, 25, ' ...') !!}</a></h5>
                              </div>
                              <div class="agent-yytr small font--medium mb-3"><p>{!! Str::limit($val->short_desctiption, 150, ' ...') !!}</p></div>
                           </div>
                        </div>
                        @endforeach
                                        </div></div></div></div>
                     </div>
                  </div>

                  <div class="pg-side-block">
                        <div class="pg-side-block-head box_header">
                            <div class="vesh-detail-bloc_header">
                                <h4 class="property_contact_title no-arrow"> Top Rated Projects</h4>
                            </div>
                        </div>
                        <div class="pg-side-block-body">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="">
                                    <div class="pg-side-block-info pt-3 pb-4">
                                        <div class="row gx-xl-4 gx-lg-4">
                                            @foreach ($top_rated_projects as $val)
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="vesh-list-categ-box">
                                                    <div class="vesh-categ-list-links" style="padding: 0px;" >
                                                        <div class="">
                                                            <a href="{{url('property-details/'.$val->slug)}}"> 
                                                                <img src="{{url('uploads/property/'.$val->image)}}" class="img-fluid mx-auto" style="width: 165px; height:102px; border-radius: 5px 0px 0px 6px;">
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
                                </div>

                            </div>
                        </div>
                    </div>
               </div>
               
            </div>
            <!-- /row -->					
            
         </div>
               
      </section>	
   
      <!-- end hot selling projects -->
@endsection

