@extends('jnmh.main')

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
                                    <h4 class="pull-left page-title">Users</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">Admin</a></li>
                                        <li class="active">Users</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12" style="float:right">
        <?php $username=App\Models\User::find($userid); ?>
        <h2>{{$username->name}}</h2>
    </div>
</div>
<br/>
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
                                        <h3 class="panel-title">Users</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Login</th>
                                                            <th>Logout</th>
                                                            <!-- <th>Action</th> -->
                                                        </tr>
                                                    </thead>
                                                    <?php $sl=0; ?>
                                                       @if($track)
                                                       @foreach($track as $usr)
                                                       <?php $sl++;
                                                       $user=App\Models\User::find($usr->user_id); ?>
                                                       <tr>
                                                        <td>{{ $sl }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ date('d-m-Y H:i:s', strtotime($usr->login)) }}</td>
                                                        <td>@if(!empty($usr->logout)) {{ date('d-m-Y H:i:s', strtotime($usr->logout)) }} @else Not Performed! @endif</td>
                                                        <!-- <td>
                                                            <a href="user-login-details?id={{ $usr->id }}"><i class="fa fa-eye"></i></a>
                                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#editCategory{{$usr->id}}"><i class="fa fa-edit"></i></a>
                                                            <a href="javascript:void(0)" onclick="removeUser({{$usr->id}})"><i class="fa fa-trash"></i></a>
                                                        </td> -->
                                                       </tr>

                                                       
                        <div class="modal fade" id="editCategory{{$usr->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" action="{{url('/submit-edit-user')}}">
                                        @csrf
                                    <div class="modal-header">
                                        <h3 class="modal-title">Edit User</h3>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="user_id" value="{{$usr->id}}">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $usr->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" name="email" id="" value="{{$usr->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" class="form-control" name="password" id="" value="">
                                            <span style="color:green">Enter above to change password. If left empty then password will not change.</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">User Type</label>
                                            <select class="form-control" name="type" require>
                                                <option value="1" {{ ($usr->type==1)?'selected':''; }}>Data Entry</option>
                                                <option value="2" {{ ($usr->type==2)?'selected':''; }}>Employee</option>
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
                                    <form method="post" action="{{url('/submit-add-user')}}">
                                        @csrf
                                    <div class="modal-header">
                                        <h3 class="modal-title">Add User</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Name</label>
                                            <input type="text" name="name" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" name="email" id="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" class="form-control" name="password" id="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">User Type</label>
                                            <select class="form-control" name="type" require>
                                                <option value="">SELECT</option>
                                                <option value="1">Data Entry</option>
                                                <option value="2">Employee</option>
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
    function removeUser(id) {
        if(confirm("Are you sure to delete?")) {
            window.location="remove-user/"+id;
        }
    }
</script>
@stop