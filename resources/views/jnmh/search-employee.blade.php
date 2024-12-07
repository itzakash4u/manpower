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
                                    <h4 class="pull-left page-title">Search Employee</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">Admin</a></li>
                                        <li class="active">Search Employee</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

<div class="row">
    <form method="post" action="submit-search-employee">
        @csrf
        <div class="col-md-10">
            <input type="text" name="search" class="form-control" placeholder="Enter Employee ID">
        </div>
        <div class="col-md-2" style="float:left">
            <input type="submit" class="btn btn-success" value="Search" style="float:left">     
        </div>
    </form>
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
                                        <h3 class="panel-title">Search Employee</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Employee ID</th>
                                                            <th>Employee Name</th>
                                                            <th>Designation</th>
                                                            <th>Joining Date</th>
                                                            <th>Month</th>
                                                            <th>Pay Level</th>
                                                            <th>Gross</th>
                                                            <th>Deduction</th>
                                                            <th>Net Pay</th>
                                                            <th>Create Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $sl=0; ?>
                                                       @if($salary)
                                                       @foreach($salary as $sal)
                                                       <?php $sl++;
                                                       $emp=App\Models\Employee::find($sal->employee_id);
                                                       $subcat=App\Models\Subcategory::find($emp->subcategory_id);
                                                       $plmin=App\Models\Paylevel::where('level', $emp->pay_level)->min('basic');
                                                       $plmax=App\Models\Paylevel::where('level', $emp->pay_level)->max('basic'); ?>
                                                       <tr>
                                                        <td>{{ $sl }}</td>
                                                        <td>{{ $emp->eid }}</td>
                                                        <td>{{ $emp->name }}</td>
                                                        <td>{{ strtoupper($subcat->subcategory_name) }}</td>
                                                        <td>{{ date('d-m-Y', strtotime($emp->joining_date)) }}</td>
                                                        <td>{{ date('M, Y', strtotime($sal->sal_month)) }}</td>
                                                        <td>PL-{{ $emp->pay_level }} ({{ $plmin }}-{{ $plmax }})</td>
                                                        <td>{{ $sal->gross }}</td>
                                                        <td>{{ $sal->deduction }}</td>
                                                        <td>{{ $sal->net_pay }}</td>
                                                        <td>{{ date('d-m-Y', strtotime($sal->created_at)) }}</td>
                                                        <td>
                                                            <a href="view-salary/{{ $sal->id }}"><i class="fa fa-print"></i></a>
                                                            <!-- <a href="javascript:void(0)" onclick="removeSalary({{ $sal->id }})"><i class="fa fa-trash"></i></a> -->
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