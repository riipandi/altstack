@props(['id'])

@error($id ?? '')
    <span class="px-1 mt-2 text-xs text-red-500">{{ $message }}</span>
@enderror
