@extends('layouts.app')
@section('content')
<!-- ============================ Page Title Start================================== -->
<div class="page-title" style="background:#000 url({{url('/front_assets/img/page-top-banner.png')}}) no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2 class="ipt-title">Frequently Asked Questions</h2>
                <!-- <span class="ipn-subtitle">Get all Awards & Recognition</span> -->
            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->
<!-- start hot selling projects -->
<section class="gray-simple">
    <div class="container">
        <div class="row ">
            <div class="box-block-wrap-group">
                <div class="box-block-wrap">
                   

                    <div class="box-block-wrap-body career">
                        <div class="accordion" id="accountActivation">
                           			<div class="accordion-item">
										<h2 class="accordion-header" id="account_3">
										  <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#accountOne_3" aria-expanded="true" aria-controls="accountOne_3">
											Could you tell me what kind of charges/taxes are mandatory at the time of purchasing property?

										  </button>
										</h2>
										<div id="accountOne_3" class="accordion-collapse collapse  show" aria-labelledby="account_3" data-bs-parent="#accountActivation">
										  <div class="accordion-body"><p>When it comes to buying a property, apart from the price of the property, the buyer needs to pay the registration cost, stamp duty on registration, service tax, value added tax. </p></div>
										</div>
									</div>
									<div class="accordion-item">
										<h2 class="accordion-header" id="account_2">
										  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accountOne_2" aria-expanded="true" aria-controls="accountOne_2">
											What kind of documents or formality is needed while buying a property?
										  </button>
										</h2>
										<div id="accountOne_2" class="accordion-collapse collapse  " aria-labelledby="account_2" data-bs-parent="#accountActivation">
										  <div class="accordion-body">Few documents are required while buying a property including a blueprint of the building plan or layout, certificate of commencement, certificate of completion, and permission for non-agricultural use of land in case the land is originally agricultural land, and  NOC from the builders is also needed. In case of resale, a previous sale deed is also required. </div>
										</div>
									</div>
									
									<div class="accordion-item">
										<h2 class="accordion-header" id="account_3">
										  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accountOne_3" aria-expanded="true" aria-controls="accountOne_3">
											What are things you need to check at the time of signing the agreement?
										  </button>
										</h2>
										<div id="accountOne_3" class="accordion-collapse collapse  " aria-labelledby="account_3" data-bs-parent="#accountActivation">
										  <div class="accordion-body">Before signing the purchase agreement, you need to check all the details like the base price mentioned, additional charges like PLC, Clubhouse Membership, Carpet area along with facilities taxes applicable, payment mode, occupation certificate, building insurance, schedule of possession, and penalty clause in case of any project delay. </div>
										</div>
									</div>
									
									<div class="accordion-item">
										<h2 class="accordion-header" id="account_4">
										  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accountOne_4" aria-expanded="true" aria-controls="accountOne_4">
											What should a consumer keep in mind while purchasing a house?
										  </button>
										</h2>
										<div id="accountOne_4" class="accordion-collapse collapse  " aria-labelledby="account_4" data-bs-parent="#accountActivation">
										  <div class="accordion-body">There are tons of factor that one need to consider before buying properties like the locality or the area of the home. You also need to check whether all the basic and civic utilities are available, transport facilities, construction quality, the carpet, built-up and super built-up area of the flat, provisions of basic features like water or power supply, and most importantly, the reputation of the developer. </div>
										</div>
									</div>
									
									<div class="accordion-item">
										<h2 class="accordion-header" id="account_5">
										  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accountOne_5" aria-expanded="true" aria-controls="accountOne_5">
										   Can you tell me the meaning of stamp duty?
										  </button>
										</h2>
										<div id="accountOne_5" class="accordion-collapse collapse  " aria-labelledby="account_5" data-bs-parent="#accountActivation">
										  <div class="accordion-body">Stamp duty refers to the tax paid to the government just like sales tax or income tax. It is a paid document which is an important legal instrument that needs to be taken care of. </div>
										</div>
									</div>
								</div>
                    </div>
                </div>

            </div>

        </div>
        <!-- Start Pagination -->
    </div>
</section>
<!-- end hot selling projects -->
@endsection