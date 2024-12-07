@extends('mpn.front.layout')

@section('content')

    <!-- Page Title Start -->
    <section class="page-title title-bg10">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Job Guide for Everyone</h2>
                <ul>
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li>Job ID</li>
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
            <h1>Job Guide</h1>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th>CATEGORY</th>
                            <th>NORMAL</th>
                            <th>HEAVY DUTY</th>
                            <th>WAITING TIME</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td>Electricity</td>
                            <td>Any installing or installing, Light appliances, fan all kind, room electric board, etc. </td>
                            <td>Any installing or installing, AC, Geyser, mixer, chimney, air-cooler, Main board, Water pump, etc.</td>
                            <td>30 mins free time to buy the materials, then extra waiting/idle time Rs 200/ Hr </td>
                        </tr>
                        <tr>
                            <td>Plumbing</td>
                            <td>Any installing or installing, taps shower bathroom fittings, etc.</td>
                            <td>Any installing or installing, Tank, boring, main line work, HP pump, WC work, Intelligent bath wares, bath-tub, etc.</td>
                            <td>30 mins free time to buy the materials, then extra waiting/idle time Rs 200/ Hr</td>
                        </tr>
                        <tr>
                            <td>Painting</td>
                            <td>Plain Painting on wall 1x cleaning 2x paint coat, window/door/ceiling painting, etc.</td>
                            <td>Hydride painting job- wallpaper, duo- color or tri-color painting, design work painting, 2x coat paint, etc.  </td>
                            <td>1Hour free time to buy the materials, then extra waiting/idle time Rs 200/ Hr</td>
                        </tr>
                        <tr>
                            <td>Cooking </td>
                            <td>Cooking time start with extended 30 mins for gathering ingredients then hour starts.</td>
                            <td>N.A</td>
                            <td>N.A</td>
                        </tr>
                        <tr>
                            <td>Cleaning </td>
                            <td>Home cleaning or office cleaning- Dry cleaning, wet wash & disinfected wash.</td>
                            <td>N.A</td>
                            <td>30 mins free time to buy the materials, then extra waiting/idle time Rs 200/ Hr</td>
                        </tr>
                        <tr>
                            <td>Shifting & lifting</td>
                            <td>Home shifting or office shifting- the time required to get shifting in number of locations.</td>
                            <td>N.A</td>
                            <td>30 mins free time to buy the materials, then extra waiting/idle time Rs 200/ Hr</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class="small text-white mt-4">** Manpower Nation provides services any assignments required materials excluding. If customer wishes to buy him they can or if they want the worker/employee to buy the materials then that will be between the customer and worker/employee.</p>
        </div>
        <div class="container pt-4 pb-4">
            <h1>Job Names & ID List</h1>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Job Name</th>
                            <th>Job ID</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td>Painting</td>
                            <td>MPNJPT-00000-00000-00000</td>
                        </tr>
                        <tr>
                            <td>Cooking</td>
                            <td>MPNJCK-00000-00000-00000</td>
                        </tr>
                        <tr>
                            <td>Plumbing</td>
                            <td>MPNJPL-00000-00000-00000</td>
                        </tr>
                        <tr>
                            <td>Lifting Shifting</td>
                            <td>MPNJLS-00000-00000-00000</td>
                        </tr>
                        <tr>
                            <td>Cleaning</td>
                            <td>MPNJCL-00000-00000-00000</td>
                        </tr>
                        <tr>
                            <td>Electricity</td>
                            <td>MPNJEC-00000-00000-00000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@stop