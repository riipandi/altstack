<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="bg-blue h-screen font-sans antialiased">
    <div id="app" class="container mx-auto p-4 h-full flex justify-center items-center">
        @include('layouts.toastr')
        @yield('content')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
