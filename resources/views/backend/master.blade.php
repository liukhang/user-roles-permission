<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{!! env('APP_NAME') !!}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{!!asset('public/backend/bower_components/bootstrap/dist/css/bootstrap.min.css')!!}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{!!asset('public/backend/bower_components/font-awesome/css/font-awesome.min.css')!!}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{!!asset('public/backend/bower_components/Ionicons/css/ionicons.min.css')!!}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{!!asset('public/backend/bower_components/jvectormap/jquery-jvectormap.css')!!}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!!asset('public/backend/dist/css/AdminLTE.min.css')!!}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{!!asset('public/backend/dist/css/skins/_all-skins.min.css')!!}">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- DataTables -->
    <link rel="stylesheet" href="{!!asset('public/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')!!}">
    <script type="text/javascript" src="{!!asset('public/backend/ckeditor/ckeditor.js')!!}"></script>
    <script type="text/javascript" src="{!!asset('public/backend/ckfinder/ckfinder.js')!!}"></script>
    <script type="text/javascript" src="{!!asset('public/backend/func_ckfinder.js')!!}"></script>
    <script type="text/javascript">
        var base_url = "{{ url('/') }}";
    </script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

            <!-- Logo -->
            <a href="{!! route('admin') !!}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>BBQ</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>BBQ Home</b></span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="{!! route('home') !!}" class="dropdown-toggle" target="_blank">
                                <span class="hidden-xs">Xem trang</span>
                            </a>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="hidden-xs">Xin chào: {!! Auth::user()->name !!}</span>
                            </a>
                        </li>
                        <li>
                            <a class="" href="{!! route('logout') !!}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {!! __('Đăng xuất') !!}
                                <i class="fa fa-fw fa-sign-out"></i>
                            </a>

                            <form id="logout-form" action="{!! route('logout') !!}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        <!-- Control Sidebar Toggle Button -->

                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>

            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="">
                        <a href="{!! route('admin') !!}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>Tài Khoản</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{!! route('users.index') !!}"><i class="fa fa-circle-o"></i> Danh sách tài khoản</a></li>
                            <li><a href="{!! route('roles.index') !!}"><i class="fa fa-circle-o"></i> Quản lý vai trò</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-fw fa-sign-out"></i><span>Đăng xuất</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('action') @yield('controller')
                </h1>
            </section>
            <div class="col-lg-12" style="margin-top:12px;">
                @if(Session::has('flash_message'))
                <div class="alert alert-{!! Session::get('flash_level') !!}">
                    {!! Session::get('flash_message') !!}
                </div>
                @endif
            </div>
            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1
            </div>
            <strong>Copyright &copy; {!! now()->year !!} <a href="#">LK</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->

                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{!!asset('public/backend/bower_components/jquery/dist/jquery.min.js')!!}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{!!asset('public/backend/bower_components/bootstrap/dist/js/bootstrap.min.js')!!}"></script>
    <!-- FastClick -->
    <script src="{!!asset('public/backend/bower_components/fastclick/lib/fastclick.js')!!}"></script>
    <!-- AdminLTE App -->
    <script src="{!!asset('public/backend/dist/js/adminlte.min.js')!!}"></script>
    <!-- Sparkline -->
    <script src="{!!asset('public/backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')!!}"></script>
    <!-- jvectormap  -->
    <script src="{!!asset('public/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')!!}"></script>
    <script src="{!!asset('public/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')!!}"></script>
    <!-- SlimScroll -->
    <script src="{!!asset('public/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')!!}"></script>
    <script src="{!!asset('public/backend/dist/js/Chart.bundle.js')!!}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{!!asset('public/backend/dist/js/myscript.js')!!}"></script>
    <script src="{!!asset('public/backend/bower_components/datatables.net/js/jquery.dataTables.min.js')!!}"></script>
    <script src="{!!asset('public/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')!!}"></script>
    <script>
    $(function() {
        $(".os-btn-delete").on("submit", function() {
            return confirm("Bạn có muốn xóa?");
        });
        $('#example1').DataTable({
            'paging': false,
            'lengthChange': false,
            'searching': false,
            'ordering': false,
            'info': false,
            'autoWidth': false
        });
    })
    </script>
</body>

</html>