@extends('mpn.front.layout')

@section('add-metatags')
        <title>Terms & Conditions | Manpower Nation</title>
        <meta name="description" content="Read our terms and conditions carefully before availing of our workforce supply services. Contact us for more information." />
@stop

@section('content')

        <!-- Page Title Start -->
        <section class="page-title title-bg10">
            <div class="d-table">
                <div class="d-table-cell">
                    <h2>Terms & Conditions</h2>
                    <ul>
                        <li>
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li>Terms & Conditions</li>
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

        <!-- Account Area Start -->
        @if(Session::has('success')) <div class="alert alert-success">{{Session::get('success')}}</div> @endif
        @if(Session::has('danger')) <div class="alert alert-danger">{{Session::get('danger')}}</div> @endif
        <section class="account-section ptb-100">
            <div class="container">
                <div class="about-text">
                    <div class="section-title text-center">
                        <h2>Terms & Conditions</h2>
                    </div>
                    <p>Welcome to Manpowernation.com. This website is owned and operated by Manpower Nation, 6 Premises No. B1/63/12/New Budge Budge Trunk Road, Jagtala (West) PO Batanagar, PS Mehestala Pin code-700 141, INDIA. By visiting our website and accessing the information, resources, services, products, and tools we provide, you understand and agree to accept and adhere to the following terms and conditions as stated in this policy (hereafter referred to as 'User Agreement'), along with the terms and conditions as stated in our Privacy Policy (please refer to the Privacy Policy section below for more information).</p>
                    <p>We reserve the right to change this User Agreement from time to time without notice. You acknowledge and agree that it is your responsibility to review this User Agreement periodically to familiarize yourself with any modifications. Your continued use of this site after such modifications will constitute acknowledgment and agreement of the modified terms and conditions.</p>
                    <ul>
                        <li type="A">
                            <h3>RESPONSIBLE AND CONDUCT</h3>
                            <ul type="square">
                                <li>In order to register an applicant must verify through Aadhar card, Phone number, and proper address.</li>
                                <li>You must provide ‘Manpower nation’ with Bank details or UPI ID or registered phone number (Google Pay, .Phonepe, BHIM, Paytm) for the payment and transaction purposes.</li>
                                <li>Here the two parties are termed as, the Customer - who provide jobs to Manpower Nation and the Employee- who does the jobs.</li>
                                <li>The employee receives a unique ID from ‘Manpower Nation’ as a temporary member.</li>
                                <li>There is two section of employment :
                                    <ol>
                                        <li>
                                            <h5>Sole Employee</h5>
                                            <ul type="circle">
                                                <li>Apex -completed 4000 assignment with 90% of good reviews- the will be at top Employees list yearly, 12% bonus for upcoming 1 year’s earnings. </li>
                                                <li>Chief - completed 2500 assignment with 80% of good reviews- will be rewarded 7% bonus for upcoming 1 year’s earnings.</li>
                                                <li>Captain - completed 1000 assignment with 80% of good reviews- will be rewarded 5% bonus for upcoming 1 year’s earnings</li>
                                                <li>Basic</li>
                                            </ul>
                                        </li>
                                        <li>
                                            <h5>Team Employee</h5>
                                            <ul type="circle">
                                                <li>Apex -completed 6000 assignment with 90% of good reviews- the will be at top Employees list yearly, 12% bonus for upcoming 1 year’s earnings.</li>
                                                <li>Chief - completed 3500 assignment with 85% of good reviews- will be rewarded 7% bonus for upcoming 1 year’s earnings.</li>
                                                <li>Captain - completed 2500 assignment with 85% of good reviews- will be rewarded 5% bonus for upcoming 1 year’s earnings</li>
                                                <li>Basic</li>
                                            </ul>
                                        </li>
                                    </ol>
                                </li>
                                <li>The Employee need to show ‘Manpower Nation’ identity prove when get in contact during any job, if any of the party fail to show or prove their identity the other party can ask for change the employee and the employee will not be paid.  </li>
                                <li>If the Customer cancels the job after the employee is appointed, the Customer has 15mins to cancel the job to get the refund in 24 hours.</li>
                                <li>If the Customer tries to cancel the job after 15mins timeframe, the employees or the company are not liable to complete the job and the company isn’t liable to refund if any payment done for the job.</li>
                                <li>If the Customer cancels consecutive or 4 jobs within a week or month then the company will be forced to ban them from the association.</li>
                                <li>If the employee tries to cancel the job after accepting the job within 15mins, they have to show proper reasons to Manpower Nation with proof then the employee can skip the job, but if the employee tries to cancel more than 2 jobs/assignments the employee will be suspended from the company for 1 month.</li>
                                <li>If the employee gets any legitimate complain of unprofessionalism and wrong behavior from a Customer the employee gets banned for a week.</li>
                                <li>If the employee gets five legitimate complain of unprofessionalism and wrong behavior from a Customer the employee will be banned from the Manpower Nation forever.</li>
                                <li>If any damage occurred during the job the employee will be liable Manpower Nation will not be held accountable.</li>
                                <li>If the Customer or the employee breaks any law regarding Indian constitution then the Victim party is free to appear on court and the ‘Manpower Nation’ will not hold any responsibilities or liable  for any type of claims or any compensations.</li>
                                <li>Any complaints against the party Customer or Employee will be taken in consideration by the Manpower Nation and be resolved within one week under the ‘Manpower Nation’ guideline.</li>
                                <li>Company isn’t liable to anyone’s personal issues either of Customer’s or employee’s, if any of them the Customer or employee get involved with any illegal deed according to Indian Laws, the ‘Manpower Nation’ shall not be hold accountable to any responsibilities.</li>
                                <li>	If either of Customer or employee wants to file a complaint against the other party they will be free to do under Indian laws they hold the right as democratic nation but the ‘Manpower Nation’ will not be involved,</li>
                                <li>Every year on the ‘Manpower Nation’s anniversary there will post annual notification that the Customer and the employees must read. And a prize for a lucky employee will receive a special gift from ‘Manpower Nation’.</li>
                            </ul>
                        </li>
                        <li type="A">
                            <h3>PRIVACY</h3>
                            <p>Your privacy is very important to us, which is why we've created a separate Privacy Policy in order to explain in detail how we collect, manage, process, secure, and store your private information. Our privacy policy is included under the scope of this User Agreement. To read our privacy policy in its entirety, click her. </p>
                        </li>
                        <li type="A">
                            <h3>LIMITATION OF WARRANTIES</h3>
                            <p>By using our website, you understand and agree that all Resources we provide are "as is" and "as available". This means that we do not represent or warrant to you that:</p>
                        </li>
                        <li type="A"> 
                            <h3>LIMITATION OF LIABILITY</h3>
                            <p>In conjunction with the Limitation of Warranties as explained above, you expressly understand and agree that any claim against us shall be limited to the amount you paid, if any, for use of services. www.manpowernation.com will not be liable for any direct, indirect, incidental, consequential or exemplary loss or damages which may be incurred by you as a result of using our Resources, or as a result of any changes, data loss or corruption, cancellation, loss of access, or downtime to the full extent that applicable limitation of liability laws apply.</p>
                        </li>
                        <li type="A">
                            <h3>COPYRIGHTS</h3>
                            <p>All content and materials available on www.manpowernation.com, including but not limited to text, graphics, website name, code, images and logos are the intellectual property of Manpower Nation, and are protected by applicable copyright and trademark law. Any inappropriate use, including but not limited to the reproduction, distribution, display or transmission of any content on this site is strictly prohibited, unless specifically authorized by Manpower Nation.</p>
                        </li>
                        <li type="A">
                            <h3>TERMINATION OF USE</h3>
                            <p>You agree that we may, at our sole discretion, suspend or terminate your access to all or part of our website and Resources with or without notice and for any reason, including, without limitation, breach of this User Agreement. Any suspected illegal, fraudulent or abusive activity may be grounds for terminating your relationship and may be referred to appropriate law enforcement authorities. Upon suspension or termination, your right to use the Resources we provide will immediately cease, and we reserve the right to remove or delete any information that you may have on file with us, including any account or login information.</p>
                        </li>
                        <li type="A">
                            <h3>GOVERNING LAW</h3>
                            <p>This website is controlled by Manpower Nation from our offices located in the state of West Bengal, India. It can be accessed by any states in India. Any action to enforce this User Agreement shall be brought in the state courts located in West Bengal, India. You hereby agree to personal jurisdiction by such courts, and waive any jurisdictional, venue, or inconvenient forum objections to such courts.</p>
                        </li>
                        <li type="A">
                            <h3>CANCELLATION AND REFUND</h3>
                            <p>Cancellation of service is not possible once the 15 mins crossed. No refunds will be given except in the event of cancellation within the time period of Manpower Nation.</p>
                        </li>
                        <li type="A">
                            <h3>CONTACT INFORMATION</h3>
                            <p>If you have any questions or comments about these our Terms of Service as outlined above, </p>
                            <p>Founder: Mr. Debagni Singha
                            <br>
                            Email ID: debagniadm@manpowernation.com 
                            <!--<div class="text-end">Last updated: May 24, 2021</div>-->
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- Account Area End -->

@stop

@section('add-scripts')


<script>
    $(document).ready(function() {
        $('#repass').keyup(function(e) {
            if($('#pass').val()!=$('#repass').val()) {
                $('#submit').prop('disabled', true)
                $('#err').html('Password not matched!')
            }else {
                $('#submit').prop('disabled', false)
                $('#err').html('')
            }
        })
    })
</script>
@stop

