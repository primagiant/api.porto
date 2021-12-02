<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Auth</title>
    @include('auth.layouts._css')
</head>

<body>

    @yield('content')

    @include('auth.layouts._js')
</body>

</html>
