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
                                    <h4 class="pull-left page-title">Add Employee</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">Admin</a></li>
                                        <li class="active">Add Employee</li>
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
                                        <h3 class="panel-title">Add Employee</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form method="post" action="{{ url('submit-employee') }}" enctype="multipart/form-data">
                                            @csrf
                                        <fieldset>
                                        <legend>Employee Details</legend>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Category</label>
                                                    <select class="form-control" name="category" id="cat" required>
                                                        <option value="">SELECT CATEGORY</option>
                                                        @if($cats)
                                                        @foreach($cats as $cat)
                                                        <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Sub-category</label>
                                                    <select class="form-control" name="subcategory" id="sub" required>
                                                        <option value="">SELECT SUB-CATEGORY</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Employee Name</label>
                                                    <input type="text" name="employee" class="form-control" placeholder="Enter Employee Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Father Name</label>
                                                    <input type="text" name="father" class="form-control" placeholder="Enter Father Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Mother Name</label>
                                                    <input type="text" name="mother" class="form-control" placeholder="Enter Employee Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">DOB</label>
                                                    <input type="date" name="dob" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Permanent Address</label>
                                                    <textarea name="permanent" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Present Address</label>
                                                    <textarea name="present" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Aadhar Card</label>
                                                    <input type="text" name="aadhar" class="form-control" placeholder="Enter Aadhar Card Number" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">PAN Card</label>
                                                    <input type="text" name="pan" class="form-control" placeholder="Enter PAN Card Number" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Voter Card</label>
                                                    <input type="text" name="voter" class="form-control" placeholder="Enter Voter Card Number" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Mobile</label>
                                                    <input type="text" name="phone" class="form-control" placeholder="Enter Mobile Number" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Profile Picture</label>
                                                    <input type="file" name="pic" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Practicing Doctor</label>
                                                    <select name="practice" class="form-control" required>
                                                        <option value="">SELECT</option>
                                                        <option value="yes">YES</option>
                                                        <option value="no">NO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Marital Status</label>
                                                    <select name="marital" class="form-control" id="marital" required>
                                                        <option value="">SELECT</option>
                                                        <option value="married">Married</option>
                                                        <option value="unmarried">Unmarried</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        </fieldset>

                                        <div id="spouse">
                                        <fieldset>
                                        <legend>Spouse Details</legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Spouse Name</label>
                                                    <input type="text" name="spouse_name" class="form-control" id="spouse-name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Spouse DOB</label>
                                                    <input type="date" name="spouse_dob" class="form-control" id="spouse-dob">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Spouse Education</label>
                                                    <select name="spouse_edu" class="form-control" id="spouse-edu">
                                                        <option value="">Select Education</option>
                                                        <option value="secondary">Secondary</option>
                                                        <option value="hs">HS</option>
                                                        <option value="bachelor">Bachelor</option>
                                                        <option value="masters">Masters</option>
                                                        <option value="phd">PhD</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Spouse Occupation</label>
                                                    <select name="spouse_occu" class="form-control" id="spouse-occu">
                                                        <option value="">Select Occupation</option>
                                                        <option value="working">Working</option>
                                                        <option value="housewife">House Wife</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        </fieldset>
                                        </div>

                                        <fieldset>
                                            <legend>Employee Pay Details</legend>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Pay Level</label>
                                                    <select name="paylevel" class="form-control" id="paylevel" required>
                                                        <option value="">Select Pay Level</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="16">16</option>
                                                        <option value="18">18</option>
                                                        <option value="20">20</option>
                                                        <option value="23">23</option>
                                                        <option value="24">24</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Pay Matrix</label>
                                                    <select name="paymatrix" class="form-control" id="paymatrix" required>
                                                        <option value="">Select Pay Matrix</option>
  
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Joining Date</label>
                                                    <input type="date" name="joining" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Govt Quarter</label>
                                                    <select name="quarter" class="form-control" required>
                                                        <option value="">Select</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <legend>Bank Details</legend>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Bank Name</label>
                                                    <input type="text" name="bank" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Account No</label>
                                                    <input type="text" name="accno" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">IFSC</label>
                                                    <input type="text" name="ifsc" class="form-control" required>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <div class="row">
                                            <div class="col-lg-12" style="float:right">
                                                <input type="submit" class="btn btn-primary" value="Submit">
                                            </div>
                                        </div>
                                        </form>
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
    $(document).ready(function() {
        //  alert('ok')

        $('#cat').change(function() {
            $.ajax({
                type: 'post',
                url: '{{route("get-subcategory")}}',
                headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},
                data: {'cat_id': $(this).val()},
                beforeSend: function() {
                    $('#sub').html('<option>Please wait...</option>')
                },
                dataType: 'json',
                success: function(res) {
                    $('#sub').html(null)
                    $('#sub').html('<option value="">SELECT SUBCATEGORY</option>')
                    for(var i=0;i<res.length;i++) {
                        $('#sub').append('<option value="'+res[i].id+'">'+res[i].subcategory_name+'</option>')
                    }
                },
                error: function() {alert('something went wrong with category!')}
            })
        })

        $('#paylevel').change(function() {
            $.ajax({
                type: 'post',
                url: '{{route("get-paymatrix")}}',
                headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},
                data: {'plid': $(this).val()},
                beforeSend: function() {
                    $('#paymatrix').html('<option>Please wait...</option>')
                },
                dataType: 'json',
                success: function(res) {
                    $('#paymatrix').html(null)
                    $('#paymatrix').html('<option value="">SELECT PAYMATRIX</option>')
                    for(var i=0;i<res.length;i++) {
                        $('#paymatrix').append('<option value="'+res[i].id+'">'+res[i].year+' Year - '+res[i].basic+'</option>')
                    }
                },
                error: function() {alert('something went wrong with paymatrix!')}
            })
        })

        $('#marital').change(function() {
            if($(this).val()=='unmarried') {
                $('#spouse').hide();
                $('#spouse-name').prop('required', false)
                $('#spouse-dob').prop('required', false)
                $('#spouse-edu').prop('required', false)
                $('#spouse-occu').prop('required', false)
            }else {
                $('#spouse').show()
                $('#spouse-name').prop('required', true)
                $('#spouse-dob').prop('required', true)
                $('#spouse-edu').prop('required', true)
                $('#spouse-occu').prop('required', true)
            }
        })
    })
</script>
@stop