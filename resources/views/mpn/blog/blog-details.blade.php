@extends('mpn.front.layout')

@section('add-metatags')
        
        @foreach($slugs as $blog)
        <title>{{$blog->title}}</title>
        @endforeach
        
@stop

@section('content')

<section class="page-title title-bg1">
            <div class="d-table">
                <div class="d-table-cell">
                    @foreach($slugs as $blog)
                    <h2><small>{{$blog->title}}</small></h2>
                    @endforeach
                    <ul>
                        <li>
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li>Blog Details</li>
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
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="info content-box">
                            @if($slugs)
                            @foreach($slugs as $blog)
                            <div class="post-grid">
                                <div class="image-wrapper">
                                    <img class="img-fluid" src="{{asset('media/blog/'.$blog->image)}}" alt="blog image 01">
                                </div>
                                <div class="post-content">
                                    <ul class="post-meta">
                                        <li>{{date('F d, Y', strtotime($blog->created_at))}}</li>
                                        <!-- <li><a href="#">Web Design</a></li> -->
                                    </ul>
                                    <h3 class="entry-title"><!--Praesent convallis lorem nisi ana mas eget volutpat-->{{$blog->title}}</h3>
                                    <div class="entry-content">
                                        {!! $blog->description !!}
                                        
                                        <p>{{$blog->meta}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            {{ $slugs->links('pagination::bootstrap-4') }}
                            <!-- <div class="post-pagi-area">
                                <a href="#"><i class="bx bx-chevrons-left"></i> Previus Post</a>
                                <a href="#">Next Post <i class="bx bx-chevrons-right"></i></a>
                            </div> -->
                            <div class="post-tags share">
                                <!-- <div class="tags">
                                    <span>Tags: </span>
                                    <a href="#">Consulting</a>
                                    <a href="#">Planing</a>
                                    <a href="#">Business</a>
                                    <a href="#">Fashion</a>
                                </div> -->
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                <h3>Comment</h3>
                                <form method="post" action="{{url('post-blog-comment')}}">
                                    @csrf
                                    <input type="hidden" name="blogid" value="{{ $blog->id }}">
                                    <input type="hidden" name="slug" value="{{ $blog->slug }}">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Comment</label>
                                        <textarea class="form-control" name="comment" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@stop

@section('add-scripts')


<script>
    $(document).ready(function() {
    
    })
</script>
@stop

