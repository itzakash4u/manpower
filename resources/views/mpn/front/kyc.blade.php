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
                        <li>KYC</li>
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
                    <div class="col-md-12">
                        @if($user->kyc_status=='pending')
                        <div class="alert alert-warning">Pending</div>
                        @elseif($user->kyc_status=='rejected')
                        <div class="alert alert-danger">Rejected</div>
                        @elseif($user->kyc_status=='approved')
                        <div class="alert alert-success">Approved</div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <!--<div class="col-md-4">-->
                    <!--    <div class="account-information">-->
                    <!--        <div class="profile-thumb">-->
                    <!--            <img src="assets/img/account.jpg" alt="account holder image">-->
                    <!--            <img src="{{asset('media/profile/'.$user->profile_image)}}" alt="account holder image">-->
                    <!--            <h3>{{$user->name}}</h3>-->
                    <!--            <p>Web Developer</p>-->
                    <!--        </div>-->

                    <!--        <ul>-->
                    <!--            <li>-->
                    <!--                <a href="view-profile/{{$user->id}}" class="active">-->
                    <!--                    <i class='bx bx-user'></i>-->
                    <!--                    My Profile-->
                    <!--                </a>-->
                    <!--            </li>-->
                    <!--            <li>-->
                    <!--                <a href="resume.html" target="_blank">-->
                    <!--                    <i class='bx bxs-file-doc'></i>-->
                    <!--                    My Resume-->
                    <!--                </a>-->
                    <!--            </li>-->
                    <!--            <li>-->
                    <!--                <a href="#">-->
                    <!--                    <i class='bx bx-briefcase'></i>-->
                    <!--                    Applied Job-->
                    <!--                </a>-->
                    <!--            </li>-->
                    <!--        </ul>-->
                    <!--    </div>-->
                    <!--</div>-->

                    <div class="col-md-12">
                        <div class="account-details">
                            <h3>KYC</h3>
                            <form method="post" class="basic-info" action="{{url('employee-update-kyc')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Aadhar Number</label>
                                            <input type="text" class="form-control" name="aadhar_no" value="{{ $user->aadhar_no }}" required @if($user->kyc_status=='pending' || $user->kyc_status=='approved') disabled @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Aadhar Image</label>
                                            <input type="file" name="aadhar_img" class="form-control" @if($user->kyc_status=='pending' || $user->kyc_status=='approved') disabled @endif>
                                        </div>
                                        <div class="form-group">
                                            <a href="{{asset('media/aadhar/'.Auth::user()->aadhar_image)}}" target="_blank"><img src="{{asset('media/aadhar/'.Auth::user()->aadhar_image)}}" width="160" height="140"></a>
                                            <span></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12" @if($user->kyc_status=='pending' || $user->kyc_status=='approved') style="display:none" @endif>
                                        <button type="submit" class="account-btn">Update</button>
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

