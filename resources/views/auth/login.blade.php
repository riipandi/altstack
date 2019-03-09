@extends('layouts.auth')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-xs">

                @include('layouts.alert')

                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                    <div class="font-semibold bg-grey-lightest text-grey-dark py-5 mb-0 rounded-t text-center">SIGN IN</div>

                    <form class="w-full p-6" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="flex flex-wrap mb-6">
                            <label for="identity" class="block text-grey-darker text-sm font-bold mb-2">
                                {{ __('E-Mail or Username') }}:
                            </label>

                            <input id="identity" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('identity') ? ' border-red' : '' }}" name="identity" value="{{ old('identity') }}" required autofocus>
                            @if ($errors->has('identity'))
                                <p class="text-red text-xs italic mt-4">{{ $errors->first('identity') }}</p>
                            @endif
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="password" class="block text-grey-darker text-sm font-bold mb-2">
                                {{ __('Password') }}:
                            </label>

                            @if (Route::has('password.request'))
                                <a class="text-xs text-blue hover:text-blue-dark whitespace-no-wrap no-underline ml-auto focus:outline-none" href="{{ route('password.request') }}" tabindex="-1">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif

                            <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('password') ? ' border-red' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <p class="text-red text-xs italic mt-4">{{ $errors->first('password') }}</p>
                            @endif
                        </div>

                        <div class="flex flex-wrap items-center">
                            <button type="submit" class="w-full bg-blue hover:bg-blue-dark text-white py-3 px-8 rounded focus:outline-none focus:shadow-outline font-semibold">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('register'))
                                <p class="w-full text-xs text-center text-grey-dark mt-8 -mb-1">
                                    Don't have an account?
                                    <a class="text-blue hover:text-blue-dark no-underline" href="{{ route('register') }}">Sign Up</a>
                                </p>
                            @endif
                        </div>
                    </form>

                    @if (config('auth.social') == true)
                    <div class="hr-text mt-4 mx-6" data-content="or sign in with"></div>
                    <div class="w-full p-6">
                        <button type="submit" class="w-full text-white py-3 mt-2 rounded outline-none bg-red hover:bg-red-dark">
                            <i class="fab fa-fw fa-google mr-2"></i>Google
                        </button>
                        <button type="submit" class="w-full text-white py-3 mt-2 rounded outline-none bg-blue hover:bg-blue-dark">
                            <i class="fab fa-fw fa-facebook mr-2"></i>Facebook
                        </button>
                        <button type="submit" class="w-full text-white py-3 mt-2 rounded outline-none bg-black hover:bg-grey-darkest">
                            <i class="fab fa-fw fa-github-alt mr-2"></i>Github
                        </button>
                    </div>
                    @endIf

                </div>
            </div>
        </div>
    </div>
@endsection
