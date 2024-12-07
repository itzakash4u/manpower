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
                                    <h4 class="pull-left page-title">Payments</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">{{ strtoupper(Auth::user()->role) }}</a></li>
                                        <li class="active">Payments</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12" style="float:right">
        <!-- <button class="btn btn-success btn-sm" style="float:right" data-toggle="modal" data-target="#addCategory"></button> -->
        <a href="{{url('add-payment')}}" class="btn btn-success btn-sm" style="float:right">Add Payment</a>
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
                                        <h3 class="panel-title">Payments</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Job Category</th>
                                                            <th>Convinient Charge</th>
                                                            <th>LV-1 Duration</th>
                                                            <th>LV-1 Customer Charge</th>
                                                            <th>LV-1 Employee Charge</th>
                                                            <th>LV-2 Duration</th>
                                                            <th>LV-2 Customer Charge</th>
                                                            <th>LV-2 Employee Charge</th>
                                                            <th>Waiting Time</th>
                                                            <th>Waiting Charge</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $sl=0; ?>
                                                       @if($payments)
                                                       @foreach($payments as $pay)
                                                       <?php $sl++; $cat=\App\Models\Category::find($pay->category_id); ?>
                                                       <tr>
                                                        <td>{{ $sl }}</td>
                                                        <td>@if($cat) {{ $cat->category_name }} @endif</td>
                                                        <td>@if($pay->discount_type=='flat') {{ ($pay->convinient_charge-$pay->discount) }} @elseif($pay->discount_type=='percent') {{ ($pay->convinient_charge*(100-$pay->discount))/100 }} @endif</td>
                                                        <td>{{$pay->lv1_duration}} Hours</td>
                                                        <td>{{$pay->lv1_customer_pay}}</td>
                                                        <td>{{ $pay->lv1_employee_pay }}</td>
                                                        <td>{{ $pay->lv2_duration }} Hours</td>
                                                        <td>{{$pay->lv2_customer_pay}}</td>
                                                        <td>{{ $pay->lv2_employee_pay }}</td>
                                                        <td>@if(!empty($pay->waiting_time)) {{ $pay->waiting_time }} Hours @else NA @endif</td>
                                                        <td>@if(!empty($pay->waiting_time_charge)) {{ $pay->waiting_time_charge }} @else NA @endif</td>
                                                        <td>
                                                            <a href="{{ url('edit-payment') }}/{{ $pay->id }}"><i class="fa fa-edit"></i></a>
                                                            <a href="javascript:void(0)" onclick="removePay({{$pay->id}})"><i class="fa fa-trash"></i></a>
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
    function removePay(id) {
        if(confirm("Are you sure to delete?")) {
            window.location="remove-payment/"+id;
        }
    }
</script>
@stop