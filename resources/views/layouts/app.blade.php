@push('meta')
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
@endpush

<x-base-layout title="{{ $title }}">
<div class="flex bg-gray-100">
    <aside class="relative hidden h-screen shadow bg-primary-600 w-72 sm:block">
        <div class="flex flex-col mb-2">
            <div class="px-3 pt-5 text-center">
                <h1 class="text-3xl font-semibold text-white trcaking-tight">
                    {{ config('app.name') }}
                </h1>
            </div>
            <div class="px-5 py-2 mt-6 mb-2">
                <button class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium transition duration-150 ease-in-out bg-white border border-transparent rounded-md shadow-sm text-primary-600 hover:bg-primary-100 focus:outline-none disabled:opacity-25">
                    <x-heroicon-o-plus-circle class="w-auto h-4 mr-2 -ml-1 text-primary-600"/> New Report
                </button>
            </div>
        </div>
        <nav class="pt-2 text-base font-medium text-white border-t border-primary-700">
            <a href="{{ route('dashboard') }}" class="flex items-center py-3 pl-6 text-sm text-white bg-primary-700">
                <x-heroicon-o-home class="w-auto h-5 mr-3 -ml-1 text-white"/> Dashboard
            </a>
            <a href="javascript:;" class="flex items-center justify-start py-4 pl-6 text-sm text-white opacity-90 hover:opacity-100 hover:bg-primary-700">
                <x-heroicon-o-document class="w-auto h-5 mr-3 -ml-1 text-white"/> Sample 1
            </a>
            <a href="javascript:;" class="flex items-center justify-start py-4 pl-6 text-sm text-white opacity-90 hover:opacity-100 hover:bg-primary-700">
                <x-heroicon-o-clock class="w-auto h-5 mr-3 -ml-1 text-white"/> Sample 2
            </a>
            <a href="javascript:;" class="flex items-center justify-start py-4 pl-6 text-sm text-white opacity-90 hover:opacity-100 hover:bg-primary-700">
                <x-heroicon-o-calendar class="w-auto h-5 mr-3 -ml-1 text-white"/> Sample 3
            </a>
            <a href="javascript:;" class="flex items-center justify-start py-4 pl-6 text-sm text-white opacity-90 hover:opacity-100 hover:bg-primary-700">
                <x-heroicon-o-adjustments class="w-auto h-5 mr-3 -ml-1 text-white"/> Settings
            </a>
        </nav>
        <a href="https://github.com/riipandi/altstack" target="_blank" rel="noopener noreferrer" class="absolute bottom-0 flex items-center justify-center w-full py-4 text-sm font-medium text-white bg-primary-700 hover:bg-primary-800">
            <x-heroicon-o-external-link class="w-auto h-5 mr-2 -ml-1 text-white"/>
            Upgrade to Pro!
        </a>
    </aside>

    <div class="relative flex flex-col w-full h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="items-center hidden w-full px-8 py-2 bg-white sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative flex justify-end w-1/2">
                <div @click="isOpen = !isOpen"  class="inline-flex items-center px-3 py-2 rounded-md cursor-pointer bg-gray-50 hover:bg-gray-100">
                    <span class="mr-3 text-sm font-medium tracking-tighter text-gray-700">{{ auth()->user()->name }}</span>
                    <img src="{{ auth()->user()->avatar }}" class="z-10 w-8 h-8 overflow-hidden border-2 rounded-full realtive border-primary-400 hover:border-primary-500 focus:outline-none" alt="User Avatar">
                </div>
                <button x-show="isOpen" @click="isOpen = false" class="fixed inset-0 w-full h-full cursor-default"></button>
                <div x-show="isOpen" class="absolute w-48 py-2 mt-12 space-y-1 bg-white rounded-md shadow">
                    <a href="{{ route('user.profile') }}" class="inline-flex items-center w-full px-5 py-2 text-sm text-gray-600 hover:bg-primary-600 hover:text-white">
                        <x-heroicon-o-user-circle class="w-auto h-5 mr-3 -ml-1" /> Preferences
                    </a>
                    <a href="javascript:;" class="inline-flex items-center w-full px-5 py-2 text-sm text-gray-600 hover:bg-primary-600 hover:text-white">
                        <x-heroicon-o-support class="w-auto h-5 mr-3 -ml-1" /> Get Support
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="w-full"> @csrf
                        <button type="submit" class="flex items-center w-full px-5 py-2 text-sm text-gray-600 inline- hover:bg-primary-600 hover:text-white">
                            <x-heroicon-o-logout class="w-auto h-5 mr-3 -ml-1" /> {{ __('Sign out') }}
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" :class="isOpen ? 'absolute': 'relative'" class="z-20 w-full px-6 py-3 bg-primary-600 sm:hidden">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-semibold text-white">
                    {{ config('app.name') }}
                </h1>
                <button @click="isOpen = !isOpen" class="text-3xl text-white focus:outline-none">
                    <x-heroicon-o-menu-alt-2 x-show="!isOpen" class="w-auto h-6"/>
                    <x-heroicon-o-x x-show="isOpen" class="w-auto h-6"/>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4 pb-2">
                <a href="{{ route('dashboard') }}" class="flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100 hover:bg-primary-700">
                    <x-heroicon-o-home class="w-auto h-5 mr-3 -ml-1 text-white"/>
                    Dashboard
                </a>
                <a href="javascript:;" class="flex items-center py-3 pl-4 text-white bg-primary-700 hover:bg-primary-700">
                    <x-heroicon-o-document class="w-auto h-5 mr-3 -ml-1 text-white"/> Blank Page
                </a>
                <a href="javascript:;" class="flex items-center py-3 pl-4 text-white opacity-90 hover:opacity-100 hover:bg-primary-700">
                    <x-heroicon-o-clock class="w-auto h-5 mr-3 -ml-1 text-white"/> Sample 1
                </a>
                <a href="javascript:;" class="flex items-center py-3 pl-4 text-white opacity-90 hover:opacity-100 hover:bg-primary-700">
                    <x-heroicon-o-calendar class="w-auto h-5 mr-3 -ml-1 text-white"/> Sample 2
                </a>
                <a href="javascript:;" class="flex items-center py-3 pl-4 text-white opacity-90 hover:opacity-100 hover:bg-primary-700">
                    <x-heroicon-o-adjustments class="w-auto h-5 mr-3 -ml-1 text-white"/> Settings
                </a>
                <div class="relative px-3 py-5">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <a href="javascript:;" class="flex items-center py-3 pl-4 text-white opacity-90 hover:opacity-100 hover:bg-primary-700">
                    <x-heroicon-o-support class="w-auto h-5 mr-3 -ml-1 text-white"/> Support
                </a>
                <a href="{{ route('user.profile') }}" class="flex items-center py-3 pl-4 text-white opacity-90 hover:opacity-100 hover:bg-primary-700">
                    <x-heroicon-o-user-circle class="w-auto h-5 mr-3 -ml-1 text-white"/> My Account
                </a>
                <a href="{{ route('logout') }}" class="flex items-center py-3 pl-4 text-white opacity-90 hover:opacity-100 hover:bg-primary-700">
                    <x-heroicon-o-logout class="w-auto h-5 mr-3 -ml-1 text-white"/> Sign Out
                </a>
                <a href="https://github.com/riipandi" class="flex items-center justify-center w-full py-3 mt-4 text-sm font-medium bg-white rounded-lg shadow-sm text-primary-600 hover:bg-gray-100" target="_blank" rel="noopener noreferrer">
                    <x-heroicon-o-external-link class="w-auto h-4 mr-2 -ml-1"/> Upgrade to Pro!
                </a>
            </nav>
        </header>

        <div class="flex flex-col w-full h-screen overflow-x-hidden border-t">
            <main class="flex-grow w-full">
                {{ $slot }}
            </main>

            <footer class="w-full px-6 py-4 text-right bg-white">
                <div class="text-sm text-center sm:text-right">
                    AltStack by
                    <a href="https://twitter.com/riipandi" class="text-primary-800 hover:text-primary-600" target="_blank" rel="noopener noreferrer">
                        Aris Ripandi
                    </a>
                </div>
            </footer>
        </div>
    </div>
</div>
</x-base-layout>
