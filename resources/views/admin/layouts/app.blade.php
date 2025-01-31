<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Admin | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}">

    <!-- Theme Config Js -->
    <script src="{{asset('admin/assets/js/hyper-config.js')}}"></script>

    <!-- Vendor css -->
    <link href="{{asset('admin/assets/css/vendor.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{asset('admin/assets/css/app-saas.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Datatables css -->
    <link href="{{asset('admin/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        
        <!-- ========== Topbar Start ========== -->
        @include('admin.layouts.elements.topbar')
        <!-- ========== Topbar End ========== -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.layouts.elements.left_sidebar')
        <!-- ========== Left Sidebar End ========== -->
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            @yield('content')
            <!-- Footer Start -->
            @include('admin.layouts.elements.footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    //@include('admin.layouts.elements.themesetting')

    <!-- Vendor js -->
    <script src="{{asset('admin/assets/js/vendor.min.js')}}"></script>

    <!-- Apex  Charts js -->
    <script src="{{asset('admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>

    <!-- Todo js -->
    <script src="{{asset('admin/assets/js/ui/component.todo.js')}}"></script>

    <!-- CRM Dashboard Demo App Js -->
    <script src="{{asset('admin/assets/js/pages/demo.crm-dashboard.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('admin/assets/js/app.min.js')}}"></script>

                                                      
    <!-- Datatables js -->
    <script src="{{asset('admin/assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>

    <!-- Datatable Init js -->
    <script src="{{asset('admin/assets/js/pages/demo.datatable-init.js')}}"></script>


</body>
</html>