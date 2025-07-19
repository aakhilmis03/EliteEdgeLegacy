<aside class="left-sidebar sidebar-dark" id="left-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <a href="{{url('/dashboard')}}">
                        <!-- <span class="brand-name">AUTOBEST</span> -->
                        <span class="brand-name">Elite Edge</span>
                    </a>
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-left" data-simplebar style="height: 100%;">
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">
                        
                        <li>
                            <a class="sidenav-item-link" href="{{url('/dashboard')}}">
                                <i class="mdi mdi-briefcase-account-outline"></i> <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                     
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#blog" aria-expanded="false" aria-controls="blog">
                                <i class="mdi mdi-blogger"></i> <span class="nav-text">Manage Blogs</span> <b class="caret"></b>
                            </a>
                            <ul  class="collapse"  id="blog" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li><a class="sidenav-item-link" href="{{url('admin/blog_category/listing')}}"><span class="nav-text">Category</span></a></li>
                                    <li><a class="sidenav-item-link" href="{{url('admin/blog/listing')}}"><span class="nav-text">Blogs</span></a></li>
                                </div>
                            </ul>
                        </li>
                        <li>
                            <a class="sidenav-item-link" href="{{url('/admin/builder/listing')}}">
                                <i class="mdi mdi-quadcopter"></i> <span class="nav-text">Manage Builders</span>
                            </a>
                        </li>
                          
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#city" aria-expanded="false" aria-controls="blog">
                                <i class="mdi mdi-office-building"></i> <span class="nav-text">Manage City</span> <b class="caret"></b>
                            </a>
                            <ul  class="collapse"  id="city" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li><a class="sidenav-item-link" href="{{url('admin/city/listing')}}"><span class="nav-text">Cities</span></a></li>
                                    <li><a class="sidenav-item-link" href="{{url('admin/location/listing')}}"><span class="nav-text">Locations</span></a></li>
                                </div>
                            </ul>
                        </li> 
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#project" aria-expanded="false" aria-controls="blog">
                                <i class="mdi mdi-office-building"></i> <span class="nav-text">Manage Property</span> <b class="caret"></b>
                            </a>
                            <ul  class="collapse"  id="project" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li><a class="sidenav-item-link" href="{{url('admin/amenities/listing')}}"><span class="nav-text">Amenities</span></a></li>
                                    <li><a class="sidenav-item-link" href="{{url('admin/property/listing')}}"><span class="nav-text">Property</span></a></li>
                                </div>
                            </ul>
                        </li> 
                        <li>
                            <a class="sidenav-item-link" href="{{url('/admin/testimonial/listing')}}">
                                <i class="mdi mdi-quadcopter"></i> <span class="nav-text">Manage Testimonials</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidenav-item-link" href="{{url('/admin/jobs/listing')}}">
                                <i class="mdi mdi-quadcopter"></i> <span class="nav-text">Manage Jobs</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidenav-item-link" href="{{url('/admin/news_update/listing')}}">
                                <i class="mdi mdi-quadcopter"></i> <span class="nav-text">Manage News & Updates</span>
                            </a>
                        </li>
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#enquiry" aria-expanded="false" aria-controls="enquiry">
                                <i class="mdi mdi-file-image"></i> <span class="nav-text">Manage Inquiry </span> <b class="caret"></b>
                            </a>
                            <ul  class="collapse"  id="enquiry" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li><a class="sidenav-item-link" href="{{url('admin/enquiry/listing')}}"><span class="nav-text">Property Inquiry</span></a></li>
                                    <li><a class="sidenav-item-link" href="{{url('admin/job_enquiry/listing')}}"><span class="nav-text">Job Inquiry</span></a></li>
                                </div>
                            </ul>
                        </li>
                        <li>
                            <a class="sidenav-item-link" href="{{url('/admin/metatag/listing')}}">
                                <i class="mdi mdi-accusoft"></i> <span class="nav-text">Manage Meta Tag</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidenav-item-link" href="{{url('/admin/user/listing')}}">
                                <i class="mdi mdi-account-group"></i> <span class="nav-text">Manage Users</span>
                            </a>
                        </li>

                    </ul>
                </div>               
            </div>
        </aside>