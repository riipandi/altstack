@push('meta')
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
@endpush

<x-base-layout title="{{ $title }}">
    <div class="flex flex-col items-center justify-center min-h-screen p-5 bg-gray-100 dark:bg-gray-900 min-w-screen">
        {{ $slot }}
    </div>
</x-base-layout>
