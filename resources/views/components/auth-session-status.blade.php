@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'mt-6 py-3 px-2 text-xs bg-green-50 border-l-4 border-green-400 rounded-sm']) }}>
        <div class="flex">
            <div class="flex-shrink-0">
                <x-heroicon-o-information-circle class="w-5 h-5 text-green-400" />
            </div>
            <div class="ml-2">
                <p class="text-sm text-green-700">
                    {{ $status }}
                </p>
            </div>
        </div>
    </div>
@endif
