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
                                    <h4 class="pull-left page-title">All Jobs</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">Employer</a></li>
                                        <li class="active">Jobs</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12" style="float:right">
        <button class="btn btn-success btn-sm" style="float:right" data-toggle="modal" data-target="#addCategory">Add job</button>
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
                                        <h3 class="panel-title">Jobs</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Title</th>
                                                            <th>Job Id</th>
                                                            <th>Category</th>
                                                            <th>Company</th>
                                                            <th>Cost</th>
                                                            <th>Location</th>
                                                            <th>Statis</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $sl=0; ?>
                                                       @if($jobs)
                                                       @foreach($jobs as $job)
                                                       <?php $sl++; $cat=\App\Models\Category::find($job->cat_id); ?>
                                                       <tr>
                                                        <td>{{ $sl }}</td>
                                                        <td>{{ $job->title }}</td>
                                                        <td>{{ $job->job_id }}</td>
                                                        <td>{{ $cat->category_name }}</td>
                                                        <td>{{$job->company_name}}</td>
                                                        <td>{{$job->cost}}</td>
                                                        <td>{{ $job->location }}</td>
                                                        <td>{{ ($job->status==1)?'Active':'Inactive' }}</td>
                                                        <td>
                                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#editCategory{{$job->id}}"><i class="fa fa-edit"></i></a>
                                                            <a href="javascript:void(0)" onclick="removeJob({{$job->id}})"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                       </tr>

                                                       
                        <div class="modal fade" id="editCategory{{$job->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <form method="post" action="{{url('/submit-edit-job')}}">
                                        @csrf
                                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Edit Job</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Category Name</label>
                                            <select name="cat" class="form-control" required>
                                                <option value="">--select--</option>
                                                <?php $cats=\App\Models\Category::all(); ?>
                                                @foreach($cats as $cat)
                                                <option value="{{ $cat->id }}" {{ ($job->cat_id==$cat->id)?'selected':'' }}>{{ $cat->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Title</label>
                                            <input type="text" class="form-control" name="title" value="{{ $job->title }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Company</label>
                                            <input type="text" class="form-control" name="company" value="{{ $job->company_name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description</label>
                                            <input type="text" class="form-control" name="desp" value="{{ $job->description }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Cost</label>
                                            <input type="number" class="form-control" name="cost" value="{{ $job->cost }}" required>
                                        </div>       
                                        <div class="form-group">
                                            <label for="">Location</label>
                                            <input type="text" class="form-control" name="location" value="{{ $job->location }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select class="form-control" name="status" required>
                                                <option value="1" {{ ($job->status==1)?'selected':'' }}>Active</option>
                                                <option value="0" {{ ($job->status==0)?'selected':'' }}>Inactive</option>
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
                        
                        <?php $charge=\App\Models\Commission::find(1); ?>

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
                                            <label for="exampleInputPassword1">Charges (in %)</label>
                                            <input type="number" class="form-control" name="cost" value="{{$charge->charges}}" readonly disabled>
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
            window.location="remove-job/"+id;
        }
    }
</script>
@stop