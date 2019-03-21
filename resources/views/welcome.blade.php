@extends('layouts.auth')

@section('content')
    <div class="container items-center">

        @if(Route::has('login'))
            <div class="absolute pin-t pin-r mt-8 mr-16">
                @auth
                    <a href="{{ route('dashboard') }}" class="no-underline hover:text-blue-lighter text-sm font-semibold text-white uppercase">{{ __('Dashboard') }}</a>
                    <a href="{{ route('logout') }}" class="no-underline hover:text-blue-lighter text-sm font-semibold text-white uppercase ml-3">{{ __('Sign Out') }}</a>
                @else
                    <a href="{{ route('login') }}" class="no-underline hover:text-blue-lighter text-sm font-semibold text-white uppercase">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="no-underline hover:text-blue-lighter text-sm font-semibold text-white uppercase ml-3">{{ __('Register') }}</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="w-full mx-auto text-center text-5xl mb-8">
            <h1 class="text-white">{{ config('app.name'), 'Laravel' }}</h1>
        </div>

        <div class="w-full text-center">
            <a class="no-underline hover:text-blue-lighter text-lg text-white" href="//laravel.com/docs">Documentation</a>
            <a class="no-underline hover:text-blue-lighter text-lg text-white ml-3" href="//laracasts.com">Laracasts</a>
            <a class="no-underline hover:text-blue-lighter text-lg text-white ml-3" href="//laravel-news.com">News</a>
            <a class="no-underline hover:text-blue-lighter text-lg text-white ml-3" href="//nova.laravel.com">Nova</a>
            <a class="no-underline hover:text-blue-lighter text-lg text-white ml-3" href="//forge.laravel.com">Forge</a>
            <a class="no-underline hover:text-blue-lighter text-lg text-white ml-3" href="//github.com/laravel/laravel">Github</a>
        </div>

    </div>
@endsection
