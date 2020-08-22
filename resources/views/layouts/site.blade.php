@extends('layouts.base')

@push('meta')
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
@endpush

@section('body')
<div class="h-screen bg-gray-100 leading-none">
    <main class="h-full">
        @yield('content')
    </main>
</div>
@endsection
