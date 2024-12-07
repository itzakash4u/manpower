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
                                    <h4 class="pull-left page-title">Employee</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">Admin</a></li>
                                        <li class="active">Employee</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12" style="float:right">
        <a href="{{url('add-employee')}}" class="btn btn-success btn-sm" style="float:right">Add Employee</a>
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
                                        <h3 class="panel-title">Employee</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Category</th>
                                                            <th>Subcategory</th>
                                                            <th>Name</th>
                                                            <th>Employee ID</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Pay Level</th>
                                                            <th>Pay Matrix</th>
                                                            <th>Joining Date</th>
                                                            <th>Govt Quarter</th>
                                                            <th>Account No</th>
                                                            <th>IFSC</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $sl=0; ?>
                                                       @if($employees)
                                                       @foreach($employees as $emp)
                                                       <?php $sl++;
                                                       $cat=App\Models\Category::where('id', $emp->category_id)->first();
                                                       $subcat=App\Models\Subcategory::where('id', $emp->subcategory_id)->first();
                                                       $pl=App\Models\Paylevel::where('id', $emp->pay_matrix)->first(); ?>
                                                       <tr>
                                                        <td>{{ $sl }}</td>
                                                        <td>{{ $cat->category_name }}</td>
                                                        <td>{{ $subcat->subcategory_name }}</td>
                                                        <td>{{ $emp->name }}</td>
                                                        <td>{{ $emp->eid }}</td>
                                                        <td>{{ $emp->email }}</td>
                                                        <td>{{ $emp->phone }}</td>
                                                        <td>{{ $emp->pay_level }}</td>
                                                        <td>{{ $pl->year }} Year - {{ $pl->basic }}</td>
                                                        <td>{{ date('d-m-Y', strtotime($emp->joining_date)) }}</td>
                                                        <td>{{ strtoupper($emp->govt_quarter) }}</td>
                                                        <td>{{ $emp->account_no }}</td>
                                                        <td>{{ $emp->ifsc }}</td>
                                                        <td>
                                                            <a href="view-employee?id={{ $emp->id }}"><i class="fa fa-eye"></i></a>
                                                            <a href="edit-employee?id={{ $emp->id }}"><i class="fa fa-edit"></i></a>
                                                            <a href="javascript:void(0)" onclick="removeEmployee({{ $emp->id }}, {{ $emp->category_id }})"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                       </tr>
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
function removeEmployee(id,catid) {
    if(confirm("Are you sure to delete?")) {
        window.location="remove-employee?id="+id+"&catid="+catid;
    }
}
</script>

@stop