@extends('mpn.front.layout')

@section('content')


<!----------------------------------------main section------------------------------------------->

<section class="page-title title-bg13">
      <div class="d-table">
          <div class="d-table-cell">
              <h2 class="text-center">My Account</h2>
              <ul>
                  <li>
                      <a href="{{url('/')}}">Home</a>
                  </li>
                  <li>My Account</li>
              </ul>
          </div>
      </div>
      <div class="lines">
          <div class="line"></div>
          <div class="line"></div>
          <div class="line"></div>
      </div>
  </section>
  <section class="user-dashboard">
    <div class="p-3" style="background: #212121;">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-8 text-start text-white">
            <h2 class="p-0 m-0"><!--Bijoy Sakhoar-->{{$user->name}}</h2>
          </div>
          <!-- <div class="col-4 text-end"><a href="#" class="text-white">Logout</a></div> -->
        </div>
      </div>
    </div>
    <?php
    $apply=\App\Models\Jobapply::where('employee_id', $user->id)->count();
    $apply_data=\App\Models\Jobapply::where('employee_id', $user->id)->get();
    $earn_today=\App\Models\Jobapply::where('employee_id', $user->id)->whereDate('updated_at', date('Y-m-d'))->get();

    $completed=0;
    foreach($apply_data as $ap) {
      if($ap->completed==1) {
        $completed++;
      }
    }

    $today=0;
    foreach($earn_today as $et) {
      if($et->completed==1) {
        $job1=\App\Models\Job::find($et->job_id);
        $today+=$et->cost;
      }
    }

    $tot_earn=0;
    foreach($apply_data as $d) {
      if($d->completed==1) {
        $job2=\App\Models\Job::find($d->job_id);
        $tot_earn+=$d->cost;
      }
    }
    ?>
    <div class="dashboard-section">
      <div class="container">
        <h3 class="mb-4" style="color: #666666;">Dashboard</h3>
        <div class="row">
          <div class="col-lg-3 col-md-4 col-6">
            <div class="box-content box-green">
                <div class="text-center">
                  <div class="box-number">{{$apply}}</div>
                  <div class="box-text">Total Jobs</div>
                </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <div class="box-content box-orange">
                <div class="text-center">
                  <div class="box-number">{{$completed}}</div>
                  <div class="box-text">Number of Job Today</div>
                </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <div class="box-content box-pink">
                <div class="text-center">
                  <div class="box-number">&#8377; {{ $today }}</div>
                  <div class="box-text">Earniing Today</div>
                </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <div class="box-content box-blue">
                <div class="text-center">
                  <div class="box-number">&#8377; {{$tot_earn}}</div>
                  <div class="box-text">Total Revenue</div>
                </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-4 col-6">
            <div class="box-content box-gray">
                <div class="text-center">
                  <div class="box-number">&#8377; <!--150.00-->{{$to_comp}}</div>
                  <div class="box-text">COMPANY COMMISSION PAYABLE</div>
                </div>
            </div>
          </div>
           <div class="col-lg-6 col-md-4 col-6">
            <div class="box-content" style="background-color:#7a4484;">
                <div class="text-center">
                  <div class="box-number">Basic</div>
                  <div class="box-text">Current Tire</div>
                </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-4 col-6">
            <div class="box-content" style="background-color:#3fb2c8;">
                <!-- <div class="text-center">
                  <div class="box-number"></div>
                  <div class="box-text"></div>
                </div> -->
                <div class="text-center w-100">

<h2 class="text-light">APPLIED JOB SUMMERY</h2>
<!-- <div class="box-text">Total Cost</div> -->
<div class="box-text">
  <table border="0" class="w-100">
    <tr>
      <form method="post" action="{{ url('search-summery') }}">
      <td colspan="2"><a href="{{url('applied-job-summery')}}" class="btn btn-primary">FIND</a></td>
    </tr>
    
  </table>
  <!-- <div class="pe-3 ps-3 pt-3"><a href="#" class="btn btn-danger btn-lg d-block">Pay Now</a></div> -->
</div>

</div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-12">
            <div class="box-content box-dark summery-box">
                <div class="text-center w-100">

                  <h2 class="text-light">SUMMERY</h2>
                  <!-- <div class="box-text">Total Cost</div> -->
                  
                  <div class="box-text">
                    <table border="0" class="w-100">
                      <!-- <tr>
                        <td align="left">SALARY:</td>
                        <td align="right">1000.00</td>
                      </tr> -->
                      <tr>
                        <td align="left">TOTAL EARNING</td>
                        <td align="right">@if(isset($tot_emp_pay)) {{ $tot_emp_pay }} @else 0.0 @endif<!--900.00 3 HOURS--></td>
                      </tr>
                      <tr>
                        <td align="left">COMMISSION FOR COMPANY</td>
                        <td align="right"><!--150.00-->@if(isset($to_comp)) {{ $to_comp }} @else 0.0 @endif</td>
                      </tr>
                      <tr><td></td><td></td></tr>
                      <tr>
                        <td align="left">PAY TODAY COMMISSION</td>
                      </tr>
                      
                    </table>
                    <div class="pe-3 ps-3 pt-3"><a href="{{url('phonepe')}}/{{$user->id}}/{{ substr($to_comp, 0, strlen($to_comp) - 3) }}" class="btn btn-danger btn-lg d-block">Pay Now</a></div>
                </div>

            </div>
          </div>
        </div>
          <div class="col-lg-12 mt-5">
                <a href="{{url('/')}}" type="button" class="btn btn-info d-block text-white p-3 fw-bold fs-5">Search A JOB</a>
          </div>
        </div>
      </div>
    </div>
  </section>

@stop

@section('add-scripts')
<script>
    function Pay(id,amt) {
        if(confirm("Are you sure?")) {
            window.location="phonepe/"+id+amt;
        }
    }
</script>
@stop