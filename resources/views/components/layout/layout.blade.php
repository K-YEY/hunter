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
        <link rel="stylesheet" href="{{ asset('assets/css/datepicker.material.css') }}">
    @endisset
</head>

<body {{ isset($body) ? '' : 'class="body"' }}>
    <x-layout.header></x-layout.header>
    {{ $slot }}
    <x-layout.footer></x-layout.footer>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/splide.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
        <script src="{{ asset('assets/js/datepicker.js') }}"></script>
        <script>
            var today = new Date();

            var constrained = new Datepicker('#constrained', {
                showPreviousNext: true,
                prevArrow: '&lt;',
                nextArrow: '&gt;',
                disable: [today] // Disable today's date
            });
        </script>
        <script>
            $(document).ready(function() {
                function reformatDate(dateStr) {
                    // Create a new Date object from the input date string
                    let dateObj = new Date(dateStr);

                    // Get the year, month, and day from the Date object
                    let year = dateObj.getFullYear();
                    let month = ('0' + (dateObj.getMonth() + 1)).slice(-
                        2); // Months are 0-based in JavaScript, so we add 1
                    let day = ('0' + dateObj.getDate()).slice(-2);

                    // Return the formatted date in YYYY-MM-DD format
                    return `${year}-${month}-${day}`;
                }

                // Handle time selection
                $('.timeBox').on('click', function() {
                    $('.timeBox').removeClass('selected');
                    $(this).addClass('selected');

                    // Set the selected time in the hidden input
                    $('#meeting_time').val($(this).data('time'));
                });

                // Handle form submission via AJAX
                $('#scheduleForm').on('submit', function(e) {
                    e.preventDefault(); // Prevent the form from submitting normally

                    let meetingTime = $('#meeting_time').val();
                    let meetingDate = $('#constrained').val(); // Assuming this gets the date

                    if (meetingTime === '') {
                        alert('Please select a meeting time.');
                        return;
                    }

                    if (meetingDate === '') {
                        alert('Please select a meeting date.');
                        return;
                    }

                    meetingDate = reformatDate(meetingDate);
                    var now = new Date();

                    if (meetingDate <= now.toISOString().slice(0, 10)) {
                        alert('Please select a future date.');
                        return;
                    }
                    var fullTime = meetingDate + ' ' + meetingTime;

                    // Send AJAX request to server
                    $.ajax({
                        url: "{{ route('home.scheduleMeeting') }}", // Properly enclose Blade route with quotes
                        type: 'POST',
                        contentType: "application/json", // Correct Content-Type casing
                        data: JSON.stringify({ // Properly stringify the data for JSON
                            _token: $('input[name="_token"]').val(),
                            meeting_datetime: fullTime,
                        }),
                        success: function(response) {
                            window.location.href =
                            "{{ route('home.done') }}"; // Properly enclose Blade route with quotes
                        },
                        error: function(response) {
                            alert('Error scheduling the meeting.');
                            console.log(response);                        }
                    });

                });
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
