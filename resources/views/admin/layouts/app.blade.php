<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from kanakku.dreamguystech.com/template-html/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Aug 2021 11:57:41 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ config('app.name') }}</title>

    <link rel="shortcut icon" href="{{ asset('assets\img\Logo.svg') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('') }}assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('') }}assets/css/style.css">
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
</head>

<body>

    <div class="main-wrapper">

        @include('admin.layouts._navbar')


        @include('admin.layouts._sidebar')


        <div class="page-wrapper">
            <div class="content container-fluid">
                <div id="app">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>


    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('') }}assets/js/jquery-3.5.1.min.js"></script>

    {{-- <script src="{{ asset('') }}assets/js/popper.min.js"></script> --}}
    <script src="{{ asset('') }}assets/js/bootstrap.min.js"></script>


    <script src="{{ asset('') }}assets/js/feather.min.js"></script>

    <script src="{{ asset('') }}assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="{{ asset('') }}assets/js/script.js"></script>
</body>

<!-- Mirrored from kanakku.dreamguystech.com/template-html/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Aug 2021 11:57:41 GMT -->

</html>
