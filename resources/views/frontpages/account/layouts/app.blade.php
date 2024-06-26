<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- LOCAL CSS --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/customaccount.css')}}">
    <link rel="stylesheet" href="{{asset('css/customfonts.css')}}">
    <link rel="stylesheet" href="{{ asset('css/register/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sign-in/sign-in.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome-5.0.1/css/all.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('mazer/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    {{-- lOGO --}}
    <link rel="icon" href="{{asset('images/logo2.png')}}">

    {{-- AOS --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    @stack('css')


    <title>{{!empty($title_page) ? $title_page:''}} ITATS LANGUAGE CENTER</title>

    <!-- Sweet Alert -->
    <script src="{{asset('mazer/assets/js/extensions/sweetalert2.js')}}"></script>
    <script src="{{asset('mazer/assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>

    {{-- Notif CSS --}}
    <link href="{{ asset('js/custom/snackbar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/custom/bootstrap-notifications.min.css') }}" rel="stylesheet">
</head>

<body>
    @yield('content')

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{asset('argon/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}">
    </script>
    <!-- Optional JS -->
    <script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <!-- Argon JS -->
    <script src="{{asset('argon/assets/js/argon.js?v=1.2.0')}}"></script>

    {{-- Custom and Notif --}}
    




    <script>
        AOS.init();
    </script>

    @stack('js')

    <script src="{{asset('js/custom/custom.js')}}"></script>
    <script src="{{asset('js/custom/noty.min.js')}}"></script>
    <script src="{{ asset('js/custom/snackbar.min.js') }}"></script>
</body>

</html>