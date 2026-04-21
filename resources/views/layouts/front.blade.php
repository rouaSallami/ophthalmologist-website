<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr. Ophtha</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-accent">

    @include('layouts.partials.front-navbar')
        @yield('content')
    @include('layouts.partials.footer')

</body>
</html>