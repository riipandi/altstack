@extends('layouts.auth')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">

                @if (session('status'))
                    <div class="text-sm border border-t-8 rounded text-green-darker border-green-dark bg-green-lightest px-3 py-4 mb-4" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                    <div class="font-semibold bg-grey-lightest text-grey-dark py-5 mb-0 rounded-t text-center">PASSWORD RESET</div>

                    <form class="w-full p-6" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="block text-grey-darker text-sm font-bold mb-2">
                                {{ __('E-Mail Address') }}:
                            </label>

                            <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('email') ? ' border-red' : '' }}" name="email" value="{{ old('email') }}" required>
                            @error('email')<p class="text-red text-xs italic mt-4">{{ $message }}</p>@enderror
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit" class="bg-blue w-full hover:bg-blue-dark text-white py-3 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ __('Send Magic Link') }}
                            </button>

                            <p class="w-full text-xs text-center text-grey-dark mt-8 -mb-1">
                                <a class="text-blue hover:text-blue-dark no-underline" href="{{ route('login') }}">{{ __('Back to login') }}</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
