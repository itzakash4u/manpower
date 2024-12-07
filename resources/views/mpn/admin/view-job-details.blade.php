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
                                    <h4 class="pull-left page-title">View Job Details</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">{{ strtoupper(Auth::user()->role) }}</a></li>
                                        <li class="active">View Job Details</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

<!-- <div class="row">
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
                                        <h3 class="panel-title">View Job Details</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table  class="table table-striped table-bordered">
                                                                        <tr>
                                                                            <td>Job</td>
                                                                            <td>{{$job->description}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Job ID</td>
                                                                            <td>{{$job->job_id}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Job Location</td>
                                                                            <td>{{$job->location}}</td>
                                                                        </tr>
                                                                        <tr @if(empty($job->job_duration)) style="display:none" @endif>
                                                                            <td>Job Duration</td>
                                                                            <td>{{$job->job_duration}} Hour</td>
                                                                        </tr>
                                                                        <tr @if(empty($job->no_of_emp)) style="display:none" @endif>
                                                                            <td>No of Employee</td>
                                                                            <td>{{$job->no_of_emp}}</td>
                                                                        </tr>
                                                                        <tr @if(empty($job->job_type)) style="display:none" @endif>
                                                                            <td>Job Type</td>
                                                                            <td>{{$job->job_type}}</td>
                                                                        </tr>
                                                                        <tr @if(empty($job->no_of_assignment)) style="display:none" @endif>
                                                                            <td>Number Of Assignments</td>
                                                                            <td>{{$job->no_of_assignment}} @if($job->cat_id==2) Rooms @endif</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Cost</td>
                                                                            <td>{{$job->cost}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Total Paid</td>
                                                                            <td>{{$job->pay}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Accepted By</td>
                                                                            <td>
                                                                                <?php $apply=\App\Models\Jobapply::where('job_id', $job->id)->first();
                                                                                if(isset($apply)) $emp=\App\Models\User::find($apply->employee_id); ?>
                                                                                @if(isset($emp))
                                                                                <p>Employee Name: {{$emp->name}}</p>
                                                                                <p>Employee ID: {{$emp->employee_id}}</p>
                                                                                @else
                                                                                NA
                                                                                @endif
                                                                            </td>
                                                                        </tr>
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
    function removeJob(id) {
        if(confirm("Are you sure to delete?")) {
            window.location="admin-remove-job/"+id;
        }
    }
</script>
@stop