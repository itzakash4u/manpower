@include('jnmh.includes.header')
@include('jnmh.includes.sidebar')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

        @yield('main-content')


        </div> <!-- container -->

    </div> <!-- content -->

    @include('jnmh.includes.footer')