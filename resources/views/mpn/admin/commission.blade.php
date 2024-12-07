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
                                    <h4 class="pull-left page-title">Charges</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">{{ strtoupper(Auth::user()->role) }}</a></li>
                                        <li class="active">Charges</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">                        
        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#discount" style="float:right">Add Discount</button>
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
                                        <h3 class="panel-title">Charges</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form method="post" action="{{ url('/edit-charges') }}" enctype="multipart/form-data">
                                            @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Commission</label>
                                                    <input type="number" name="commission" class="form-control" value="{{ $charge->charges }}" placeholder="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12" style="float:right">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All Discounts</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Client</th>
                                                            <th>Discount (in %)</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $sl=0; ?>
                                                       @if($discount)
                                                       @foreach($discount as $dc)
                                                       <?php $sl++; $usr=\App\Models\User::find($dc->client_id); ?>
                                                       <tr>
                                                        <td>{{ $sl }}</td>
                                                        <td>{{ $usr->name }}</td>
                                                        <td>{{ $dc->off_percent }}</td>
                                                        <td>
                                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#editDiscount{{$dc->id}}"><i class="fa fa-edit"></i></a>
                                                            <a href="javascript:void(0)" onclick="removeDiscount({{$dc->id}})"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                       </tr>

                        <div class="modal fade" id="editDiscount{{$dc->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Discount</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{url('edit-discount')}}">
                                            @csrf
                                            <input type="hidden" name="dc_id" value="{{$dc->id}}">
                                            <div class="form-group">
                                                <label>Client</label>
                                                <select class="form-control" name="client" required readonly disabled>
                                                    <option value="">--Select--</option>
                                                    @foreach($client as $cl) 
                                                    <option value="{{ $cl->id }}" {{($cl->id==$dc->client_id)?'selected':''}}>{{$cl->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Off Percent</label>
                                                <input type="number" class="form-control" name="off" value="{{ $dc->off_percent }}" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" value="Save">
                                            </div>
                                        </form>
                                    </div>
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

                        <div class="modal fade" id="discount">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Discount</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{url('add-discount')}}">
                                            @csrf
                                            <div class="form-group">
                                                <label>Client</label>
                                                <select class="form-control" name="client" required>
                                                    <option value="">--Select--</option>
                                                    @foreach($client as $cl) 
                                                    <option value="{{ $cl->id }}">{{$cl->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Off Percent</label>
                                                <input type="number" class="form-control" name="off" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" value="Save">
                                            </div>
                                        </form>
                                    </div>
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
    function removeDiscount(id) {
        if(confirm("Are you sure to delete?")) {
            window.location="remove-discount/"+id;
        }
    }
</script>
@stop