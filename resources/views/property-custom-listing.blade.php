@extends('layouts.app')
@section('content')
 <!-- ============================ Page Title Start================================== -->
 <div class="page-title" style="background:#000 url({{url('/front_assets/img/page-top-banner.png')}}) no-repeat;">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 col-md-12">
                     <h2 class="ipt-title">{{$heading}}</h2>
                     <span class="ipn-subtitle text-white">{{$sub_heading}}</span>
                  </div>
               </div>
            </div>
         </div>
         <!-- ============================ Page Title End ================================== -->
         <!-- start hot selling projects -->
         <section class="mid">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 col-md-12">
                     <div class="mt-4 bg-white border rounded px-3 py-3 mb-5 property-list-search-box">
                       
                     <form method="get" class="filter_form" enctype="multipart/form-data">
                        <!-- @csrf -->
                                 <div class="row">
                                    <div class="col-md-2">
                                       <select title="Select City" class="form-control" name="city">
                                          <option value="">Select City</option>
                                          @foreach($city as $val)
                                          <option value="{{$val->id}}" {{ (isset($_GET['city']) && $_GET['city']==$val->id) ? 'selected' : '' }}>{{$val->title}}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                    <div class="col-md-2">
                                       <select class="form-control propertyType" name="type">
                                          <option value="">Property Type </option>
                                          <option value="residential"  {{ (isset($_GET['type']) && $_GET['type']=='residential') ? 'selected' : '' }}>Residential</option>
                                          <option value="commercial" {{ (isset($_GET['type']) && $_GET['type']=='commercial') ? 'selected' : '' }}>Commercial</option>
                                          <option value="sco" {{ (isset($_GET['type']) && $_GET['type']=='sco') ? 'selected' : '' }}>SCO</option>
                                          <option value="residential plots" {{ (isset($_GET['type']) && $_GET['type']=='Residential Plots') ? 'selected' : '' }}>Residential Plots</option>
                                       </select>
                                    </div>
                                    <!-- Status -->
                                    <div class="col-md-2">
                                       <select class="form-control" name="budget">
                                          <option value="">Budget</option>
                                          <option value="2000000-5000000" {{ (isset($_GET['budget']) && $_GET['budget']=='2000000-5000000') ? 'selected' : '' }}>₹ 20 Lac to ₹ 50 Lac</option>
                                          <option value="5000000-7000000" {{ (isset($_GET['budget']) && $_GET['budget']=='5000000-7000000') ? 'selected' : '' }}>₹ 50 Lac to ₹ 70 Lac</option>
                                          <option value="7000000-10000000" {{ (isset($_GET['budget']) && $_GET['budget']=='7000000-10000000') ? 'selected' : '' }}>₹ 70 Lac to ₹ 1 Crore</option>
                                          <option value="10000000-50000000" {{ (isset($_GET['budget']) && $_GET['budget']=='10000000-50000000') ? 'selected' : '' }}>₹ 1 Crore to ₹ 5 Crore</option>
                                          <option value="50000000-100000000" {{ (isset($_GET['budget']) && $_GET['budget']=='50000000-100000000') ? 'selected' : '' }}>₹ 5 Crore to ₹ 10 Crore</option>
                                          <option value="100000000-150000000" {{ (isset($_GET['budget']) && $_GET['budget']=='100000000-150000000') ? 'selected' : '' }}>₹ 10 Crore to ₹ 15 Crore</option>
                                       </select>
                                    </div>
                                    <!-- Main Search Input -->
                                    <div class="col-md-5">
                                       <div class="utf-main-search-input-item">
                                          <input name="q" type="text" placeholder="Enter Keywords..." value="{{ (isset($_GET['q'])) ? $_GET['q'] : '' }}" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-md-1">
                                       <div class="utf-main-search-input-item">
                                          <button class="button listing-srearch-btn w-100"><i class="fa fa-search"></i> Search</button>
                                       </div>
                                    </div>
                                 </div>
                              </form>
                     </div>
                  </div>
               </div>
               <div class="row justify-content-left gx-3 gy-4 property-list">
                  @if(count($property_data)>0)
                  @foreach ($property_data as $val)
                  <!-- Single Property -->
                  <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                     <div class="veshm-list-wraps">
                        <div class="veshm-type"><span>{{$val->type}}</span></div>
                        <div class="veshm-list-thumb">
                           <a href="{{url('property-details/'.$val->slug)}}" >
                              <img src="{{url('uploads/property/'.$val->image)}}" class="img-fluid mx-autox" >
                           </a>
                        </div>
                        <div class="veshm-list-block">
                           <div class="veshm-list-head">
                              <div class="veshm-list-head-caption">
                              <div class="rlhc-price">
												<h4 class="product_name "><a href="{{url('property-details/'.$val->slug)}}" >{!! Str::limit($val->title, 24, ' ...') !!}</a></h4>
												<div class="rlhc-title-name verified">By <a href="{{url('developer/'.$val->builder_slug)}}" >{{$val->builder}}</a></div>
												<div class="list_details"><i class="fa-solid  fa-location-dot"></i>  {{$val->location}}, {{$val->city}} </div>
												<div class="list_details"><i class="fa-solid fa-vector-square"></i>  {{$val->area}} </div>
											</div>
                              </div>
                           </div>
                           <div class="veshm-list-footer">
                              <div class="veshm-list-circls">
                                 <ul>
                                    <li>
                                       <p class="listing-price"><i class="bi bi-currency-rupee"></i> {{$val->price}}</p>
                                    </li>
                                    <li>
                                       <div class="detailBtn"><a href="{{url('property-details/'.$val->slug)}}">View Details</a></div>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Single Property -->
                  @endforeach
                  @else
                  <div class="amwd-project-sec-main-border">
                     <div class="row">
                        <div class="col-md-4">
                           <div class="row">
                              <div style="padding:10px;">Result not available</div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endif
               </div>
               <!-- Start Pagination -->
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                     {!! $property_data->withQueryString()->links('pagination::bootstrap-5') !!}
                     <!-- <nav aria-label="Page navigation example">
                        <ul class="pagination">
                           <li class="page-item">
                              <a class="page-link" href="JavaScript:Void(0);" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                              </a>
                           </li>
                           <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">1</a></li>
                           <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">2</a></li>
                           <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">3</a></li>
                           <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">4</a></li>
                           <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">5</a></li>
                           <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">6</a></li>
                           <li class="page-item">
                              <a class="page-link" href="JavaScript:Void(0);" aria-label="Next">
                              <span aria-hidden="true">&raquo;</span>
                              </a>
                           </li>
                        </ul>
                     </nav> -->
                  </div>
               </div>

            </div>
         </section>
         <!-- end hot selling projects -->
@endsection
@section('extra_js')
<script>
	/*$(document).ready(function() {
      $(".propertyType").on("change",function(){
         var type_data = $(this).val();
         type_data = type_data.replace(" ", "-");
         $('.filter_form').attr('action',"{{url('property')}}/"+ type_data );
      });
	});*/
</script>
@endsection
