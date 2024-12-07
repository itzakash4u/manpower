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
                        <li>Job Post</li>
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
                    <div class="col-md-12" @if(Auth::user()->tmp_disabled==1) style="display:none" @endif><a href="{{url('add-job')}}" style="float:right" class="btn btn-success">Add Job</a></div>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="account-details">
                            <h3>Job Post</h3>
                            <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Title</th>
                                                            <th>Job Id</th>
                                                            <th>Category</th>
                                                            <!-- <th>Company</th> -->
                                                            <th>Cost</th>
                                                            <th>Location</th>
                                                            <!-- <th>Statis</th> -->
                                                            <th>Action</th>
                                                            <th>Job Details</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $sl=0; ?>
                                                       @if($jobs)
                                                       @foreach($jobs as $job)
                                                       <?php $sl++; $cat=\App\Models\Category::find($job->cat_id); ?>
                                                       <tr>
                                                        <td>{{ $sl }}</td>
                                                        <td>{{ $job->title }}</td>
                                                        <td>{{ $job->job_id }}</td>
                                                        <td>{{ $cat->category_name }}</td>
                                                        <!-- <td>{{$job->company_name}}</td> -->
                                                        <td>{{$job->cost}}</td>
                                                        <td>{{ $job->location }}</td>
                                                        <!-- <td>{{ ($job->status==1)?'Active':'Inactive' }}</td> -->
                                                        <td>
                                                            @if($job->req_cancel==0)
                                                            <a href="{{url('request-job-cancel')}}/{{$job->id}}" class="btn btn-danger">Request Cancel</a>
                                                            @else
                                                            Request sent
                                                            @endif
                                                            <!-- <a href="{{url('edit-job')}}/{{$job->id}}">Edit</a> |
                                                            <a href="javascript:void(0)" onclick="removeJob({{$job->id}})">Delete</a> -->
                                                        </td>
                                                        <td><a href="{{url('customer-job-details')}}/{{$job->id}}" class="btn btn-primary">View</a></td>
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
    })
</script>
@stop

