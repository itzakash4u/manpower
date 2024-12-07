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
                                    <h4 class="pull-left page-title">Edit Payment</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">{{ strtoupper(Auth::user()->role) }}</a></li>
                                        <li class="active">Edit Payment</li>
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
                                        <h3 class="panel-title">Edit Payments</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <form method="post" action="{{url('submit-edit-payment')}}">
                                                    @csrf
                                                    <input type="hidden" name="payid" value="{{$pay->id}}">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Category</label>
                                                                <select class="form-control" name="cat" required disabled>
                                                                    <option value="">---SELECT---</option>
                                                                    @if($cats)
                                                                    @foreach($cats as $cat)
                                                                    <option value="{{$cat->id}}" {{($cat->id==$pay->category_id)?'selected':''}}>{{$cat->category_name}}</option>
                                                                    @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Convinient Charge</label>
                                                                <input type="number" class="form-control" name="cnv_chrg" value="{{$pay->convinient_charge}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Discount Type</label>
                                                                <select class="form-control" name="discount_type" required>
                                                                    <option value="">---SELECT---</option>
                                                                    <option value="flat" {{ ($pay->discount_type=='flat')?'selected':'' }}>Flat</option>
                                                                    <option value="percent" {{ ($pay->discount_type=='percent')?'selected':'' }}>Percentage</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Discount</label>
                                                                <input type="number" class="form-control" name="discount" value="{{$pay->discount}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">LV-1 Duration</label>
                                                                <input type="number" class="form-control" name="lv1_dur" value="{{$pay->lv1_duration}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">LV-1 Customer Charge</label>
                                                                <input type="number" class="form-control" name="lv1_cust_chrg" value="{{$pay->lv1_customer_pay}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">LV-1 Employee Charge</label>
                                                                <input type="number" class="form-control" name="lv1_emp_chrg" value="{{$pay->lv1_employee_pay}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">LV-2 Duration</label>
                                                                <input type="number" class="form-control" name="lv2_dur" value="{{$pay->lv2_duration}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">LV-2 Customer Charge</label>
                                                                <input type="number" class="form-control" name="lv2_cust_chrg" value="{{$pay->lv2_customer_pay}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">LV-2 Employee Charge</label>
                                                                <input type="number" class="form-control" name="lv2_emp_chrg" value="{{$pay->lv2_employee_pay}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Waiting Time</label>
                                                                <input type="number" class="form-control" name="wait_time" value="{{$pay->waiting_time}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Waiting Charge</label>
                                                                <input type="number" class="form-control" name="wait_chrg" value="{{$pay->waiting_time_charge}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-primary" value="Update">
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- End Row -->

                        <div class="modal fade" id="addCategory">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" action="{{url('/submit-job')}}">
                                        @csrf
                                    <div class="modal-header">
                                        <h3 class="modal-title">Add Job</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Category Name</label>
                                            <select name="cat" class="form-control" required>
                                                <option value="">--select--</option>
                                                <?php $cats=\App\Models\Category::all(); ?>
                                                @foreach($cats as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Title</label>
                                            <input type="text" class="form-control" name="title" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Company</label>
                                            <input type="text" class="form-control" name="company" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description</label>
                                            <input type="text" class="form-control" name="desp" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Cost</label>
                                            <input type="number" class="form-control" name="cost" required>
                                        </div>       
                                        <div class="form-group">
                                            <label for="">Location</label>
                                            <input type="text" class="form-control" name="location" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select class="form-control" name="status" required>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
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
    function removePay(id) {
        if(confirm("Are you sure to delete?")) {
            window.location="remove-payment/"+id;
        }
    }
</script>
@stop