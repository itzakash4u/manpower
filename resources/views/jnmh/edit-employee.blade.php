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
                                    <h4 class="pull-left page-title">Edit Employee</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">Admin</a></li>
                                        <li class="active">Edit Employee</li>
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
                                        <h3 class="panel-title">Edit Employee</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form method="post" action="{{ url('submit-edit-employee') }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="emp_id" value="{{ $emp->id }}">
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
                                                        <option value="{{$cat->id}}" {{ ($cat->id==$emp->category_id)?'selected':'' }}>{{$cat->category_name}}</option>
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
                                                    <input type="text" name="employee" class="form-control" value="{{ $emp->name }}" placeholder="Enter Employee Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Father Name</label>
                                                    <input type="text" name="father" class="form-control" value="{{ $emp->father }}" placeholder="Enter Father Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Mother Name</label>
                                                    <input type="text" name="mother" class="form-control" value="{{ $emp->mother }}" placeholder="Enter Employee Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">DOB</label>
                                                    <input type="date" name="dob" class="form-control" value="{{ date('Y-m-d', strtotime($emp->dob)) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Permanent Address</label>
                                                    <textarea name="permanent" class="form-control" required>{{ $emp->permanent_address }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Present Address</label>
                                                    <textarea name="present" class="form-control" required>{{ $emp->present_address }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Aadhar Card</label>
                                                    <input type="text" name="aadhar" class="form-control" value="{{ $emp->aadhar }}" placeholder="Enter Aadhar Card Number" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">PAN Card</label>
                                                    <input type="text" name="pan" class="form-control" value="{{ $emp->pan }}" placeholder="Enter PAN Card Number" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Voter Card</label>
                                                    <input type="text" name="voter" class="form-control" value="{{ $emp->voter }}" placeholder="Enter Voter Card Number" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="email" name="email" class="form-control" value="{{ $emp->email }}" placeholder="Enter Email" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Mobile</label>
                                                    <input type="text" name="phone" class="form-control" value="{{ $emp->phone }}" placeholder="Enter Mobile Number" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Profile Picture</label>
                                                    <input type="file" name="pic" class="form-control">
                                                </div>
                                                <div class="form-group" @if(empty($emp->profile_picture)) style="display:none" @endif>
                                                    <img src="{{ asset('media/profile/'.$emp->profile_picture) }}" width="140" height="120">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Practicing Doctor</label>
                                                    <select name="practice" class="form-control" required>
                                                        <option value="">SELECT</option>
                                                        <option value="yes" {{ ($emp->practice=='yes')?'selected':'' }}>YES</option>
                                                        <option value="no" {{ ($emp->practice=='no')?'selected':'' }}>NO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Marital Status</label>
                                                    <select name="marital" class="form-control" id="marital" required>
                                                        <option value="">SELECT</option>
                                                        <option value="married" {{ ($emp->marital=='married')?'selected':'' }}>Married</option>
                                                        <option value="unmarried" {{ ($emp->marital=='unmarried')?'selected':'' }}>Unmarried</option>
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
                                                    <input type="text" name="spouse_name" class="form-control" value="{{ $emp->spouse_name }}" id="spouse-name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Spouse DOB</label>
                                                    <input type="date" name="spouse_dob" class="form-control" value="{{ date('Y-m-d', strtotime($emp->spouse_dob)) }}" id="spouse-dob" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Spouse Education</label>
                                                    <select name="spouse_edu" class="form-control" id="spouse-edu" required>
                                                        <option value="">Select Education</option>
                                                        <option value="secondary" {{ ($emp->spouse_education=='secondary')?'selected':'' }}>Secondary</option>
                                                        <option value="hs" {{ ($emp->spouse_education=='hs')?'selected':'' }}>HS</option>
                                                        <option value="bachelor" {{ ($emp->spouse_education=='bachelor')?'selected':'' }}>Bachelor</option>
                                                        <option value="masters" {{ ($emp->spouse_education=='masters')?'selected':'' }}>Masters</option>
                                                        <option value="phd" {{ ($emp->spouse_education=='phd')?'selected':'' }}>PhD</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Spouse Occupation</label>
                                                    <select name="spouse_occu" class="form-control" id="spouse-occu" required>
                                                        <option value="">Select Occupation</option>
                                                        <option value="working" {{ ($emp->spouse_occupation=='working')?'selected':'' }}>Working</option>
                                                        <option value="housewife" {{ ($emp->spouse_occupation=='housewife')?'selected':'' }}>House Wife</option>
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
                                                        <option value="1" {{ ($emp->pay_level==1)?'selected':'' }}>1</option>
                                                        <option value="2" {{ ($emp->pay_level==2)?'selected':'' }}>2</option>
                                                        <option value="3" {{ ($emp->pay_level==3)?'selected':'' }}>3</option>
                                                        <option value="4" {{ ($emp->pay_level==4)?'selected':'' }}>4</option>
                                                        <option value="5" {{ ($emp->pay_level==5)?'selected':'' }}>5</option>
                                                        <option value="6" {{ ($emp->pay_level==6)?'selected':'' }}>6</option>
                                                        <option value="7" {{ ($emp->pay_level==7)?'selected':'' }}>7</option>
                                                        <option value="8" {{ ($emp->pay_level==8)?'selected':'' }}>8</option>
                                                        <option value="9" {{ ($emp->pay_level==9)?'selected':'' }}>9</option>
                                                        <option value="10" {{ ($emp->pay_level==10)?'selected':'' }}>10</option>
                                                        <option value="16" {{ ($emp->pay_level==16)?'selected':'' }}>16</option>
                                                        <option value="18" {{ ($emp->pay_level==18)?'selected':'' }}>18</option>
                                                        <option value="20" {{ ($emp->pay_level==20)?'selected':'' }}>20</option>
                                                        <option value="23" {{ ($emp->pay_level==23)?'selected':'' }}>23</option>
                                                        <option value="24" {{ ($emp->pay_level==24)?'selected':'' }}>24</option>
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
                                                    <input type="date" name="joining" class="form-control" value="{{ date('Y-m-d', strtotime($emp->joining_date)) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Govt Quarter</label>
                                                    <select name="quarter" class="form-control" required>
                                                        <option value="">Select</option>
                                                        <option value="yes" {{ ($emp->govt_quarter=='yes')?'selected':'' }}>Yes</option>
                                                        <option value="no" {{ ($emp->govt_quarter=='no')?'selected':'' }}>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <legend>Bank Details</legend>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Bank Name</label>
                                                    <input type="text" name="bank" class="form-control" value="{{ $emp->bank }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Account No</label>
                                                    <input type="text" name="accno" class="form-control" value="{{ $emp->account_no }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">IFSC</label>
                                                    <input type="text" name="ifsc" class="form-control" value="{{ $emp->ifsc }}" required>
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

        if($('#marital').val()=='unmarried') {
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

        $.ajax({
                type: 'post',
                url: '{{route("get-subcategory")}}',
                headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},
                data: {'cat_id': $('#cat').val()},
                beforeSend: function() {
                    $('#sub').html('<option>Please wait...</option>')
                },
                dataType: 'json',
                success: function(res) {
                    // alert(res[0].id)
                    $('#sub').html(null)
                    $('#sub').html('<option value="">SELECT SUBCATEGORY</option>')
                    for(var i=0;i<res.length;i++) {
                        var selected=(res[i].id=='{{ $emp->subcategory_id }}')?'selected':'';
                        $('#sub').append('<option value="'+res[i].id+'" '+selected+'>'+res[i].subcategory_name+'</option>')
                    }
                },
                error: function() {alert('something went wrong with category!')}
            })

            $.ajax({
                type: 'post',
                url: '{{route("get-paymatrix")}}',
                headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},
                data: {'plid': $('#paylevel').val()},
                beforeSend: function() {
                    $('#paymatrix').html('<option>Please wait...</option>')
                },
                dataType: 'json',
                success: function(res) {
                    $('#paymatrix').html(null)
                    $('#paymatrix').html('<option value="">SELECT PAYMATRIX</option>')
                    for(var i=0;i<res.length;i++) {
                        var selected=(res[i].id=='{{ $emp->pay_matrix }}')?'selected':''
                        $('#paymatrix').append('<option value="'+res[i].id+'" '+selected+'>'+res[i].year+' Year - '+res[i].basic+'</option>')
                    }
                },
                error: function() {alert('something went wrong with paymatrix!')}
            })

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