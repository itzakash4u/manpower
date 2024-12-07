@extends('mpn.front.layout')

@section('content')

<section class="page-title title-bg1">
            <div class="d-table">
                <div class="d-table-cell">
                    <h2>Latest Blog</h2>
                    <ul>
                        <li>
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
            <div class="lines">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </section>
        <section class="about-section ptb-100 blog-section">
            <div class="container">
                <div class="row">
                    @if($blogs)
                    @foreach($blogs as $blog)
                    <div class="col-md-4">
                        <div class="post-grid">
                            <div class="image-wrapper">
                                <img class="img-fluid" src="{{ asset('media/blog/'.$blog->image) }}" alt="blog image 01">
                            </div>
                            <div class="post-content">
                                <ul class="post-meta">
                                    <li>{{ date('F d, Y', strtotime($blog->created_at)) }}</li>
                                    <!-- <li><a href="{{url('blog-details')}}/{{$blog->id}}">{{$blog->title}}</a></li> -->
                                </ul>
                                <h3 class="entry-title"><a href="{{url('blog-details')}}/{{$blog->slug}}"><!--Praesent convallis lorem nisi ana mas eget volutpat-->{{$blog->title}}</a></h3>
                                <div class="entry-content">
                                    <p>
                                       <!-- Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.-->{{$blog->excerpt}}
                                    </p>
                                </div>
                                <a class="btn-open" href="{{url('blog-details')}}/{{$blog->slug}}">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    {{$blogs->links('pagination::bootstrap-4')}}
                    <!-- <div class="col-md-4">
                        <div class="post-grid">
                            <div class="image-wrapper">
                                <img class="img-fluid" src="assets/img/image-rect-04.jpg" alt="blog image 01">
                            </div>
                            <div class="post-content">
                                <ul class="post-meta">
                                    <li>August 03, 2017</li>
                                    <li><a href="#">Web Design</a></li>
                                </ul>
                                <h3 class="entry-title"><a href="#">Praesent convallis lorem nisi anamas eget volutpat</a></h3>
                                <div class="entry-content">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </div>
                                <a class="btn-open" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="post-grid">
                            <div class="image-wrapper">
                                <img class="img-fluid" src="assets/img/image-rect-04.jpg" alt="blog image 01">
                            </div>
                            <div class="post-content">
                                <ul class="post-meta">
                                    <li>August 03, 2017</li>
                                    <li><a href="#">Web Design</a></li>
                                </ul>
                                <h3 class="entry-title"><a href="#">Praesent convallis lorem nisi anamas eget volutpat</a></h3>
                                <div class="entry-content">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </div>
                                <a class="btn-open" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="post-grid">
                            <div class="image-wrapper">
                                <img class="img-fluid" src="assets/img/image-rect-04.jpg" alt="blog image 01">
                            </div>
                            <div class="post-content">
                                <ul class="post-meta">
                                    <li>August 03, 2017</li>
                                    <li><a href="#">Web Design</a></li>
                                </ul>
                                <h3 class="entry-title"><a href="#">Praesent convallis lorem nisi anamas eget volutpat</a></h3>
                                <div class="entry-content">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </div>
                                <a class="btn-open" href="#">Read More</a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- <div class="pagination-block text-center">
                <ul>
                    <li><a href="#"><i class="bx bx-chevrons-left"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><i class="bx bx-chevrons-right"></i></a></li>
                </ul>
            </div> -->
        </section>


@stop

@section('add-scripts')


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

