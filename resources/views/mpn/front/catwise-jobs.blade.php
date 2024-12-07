@extends('mpn.front.layout')

@section('content')

        <!-- Job Section End -->   
        <section class="job-style-two pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Find Your Dream Career Across All Job Categories with Manpower Nation</h2>
                    <p>Browse our extensive collection of job opportunities spanning all industries and locations to find your ideal career. Manpower Nation in Kolkata offers excellent job ads that match your unique talents and tastes, including opportunities in plumbing, painting and renovation, cooking, electrical, cleaning, lifting/ shifting, and many more. So, hurry up! start looking for a job today and get one step closer to realizing your career goals.</p>
                </div>

                <div class="row">
                    @if(count($jobs)>0)
                    @foreach($jobs as $job)
                    <div class="col-lg-12">
                        <div class="job-card-two">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <div class="company-logo">
                                        <a href="job-details.html">
                                            <img src="{{asset('front/img/logo-1.png')}}" alt="logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="job-info">
                                        <h3>
                                            <a href="job-details.html"><!--Web Designer, Graphic Designer, UI/UX Designer-->{{ $job->title }} </a>
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

                    <!--<div class="col-lg-12">-->
                    <!--    <div class="job-card-two">-->
                    <!--        <div class="row align-items-center">-->
                    <!--            <div class="col-md-1">-->
                    <!--                <div class="company-logo">-->
                    <!--                    <a href="job-details.html">     -->
                    <!--                        <img src="assets/img/company-logo/1.png" alt="logo">-->
                    <!--                    </a> -->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="col-md-8">-->
                    <!--                <div class="job-info">-->
                    <!--                    <h3>-->
                    <!--                        <a href="job-details.html">Website Developer & Software Developer</a>-->
                    <!--                    </h3>-->
                    <!--                    <ul>                                          -->
                    <!--                        <li>-->
                    <!--                            <i class='bx bx-briefcase' ></i>-->
                    <!--                            Web Developer-->
                    <!--                        </li>-->
                    <!--                        <li>-->
                    <!--                            <i class='bx bx-briefcase' ></i>-->
                    <!--                            $3000-$8000-->
                    <!--                        </li>-->
                    <!--                        <li>-->
                    <!--                            <i class='bx bx-location-plus'></i>-->
                    <!--                            Garden Road, UK-->
                    <!--                        </li>-->
                    <!--                        <li>-->
                    <!--                            <i class='bx bx-stopwatch' ></i>-->
                    <!--                            5 days ago-->
                    <!--                        </li>-->
                    <!--                    </ul>-->

                    <!--                    <span>Full Time</span>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="col-md-3">-->
                    <!--                <div class="theme-btn text-end">-->
                    <!--                    <a href="job-details.html" class="default-btn">-->
                    <!--                        Browse Job-->
                    <!--                    </a>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->

                    <!--<div class="col-lg-12">-->
                    <!--    <div class="job-card-two">-->
                    <!--        <div class="row align-items-center">-->
                    <!--            <div class="col-md-1">-->
                    <!--                <div class="company-logo">-->
                    <!--                    <a href="job-details.html">-->
                    <!--                        <img src="assets/img/company-logo/1.png" alt="logo">-->
                    <!--                    </a>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="col-md-8">-->
                    <!--                <div class="job-info">-->
                    <!--                    <h3>-->
                    <!--                        <a href="job-details.html">Application Developer & Web Designer</a>-->
                    <!--                    </h3>-->
                    <!--                    <ul>                                          -->
                    <!--                        <li>-->
                    <!--                            <i class='bx bx-briefcase'></i>-->
                    <!--                            App Developer-->
                    <!--                        </li>-->
                    <!--                        <li>-->
                    <!--                            <i class='bx bx-briefcase'></i>-->
                    <!--                            $3000-$4000-->
                    <!--                        </li>-->
                    <!--                        <li>-->
                    <!--                            <i class='bx bx-location-plus'></i>-->
                    <!--                            State City, USA-->
                    <!--                        </li>-->
                    <!--                        <li>-->
                    <!--                            <i class='bx bx-stopwatch' ></i>-->
                    <!--                            8 days ago-->
                    <!--                        </li>-->
                    <!--                    </ul>-->

                    <!--                    <span>Part-Time</span>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="col-md-3">-->
                    <!--                <div class="theme-btn text-end">-->
                    <!--                    <a href="job-details.html" class="default-btn">-->
                    <!--                        Browse Job-->
                    <!--                    </a>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->

                    <!--<div class="col-lg-12">-->
                    <!--    <div class="job-card-two">-->
                    <!--        <div class="row align-items-center">-->
                    <!--            <div class="col-md-1">-->
                    <!--                <div class="company-logo">-->
                    <!--                    <a href="job-details.html">-->
                    <!--                        <img src="assets/img/company-logo/1.png" alt="logo">-->
                    <!--                    </a>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="col-md-8">-->
                    <!--                <div class="job-info">-->
                    <!--                    <h3>-->
                    <!--                        <a href="job-details.html">Frontend & Backend Developer</a>-->
                    <!--                    </h3>-->
                    <!--                    <ul>                                          -->
                    <!--                        <li>-->
                    <!--                            <i class='bx bx-briefcase' ></i>-->
                    <!--                            Web Developer-->
                    <!--                        </li>-->
                    <!--                        <li>-->
                    <!--                            <i class='bx bx-briefcase' ></i>-->
                    <!--                            $5000-$8000-->
                    <!--                        </li>-->
                    <!--                        <li>-->
                    <!--                            <i class='bx bx-location-plus'></i>-->
                    <!--                            Drive Post NY 676-->
                    <!--                        </li>-->
                    <!--                        <li>-->
                    <!--                            <i class='bx bx-stopwatch' ></i>-->
                    <!--                            1 days ago-->
                    <!--                        </li>-->
                    <!--                    </ul>-->

                    <!--                    <span>Full Time</span>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="col-md-3">-->
                    <!--                <div class="theme-btn text-end">-->
                    <!--                    <a href="job-details.html" class="default-btn">-->
                    <!--                        Browse Job-->
                    <!--                    </a>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
                
                <!-- <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                <i class="bx bx-chevrons-left bx-fade-left"></i>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link active" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="bx bx-chevrons-right bx-fade-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav> -->
                <div>{{$jobs->links()}}</div>
            </div>
        </section>
        <!-- Job Section End -->

@stop