<div {!! $attributes->merge(['class' => 'bg-blue-50 border-l-4 border-blue-400 rounded-sm']) !!}>
    <div class="flex">
        <div class="flex-shrink-0">
            <x-heroicon-o-exclamation class="h-5 w-5 text-blue-400" />
        </div>
        <div class="ml-2">
            <p class="text-sm text-blue-700">{{ $slot }}</p>
        </div>
    </div>
</div>
