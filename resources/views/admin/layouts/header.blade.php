<header class="main-header" id="header">
                <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>

                    <span class="page-title"></span>

                    <div class="navbar-right ">

                       

                        <ul class="nav navbar-nav">
                            
                            <li class="dropdown user-menu">
                                <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <img src="{{url('admin_assets/images/user/user-xs-01.jpg')}}" class="user-image rounded-circle" alt="User Image" />
                                    <span class="d-none d-lg-inline-block">{{Auth::user()->name}}</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-link-item" href="{{url('change-password')}}">
                                            <i class="mdi mdi-settings"></i>
                                            <span class="nav-text">Change password</span>
                                        </a>
                                    </li>

                                    <li class="dropdown-footer">
                                        <a class="dropdown-link-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
                                            <i class="mdi mdi-logout"></i> {{ __('Logout') }} 
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>


            </header>