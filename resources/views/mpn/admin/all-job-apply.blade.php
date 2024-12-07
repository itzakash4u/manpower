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
                                                            <th>Category</th>
                                                            <th>Posted By</th>
                                                            <th>Applied By</th>
                                                            <!-- <th>Care Verified</th> -->
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $sl=0; ?>
                                                       @if($applies)
                                                       @foreach($applies as $apply)
                                                       <?php
                                                        $sl++;
                                                        $job=\App\Models\Job::find($apply->job_id);
                                                        if(isset($job)) $cat=\App\Models\Category::find($job->cat_id);
                                                        if(isset($job)) $client=\App\Models\User::find($job->user_id);
                                                        $user=\App\Models\User::find($apply->employee_id); ?>
                                                        @if(isset($job))
                                                       <tr>
                                                        <td>{{ $sl }}</td>
                                                        <td>@if(isset($job)) {{ $job->title }} @endif</td>
                                                        <td>{{ $cat->category_name }}</td>
                                                        <td>
                                                            <p>Name: @if(isset($client)) {{$client->name}} @endif}</p>
                                                            <p>Nearby Location: @if(isset($client)) {{$client->nearby_location}} @endif</p>
                                                            <p>Phone: @if(isset($client)) {{$client->phone}} @endif</p>
                                                        </td>
                                                        <td>
                                                            <p>Name: @if(isset($user)) {{$user->name}} @endif</p>
                                                            <p>Nearby Location: @if(isset($user)) {{$user->nearby_location}} @endif</p>
                                                            <p>Phone: @if(isset($user)) {{$user->phone}} @endif</p>
                                                        </td>
                                                        <!-- <td>@if($apply->cc_approved==1) <span class="badge badge-success">Yes</span> @else <span class="badge badge-danger">No</span> @endif;</td> -->
                                                        <td>@if($apply->completed==1) <span class="badge bg-success">Done</span> @else <a href="{{url('admin-mark-done')}}/{{$apply->id}}" class="btn btn-primary">Mark Done</a> @endif</td>
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
</script>
@stop