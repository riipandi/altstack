@extends('layouts.auth')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                    <div class="font-semibold bg-grey-lightest text-grey-dark py-5 mb-0 rounded-t text-center">SIGN UP</div>
                    <form class="w-full p-6" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-5">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="first_name" class="block text-grey-darker text-sm font-bold mb-2">{{ __('First Name') }}</label>
                                <input id="first_name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('first_name') ? ' border-red' : '' }}" name="first_name" value="{{ old('first_name') }}" required>
                                @if ($errors->has('first_name'))
                                    <p class="text-red text-xs italic mt-3">{{ $errors->first('first_name') }}</p>
                                @endif
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label for="last_name" class="block text-grey-darker text-sm font-bold mb-2">{{ __('Last Name') }}</label>
                                <input id="last_name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('last_name') ? ' border-red' : '' }}" name="last_name" value="{{ old('last_name') }}" required>
                                @if ($errors->has('last_name'))
                                    <p class="text-red text-xs italic mt-3">{{ $errors->first('last_name') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-5">
                            <div class="w-full px-3">
                                <label for="email" class="block text-grey-darker text-sm font-bold mb-2">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('email') ? ' border-red' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <p class="text-red text-xs italic mt-3">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-5">
                            <div class="w-full px-3">
                                <label for="username" class="block text-grey-darker text-sm font-bold mb-2">{{ __('Username') }}</label>
                                <input id="username" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('username') ? ' border-red' : '' }}" name="username" value="{{ old('username') }}" required>
                                @if ($errors->has('username'))
                                    <p class="text-red text-xs italic mt-3">{{ $errors->first('username') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-5">
                            <div class="w-full px-3">
                                <label for="password" class="block text-grey-darker text-sm font-bold mb-2">{{ __('Password') }}</label>
                                <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('password') ? ' border-red' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <p class="text-red text-xs italic mt-3">{{ $errors->first('password') }}</p>
                                @else
                                  <p class="text-grey-dark text-xs italic mt-3">Make it as long and as crazy as you'd like</p>
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-5">
                            <div class="w-full px-3">
                                <label for="password_confirmation" class="block text-grey-darker text-sm font-bold mb-2">{{ __('Confirm Password') }}</label>
                                <input id="password_confirmation" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit" class="w-full align-middle text-center select-none border font-normal whitespace-no-wrap py-3 px-4 rounded text-base leading-normal no-underline text-blue-lightest bg-blue hover:bg-blue-light font-semibold">
                                {{ __('Register') }}
                            </button>

                            <p class="w-full text-xs text-center text-grey-dark mt-6 -mb-1">
                                Already have an account?
                                <a class="text-blue hover:text-blue-dark no-underline" href="{{ route('login') }}">Sign In</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
