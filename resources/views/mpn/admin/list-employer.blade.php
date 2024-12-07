@extends('mpn.main')

@section('extra-styles')
        <!-- DataTables -->
        <link href="{{asset('ui/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('ui/plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('ui/plugins/datatables/fixedHeader.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('ui/plugins/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('ui/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('ui/plugins/datatables/scroller.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
@stop

@section('main-content')


                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-header-title">
                                    <h4 class="pull-left page-title">Employers</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">{{ strtoupper(Auth::user()->role) }}</a></li>
                                        <li class="active">Employers</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
<!-- 
<div class="row">
    <div class="col-md-12" style="float:right">
        <button class="btn btn-success btn-sm" style="float:right" data-toggle="modal" data-target="#addCategory">Add job</button>
    </div>
</div>
<br/> -->

<div class="row">
                            <div class="col-md-12">
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if(Session::has('danger'))
                                <div class="alert alert-danger">{{Session::get('danger')}}</div>
                                @endif
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Employers</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <!-- <th>Aadhar Number</th>
                                                            <th>Aadhar Image</th> -->
                                                            <th>Address</th>
                                                            <th>Profile Image</th>
                                                            <!-- <th>Account Holder Name</th>
                                                            <th>Account Number</th>
                                                            <th>IFSC Code</th> -->
                                                            <th></th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $sl=0; ?>
                                                       @if($employers)
                                                       @foreach($employers as $employer)
                                                       <?php $sl++; ?>
                                                       <tr>
                                                        <td>{{ $sl }}</td>
                                                        <td>{{ $employer->name }}</td>
                                                        <td>{{ $employer->email }}</td>
                                                        <td>{{$employer->phone}}</td>
                                                        <!-- <td>{{$employer->aadhar_no}}</td>
                                                        <td><a href="{{ asset('media/aadhar/'.$employer->aadhar_image) }}" target="_blank"><img src="{{ asset('media/aadhar/'.$employer->aadhar_image) }}" width="80" height="70"></a></td> -->
                                                        <td>{{ $employer->address }}</td>
                                                        <td><a href="{{ asset('media/profile/'.$employer->profile_image) }}" target="_blank"><img src="{{ asset('media/profile/'.$employer->profile_image) }}" width="80" height="70"></a></td>
                                                        <!-- <td>{{ $employer->ac_holder_name }}</td>
                                                        <td>{{ $employer->ac_number }}</td>
                                                        <td>{{ $employer->ifsc }}</td> -->
                                                        <td>@if($employer->tmp_disabled==0) <a href="{{url('admin-temp-disable')}}/{{$employer->id}}" class="btn btn-success btn-sm">Hold</a> @else <a href="{{url('admin-temp-disable')}}/{{$employer->id}}" class="btn btn-warning btn-sm">Activate</a> @endif</td>
                                                        <td>
                                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#editCategory{{$employer->id}}"><i class="fa fa-edit"></i></a>
                                                            <a href="javascript:void(0)" onclick="removeJob({{$employer->id}})"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                       </tr>

                                                       
                        <div class="modal fade" id="editCategory{{$employer->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <form method="post" action="{{ url('/update-profile') }}" enctype="multipart/form-data">
                                            @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $employer->name }}" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="email" name="email" class="form-control" value="{{ $employer->email }}" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Phone</label>
                                                    <input type="text" name="phone" class="form-control" value="{{ $employer->phone }}" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Address</label>
                                                    <textarea name="address" class="form-control" required>{{$employer->address}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">State</label>
                                                    <select class="form-control" name="state" required>
                                                        <option value="West Bengal">West Bengal</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Account Holder Name</label>
                                                    <input type="text" name="acc_holder" class="form-control" value="{{ $employer->ac_holder_name }}" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Account No</label>
                                                    <input type="text" name="ac_no" class="form-control" value="{{ $employer->ac_number }}" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">IFSC Code</label>
                                                    <input type="text" name="ifsc" class="form-control" value="{{ $employer->ifsc }}" placeholder="" required>
                                                </div>
                                            </div> -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Profile Picture</label>
                                                    <input type="file" name="pic" class="form-control">
                                                </div>
                                                <div class="form-group" @if(empty($employer->profile_image)) style="display:none" @endif>
                                                    <img src="{{ asset('media/profile/'.$employer->profile_image) }}" width="150" height="140">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12" style="float:right">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </div>
                                        </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                                                       @endforeach
                                                       @endif
                                                    <tbody>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- End Row -->

                        <div class="modal fade" id="addCategory">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" action="{{url('/submit-job')}}">
                                        @csrf
                                    <div class="modal-header">
                                        <h3 class="modal-title">Add Job</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Category Name</label>
                                            <select name="cat" class="form-control" required>
                                                <option value="">--select--</option>
                                                <?php $cats=\App\Models\Category::all(); ?>
                                                @foreach($cats as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Title</label>
                                            <input type="text" class="form-control" name="title" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Company</label>
                                            <input type="text" class="form-control" name="company" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description</label>
                                            <input type="text" class="form-control" name="desp" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Cost</label>
                                            <input type="number" class="form-control" name="cost" required>
                                        </div>       
                                        <div class="form-group">
                                            <label for="">Location</label>
                                            <input type="text" class="form-control" name="location" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select class="form-control" name="status" required>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-dark waves-effect waves-light">Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

@stop


@section('extra-scripts')
        <!-- Datatables-->
        <script src="{{asset('ui/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('ui/plugins/datatables/dataTables.bootstrap.js')}}"></script>
        <script src="{{asset('ui/plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('ui/plugins/datatables/buttons.bootstrap.min.js')}}"></script>
        <script src="{{asset('ui/plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{asset('ui/plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{asset('ui/plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{asset('ui/plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('ui/plugins/datatables/buttons.print.min.js')}}"></script>
        <script src="{{asset('ui/plugins/datatables/dataTables.fixedHeader.min.js')}}"></script>
        <script src="{{asset('ui/plugins/datatables/dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('ui/plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('ui/plugins/datatables/responsive.bootstrap.min.js')}}"></script>
        <script src="{[asset('ui/plugins/datatables/dataTables.scroller.min.js')}}"></script>

        <!-- Datatable init js -->
        <script src="{{asset('ui/pages/datatables.init.js')}}"></script>
@stop

@section('add-scripts')
<script>
    function removeJob(id) {
        if(confirm("Are you sure to delete?")) {
            window.location="remove-employer/"+id;
        }
    }
</script>
@stop