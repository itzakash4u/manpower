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
                                    <h4 class="pull-left page-title">Paylevel</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">Admin</a></li>
                                        <li class="active">Paylevel</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12" style="float:right">
        <button class="btn btn-success btn-sm" style="float:right" data-toggle="modal" data-target="#addCategory">Add Paylevel</button>
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
                                        <h3 class="panel-title">Paylevel</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Category</th>
                                                            <th>Level</th>
                                                            <th>Year</th>
                                                            <th>Basic</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $sl=0; ?>
                                                       @if($paylevels)
                                                       @foreach($paylevels as $pay)
                                                       <?php $sl++;
                                                       $category=App\Models\Category::find($pay->category_id); ?>
                                                       <tr>
                                                        <td>{{ $sl }}</td>
                                                        <td>{{ $category->category_name }}</td>
                                                        <td>{{ $pay->level }}</td>
                                                        <td>{{ $pay->year }}</td>
                                                        <td>{{ $pay->basic }}</td>
                                                        <td>
                                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#editCategory{{$pay->id}}"><i class="fa fa-edit"></i></a>
                                                            <a href="javascript:void(0)" onclick="removeCategory({{$pay->id}})"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                       </tr>

                                                       
                        <div class="modal fade" id="editCategory{{$pay->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" action="{{url('/submit-edit-paylevel')}}">
                                        @csrf
                                    <div class="modal-header">
                                        <h3 class="modal-title">Edit Paylevel</h3>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="pay_id" value="{{$pay->id}}">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Category</label>
                                            <select class="form-control" name="category">
                                                <option value="">SELECT CATEGORY</option>
                                                @if($cats)
                                                @foreach($cats as $cat1)
                                                <option value="{{$cat1->id}}" {{ ($cat1->id==$pay->category_id) ? 'selected':'' }}>{{$cat1->category_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Level</label>
                                            <input type="number" class="form-control" name="level" value="{{ $pay->level }}" id="exampleInputPassword1" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Year</label>
                                            <input type="number" class="form-control" name="year"  value="{{ $pay->year }}" id="exampleInputPassword1" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Basic</label>
                                            <input type="number" class="form-control" name="basic" value="{{ $pay->basic }}" id="exampleInputPassword1" placeholder="" required>
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
                                    <form method="post" action="{{url('/submit-paylevel')}}">
                                        @csrf
                                    <div class="modal-header">
                                        <h3 class="modal-title">Add Paylevel</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Category</label>
                                            <select class="form-control" name="category" required>
                                                <option value="">SELECT CATEGORY</option>
                                                @if($cats)
                                                @foreach($cats as $cat1)
                                                <option value="{{$cat1->id}}">{{$cat1->category_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Level</label>
                                            <input type="number" class="form-control" name="level" id="exampleInputPassword1" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Year</label>
                                            <input type="number" class="form-control" name="year" id="exampleInputPassword1" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Basic</label>
                                            <input type="number" class="form-control" name="basic" id="exampleInputPassword1" placeholder="" required>
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
    function removeCategory(id) {
        if(confirm("Are you sure to delete?")) {
            window.location="remove-paylevel/"+id;
        }
    }
</script>
@stop