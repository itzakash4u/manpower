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
                        <li>Applied Job Summery</li>
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
                            <h3>Applied Job Summery</h3>
                            <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Job</th>
                                                            <th>Earning</th>
                                                            <th>Company Commission</th>
                                                            <!-- <th>Cost</th>
                                                            <th>Location</th>
                                                            <th>Status</th> -->
                                                        </tr>
                                                    </thead>
                                                    <?php $sl=0; ?>
                                                       @if($transactions)
                                                       @foreach($transactions as $txn)
                                                       <?php $sl++; $job=\App\Models\Job::find($txn->job_id); ?>
                                                       @if(isset($job))
                                                       <tr>
                                                        <td>{{ $sl }}</td>
                                                        <td>
                                                            <p>Job ID: {{$job->job_id}}</p>
                                                            <p>Job: {{ $job->title }}</p>
                                                            <p>Location: {{$job->location}}</p> 
                                                        </td>
                                                        <td>{{ $txn->emp_pay }}</td>
                                                        <td>{{ $txn->company_commission }}</td>

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

