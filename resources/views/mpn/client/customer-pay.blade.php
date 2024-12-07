@extends('mpn.front.layout')

@section('content')

        <!-- Page Title Start -->
        <section class="page-title title-bg10">
            <div class="d-table">
                <div class="d-table-cell">
                    <h2>Customer Pay</h2>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Customer Pay</li>
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
                            <h3>Customer Pay</h3>
                            <form method="post" action="{{url('submit-customer-pay')}}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Select Job</label>
                                            <select name="job" class="form-control" required>
                                                <option value="">--select--</option>
                                                @foreach($jobs as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="hidden" id="title" name="title" value="">
                                        
                                        <div class="form-group">
                                            <label for="">Job Duration (in Hours)</label>
                                            <input type="number" name="hr" class="form-control" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">Waiting Time (in Hours)</label>
                                            <input type="number" name="wait" class="form-control" required>
                                        </div>
                                        
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

    })
</script>
@stop

