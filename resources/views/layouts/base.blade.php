<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- Site Title --}}
        @hasSection('fulltitle')
            <title>@yield('fulltitle')</title>
        @else
            <title>@hasSection('title')@yield('title'){{ ' - ' }}@endif{{ config('app.name') }}</title>
        @endif
        {{-- Site Meta and description --}}
        @hasSection('description')<meta name="description" content="@yield('description')">@endif
        @hasSection('keywords')<meta name="keywords" content="@yield('keywords')">@endif
        {{-- Site icons --}}
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <link rel="icon" type="image/x-icon" sizes="16x16 32x32" href="{{ asset('favicon.ico') }}">
        {{-- Stylesheets --}}
        {{-- <link rel="stylesheet" href="https://rsms.me/inter/inter.css"> --}}
        <link rel="stylesheet" href="{{ asset('assets/fontface.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
        @stack('meta')
    </head>
    <body class="antialiased">
        @yield('body')
    </body>
</html>
