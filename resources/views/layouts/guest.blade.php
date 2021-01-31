@push('meta')
<meta name="robots" content="index, follow">
<meta name="googlebot" content="index, follow">
@endpush

<x-base-layout title="{{ $title }}">
    <div class="flex flex-col justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
        <header></header>
        <main class="flex-grow">
            {{ $slot }}
        </main>
        <footer></footer>
    </div>
</x-base-layout>
