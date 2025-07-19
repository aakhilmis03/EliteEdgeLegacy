@extends('layouts.app')
@section('content')
 <!-- ============================ Page Title Start================================== -->
 <div class="page-title" style="background:#000 url({{url('front_assets')}}/img/page-top-banner.png) no-repeat;">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 col-md-12">
                     <h2 class="ipt-title">Career</h2>
                     <span class="ipn-subtitle"><a href="#" style="color: #199dff;">Home</a> / <span style="color: #fff;">Career<span></span>
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
						
                  <div class="col-lg-7 col-md-7">
                     <div class="box-block-wrap">
                        <div class="box-block-wrap-body career">
                           <h4 class="mb-4  mt-3" >Currently, we have following openings: </h4>
                           
                           <div class="accordion" id="accountActivation">
                           @foreach ($jobs as $k => $val)
									<div class="accordion-item">
										<h2 class="accordion-header" id="account_{{$val->id}}">
										  <button class="accordion-button {{ $k=='0' ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#accountOne_{{$val->id}}" aria-expanded="true" aria-controls="accountOne_{{$val->id}}">
											{{$val->title}}
										  </button>
										</h2>
										<div id="accountOne_{{$val->id}}" class="accordion-collapse collapse  {{ $k=='0' ? 'show' : '' }}" aria-labelledby="account_{{$val->id}}" data-bs-parent="#accountActivation">
										  <div class="accordion-body">{!! $val->description !!}</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
                     </div>	
                  </div>
                  <div class="col-lg-5 col-md-5">
                     <div class="box-block-wrap">
                        <div class="box-block-wrap-body">
                           <div class="sec-heading centerxxx mt-3">
                              <h3>Ready to Start Your Journey With Elite Edge Legacy ?</h3>
                              <p>Submit your CV, we will contact you as soon as we have relevant openings</p>
                              <div class="comment-form mt-4">
                                 <form method="post" class="myForm" action="{{url('saveJobData')}}" enctype="multipart/form-data">
                                 @csrf
											<!-- <input type="hidden" name="title" value="Contact Us" > -->
                                    <div class="row">
                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                          <div class="form-group">
                                             <input type="text" class="form-control" placeholder="Your full name"  name="name" required>
                                             @error('name')
                                                <span class="help-block">{{$errors->first('name')}}</span>
                                             @enderror
                                          </div>
                                       </div>
                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                          <div class="form-group">
                                             <input type="text" class="form-control" placeholder="Your Email Address" name="email" required>
                                             @error('email')
                                                <span class="help-block">{{$errors->first('email')}}</span>
                                             @enderror
                                          </div>
                                       </div>
                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                          <div class="form-group">
                                             <input type="number" class="form-control" placeholder="Your Phone No." name="phone" data-parsley-required-message="Please enter valid phone no." minlength="10" maxlength="10" required="">
                                             @error('phone')
                                                <span class="help-block">{{$errors->first('phone')}}</span>
                                             @enderror
                                          </div>
                                       </div>
                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                          <div class="form-group">
                                             <select class="form-control" name="department" required>
                                                <option value="">Department*</option>
                                                <option value="Sales & Marketing">Sales & Marketing</option>
                                                <option value="Administration">Administration</option>
                                                <option value="Finance">Finance</option>
                                                <option value="IT">IT</option>
                                                <option value="CRM">CRM</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                          <div class="form-group">
                                             <input type="text" class="form-control" placeholder="Years of experience*" name="experience" required>
                                             @error('experience')
                                                <span class="help-block">{{$errors->first('experience')}}</span>
                                             @enderror
                                          </div>
                                       </div>
                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                          <div class="form-group">
                                             <input type="text" class="form-control" placeholder="Current CTC*" name="ctc" required>
                                             @error('ctc')
                                                <span class="help-block">{{$errors->first('ctc')}}</span>
                                             @enderror
                                          </div>
                                       </div>
                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                          <div class="form-group">
                                             <input type="file" class="form-control" placeholder="Current CTC*" name="resume" required>
                                             @error('resume')
                                                <span class="help-block">{{$errors->first('resume')}}</span>
                                             @enderror
                                          </div>
                                       </div>
                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                          <div class="form-group">
                                             <button class="btn btn-primary contact-primary btn-theme pull-left" name="submit" type="submit">Apply Now &nbsp;&nbsp;<img src="{{url('front_assets/img/arrow.svg')}}" class="contactus_whatsapp_icon"></button> 
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
					<!-- /row -->		
					
				</div>
						
			</section>
         <!-- end hot selling projects -->
@endsection

@section('extra_js')
<script src="{{ URL::asset('parsley/parsley.js')}}"></script>
<script>
$(document).ready(function ( ) {
  $('.myForm').parsley();
 });
</script>
@endSection