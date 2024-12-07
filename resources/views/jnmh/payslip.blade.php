<html>
    <head></head>
    <body>
        <!-- <h1>Table</h1> -->
        <?php
            $emp=App\Models\Employee::find($salary->employee_id);
            $cat=App\Models\Category::find($emp->category_id);
            $subcat=App\Models\Subcategory::find($emp->subcategory_id);
            $plmin=App\Models\Paylevel::where('level', $emp->pay_level)->min('basic');
            $plmax=App\Models\Paylevel::where('level', $emp->pay_level)->max('basic'); ?>

        <table border="1" width="100%" style="border: none;">
            <tr>
                <td colspan="2" align="center">
                    <h3>College of Medicine & J.N.M Hospital</h3>
                    <h3>West Bengal University of Health Science</h3>
                    <h3>Kalyani, Nadia</h3>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div style="float:left">
                        <p style="">Payslip for the Month of: <b>{{ date('M, Y', strtotime($salary->sal_month)) }}</b></p>
                        <p style="">Bill No: 458/SAL<p>
                    </div>
                    <div style="float:right">
                        <p style="float:right">Dated: {{ date('d-m-Y', strtotime($salary->created_at)) }}<p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div style="float:left">
                        <p style="">Employee name: {{ strtoupper($emp->name) }}</p>
                        <p>Designation: {{ strtoupper($subcat->subcategory_name) }}</p>
                        <p>Department: {{ strtoupper($cat->category_name) }}</p>
                        <p>Dae Of Joining: {{ date('d-m-Y', strtotime($emp->joining_date)) }}</p>
                        <p style="">Pay Level: PL-{{ $emp->pay_level }} ({{ $plmin }}-{{ $plmax }})</p>
                    </div>
                    <div style="float:right">
                        <p>PF A/C No: </p>
                        <p>Pan No: {{ $emp->pan }}</p>
                        <p>Bank name: {{ $emp->bank }}</p>
                        <p>Bank A/C No: {{ $emp->account_no }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td align="center"><b>Pay & Allowance</b></td>
                <td align="center"><b>Deductions</b></td>
            </tr>
            <tr style="border: none;">
                <td style="border: none;">
                    <div>
                        <table border="1" width="100%" style="border: none;">
                            <tr>
                                <th>Details</th>
                                <th>Amount</th>
                            </tr>
                            <tr>
                                <td>BP</td>
                                <td align="center">{{ $salary->basic_pay }}</td>
                            </tr>
                            <tr @if(empty($salary->cal_npa)) style="display:none" @endif>
                                <td>NPA</td>
                                <td align="center">{{ $salary->cal_npa }} </td>
                            </tr>
                            <tr @if(empty($salary->bp_plus_npa)) style="display:none" @endif>
                                <td>BP+NPA</td>
                                <td align="center">{{ $salary->bp_plus_npa }}</td>
                            </tr>
                            <tr>
                                <td>Dearness AIL</td>
                                <td align="center">{{ $salary->cal_da }}</td>
                            </tr>
                            <tr>
                                <td>H.R.A</td>
                                <td align="center">{{ $salary->cal_hra }}</td>
                            </tr>
                            <tr>
                                <td>Med All</td>
                                <td align="center">{{ $salary->cal_ma }}</td>
                            </tr>
                            <tr @if(empty($salary->specialist_pay)) style="display:none" @endif>
                                <td>Specialist Pay</td>
                                <td align="center">{{ $salary->specialist_pay }}</td>
                            </tr>
                            <tr>
                                <td>Arrear</td>
                                <td align="center">{{ $salary->arrear }}</td>
                            </tr>
                            <tr @if(empty($salary->personal_pay)) style="display:none" @endif>
                                <td>Personal Pay</td>
                                <td align="center">{{ $salary->personal_pay }}</td>
                            </tr>
                            <tr>
                                <td> - </td>
                                <td align="center"> - </td>
                            </tr>
                            <tr>
                                <td> - </td>
                                <td align="center"> - </td>
                            </tr>
                            <tr>
                                <td>Gross:</td>
                                <td align="center">{{ $salary->gross }}</td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td style="border:none">
                    <div>
                        <table border="1" width="100%" style="border: none;">
                            <tr>
                                <th>Details</th>
                                <th>Amount</th>
                            </tr>
                            <tr>
                                <td>P.F.</td>
                                <td align="center">{{ $salary->cal_pf }}</td>
                            </tr>
                            <tr>
                                <td>Professional Tax</td>
                                <td align="center">{{ $salary->cal_ptax }}</td>
                            </tr>
                            <tr>
                                <td>Income Tax</td>
                                <td align="center">{{ $salary->incometax }}</td>
                            </tr>
                            <tr>
                                <td>Electricity</td>
                                <td align="center">{{ $salary->electricity }}</td>
                            </tr>
                            <tr @if(empty($salary->over_drawn)) style="display:none" @endif>
                                <td>Overdrawn</td>
                                <td align="center">{{ $salary->over_drawn }}</td>
                            </tr>
                            <tr>
                                <td>P.F. Rec.</td>
                                <td align="center">{{ $salary->pf_rec }}</td>
                            </tr>
                            <tr>
                                <td>Co-Operative</td>
                                <td align="center">{{ $salary->co_operative }}</td>
                            </tr>
                            <tr @if(empty($salary->bp_plus_npa)) style="display:none" @endif>
                                <td> - </td>
                                <td align="center"> - </td>
                            </tr>
                            <tr @if(empty($salary->specialist_pay)) style="display:none" @endif>
                                <td> - </td>
                                <td align="center"> - </td>
                            </tr>
                            <tr @if(empty($salary->personal_pay)) style="display:none" @endif>
                                <td> - </td>
                                <td align="center"> - </td>
                            </tr>
                            <tr>
                                <td>Total Deduction:</td>
                                <td align="center">{{ $salary->deduction }}</td>
                            </tr>
                            <tr>
                                <td>Net Pay:</td>
                                <td align="center">{{ $salary->net_pay }}</td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>

        <br/><br/>
        <table border="1" width="25%" style="border: none; float:right">
            <tr>
                <td align="center">Net Payable:</td>
                <td align="center">{{ $salary->net_pay }}</td>
            </tr>
        </table>

        <button style="position:absolute;left:47%;bottom:10px;" onclick="print()">Print</button>
        <button style="position:absolute;left:50%;bottom:10px;" onclick="gotoSalary()">Back</button>

        <script>
            function gotoSalary() {
                window.location="{{ route('dashboard') }}";
            }
        </script>
    </body>
</html>