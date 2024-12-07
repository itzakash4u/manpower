<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PhonePecontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/register-user', [HomeController::class, 'register']);
Route::post('/submit-register', [HomeController::class, 'submit_register']);

Route::get('user-login', [HomeController::class, 'login']);

Route::get('phonepe/{id}/{amount}',[PhonePeController::class,'phonePe']);
Route::any('phonepe-response',[PhonePeController::class,'response'])->name('response');
Route::get('refund/{id}',[PhonePecontroller::class,'refundProcess']);

Route::get('/admin', [AdminController::class, 'login']);

Route::post('/job-search-result', [HomeController::class, 'job_search_result']);

Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/view-job-details/{id}', [HomeController::class, 'view_job_details']);
Route::get('/term-condition', [HomeController::class, 'term_cond']);
Route::get('/privacy', [HomeController::class, 'privacy']);
Route::get('/faq', [HomeController::class, 'faq']);
Route::get('/delivery-policy', [HomeController::class, 'delivery_policy']);
Route::get('/refund-cancellation', [HomeController::class, 'refund_cancellation']);
Route::get('list-job-by-cat/{id}', [HomeController::class, 'catwise_job']);
Route::get('/job-delivery-policy', [HomeController::class, 'job_delivery_policy']);
Route::get('/pricing-plan', [HomeController::class, 'pricing_plan']);
Route::get('/user-terms-and-conditions', [HomeController::class, 'user_terms_and_conditions']);
Route::get('/job-id', [HomeController::class, 'job_id']);
Route::get('/sitemap', [HomeController::class, 'sitemap']);

//blogs
Route::get('blog', [HomeController::class, 'all_blogs'])->name('blog');
Route::get('blog-details/{slug}', [HomeController::class, 'blog_details']);
Route::post('/post-blog-comment', [HomeController::class, 'post_blog_comment']);

Route::post('/send-email', [HomeController::class, 'send_contact_email']);

Route::get('/dashboard', function () {
    return view('mpn.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/category', [AdminController::class, 'list_category'])->name('category');
    Route::post('submit-category', [AdminController::class, 'submit_category']);
    Route::post('/submit-edit-category', [AdminController::class, 'submit_edit_category']);
    Route::get('/remove-category/{id}', [AdminController::class, 'remove_category']);
    
    Route::get('/employer', [AdminController::class, 'list_employer'])->name('employer');
    Route::get('/remove-employer/{id}', [AdminController::class, 'remove_employer']);

    Route::get('/employee', [AdminController::class, 'list_employee'])->name('employee');
    Route::get('/remove-employee/{id}', [AdminController::class, 'remove_employee']);

    Route::get('/all-jobs', [AdminController::class, 'all_jobs'])->name('all-jobs');
    Route::post('/admin-edit-job', [AdminController::class, 'edit_job']);
    Route::get('/admin-remove-job/{id}', [AdminController::class, 'remove_job']);

    Route::get('/all-job-apply', [AdminController::class, 'job_apply'])->name('all-job-apply');

    Route::get('/customer-care', [AdminController::class, 'care_agent'])->name('customer-care');
    Route::post('/agent-register', [AdminController::class, 'register_agent']);
    Route::post('/update-agent', [AdminController::class, 'update_agent']);
    Route::get('remove-agent/{id}', [AdminController::class, 'delete_agent']);

    Route::get('/charges', [AdminController::class, 'charges'])->name('charges');
    Route::post('/edit-charges', [AdminController::class, 'edit_charges']);

    Route::get('/verify-kyc', [AdminController::class, 'check_kyc'])->name('verify-kyc');
    Route::get('/admin-approve-kyc/{id}', [AdminController::class, 'approve_kyc']);
    Route::get('/admin-reject-kyc/{id}', [AdminController::class, 'reject_kyc']);

    Route::post('add-discount', [AdminController::class, 'add_discount']);
    Route::post('edit-discount', [AdminController::class, 'edit_discount']);
    Route::get('remove-discount/{id}', [AdminController::class, 'remove_discount']);

    Route::get('/payments', [AdminController::class, 'list_payments'])->name('payments');
    Route::get('/add-payment', [AdminController::class, 'add_payment']);
    Route::post('/create-payment', [AdminController::class, 'create_payment']);
    Route::get('/edit-payment/{payid}', [AdminController::class, 'edit_payment']);
    Route::post('/submit-edit-payment', [AdminController::class, 'submit_edit_payment']);
    Route::get('/remove-payment/{id}', [AdminController::class, 'remove_pay']);

    Route::get('/phonepe-trans', [AdminController::class, 'list_phonepe_trans'])->name('phonepe-trans');

    Route::get('/transactions', [AdminController::class, 'transactions'])->name('transactions');

    Route::get('/admin-mark-done/{id}', [AdminController::class, 'job_apply_mark_done']);

    Route::get('/admin-temp-disable/{id}', [AdminController::class, 'temp_disable']);

    Route::get('blogs', [BlogController::class, 'list_blogs']);
    Route::post('submit-add-blog', [BlogController::class, 'submit_add_blog']);
    Route::get('edit-blog/{slug}/{id}', [BlogController::class, 'edit_blog']);
    Route::post('submit-edit-blog', [BlogController::class, 'submit_edit_blog']);
    Route::get('remove-blog/{id}', [BlogController::class, 'remove_blog']);

    Route::get('comments', [BlogController::class, 'comments']);
    Route::post('edit-comment', [BlogController::class, 'edit_comment']);
    Route::post('remove-comment/{id}', [BlogController::class, 'remove_comment']);

    //jobs
    Route::get('/jobs', [HomeController::class, 'list_job'])->name('jobs');
    Route::get('/add-job', [HomeController::class, 'add_job']);
    Route::post('/submit-job', [HomeController::class, 'submit_job']);
    Route::get('/edit-job/{id}', [HomeController::class, 'edit_job']);
    Route::post('/submit-edit-job', [HomeController::class, 'submit_edit_job']);
    Route::get('/remove-job/{id}', [HomeController::class, 'remove_job']);

    Route::get('/customer-pay', [HomeController::class, 'cust_pay']);
    Route::post('/submit-customer-pay', [HomeController::class, 'submit_customer_pay']);


    Route::post('/get-payment-details', [HomeController::class, 'get_payment'])->name('get-payment-dtls');

    //job review
    Route::get('/job-review', [HomeController::class, 'job_review'])->name('job-review');
    Route::get('/job-apply', [HomeController::class, 'job_apply'])->name('job-apply');
    Route::get('/show-review/{id}', [HomeController::class, 'show_review']);
    
    //job-apply
    Route::get('/apply-job/{jid}/{uid}', [HomeController::class, 'apply_job']);
    
    //password change
    Route::get('change-password', [HomeController::class, 'change_password']);
    Route::post('/submit-change-password', [HomeController::class, 'submit_change_password']);
    //update profile
    Route::get('/profile', [HomeController::class, 'profile']);
    Route::post('/update-profile', [HomeController::class, 'update_profile']);
    //kyc
    Route::get('/kyc', [HomeController::class, 'kyc_details'])->name('kyc');
    Route::post('/submit-kyc', [HomeController::class, 'submit_kyc']);

    //customer care
    Route::get('/care-job-apply', [HomeController::class, 'care_job_confirmation'])->name('care-job-apply');
    Route::get('/care-confirm-job/{jid}/{eid}', [HomeController::class, 'care_confirm_job']);
    Route::get('/care-manual-employee', [HomeController::class, 'choose_manual'])->name('care-manual-employee');
    Route::get('/jobs-for-employee/{catid}/{empid}', [HomeController::class, 'job_for_employee']);
    Route::get('/manual-accept-job/{jid}/{empid}', [HomeController::class, 'job_manual_accept']);

    Route::post('/care-search-employee', [HomeController::class, 'care_search_emp']);
    Route::get('/care-close-job/{id}', [HomeController::class, 'care_close']);
    
    //profile
    Route::get('/view-profile/{id}', [HomeController::class, 'view_profile']);
    Route::post('/update-employee-profile', [HomeController::class, 'update_employee_profile']);
    Route::get('/employee-change-password', [HomeController::class, 'change_pass_employee']);
    Route::get('/employee-id-card', [HomeController::class, 'employee_id_card']);
    Route::get('/employee-applied-job', [HomeController::class, 'employee_applied_job']);
    Route::get('/employee-kyc', [HomeController::class, 'employee_kyc']);
    Route::post('/employee-update-kyc', [HomeController::class, 'employee_update_kyc']);

    //client
    Route::post('/update-client-profile', [HomeController::class, 'client_profile_update']);

    Route::get('employee-confirmed-job', [HomeController::class, 'confirmed_job']);
    Route::get('mark-job-complete/{id}', [HomeController::class, 'mark_complete']);
    Route::get('user-comment/{job}', [HomeController::class, 'user_comment']);
    Route::post('submit-comment', [HomeController::class, 'comment_submit']);

    //dashboard
    Route::get('/dashboard-front', [HomeController::class, 'dashboard']);

    Route::get('applied-job-summery', [HomeController::class, 'applied_job_summery']);

    Route::get('emp-job-details/{id}', [HomeController::class, 'emp_job_details']);
    Route::get('customer-job-details/{id}', [HomeController::class, 'customer_job_details']);
    Route::get('request-job-cancel/{id}', [HomeController::class, 'job_cancel_request']);

    //admin

    Route::get('/admin-view-job-details/{id}', [AdminController::class, 'view_job_details']);



});

require __DIR__.'/auth.php';

