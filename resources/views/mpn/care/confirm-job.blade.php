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
                                    <h4 class="pull-left page-title">Job Apply</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">{{ strtoupper(Auth::user()->role) }}</a></li>
                                        <li class="active">Job Apply</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
<!--  -->

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
                                        <h3 class="panel-title">Job Apply</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Job Title</th>
                                                            <th>Job Category</th>
                                                            <th>Job Destination</th>
                                                            <th>Posted By</th>
                                                            <th>Applied By</th>
                                                            <th>Employee ID</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $sl=0; ?>
                                                       @if($jobs)
                                                       @foreach($jobs as $job)
                                                       <?php
                                                        $sl++;
                                                        // $job=\App\Models\Job::find($apply->job_id);
                                                        $cat=\App\Models\Category::find($job->cat_id);
                                                        $client=\App\Models\User::find($job->user_id);
                                                        $apply=\App\Models\Jobapply::where('job_id', $job->id)->first();
                                                        if(isset($apply)) $user=\App\Models\User::find($apply->employee_id); ?>
                                                        @if(isset($client) && isset($user))
                                                       <tr>
                                                        <td>{{ $sl }}</td>
                                                        <td>{{ $job->description }}</td>
                                                        <td>{{ $cat->category_name }}</td>
                                                        <td>{{ $job->location }}</td>
                                                        <td>
                                                            <p>Name: {{$client->name}}</p>
                                                            <p>Nearby Location: {{$client->nearby_location}}</p>
                                                            <p>Phone: {{$client->phone}}</p>
                                                        </td>
                                                        @if($apply!=null)
                                                        <td>
                                                            <p>Name: {{$user->name}}</p>
                                                            <p>Nearby Location: {{$user->nearby_location}}</p>
                                                            <p>Phone: {{$user->phone}}</p>
                                                        </td>
                                                        @else
                                                        <td>NA</td>
                                                        @endif

                                                        @if($apply!=null)
                                                        <th>{{$user->employee_id}}</th>
                                                        @else
                                                        <td><form method="post" action="{{url('care-search-employee')}}">@csrf<input type="text" name="searchemp"><input type="hidden" name="jobid" value="{{$job->id}}"><input type="submit" class="btn btn-primary btn-sm" value="Search"></form></td>
                                                        @endif
                                                        <!-- <td>@if(isset($apply) && $apply->cc_approved==0) <a href="care-confirm-job/{{$apply->id}}" class="btn btn-primary">Accept</a> @else <span class="badge bg-success">Accepted</span> @endif</td> -->
                                                        <td>@if(isset($apply)) <span class="badge bg-success">Accepted</span> @else <span class="badge bg-warning">Not Accepted</span> @endif</td>
                                                        <td><button class="btn btn-danger btn-sm" onclick="closeJob({{$job->id}})">Close Job</button></td>
                                                       </tr>
                                                       @endif
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
    function removeJob(id) {
        if(confirm("Are you sure to delete?")) {
            window.location="remove-job/"+id;
        }
    }

    function closeJob(id) {
        if(confirm("Are you sure to close job?")) {
            window.location="care-close-job/"+id;
        }
    }
</script>
@stop