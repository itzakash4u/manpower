
@extends('mpn.front.layout')

@section('add-metatags')
        <title>Register with Manpower Nation | Trusted Manpower Supply Agency in Kolkata</title>
        <meta name="description" content="Register with Manpower Nation and get access to reliable and affordable manpower supply services in Kolkata. Sign up today to get started." />
@stop


@section('content')

<section class="page-title title-bg13">
    <div class="d-table">
        <div class="d-table-cell">
            <h2 class="text-center">Sign Up</h2>
        </div>
    </div>
    <div class="lines">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</section>
<div class="container">
 
 @if ($errors->any())
     <div class="alert alert-danger">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
 @endif

@if(Session::has('success')) 
    <div class="alert alert-success">{{ Session::get('success') }} <a href="{{url('user-login')}}" class="signin-btn">Sign In</a> @endif</div>
    <section class="account-login-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <div class="login-register-form-wrap">
                        <div class="login-register-form">
                            <div class="signin-section ptb-100">
                                <form method="post" id="reg" action="{{ url('submit-register') }}" enctype="multipart/form-data" class="signin-form find-form">
                                    @csrf
                                    <div class="form-group">
                                        <label>User Type</label>
                                        <select class="form-control" name="type" id="type" required>
                                            <option value="">--SELECT--</option>
                                            <option value="employer">Customer</option>
                                            <option value="employee">Employee</option>
                                        </select>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label>User Type</label>
                                        <select class="form-control" name="type" id="type" required>
                                            <option value="">--SELECT--</option>
                                            <option value="employer">Customer</option>
                                            <option value="employee">Employee</option>
                                        </select>
                                    </div> -->
                                    <div class="form-group" id="emptype" style="display:none">
                                        <label>Employee Type</label>
                                        <select class="form-control" name="gp" id="gp">
                                            <option value="">--SELECT--</option>
                                            <option value="individual">Indivisual</option>
                                            <option value="group">Group</option>
                                        </select>
                                    </div>
                                    
                                    <div class="container" id="group-box" style="display:none">
                                        <div class="element" id="div_1">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="gpname[]" id="gpname">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" name="gpphone[]" id="gpphone">
                                            </div>
                                        </div>
                                        <button type="button" id="add-gp" class="btn btn-primary btn-sm">Add New Member</button>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-group" id="catbox">
                                        <label>Category</label>
                                        <select class="form-control" name="category" id="category" required>
                                            <option value="">--SELECT--</option>
                                            @if($cats)
                                            @foreach($cats as $cat)
                                            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="phone" maxlength="10" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" name="addr" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" class="form-control" name="state" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nearby Location</label>
                                        <input type="text" class="form-control" name="near_loc" maxlength="15" required>
                                    </div>
                                    <div class="form-group" id="aadhar_no_box">
                                        <label>Aadhar Number</label>
                                        <input type="text" class="form-control" name="aadhar" maxlength="12">
                                    </div>
                                    <div class="form-group">
                                        <label>Profile Picture</label>
                                        <input type="file" class="form-control" name="profile_pic" required>
                                    </div>
                                    <div class="form-group" id="aadhar_img_box">
                                        <label>Aadhar Image</label>
                                        <input type="file" class="form-control" name="aadhar_img">
                                    </div>
                                    <div class="form-group">
                                        <label>Account Holder Name</label>
                                        <input type="text" class="form-control" name="acc_holder" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Account No</label>
                                        <input type="text" class="form-control" name="account_no" required>
                                    </div>
                                    <div class="form-group">
                                        <label>IFSC</label>
                                        <input type="text" class="form-control" name="ifsc" required>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" id="agree" class="check-box-s" required>
                                            I agreed with <a href="{{url('user-terms-and-conditions')}}" target="_blank">user terms and conditions</a>
                                        </label>
                                    </div>
                                    <div class="signup-btn text-center">
                                        <button type="submit" id="signup" class="find-btn" disabled>Sign Up</button>
                                    </div>
                                    <div class="create-btn text-center">
                                        <p>
                                            Have an Account?
                                            <a href="{{url('user-login')}}">
                                                Sign In
                                                <i class="bx bx-chevrons-right bx-fade-right"></i>
                                            </a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    

@stop

@section('add-scripts')

<script>
    $(document).ready(function() {
        // alert('ok')
        $('#agree').change(function() {
            if($(this).prop('checked')==true) {
                alert('Move ahead with the agreement')
                $('#signup').prop('disabled', false)
            }else {
                $('#signup').prop('disabled', true)
            }
        })
        $('#reg').submit(function(e) {
            if($('#gp').val()=='group') {
                if($('.element').length<4) {
                    alert('Minimum 4 people required to register as Group!')
                    e.preventDefault()
                }
            }
        })
        $('#type').change(function() {
            if($(this).val()=='employee') {
                $('#catbox').show()
                $('#category').prop('required', true)
                $('#aadhar_no_box').show()
                $('#aadhar_img_box').show()
                $('input[name=aadhar]').prop('required', true)
                $('input[name=aadhar_img]').prop('required', true)
                $('#emptype').show()
                $('#gp').prop('required', true)
            }else {
                $('#catbox').hide()
                $('#category').prop('required', false)
                $('#emptype').hide()
                $('#gp').prop('required', false)
                $('#aadhar_no_box').hide()
                $('#aadhar_img_box').hide()
                $('input[name=aadhar]').prop('required', false)
                $('input[name=aadhar_img]').prop('required', false)
            }
        })
        
        $('#gp').change(function() {
            if($(this).val()=='group') {
                $('#catbox').hide()
                $('#category').prop('required', false)
                $('#group-box').show()
                $('#gpname').prop('required', true)
                $('#gpphone').prop('required', true)
            }else {
                $('#catbox').show()
                $('#category').prop('required', true)
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





