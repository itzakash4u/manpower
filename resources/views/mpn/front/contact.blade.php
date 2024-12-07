@extends('mpn.front.layout')

@section('add-metatags')
        <title>Contact Manpower Nation | Trusted Manpower Supply Company in Kolkata</title>
        <meta name="description" content="Contact Manpower Nation for reliable and affordable labour supply agency solutions in Kolkata. Contact us today to discuss your requirements." />
@stop

@section('content')


        <!-- Page Title Start -->
        <section class="page-title title-bg23">
            <div class="d-table">
                <div class="d-table-cell">
                    <h2>Contact Us</h2>
                    <ul>
                        <li>
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li>Contact Us</li>
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

        <!-- Contact Section Start -->
        <div class="contact-card-section ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="contact-card">
                                    <i class='bx bx-phone-call'></i>
                                    <ul>
                                        <li>
                                            <a href="tel:+917003710086">
                                                +91 70037 10086
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
        
                            <div class="col-md-4 col-sm-6">
                                <div class="contact-card">
                                    <i class='bx bx-mail-send' ></i>
                                    <ul>
                                        <li>
                                            <a href="mailto:customersupport@manpowernation.com">
                                                customersupport@ manpowernation.com
                                            </a>
                                        </li>
                                        <!--<li>-->
                                        <!--    <a href="mailto:hello@jovie.com">-->
                                        <!--        hello@jovie.com-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                    </ul>
                                </div>
                            </div>
        
                            <div class="col-md-4 col-sm-6 offset-sm-3 offset-md-0">
                                <div class="contact-card">
                                    <i class='bx bx-location-plus' ></i>
                                    <ul>
                                        <li>
                                            New Budge Budge Trunk Road, Jagtala (West) Kol- 700141
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Section End -->

        <!-- Contact Form Start -->
        <section class="contact-form-section pb-100">
            <div class="container">
                @if(Session::has('success')) <div class="alert alert-success">{{Session::get('success')}}</div> @endif
                <div class="contact-area">
                    <h3>How Can We Help You</h3>
                    <!-- <form id="contactForm" method="post" action="{{url('send-email')}}"> -->
                    <form id="" method="post" action="{{url('send-email')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Your Name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Your Email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" name="number" id="number" class="form-control" required data-error="Please enter your number" placeholder="Phone Number">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="subject" id="subject" class="form-control" required data-error="Please enter your subject" placeholder="Your Subject">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control message-field" id="message" cols="30" rows="7" required data-error="Please type your message" placeholder="Write Message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        
                            <div class="col-lg-12 col-md-12 text-center">
                                <button type="submit" class="default-btn contact-btn">
                                    Send Message
                                </button>
                                <div id="msgSubmit" class="h3 alert-text text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Contact Form End -->
@stop