    <!-- All JavaScript Files -->
    <script src="{{ asset('/assets/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/slideToggle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/internet-status.js') }}"></script>
    <script src="{{ asset('/assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('/assets/js/baguetteBox.min.js') }}"></script>
    <script src="{{ asset('/assets/js/rangeslider.min.js') }}"></script>
    <script src="{{ asset('/assets/js/vanilla-dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/index.js') }}"></script>
    <script src="{{ asset('/assets/js/magic-grid.min.js') }}"></script>
    <script src="{{ asset('/assets/js/dark-rtl.js') }}"></script>
    <script src="{{ asset('/assets/js/active.js') }}"></script>
    <!-- toastr -->
    <script src="{{ asset('/assets/js/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('/assets/js/toastr/toastr.init.js') }}"></script>
    <!-- Sweetalert -->
    <script src="{{ asset('/assets/js/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/sweetalert2/sweet-alerts.init.js') }}"></script>

    <!-- PWA -->
    <script src="{{ asset('/assets/js/pwa.js') }}"></script>
    <script>
        toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 5000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
	
                    @if (Session::has('message') )
                            var type="{{ Session::get('alert-type', 'info') }}";

                            switch (type)
                            {
                                case'info':
                                    toastr.info("{{ Session::get('message') }}");
                                break;

                                case'success':
                                    toastr.success("{{ Session::get('message') }}");
                                break;

                                case'warning':
                                    toastr.warning("{{ Session::get('message') }}");
                                break;

                                case'error':
                                    toastr.error("{{ Session::get('message') }}");
                                break;
                            }
                    @endif
    </script>
@yield('script')