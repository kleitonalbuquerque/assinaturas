    <!-- jquery latest version -->
    <script src="{{URL::asset('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{URL::asset('assets/js/popper.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/metisMenu.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.slicknav.min.js')}}"></script>
    <!-- bootstrp inc jquery -->
    <script type="text/javascript">
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    @stack('scripts')
    <!-- others plugins -->
    <script src="{{URL::asset('assets/js/plugins.js')}}"></script>
    <script src="{{URL::asset('assets/js/scripts.js')}}"></script>