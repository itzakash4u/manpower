@extends('mpn.front.layout')

@section('content')

        <!-- Page Title Start -->
        <section class="page-title title-bg10">
            <div class="d-table">
                <div class="d-table-cell">
                    <h2>Account</h2>
                    <ul>
                        <li>
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li>Job Details</li>
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
                            <h3>Job Details</h3>
                            <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <!-- <th>#</th> -->
                                                            <th>Job</th>
                                                            <th>Earning</th>
                                                            <th>Company Commission</th>
                                                            <!-- <th>Cost</th>
                                                            <th>Location</th>
                                                            <th>Status</th>
                                                            <th>Job Details</th> -->
                                                        </tr>
                                                    </thead>
                                                    <?php $sl=0; ?>

                                                       <?php $txn=\App\Models\Transaction::where('job_id', $job->id)->first(); $cat=\App\Models\Category::find($job->cat_id); ?>
                                                       <tr>
                                                        <!-- <td>{{ $sl }}</td> -->
                                                        <td>
                                                            <p>Category: {{ $cat->category_name }}</p>
                                                            <p>JobID: {{$job->job_id}}</p>
                                                            <p>Location: {{$job->location}}</p>
                                                        </td>
                                                        <td>@if(isset($txn)) {{ $txn->emp_pay }} @else NA @endif</td>
                                                        <td>@if(isset($txn)) {{ $txn->company_commission }} @else NA @endif</td>
                                                      
                                                    <tbody>
                                                    </tbody>
                                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Account Area End -->

@stop

@section('add-scripts')

<script>
    function complete(id) {
        if(confirm("Are you sure to delete?")) {
            window.location="mark-job-complete/"+id;
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
    })
</script>
@stop

