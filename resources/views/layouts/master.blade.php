`<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 
<head>
  @include('layouts.head')
  @include('layouts.title-meta')

   
</head>
 
@section('body')

    <body>
   
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.topbar')
        @include('layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    @include('layouts.vendor-scripts')
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
   @include('layouts.right-sidebar') 
    <!-- /Right-bar -->

    <!-- JAVASCRIPT -->
   
</body>

</html>
