<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Payment;

use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\Jobapply;
use Illuminate\Support\Facades\Hash;
use App\Models\Commission;
use App\Models\Discount;
use App\Models\Phonepe;
use App\Models\Phonepereturn;


class AdminController extends Controller
{
    //
    public function login() {
        return view('mpn.login');
    }

    function list_category() {
        $cats=Category::orderBy('id', 'desc')->paginate(10);
        return view('mpn.add-category', compact('cats'));
    }

    function submit_category(Request $req) {
        $cat=new Category;
        $req->validate([
            'category'=> 'required',
        ]);
        $cat->category_name=$req->category;
        $cat->save();
        Session::flash('success', 'Category created.');
        return redirect('category');
    }

    function submit_edit_category(Request $req) {
        $cat=Category::find($req->cat_id);
        $cat->category_name=$req->category;
        $cat->save();
        Session::flash('success', 'Category updated.');
        return redirect('category');
    }

    function remove_category($id) {
        Category::where('id', $id)->delete();
        Session::flash('danger', 'Category deleted!');
        return redirect('category');
    }

    function list_employer() {
        $employers=User::where('role', 'employer')->orderBy('id', 'desc')->paginate(10);
        return view('mpn.admin.list-employer', compact('employers'));
    }

    function remove_employer($id) {
        User::where('id', $id)->delete();
        Session::flash('danger', 'Deleted!');
        return redirect('employer');
    }

    function list_employee() {
        $employees=User::where('role', 'employee')->orderBy('id', 'desc')->paginate(10);
        return view('mpn.admin.employee', compact('employees'));
    }

    function remove_employee($id) {
        User::where('id', $id)->delete();
        Session::flash('danger', 'Deleted!');
        return redirect('employee');
    }

    function all_jobs() {
        $jobs=Job::orderBy('id', 'desc')->paginate(10);
        return view('mpn.admin.all-jobs', compact('jobs'));
    }

    function edit_job(Request $req) {
        $job=Job::find($req->job_id);

        $job->cat_id=$req->cat;
        $job->title=$req->title;
        $job->company_name=$req->company;
        $job->description=$req->desp;
        $job->cost=$req->cost;
        $job->location=$req->location;
        $job->status=$req->status;
        $job->save();
        Session::flash('success', 'Data updated');
        return redirect('all-jobs');
    }
    
    function remove_job($id) {
        Job::where('id', $id)->delete();
        Session::flash('danger', 'Job deleted!');
        return redirect('all-jobs');
    }

    function job_apply() {
        $applies=Jobapply::orderBy('id', 'desc')->paginate(10);
        return view('mpn.admin.all-job-apply', compact('applies'));
    }

    function care_agent() {
        $agents=User::where('role', 'care')->orderBy('id', 'desc')->paginate(10);
        return view('mpn.admin.customer-care', compact('agents'));
    }

    function register_agent(Request $req) {
        $usr=new User;

        $req->validate([
            'aadhar'=>'required|unique:users,aadhar_no',
            'ac_no'=>'required|unique:users,ac_number',
        ]);

        $usr->name=$req->name;
        $usr->email=$req->email;
        $usr->phone=$req->phone;
        $usr->role='care';
        $usr->aadhar_no=$req->aadhar;
        $usr->password=Hash::make($req->password);
        $usr->address=$req->addr;
        $usr->state=$req->state;
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
        $usr->save();
        Session::flash('success', 'Data saved.');
        return redirect('customer-care');
    }

    function update_agent(Request $req) {
        $user=User::find($req->care_id);
        $dup_email=User::whereNotIn('id', [$req->care_id])->where('email', $req->email)->get();
        $dup_phone=User::whereNotIn('id', [$req->care_id])->where('phone', $req->phone)->get();
        $dup_acno=User::whereNotIn('id', [$req->care_id])->where('ac_number', $req->ac_no)->get();
        if(count($dup_email)>0 || count($dup_phone)>0 || count($dup_acno)>0) {
            Session::flash('danger', 'Duplicate entry not allowed!');
            return redirect('customer-care');
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
            return redirect('customer-care');
        }
    }

    function delete_agent($id) {
        User::where('role', 'care')->where('id', $id)->delete();
        Session::flash('danger', 'Agent deleted');
        return redirect('customer-care');
    }

    function charges() {
        $charge=Commission::find(1);
        $client=User::where('role', 'employer')->get();
        $discount=Discount::orderBy('id', 'desc')->paginate(10);
        return view('mpn.admin.commission', compact('charge', 'client', 'discount'));
        // return $charge->charges;
    }

    function edit_charges() {
        $charge=Commission::find(1);

        $charge->charges=$_POST['commission'];
        $charge->save();
        Session::flash('success', 'Commission updated');
        return redirect('charges');
    }

    function add_discount(Request $req) {
        $check_dc=Discount::where('client_id', $req->client)->get();
        if(count($check_dc)>0) {
            Session::flash('danger', 'Discount already exists for this client!');
            return redirect('charges');
        }else {
            $dc=new Discount;
            $dc->client_id=$req->client;
            $dc->off_percent=$req->off;
            $dc->save();
            Session::flash('success', 'Discount added.');
            return redirect('charges');
        }
    }
    
    function edit_discount(Request $req) {
        $check_dc=Discount::whereNotIn('id', [$req->dc_id])->where('client_id', $req->client)->get();
        if(count($check_dc)>0) {
            Session::flash('danger', 'Discount already exists for this client!');
            return redirect('charges');
        }else {
            $dc=Discount::find($req->dc_id);
            $dc->client_id=$req->client;
            $dc->off_percent=$req->off;
            $dc->save();
            Session::flash('success', 'Discount updated.');
            return redirect('charges');
        }
    }

    function remove_discount($id) {
        Discount::where('id', $id)->delete();
        Session::flash('danger', 'Discount removed for client!');
        return redirect('charges');
    }

    function check_kyc() {
        $users=User::where('role', ['employee'])->where('kyc_status', 'pending')->orderBy('id', 'desc')->paginate(10);
        return view('mpn.admin.check-kyc', compact('users'));
    }

    function approve_kyc($id) {
        $user=User::find($id);
        $user->kyc_status='approved';
        $user->save();
        Session::flash('success', 'Kyc Approved');
        return redirect('verify-kyc');
    }
    
    function reject_kyc($id) {
        $user=User::find($id);
        $user->kyc_status='rejected';
        $user->save();
        Session::flash('danger', 'Kyc rejected!');
        return redirect('verify-kyc');
    }

    function list_payments() {
        $payments=Payment::all();
        return view('mpn.admin.payments', compact('payments'));
    }

    function add_payment() {
        $cats=Category::all();
        return view('mpn.admin.add-payment', compact('cats'));
    }

    function create_payment(Request $req) {
        $dupcat=0;
        $allpays=Payment::all();
        foreach($allpays as $p) {
            if($p->category_id==$req->cat) {
                $dupcat++;
            }
        }
        if($dupcat>0) {
            Session::flash('danger', 'This category already exists!');
            return redirect('payments');
        }else {
        $pay=new Payment;
        $pay->category_id=$req->cat;
        $pay->convinient_charge=$req->cnv_chrg;
        $pay->discount_type=$req->discount_type;
        $pay->discount=$req->discount;
        $pay->lv1_duration=$req->lv1_dur;
        $pay->lv1_customer_pay=$req->lv1_cust_chrg;
        $pay->lv1_employee_pay=$req->lv1_emp_chrg;
        $pay->lv2_duration=$req->lv2_dur;
        $pay->lv2_customer_pay=$req->lv2_cust_chrg;
        $pay->lv2_employee_pay=$req->lv2_emp_chrg;
        $pay->waiting_time=$req->wait_time;
        $pay->waiting_time_charge=$req->wait_chrg;
        $pay->save();
        Session::flash('success', 'Payment created.');
        return redirect('payments');
        }
    }

    function edit_payment($id) {
        $cats=Category::all();
        $pay=Payment::find($id);
        return view('mpn.admin.edit-payment', compact('cats', 'pay'));
    }

    function submit_edit_payment(Request $req) {
        $pay=Payment::find($req->payid);
        // $pay->category_id=$req->cat;
        $pay->convinient_charge=$req->cnv_chrg;
        $pay->discount_type=$req->discount_type;
        $pay->discount=$req->discount;
        $pay->lv1_duration=$req->lv1_dur;
        $pay->lv1_customer_pay=$req->lv1_cust_chrg;
        $pay->lv1_employee_pay=$req->lv1_emp_chrg;
        $pay->lv2_duration=$req->lv2_dur;
        $pay->lv2_customer_pay=$req->lv2_cust_chrg;
        $pay->lv2_employee_pay=$req->lv2_emp_chrg;
        $pay->waiting_time=$req->wait_time;
        $pay->waiting_time_charge=$req->wait_chrg;
        $pay->save();
        Session::flash('success', 'Payment updated.');
        return redirect('payments');
    }

    function remove_pay($id) {
        Payment::where('id', $id)->delete();
        Session::flash('danger', 'Payment deleted!');
        return redirect('payments');
    }

    function list_phonepe_trans() {
        $phonepe=Phonepe::all();
        return view('mpn.admin.phonepe-trans', compact('phonepe'));
    }

    function job_apply_mark_done($id) {
        $apply=Jobapply::find($id);
        $apply->completed=1;
        $apply->updated_at=date('Y-m-d H:i:s');
        $apply->save();
        Session::flash('success', 'Job done!');
        return redirect('all-job-apply');
    }

    function temp_disable($id) {
        $user=User::find($id);
        if($user->tmp_disabled==0){
            $user->tmp_disabled=1;
            $user->save();
            Session::flash('danger', 'Put on Hold!');
        }else {
            $user->tmp_disabled=0;
            $user->save();
            Session::flash('success', 'Activated');
        }
        if($user->role=='employer') {
            return redirect('employer');
        }else if($user->role=='employee') {
            return redirect('employee');
        }
    }

    function view_job_details($id) {
        $job=Job::find($id);
        return view('mpn.admin.view-job-details', compact('job'));
    }



}
