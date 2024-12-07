<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="text-center">
                <img src="@if(!empty(Auth::user()->profile_image)) {{ asset('media/profile/'.Auth::user()->profile_image) }} @else {{ asset('media/admin.png') }} @endif" alt="" class="img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu">
                        <!-- <li><a href="javascript:void(0)"> Profile</a></li>
                        <li><a href="javascript:void(0)"> Settings</a></li>
                        <li><a href="javascript:void(0)"> Lock screen</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:void(0)"> Logout</a></li> -->
                    </ul>
                </div>

                <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Online</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect"><i class="ti-home"></i><span> Dashboard </span></a>
                </li>
                <!-- ADMIN -->
                <li class="" @if(Auth::user()->role!='admin') style="display:none" @endif >
                    <a href="{{route('category')}}" class="waves-effect"><i class="ti-agenda"></i> <span> Category </span></a>
                </li>
                <li @if(Auth::user()->role!='admin') style="display:none" @endif>
                    <a href="{{route('employer')}}" class="waves-effect"><i class="ti-home"></i><span> Customer </span></a>
                </li>
                <li class="" @if(Auth::user()->role!='admin') style="display:none" @endif >
                    <a href="{{route('employee')}}" class="waves-effect"><i class="ti-agenda"></i> <span> Employee </span></a>
                </li>
                <li class="" @if(Auth::user()->role!='admin') style="display:none" @endif >
                    <a href="{{route('all-jobs')}}" class="waves-effect"><i class="ti-agenda"></i> <span> All Jobs </span></a>
                </li>
                <li class="" @if(Auth::user()->role!='admin') style="display:none" @endif >
                    <a href="{{route('all-job-apply')}}" class="waves-effect"><i class="ti-agenda"></i> <span> Job Apply </span></a>
                </li>
                <li class="" @if(Auth::user()->role!='admin') style="display:none" @endif >
                    <a href="{{route('customer-care')}}" class="waves-effect"><i class="ti-agenda"></i> <span> Customer Care </span></a>
                </li>
                <!-- <li class="" @if(Auth::user()->role!='admin') style="display:none" @endif >
                    <a href="{{route('charges')}}" class="waves-effect"><i class="ti-agenda"></i> <span> Charges </span></a>
                </li> -->
                <li class="" @if(Auth::user()->role!='admin') style="display:none" @endif >
                    <a href="{{route('payments')}}" class="waves-effect"><i class="ti-agenda"></i> <span> Payments </span></a>
                </li>
                <li class="" @if(Auth::user()->role!='admin') style="display:none" @endif >
                    <a href="{{route('phonepe-trans')}}" class="waves-effect"><i class="ti-agenda"></i> <span> Transactions </span></a>
                </li>
                <li class="" @if(Auth::user()->role!='care') style="display:none" @endif >
                    <a href="{{route('verify-kyc')}}" class="waves-effect"><i class="ti-agenda"></i> <span> Verify KYC </span></a>
                </li>

                <!-- END ADMIN -->
<!-- o -->
                <li class="" @if(Auth::user()->role!='employer') style="display:none" @endif >
                    <a href="{{route('jobs')}}" class="waves-effect"><i class="ti-agenda"></i> <span> Jobs </span></a>
                </li>

                <li class="" @if(Auth::user()->role!='employer') style="display:none" @endif >
                    <a href="{{route('job-apply')}}" class="waves-effect"><i class="ti-agenda"></i> <span> Job Apply </span></a>
                </li>

                <li class="" @if(Auth::user()->role!='employer') style="display:none" @endif >
                    <a href="{{route('job-review')}}" class="waves-effect"><i class="ti-agenda"></i> <span> Reviews </span></a>
                </li>
                
                <li class="" @if(Auth::user()->role=='admin' || Auth::user()->role=='care') style="display:none" @endif >
                    <a href="{{route('kyc')}}" class="waves-effect"><i class="ti-agenda"></i> <span> KYC </span></a>
                </li>

                <!-- care -->
                <li class="" @if(Auth::user()->role!='care') style="display:none" @endif >
                    <a href="{{route('care-job-apply')}}" class="waves-effect"><i class="ti-agenda"></i> <span> All Job Post </span></a>
                </li>
                <!-- <li class="" @if(Auth::user()->role!='care') style="display:none" @endif >
                    <a href="{{route('care-manual-employee')}}" class="waves-effect"><i class="ti-agenda"></i> <span> Employees </span></a>
                </li> -->


                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-write"></i> <span> Blog </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('blogs')}}">All Blogs</a></li>
                        <!-- <li><a href="icons-ion.html">Add Blog</a></li> -->
                        <li><a href="{{url('comments')}}">All Comments</a></li>
                        <!-- <li><a href="icons-themify.html">Themify Icons</a></li> -->
                    </ul>
                </li>

<!--                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-write"></i><span> Forms </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="form-elements.html">General Elements</a></li>
                        <li><a href="form-validation.html">Form Validation</a></li>
                        <li><a href="form-advanced.html">Advanced Form</a></li>
                        <li><a href="form-wysiwyg.html">WYSIWYG Editor</a></li>
                        <li><a href="form-uploads.html">Multiple File Upload</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span> Tables </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="tables-basic.html">Basic Tables</a></li>
                        <li><a href="tables-datatable.html">Data Table</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-pie-chart"></i><span> Charts </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="charts-morris.html">Morris Chart</a></li>
                        <li><a href="charts-chartjs.html">Chartjs</a></li>
                        <li><a href="charts-flot.html">Flot Chart</a></li>
                        <li><a href="charts-other.html">Other Chart</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-map-alt"></i><span> Maps </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="maps-google.html"> Google Map</a></li>
                        <li><a href="maps-vector.html"> Vector Map</a></li>
                    </ul>
                </li>

                <li>
                    <a href="calendar.html" class="waves-effect"><i class="ti-calendar"></i><span> Calendar <span class="badge badge-primary pull-right">NEW</span></span></a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-files"></i><span> Pages </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="pages-timeline.html">Timeline</a></li>
                        <li><a href="pages-invoice.html">Invoice</a></li>
                        <li><a href="pages-directory.html">Directory</a></li>
                        <li><a href="pages-login.html">Login</a></li>
                        <li><a href="pages-register.html">Register</a></li>
                        <li><a href="pages-recoverpw.html">Recover Password</a></li>
                        <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                        <li><a href="pages-blank.html">Blank Page</a></li>
                        <li><a href="pages-404.html">Error 404</a></li>
                        <li><a href="pages-500.html">Error 500</a></li>
                    </ul>
                </li> -->

                <!--<li class="has_sub">-->
                    <!--<a href="javascript:void(0);" class="waves-effect"><i class="ti-share"></i><span>Multi Menu </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>-->
                    <!--<ul>-->
                        <!--<li class="has_sub">-->
                            <!--<a href="javascript:void(0);" class="waves-effect"><span>Menu Item 1.1</span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>-->
                            <!--<ul style="">-->
                                <!--<li><a href="javascript:void(0);"><span>Menu Item 2.1</span></a></li>-->
                                <!--<li><a href="javascript:void(0);"><span>Menu Item 2.2</span></a></li>-->
                            <!--</ul>-->
                        <!--</li>-->
                        <!--<li>-->
                            <!--<a href="javascript:void(0);"><span>Menu Item 1.2</span></a>-->
                        <!--</li>-->
                    <!--</ul>-->
                <!--</li>-->
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->