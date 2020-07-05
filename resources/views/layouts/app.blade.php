<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MiniStore') }}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href={{asset("bower_components/bootstrap/dist/css/bootstrap.min.css")}}>
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{asset("bower_components/font-awesome/css/font-awesome.min.css")}}>
    <!-- Ionicons -->
    <link rel="stylesheet" href={{asset("bower_components/Ionicons/css/ionicons.min.css")}}>

    <!-- DataTables -->
    <link rel="stylesheet" href={{asset("../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}>
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">
    <!-- Theme style -->
    <link rel="stylesheet" href={{asset("dist/css/AdminLTE.min.css")}}>

    <link rel="stylesheet" href={{asset("dist/css/skins/skin-blue.min.css")}}>


    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
@guest
    @yield('content')
@else

    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>M</b>S</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Mini</b>Store</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src={{asset("dist/img/avatar1.png")}} class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">Admin</span>
                            </a>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                        class="md md-settings-power">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </i> Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">


                    <li><a href="{{route('home')}}"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>

                    <li ><a href="{{route('pos')}}"><i class="fa fa-shopping-bag"></i><span>POS</span></a></li>


                    <li class="treeview">
                        <a href="#"><i class="fa fa-male"></i> <span>Employee</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">

                            <li><a href="{{route('add.employee')}}">Add Employee</a></li>
                            <li><a href="{{route('all.employee')}}">All Employee</a></li>

                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#"><i class="fa fa-users"></i> <span>Customer</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('add.customer')}}">Add Customer</a></li>
                            <li><a href="{{route('all.customer')}}">All Customer</a></li>

                        </ul>
                    </li>


                    <li class="treeview">
                        <a href="#"><i class="fa fa-truck"></i> <span>Supplier</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('add.supplier')}}">Add Supplier</a></li>
                            <li><a href="{{route('all.supplier')}}">All Supplier</a></li>

                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#"><i class="fa fa-try"></i> <span>Salary (EMP) </span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('add.advancesalary')}}">Add Advanced Salary</a></li>
                            <li><a href="{{route('all.advancesalary')}}">All Advanced Salary</a></li>
                            <li><a href="{{route('pay.salary')}}">Pay Salary</a></li>

                        </ul>
                    </li>



                    <li class="treeview">
                        <a href="#"><i class="fa fa-list-alt"></i> <span>Category</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('add.category')}}">Add Category</a></li>
                            <li><a href="{{route('all.category')}}">All Category</a></li>

                        </ul>
                    </li>



                    <li class="treeview">
                        <a href="#"><i class="fa fa-product-hunt"></i> <span>Product</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('add.product')}}">Add Product</a></li>
                            <li><a href="{{route('all.product')}}">All Product</a></li>
                            <li><a href="{{route('import.product')}}">Import Product</a></li>

                        </ul>
                    </li>



                    <li class="treeview">
                        <a href="#"><i class="fa fa-money"></i> <span>Expense</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('add.expense')}}">Add Expense</a></li>
                            <li><a href="{{route('today.expense')}}">Today Expense</a></li>
                            <li><a href="{{route('monthly.expense')}}">Monthly Expense</a></li>
                            <li><a href="{{route('yearly.expense')}}">Yearly Expense</a></li>

                        </ul>
                    </li>


                    <li class="treeview">
                        <a href="#"><i class="fa fa-paper-plane"></i> <span>Orders</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('pending.orders')}}">Pending Orders</a></li>
                            <li><a href="{{route('success.orders')}}">Success Orders</a></li>

                        </ul>
                    </li>

                    {{--  <li class="treeview">
                         <a href="#"><i class="fa fa-users"></i> <span>Sales Report </span>
                             <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                             </span>
                         </a>
                         <ul class="treeview-menu">
                             <li><a href="">Report 1</a></li>
                             <li><a href="">Report 2</a></li>

                         </ul>
                     </li>--}}


                    <li class="treeview">
                        <a href="#"><i class="fa fa-clock-o"></i> <span>Attendance</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('take.attendance')}}">Take Attendance</a></li>
                            <li><a href="{{route('all.attendance')}}">All Attendance</a></li>

                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#"><i class="fa fa-cogs"></i> <span>Settings</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('setting')}}">Shop Config</a></li>

                        </ul>
                    </li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content container-fluid">

                @yield('content')

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


    </div>
    <!-- /.container -->

    <footer class="main-footer">
        <div class="container text-center">
            <strong>Copyright &copy; <script>document.write(new Date().getFullYear())</script><a> Mini Store</a>.</strong> All rights
            reserved.
        </div>

    </footer>
@endguest
<!-- ./wrapper -->
<!-- Main Footer -->



<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src={{asset("bower_components/jquery/dist/jquery.min.js")}}></script>
<!-- Bootstrap 3.3.7 -->
<script src={{asset("bower_components/bootstrap/dist/js/bootstrap.min.js")}}></script>
<!-- AdminLTE App -->
<script src={{asset("dist/js/adminlte.min.js")}}></script>
<!-- DataTables -->
<script src={{asset("../../bower_components/datatables.net/js/jquery.dataTables.min.js")}}></script>
<script src={{asset("../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js")}}></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" ></script>
<!-- Custom scripts for this template -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
<script>
            @if(Session::has ('message'))
    var type="{{Session::get('alert-type','info')}}"
    switch (type) {
        case 'info':
            toastr.info("{{Session::get('message')}}");
            break;
        case 'success':
            toastr.success("{{Session::get('message')}}");
            break;
        case 'warning':
            toastr.warning("{{Session::get('message')}}");
            break;
        case 'error':
            toastr.error("{{Session::get('message')}}");
            break;
    }
    @endif
</script>
<script>
    $(document).on("click","#delete",function (e) {
        e.preventDefault();
        var link=$(this).attr("href");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.value) {
                window.location.href=link;

            }else{
                Swal.fire('Safe Data');
            }
        });
    });

</script>

<script type="text/javascript">

    jQuery(document).ready(function ($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
    });
</script>
<script type="text/javascript">
    function readURL(input) {

        if(input.files && input.files[0]){
            var reader= new FileReader();
            reader.onload=function(e){
                $('#image')
                    .attr('src',e.target.result)
                    .width(80)
                    .height(80);


            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
</body>
</html>