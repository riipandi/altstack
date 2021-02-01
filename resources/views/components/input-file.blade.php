<div x-data="{ {{ $name }}: null }" id="{{ $id }}-container" class="relative block w-full bg-white border-2 border-gray-300 border-dashed rounded-md appearance-none fileupload-container">
    <input type="file" x-ref="file" @change="{{ $name }} = $refs.file.files[0].name" id="{{ $id }}" name="{{ $name }}" class="absolute inset-0 w-full h-full p-0 m-0 outline-none opacity-0"
        x-on:change="{{ $name }} = $event.target.files;" x-on:dragover="$el.classList.add('active')" x-on:dragleave="$el.classList.remove('active')" x-on:drop="$el.classList.remove('active')"
    >
    <template x-if="{{ $name }} !== null">
        <div class="inline-flex flex-col items-center space-y-2">
            <div class="inline-flex flex-row items-center p-2 space-x-1 text-gray-500">
                <template x-if="$refs.file.files[0].type.includes('audio/')">
                    <x-heroicon-o-document class="w-auto h-5" />
                </template>
                <template x-if="$refs.file.files[0].type.includes('application/')">
                    <x-heroicon-o-document class="w-auto h-5" />
                </template>
                <template x-if="$refs.file.files[0].type.includes('image/')">
                    <x-heroicon-o-document class="w-auto h-5" />
                </template>
                <template x-if="$refs.file.files[0].type.includes('video/')">
                    <x-heroicon-o-document class="w-auto h-5" />
                </template>
                <span class="font-medium" x-text="$refs.file.files[0].name">Uploading</span>
                <span class="self-end text-sm" x-text="Math.fround(+$refs.file.files[0].size/1024/1000).toFixed(2) + 'MB'">...</span>
            </div>
        </div>
    </template>
    <template x-if="{{ $name }} === null">
        <div class="flex justify-center px-6 pt-5 pb-6 rounded-md">
            <div class="space-y-1 text-center">
                <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex text-sm tracking-tight text-gray-600">
                    <span class="relative font-medium bg-white rounded-md cursor-pointer text-primary-600 hover:text-primary-500 focus-within:outline-none">
                        Upload a file
                    </span>
                    <span class="pl-1">or drag and drop here</span>
                </div>
                <p class="text-xs text-gray-500">{{ $acceptFile }} max {{ $maxSize }} MB</p>
            </div>
        </div>
    </template>
</div>
