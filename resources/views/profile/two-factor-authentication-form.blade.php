<section class="flex flex-col break-words bg-white shadow sm:border-1 sm:rounded-md">
    <header class="px-4 py-3 font-medium tracking-tight text-gray-700 bg-gray-200 sm:rounded-t-md">
        Two Factor Authentication
    </header>

    <div class="w-full p-6">
        @if (session('status') == 'two-factor-authentication-enabled')
            <div class="px-2 py-3 text-xs border-l-4 border-green-400 rounded-sm bg-green-50">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <x-heroicon-o-information-circle class="w-5 h-5 text-green-400" />
                    </div>
                    <div class="ml-2">
                        <p class="text-xs text-green-700">
                            {{ __('Two factor authentication has been enabled.') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        @if (session('status') == 'two-factor-authentication-disabled')
            <div class="px-2 py-3 mb-4 text-xs border-l-4 border-green-400 rounded-sm bg-green-50">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <x-heroicon-o-information-circle class="w-5 h-5 text-green-400" />
                    </div>
                    <div class="ml-2">
                        <p class="text-xs text-green-700">
                            {{ __('Two factor authentication has been disabled.') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        @if(! auth()->user()->two_factor_secret)
            {{-- Enable 2FA --}}
            <form method="POST" action="{{ url('user/two-factor-authentication') }}"> @csrf
                <button type="submit" class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md shadow-sm bg-primary-600 hover:bg-primary-700 focus:outline-none disabled:opacity-25">
                    {{ __('Enable Two-Factor') }}
                </button>
            </form>
        @else
            @if(session('status') == 'two-factor-authentication-enabled')
                {{-- Show SVG QR Code, After Enabling 2FA --}}
                <div class="mt-4">
                    {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application.') }}
                </div>
                <div class="flex items-center justify-center my-6">
                    {!! auth()->user()->twoFactorQrCodeSvg() !!}
                </div>
            @endif

            {{-- Show 2FA Recovery Codes --}}
            <div class="text-gray-600">
                {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
            </div>

            <div class="px-5 py-4 my-2 mt-4 font-mono leading-7 bg-gray-100 rounded">
                @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                    <div>{{ $code }}</div>
                @endforeach
            </div>

            <div class="flex justify-end mt-6 space-x-2">
                {{-- Regenerate 2FA Recovery Codes --}}
                <form method="POST" action="{{ url('user/two-factor-recovery-codes') }}">
                    @csrf
                    <button type="submit" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md shadow-sm bg-primary-600 hover:bg-primary-700 focus:outline-none disabled:opacity-25">
                        <x-heroicon-s-refresh class="w-auto h-4 mr-2 -ml-1"/>
                        {{ __('Regenerate Codes') }}
                    </button>
                </form>

                {{-- Disable 2FA --}}
                <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                    @csrf @method('DELETE')
                    <button type="submit" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md shadow-sm bg-primary-600 hover:bg-primary-700 focus:outline-none disabled:opacity-25">
                        <x-heroicon-s-shield-exclamation class="w-auto h-4 mr-2 -ml-1"/>
                        {{ __('Disable Two-Factor') }}
                    </button>
                </form>
            </div>
        @endif
    </div>
</section>
