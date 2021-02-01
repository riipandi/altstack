@props(['errors'])

@if ($errors->any())
<div {!! $attributes->merge(['class' => 'bg-red-50 border-l-4 border-red-400 rounded-sm']) !!}>
    <div class="mb-2 font-medium text-red-600">
        {{ __('Whoops! Something went wrong.') }}
    </div>
    <ul class="text-red-600 list-disc list-inside">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
