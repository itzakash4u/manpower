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
                                    <h4 class="pull-left page-title">Jobs Match {{$user->name}}</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">{{ strtoupper(Auth::user()->role) }}</a></li>
                                        <li class="active">Jobs</li>
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
                                        <h3 class="panel-title">Jobs Match {{$user->name}}</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Job</th>
                                                            <th>Cost</th>
                                                            <th>Location</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $sl=0; ?>
                                                       @if($jobs)
                                                       @foreach($jobs as $job)
                                                       <tr>
                                                        <td>{{ $sl }}</td>
                                                        <td>{{ $job->description }}</td>
                                                        <td>{{ $job->cost }}</td>
                                                        <td>{{$job->location}}</td>
                                                        <td>
                                                            <a href="{{url('manual-accept-job')}}/{{$job->id}}/{{$user->id}}" class="btn btn-primary">Accept</a>
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
    function removeJob(id) {
        if(confirm("Are you sure to delete?")) {
            window.location="remove-employee/"+id;
        }
    }
</script>
@stop