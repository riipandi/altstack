@push('meta')
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
@endpush

<x-base-layout title="{{ $title }}">
    <div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center p-5">
        {{ $slot }}
    </div>
</x-base-layout>
