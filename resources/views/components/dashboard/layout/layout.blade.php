<!DOCTYPE html>
<html lang="en">
<x-dashboard.layout.head title="{{ $title }}"></x-dashboard.layout.head>

<body>
    @if (!isset($navbar))
        <x-dashboard.layout.navbar></x-dashboard.layout.navbar>
    @endif

    <main class="{{ isset($mainClass) ? '' : 'content' }}">
        @if (!isset($navbar))
            <x-dashboard.layout.nav></x-dashboard.layout.nav>
        @endif
        {{ $slot }}
        @if (!isset($navbar))
            <x-dashboard.layout.footer></x-dashboard.layout.footer>
        @endif

    </main>

    <!-- Core -->
    <script src="{{ asset('assets-dashboard/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-dashboard/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Vendor JS -->
    <script src="{{ asset('assets-dashboard/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>

    <!-- Slider -->
    <script src="{{ asset('assets-dashboard/vendor/nouislider/distribute/nouislider.min.js') }}"></script>

    <!-- Smooth scroll -->
    <script src="{{ asset('assets-dashboard/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>

    <!-- Charts -->
    <script src="{{ asset('assets-dashboard/vendor/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('assets-dashboard/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}">
    </script>

    <!-- Datepicker -->
    <script src="{{ asset('assets-dashboard/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

    <!-- Sweet Alerts 2 -->
    <script src="{{ asset('assets-dashboard/vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js')}}"></script>

    <!-- Vanilla JS Datepicker -->
    <script src="{{ asset('assets-dashboard/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

    <!-- Notyf -->
    <script src="{{ asset('assets-dashboard/vendor/notyf/notyf.min.js') }}"></script>

    <!-- Simplebar -->
    <script src="{{ asset('assets-dashboard/vendor/simplebar/dist/simplebar.min.js') }}"></script>

    <!-- Github buttons -->
    <script async defer src="{{ asset('assets-dashboard/vendor/buttons/buttons.js') }}"></script>

    <!-- Volt JS -->
    <script src="{{ asset('assets-dashboard/assets/js/volt.js') }}"></script>

    <!--Custom Js-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function previewImage(input, target) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(target).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).on('change', '.image-input', function() {
            var targetImage = $(this).data('target');
            previewImage(this, targetImage);
        });
    </script>
 
</body>

</html>
