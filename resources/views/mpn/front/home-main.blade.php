@extends('mpn.front.layout')

@section('add-metatags')
        <title>Top Manpower Suppliers & Consultancy in Kolkata | Manpower Nation</title>
        <meta name="description" content="Looking for Reliable Manpower Supply Services in Kolkata? Look no further than our top-rated manpower supply company. Contact us today for expert labour supply agency solutions." />
@stop

@section('content')

        <!-- Banner Section Start -->
        <div class="banner-style-three d-none">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        @if(Session::has('success')) {{Session::get('success')}} @endif
                        <div class="banner-text">
                            <h1>Find Top Jobss</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <!--<div class="theme-btn">-->
                            <!--    <a href="#" class="default-btn active">Upload your CV</a>-->
                            <!--    <a href="contact.html" class="default-btn">Contact Us</a>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Section End -->
        <!----new slider banner---->
        <section>
            <div class="home-slider-i">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href="{{url('register-user')}}"><img class="banner-img-slide img-fluid" src="{{asset('front/img/banner1.webp')}}" alt="83% Off On Each Posts or Jobs For 1 Year"></a>
                        </div>
                        <div class="carousel-item">
                            <a href="{{url('register-user')}}"><img class="banner-img-slide img-fluid" src="{{asset('front/img/banner4.webp')}}" alt="83% Off On Each Posts or Jobs For 1 Year"></a>
                        </div>
                        <div class="carousel-item">
                            <img class="banner-img-slide img-fluid" src="{{asset('front/img/banner3.webp')}}" alt="83% Off On Each Posts or Jobs For 1 Year">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!--<img class="banner-img-slide img-fluid" src="{{asset('front/img/banner1.jpg')}}" alt="83% Off On Each Posts or Jobs For 1 Year">-->
            </div>
        </section>

        <!-- Find Section Start -->
        <div class="find-section pb-100">
            <div class="container">
                <form class="find-form" method="post" action="job-search-result">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Job ID">
                                <i class="bx bx-search-alt"></i>
                            </div>
                        </div>
    
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input type="text" name="location" class="form-control" id="exampleInputEmail2" placeholder="Location">
                                <i class="bx bx-location-plus"></i>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <select class="category" name="category">
                                <option data-display="Category">Category</option>
                                @if($cats)
                                @foreach($cats as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                <!--<option value="2">Graphics Design</option>-->
                                <!--<option value="4">Data Entry</option>-->
                                <!--<option value="5">Visual Editor</option>-->
                                <!--<option value="6">Office Assistant</option>-->
                                @endforeach
                                @endif
                            </select>
                        </div>
    
                        <div class="col-lg-3">
                            <button type="submit" class="find-btn">
                                Find A Job
                                <i class='bx bx-search'></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Find Section End -->

        <!-- Job Category Section Start -->
        <div class="category-style-two pb-70"> 
            <div class="container">
                <div class="section-title text-center">
                    <h2>All Job Category </h2>
                    <p>Browse our extensive collection of excellent job opportunities across all industries and locations to easily find your dream career. You will have access to the best job ads with Manpower Nation that match your tastes and talents. Begin your job search today to move closer to your ideal career!</p>
                </div>

                <div class="row">
                    @if($cats)
                    @foreach($cats as $cat)
                    <?php $job_count=\App\Models\Job::where('cat_id', $cat->id)->count(); ?>
                    <div class="col-lg-3 col-sm-6">
                        <a href="{{url('list-job-by-cat')}}/{{$cat->id}}">
                            <div class="category-item">
                                <i class="flaticon-wrench-and-screwdriver-in-cross"></i>
                                <h3 style="line-height: 48px;"><!--Construction-->{{ $cat->category_name }}</h3>
                                <!--<p>{{ $job_count }} new Job</p>-->
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @endif

                    <!--<div class="col-lg-3 col-sm-6">-->
                    <!--    <a href="job-list.html">-->
                    <!--        <div class="category-item">-->
                    <!--            <i class="flaticon-accounting"></i>-->
                    <!--            <h3>Finance</h3>-->
                    <!--            <p>8 new Job</p>-->
                    <!--        </div>-->
                    <!--    </a>                  -->
                    <!--</div>-->

                    <!--<div class="col-lg-3 col-sm-6">-->
                    <!--    <a href="job-list.html">-->
                    <!--        <div class="category-item">-->
                    <!--            <i class="flaticon-heart"></i>-->
                    <!--            <h3>Healthcare</h3>-->
                    <!--            <p>9 new Job</p>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</div>-->

                    <!--<div class="col-lg-3 col-sm-6">-->
                    <!--    <a href="job-list.html">-->
                    <!--        <div class="category-item">-->
                    <!--            <i class="flaticon-computer-1"></i>-->
                    <!--            <h3>Graphic Design</h3>-->
                    <!--            <p>6 new Job</p>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</div>-->

                    <!--<div class="col-lg-3 col-sm-6">-->
                    <!--    <a href="job-list.html">-->
                    <!--        <div class="category-item">-->
                    <!--            <i class="flaticon-research"></i>-->
                    <!--            <h3>Banking Jobs</h3>-->
                    <!--            <p>5 new Job</p>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</div>-->

                    <!--<div class="col-lg-3 col-sm-6">-->
                    <!--    <a href="job-list.html">-->
                    <!--        <div class="category-item">-->
                    <!--            <i class="flaticon-worker"></i>-->
                    <!--            <h3>Automotive</h3>-->
                    <!--            <p>12 new Job</p>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</div>-->

                    <!--<div class="col-lg-3 col-sm-6">-->
                    <!--    <a href="job-list.html">-->
                    <!--        <div class="category-item">-->
                    <!--            <i class="flaticon-graduation-cap"></i>-->
                    <!--            <h3>Education</h3>-->
                    <!--            <p>15 new Job</p>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</div>-->

                    <!--<div class="col-lg-3 col-sm-6">-->
                    <!--    <a href="job-list.html">-->
                    <!--        <div class="category-item">-->
                    <!--            <i class="flaticon-computer"></i>-->
                    <!--            <h3>Data Analysis</h3>-->
                    <!--            <p>5 new Job</p>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
        <!-- Job Category Section End -->

        <!-- Why Choose Section Start -->
        <section class="why-choose">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 p-0">
                        <div class="why-choose-text pt-100 pb-70">
                            <div class="section-title text-center">
                                <h2>Why you choose Manpower Nation</h2>
                                <p>We at Manpower Nation are aware of how difficult it may be to locate the ideal position. We have made it our aim to link job searchers with top employers in a variety of industries because of this. Just a few of the reasons why you ought to pick us to assist you in finding your next professional chance are as follows:</p>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="media">
                                        <i class="flaticon-group mt-4"></i>
                                        <div class="media-body">
                                            <h5 class="mt-0">Best Experienced People</h5>
                                            <p>Our network of knowledgeable experts is unique. Use Manpower Nation to have access to the greatest talent in the sector.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="media">
                                        <i class="flaticon-research mt-4"></i>
                                        <div class="media-body">
                                            <h5 class="mt-0">Easy To Find Employees</h5>
                                            <p>Finding your next top performer has never been simpler. You'll have your new hire in no time using Manpower Nation's user-friendly platform.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="media">
                                        <i class="flaticon-discussion mt-4"></i>
                                        <div class="media-body">
                                            <h5 class="mt-0">Customer Support</h5>
                                            <p>We at Manpower Nation are committed to offering excellent customer service. Your queries or issues will always be answered by our devoted support staff.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="media">
                                        <i class="flaticon-recruitment mt-4"></i>
                                        <div class="media-body">
                                            <h5 class="mt-0">Nationwide Job Provide </h5>
                                            <p>Trying to find a job? Manpower Nation is the only place to turn. Our nationwide job vacancies make it simple to find your ideal position.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        <?php
                          $tot_emp=\App\Models\User::where('role', 'employee')->count();
                          $tot_job=\App\Models\Job::count();
                          $ongoing=\App\Models\Jobapply::where('ongoing', 'started')->count();
                          $completed=\App\Models\Jobapply::where('completed', 1)->count();
                        ?>

                            <div class="row counter-area d-none">
                                <div class="col-md-3 col-6">
                                        <div class="counter-text">
                                        <h2><span>{{$tot_job}}</span></h2>
                                        <p>Job Posted</p>
                                    </div>
                                </div>

                                <div class="col-md-3 col-6">
                                    <div class="counter-text">
                                        <h2><span>{{$ongoing}}</span></h2>
                                        <p>Jobs Ongoing</p>
                                    </div>
                                </div>

                                <div class="col-md-3 col-6">
                                    <div class="counter-text">
                                        <h2><span>{{$completed}}</span></h2>
                                        <p>Jobs Completed</p>
                                    </div>
                                </div>

                                <div class="col-md-3 col-6">
                                    <div class="counter-text">
                                        <h2><span>{{$tot_emp}}</span></h2>
                                        <p>Employees</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 p-0">
                        <div class="why-choose-img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-0">
                <div class="p-0 col-sm-4"><img class="icon-img" src="{{asset('front/img/cleaning.webp')}}" alt="Image-HasTech"></div>
                <div class="p-0 col-sm-4"><img class="icon-img" src="{{asset('front/img/cooking.webp')}}" alt="Image-HasTech"></div>
                <div class="p-0 col-sm-4"><img class="icon-img" src="{{asset('front/img/electriction.webp')}}" alt="Image-HasTech"></div>
            </div>
        </section>
        <!-- Why Choose Section End -->
        
        <!--== Start Work Process Area Wrapper ==-->
        <section class="work-process-area">
            <div class="container" data-aos="fade-down">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2>How It Work?</h2>
                            <p>By interacting with top employers and job opportunities through our user-friendly website, you may enhance your career with just a few clicks. Learn more about our simple procedure right away!
                            </p>
                        </div>                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="working-process-content-wrap">
                            <div class="working-col">
                                <!--== Start Work Process ==-->
                                <div class="working-process-item">
                                    <div class="icon-box">
                                        <div class="inner">
                                            <img class="icon-img" src="{{asset('front/img/icons/w1.png')}}" alt="Image-HasTech">
                                            <img class="icon-hover" src="{{asset('front/img/icons/w1-hover.png')}}" alt="Image-HasTech">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Create an Account</h4>
                                        <p class="desc">Are you prepared to advance in your career? It's simple with Manpower Nation! Simply register and create your account in manpower Nation.</p>
                                    </div>
                                    <div class="shape-arrow-icon">
                                        <img class="shape-icon" src="{{asset('front/img/icons/right-arrow.png')}}" alt="Image-HasTech">
                                        <img class="shape-icon-hover" src="{{asset('front/img/icons/right-arrow2.png')}}" alt="Image-HasTech">
                                    </div>
                                </div>
                                <!--== End Work Process ==-->
                            </div>
                            <div class="working-col">
                                <!--== Start Work Process ==-->
                                <div class="working-process-item">
                                    <div class="icon-box">
                                        <div class="inner">
                                            <img class="icon-img" src="{{asset('front/img/icons/w3.png')}}" alt="Image-HasTech">
                                            <img class="icon-hover" src="{{asset('front/img/icons/w3-hover.png')}}" alt="Image-HasTech">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Find The Desired Job </h4>
                                        <p class="desc">To begin your path to success, look through our broad job listings to find your ideal job.</p>
                                    </div>
                                    <div class="shape-arrow-icon">
                                        <img class="shape-icon" src="{{asset('front/img/icons/right-arrow.png')}}" alt="Image-HasTech">
                                        <img class="shape-icon-hover" src="{{asset('front/img/icons/right-arrow2.png')}}" alt="Image-HasTech">
                                    </div>
                                </div>
                                <!--== End Work Process ==-->
                            </div>
                            <div class="working-col">
                                <!--== Start Work Process ==-->
                                <div class="working-process-item">
                                    <div class="icon-box">
                                        <div class="inner">
                                            <img class="icon-img" src="{{asset('front/img/icons/w4.png')}}" alt="Image-HasTech">
                                            <img class="icon-hover" src="{{asset('front/img/icons/w4-hover.png')}}" alt="Image-HasTech">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Apply</h4>
                                        <p class="desc">Finally submit your application for your ideal position today.</p>
                                    </div>
                                </div>
                                <!--== End Work Process ==-->
                            </div>
                                <!--== End Work Process ==-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Work Process Area Wrapper ==-->

        <!-- Job Section End -->   
        <section class="job-style-two pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Desire Jobs For You</h2>
                    <p>Discover your ideal fit with Manpower Nation by browsing our hand-picked collection of outstanding employment opportunities across numerous sectors.</p>
                </div>

                <div class="row">
                    <?php $jobs=\App\Models\Job::all(); ?>
                    @if(count($jobss)>0)
                    @foreach($jobss as $job)
                    <?php $cat=\App\Models\Category::find($job->cat_id); ?>
                    <div class="col-lg-12">
                        <div class="job-card-two">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <div class="company-logo">
                                        <img src="{{asset('front/img/logo-1.png')}}" alt="logo">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="job-info">
                                        <h3>
                                            <!--Web Designer, Graphic Designer, UI/UX Designer-->{{ $cat->category_name }} 
                                        </h3>
                                        <ul>                                          
                                            <li>
                                                <i class='bx bx-briefcase' ></i>
                                                <!--Graphics Designer-->{{$job->company_name}}
                                            </li>
                                            <li>
                                                <i class='bx bx-rupee' ></i>
                                                <!--$35000-$38000-->{{$job->cost}}
                                            </li>
                                            <li>
                                                <i class='bx bx-location-plus'></i>
                                                <!--Wellesley Rd, London-->{{$job->location}}
                                            </li>
                                            <li>
                                                <i class='bx bx-stopwatch' ></i>
                                                <!--9 days ago-->{{date('d-m-Y', strtotime($job->created_at))}}
                                            </li>
                                        </ul>

                                        <!--<span>Full Time</span>-->
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="theme-btn text-end">
                                        <a href="{{url('view-job-details')}}/{{$job->id}}" class="default-btn">
                                            View Details
                                        </a>
                                    </div>
                                    <!--<div class="theme-btn text-end">-->
                                    <!--    @if(Auth::user()!=null && Auth::user()->role=='employee')-->
                                    <!--    <a href="{{url('apply-job')}}/{{$job->id}}/{{Auth::id()}}" class="default-btn">-->
                                    <!--        Apply-->
                                    <!--    </a>-->
                                    <!--    @else-->
                                    <!--    <a href="{{url('user-login')}}" class="default-btn">-->
                                    <!--        Apply-->
                                    <!--    </a>-->
                                    <!--    @endif-->
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <h3 class="text-center">Register And Get Unlimited Job Notifications</h3>
                    @endif
                    
                    <div class="pagination">{{$jobss->links('pagination::bootstrap-4')}}</div>
                    
                </div>
            </div>
        </section>
        <!-- Job Section End -->

        <!-- Testimonial Section Start -->
        <div class="testimonial-style-two testimonial-style-three pt-100 pb-100">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Raving Reviews: Read What Our Customers Say About Their Job Search Success!</h2>
                    <p>See how Manpower Nation's superior services and tailored support helped our clients land their dream jobs.</p>
                </div>

                <div class="row">
                    <div class="testimonial-slider-two owl-carousel owl-theme">
                        <div class="testimonial-items">
                            <div class="testimonial-text">
                                <i class='flaticon-left-quotes-sign'></i>
                                <p>I was unemployed for many months. But, I was introduced to incredible chances as soon as I registered with Manpower Nation. I was hired for my ideal career in a matter of weeks! Manpower Nation, thank you!</p>
                            </div>

                            <div class="testimonial-info-text d-none">
                                <img src="{{asset('front/img/149071.png')}}" alt="client image">
                                <h3>Alisa Meair</h3>
                                <p>CEO of  Company</p>
                            </div>
                        </div>

                        <div class="testimonial-items">
                            <div class="testimonial-text">
                                <i class='flaticon-left-quotes-sign'></i>
                                <p>Manpower Nation's professionalism and effectiveness astounded me. I was matched with prestigious employers who needed my abilities as soon as I signed up. I am overjoyed with the outcome!</p>
                            </div>

                            <div class="testimonial-info-text d-none">
                                <img src="{{asset('front/img/149071.png')}}" alt="client image">
                                <h3>Adam Smith</h3>
                                <p>Web Developer</p>
                            </div>
                        </div>

                        <div class="testimonial-items">
                            <div class="testimonial-text">
                                <i class='flaticon-left-quotes-sign'></i>
                                <p>Manpower Nation is an innovator! I was beginning to lose hope as I had been unemployed for a time. But, Manpower Nation helped me locate a position that suited my qualifications and expertise. I would advise everyone looking for their next big chance to use this service.</p>
                            </div>

                            <div class="testimonial-info-text d-none">
                                <img src="{{asset('front/img/149071.png')}}" alt="client image">
                                <h3>John Doe</h3>
                                <p>Graphics Designer</p>
                            </div>
                        </div>
                        
                        <div class="testimonial-items">
                            <div class="testimonial-text">
                                <i class='flaticon-left-quotes-sign'></i>
                                <p>Manpower Nation has always been praised, but I didn't really appreciate how wonderful it was until I joined. Throughout the entire process, the Manpower Nation staff was incredibly encouraging and helpful. They genuinely care about bringing together job seekers and top-tier employers. Anyone wishing to advance in their job would do well to use this service, in my opinion.</p>
                            </div>

                            <div class="testimonial-info-text d-none">
                                <img src="{{asset('front/img/149071.png')}}" alt="client image">
                                <h3>John Doe</h3>
                                <p>Graphics Designer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial Section End --> 

        <!-- Subscribe Section Start -->
        <section class="subscribe-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <div class="section-title">
                            <h2 style="line-height:normal;"><small>Manpower Nation Is Your Gateway To Reach The Jobs You Were Always Looking For, Unlock Your Earning Potential By Getting Connected With Us</small></h2>
                            <p>Missing opportunities, need a job now?</p>
                        </div>
                    </div>

                    <div class="col-md-3 ">
                        <!--<form class="newsletter-form" data-toggle="validator">-->
                        <!--    <input type="email" class="form-control" placeholder="Enter your email" name="EMAIL" required autocomplete="off">-->
    
                        <!--    <button class="default-btn sub-btn" type="submit">-->
                        <!--        Subscribe-->
                        <!--    </button>-->
    
                        <!--    <div id="validator-newsletter" class="form-result"></div>-->
                        <!--</form>-->
                        <div class="text-end asdfg">
                            <a href="{{url('user-login')}}" class="default-btn"> Find Now </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- Subscribe Section End -->

@stop