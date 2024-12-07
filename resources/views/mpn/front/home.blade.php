@extends('mpn.front.main')



@section('extra-styles')
<style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }
    li {
        display:inline;
        margin-left: 40px;
        font-size:16px;
        font-weight:bolder;
    }
</style>

@stop

@section('content')

<div class="container">
    @if(Session::has('success')) <div class="alert alert-success">{{Session::get('success')}}</div> @endif
 
 @if ($errors->any())
     <div class="alert alert-danger">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
 @endif

 <?php
 $name='';
 $role='';
 if(Auth::user()!=null) {
    $usr=Auth::user();
    $role=$usr->role;
    $name=$usr->name;
 }
 ?>
  
 <!-- Create Post Form -->
    <div class="row">
        <div class="col-md-6">
            <h1>ManpowerNation</h1>
        </div>
        <div class="col-md-6">
            <div style="float:right;margin-right:40px;font-size:20px;font-weight:bolder">
                <a href="{{url('user-login')}}">Login</a> | <a href="javascript:void(0)" data-toggle="modal" data-target="#registerModal">Register</a>
            </div>
            <div style="float:right;margin-left:20px;">
                <p style="font-weight:bolder;font-size:20px;">@if($role=='employee') {{$name}} @endif</p>
            </div>
       </div>
    </div>

    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Jobs</a></li>
                <li><a href="">Link-1</a></li>
                <li><a href="">Link-2</a></li>
           </ul>
        </div>
    </div>

    <hr/>
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div align="center">
                <select  style="padding:5px 7px">
                    <option value="name">Name</option>
                    <option value="category">Category</option>
                    <option value="cost">Cost</option>
                </select>
                <input type="search" name="" size="70" maxlength="400" style="padding:5px 7px">
                <input type="button" value="Search" class="btn btn-primary">
           </div>
        </div>
    </div>
    <br/></br/>
    <div class="row">
        @if($jobs)
        @foreach($jobs as $job)
        <div class="col-md-4">
            <div class="card" style="width: 30rem; height:25rem;border:solid">
                <div class="card-body">
                    <center>
                    <h2 class="card-title">{{$job->title}}</h2>
                    <h6 class="card-subtitle mb-2 text-muted">Posted job</h6>
                    <p class="card-text"><!--Some quick example text to build on the card title and make up the bulk of the card's content.-->{{$job->description}}</p>
                    <a href="#" class="btn btn-primary">Apply Now</a>
                    <!-- <a href="#" class="card-link">Another link</a> --></center>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>


    <div class="modal fade" id="registerModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Register <button class="btn btn-danger" data-dismiss="modal" style="float:right">X</button></h3>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('submit-register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>User Type</label>
                            <select class="form-control" name="type" required>
                                <option value="">--SELECT--</option>
                                <option value="employer">Employer</option>
                                <option value="employee">Employee</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" required>
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
                            <label>Aadhar Number</label>
                            <input type="text" class="form-control" name="aadhar" required>
                        </div>
                        <div class="form-group">
                            <label>Profile Picture</label>
                            <input type="file" class="form-control" name="profile_pic" required>
                        </div>
                        <div class="form-group">
                            <label>Aadhar Image</label>
                            <input type="file" class="form-control" name="aadhar_img" required>
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
                            <input type="submit" class="btn btn-primary" value="Register">
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer"></div> -->
            </div>
        </div>
    </div>
</div>

@stop