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
                        <li>Job Confirmation</li>
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
                            <h3>Job Confirmation</h3>
                            <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Title</th>
                                                            <th>Posted By</th>
                                                            <th>Phone</th>
                                                            <th>Cost</th>
                                                            <th>Location</th>
                                                            <th>Status</th>
                                                            <th>Job Details</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $sl=0; ?>
                                                       @if($apply)
                                                       @foreach($apply as $apl)
                                                       <?php $sl++; $job=\App\Models\Job::find($apl->job_id); if(isset($job)) $user=\App\Models\User::find($job->user_id); ?>
                                                       @if(isset($job) && isset($user))
                                                       <tr>
                                                        <td>{{ $sl }}</td>
                                                        <td>{{ $job->title }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->phone }}</td>
                                                        <td>{{$job->cost}}</td>
                                                        <td>{{$user->address}}</td>
                                                        <td>
                                                            <!-- <button type="button" onclick="complte({{$apl->id}})" class="btn btn-primary">Mark Complete</button> -->
                                                            @if(empty($apl->ongoing) || $apl->ongoing=='started') <span class="badge bg-warning">ONGOING</span> @elseif($apl->completed==1) <span class="badge bg-success">DONE</span> @endif 
                                                        </td>
                                                        <td><a href="{{url('emp-job-details')}}/{{$job->id}}" class="btn btn-primary btn-sm">View</a></td>
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

