
                <footer class="footer">
                    {{ date('Y') }} © Manpower Nation
                </footer>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="{{asset('ui/js/jquery.min.js')}}"></script>
        <script src="{{asset('ui/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('ui/js/modernizr.min.js')}}"></script>
        <script src="{{asset('ui/js/detect.js')}}"></script>
        <script src="{{asset('ui/js/fastclick.js')}}"></script>
        <script src="{{asset('ui/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('ui/js/jquery.blockUI.js')}}"></script>
        <script src="{{asset('ui/js/waves.js')}}"></script>
        <script src="{{asset('ui/js/wow.min.js')}}"></script>
        <script src="{{asset('ui/js/jquery.nicescroll.js')}}"></script>
        <script src="{{asset('ui/js/jquery.scrollTo.min.js')}}"></script>

        @yield('extra-scripts')

        <script src="{{asset('ui/js/app.js')}}"></script>

        @yield('add-scripts')

    </body>
</html>