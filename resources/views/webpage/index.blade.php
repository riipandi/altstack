@extends('layouts.site')
@section('fulltitle', 'Alt Stack - An alternative full-stack development solution')

@section('content')
    <div class="flex flex-col">
        @if(Route::has('login'))
            <div class="absolute top-0 right-0 mt-4 mr-4">
                @auth
                    <a href="{{ route('home') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">
                        <x-heroicon-o-home class="w-6 h-6 text-gray-500"/>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase pr-6">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Register') }}</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="min-h-screen flex items-center justify-center">
            <div class="flex flex-col justify-around h-full">
                <div>
                    <h1 class="text-gray-600 text-center font-medium tracking-wider text-5xl mb-10">
                        {{ config('app.name', 'Laravel') }}
                    </h1>
                    <ul class="list-reset">
                        <li class="inline pr-8">
                            <a href="https://laravel.com/docs" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Laravel Documentation">Laravel Docs</a>
                        </li>
                        <li class="inline pr-8">
                            <a href="https://github.com/alpinejs/alpine" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Alpine.js">Alpine.js</a>
                        </li>
                        <li class="inline pr-8">
                            <a href="https://tailwindcss.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Tailwind Css">Tailwind CSS</a>
                        </li>
                        <li class="inline pr-8">
                            <a href="https://github.com/riipandi/altstack" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="GitHub">GitHub</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
