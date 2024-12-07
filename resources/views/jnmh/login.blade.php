<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Login - College Of Medicine & JNM Hospital</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{ asset('ui/images/favicon.ico') }}">

        <link href="{{asset('ui/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('ui/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('ui/css/style.css')}}" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper" style="position:absolute;left:27%;top:15%">

            <div class="row">
                <!-- Basic example -->
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h3 class="panel-title">Login</h3></div>
                        <div class="panel-body">
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <form role="form" method="post" action="{{ route('login') }}">
                                @csrf
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">Type</label>
                                    <select class="form-control" name="type">
                                        <option value="">Select</option>
                                        <option value="0">Admin</option>
                                        <option value="1">User</option>
                                    </select>
                                </div> -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{ old('email') }}" placeholder="Enter email">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <!-- <div class="form-group">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox1" type="checkbox">
                                        <label for="checkbox1">
                                            Remember me
                                        </label>
                                    </div>
                                </div> -->
                                <button type="submit" class="btn btn-dark waves-effect waves-light">Login</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->


            </div>
        <!-- END wrapper -->


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

        <script src="{{asset('ui/js/app.js')}}"></script>

    </body>
</html>