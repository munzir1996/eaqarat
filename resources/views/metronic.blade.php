<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="rtl">

<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" /> 
    @include('admin._includes._head')
    @yield('stylesheets')
</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">

    @include('admin._includes._navbar')

    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"></div>
    <!-- END HEADER & CONTENT DIVIDER -->

    <!-- BEGIN CONTAINER -->
    <div class="page-container">

    @include('admin._includes._sidebar')

        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY-->
            <div class="page-content" style="min-height:1015px">

                @yield('content')

            </div>
            <!-- END CONTENT BODY-->
        </div>
        <!-- END CONTENT -->

        <!-- BEGIN QUICK SIDEBAR -->
        <a href="#" class="page-quick-sidebar-toggler">
            <i class="icon-login"></i>
        </a>
        <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
            <div class="page-quick-sidebar">
                
            </div>
        </div>
        <!-- END QUICK SIDEBAR -->

    </div>
    <!-- END CONTAINER -->

    @include('admin._includes._footer')

    @include('admin._includes._javascript')
    @include('admin._includes._messages')

    @yield('scripts')

</body>

</html>
