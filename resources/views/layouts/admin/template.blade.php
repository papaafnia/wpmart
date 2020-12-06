<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:image" content="{{ asset ('file/images/logo/logo.jpeg')}}">
    <link href=" {{ asset ('file/images/logo/logo.jpeg') }}" rel="icon">

    <title>WPMart | Dashboard</title>

    <link href="{{ asset ('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset ('admin/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset ('admin/js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">

    <link href="{{ asset ('admin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset ('admin/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset ('admin/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
    

</head>

<body class="md-skin">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" src="{{ url ('file/images/avatar/', Auth::user()->image)  }}" width="30%"/>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">{{ Auth::user()->name}}</span>
                                <span class="text-muted text-xs block">Info <b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-sign-out pull-right"></i>
                                    {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            WPM
                        </div>
                    </li>
                    <li class="">
                        <a href="{{ route('dashboard.index')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span> </a>
                    </li>
                    
                    @if (\Auth::user()->role == 1)
                    
                    {{-- DASHBOARD --}}
                    <li>
                        <a href="#"><i class="fa fa-home"></i> <span class="nav-label">Inventory </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="">
                                <a href="{{ route('data-barang.index') }}"><i class="fa fa-archive"></i> <span class="nav-label">Data Barang</span> </a>
                            </li>
                        </ul>
                    </li>
                    {{-- E- COMMERECE --}}
                    <li>
                        <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">E - Commerece</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="">
                                <a href="{{ route('pemesanan.index') }}"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Pesanan Owner</span> </a>
                            </li>
                        </ul>
                    </li>
                    {{-- CATALOG --}}
                    <li>
                        <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Catalog</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="">
                                <a href="{{ route('kategori.index') }}"><i class="fa fa-list-alt"></i> <span class="nav-label">Kategori</span> </a>
                            </li>
                            <li class="">
                                <a href="{{ route('sub-kategori.index') }}"><i class="fa fa-list-alt"></i> <span class="nav-label">Sub Kategori</span> </a>
                            </li>
                        </ul>
                    </li>
                    {{-- REPORT --}}
                    <li>
                        <a href="#"><i class="fa fa-file"></i> <span class="nav-label">Report</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="">
                                <a href="{{ route('view.laporan') }}"><i class="fa fa-file"></i> <span class="nav-label">Report Pemesanan</span> </a>
                            </li>
                        </ul>
                    </li>
                    {{-- CONFIG --}}
                    <li>
                        <a href="#"><i class="fa fa-gears"></i> <span class="nav-label">Config</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="">
                                <a href="{{ route('data-user.index') }}"><i class="fa fa-users"></i> <span class="nav-label">User</span> </a>
                            </li>
                            <li class="">
                                <a href="#"><i class="fa fa-wrench"></i> <span class="nav-label"> Manage Role</span> </a>
                            </li>
                        </ul>
                    </li>
                    @else
                     {{-- E- COMMERECE --}}
                     <li>
                        <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">E - Commerece</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="">
                                <a href="{{ route('pemesanan.index') }}"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Pesanan Owner</span> </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
          <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                {{-- <form role="search" class="navbar-form-custom" action="search_results.html">
                    <div class="form-group">
                        <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                    </div>
                </form> --}}
            </div>
              {{-- <ul class="nav navbar-top-links navbar-right">
                  <li>
                      <a href="#">
                          <i class="fa fa-sign-out"></i> Log out
                      </a>
                  </li>
                  <li>
                      <a class="right-sidebar-toggle">
                          <i class="fa fa-tasks"></i>
                      </a>
                  </li>
              </ul> --}}
          </nav>
        </div>

        <main class="">
          @yield('content')
        </main>
            <div class="footer">
                <div class="float-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2018
                </div>
            </div>
        </div>
        {{-- <div class="small-chat-box fadeInRight animated">

            <div class="heading" draggable="true">
                <small class="chat-date float-right">
                    02.19.2015
                </small>
                Small chat
            </div>

            <div class="content">

                <div class="left">
                    <div class="author-name">
                        Monica Jackson <small class="chat-date">
                        10:02 am
                    </small>
                    </div>
                    <div class="chat-message active">
                        Lorem Ipsum is simply dummy text input.
                    </div>

                </div>
                <div class="right">
                    <div class="author-name">
                        Mick Smith
                        <small class="chat-date">
                            11:24 am
                        </small>
                    </div>
                    <div class="chat-message">
                        Lorem Ipsum is simpl.
                    </div>
                </div>
                <div class="left">
                    <div class="author-name">
                        Alice Novak
                        <small class="chat-date">
                            08:45 pm
                        </small>
                    </div>
                    <div class="chat-message active">
                        Check this stock char.
                    </div>
                </div>
                <div class="right">
                    <div class="author-name">
                        Anna Lamson
                        <small class="chat-date">
                            11:24 am
                        </small>
                    </div>
                    <div class="chat-message">
                        The standard chunk of Lorem Ipsum
                    </div>
                </div>
                <div class="left">
                    <div class="author-name">
                        Mick Lane
                        <small class="chat-date">
                            08:45 pm
                        </small>
                    </div>
                    <div class="chat-message active">
                        I belive that. Lorem Ipsum is simply dummy text.
                    </div>
                </div>


            </div>
            <div class="form-chat">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control">
                    <span class="input-group-btn"> <button
                        class="btn btn-primary" type="button">Send
                </button> </span></div>
            </div>

        </div>
        <div id="small-chat">

            <span class="badge badge-warning float-right">5</span>
            <a class="open-small-chat" href="">
                <i class="fa fa-comments"></i>

            </a>
        </div>
        <div id="right-sidebar" class="animated">
            <div class="sidebar-container">

                <ul class="nav nav-tabs navs-3">
                    <li>
                        <a class="nav-link active" data-toggle="tab" href="#tab-1"> Notes </a>
                    </li>
                    <li>
                        <a class="nav-link" data-toggle="tab" href="#tab-2"> Projects </a>
                    </li>
                    <li>
                        <a class="nav-link" data-toggle="tab" href="#tab-3"> <i class="fa fa-gear"></i> </a>
                    </li>
                </ul>

                
            </div>
        </div> --}}
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset ('admin/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset ('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset ('admin/js/bootstrap.js') }}"></script>
    <script src="{{ asset ('admin/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset ('admin/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Flot -->
    <script src="{{ asset ('admin/js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset ('admin/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset ('admin/js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset ('admin/js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset ('admin/js/plugins/flot/jquery.flot.pie.js') }}"></script>

    <!-- Peity -->
    <script src="{{ asset ('admin/js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset ('admin/js/demo/peity-demo.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset ('admin/js/inspinia.js') }}"></script>
    <script src="{{ asset ('admin/js/plugins/pace/pace.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset ('admin/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- GITTER -->
    <script src="{{ asset ('admin/js/plugins/gritter/jquery.gritter.min.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ asset ('admin/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{ asset ('admin/js/demo/sparkline-demo.js') }}"></script>

    <!-- ChartJS-->
    <script src="{{ asset ('admin/js/plugins/chartJs/Chart.min.js') }}"></script>

    <!-- Toastr -->
    <script src="{{ asset ('admin/js/plugins/toastr/toastr.min.js') }}"></script>

    <!-- DataTable -->
    <script src="{{ asset ('admin/js/plugins/dataTables/datatables.min.js') }}"></script>
    <script src="{{ asset ('admin/js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Data picker -->
   <script src="{{ asset ('admin/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>

    <!-- Datepicker -->
    <script>
        $('#data_5 .input-daterange').datepicker({
            format:'dd-mm-yyyy',
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });
    </script>

    
</body>
</html>

{{-- AHxpv*jb02M4 --}}