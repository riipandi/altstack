<section class="flex flex-col break-words bg-white shadow sm:border-1 sm:rounded-md">
    <header class="px-4 py-3 font-medium tracking-tight text-gray-700 bg-gray-200 sm:rounded-t-md">
        Update Profile information
    </header>

    <div class="w-full px-6 pt-1 pb-6">
        @if (session('status') == 'profile-information-updated')
            <div class="px-2 py-3 mt-4 text-xs border-l-4 border-green-400 rounded-sm bg-green-50">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <x-heroicon-o-information-circle class="w-5 h-5 text-green-400" />
                    </div>
                    <div class="ml-2">
                        <p class="text-xs text-green-700">
                            {{ __('User profile has been updated.') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('user-profile-information.update') }}" class="w-full space-y-4">
            @csrf @method('PUT')
            <div class="w-full">
                <label for="name" class="px-1 text-sm font-medium tracking-tight">Name</label>
                <div class="flex mt-1">
                    <div class="z-10 flex items-center justify-center w-10 pl-1 text-center pointer-events-none">
                        <x-heroicon-o-user-circle class="w-auto h-4 text-gray-400"/>
                    </div>
                    <input type="text" id="name" name="name" value="{{ old('name') ?? auth()->user()->name }}" class="w-full py-2 pl-10 pr-3 -ml-10 text-sm text-gray-900 border-2 border-gray-200 rounded-md outline-none focus:border-primary-500" placeholder="Full name" required>
                    @error('name')<span class="mt-4 text-xs italic text-red-500">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="w-full">
                <label for="email" class="px-1 text-sm font-medium tracking-tight">Email</label>
                <div class="flex mt-1">
                    <div class="z-10 flex items-center justify-center w-10 pl-1 text-center pointer-events-none">
                        <x-heroicon-o-user-circle class="w-auto h-4 text-gray-400"/>
                    </div>
                    <input type="text" id="email" name="email" value="{{ old('email') ?? auth()->user()->email }}" class="w-full py-2 pl-10 pr-3 -ml-10 text-sm text-gray-900 border-2 border-gray-200 rounded-md outline-none focus:border-primary-500" placeholder="Full name" required>
                    @error('email')<span class="mt-4 text-xs italic text-red-500">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="flex flex-wrap justify-end pt-1">
                <button class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md shadow-sm bg-primary-600 hover:bg-primary-700 focus:outline-none disabled:opacity-25">
                    <x-heroicon-s-check-circle class="w-auto h-4 mr-2 -ml-1"/>
                    <span>{{ __('Update Profile') }}</span>
                </button>
            </div>
        </form>
    </div>
</section>
