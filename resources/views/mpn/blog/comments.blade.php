@extends('mpn.main')

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
                                    <h4 class="pull-left page-title">Blog Comments</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">{{ strtoupper(Auth::user()->role) }}</a></li>
                                        <li class="active">Blog Comments</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
<!--  -->
<!-- <div class="row">
    <div class="col-md-12">
        <button type="button" data-toggle="modal" data-target="#blogModal" class="btn btn-success" style="float:right">Add Blog</button>
    </div>
</div>
<br/> -->
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
                                        <h3 class="panel-title">Blog Comments</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Blog</th>
                                                            <th>Comment Text</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $sl=0; ?>
                                                       @if($comments)
                                                       @foreach($comments as $cmt)
                                                       <?php
                                                        $sl++; $blog=\App\Models\Blog::find($cmt->blog_id); ?>

                                                        @if(isset($blog))
                                                       <tr>
                                                        <td>{{ $sl }}</td>
                                                        <td>{{ $blog->title }}</td>
                                                        <td>{{ $cmt->comment_text }}</td>
                                                        <td>{{ $cmt->name }}</td>
                                                        <td>{{ $cmt->email }}</td>
                                                        <td>
                                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#blogEditModal{{$cmt->id}}"><i class="fa fa-edit"></i></a>
                                                            <a href="javascript:void(0)" onclick="remove({{$cmt->id}})"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                       </tr>
                                                       @endif

                                                       
                        <div class="modal fade" id="blogEditModal{{$cmt->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Edit Comment</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ url('edit-comment') }}" enctype="multipart/form-data">
                                            @csrf 
                                            <input type="hidden" name="comment_id" value="{{$cmt->id}}">

                                            <div class="form-group">
                                                <label>Comment</label>
                                                <textarea class="form-control" name="comment" class="form-control" required>{{ $cmt->comment_text }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-success" value="Update">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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

                        </div> <!-- End Row -->

                        <div class="modal fade" id="blogModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Add Blog</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ url('submit-add-blog') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="title" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" id="desp" name="desp" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Excerpt</label>
                                                <textarea class="form-control" name="excerpt" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Featured Image</label>
                                                <input type="file" class="form-control" name="bpic" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" value="Submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


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
    function remove(id) {
        if(confirm("Are you sure to delete?")) {
            window.location="remove-comment/"+id;
        }
    }
</script>

<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('desp');
</script>

@stop