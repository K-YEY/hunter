<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/ico.png') }}" type="image/png">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>{{ $title ?? 'Remote Hire' }}</title>
    <link rel="stylesheet" href="{{ asset('assets/scss/main.css') }}">
    @isset($form)
    <link rel="stylesheet" href="assets/css/datepicker.material.css">

    @endisset
</head>

<body {{ isset($body) ? '' : 'class="body"' }}>
    <x-layout.header></x-layout.header>
    {{ $slot }}
    <x-layout.footer></x-layout.footer>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/splide.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @isset($loop)
    <script>
        var splide = new Splide('.splide', {
           type: 'loop',
           perPage: 5,
           boolean: false,
           focus: 'center',
        });

        splide.mount();
     </script>
    @endisset
    @isset($form)
    <script src="assets/js/datepicker.js"></script>
    <script>
        var constrained = new Datepicker('#constrained', {
            showPreviousNext: true,
            prevArrow: '&lt;',
            nextArrow: '&gt;',
        });
    </script>
    @endisset
    @isset($apply)
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#hear_us').on('change', function() {
                if ($(this).val() === 'other') {
                    $('#other').show();
                } else {
                    $('#other').hide();
                }
            });
        });
    </script>

    @endisset

</body>
</html>
