@extends('layouts.base')

@push('meta')
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
@endpush

@section('body')
    {{-- You can add `mode-dark` class to enable dark mode --}}
    <div class="text-gray-900 dark:text-gray-100 bg-gray-100 dark:bg-gray-900 font-sans">
        {{ $slot }}
        dad
    </div>

    @stack('scriptsBefore')
    <script src="{{ asset('assets/app.js') }}"></script>
    @stack('scriptsAfter')
@endsection
