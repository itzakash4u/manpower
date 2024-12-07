@extends('mpn.front.layout')

@section('content')

        <!-- Page Title Start -->
        <section class="page-title title-bg10">
            <div class="d-table">
                <div class="d-table-cell">
                    <h2>Account</h2>
                    <ul>
                        <li>
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li>Change Password</li>
                    </ul>
                </div>
            </div>
            <div class="lines">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </section>
        <!-- Page Title End -->

        <!-- Account Area Start -->
        @if(Session::has('success')) <div class="alert alert-success">{{Session::get('success')}}</div> @endif
        @if(Session::has('danger')) <div class="alert alert-danger">{{Session::get('danger')}}</div> @endif
        <section class="account-section ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="account-information">
                            <div class="profile-thumb">
                                <!--<img src="assets/img/account.jpg" alt="account holder image">-->
                                <img src="{{asset('media/profile/'.$user->profile_image)}}" alt="account holder image">
                                <h3>{{$user->name}}</h3>
                                <!--<p>Web Developer</p>-->
                            </div>

                            <ul>
                                <li>
                                    <a href="view-profile/{{$user->id}}" class="active">
                                        <i class='bx bx-user'></i>
                                        My Profile
                                    </a>
                                </li>
                                <!--<li>-->
                                <!--    <a href="resume.html" target="_blank">-->
                                <!--        <i class='bx bxs-file-doc'></i>-->
                                <!--        My Resume-->
                                <!--    </a>-->
                                <!--</li>-->
                                <!--<li>-->
                                <!--    <a href="#">-->
                                <!--        <i class='bx bx-briefcase'></i>-->
                                <!--        Applied Job-->
                                <!--    </a>-->
                                <!--</li>-->
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="account-details">
                            <h3>Change Password</h3>
                            <form method="post" class="basic-info" action="{{url('submit-change-password')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input type="text" class="form-control" name="old">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" id="pass" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Retype Password</label>
                                            <input type="password" name="repass" id="repass" class="form-control">
                                            <span id="err" style="color:red"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <button type="submit" class="account-btn">Change Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Account Area End -->

@stop

@section('add-scripts')


<script>
    $(document).ready(function() {
        $('#repass').keyup(function(e) {
            if($('#pass').val()!=$('#repass').val()) {
                $('#submit').prop('disabled', true)
                $('#err').html('Password not matched!')
            }else {
                $('#submit').prop('disabled', false)
                $('#err').html('')
            }
        })
    })
</script>
@stop

