@extends('mpn.front.layout')

@section('content')

        <!-- Page Title Start -->
        <section class="page-title title-bg10">
            <div class="d-table">
                <div class="d-table-cell">
                    <h2>Account</h2>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Account</li>
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
        @if($user->tmp_disabled==1) <div class="alert alert-warning">Your profile is on Hold!</div> @endif
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
                                    <a href="javascript:void(0)" class="active">
                                        <i class='bx bx-user'></i>
                                        My Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('jobs')}}" target="_blank">
                                        <i class='bx bxs-file-doc'></i>
                                        Job Post
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('job-review')}}">
                                        <i class='bx bx-briefcase'></i>
                                        Reviews
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('job-id')}}" target="_blank">
                                        <i class='bx bx-coffee-togo'></i>
                                        Job Guide
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('employee-change-password') }}">
                                        <i class='bx bx-lock-alt' ></i>
                                        Change Password
                                    </a>
                                </li>

                                <!--<li>-->
                                <!--    <a href="#">-->
                                <!--        <i class='bx bx-log-out'></i>-->
                                <!--        Log Out-->
                                <!--    </a>-->
                                <!--</li>-->
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="account-details">
                            <h3>Basic Information</h3>
                            <form method="post" class="basic-info" action="{{url('update-client-profile')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Your Name" readonly>
                                        </div>
                                    </div>
                                    <input type="hidden" name="eid" value="{{Auth::id()}}">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" value="{{$user->email}}" placeholder="Your Email" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="number" name="phone" value="{{$user->phone}}" class="form-control" placeholder="Your Phone" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea name="address" class="form-control"  readonly>{{$user->address}}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Account Holder Name</label>
                                            <input type="text" name="acc_holder" value="{{$user->ac_holder_name}}" class="form-control" placeholder=""  readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <input type="number" name="ac_number" value="{{$user->ac_number}}" class="form-control" placeholder=""  readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>IFSC Code</label>
                                            <input type="text" name="ifsc" value="{{$user->ifsc}}" class="form-control" placeholder=""  readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <!-- <div class="form-group">
                                            <label>Profile Image</label>
                                            <input type="file" name="pic" class="form-control">
                                            
                                        </div> -->
                                        <div class="form-group">
                                            <img src="{{asset('media/profile/'.$user->profile_image)}}" width="150" height="130">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-12">
                                        <button type="submit" class="account-btn">Edit</button>
                                    </div> -->
                                </div>
                            </form>

                            <!--<h3>Address</h3>-->
                            <!--<form class="-candidate-address">-->
                            <!--    <div class="row">-->
                            <!--        <div class="col-md-6">-->
                            <!--            <div class="form-group">-->
                            <!--                <label>Your Country</label>-->
                            <!--                <input type="text" class="form-control" placeholder="Your Country">-->
                            <!--            </div>-->
                            <!--        </div>-->

                            <!--        <div class="col-md-6">-->
                            <!--            <div class="form-group">-->
                            <!--                <label>Your City</label>-->
                            <!--                <input type="text" class="form-control" placeholder="Your City">-->
                            <!--            </div>-->
                            <!--        </div>-->

                            <!--        <div class="col-md-6">-->
                            <!--            <div class="form-group">-->
                            <!--                <label>Zip Code</label>-->
                            <!--                <input type="number" class="form-control" placeholder="City Zip">-->
                            <!--            </div>-->
                            <!--        </div>-->

                            <!--        <div class="col-md-6">-->
                            <!--            <div class="form-group">-->
                            <!--                <label>Region</label>-->
                            <!--                <input type="text" class="form-control" placeholder="Your Region">-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="col-md-12">-->
                            <!--            <button type="submit" class="account-btn">Edit</button>-->
                            <!--            <button type="submit" class="account-btn">Save</button>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</form>-->

                            <!--<h3>Other information</h3>-->
                            <!--<form class="cadidate-others">-->
                            <!--    <div class="row">-->
                            <!--        <div class="col-md-6">-->
                            <!--            <div class="form-group">-->
                            <!--                <label>Age</label>-->
                            <!--                <input type="number" class="form-control" placeholder="Your Age">-->
                            <!--            </div>-->
                            <!--        </div>-->

                            <!--        <div class="col-md-6">-->
                            <!--            <div class="form-group">-->
                            <!--                <label>Work Experience</label>-->
                            <!--                <input type="number" class="form-control" placeholder="Work Experience">-->
                            <!--            </div>-->
                            <!--        </div>-->

                            <!--        <div class="col-md-6">-->
                            <!--            <div class="form-group">-->
                            <!--                <label>Language</label>-->
                            <!--                <input type="text" class="form-control" placeholder="Language">-->
                            <!--            </div>-->
                            <!--        </div>-->

                            <!--        <div class="col-md-6">-->
                            <!--            <div class="form-group">-->
                            <!--                <label>Skill</label>-->
                            <!--                <input type="text" class="form-control" placeholder="Skills">-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="col-md-12">-->
                            <!--            <button type="submit" class="account-btn">Edit</button>-->
                            <!--            <button type="submit" class="account-btn">Save</button>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</form>-->

                            <!--<h3>Social links</h3>-->
                            <!--<form class="candidates-sociak">-->
                            <!--    <div class="row">-->
                            <!--        <div class="col-lg-6">-->
                            <!--            <div class="form-group">-->
                            <!--                <label>Facebook</label>-->
                            <!--                <input type="text" class="form-control" placeholder="www.facebook.com/user">-->
                            <!--            </div>-->
                            <!--        </div>-->

                            <!--        <div class="col-lg-6">-->
                            <!--            <div class="form-group">-->
                            <!--                <label>Twitter</label>-->
                            <!--                <input type="text" class="form-control" placeholder="www.twitter.com/user">-->
                            <!--            </div>-->
                            <!--        </div>-->

                            <!--        <div class="col-lg-6">-->
                            <!--            <div class="form-group">-->
                            <!--                <label>Linkedin</label>-->
                            <!--                <input type="text" class="form-control" placeholder="www.Linkedin.com/user">-->
                            <!--            </div>-->
                            <!--        </div>-->

                            <!--        <div class="col-lg-6">-->
                            <!--            <div class="form-group">-->
                            <!--                <label>Github</label>-->
                            <!--                <input type="text" class="form-control" placeholder="www.Github.com/user">-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="col-md-12">-->
                            <!--            <button type="submit" class="account-btn">Edit</button>-->
                            <!--            <button type="submit" class="account-btn">Save</button>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</form>-->
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
        // alert('ok')
            if($('#gp').val()=='group') {
                $('#group-box').show()
                $('#gpname').prop('required', true)
                $('#gpphone').prop('required', true)
            }else {
                $('#group-box').hide()
                $('#gpname').prop('required', false)
                $('#gpphone').prop('required', false)
            }
        // $('#type').change(function() {
        //     if($(this).val()=='employee') {
        //         $('input[name=aadhar]').prop('required', true)
        //         $('input[name=aadhar_img]').prop('required', true)
        //         $('#emptype').show()
        //         $('#gp').prop('required', true)
        //     }else {
        //         $('#emptype').hide()
        //         $('#gp').prop('required', false)
        //         $('input[name=aadhar]').prop('required', false)
        //         $('input[name=aadhar_img]').prop('required', false)
        //     }
        // })
        
        $('#gp').change(function() {
            if($(this).val()=='group') {
                $('#group-box').show()
                $('#gpname').prop('required', true)
                $('#gpphone').prop('required', true)
            }else {
                $('#group-box').hide()
                $('#gpname').prop('required', false)
                $('#gpphone').prop('required', false)
            }
        })
        
        $('#add-gp').click(function() {
            var total_length=$('.element').length;
            var lastid=$('.element:last').attr('id');
            var split_id=lastid.split('_');
            var nextindex=Number(split_id[1])+1;
            // alert(nextindex)
            var max=25;
            if(total_length<25) {
                $('.element:last').after('<div class="element" id="div_'+nextindex+'"></div>');
                $('#div_'+nextindex).append('<hr/>'
                                            +'<div class="form-group">'
                                            +'<label>Name</label>'
                                            +'<input type="text" class="form-control" name="gpname[]" id="gpname" required>'
                                            +'<label>Phone</label>'
                                            +'<input type="text" class="form-control" name="gpphone[]" id="gpphone" required>'
                                            +'<br/>'
                                            +'<button class="btn btn-danger remove" id="remove_'+nextindex+'">X</button>'
                                            +'</div>');
            }
        })
        
        $('.container').on('click', '.remove', function() {
            var id=this.id;
            var remove_id=id.split('_');
            $('#div_'+remove_id[1]).remove();
        })
    })
</script>

@stop
