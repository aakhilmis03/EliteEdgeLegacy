@extends('layouts.app')

@section("extra_css")
   <meta property="og:image" content="{{url('uploads/property/'.$result->image)}}">
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
@endsection

@section('content')
<!-- ============================ Page Title Start================================== -->
<div class="gray-simple" style="padding-top: 25px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <span class="ipn-subtitle"  style="color: #000;"><a href="{{url('/')}}">Home</a> <img class="ml-md-3" src="https://img.icons8.com/offices/100/000000/double-right.png" width="10" height="10"> <span><a href="#">{{$result->type}}</a><span> <img class="ml-md-3" src="https://img.icons8.com/offices/100/000000/double-right.png" width="10" height="10"> <span>{{$result->title}}<span></span>
            </div>
        </div>
    </div>
</div>


<!-- ============================ Page Title End ================================== -->
<!-- start hot selling projects -->
<section class="gray-simple" style="padding-top: 25px;">

    <div class="container">

        <!-- row Start -->
        <div class="row">

            <!-- Blog Detail -->
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="vesh-detail-bloc">
                    <div class="project_details_gallery">
                        <div class="featured_slick_gallery gray">
                            <div class="featured_slick_gallery-slide">
                                @foreach($gallery as $val)
                                <div class="featured_slick_padd">
                                    <a href="{{url('uploads/property/'.$val->image)}}" class="mfp-gallery">
                                        <img src="{{url('uploads/property/'.$val->image)}}" class="img-fluid mx-auto">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="alert alert-info mt-3" role="alert" style="border: 2px solid;">
                            <div class="card-body detail_box_padding">
                                <h5 class="font-weight-semibold2 about-why-choose-us-color">Why Invest through Elite
                                    Edge Legacy ?</h5>
                                <div class="fs-13 about-why-choose-us-color">
                                    <b>Transparent Pricing</b> : At Elite Edge Legacy, we provide clear and upfront
                                    pricing for every property.
                                </div>
                                <div class="fs-13 about-why-choose-us-color">
                                    <b>Customized Property Search</b> : Discover properties tailored to your preferences
                                    with our advanced search filters.
                                </div>
                                <div class="fs-13 about-why-choose-us-color">
                                    <b>Expert Guidance</b> : Our team of real estate experts is dedicated to helping you
                                    every step of the way.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Single blog Grid -->
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="box-block-wrap ">
                    <div class="box-block-wrap_header">
                        <h4 class="property_title no-puck">{{$result->title}}</h4>
                        <span class="text-mid details-location"><i
                                class="fa-solid fa-location-dot me-2"></i>{{$result->location}},
                            {{$result->city}}</span>
                        <div class="details-border"></div>
                        <div class="property_detail_price">{{$result->price}}</div>
                        <div class="details-border"></div>
                        <div class="vl-elfo-group details-size">
                            <div class="vl-elfo-icon"><i class="fa-solid fa-file-contract"></i></div>
                            <div class="vl-elfo-caption">
                                <h6>Project RERA</h6>
                                <p>{{$result->rera_reg}}</p>
                            </div>
                        </div>
                        <div class="details-border"></div>
                        <div class="vl-elfo-group details-size">
                            <div class="vl-elfo-icon"><i class="fa-solid fa-maximize"></i></div>
                            <div class="vl-elfo-caption">
                                <h6>Project Size</h6>
                                <p>{{$result->area}}</p>
                            </div>
                        </div>
                        <div class="details-border"></div>
                        <div class="vl-elfo-group details-size">
                            <div class="vl-elfo-icon"><i class="fa-solid fa-building"></i></div>
                            <div class="vl-elfo-caption">
                                <h6>Properties for sale</h6>
                                <p>{{$result->builder}}</p>
                            </div>
                        </div>
                        <div class="details-border"></div>
                        <div class="fls-bystar">
                            <div class="rating_text"> 5 Ratings</div>
                            <span class="fas fa-star fill"></span>
                            <span class="fas fa-star fill"></span>
                            <span class="fas fa-star fill"></span>
                            <span class="fas fa-star fill"></span>
                            <span class="fas fa-star fill"></span>
                        </div>
                        <div class="project_status">Status : <b>( {{$result->pro_status}} )</b></div>
                       
                        <div class="mb-2 mt-3">
                            <a target="_blank" href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#login" class="btn font--medium btn-primary contact-primary btn-theme contactus_custom_btn" style="width:100%;"><i class="fa-solid fa-download"></i>  &nbsp;&nbsp;DOWNLOAD BROCHURE</a>
                        </div>
                        <div class="mb-2">
                            <a target="_blank" href="https://api.whatsapp.com/send/?phone=919999977783&text=Hi! I'm Interested to buy {{$result->title}}" class="btn font--medium btn-primary contact-primary btn-theme contactus_custom_btn" style="width:100%;"> <img src="{{url('front_assets/img/whatsapp.svg')}}" class="contactus_whatsapp_icon"> CHAT WITH US</a>
                        </div>
                    </div>

                </div>
             

            </div>

        </div>
        <!-- /row -->
        <!-- row Start -->
        <div class="row">
            <!-- Blog Detail -->
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="vesh-detail-bloc">
                    <div class="vesh-detail-bloc_header box_header">
                        <h4 class="property_block_title no-arrow">About Property</h4>
                    </div>
                    <div class="vesh-detail-bloc-body mt-3">
                        <div class="row g-3">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                {!! $result->overview !!}
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Amenties Detail -->
                <div class="vesh-detail-bloc">
                    <div class="vesh-detail-bloc_header box_header">
                        <h4 class="property_block_title no-arrow">Amenties</h4>
                    </div>
                    <div class="vesh-detail-bloc-body mt-3">
                        <ul class="avl-features third color">
                            @foreach($amenities as $val)
                                <li>{{$val->title}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                @if(!empty($result->key_highlights))
                <div class="vesh-detail-bloc">
                    <div class="vesh-detail-bloc_header box_header">
                        <h4 class="property_block_title no-arrow">Key Highlights</h4>
                    </div>
                    <div class="vesh-detail-bloc-body mt-3">
                        <ul class="avl-features third color">
                            @php
                                $key_highlights = (!empty($result->key_highlights))?explode(',',
                                $result->key_highlights):array();
                                @endphp
                                @foreach ($key_highlights as $kh)
                                <li>{{$kh}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                @if(count($price_list)>0)
                <div class="vesh-detail-bloc">
                    <div class="vesh-detail-bloc_header box_header">
                        <h4 class="property_block_title no-arrow">Payment Plan</h4>
                    </div>
                        <div class="vesh-detail-bloc-body mt-3">
                            <div class="overview-content career">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th align="left" valign="middle">Unit Type</th>
                                            <th align="center" valign="middle">Area</th>
                                            <th align="center" valign="middle">Price*</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($price_list as $p_k => $p_v)
                                        <tr>
                                            <td td="" align="left" valign="middle"> <span>{{$p_v->unit_type}}</span> </td>
                                            <td td="" align="left" valign="middle"> <span>{{$p_v->unit_area}}</span></td>
                                            <td td="" align="left" valign="middle"> <span>{{$p_v->unit_price}}</span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                </div>
                @endif

                <div class="vesh-detail-bloc">
                    <div class="vesh-detail-bloc_header box_header">
                        <h4 class="property_block_title no-arrow">Project Location</h4>
                    </div>
                    <div class="vesh-detail-bloc-body mt-3">
                        <div class="overview-content">
                            {!! set_map_iframe($result->map_url) !!}
                        </div>
                        @if(!empty($result->location_advantage))
                            <ul class="avl-features third color  mt-3">
                                @php
                                $location_advantage = (!empty($result->location_advantage))?explode(',',
                                $result->location_advantage):array();
                                @endphp
                                @foreach ($location_advantage as $kh)
                                <li>{{$kh}}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                
                @if(filter_var($result->video_url, FILTER_VALIDATE_URL) !== false)
                <div class="vesh-detail-bloc">
                    <div class="vesh-detail-bloc_header box_header">
                        <h4 class="property_block_title no-arrow">Project Video</h4>
                    </div>
                        <div class="vesh-detail-bloc-body mt-3">
                            <div class="overview-content">
                                <div class="video-thumb youtube-thumb-box">
                                    <img src="{{getYoutubeThumb($result->video_url)}}" class="img-fluid mx-autox">
                                    <a class="popup-yt hvr-ripple-out popup-youtube" href="https://www.youtube.com/watch?v={{GetYouTubeId($result->video_url)}}">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                </div>
                @endif
                @if(count($que_ans)>0)
                <div class="vesh-detail-bloc">
                    <div class="vesh-detail-bloc_header box_header">
                        <h4 class="property_block_title no-arrow">Frequently Asked Questions (FAQs)</h4>
                    </div>
                        <div class="vesh-detail-bloc-body mt-3">
                            <div class="overview-content career">
                                <div class="accordion" id="accountActivation">
                                @foreach ($que_ans as $k => $val)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="account_{{$val->id}}">
                                            <button class="accordion-button {{ $k=='0' ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#accountOne_{{$val->id}}" aria-expanded="true" aria-controls="accountOne_{{$val->id}}">
                                                {{$val->question}}
                                            </button>
                                            </h2>
                                            <div id="accountOne_{{$val->id}}" class="accordion-collapse collapse  {{ $k=='0' ? 'show' : '' }}" aria-labelledby="account_{{$val->id}}" data-bs-parent="#accountActivation">
                                            <div class="accordion-body">{!! $val->answer !!}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                </div>
                @endif
                <div class="vesh-detail-bloc">
                    <div class="vesh-detail-bloc_header box_header">
                        <h4 class="property_block_title no-arrow">About Developer</h4>
                    </div>
                        <div class="vesh-detail-bloc-body  mt-3">
                            <div class="overview-content">
                                <div class="agent-list-block border">
                                    <div class="agent-list-fliop">
                                        <div class="agent-list-thumb">
                                            <a href="#"><img src="{{url('uploads/builder/'.$result->builder_image)}}"
                                                    class="img-fluid rounded" alt=""></a>
                                            <span class="verify-icon"><i class="fa-solid fa-check"></i></span>
                                        </div>
                                    </div>
                                    <div class="agent-list-caption">
                                        <div class="agent-title-uio mb-2">
                                            <h5 class="mb-0"><a href="#">{{$result->builder}}</a></h5>
                                            <span class="font--medium small"><i
                                                    class="fa-solid fa-location-dot me-2"></i>
                                                {{$result->builder_location}}</span>
                                        </div>
                                        <div class="agent-yytr small font--medium mb-3">
                                            <p>{!! $result->builder_desc !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

            </div>
            <!-- Single blog Grid -->
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="pg-side-groups" id="fixed">
                    <div class="pg-side-block">
                        <div class="pg-side-block-head box_header">
                            <div class="vesh-detail-bloc_header">
                                <h4 class="property_contact_title no-arrow"><i class="fa-regular fa-envelope"></i>
                                    Contact Our Real Estate Experts</h4>
                            </div>
                        </div>
                        <div class="pg-side-block-body">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="">
                                    <div class="pg-side-block-info pt-3 pb-4">
										<form method="post" class="myForm" action="{{url('saveEnquiryData')}}">
											@csrf
											<input type="hidden" name="title" value="{{$result->title}}" >
											<div class="sides-widget-body simple-form">
												<div class="form-group">
													<input type="text" class="form-control" placeholder="Your Name" name="name" required>
													@error('name')
														<span class="help-block">{{$errors->first('name')}}</span>
													@enderror
												</div>
                                                <div class="form-group">
													<input type="number" class="form-control" placeholder="Your Phone No." name="phone" data-parsley-required-message="Please enter valid phone no." minlength="10" maxlength="10" required >
													@error('phone')
														<span class="help-block">{{$errors->first('phone')}}</span>
													@enderror
												</div>
												<div class="form-group">
													<input type="email" class="form-control" placeholder="Your Email Address" name="email" required>
													@error('email')
														<span class="help-block">{{$errors->first('email')}}</span>
													@enderror
												</div>
												<div class="form-group">
													<textarea  class="form-control" placeholder="write your query here..." name="message"></textarea>
												</div>
												<button type="submit" class="btn btn-theme font--medium full-width">Send Message</button>
											</div>
										</form>
                                    </div>
                                </div>

                            </div>
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

        </div>
        <!-- /row -->
    </div>

</section>
<!-- end hot selling projects -->
@endsection

@section('extra_js')
<!-- property details Modal -->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog property_detail_modal">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&#10006;</button>
          <div class="modal-form-div">
            <div class="modal-form">
              <div class="form-property-details">
                <h4>Leave Your Details Here</h4>
                <P>Assured Call Back Within 5 Minutes</P>
                <form method="post" class="myForm" action="{{url('saveEnquiryData')}}">
                                @csrf
									<div class="form-floatingx mb-2">
										<input type="text" name="name" class="form-control" placeholder="Enter Your Name" required>
									</div>
                                    <div class="form-floatingx mb-2">
										<input type="number" name="phone" class="form-control" placeholder="Enter Phone No." data-parsley-required-message="Please enter valid phone no." minlength="10" maxlength="10" required >
									</div>
									<div class="form-floatingxx mb-2">
										<input type="email" name="email" class="form-control" placeholder="Enter Email Address" required>
									</div>
									<div class="form-group mt-4">
                                        <button type="submit" class="btn btn-theme font--medium full-width">Request a Call Back</button>
									</div>
								</form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- property details Modal -->

<script src="{{ URL::asset('parsley/parsley.js')}}"></script>
<script>
$(document).ready(function ( ) {
  $('.myForm').parsley();
 });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<script>
$(function() {
    $('.popup-youtube, .popup-vimeo').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });
});


const items = document.querySelectorAll(".accordion button");
function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');
  
  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }
  
  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}
items.forEach(item => item.addEventListener('click', toggleAccordion));
</script>



@endSection