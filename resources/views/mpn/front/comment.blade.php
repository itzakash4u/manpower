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
                            <h3>Review</h3>
                            <form method="post" action="{{url('submit-comment')}}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="exampleInputPassword1"> Job Title</label>
                                            <input type="text" class="form-control" name="title" value="{{$job->title}}" disabled>
                                        </div>

                                        <input type="hidden" name="uid" value="{{$job->user_id}}">
                                        <input type="hidden" name="jid" value="{{$job->id}}">
                                        <div class="form-group">
                                            <label for="">Comment</label>
                                            <textarea class="form-control" name="comment" required></textarea>
                                        </div>
                      
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark waves-effect waves-light">Save</button>
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
    })
</script>
@stop

