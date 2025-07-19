@extends('layouts.app')
@section('content')
<!-- ============================ Page Title Start================================== -->
<div class="page-title" style="background:#000 url({{url('front_assets')}}/img/page-top-banner.png) no-repeat;">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 col-md-12">
                     <h2 class="ipt-title">Our Latest Blog & Updates</h2>
                     <span class="ipn-subtitle text-white">Stay ahead of the curve with Elite Edge – your go-to source for the latest news, exclusive updates, and industry-leading events!</span>
                  </div>
               </div>
            </div>
         </div>
         <!-- ============================ Page Title End ================================== -->
         <!-- start hot selling projects -->
         <section class="gray-simple">
				<div class="container">
					<div class="col-lg-12 col-md-12">
						<div class="box-block-wrap-group">
							<div class="row">
								<div class="col-lg-12 col-md-12">
									<div class="box-block-wrap">
										<div class="box-block-wrap_header">
											<h4 class="box-block-wrap_title">Market Insights</h4>
										</div>
										<div class="box-block-wrap-body row " id="market_insights_blog">
                                 @foreach($market_insights as $val)
											<div class="col-lg-3 col-md-4 col-sm-12 text-center latest_blog_block">
												<div class="latest-blog">
													<a href="{{url('blog-details/'.$val->slug)}}">
														<div class="clp-img">
															<img src="{{url('uploads/blog/'.$val->image)}}" class="img-fluid rounded" alt="">
														</div>
														<div class="latest-blog-title">
															<h4>{!! Str::limit($val->title, 35, ' ...') !!}</h4>
														</div>
													</a>
													
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-md-12" style="height: 20px;"></div>
								<div class="col-lg-12 col-md-12">
									<div class="box-block-wrap">
										<div class="box-block-wrap_header">
											<h4 class="box-block-wrap_title">Buying Guides</h4>
										</div>
										<div class="box-block-wrap-body" >
											<div class="row " id="top_story_blog">
						
                                 @foreach ($buying_guides as $val)
						<!-- Single blog Grid -->
						<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
							<div class="veshm-grid-blog">
                        <a href="{{url('blog-details/'.$val->slug)}}">
                           <div class="veshm-grid-blog-thumb">
                              <img src="{{url('uploads/blog/'.$val->image)}}" class="img-fluid" alt="">
                           </div>
                           <div class="veshm-grid-blog-body">
                              <div class="veshm-grid-body-header">
                                 <div class="veshm-grid-title"><h4><a href="{{url('blog-details/'.$val->slug)}}">{!! Str::limit($val->title, 45, ' ...') !!}</a></h4></div>
                              </div>
                              <div class="veshm-grid-body-middle">
                                 <p>{{$val->short_desctiption}}</p>
                              </div>
                           </div>
                        </a>
							</div>
						</div>
						@endforeach
												
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-lg-12 col-md-12" style="height: 20px;"></div>
								<div class="col-lg-12 col-md-12">
									<div class="box-block-wrap">
										<div class="box-block-wrap_header">
											<h4 class="box-block-wrap_title">Latest Update</h4>
										</div>
										<div class="box-block-wrap-body" >
											<div class="row " id="latest_update_blogs">
						
												@foreach ($blogs as $val)
						<!-- Single blog Grid -->
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12" style="margin:5px;">
							<div class="veshm-grid-blog">
                        <a href="{{url('blog-details/'.$val->slug)}}">
                           <div class="veshm-grid-blog-thumb">
                              <img src="{{url('uploads/blog/'.$val->image)}}" class="img-fluid" alt="">
                           </div>
                           <div class="veshm-grid-blog-body">
                              <div class="veshm-grid-body-header">
                                 <div class="veshm-grid-title"><h4><a href="{{url('blog-details/'.$val->slug)}}">{!! Str::limit($val->title, 45, ' ...') !!}</a></h4></div>
                              </div>
                              <div class="veshm-grid-body-middle">
                                 <p>{{$val->short_desctiption}}</p>
                              </div>
                           </div>
                        </a>
							</div>
						</div>
						@endforeach
												
											</div>
										</div>
									</div>
								</div>

								<!-- Start Pagination -->
					<!-- <div class="row">	
						<div class="col-lg-12 col-md-12 col-sm-12">
							<nav aria-label="Page navigation example">
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
							</nav>
						</div>
					</div> -->
							</div>
						</div>


						
					</div>
					

				</div>
			</section>
         <!-- end hot selling projects -->
@endsection

