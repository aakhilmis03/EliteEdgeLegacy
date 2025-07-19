@extends('layouts.app')
@section('content')
 <!-- ============================ Page Title Start================================== -->
 <div class="page-title" style="background:#000 url({{url('/front_assets/img/page-top-banner.png')}}) no-repeat;">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 col-md-12">
                     <h2 class="ipt-title"><span style="text-transform: {{ $type=='sco' ? 'uppercase' : '' }};"> {{$type}} </span> Property</h2>
                     @if($type=='residential')
                     <span class="ipn-subtitle text-white">Redefining luxury living with exclusive residential properties in prime locations.</span>
                     @elseif($type=='commercial')
                     <span class="ipn-subtitle text-white">Premium commercial spaces designed to elevate your business to new heights.</span>
                     @elseif($type=='sco')
                     <span class="ipn-subtitle text-white">Unlock endless opportunities with premium SCO plots in prime locations.</span>
                     @elseif($type=='Residential Plots')
                     <span class="ipn-subtitle text-white">Build your dream home on spacious residential plots in prime, serene locations.</span>
                     @endif
                  </div>
               </div>
            </div>
         </div>
         <!-- ============================ Page Title End ================================== -->
         <!-- start hot selling projects -->
         <section class="mid">
            <div class="container">
                <?php /*
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
               </div> */ ?>
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
<div class="row">
     @if($type == 'residential')
          <!-- Read More Paragraph Section -->
          <div style="margin-top: 50px;">
            <div class="col-lg-12">
               <h3 class="mb-2" style="text-align: center;">Your Search For Home Ends Here</h3>
               <div class="card p-3">
                 <!-- Short Paragraph (Visible initially) -->
                 <p id="short-paragraph" style=" font-size:1rem">
                   {{ \Illuminate\Support\Str::words(strip_tags($description ?? 'Gurgaon has changed. Once known just for its office buildings and highways, it’s now one of the most exciting places to own a home. Whether you are buying your first property or looking to upgrade your lifestyle, the options are many, and the quality keeps getting better. The demand for residential property in Gurgaon has grown steadily over the years. New areas are opening up, and infrastructure is improving, making it easier for people to find the right home.
                     From Golf Course Extension to Dwarka Expressway, every corner of the city is now home to some of the finest residential apartments in Gurgaon. And these aren’t your typical flats. Think spacious rooms, smart features, private balconies, and communities built for people who value comfort, privacy, and quality.'), 125, '...') }}
                 </p>

                 <!-- Full Paragraph (Hidden initially) -->
                 <p id="full-paragraph" style="display:none; font-size:1rem">
                   {!! $description ?? 'Gurgaon has changed. Once known just for its office buildings and highways, it’s now one of the most exciting places to own a home. Whether you are buying your first property or looking to upgrade your lifestyle, the options are many, and the quality keeps getting better. The demand for residential property in Gurgaon has grown steadily over the years. New areas are opening up, and infrastructure is improving, making it easier for people to find the right home.' !!}
                   <br>
                   {!! $description ?? 'From Golf Course Extension to Dwarka Expressway, every corner of the city is now home to some of the finest residential apartments in Gurgaon. And these aren’t your typical flats. Think spacious rooms, smart features, private balconies, and communities built for people who value comfort, privacy, and quality.' !!}
                 </p>


                 <!-- Hidden Subheadings and Content (Initially hidden) -->
                 <div id="additional-content" style="display:none; margin-top: 20px;">

                   <!-- Subheading 1 -->
                   <h4 style="text-align: left;">A City Built for Modern Living</h4>
                   <p style="text-align: left;  font-size:1rem">
                     If you’re looking for a luxury property in Gurgaon, you’ll notice how much attention builders
                     are paying to real living needs. You’ll find homes with walk-in wardrobes, modular kitchens, and
                     spaces designed for families that spend time both indoors and outdoors. With more families,
                     young professionals, and NRIs moving in, developers are finally getting the mix right. The
                     options keep expanding, making it clear that residential property in Gurgaon is where many are
                     choosing to settle or invest.
                     <br> You can choose from high-end towers, quiet low-rise homes, or even exclusive penthouses in
                     Gurgaon that feel like your own sky bungalow. These spaces are more than just beautiful. They
                     are designed to offer peace, privacy, and long-term value.
                   </p>

                   <!-- Subheading 2 -->
                   <h4 style="text-align: left;">Flats That Fit the Way You Live</h4>
                   <p style="text-align: left; font-size:1rem">
                     Not every buyer wants the same thing. Some want to start small, others want more room to grow.
                     That’s why Gurgaon has become the go-to city for all kinds of home seekers. <br>
                     There are plenty of 2 BHK apartments in Gurgaon that work well for young couples, nuclear
                     families, and even those looking for a second home or rental investment. If you need more space,
                     3 BHK apartments in Gurgaon offer that extra room for a home office or a growing family. And for
                     those who don’t want to compromise at all, 4 BHK apartments in Gurgaon give you room to breathe
                     and grow. <br> You’ll also find plenty of low rise floors in Gurgaon for people who prefer
                     privacy, fewer neighbors, and a peaceful vibe. On the other side, high rise apartments in
                     Gurgaon offer stunning views, better air, and the feel of being in the middle of a growing city
                     without the noise.
                   </p>

                   <!-- Subheading 3 -->
                   <h4 style="text-align: left;">Why Everyone’s Watching Gurugram</h4>
                   <p style="text-align: left; font-size:1rem">
                     If you're keeping an eye on new residential projects in Gurugram, this is the perfect time to
                     make a move. Builders are bringing in smarter construction, better planning, and top brands to
                     create homes that actually meet people’s expectations.
                     <br>Most residential projects in Gurgaon today are located near top schools, hospitals, offices,
                     and malls. That means your daily travel is cut short, and your weekends are full of options.
                     It’s not just a city anymore. It’s a lifestyle choice.
                     <br>And the best part? You don’t have to wait years. Many apartments in Gurgaon are ready to
                     move, while others are launching soon with strong timelines and trusted developers behind them.
                     This is why residential property in Gurgaon remains a top choice for both families and
                     investors.
                   </p>

                   <!-- Subheading 4 -->
                   <h4 style="text-align: left;">Your Next Address, Handled Right</h4>
                   <p style="text-align: left; font-size:1rem">
                     At Elite Edge, we don’t believe in showing you just any property. We help you discover the best
                     residential apartments in Gurgaon based on your needs, your goals, and what you expect from your
                     future home.
                     <br>Whether you want something brand new or ready to shift, a flat with a great view or a quiet
                     low-rise, we’ll guide you every step of the way. Buying the right home in Gurgaon is not just
                     about the right place. It’s about making the right choice with the right people.
                     <br>Let’s find that home together. With the right edge.

                   </p>
                 </div>
                 <!-- "Read More" Button -->
                 <button id="toggle-btn" class="btn btn-sm mt-2"
                   style="background-color: white; color: #000; border: none;" onclick="toggleParagraph()">Read
                   More</button>

               </div>
            </div>
          </div>

        

       @elseif($type == 'commercial')
          <!-- Read More Paragraph Section -->
          <div style="margin-top: 50px;">
            <div class="col-lg-12">
               <h3 class="mb-2" style="text-align: center;">Looking for Commercial Property in Gurgaon? You’re in the Right Place</h3>
               <div class="card p-3">
                 <!-- Short Paragraph (Visible initially) -->
                 <p id="short-paragraph">
                   {{ \Illuminate\Support\Str::words(strip_tags($description ?? 'Gurgaon is not your average city. It is where companies start, brands expand, and investors see ongoing earnings. Gurgaon commercial sector offers a wide range of choices, whether your goal is to build a store, set up an office, or purchase real estate to lease.'), 125, '...') }}
                   <br> {!! $description ?? 'At Elite Edge, we help you find spaces that make sense for your goals. Clean paperwork, a good location, solid construction, and reliable builders; we take care of everything, so you don’t have to worry.' !!}
                  </p>

                 <!-- Full Paragraph (Hidden initially) -->
                 <p id="full-paragraph" style="display:none;">
                   {!! $description ?? 'Gurgaon is not your average city. It is where companies start, brands expand, and investors see ongoing earnings. Gurgaon commercial sector offers a wide range of choices, whether your goal is to build a store, set up an office, or purchase real estate to lease.' !!}
                   <br> {!! $description ?? 'At Elite Edge, we help you find spaces that make sense for your goals. Clean paperwork, a good location, solid construction, and reliable builders; we take care of everything, so you don’t have to worry.' !!}
                   
                 </p>
                   

                 <!-- Hidden Subheadings and Content (Initially hidden) -->
                 <div id="additional-content" style="display:none; margin-top: 20px;">

                   <!-- Subheading 1 -->
                   <h4 style="text-align: left;">Why Commercial Property in Gurgaon is Worth Your Time</h4>
                   <p style="text-align: left;">
                     This market is expanding. Every area of Gurgaon is developing, from the Dwarka Expressway to the Golf Course Extension Road. For this reason, one of the most wanted terms nowadays is commercial property in Gurgaon.

                     <br> Here’s what makes it a smart choice:
                     <li>Close to Delhi and well-connected by roads and metro
</li>
                     <li>Surrounded by residential hubs and corporate offices

</li>
                     <li>High daily footfall in major sectors
</li>
                     <li>Popular among national and international brands
</li>
                     <li>Easy to rent out or sell later
</li>
<br>
<p style="text-align: left;">Gurgaon offers a mix of comfort, visibility, and convenience, all things that matter when running a business.
</p>
                   </p>
<br>
<br>

                   <!-- Subheading 2 -->
                   <h4 style="text-align: left;">Commercial Property Investment in Gurgaon: What Makes It Smart?</h4>
                   <p style="text-align: left;">
                     Buying a shop or office space in Gurgaon is no longer just a rich person's move. It’s become a serious business step. People are turning to commercial property investment in Gurgaon because it offers something solid, a regular income, business use, or future resale.

                     <br>Here’s what you get:

                     <li>Shops or offices that can start earning from day one
</li>
                     <li>Faster appreciation due to nearby developments


</li>
                     <li>Builders offering flexible payment plans
</li>
                     <li>Spaces built to suit all types of business

</li>
                    
<br>
<p style="text-align: left;">

Whether you want to invest and rent it out or run your own operations, there’s a place for you here.

</p>
                   </p>
<br>
<br>

                     <!-- Subheading 3 -->
                   <h4 style="text-align: left;">Commercial Projects in Gurgaon You Should Know About</h4>
                   <p style="text-align: left;">
                    Not all buildings are built the same. Some look fancy but lack planning. Others are made to perform well, and that’s where we focus. Elite Edge recommends only those commercial projects in Gurgaon that are in demand, well-located, and builder-approved.

                     <br>We deal with top developers like DLF, M3M, Emaar, Spaze, AIPL, and more. These projects offer:


                     <li>Multiple size options</li>
                     <li>Clear titles and fast possession</li>
                     <li>Retail, office, and mixed-use units</li>
                     <li>Visitor parking and good security</li>
                    
                    <br>
                    <p style="text-align: left;">Whether you want a road-facing shop or a quiet office corner, we’ll help you choose the right one.</p>
                   </p>
<br>
<br>
<!--------end------ sub-3>

                    <!-- Subheading 4 -->
                   <h4 style="text-align: left;">Commercial Shops in Gurgaon: Where Everyday Business Happens</h4>
                   <p style="text-align: left;">
                    Planning to start a café, salon, medical clinic, or showroom? Then commercial shops in Gurgaon are a great pick. They’re located in busy markets or near large housing societies, so you get steady customer visits.

                     <br>Benefits of owning a shop here:

                     <li>Ground-floor or high-street locations</li>
                     <li>Great visibility and branding space
</li>
                     <li>Flexible interiors to match your business type</li>
                     <li>Easy resale or lease options</li>
                    
                    <br>
                    <p style="text-align: left;">Elite Edge will guide you to shops that are ready to use, easy to maintain, and in areas where people actually shop</p>
                   </p>
<br>
<br>                <h4 style="text-align: left;">Rental Property in Gurgaon: Make Money Without Lifting a Finger
</h4>
                   <p style="text-align: left;">
                    Many people today are buying properties to rent them out. Why? Because rental property in Gurgaon is easy to manage and pays better than leaving money in the bank.
                     <br>What makes it work:

                     <li>Steady demand from small businesses and startups</li>
                     <li>Tenants usually pay for maintenance</li>
                     <li>Most leases run for multiple years</li>
                     <li>You keep earning without daily involvement</li>
                    
                    <br>
                    <p style="text-align: left;">We help you pick properties where rent starts flowing quickly, no delay, no drama.</p>
                   </p>

                   <br><br>
                    <h4 style="text-align: left;">What Makes Elite Edge Different?</h4>
                   <p style="text-align: left;">
                     We’re not just another real estate company. We actually listen. Whether you're buying for your business or for monthly income, we’ll show you the right listings and tell you what’s good, what’s not, and what to expect.
                     <br>We don’t push you to buy. We help you choose.
                  
                   </p>
                   <br>
<h4 style="text-align: left;">Let’s Find Your Commercial Space in Gurgaon</h4>
                   <p style="text-align: left;">
                    Whether you’re hunting for commercial shops in Gurgaon, planning a commercial property investment in Gurgaon, or just curious about the latest commercial projects in Gurgaon, we’re here to assist you.<br> Explore the best of commercial property Gurgaon with Elite Edge, your reliable guide for finding the right rental property in Gurgaon or a space to call your own in the ever-growing commercial property in Gurugram market <br>
                    Call us now or drop a message. Let’s get started with the commercial move you’ve been waiting for....
                  
                   </p>

                 </div>
                 <!-- "Read More" Button -->
                 <button id="toggle-btn" class="btn btn-sm mt-2"
                   style="background-color: white; color: #000; border: none;" onclick="toggleParagraph()">Read
                   More</button>

               </div>
            </div>
          </div>
       
           @elseif($type == 'sco')
          <!-- Read More Paragraph Section -->
          <div style="margin-top: 50px;">
            <div class="col-lg-12">
               <h3 class="mb-2" style="text-align: center;">SCO Plots in Gurgaon: Your Next Big Business Move Starts Here</h3>
               <div class="card p-3">
                 <!-- Short Paragraph (Visible initially) -->
                 <p id="short-paragraph">
                   {{ \Illuminate\Support\Str::words(strip_tags($description ?? 'Looking for the perfect combination of office space and retail space in the heart of Gurgaon? Welcome to the world of SCO Plots in Gurgaon, where your business is not just set up but also strategically positioned for growth in the future.'), 125, '...') }}
                   <br> {!! $description ?? 'At Elite Edge, we help you explore and invest in the most premium Shop Cum Office Spaces that offer ownership, flexibility, and long-term appreciation, all in one place' !!}
                  </p>

                 <!-- Full Paragraph (Hidden initially) -->
                 <p id="full-paragraph" style="display:none;">
                   {!! $description ?? 'Looking for the perfect combination of office space and retail space in the heart of Gurgaon? Welcome to the world of SCO Plots in Gurgaon, where your business is not just set up but also strategically positioned for growth in the future.' !!}
                   <br> {!! $description ?? 'At Elite Edge, we help you explore and invest in the most premium Shop Cum Office Spaces that offer ownership, flexibility, and long-term appreciation, all in one place' !!}
                   
                 </p>
                   

                 <!-- Hidden Subheadings and Content (Initially hidden) -->
                 <div id="additional-content" style="display:none; margin-top: 20px;">

                   <!-- Subheading 1 -->
                   <h4 style="text-align: left;">Why Are SCO Spaces in Gurgaon in Such High Demand?</h4>
                   <p style="text-align: left;">
                    Unlike regular commercial buildings or rented office setups, <b>SCO Spaces </b> in Gurgaon give you full ownership of both land and structure. You are free to construct, rent, lease, or manage your business any way you see fit. You own the land and the rules that apply.
                    <br>Additionally, SCOs have appeared as the new standard for wise commercial investment in an area like Gurgaon where real estate, business, and lifestyle all interact.
                   </p>
<br>
<br>

                   <!-- Subheading 2 -->
                   <h4 style="text-align: left;">A Look at the Top SCO Projects</h4>
                   <p style="text-align: left;">
                   We're not just considering plots that work for everyone. High-potential, well-planned SCOs from leading developers available in Gurgaon are:
                     <br>

                     <li> <b>DLF SCO Plots: </b> Located in premium sector 84 DLF Garden City, these plots come with high footfall, top-tier infrastructure, and unmatched brand value. Ideal for businesses that want instant visibility. With DLF’s legacy of excellence behind it, this line of SCOs offers an environment in which premium brands and successful ventures grow naturally.
<br>Wide roads, ample parking space, and a community in its vicinity keep the customer engagement intact.</li> <br>
                     <li> <b>M3M SCO Plots: </b> Known for their prime location on Sector 113, Dwarka Expressway, M3M SCO Plots offer modern planning, efficient layout, and a built-in premium crowd. These plots, backed by North India’s fastest-growing developer, present hi-tech architecture and prime commercial energy <br> With every kind of enterprise, from cafes to clinics, these plots become the focal point for visibility and top-rate customer footfal </li>
                     <br><li> <b>Emaar SCO Plots:</b> Classy, organized, and designed with business flow in mind, <b>Emaar SCO Plots</b> bring the best of architecture and location together in sectors like 75 and 114. Emaar’s global design standards ensure that every inch of space exudes just the right blend of finesse and functionality.<br>With their clean layouts and international outlook, these SCOs stand out and are preferred by the contemporary businessman.
</li> <br>
                     <li> <b>Reach SCO Plots: </b>Located strategically on sectors 68 and 114, Reach SCO Plots offer affordability with high potential. Perfect for startups and mid-sized businesses looking to grow smart. These plots sport attractive pricing without compromising on location advantages.
<br> The perfect blend of visibility, accessibility, and cost makes it a hidden treasure for any first-time investor.
</li>
                    
<br> These projects offer solutions that fit every business idea, whether you're looking to build complete offices, clinics, coaching centers, fashion retail stores, or cafes.

<p style="text-align: left;">

Whether you want to invest and rent it out or run your own operations, there’s a place for you here.

</p>
                   </p>
<br>
<br>

                     <!-- Subheading 3 -->
                   <h4 style="text-align: left;">The Case for SCO Investment in Gurgaon</h4>
                   <p style="text-align: left;">
                  Gurgaon isn’t just another city; it’s North India’s startup engine, corporate nucleus, and lifestyle capital. And this means one thing: location matters. A smart <b style="font-color: black">SCO Investment in Gurgaon</b> gives you not just a great commercial space but a chance to grow alongside the city.

                     <br>Here’s why investors are loving SCOs:
                     <li>Freehold land with absolute ownership
</li>
                     <li>Custom construction allowed
</li>
                     <li>High returns through rentals or higher capital appreciation</li>
                     <li>Located in fast-developing zones and with heavy footfall</li>
                     <li>Safe inventory with demand always high because of limited supply</li>
                    
                    <br>
                    <p style="text-align: left;">Unlike standard retail leases, you’re not just paying rent; you’re creating long-term value.
</p>
<br>
<br>
<!--------end------ sub-3>

                    <!-- Subheading 4 -->
                   <h4 style="text-align: left;">Why Elite Edge?</h4>
                   <p style="text-align: left;">
                   Having spent several years researching and studying the real estate market in Gurgaon, we at Elite Edge put our knowledge to work to help you invest wisely. Our phenomenon of SCO plots in Gurgaon caters perfectly to the requirements and budget of, who wish to either run their own business or gain an assured rental income potential.
                     <br>From the first visit to paperwork, layout approvals to resale strategy, we’ve got your back at every step. Because business should feel exciting, not exhausting.
                    </p>
<br>
<br>                <h4 style="text-align: left;">Let’s Build Your Business on a Strong Foundation
</h4>
                   <p style="text-align: left;">
                   Dreaming of your own shop? Want to set up a premium office space? Or is the next big commercial real estate move an investment? 
 <br>Explore <b> SCO Spaces </b> in Gurgaon with Elite Edge.
<br> Your perfect abode is already waiting for you. Be it <b> DLF SCO Plots, M3M SCO Plots, Emaar SCO Plots, or Reach SCO Plots </b>. With the right SCO in Gurgaon investment, your business gets to walk down the red carpet into a conspicuous presence of its own.
<br> Contact Elite Edge and search for your next big opportunity in Shop Cum Office Spaces throughout Gurgaon.
 </p>

                   <br><br>
                   

                 </div>
                 <!-- "Read More" Button -->
                <center> <button id="toggle-btn" class="btn btn-sm mt-2"
                   style="background-color: white; color: #000; border: none;" onclick="toggleParagraph()">Read
                   More</button> </center>

               </div>
            </div>
          </div>
      

       
          @endif
</div>
            </div>
         </section>
         <!-- end hot selling projects -->
@endsection
@section('extra_js')
<script>
	$(document).ready(function() {
      $(".propertyType").on("change",function(){
         var type_data = $(this).val();
         type_data = type_data.replace(" ", "-");
         $('.filter_form').attr('action',"{{url('property')}}/"+ type_data );
      });
	});
</script>
 <script>
      function toggleParagraph() {
        let shortPara = document.getElementById("short-paragraph");
        let fullPara = document.getElementById("full-paragraph");
        let btn = document.getElementById("toggle-btn");

        if (fullPara.style.display === "none") {
          shortPara.style.display = "none";
          fullPara.style.display = "block";
          btn.innerText = "Read Less";
        } else {
          shortPara.style.display = "block";
          fullPara.style.display = "none";
          btn.innerText = "Read More";
        }
      }
   </script>

   <!-- JavaScript to Toggle Visibility -->
   <script>
      function toggleParagraph() {
        let shortPara = document.getElementById("short-paragraph");
        let fullPara = document.getElementById("full-paragraph");
        let additionalContent = document.getElementById("additional-content");
        let btn = document.getElementById("toggle-btn");

        if (fullPara.style.display === "none") {
          shortPara.style.display = "none";
          fullPara.style.display = "block";
          additionalContent.style.display = "block"; // Show additional content
          btn.innerText = "Read Less";
        } else {
          shortPara.style.display = "block";
          fullPara.style.display = "none";
          additionalContent.style.display = "none"; // Hide additional content
          btn.innerText = "Read More";
        }
      }
   </script>
@endsection
