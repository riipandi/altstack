@extends('layouts.base')

@push('meta')
    <meta name="robots" content="all, noindex, nofollow">
    <meta name="googlebot" content="all, noindex, nofollow">
@endpush

@section('body')
<div class="flex flex-col justify-center font-sans min-h-screen py-12 bg-gray-900 sm:px-6 lg:px-8">
    @yield('content')
</div>
@endsection
