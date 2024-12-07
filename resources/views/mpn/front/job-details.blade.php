@extends('mpn.front.layout')


@section('content')

        <!-- Page Title Start -->
        <section class="page-title title-bg6">
            <div class="d-table">
                <div class="d-table-cell">
                    <h2>Job Details</h2>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Job Details</li>
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

        <!-- Job Details Section Start -->
        <section class="job-details ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="job-details-text">
                                    <div class="job-card">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <div class="company-logo">
                                                    <img src="{{asset('front/img/logo-1.png')}}" alt="logo">
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="job-info">
                                                    <h3>{{$job->title}}</h3>
                                                    <ul>
                                                        <li>
                                                            <i class='bx bx-location-plus'></i>
                                                            <!--Wellesley Rd, London-->{{$job->location}}
                                                        </li>
                                                        <li>
                                                            <i class='bx bx-filter-alt' ></i>
                                                            <!--Accountancy-->Rs. {{$job->cost}}
                                                        </li>
                                                        <!--<li>-->
                                                        <!--    <i class='bx bx-briefcase' ></i>-->
                                                        <!--    Freelance-->
                                                        <!--</li>-->
                                                    </ul>
                                                    
                                                    <!--<span>-->
                                                    <!--    <i class='bx bx-paper-plane' ></i>-->
                                                    <!--    Apply Before: June 01,2021-->
                                                    <!--</span>-->
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="job-info">
                                                    <h3>Job ID</h3>
                                                    <ul>
                                                        <li>
                                                            <i class=''></i>
                                                            <!--Wellesley Rd, London-->{{$job->job_id}}
                                                        </li>
                                                        <li>
                                                            <!-- <i class='bx bx-filter-alt' ></i> -->
                                                            <!--Accountancy-->
                                                        </li>
                                                        <!--<li>-->
                                                        <!--    <i class='bx bx-briefcase' ></i>-->
                                                        <!--    Freelance-->
                                                        <!--</li>-->
                                                    </ul>
                                                    
                                                    <!--<span>-->
                                                    <!--    <i class='bx bx-paper-plane' ></i>-->
                                                    <!--    Apply Before: June 01,2021-->
                                                    <!--</span>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="details-text">
                                        <h3>Description</h3>
                                        <p><!--Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,but also the leap into essentially unchanged.-->{{$job->description}}</p>

                                        <!--<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>-->
                                    </div>
                                    
                                    <!--<div class="details-text">-->
                                    <!--    <h3>Requirements</h3>-->
                                    <!--   <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>-->

                                    <!--    <ul>-->
                                    <!--        <li>-->
                                    <!--            <i class='bx bx-check'></i>-->
                                    <!--            Work experience-->
                                    <!--        </li>-->
                                    <!--        <li>-->
                                    <!--            <i class='bx bx-check'></i>-->
                                    <!--            Skills (soft skills and/or technical skills)-->
                                    <!--        </li>-->
                                    <!--        <li>-->
                                    <!--            <i class='bx bx-check'></i>-->
                                    <!--            WPersonal qualities and attributes.-->
                                    <!--        </li>-->
                                    <!--        <li>-->
                                    <!--            <i class='bx bx-check'></i>-->
                                    <!--            Support software roll-outs to production.-->
                                    <!--        </li>-->
                                    <!--        <li>-->
                                    <!--            <i class='bx bx-check'></i>-->
                                    <!--            Guide and mentor junior engineers. Serve as team lead if appropriate.-->

                                    <!--        </li>-->
                                    <!--    </ul>-->
                                    <!--</div>-->

                                    <div class="details-text">
                                        <h3>Job Details</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td><span>Job Title: </span></td>
                                                            <td>{{$job->title}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Location: </span></td>
                                                            <td>{{$job->location}}</td>
                                                        </tr>
                                                        <!-- <tr> -->
                                                        <!--    <td><span>Job Type</span></td>-->
                                                        <!--    <td>Full Time</td>-->
                                                        <!-- </tr> -->
                                                        <!--<tr>-->
                                                        <!--    <td><span>Email</span></td>-->
                                                        <!--    <td><a href="mailto:hello@company.com">hello@company.com</a></td>-->
                                                        <!--</tr>-->
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="col-md-6">
                                                <table class="table">
                                                    <tbody>
                                                        <!--<tr>-->
                                                        <!--    <td><span>Experince</span></td>-->
                                                        <!--    <td>Any</td>-->
                                                        <!--</tr>-->
                                                        <tr>
                                                            <td><span>Job Category: </span></td>
                                                            <?php $cat=\App\Models\Category::find($job->cat_id); ?>
                                                            <td>{{$cat->category_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Job Cost: </span></td>
                                                            <td>{{$job->cost}}</td>
                                                        </tr>
                                                        <!--<tr>-->
                                                        <!--    <td><span>Website</span></td>-->
                                                        <!--    <td><a href="#">www.company.com</a></td>-->
                                                        <!--</tr>-->
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table">
                                                    <tbody>
                                                        <tr @if(empty($job->no_of_assignment)) style="display:none" @endif>
                                                            <td><span>Number Of Assignment: </span></td>
                                                            <td>{{$job->no_of_assignment}}</td>
                                                        </tr>
                                                        <tr @if(empty($job->no_of_emp)) style="display:none" @endif>
                                                            <td><span>Number Of Employee: </span></td>
                                                            <td>{{$job->no_of_emp}}</td>
                                                        </tr>
                                                        <tr @if(empty($job->job_duration)) style="display:none" @endif>
                                                            <td><span>Number of Hours: </span></td>
                                                            <td>{{$job->job_duration}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="theme-btn" @if(Auth::user()!=null && Auth::user()->role=='employer') style="display:none" @endif>
                                        <!--<a href="#" class="default-btn">-->
                                        <!--    Apply Now-->
                                        <!--</a>-->
                                        <?php $applied=\App\Models\Jobapply::where('job_id', $job->id)->count(); ?>
                                        @if(Auth::user()!=null && Auth::user()->role=='employee')
                                        @if($applied==0)
                                        @if(Auth::user()->kyc_status=='pending' || Auth::user()->kyc_status=='rejected')
                                        <script>alert("KYC is {{Auth::user()->kyc_status}}")</script>
                                        @else
                                        @if(Auth::user()->worker_type=='individual')
                                        @if($job->cat_id==Auth::user()->category_id)
                                        @if(Auth::user()->tmp_disabled==0)
                                        <a href="{{url('apply-job')}}/{{$job->id}}/{{Auth::id()}}" class="default-btn" style="float:left">
                                            Apply
                                        </a>
                                        @endif
                                        @else
                                        <script>alert('You are not allowed to apply!!')</script>
                                        @endif
                                        @elseif(Auth::user()->worker_type=='group')
                                        @if(Auth::user()->tmp_disabled==0)
                                        <a href="{{url('apply-job')}}/{{$job->id}}/{{Auth::id()}}" class="default-btn" style="float:left">
                                            Apply
                                        </a>
                                        @endif
                                        @endif
                                        @endif
                                        @else
                                        <span class="badge bg-warning">Applied</span>
                                        @endif
                                        @else
                                        <a href="{{url('user-login')}}" class="default-btn">
                                            Apply
                                        </a>
                                        @endif

                                        <div @if(Auth::user()==null) style="display:none" @endif>
                                            <a href="{{url('user-comment')}}/{{$job->id}}" class="btn btn-secondary btn-lg" style="float:left">
                                                Review
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--<div class="col-lg-4">-->
                    <!--    <div class="job-sidebar">-->
                    <!--        <h3>Posted By</h3>-->
                    <!--        <div class="posted-by">-->
                    <!--            <img src="assets/img/client-1.png" alt="client image">-->
                    <!--            <h4>John Doe</h4>-->
                    <!--            <span>CEO of Tourt Design LTD</span>-->
                    <!--        </div>-->
                    <!--    </div>-->

                    <!--    <div class="job-sidebar">-->
                    <!--        <h3>Location</h3>-->
                    <!--        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.27991517034!2d-74.25987556253516!3d40.697670063539654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1588772651198!5m2!1sen!2sbd" frameborder="0"></iframe>-->
                    <!--    </div>-->

                    <!--    <div class="job-sidebar">-->
                    <!--        <h3>Keywords</h3>-->
                    <!--        <ul>-->
                    <!--            <li>-->
                    <!--                <a href="#">Web Design</a>-->
                    <!--            </li>-->
                    <!--            <li>-->
                    <!--                <a href="#">Data Sceince</a>-->
                    <!--            </li>-->
                    <!--            <li>-->
                    <!--                <a href="#">SEO</a>-->
                    <!--            </li>-->
                    <!--            <li>-->
                    <!--                <a href="#">Content Writter</a>-->
                    <!--            </li>-->
                    <!--            <li>-->
                    <!--                <a href="#">Finance</a>-->
                    <!--            </li>-->
                    <!--            <li>-->
                    <!--                <a href="#">Business</a>-->
                    <!--            </li>-->
                    <!--            <li>-->
                    <!--                <a href="#">Education</a>-->
                    <!--            </li>-->
                    <!--            <li>-->
                    <!--                <a href="#">Graphics</a>-->
                    <!--            </li>-->
                    <!--            <li>-->
                    <!--                <a href="#">Video</a>-->
                    <!--            </li>-->
                    <!--        </ul>-->
                    <!--    </div>-->

                    <!--    <div class="job-sidebar social-share">-->
                    <!--        <h3>Share In</h3>-->
                    <!--        <ul>-->
                    <!--            <li>-->
                    <!--                <a href="#" target="_blank">-->
                    <!--                    <i class="bx bxl-facebook"></i>-->
                    <!--                </a>-->
                    <!--            </li>-->
                    <!--            <li>-->
                    <!--                <a href="#" target="_blank">-->
                    <!--                    <i class="bx bxl-twitter"></i>-->
                    <!--                </a>-->
                    <!--            </li>-->
                    <!--            <li>-->
                    <!--                <a href="#" target="_blank">-->
                    <!--                    <i class="bx bxl-pinterest"></i>-->
                    <!--                </a>-->
                    <!--            </li>-->
                    <!--            <li>-->
                    <!--                <a href="#" target="_blank">-->
                    <!--                    <i class="bx bxl-linkedin"></i>-->
                    <!--                </a>-->
                    <!--            </li>-->
                    <!--        </ul>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
        </section>
        <!-- Job Details Section End -->

        <!-- Job Section End -->   
        <!--<section class="job-style-two job-list-section pt-100 pb-70">-->
        <!--    <div class="container">-->
        <!--        <div class="section-title text-center">-->
        <!--            <h2>Jobs You May Be Interested In</h2>-->
        <!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida</p>-->
        <!--        </div>-->

        <!--        <div class="row">-->
        <!--            <div class="col-lg-12">-->
        <!--                <div class="job-card-two">-->
        <!--                    <div class="row align-items-center">-->
        <!--                        <div class="col-md-1">-->
        <!--                            <div class="company-logo">-->
        <!--                                <a href="job-details.html">-->
        <!--                                    <img src="assets/img/company-logo/1.png" alt="logo">-->
        <!--                                </a>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                        <div class="col-md-8">-->
        <!--                            <div class="job-info">-->
        <!--                                <h3>-->
        <!--                                    <a href="#">Web Designer, Graphic Designer, UI/UX Designer </a>-->
        <!--                                </h3>-->
        <!--                                <ul>                                          -->
        <!--                                    <li>-->
        <!--                                        <i class='bx bx-briefcase' ></i>-->
        <!--                                        Graphics Designer-->
        <!--                                    </li>-->
        <!--                                    <li>-->
        <!--                                        <i class='bx bx-briefcase' ></i>-->
        <!--                                        $35000-$38000-->
        <!--                                    </li>-->
        <!--                                    <li>-->
        <!--                                        <i class='bx bx-location-plus'></i>-->
        <!--                                        Wellesley Rd, London-->
        <!--                                    </li>-->
        <!--                                    <li>-->
        <!--                                        <i class='bx bx-stopwatch' ></i>-->
        <!--                                        9 days ago-->
        <!--                                    </li>-->
        <!--                                </ul>-->

        <!--                                <span>Full Time</span>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                        <div class="col-md-3">-->
        <!--                            <div class="theme-btn text-end">-->
        <!--                                <a href="#" class="default-btn">-->
        <!--                                    Browse Job-->
        <!--                                </a>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->

        <!--            <div class="col-lg-12">-->
        <!--                <div class="job-card-two">-->
        <!--                    <div class="row align-items-center">-->
        <!--                        <div class="col-md-1">-->
        <!--                            <div class="company-logo">-->
        <!--                                <a href="job-details.html">-->
        <!--                                    <img src="assets/img/company-logo/2.png" alt="logo">-->
        <!--                                </a>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                        <div class="col-md-8">-->
        <!--                            <div class="job-info">-->
        <!--                                <h3>-->
        <!--                                    <a href="#">Website Developer & Software Developer</a>-->
        <!--                                </h3>-->
        <!--                                <ul>                                          -->
        <!--                                    <li>-->
        <!--                                        <i class='bx bx-briefcase' ></i>-->
        <!--                                        Web Developer-->
        <!--                                    </li>-->
        <!--                                    <li>-->
        <!--                                        <i class='bx bx-briefcase' ></i>-->
        <!--                                        $3000-$8000-->
        <!--                                    </li>-->
        <!--                                    <li>-->
        <!--                                        <i class='bx bx-location-plus'></i>-->
        <!--                                        Garden Road, UK-->
        <!--                                    </li>-->
        <!--                                    <li>-->
        <!--                                        <i class='bx bx-stopwatch' ></i>-->
        <!--                                        5 days ago-->
        <!--                                    </li>-->
        <!--                                </ul>-->

        <!--                                <span>Full Time</span>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                        <div class="col-md-3">-->
        <!--                            <div class="theme-btn text-end">-->
        <!--                                <a href="#" class="default-btn">-->
        <!--                                    Browse Job-->
        <!--                                </a>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->

        <!--            <div class="col-lg-12">-->
        <!--                <div class="job-card-two">-->
        <!--                    <div class="row align-items-center">-->
        <!--                        <div class="col-md-1">-->
        <!--                            <div class="company-logo">-->
        <!--                                <a href="job-details.html">-->
        <!--                                    <img src="assets/img/company-logo/3.png" alt="logo">-->
        <!--                                </a>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                        <div class="col-md-8">-->
        <!--                            <div class="job-info">-->
        <!--                                <h3>-->
        <!--                                    <a href="#">Application Developer & Web Designer</a>-->
        <!--                                </h3>-->
        <!--                                <ul>                                          -->
        <!--                                    <li>-->
        <!--                                        <i class='bx bx-briefcase'></i>-->
        <!--                                        App Developer-->
        <!--                                    </li>-->
        <!--                                    <li>-->
        <!--                                        <i class='bx bx-briefcase'></i>-->
        <!--                                        $3000-$4000-->
        <!--                                    </li>-->
        <!--                                    <li>-->
        <!--                                        <i class='bx bx-location-plus'></i>-->
        <!--                                        State City, USA-->
        <!--                                    </li>-->
        <!--                                    <li>-->
        <!--                                        <i class='bx bx-stopwatch' ></i>-->
        <!--                                        8 days ago-->
        <!--                                    </li>-->
        <!--                                </ul>-->

        <!--                                <span>Part-Time</span>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                        <div class="col-md-3">-->
        <!--                            <div class="theme-btn text-end">-->
        <!--                                <a href="#" class="default-btn">-->
        <!--                                    Browse Job-->
        <!--                                </a>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->

        <!--            <div class="col-lg-12">-->
        <!--                <div class="job-card-two">-->
        <!--                    <div class="row align-items-center">-->
        <!--                        <div class="col-md-1">-->
        <!--                            <div class="company-logo">-->
        <!--                                <a href="job-details.html">-->
        <!--                                    <img src="assets/img/company-logo/4.png" alt="logo">-->
        <!--                                </a>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                        <div class="col-md-8">-->
        <!--                            <div class="job-info">-->
        <!--                                <h3>-->
        <!--                                    <a href="#">Frontend & Backend Developer</a>-->
        <!--                                </h3>-->
        <!--                                <ul>                                          -->
        <!--                                    <li>-->
        <!--                                        <i class='bx bx-briefcase' ></i>-->
        <!--                                        Web Developer-->
        <!--                                    </li>-->
        <!--                                    <li>-->
        <!--                                        <i class='bx bx-briefcase' ></i>-->
        <!--                                        $5000-$8000-->
        <!--                                    </li>-->
        <!--                                    <li>-->
        <!--                                        <i class='bx bx-location-plus'></i>-->
        <!--                                        Drive Post NY 676-->
        <!--                                    </li>-->
        <!--                                    <li>-->
        <!--                                        <i class='bx bx-stopwatch' ></i>-->
        <!--                                        1 days ago-->
        <!--                                    </li>-->
        <!--                                </ul>-->

        <!--                                <span>Full Time</span>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                        <div class="col-md-3">-->
        <!--                            <div class="theme-btn text-end">-->
        <!--                                <a href="#" class="default-btn">-->
        <!--                                    Browse Job-->
        <!--                                </a>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->

        <!--            <div class="col-lg-12">-->
        <!--                <div class="job-card-two">-->
        <!--                    <div class="row align-items-center">-->
        <!--                        <div class="col-md-1">-->
        <!--                            <div class="company-logo">-->
        <!--                                <a href="job-details.html">-->
        <!--                                    <img src="assets/img/company-logo/5.png" alt="logo">-->
        <!--                                </a>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                        <div class="col-md-8">-->
        <!--                            <div class="job-info">-->
        <!--                                <h3>-->
        <!--                                    <a href="#">IT Department & Manager</a>-->
        <!--                                </h3>-->
        <!--                                <ul>                                          -->
        <!--                                    <li>-->
        <!--                                        <i class='bx bx-briefcase' ></i>-->
        <!--                                        Manager-->
        <!--                                    </li>-->
        <!--                                    <li>-->
        <!--                                        <i class='bx bx-briefcase' ></i>-->
        <!--                                        $35000-$38000-->
        <!--                                    </li>-->
        <!--                                    <li>-->
        <!--                                        <i class='bx bx-location-plus'></i>-->
        <!--                                        Wellesley Rd, London-->
        <!--                                    </li>-->
        <!--                                    <li>-->
        <!--                                        <i class='bx bx-stopwatch' ></i>-->
        <!--                                        7 days ago-->
        <!--                                    </li>-->
        <!--                                </ul>-->

        <!--                                <span>Full Time</span>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                        <div class="col-md-3">-->
        <!--                            <div class="theme-btn text-end">-->
        <!--                                <a href="#" class="default-btn">-->
        <!--                                    Browse Job-->
        <!--                                </a>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->

        <!--        <nav aria-label="Page navigation example">-->
        <!--            <ul class="pagination justify-content-center">-->
        <!--                <li class="page-item disabled">-->
        <!--                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">-->
        <!--                        <i class='bx bx-chevrons-left bx-fade-left'></i>-->
        <!--                    </a>-->
        <!--                </li>-->
        <!--                <li class="page-item"><a class="page-link" href="#">1</a></li>-->
        <!--                <li class="page-item"><a class="page-link active" href="#">2</a></li>-->
        <!--                <li class="page-item"><a class="page-link" href="#">3</a></li>-->
        <!--                <li class="page-item">-->
        <!--                    <a class="page-link" href="#">-->
        <!--                        <i class='bx bx-chevrons-right bx-fade-right'></i>-->
        <!--                    </a>-->
        <!--                </li>-->
        <!--            </ul>-->
        <!--        </nav>-->
        <!--    </div>-->
        <!--</section>-->

@stop