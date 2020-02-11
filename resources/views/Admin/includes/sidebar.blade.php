<div class="sidebar" data-background-color="brown" data-active-color="info">
    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | brown"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->
    <div class="logo">
        <a href="{{ url('/home') }}" class="simple-text logo-mini">
            <i class="ti-pulse"></i>
        </a>

        <a href="{{ url('/home') }}" class="simple-text logo-normal">
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
                <a data-toggle="collapse" href="#member">
                    <i class="ti-user"></i>
                    <p>Member
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="member">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/members/create') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Member</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/members') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Member Info List</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#constructors">
                    <i class="ti-user"></i>
                    <p>Constructor
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="constructors">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/constructors/create') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Constructor </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/constructors') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Constructors List</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#areas">
                    <i class="ti-world"></i>
                    <p>Area
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="areas">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/areas/create') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Area </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/areas') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Area List</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#tasks">
                    <i class="ti-cloud"></i>
                    <p>Tasks
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="tasks">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/tasks/create') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Tasks</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/tasks') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Tasks List</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#comments">
                    <i class="ti-agenda"></i>
                    <p>Comments
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="comments">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/comments') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Comments Lists</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#reports">
                    <i class="ti-agenda"></i>
                    <p>Reports
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="reports">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/reports') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Report Lists</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>



        </ul>
    </div>
</div>
