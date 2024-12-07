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
                                    <h4 class="pull-left page-title">View Employee</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">Admin</a></li>
                                        <li class="active">View Employee</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>


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
                                        <h3 class="panel-title">View Employee</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <?php
                                                    $cat=App\Models\Category::where('id', $emp->category_id)->first();
                                                    $subcat=App\Models\Subcategory::where('id', $emp->subcategory_id)->first();
                                                    $pl=App\Models\Paylevel::where('id', $emp->pay_matrix)->first(); ?>

                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                    </thead>
                                                    <tbody>
                                                        <tr><td colspan="2"><b>Employee Details</b></td></tr>
                                                            <tr>
                                                                <td>Name</td>
                                                                <td>{{ $emp->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Profile Picture</td>
                                                                <td><img src="{{ asset('media/profile/'.$emp->profile_picture) }}" width="160" height="150"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Employee ID</td>
                                                                <td>{{ $emp->eid }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Category Type</td>
                                                                <td>{{ $cat->category_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Subcategory Type</td>
                                                                <td>{{ $subcat->subcategory_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Father's Name</td>
                                                                <td>{{ $emp->father }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Mother's Name</td>
                                                                <td>{{ $emp->mother }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>DOB</td>
                                                                <td>{{ date('d-m-Y', strtotime($emp->dob)) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Permanent Address</td>
                                                                <td>{{ $emp->permanent_address }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Present Address</td>
                                                                <td>{{ $emp->present_address }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Aadhar Card</td>
                                                                <td>{{ $emp->aadhar }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>PAN Card</td>
                                                                <td>{{ $emp->pan }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Voter Card</td>
                                                                <td>{{ $emp->voter }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email</td>
                                                                <td>{{ $emp->email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Mobile</td>
                                                                <td>{{ $emp->phone }}</td>
                                                            </tr>

                                                            <tr><td colspan="2"><b>Spouse Details</b></td></tr>
                                                            <tr>
                                                                <td>Spouse Name</td>
                                                                <td>{{ $emp->spouse_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Spouse DOB</td>
                                                                <td>@if(!empty($emp->spouse_dob)) {{ date('d-m-Y', strtotime($emp->spouse_dob)) }} @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Spouse Education</td>
                                                                <td>{{ strtoupper($emp->spouse_education) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Spouse Occupation</td>
                                                                <td>{{ strtoupper($emp->spouse_occupation) }}</td>
                                                            </tr>

                                                            <tr><td colspan="2"><b>Pay Details</b></td></tr>
                                                            <tr>
                                                                <td>Pay Level</td>
                                                                <td>{{ $pl->level }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Pay Matrix</td>
                                                                <td>{{ $pl->year }} Year - {{ $pl->basic }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Joining Date</td>
                                                                <td>{{ date('d-m-Y', strtotime($emp->joining_date)) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Govt Quarter</td>
                                                                <td>{{ strtoupper($emp->govt_quarter) }}</td>
                                                            </tr>

                                                            <tr><td colspan="2"><b>Bank Details</b></td></tr>
                                                            <tr>
                                                                <td>Bank Name</td>
                                                                <td>{{ $emp->bank }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Account Number</td>
                                                                <td>{{ $emp->account_no }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>IFSC Code</td>
                                                                <td>{{ $emp->ifsc }}</td>
                                                            </tr>
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
    function removeCategory(id) {
        if(confirm("Are you sure to delete?")) {
            window.location="remove-category/"+id;
        }
    }
</script>
@stop