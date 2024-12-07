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
    $jobpost=\App\Models\Job::where('user_id', $user->id)->count();
    $tot_cost=\App\Models\Job::where('user_id', $user->id)->sum('cost');
    $tot_pay=\App\Models\Job::where('user_id', $user->id)->sum('pay');
    $tot_rev=\App\Models\Review::where('client_id', $user->id)->count();

    $ongoing=0;
    $cust_jobs=\App\Models\Job::where('user_id', $user->id)->get();
    foreach($cust_jobs as $cj) {
      $apply=\App\Models\Jobapply::where('job_id', $cj->id)->first();
      if($apply!=null) {
      if($apply->ongoing=='started') {
        $ongoing++;
      }
    }
    }
    $online=\App\Models\Job::where('user_id', $user->id)->where('applied', 0)->count();
    ?>
    <div class="dashboard-section">
      <div class="container">
        <h3 class="mb-4" style="color: #666666;">Dashboard</h3>
        <div class="row">
          <div class="col-lg-3 col-md-4 col-6">
            <div class="box-content box-green">
                <div class="text-center">
                  <div class="box-number">{{$jobpost}}</div>
                  <div class="box-text">Total Jobs</div>
                </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <div class="box-content box-orange">
                <div class="text-center">
                  <div class="box-number">&#8377; {{$tot_cost}}</div>
                  <div class="box-text">Total Revenue</div>
                </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <div class="box-content box-pink">
                <div class="text-center">
                  <div class="box-number">{{$ongoing}}</div>
                  <div class="box-text">Ongoing Jobs</div>
                </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <div class="box-content box-blue">
                <div class="text-center">
                  <div class="box-number">{{$online}}</div>
                  <div class="box-text">Number Of Jobs Online</div>
                </div>
            </div>
          </div>
          <div class="col-lg-7 col-md-6 col-12">
            <div class="box-content box-gray">
                <div class="row w-100 align-items-center">
                    <div class="col-lg-8 col-md-6 col-6">
                        <!-- <p class="text-light">Part charges  Rs.50 + <br> 150 of 3hrs.</p> -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <!-- <div class="box-number">SUMMERY</div> -->
                        <div class="box-text mb-3">
                            <a href="#" type="button" class="btn btn-success">PAY HERE</a>
                        </div>
                        <div class="box-text mb-3">
                            <a href="#" type="button" class="btn btn-warning">PAY PART CHARGES</a>
                        </div>
                        <!-- <div class="box-text">Total Cost</div> -->
                        <div class="box-text ">
                            <a href="{{url('customer-pay')}}" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">PAY AFTER WORK</a>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ url('submit-customer-pay') }}">
                                          @csrf
                                          <div class="form-group">
                                            <label>Job</label>
                                            <select class="form-control" name="job">
                                              <option value="">---SELECT---</option>
                                              @if($jobs)
                                              @foreach($jobs as $job)
                                              <option value="{{$job->id}}">{{$job->title}}</option>
                                              @endforeach
                                              @endif
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Proceed to Pay">
                                          </div>
                                        </form>
                                    </div>
                                    <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Proceed to Pay</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
          </div>
          <div class="col-lg-5 col-md-6 col-12">
            <div class="box-content box-dark summery-box">
                <div class="text-center w-100">
                  <!-- <div class="box-number">&#8377; {{$tot_pay}}</div>
                  <div class="box-text">Total Payed</div> -->
                  <?php $job=\App\Models\Job::find($txn->job_id);
                  $pay=\App\Models\Payment::where('category_id', $job->cat_id)->first(); ?>
                  <h2 class="text-light">SUMMERY</h2>
                  <!-- <div class="box-text">Total Cost</div> -->
                  @if($txn->discard==0)
                  <div class="box-text">
                    <table border="0" class="w-100">
                      <tr>
                        <td align="left">JOB COSTING:</td>
                        <td align="right">
                          @if($pay->category_id<4)
                          @if($job->job_type=='normal')
                          {{$pay->lv1_customer_pay}}
                          @elseif($job->job_type=='heavy')
                          {{$pay->lv2_customer_pay}}
                          @endif
                          @elseif($pay->category_id>=4)
                          {{$pay->lv1_customer_pay}}
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td align="left">NET COSTING</td>
                        <td align="right">@if(isset($txn)) {{ $txn->cust_pay }} @endif<!--900.00 3 HOURS--></td>
                      </tr>
                      <tr>
                        <td align="left">COMMISSION CHARGES</td>
                        <td align="right">50.00</td>
                      </tr>
                      <tr>
                        <td align="left">TOTAL PAYMENT</td>
                        <td align="right">@if(isset($txn)) {{ $txn->cust_total_pay }} @endif<!--950.00--></td>
                      </tr>
                    </table>
                </div>
                @else
                <span style="color:red">Nil</span>
                @endif
            </div>
          </div>
        </div>
        <div class="col-lg-12 mt-5">
            <a href="{{url('add-job')}}" type="button" class="btn btn-danger d-block p-3 fw-bold fs-5">Post A JOB</a>
        </div>
      </div>
    </div>
  </section>

@stop