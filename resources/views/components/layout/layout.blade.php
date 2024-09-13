<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    @isset($form)
    <script src="assets/js/datepicker.js"></script>
    <script>
        var constrained = new Datepicker('#constrained', {

            // 10 days in the past
            min: (function () {
                var date = new Date();
                date.setDate(date.getDate() - 10);
                return date;
            })(),

            // 10 days in the future
            max: (function () {
                var date = new Date();
                date.setDate(date.getDate() + 10);
                return date;
            })()
        });
    </script>
    @endisset
</body>

</html>
