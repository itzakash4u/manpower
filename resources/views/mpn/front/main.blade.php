<!DOCTYPE html>
<html>
    <head>
        @yield('add-metatags')
        
        <!--<meta charset="utf-8" />-->
        <!--<title>Admin - Manpower Nation</title>-->
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />-->
        <!--<meta content="Admin Dashboard" name="description" />-->
        <!--<meta content="ThemeDesign" name="author" />-->
        <!--<meta http-equiv="X-UA-Compatible" content="IE=edge" />-->

        <link rel="shortcut icon" href="{{ asset('ui/images/favicon.ico') }}">

        @yield('extra-styles')

        <link href="{{asset('ui/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('ui/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('ui/css/style.css')}}" rel="stylesheet" type="text/css">

    </head>

    <body>
        @yield('content')
    
        <!-- jQuery  -->
        <script src="{{asset('ui/js/jquery.min.js')}}"></script>
        <script src="{{asset('ui/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('ui/js/modernizr.min.js')}}"></script>
        <script src="{{asset('ui/js/detect.js')}}"></script>
        <script src="{{asset('ui/js/fastclick.js')}}"></script>
        <script src="{{asset('ui/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('ui/js/jquery.blockUI.js')}}"></script>
        <script src="{{asset('ui/js/waves.js')}}"></script>
        <script src="{{asset('ui/js/wow.min.js')}}"></script>
        <script src="{{asset('ui/js/jquery.nicescroll.js')}}"></script>
        <script src="{{asset('ui/js/jquery.scrollTo.min.js')}}"></script>

        @yield('extra-scripts')

        <script src="{{asset('ui/js/app.js')}}"></script>

        @yield('add-scripts')

    </body>
</html>