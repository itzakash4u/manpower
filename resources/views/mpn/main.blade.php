@include('mpn.includes.header')
@include('mpn.includes.sidebar')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

        @yield('main-content')


        </div> <!-- container -->

    </div> <!-- content -->

    @include('mpn.includes.footer')