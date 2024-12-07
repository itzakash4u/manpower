<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use App\Models\Jobapply;
use App\Models\Review;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\Blog;
use App\Models\Comment;

use App\Mail\SendContact;
use Illuminate\Support\Facades\Mail;




class HomeController extends Controller
{
    //
    function index() {
        $jobss=Job::where('closed', 0)->paginate(5);
        $cats=Category::all();
        return view('mpn.front.home-main', compact('jobss', 'cats'));
    }

    function dashboard() {
        $user=Auth::user();
        $jobs=Job::where('user_id', Auth::id())->where('applied', 1)->where('cust_paid', 0)->get();
        if($user->role=='employee') {
            // $txn=Transaction::where('emp_id', Auth::id())->orderBy('id', 'desc')->offset(0)->limit(1)->first();
            $tot_emp_pay=Transaction::where('emp_id', Auth::id())->where('discard', 0)->sum('emp_pay');
            $to_comp=Transaction::where('emp_id', Auth::id())->where('discard', 0)->sum('company_commission');
            return view('mpn.front.dashboard', compact('user', 'tot_emp_pay', 'to_comp'));
            // return $tot_emp_pay;
        }else {
            $txn=Transaction::where('cust_id', Auth::id())->orderBy('id', 'desc')->offset(0)->limit(1)->first();
            return view('mpn.front.dashboard-client', compact('user', 'jobs', 'txn'));
        }
    }
    
    function job_search_result(Request $req) {
        if(!empty($req->title)) {
            // $jobs=Job::where('title', 'LIKE', '%'.$req->title.'%')->get();
            $jobs=Job::where('job_id', $req->title)->where('closed', 0)->get();
        }
        else if(!empty($req->location)) {
            $jobs=Job::where('location', 'LIKE', '%'.$req->location.'%')->where('closed', 0)->get();
        }
        else if(!empty($req->category)) {
            $jobs=Job::where('cat_id', $req->category)->where('closed', 0)->get();
        }
        return view('mpn.front.job-search-list', compact('jobs'));
    }

    function catwise_job($id) {
        $jobs=Job::where('cat_id', $id)->paginate(1);
        return view('mpn.front.catwise-jobs', compact('jobs'));
    }
    
    function apply_job($jid, $uid) {
        $apply=new Jobapply;
        $apply->job_id=$jid;
        $apply->employee_id=$uid;
        $apply->cc_approved=1;
        $apply->save();

        $job=Job::find($jid);
        $job->applied=1;
        $job->save();

        $url='http://bhashsms.com/api/sendmsg.php';
        $vars=array('user'=>'ManpowerNation', 'pass'=>'123456', 'sender'=>'MPNJOB', 'phone'=>'9874889480', 'text'=>'Dear%20MPN%20Employee,%20New%20Job%20Posted%20at%20Manpower%20Nation%2012%20at%2034,%20To%20accept%20reply%20via%20SMS%20or%20WhatsApp%20contact%20no-%207003710086.%20Manpower%20Nation%20MPNJOB', 'priority'=>'ndnd', 'stype'=>'normal');
        $ch=curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL=>$url,
            CURLOPT_RETURNTRANSFER=>true,
            CURLOPT_FOLLOWLOCATION=>true,
            CURLOPT_POST=>true,
            CURLOPT_POSTFIELDS=>$vars,
        ));
       $res=curl_exec($ch);
       curl_close($ch);

        Session::flash('success', 'Succesfully applied for job');
        return redirect('/');
    }

    function cust_pay() {
        $jobs=Job::where('user_id', Auth::id())->where('applied', 1)->get();
        return view('mpn.client.customer-pay', compact('jobs'));
    }

    function submit_customer_pay(Request $req) {
        $job=Job::find($req->job);
        $cat=Category::find($job->cat_id);
        $apply=Jobapply::where('job_id', $job->id)->first();
        $emp=User::find($apply->employee_id);
        $pay=Payment::where('category_id', $cat->id)->first();

        $empay=0;
        $emp_sal=0;
        $comp=0;

        if($pay!=null) {
            if($cat->id==1 || $cat->id==2 || $cat->id==3) {
                if($job->job_type=='normal') {
                    $empay=($pay->lv1_customer_pay-$pay->lv1_employee_pay)*$job->no_of_assignment;
                    $emp_sal=1000;
                    $comp=$pay->lv1_employee_pay*$job->no_of_assignment;//150*$job->no_of_assignment;
                }else if($job->job_type=='heavy') {
                    $empay=($pay->lv2_customer_pay-$pay->lv2_employee_pay)*$job->no_of_assignment;
                    $emp_sal=1000;
                    $comp=$pay->lv2_employee_pay*$job->no_of_assignment;//150*$job->no_of_assignment;
                }
            }else if($cat->id==4 || $cat->id==5 || $cat->id==6) {
                if($job->job_duration<=$pay->lv1_duration) {
                    $empay=($pay->lv1_customer_pay-$pay->lv1_employee_pay)*$job->no_of_emp*$job->job_duration;
                    $emp_sal=1000;
                    $comp=$pay->lv1_employee_pay*$job->job_duration*$job->no_of_emp;
                }else if($job->job_duration>=$pay->lv2_duration) {
                    $empay=($pay->lv2_customer_pay-$pay->lv2_employee_pay)*$job->no_of_emp*$job->job_duration;
                    $emp_sal=1000;
                    $comp=$pay->lv2_employee_pay*$job->job_duration*$job->no_of_emp;
                }
            }
        }
        
        $txn=new Transaction;
        $txn->job_id=$job->id;
        $txn->emp_id=$emp->id;
        $txn->cust_id=Auth::id();
        $txn->cust_pay=$job->cost;
        $txn->cust_total_pay=$job->pay;
        $txn->emp_pay=$empay;
        $txn->emp_salary=$emp_sal;
        $txn->company_commission=$comp;
        $txn->save();

        $job->cust_paid=1;
        $job->save();

        Session::flash('success', 'Success: payment processed.');
        return redirect('dashboard-front');
        /*if($pay!=null) {
            if($req->hr <= $pay->lv1_duration) {
                $tot_wait_charge=0;
                if(!empty($pay->waiting_time)) $tot_wait_charge=$pay->waiting_time*$pay->waiting_charge;
                if($pay->discount_type=='flat') {
                    $cust=($pay->convinient_charge-$pay->discount)+$pay->lv1_customer_pay+$tot_wait_charge;
                    $em=($pay->convinient_charge-$pay->discount)+$pay->lv1_employee_pay;
                }else if($pay->discount_type=='percent') {
                    $cust=(($pay->convinient_charge*(100-$pay->discount))/100)+$pay->lv1_customer_pay+$tot_wait_charge;
                    $em=($pay->convinient_charge-$pay->discount)+$pay->lv1_employee_pay;
                }
            }else {
                $tot_wait_charge=0;
                if(!empty($pay->waiting_time)) $tot_wait_charge=$pay->waiting_time*$pay->waiting_charge;
                if($pay->discount_type=='flat') {
                    $cust=($pay->convinient_charge-$pay->discount)+$pay->lv2_customer_pay+$tot_wait_charge;
                    $em=($pay->convinient_charge-$pay->discount)+$pay->lv2_employee_pay;
                }else if($pay->discount_type=='percent') {
                    $cust=(($pay->convinient_charge*(100-$pay->discount))/100)+$pay->lv2_customer_pay+$tot_wait_charge;
                    $em=($pay->convinient_charge-$pay->discount)+$pay->lv2_employee_pay;
                }
            }

            if($cat->id==)

            $txn=new Transaction;
            $txn->job_id=$job->id;
            $txn->emp_id=$emp->id;
            $txn->cust_id=Auth::id();
            $txn->cust_pay=$cust;
            $txn->emp_pay=$em;
            $txn->save();
            Session::flash('success', 'Success: You need to pay: Rs. '.$cust);
            return redirect('customer-pay');
        }else {
            Session::flash('danger', 'something went wrong!!!');
            return redirect('customer-pay');
        }*/
    }

    function login() {
        $data['title']='Sign In';
        return view('mpn.front.front-login', $data);
    }
    function register() {
        $title="Sign Up";
        $cats=Category::all();
        return view('mpn.front.register', compact('cats', 'title'));
    }

    function submit_register(Request $req) {
        $usr=new User;

        $req->validate([
            // 'aadhar'=>'unique:users,aadhar_no',
        ]);

        $usr->name=$req->name;
        if(!empty($req->category)) {
            $usr->category_id=$req->category;
        }
        $usr->email=$req->email;
        if($req->type=='employee') {
            $usr->employee_id='MPNE-'.mt_rand(1000,9999).'-'.time();
        }else {
            $usr->employee_id='MPNCUST-'.mt_rand(1000,9999).'-'.time();
        }
        $usr->phone=$req->phone;
        $usr->role=$req->type;
        if(!empty($req->gp)) {
            $usr->worker_type=$req->gp;
        }
        if(!empty($req->gpname)  && !empty($req->gpphone)) {
            $usr->group_member=json_encode(array('name'=>$req->gpname, 'phone'=>$req->gpphone));
        }
        if(!empty($req->aadhar)) {
            $usr->aadhar_no=$req->aadhar;
        }
        $usr->password=Hash::make($req->password);
        $usr->address=$req->addr;
        $usr->state=$req->state;
        $usr->nearby_location=$req->near_loc;
        if(!empty($req->file('profile_pic'))) {
            $file=$req->file('profile_pic');
            $fileName=time().$file->getClientOriginalName();
            $file->move(base_path('media/profile/'), $fileName);
            $usr->profile_image=$fileName;
        }
        if(!empty($req->file('aadhar_img'))) {
            $file2=$req->file('aadhar_img');
            $fileName2=time().$file2->getClientOriginalName();
            $file2->move(base_path('media/aadhar/'), $fileName2);
            $usr->aadhar_image=$fileName2;
        }
        $usr->ac_holder_name=$req->acc_holder;
        $usr->ac_number=$req->account_no;
        $usr->ifsc=$req->ifsc;
        $usr->kyc_status='pending';
        $usr->save();
        Session::flash('success', 'Data saved. Continue login...');
        return redirect('register-user');
        
    }

    function list_job() {
        $jobs=Job::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(10);
        return view('mpn.client.job-post', compact('jobs'));
    }

    function add_job() {
        $cats=Category::all();
        return view('mpn.client.add-job', compact('cats'));
    }
    function submit_job(Request $req) {
        $job=new Job;

        $category=Category::find($req->cat);

        $spl=str_split($category->category_name);

        $job->cat_id=$req->cat;
        $job->user_id=Auth::user()->id;
        $job->job_id='MPNJ'.strtoupper($spl[0]).strtoupper($spl[1]).'-'.rand(10000,99999).Auth::user()->id.'-'.time();
        $job->title=$req->title;
        $job->company_name=null;
        $job->job_duration=$req->nohr;
        $job->no_of_emp=$req->noemp;
        $job->job_type=$req->job_type;
        $job->no_of_assignment=$req->numassign;
        $job->description=$req->desp;
        $job->cost=$req->cost;
        $job->location=$req->location;
        $job->pay=$req->pay;
        $job->save();

        $users=User::where('category_id', $req->cat)->get();
        $cat=Category::find($req->cat);
        if(count($users)>0) {
        foreach($users as $usr) {
            $url='http://bhashsms.com/api/sendmsg.php';
            $vars=array('user'=>'ManpowerNation', 'pass'=>'123456', 'sender'=>'MPNJOB', 'phone'=>$usr->phone, 'text'=>'Dear%20MPN%20Employee,%20New%20Job%20Posted%20at%20Manpower%20Nation%20'.$cat->category_name.'%20at%20'.$usr->nearby_location.',%20To%20accept%20reply%20via%20SMS%20or%20WhatsApp%20contact%20no-%207003710086.%20Manpower%20Nation%20MPNJOB', 'priority'=>'ndnd', 'stype'=>'normal');
            $ch=curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL=>$url,
                CURLOPT_RETURNTRANSFER=>true,
                CURLOPT_FOLLOWLOCATION=>true,
                CURLOPT_POST=>true,
                CURLOPT_POSTFIELDS=>$vars,
            ));
           $res=curl_exec($ch);
           curl_close($ch);
        }
        }

        Session::flash('success', 'Data saved');
        return redirect('jobs');
    }

    function edit_job($id) {
        $job=Job::find($id);
        return view('mpn.client.edit-job', compact('job'));
    }

    function submit_edit_job(Request $req) {
        $job=Job::find($req->job_id);

        $job->cat_id=$req->cat;
        // $job->title=$req->title;
        // $job->company_name=$req->company;
        $job->description=$req->desp;
        // $job->cost=$req->cost;
        $job->location=$req->location;
        // $job->status=$req->status;
        $job->save();
        Session::flash('success', 'Data updated');
        return redirect('jobs');
    }

    function remove_job($id) {
        Job::where('id', $id)->delete();
        Session::flash('danger', 'Job deleted!');
        return redirect('jobs');
    }

    function job_review() {
        $data['reviews']=Review::where('client_id', Auth::id())->groupBy('job_id')->get();
        // $data['reviews']=Review::groupBy('id','job_id')->get();
        return view('mpn.client.reviews', $data);
    }

    function show_review($job_id) {
        $data['job']=Job::find($job_id);
        $data['reviews']=Review::where('job_id', $job_id)->orderBy('id', 'desc')->paginate(10);
        return view('mpn.client.show-reviews', $data);
    }

    function user_comment($jobid) {
        $job=Job::find($jobid);
        return view('mpn.front.comment', compact('job'));
    }

    function comment_submit(Request $req) {
        $rev=new Review;
        $rev->job_id=$req->jid;
        $rev->client_id=$req->uid;
        $rev->employee_id=Auth::id();
        $rev->review_text=$req->comment;
        $rev->save();
        Session::flash('success', 'Review created');
        return redirect('user-comment/'.$req->jid);
    }

    function job_apply() {
        $jobs=Job::where('user_id', Auth::id())->get();
        return view('mpn.client.job-apply', compact('jobs'));
    }

    //password change

    function change_password() {
        return view('mpn.change-password');
    }

    function submit_change_password() {
        $user=User::find(Auth::id());
        if(Hash::check($_POST['old'], $user->password)) {
            $user->password=Hash::make($_POST['password']);
            $user->save();
            // if(Auth::user()->role=='employee') {
            //     Session::flash('success', 'Password changed');
            //     return redirect('employee-change-password');
            // }
            Session::flash('success', 'Password changed');
            // return redirect('change-password');
            return redirect('employee-change-password');
        }else {
            // if(Auth::user()->role=='employee') {
            //     Session::flash('danger', 'Old password not matched!');
            //     return redirect('employee-change-password');
            // }
            Session::flash('danger', 'Old password not matched!');
            // return redirect('change-password');
            return redirect('employee-change-password');
        }
    }
    
    function change_pass_employee() {
        $user=Auth::user();
        return view('mpn.front.change-password', compact('user'));
    }


    //profile

    function profile() {
        $user=Auth::user();
        return view('mpn.profile', compact('user'));
    }

    function update_profile(Request $req) {
        $user=User::find(Auth::id());
        $dup_email=User::whereNotIn('id', [Auth::id()])->where('email', $req->email)->get();
        $dup_phone=User::whereNotIn('id', [Auth::id()])->where('phone', $req->phone)->get();
        $dup_acno=User::whereNotIn('id', [Auth::id()])->where('phone', $req->phone)->get();
        if(count($dup_email)>0 || count($dup_phone)>0 || count($dup_acno)>0) {
            Session::flash('danger', 'Duplicate entry not allowed!');
            return redirect('profile');
        }else {
            $user->name=$req->name;
            $user->email=$req->email;
            $user->phone=$req->phone;
            $user->address=$req->address;
            $user->state=$req->state;
            $user->ac_holder_name=$req->acc_holder;
            $user->ac_number=$req->ac_no;
            $user->ifsc=$req->ifsc;
            if(!empty($req->file('pic'))) {
                $file=$req->file('pic');
                $fileName=time().$file->getClientOriginalName();
                $file->move(base_path('media/profile/'), $fileName);
                $user->profile_image=$fileName;
            }
            $user->save();
            Session::flash('success', 'Data updated');
            return redirect('profile');
        }
    }

    //kyc

    function kyc_details() {
        $user=Auth::user();
        return view('mpn.kyc', compact('user'));
    }


    //customer care

    function care_job_confirmation() {
        $jobs=Job::where('closed', 0)->orderBy('id', 'desc')->paginate(10);
        return view('mpn.care.confirm-job', compact('jobs'));
    }

    function care_search_emp(Request $req) {
        $emp=User::where('employee_id', $req->searchemp)->first();
        $job=Job::find($req->jobid);
        return view('mpn.care.care-search', compact('emp', 'job'));
    }

    function care_confirm_job($jid, $eid) {
        // $apply=Jobapply::find($id);
        $apply=new Jobapply;
        $apply->job_id=$jid;
        $apply->employee_id=$eid;
        $apply->ongoing='started';
        $apply->cc_approved=1;
        $apply->save();

        $job=Job::find($jid);
        $job->applied=1;
        $job->save();
        
        Session::flash('success', 'Job accepted');
        return redirect('care-job-apply');
    }

    function care_close($id) {
        $job=Job::find($id);
        $txn=Transaction::where('job_id', $id)->orderBy('id', 'desc')->offset(0)->limit(1)->first();
        
        $job->closed=1;
        $job->save();

        $txn->discard=1;
        $txn->save();

        Session::flash('danger', 'Job successfully closed');
        return redirect('care-job-apply');
    }
    
    
    //profile
    
    function view_profile($id) {
        $cats=Category::all();
        $user=User::find($id);
        if($user->role=='employee') {
            return view('mpn.front.profile', compact('user', 'cats'));
        }else {
            return view('mpn.client.client-profile', compact('user', 'cats'));
        }
    }
    
    function update_employee_profile(Request $req) {
        $user=User::find($req->eid);
        $user->name=$req->name;
        $user->email=$req->email;
        $user->phone=$req->phone;
        $user->address=$req->address;
        $user->worker_type=$req->work_type;
        $user->category_id=$req->category;
        $user->ac_holder_name=$req->acc_holder;
        $user->ac_number=$req->ac_number;
        $user->ifsc=$req->ifsc;
        $user->group_member=json_encode(array('name'=>$req->gpname, 'phone'=>$req->gpphone));
        if(!empty($req->file('pic'))) {
            $file=$req->file('pic');
            $fileName=time().$file->getClientOriginalName();
            $file->move(base_path('media/profile/'), $fileName);
            $user->profile_image=$fileName;
        }
        $user->save();
        Session::flash('success', 'Profile updated');
        return redirect('view-profile/'.$req->eid);
    }

    function client_profile_update(Request $req) {
        $user=User::find($req->eid);
        $user->name=$req->name;
        $user->email=$req->email;
        $user->phone=$req->phone;
        $user->address=$req->address;
        $user->ac_holder_name=$req->acc_holder;
        $user->ac_number=$req->ac_number;
        $user->ifsc=$req->ifsc;
        if(!empty($req->file('pic'))) {
            $file=$req->file('pic');
            $fileName=time().$file->getClientOriginalName();
            $file->move(base_path('media/profile/'), $fileName);
            $user->profile_image=$fileName;
        }
        $user->save();
        Session::flash('success', 'Profile updated');
        return redirect('view-profile/'.$req->eid);
    }
    
    function employee_id_card() {
        $user=Auth::user();
        return view('mpn.front.id-card', compact('user'));
    }
    
    function employee_applied_job() {
        $applied=Jobapply::where('employee_id', Auth::id())->get();
        return view('mpn.front.applied-job', compact('applied'));
    }
    
    function about() {
        $data['title']='About Us';
        return view('mpn.front.about', $data);
    }
    
    function contact() {
        $data['title']='Contact Us';
        return view('mpn.front.contact', $data);
    }
    
    function view_job_details($id) {
        $job=Job::find($id);
        return view('mpn.front.job-details', compact('job'));
    }
    
    function employee_kyc() {
        $user=User::find(Auth::id());
        return view('mpn.front.kyc', compact('user'));
    }
    
    function employee_update_kyc(Request $req) {
        $user=User::find(Auth::id());
        $user->aadhar_no=$req->aadhar_no;
        if(!empty($req->file('aadhar_img'))) {
            $file=$req->file('aadhar_img');
            $filename=time().$file->getClientOriginalName();
            $file->move(base_path('media/aadhar/'), $filename);
            $user->aadhar_image=$filename;
        }
        $user->kyc_status='pending';
        $user->save();
        Session::flash('success', 'Kyc updated');
        return redirect('employee-kyc');
    }
    
    function term_cond() {
        $data['title']='Terms And Conditions';
        return view('mpn.front.tnc', $data);
    }
    
    function privacy() {
        $data['title']='Privacy Policy';
        return view('mpn.front.privacy', $data);
    }
    
    function faq() {
        $data['title']='Faq';
        return view('mpn.front.faq', $data);
    }
    
    function delivery_policy() {
        $data['title']='Delivery Policy';
        return view('mpn.front.delivery-policy', $data);
    }
    
    function refund_cancellation() {
        $data['title']='Cancellation And Refund';
        return view('mpn.front.refund-cancellation', $data);
    }

    function confirmed_job() {
        $apply=Jobapply::where('employee_id', Auth::id())->get();
        return view('mpn.front.confirm-jobs', compact('apply'));
    }

    function mark_complete($id) {
        $apply=Jobapply::find($id);
        $apply->completed=1;
        $apply->updated_at=date('Y-m-d H:i:s');
        $apply->save();
        Session::flash('success', 'Job completed');
        return redirect('employee-confirmed-jobs');
    }
    
    function job_delivery_policy() {
        return view('mpn.front.job-delivery-policy');
    }
    
    function pricing_plan() {
        return view('mpn.front.pricing-plan');
    }
    
    function user_terms_and_conditions() {
        return view('mpn.front.user-terms-and-conditions');
    }
    
    function job_id() {
        return view('mpn.front.job-id');
    }
    
    function sitemap() {
        return view('mpn.front.sitemap');
    }
    
    function choose_manual() {
        $employees=User::where('role', 'employee')->orderBy('id', 'desc')->paginate(10);
        return view('mpn.care.manual-employee', compact('employees'));
    }

    function job_for_employee($cat, $emp) {
        $jobs=Job::where('cat_id', $cat)->where('applied', 0)->get();
        $user=User::find($emp);
        return view('mpn.care.job-for-employee', compact('jobs', 'user'));

    }

    function job_manual_accept($jid, $uid) {
        $job=Job::find($jid);
        $apply=new Jobapply;
        $apply->job_id=$jid;
        $apply->employee_id=$uid;
        $apply->save();

        $job->applied=1;
        $job->save();
        Session::flash('success', 'Job accepted');
        return redirect('care-manual-employee');
    }

    function get_payment(Request $req) {
        $pay=Payment::where('category_id', $req->cat)->first();
        // $pay=Payment::where('category_id', 1)->first();
        if($pay!=null) {
            if($req->cat==1 || $req->cat==2 || $req->cat==3) {
                $job_type=$req->jobtype;
                $no_assign=$req->numassignment;
                $cust=0;
                if($job_type=='normal') {
                    if(!empty($pay->waiting_time)) {
                        $cust=($pay->lv1_customer_pay*$no_assign)+($pay->waiting_time*$pay->waiting_time_charge);
                    }else {
                        $cust=$pay->lv1_customer_pay*$no_assign;
                    }
                }else if($job_type=='heavy') {
                    if(!empty($pay->waiting_time)) {
                        $cust=($pay->lv2_customer_pay*$no_assign)+($pay->waiting_time*$pay->waiting_time_charge);
                    }else {
                        $cust=$pay->lv2_customer_pay*$no_assign;
                    }
                }
                $convinient_charge=$pay->convinient_charge-$pay->discount;
                $net_pay=$convinient_charge+$cust;
                return response()->json(['error'=>0, 'customer_pay'=>$cust, 'convinient_charge'=> $pay->convinient_charge.' - 83% discount = Rs. '.$convinient_charge, 'total_pay'=>$net_pay]);
            }else if($req->cat==4 || $req->cat==5 || $req->cat==6) {
                $num_hour=$req->numhour;
                $num_emp=$req->numemp;
                $cust=0;
                if($num_hour<=$pay->lv1_duration) {
                    if(!empty($pay->waiting_time)) {
                        $cust=($pay->lv1_customer_pay*$num_hour)+($pay->waiting_time*$pay->waiting_time_charge);
                    }else {
                        $cust=$pay->lv1_customer_pay*$num_hour;
                    }
                }else if($num_hour>=$pay->lv2_duration) {
                    if(!empty($pay->waiting_time)) {
                        $cust=($pay->lv2_customer_pay*$num_hour)+($pay->waiting_time*$pay->waiting_time_charge);
                    }else {
                        $cust=$pay->lv2_customer_pay*$num_hour;
                    }
                }
                $convinient_charge=$pay->convinient_charge-$pay->discount;
                $net_pay=$convinient_charge+($cust*$num_emp);
                return response()->json(['error'=>0, 'customer_pay'=>$cust, 'convinient_charge'=> $pay->convinient_charge.' - 83% discount = Rs. '.$convinient_charge, 'total_pay'=>$net_pay]);
            }
        }else {
            return response()->json(['error'=>1]);
        }
    }

    function applied_job_summery() {
        $transactions=Transaction::where('emp_id', Auth::id())->get();
        return view('mpn.front.applied-job-summery', compact('transactions'));
    }

    function emp_job_details($id) {
        $job=Job::find($id);
        return view('mpn.front.employee-job-details', compact('job'));
        // print_r($jobs);
    }
    
    function customer_job_details($id) {
        $job=Job::find($id);
        return view('mpn.client.job-details', compact('job'));
        // print_r($jobs);
    }

    function job_cancel_request($id) {
        $job=Job::find($id);
        $job->req_cancel=1;
        $job->save();
        Session::flash('success', 'Request sent');
        return redirect('jobs');
    }

    function send_contact_email(Request $req) {
        $data=[
        'name'=>$req->name,
        'email'=>$req->email,
        'number'=>$req->number,
        'subject'=>$req->subject,
        'message'=>$req->message];

        Mail::to('customersupport@manpowernation.com')->send(new SendContact($data));
        Session::flash('success', 'Requesr sent');
        return redirect('contact');
    }

    //blogs

    function all_blogs() {
        $blogs=Blog::orderBy('id', 'desc')->paginate(5);
        return view('mpn.front.all-blogs', compact('blogs'));
    }

    function blog_details($slug) {
        $slugs=Blog::where('slug', $slug)->paginate(1);
        return view('mpn.blog.blog-details', compact('slugs'));
    }

    function post_blog_comment(Request $req) {
        $comment=new Comment;
        $comment->blog_id=$req->blogid;
        $comment->name=$req->name;
        $comment->email=$req->email;
        $comment->comment_text=$req->comment;
        $comment->save();
        Session::flash('success', 'Your comment submitted');
        return redirect('blog-details/'.$req->slug);
    }




}

?>