@extends('mpn.front.layout')

@section('content')

        <!-- Page Title Start -->
        <section class="page-title title-bg10">
            <div class="d-table">
                <div class="d-table-cell">
                    <h2>Account</h2>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Add Job</li>
                    </ul>
                </div>
            </div>
            <div class="lines">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </section>
        <!-- Page Title End -->

        <!-- Account Area Start -->
        @if(Session::has('success')) <div class="alert alert-success">{{Session::get('success')}}</div> @endif
        @if(Session::has('danger')) <div class="alert alert-danger">{{Session::get('danger')}}</div> @endif
        <section class="account-section ptb-100">
            <div class="container">
                <div class="row">

                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="account-details">
                            <h3>Add Job</h3>
                            <form method="post" action="{{url('/submit-job')}}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Category Name</label>
                                            <select name="cat" id="cat" class="form-control" required>
                                                <option value="">--select--</option>
                                                <?php $cats=\App\Models\Category::all(); ?>
                                                @foreach($cats as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="hidden" id="title" name="title" value="">

                                        <div class="form-group" id="jtype" style="display:none">
                                            <label for="">Job Type</label>
                                            <select class="form-control" name="job_type" id="jobtyp">
                                                <option value="">---SELECT---</option>
                                                <option value="normal">Normal</option>
                                                <option value="heavy">Heavy Duty</option>
                                            </select>
                                        </div>

                                        <div class="form-group" id="no_assignment" style="display:none">
                                            <label for="">Number Of Assignment</label>
                                            <input type="number" class="form-control" name="numassign" id="numassign">
                                        </div> 

                                        <div class="form-group" id="jdur" style="display:none">
                                            <label for="">Number of Hours</label>
                                            <input type="number" class="form-control" name="nohr" id="nohr">
                                        </div> 

                                        <div class="form-group" id="numemp" style="display:none">
                                            <label for="">Number Of Employees</label>
                                            <input type="number" class="form-control" name="noemp" id="noemp">
                                        </div> 

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description</label>
                                            <textarea class="form-control" id="desp" name="desp" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Plan Cost (Rs.)</label>
                                            <input type="number" class="form-control" id="cost" name="cost" required readonly>
                                        </div>
 
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Convinient Charge (Rs.)</label>
                                            <input type="test" class="form-control" id="conv_chrg" name="" value="" readonly disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Total Amount Payable (Rs.)</label>
                                            <input type="text" class="form-control" id="pay" name="pay" required readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Location</label>
                                            <input type="text" class="form-control" name="location" required>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="">Status</label>
                                            <select class="form-control" name="status" required>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>-->
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-dark waves-effect waves-light">Submit</button>
                                        </div>
                                    </div>
                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Account Area End -->

@stop

@section('add-scripts')

<script>
    function removeJob(id) {
        if(confirm("Are you sure to delete?")) {
            window.location="remove-job/"+id;
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('#repass').keyup(function(e) {
            if($('#pass').val()!=$('#repass').val()) {
                $('#submit').prop('disabled', true)
                $('#err').html('Password not matched!')
            }else {
                $('#submit').prop('disabled', false)
                $('#err').html('')
            }
        })

        $('#desp').change(function() {
            let desp=$(this).val()
            let len=desp.length
            // alert(desp.substr(0,len))
            if(len>20) {
                $('#title').val(desp.substr(0,20))
            }else {
                $('#title').val(desp.substr(0,len))
            }
        })


        $('#cat').change(function() {
            if($('#cat').val()==1 || $('#cat').val()==2 || $('#cat').val()==3) {
                $('#jtype').show()
                $('#jobtyp').prop('required', true)
                $('#no_assignment').show()
                $('#numassign').prop('required',true)

                $('#jdur').hide()
                $('#nohr').prop('required', false)
                $('#numemp').hide()
                $('#noemp').prop('required', false)
            }
            if($('#cat').val()==4 || $('#cat').val()==5 || $('#cat').val()==6) {
                $('#jtype').hide()
                $('#jobtyp').prop('required', false)
                $('#no_assignment').hide()
                $('#numassign').prop('required',false)

                $('#jdur').show()
                $('#nohr').prop('required', true)
                $('#numemp').show()
                $('#noemp').prop('required', true)
            }
        })

        $('#desp,#nohr,#noemp,#numassign').keyup(function() {
            // alert($('#jobtyp').val()+ ' ' +$('#numassign').val()+' '+$('#cat').val())
            $.ajax({
                    type: 'post',
                    url: '{{route("get-payment-dtls")}}',
                    headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},
                    data: {'cat':$('#cat').val(), 'jobtype': $('#jobtyp').val(), 'numassignment':$('#numassign').val(), 'numhour':$('#nohr').val(), 'numemp':$('#noemp').val()},
                    dataType: 'json',
                    success: function(res) {
                        // alert(res.convinient_charge)
                        if(res.error==0) {
                            $('#cost').val(res.customer_pay)
                            $('#conv_chrg').val(res.convinient_charge)
                            $('#pay').val(res.total_pay)
                        }else {
                            alert('plan not defined!!!')
                        }
                    },
                    error: function() {alert('something went wrong!!!')}
                })
        })
    })
</script>
@stop

