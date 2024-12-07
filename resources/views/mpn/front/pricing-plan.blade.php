@extends('mpn.front.layout')

@section('add-metatags')
        <title>Pricing Plan | Manpower Nation</title>
        <meta name="description" content="Check out our affordable pricing plans for our reliable and efficient manpower supply services in Kolkata. Contact us to discuss your requirements." />
@stop

@section('content')

    <!-- Page Title Start -->
    <section class="page-title title-bg10">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Pricing Plan for Manpower Nation</h2>
                <ul>
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li>Pricing Plan</li>
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

    <section class="gdgdggd">
        <div class="container pt-4 pb-4">
            <h1>Service Chart And Prices</h1>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Jobs</th>
                            <th>Convenient Charge 83% Off</th>
                            <th>Charges Till </th>
                            <!--<th>Charges After 4th Hour</th>-->
                            <th>Waiting Time At End 30mins Free</th>
                            <th>Amount Payble</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td>Lifting/Shifting</td>
                            <td>Rs.300 - Rs.250 = Rs.50</td>
                            <td>Rs.300</td>
                            <!--<td>Rs.250</td>-->
                            <td>Rs.200</td>
                            <td>Rs.350 Per Hour</td>
                        </tr>
                        <tr>
                            <td>Cleaning</td>
                            <td>Rs.300 - Rs.250 = Rs.50</td>
                            <td>Rs.300</td>
                            <!--<td>Rs.250</td>-->
                            <td>Rs.200</td>
                            <td>Rs.350 Per Hour</td>
                        </tr>
                        <tr>
                            <td>Cooking <br> 1hr 30mins First Hour Only</td>
                            <td>Rs.300 - Rs.250 = Rs.50</td>
                            <td>Rs.250</td>
                            <!--<td>Rs.200</td>-->
                            <td>Rs.200</td>
                            <td>Rs.300 Per Hour</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Jobs</th>
                            <th>Convenient Charge 83% Off</th>
                            <th>Normal</th>
                            <th>Heavy Duty</th>
                            <th>Waiting Time At End 30mins Free</th>
                            <th>Amount Payble Normal</th>
                            <th>Amount Payble Heavy Duty</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td>Electricity</td>
                            <td>Rs.300 - Rs.250 = Rs.50</td>
                            <td>Rs.150</td>
                            <td>Rs.600</td>
                            <td>Rs.200</td> 
                            <td>Rs.200 Per Assignment</td>
                            <td>Rs.650 Per Assignment</td>
                        </tr>
                        <tr>
                            <td>Plumbing</td>
                            <td>Rs.300 - Rs.250 = Rs.50</td>
                            <td>Rs.150</td>
                            <td>Rs.500</td>
                            <td>Rs.200</td>
                            <td>Rs.200 Per Assignmentd</td>
                            <td>Rs.550 Per Assignment</td>
                        </tr>
                        <tr>
                            <td>Painting</td>
                            <td>Rs.300 - Rs.250 = Rs.50</td>
                            <td>Rs.700</td>
                            <td>Rs.1400</td>
                            <td>Rs.200</td>
                            <td>Rs.750 Per Room 10x12</td>
                            <td>Rs.1450 Per Room 15x15</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>


@stop

@section('add-scripts')

<script>
    $(window).on("load resize ", function() {
        var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
        $('.tbl-header').css({'padding-right':scrollWidth});
    }).resize();
</script>
@stop
