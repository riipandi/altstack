<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Title and meta -->
        <title>{{ $title ?? config('app.name') }}</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <link rel="icon" type="image/x-icon" sizes="16x16 32x32" href="{{ asset('favicon.ico') }}">
        <!-- Styles -->
        <link rel="preload" as="style" href="{{ asset('assets/fontface.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/fontface.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
        @stack('meta') <!-- Scripts -->
        <script src="{{ asset('assets/app.js') }}" defer></script>
        @stack('scriptHead')
    </head>
    <body class="font-sans antialiased">
        {{ $slot }} @stack('scriptBody')
    </body>
</html>
