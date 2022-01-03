<?php

?>



    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Olamiposi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Food App - @yield('title')</title>
    <!-- Start css -->
    <!-- Switchery css -->
    <link href="{{asset('admin_assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet">

@yield('css')

<!-- Apex css -->
    <link href="{{asset('asset/plugins/apexcharts/apexcharts.css')}}" rel="stylesheet">
    <!-- Slick css -->
    <link href="{{asset('admin_assets/plugins/slick/slick.css')}}" rel="stylesheet">
    <link href="{{asset('admin_assets/plugins/slick/slick-theme.css')}}" rel="stylesheet">
    <link href="{{asset('admin_assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin_assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin_assets/css/flag-icon.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin_assets/css/style.css')}}" rel="stylesheet" type="text/css">

    <style>
        /*html,body{*/
        /*    overflow-y:scroll;*/
        /*}*/

        /* width */
        ::-webkit-scrollbar {
            width: 16px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        ::-webkit-scrollbar-button {
            background-color: #f1f1f1;
            background-size: 10px 10px;
            background-repeat: no-repeat;
            background-position: center center;
            height: 16px;
            width: 1em;
            -webkit-box-shadow: inset 1px 1px 2px rgba(0,0,0,0.2);
        }

        ::-webkit-scrollbar-button:horizontal:increment {
            background-image: url(https://dl.dropboxusercontent.com/u/55165267/icon2.png);
        }

        ::-webkit-scrollbar-button:end:increment {
            background-image: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDQwNC4zMDggNDA0LjMwOSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDA0LjMwOCA0MDQuMzA5OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPHBhdGggZD0iTTAsMTAxLjA4aDQwNC4zMDhMMjAyLjE1MSwzMDMuMjI5TDAsMTAxLjA4eiIgZmlsbD0iIzAwMDAwMCIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=);
        }


        ::-webkit-scrollbar-button:start:decrement {
            background-image: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDI1NSAyNTUiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDI1NSAyNTU7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8ZyBpZD0iYXJyb3ctZHJvcC11cCI+CgkJPHBvbHlnb24gcG9pbnRzPSIwLDE5MS4yNSAxMjcuNSw2My43NSAyNTUsMTkxLjI1ICAgIiBmaWxsPSIjMDAwMDAwIi8+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==)
        }
    </style>
    <!-- End css -->
</head>
<body class="vertical-layout">
<!-- Start Containerbar -->
<div id="containerbar">
    <!-- Start Leftbar -->
    <div class="leftbar">
        <!-- Start Sidebar -->
        <div class="sidebar">
            <!-- Start Logobar -->
            <div class="logobar"><h1>Food App</h1>
            </div>
            <!-- End Logobar -->
            <!-- Start Navigationbar -->
            <div class="navigationbar">
                <ul class="vertical-menu">
                    <li>
                        <a href="{{route('admin.dashboard')}}">
                            <img src="{{asset('asset/images/svg-icon/dashboard.svg')}}" class="img-fluid" alt="dashboard"><span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="javaScript:void();">
                            <img src="{{asset('asset/images/svg-icon/dashboard.svg')}}" class="img-fluid" alt="dashboard"><span>Categories</span><i class="feather icon-chevron-right pull-right"></i>
                        </a>
                          <ul class="vertical-submenu">
                            <li><a href="{{route('categories.index')}}">All Categories</a></li>
                            <li><a href="{{route('categories.create')}}">Add Category</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javaScript:void();">
                            <img src="{{asset('asset/images/svg-icon/ecommerce.svg')}}" class="img-fluid" alt="advanced"><span>Manage Order(s)</span><i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li><a href="{{route('admin.pending')}}">Pending Orders</a></li>
                            <li><a href="{{route('admin.completed')}}">Completed Orders</a></li>
                            <li><a href="{{route('admin.cancelled')}}">Cancelled Orders</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javaScript:void();">
                            <img src="{{asset('asset/images/svg-icon/advanced.svg')}}" class="img-fluid" alt="advanced"><span>Manage menu(s)</span><i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li><a href="{{route('menus.index')}}">All menus</a></li>
                            <li><a href="{{route('menus.create')}}">Add menu</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javaScript:void();">
                            <img src="{{asset('asset/images/svg-icon/chart.svg')}}" class="img-fluid" alt="chart"><span>Manage Admin(s)</span><i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li><a href="{{route('admin.index')}}">All Admins</a></li>
                            <li><a href="{{route('admin.create')}}">Add New Admin</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- End Navigationbar -->
        </div>
        <!-- End Sidebar -->
    </div>
    <!-- End Leftbar -->
    <!-- Start Rightbar -->
    <div class="rightbar">
        <!-- Start Topbar Mobile -->
        <div class="topbar-mobile">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="mobile-logobar">
                        <a href="#" class="mobile-logo"><img src="{{asset('asset/images/logo.svg')}}" class="img-fluid" alt="logo"></a>
                    </div>
                    <div class="mobile-togglebar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="topbar-toggle-icon">
                                    <a class="topbar-toggle-hamburger" href="javascript:void();">
                                        <img src="{{asset('asset/images/svg-icon/horizontal.svg')}}" class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                        <img src="{{asset('asset/images/svg-icon/verticle.svg')}}" class="img-fluid menu-hamburger-vertical" alt="verticle">
                                    </a>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="menubar">
                                    <a class="menu-hamburger" href="javascript:void();">
                                        <img src="{{asset('asset/images/svg-icon/collapse.svg')}}" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                        <img src="{{asset('asset/images/svg-icon/close.svg')}}" class="img-fluid menu-hamburger-close" alt="close">
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Topbar -->
        <div class="topbar mb-3">
            <!-- Start row -->
            <div class="row align-items-center">
                <!-- Start col -->
                <div class="col-md-12 align-self-center d-flex justify-content-between">
                    <div class="togglebar">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <div class="menubar">
                                    <a class="menu-hamburger" href="javascript:void();">
                                        <img src="{{asset('asset/images/svg-icon/collapse.svg')}}" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                        <img src="{{asset('asset/images/svg-icon/close.svg')}}" class="img-fluid menu-hamburger-close" alt="close">
                                    </a>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="searchbar">
                                    <form>
                                        <div class="input-group">
                                            <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn" type="submit" id="button-addon2"><img src="{{asset('asset/images/svg-icon/search.svg')}}" class="img-fluid" alt="search"></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div>



                                </div>






                            </li>

                            <li class="list-inline-item">




                                                @if (session()->has('message'))
                                           <div class="alert alert-success">
                                               {{ session('message')    }}
                                           </div>
                                       @endif
                                        </li>

                        </ul>
                    </div>
                    <div class="infobar">
                        <ul class="list-inline ">
                            <li class="list-inline-item ">
                                <div class="profilebar">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('asset/images/users/profile.svg')}}" class="img-fluid" alt="profile"><span class="feather icon-chevron-down live-icon"></span></a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                            <div class="dropdown-item">
                                                <div class="profilename">
                                                    {{-- <h5>{{auth()->user()->name}}</h5> --}}
                                                </div>
                                            </div>
                                            <div class="userbox">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="media dropdown-item">
                                                        <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="profile-icon"><img src="{{asset('asset/images/svg-icon/logout.svg')}}" class="img-fluid" alt="logout">Logout</a>

                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="notifybar">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle infobar-icon" href="#" role="button" id="notoficationlink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="admin_assets/images/svg-icon/notifications.svg" class="img-fluid" alt="notifications">
                                            @foreach(\App\Models\Orders::where('tracking',0)->where('table_id',1)->orderBy('id','desc')->take(2)->get() as $latestOrders)
                                        @if($latestOrders)    <span class="live-icon"></span> @endif @endforeach</a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notoficationlink">
                                            <div class="notification-dropdown-title">
                                                <h4>Notifications</h4>
                                            </div>
                                            <ul class="list-unstyled">
                                                @foreach(\App\Models\Orders::where('tracking',0)->where('table_id',1)->orderBy('id','desc')->take(2)->get() as $latestOrders)

                                              <a href="{{ route('adminViewOrder', $latestOrders) }}" >  <li class="media dropdown-item">
                                                    <span class="action-icon badge badge-primary-inverse"><i class="feather fas fa-receiptr"></i></span>
                                                    <div class="media-body">
                                                        <h5 class="action-title">Order at table {{$latestOrders->table_id}}</h5>
                                                        <p><span class="timing">{{$latestOrders->created_at->toDateString()}}</span></p>
                                                    </div>
                                                </li> </a>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End Topbar -->


             @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message')    }}
        </div>
    @endif

   @yield('content')
    <!-- End Rightbar -->

</div>


<!-- Start Footerbar -->
<div class="footerbar">
    <footer class="footer">
        <p class="mb-0">© {{ Carbon\Carbon::now()->year }} Food App</p>
    </footer>
</div>
<!-- End Footerbar -->
<!-- End Containerbar -->
<!-- Start js -->
<script>


    setTimeout(function(){
        window.location.reload()
    }, 120000);
        </script>

    <!-- Start js -->
    <script src="{{asset('admin_assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/popper.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/modernizr.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/detect.js')}}"></script>
    <script src="{{asset('admin_assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('admin_assets/js/vertical-menu.js')}}"></script>
    <!-- Switchery js -->
    <script src="{{asset('admin_assets/plugins/switchery/switchery.min.js')}}"></script>
    <!-- Required Datatable js -->
    <script src="{{asset('admin_assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Datatable js -->
    <script src="{{asset('admin_assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/datatables/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
    <!-- Core js -->
    <script src="{{asset('admin_assets/js/core.js')}}"></script>
    <!-- End js -->

</body>

</html>
