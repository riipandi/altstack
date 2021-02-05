<section class="flex flex-col break-words bg-white shadow sm:border-1 sm:rounded-md">
    <header class="px-4 py-3 font-medium tracking-tight text-gray-700 bg-gray-200 sm:rounded-t-md">
        Change Password
    </header>

    <div class="w-full px-6 pt-1 pb-6">

        @if (session('status') == 'password-updated')
            <div class="px-2 py-3 mt-4 text-sm border-l-4 border-green-400 rounded-sm bg-green-50">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <x-heroicon-o-information-circle class="w-5 h-5 text-green-400" />
                    </div>
                    <div class="ml-2">
                        <p class="text-green-700">
                            {{ __('Password has been updated.') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('user-password.update') }}" class="w-full space-y-4">
            @csrf @method('PUT')
            <div class="w-full">
                <label for="current_password" class="px-1 text-sm font-medium tracking-tight">Current password</label>
                <div class="flex mt-1">
                    <div class="z-10 flex items-center justify-center w-10 pl-1 text-center pointer-events-none">
                        <x-heroicon-o-lock-open class="w-auto h-4 text-gray-400"/>
                    </div>
                    <input type="password" id="current_password" name="current_password" class="block w-full py-2 pl-10 pr-3 -ml-10 text-gray-600 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm" placeholder="Current password" required>
                    @error('current_password')<span class="mt-4 text-xs italic text-red-500">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="w-full">
                <label for="password" class="px-1 text-sm font-medium tracking-tight">New password</label>
                <div class="flex mt-1">
                    <div class="z-10 flex items-center justify-center w-10 pl-1 text-center pointer-events-none">
                        <x-heroicon-o-lock-closed class="w-auto h-4 text-gray-400"/>
                    </div>
                    <input type="password" id="password" name="password" class="block w-full py-2 pl-10 pr-3 -ml-10 text-gray-600 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm" placeholder="New password" required>
                    @error('password')<span class="mt-4 text-xs italic text-red-500">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="w-full">
                <label for="password_confirmation" class="px-1 text-sm font-medium tracking-tight">Confirm new password</label>
                <div class="flex mt-1">
                    <div class="z-10 flex items-center justify-center w-10 pl-1 text-center pointer-events-none">
                        <x-heroicon-o-lock-closed class="w-auto h-4 text-gray-400"/>
                    </div>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="block w-full py-2 pl-10 pr-3 -ml-10 text-gray-600 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm" placeholder="Confirm new password" required>
                    @error('password_confirmation')<span class="mt-4 text-xs italic text-red-500">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="flex flex-wrap justify-end pt-1">
                <button class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md shadow-sm bg-primary-600 hover:bg-primary-700 focus:outline-none disabled:opacity-25">
                    <x-heroicon-s-check-circle class="w-auto h-4 mr-2 -ml-1"/>
                    <span>{{ __('Update Password') }}</span>
                </button>
            </div>
        </form>
    </div>
</section>
