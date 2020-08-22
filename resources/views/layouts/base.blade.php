<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Site Meta --}}
    @hasSection('fulltitle')
        <title>@yield('fulltitle')</title>
    @else
        <title>@hasSection('title')@yield('title'){{ ' - ' }}@endif{{ config('app.name') }}</title>
    @endif
    @hasSection('description')<meta name="description" content="@yield('description')">@endif
    @hasSection('keywords')<meta name="keywords" content="@yield('keywords')">@endif
    {{-- Site icons --}}
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/x-icon" sizes="16x16 32x32" href="{{ asset('favicon.ico') }}">
    {{-- Stylesheets --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    @stack('meta')
</head>
<body class="antialiased">
    {{-- Main components --}}
    @yield('body')
    @stack('scriptsBefore')
    <script src="{{ asset('assets/app.js') }}"></script>
    @stack('scriptsAfter')
    {{-- // Main components --}}

    {{-- Alert --}}
    @if (session('resent'))
        <script>notyf.open({type: 'success', message: "{{ __('Link untuk verifikasi berhasil dikirim ke email Anda.') }}"});</script>
    @endif
    @if (session('verified'))
        <script>notyf.open({type: 'success', message: "Selamat datang di {{ config('app.name') }}! Email Anda sudah terverifikasi."});</script>
    @endif
    @if (($msg = session('status')) || ($msg = session('message')) || ($msg = session('info')))
        <script>notyf.open({ type: 'info', message: '{{ $msg }}' });</script>
    @endif
    @if ($msg = session('success'))<script>notyf.open({ type: 'success', message: '{{ $msg }}' });</script>@endif
    @if ($msg = session('warning'))<script>notyf.open({ type: 'warning', message: '{{ $msg }}' });</script>@endif
    @if ($msg = session('error'))<script>notyf.open({ type: 'error', message: '{{ $msg }}' });</script>@endif
    {{-- // Alert --}}
</body>
</html>
