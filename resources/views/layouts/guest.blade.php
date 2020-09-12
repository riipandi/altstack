@extends('layouts.base')

@push('meta')
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
@endpush

@section('body')
    <div class="mode-dark bg-gray-100 dark:bg-gray-900 font-sans">
        {{ $slot }}
    </div>
@endsection
