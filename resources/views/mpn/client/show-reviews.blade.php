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
                        <li>Job Reviews</li>
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
                            <h3>Job Reviews</h3>
                            <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Job</th>
                                                            <th>Category</th>
                                                            <th>Reviews Text</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $sl=0; ?>
                                                       @if($reviews)
                                                       @foreach($reviews as $rv)
                                                       <?php
                                                       $sl++;
                                                        $job=\App\Models\Job::find($rv->job_id);
                                                        $cat=\App\Models\Category::find($job->cat_id); ?>
                                                       <tr>
                                                        <td>{{ $sl }}</td>
                                                        <td>{{$job->title}}</td>
                                                        <td>{{ $cat->category_name }}</td>
                                                        <td>{{$rv->review_text}}</td>
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

