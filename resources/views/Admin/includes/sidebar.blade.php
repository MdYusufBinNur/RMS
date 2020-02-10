<div class="sidebar" data-background-color="brown" data-active-color="info">
    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | brown"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->
    <div class="logo">
        <a href="{{ url('/ig_admin') }}" class="simple-text logo-mini">
            <i class="ti-pulse"></i>
        </a>

        <a href="{{ url('/ig_admin') }}" class="simple-text logo-normal">
            @if(!empty(\Illuminate\Support\Facades\Auth::user()))
                {{ \Illuminate\Support\Facades\Auth::user()->name }}
            @else
                ADMIN
            @endif
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="info">
                <div class="photo">
                    <img src="{{asset('Admin/paper_dashboard/assets/img/faces/img03.png') }}" />
                </div>

                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span style="font-variant-caps: all-petite-caps">
                      {{ Auth::user()->name }}
                        <b class="caret"></b>
                    </span>
                </a>

                <div class="clearfix"></div>

                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span class="sidebar-mini"><i class="ti-lock"></i></span>
                                <span class="sidebar-normal">
                                    {{ __('Logout') }}
                                </span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li>
                <a data-toggle="collapse" href="#category">
                    <i class="ti-info"></i>
                    <p>About
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="category">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/abouts/create') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New About Info</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/abouts') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">About Info List</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#apply">
                    <i class="ti-envelope"></i>
                    <p>Application
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="apply">
                    <ul class="nav">

                        <li>
                            <a href="{{ url('/applies') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Applicant List</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#blog">
                    <i class="ti-email"></i>
                    <p>Blog
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="blog">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/blogs/create') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Blog</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/blogs') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Blog List</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#contacts">
                    <i class="ti-email"></i>
                    <p>Contact
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="contacts">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/contacts/create') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Contact Info</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/contacts') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Contact List</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#country">
                    <i class="ti-cloud"></i>
                    <p>Country
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="country">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/countries/create') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Country Info</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/countries') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Country List</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#course">
                    <i class="ti-agenda"></i>
                    <p>Courses
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="course">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/courses/create') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Course Info</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/courses') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Courses Lists</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#institutes">
                    <i class="ti-agenda"></i>
                    <p>Institute
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="institutes">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/institutes/create') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Institute Info</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/institutes') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Institute Lists</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#ownerinfos">
                    <i class="ti-user"></i>
                    <p>Owner Info
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="ownerinfos">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/owners/create') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Owner Info</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/owners') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Owner Info Lists</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#procedures">
                    <i class="ti-stack-overflow"></i>
                    <p>Procedure
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="procedures">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/procedures/create') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Procedure</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/procedures') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Procedure Info Lists</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#programs">
                    <i class="ti-target"></i>
                    <p>Programs
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="programs">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/programs/create') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Program</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/programs') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Programs Info Lists</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#scholarships">
                    <i class="ti-announcement"></i>
                    <p>Scholarship
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="scholarships">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/scholarships/create') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Scholarship</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/scholarships') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Scholarship Info Lists</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#services">
                    <i class="ti-server"></i>
                    <p>Services
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="services">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/services/create') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Service</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/services') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Service Info Lists</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#sliders">
                    <i class="ti-gallery"></i>
                    <p>Slider
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="sliders">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/sliders/create') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Slider</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/sliders') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Slider Info Lists</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#dashboardOverview" aria-expanded="true">
                    <i class="ti-facebook"></i>
                    <p>Social Linker
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="dashboardOverview">
                    <ul class="nav">
                        <li class="">
                            <a href="{{ url('/linkers/create') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Linker</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/linkers') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Linker List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#successstories">
                    <i class="ti-mobile"></i>
                    <p>Success Story
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="successstories">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/stories/create') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Story Info</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/stories') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Story  List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#testimonials">
                    <i class="ti-user"></i>
                    <p>Testimonial
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="testimonials">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/testimonials/create') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Testimonial</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/testimonials') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Testimonial Info List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#universities">
                    <i class="ti-crown"></i>
                    <p>University
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="universities">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/universities/create') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New University</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/universities') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">University Info List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
