@extends('mpn.front.layout')

@section('add-metatags')
        <title>User Login | Manpower Nation</title>
        <meta name="description" content="Login to your Manpower Nation account to access our range of reliable and affordable labour supply agency solutions in Kolkata." />
@stop


@section('content')

<section class="page-title title-bg13">
    <div class="d-table">
        <div class="d-table-cell">
            <h2 class="text-center">Sign In</h2>
        </div>
    </div>
    <div class="lines">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</section>

        <!-- Begin page -->
    <section class="account-login-area">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Basic example -->
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <div class="login-register-form-wrap">
                        <div class="login-register-form">
                            <div class="signin-section ptb-100">
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                                <form role="form" method="post" action="{{ route('login') }}" class="signin-form find-form">
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
                                <div class="signup-btn text-center">
                                    <button type="submit" class="find-btn">Login</button>
                                </div>
                                <div class="create-btn text-center">
                                    <p>Not have an account?
                                        <a href="register-user">
                                            Create an account
                                            <i class="bx bx-chevrons-right bx-fade-right"></i>
                                        </a>
                                    </p>
                                </div>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->
            </div>
        </div>
    </section>

@stop


