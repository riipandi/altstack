@push('meta')
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
@endpush

<x-base-layout title="{{ $title }}">
<div class="flex bg-gray-100">
    <aside class="relative bg-primary-600 h-screen w-72 hidden sm:block shadow">
        <div class="flex flex-col mb-2">
            <div class="pt-5 px-3 text-center">
                <h1 class="text-white text-3xl font-semibold trcaking-tight">
                    {{ config('app.name') }}
                </h1>
            </div>
            <div class="px-5 py-2 mt-6 mb-2">
                <button class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-primary-600 border border-transparent rounded-md shadow-sm bg-white hover:bg-primary-100 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150">
                    <x-heroicon-o-home class="w-auto h-4 text-primary-600 mr-2 -ml-1"/> New Report
                </button>
            </div>
        </div>
        <nav class="text-white text-base font-medium pt-2 border-t border-primary-700">
            <a href="{{ route('dashboard') }}" class="flex items-center bg-primary-700 text-sm text-white py-3 pl-6">
                <x-heroicon-o-home class="w-auto h-5 text-white mr-3 -ml-1"/> Dashboard
            </a>
            <a href="javascript:;" class="flex justify-start items-center text-sm text-white opacity-90 hover:opacity-100 py-4 pl-6 hover:bg-primary-700">
                <x-heroicon-o-document class="w-auto h-5 text-white mr-3 -ml-1"/> Sample 1
            </a>
            <a href="javascript:;" class="flex justify-start items-center text-sm text-white opacity-90 hover:opacity-100 py-4 pl-6 hover:bg-primary-700">
                <x-heroicon-o-clock class="w-auto h-5 text-white mr-3 -ml-1"/> Sample 2
            </a>
            <a href="javascript:;" class="flex justify-start items-center text-sm text-white opacity-90 hover:opacity-100 py-4 pl-6 hover:bg-primary-700">
                <x-heroicon-o-calendar class="w-auto h-5 text-white mr-3 -ml-1"/> Sample 3
            </a>
            <a href="javascript:;" class="flex justify-start items-center text-sm text-white opacity-90 hover:opacity-100 py-4 pl-6 hover:bg-primary-700">
                <x-heroicon-o-adjustments class="w-auto h-5 text-white mr-3 -ml-1"/> Settings
            </a>
        </nav>
        <a href="https://github.com/riipandi/altstack" target="_blank" rel="noopener noreferrer" class="absolute w-full bg-primary-700 text-sm font-medium bottom-0 bg-primary-700 text-white hover:bg-primary-800 flex items-center justify-center py-4">
            <x-heroicon-o-external-link class="w-auto h-5 text-white mr-2 -ml-1"/>
            Upgrade to Pro!
        </a>
    </aside>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full flex items-center bg-white py-2 px-8 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <div @click="isOpen = !isOpen"  class="inline-flex items-center cursor-pointer bg-gray-50 hover:bg-gray-100 py-2 px-3 rounded-md">
                    <span class="text-sm mr-3 font-medium tracking-tighter text-gray-700">{{ auth()->user()->name }}</span>
                    <img src="{{ auth()->user()->avatar }}" class="realtive z-10 w-8 h-8 rounded-full overflow-hidden border-2 border-primary-400 hover:border-primary-500 focus:outline-none" alt="User Avatar">
                </div>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-48 bg-white rounded-md shadow py-2 mt-12 space-y-1">
                    <a href="javascript:;" class="inline-flex items-center w-full px-5 py-2 text-gray-600 text-sm hover:bg-primary-600 hover:text-white">
                        <x-heroicon-o-user-circle class="w-auto h-5 mr-3 -ml-1" /> Preferences
                    </a>
                    <a href="javascript:;" class="inline-flex items-center w-full px-5 py-2 text-gray-600 text-sm hover:bg-primary-600 hover:text-white">
                        <x-heroicon-o-support class="w-auto h-5 mr-3 -ml-1" /> Get Support
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="w-full"> @csrf
                        <button type="submit" class="inline- items-center flex w-full px-5 py-2 text-gray-600 text-sm hover:bg-primary-600 hover:text-white">
                            <x-heroicon-o-logout class="w-auto h-5 mr-3 -ml-1" /> {{ __('Sign out') }}
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" :class="isOpen ? 'absolute': 'relative'" class="w-full bg-primary-600 py-3 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <h1 class="text-white text-2xl font-semibold">
                    {{ config('app.name') }}
                </h1>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <x-heroicon-o-menu-alt-2 x-show="!isOpen" class="w-auto h-6"/>
                    <x-heroicon-o-x x-show="isOpen" class="w-auto h-6"/>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4 pb-2">
                <a href="{{ route('dashboard') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 hover:bg-primary-700">
                    <x-heroicon-o-home class="w-auto h-5 text-white mr-3 -ml-1"/>
                    Dashboard
                </a>
                <a href="javascript:;" class="flex items-center bg-primary-700 text-white py-3 pl-4 hover:bg-primary-700">
                    <x-heroicon-o-document class="w-auto h-5 text-white mr-3 -ml-1"/> Blank Page
                </a>
                <a href="javascript:;" class="flex items-center text-white opacity-90 hover:opacity-100 py-3 pl-4 hover:bg-primary-700">
                    <x-heroicon-o-clock class="w-auto h-5 text-white mr-3 -ml-1"/> Sample 1
                </a>
                <a href="javascript:;" class="flex items-center text-white opacity-90 hover:opacity-100 py-3 pl-4 hover:bg-primary-700">
                    <x-heroicon-o-calendar class="w-auto h-5 text-white mr-3 -ml-1"/> Sample 2
                </a>
                <a href="javascript:;" class="flex items-center text-white opacity-90 hover:opacity-100 py-3 pl-4 hover:bg-primary-700">
                    <x-heroicon-o-adjustments class="w-auto h-5 text-white mr-3 -ml-1"/> Settings
                </a>
                <div class="relative px-3 py-5">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <a href="javascript:;" class="flex items-center text-white opacity-90 hover:opacity-100 py-3 pl-4 hover:bg-primary-700">
                    <x-heroicon-o-support class="w-auto h-5 text-white mr-3 -ml-1"/> Support
                </a>
                <a href="javascript:;" class="flex items-center text-white opacity-90 hover:opacity-100 py-3 pl-4 hover:bg-primary-700">
                    <x-heroicon-o-user-circle class="w-auto h-5 text-white mr-3 -ml-1"/> My Account
                </a>
                <a href="javascript:;" class="flex items-center text-white opacity-90 hover:opacity-100 py-3 pl-4 hover:bg-primary-700">
                    <x-heroicon-o-logout class="w-auto h-5 text-white mr-3 -ml-1"/> Sign Out
                </a>
                <a href="https://github.com/riipandi" class="w-full bg-white text-primary-600 text-sm font-medium py-3 mt-4 rounded-lg shadow-sm hover:bg-gray-100 flex items-center justify-center" target="_blank" rel="noopener noreferrer">
                    <x-heroicon-o-external-link class="w-auto h-4 mr-2 -ml-1"/> Upgrade to Pro!
                </a>
            </nav>
        </header>

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow">
                {{ $slot }}
            </main>

            <footer class="w-full bg-white text-right px-6 py-4">
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
