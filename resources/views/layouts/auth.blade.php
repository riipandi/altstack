@extends('layouts.base')

@push('meta')
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
@endpush

@section('body')
    {{-- You can add `mode-dark` class to enable dark mode --}}
    <div class="text-gray-900 dark:text-gray-100 bg-gray-100 dark:bg-gray-900 font-sans">
        {{ $slot }}
    </div>

    @stack('scriptsBefore')
    <script src="{{ asset('assets/app.js') }}"></script>
    @stack('scriptsAfter')
@endsection
