<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from kanakku.dreamguystech.com/template-html/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Aug 2021 11:57:41 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ config('app.name') }}</title>

    @include('admin.layouts._css')
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

    @include('admin.layouts._js')
</body>

</html>
