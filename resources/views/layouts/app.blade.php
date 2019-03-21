<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="all, noindex, nofollow">
    <meta name="googlebot" content="all, noindex, nofollow">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="bg-grey-lightest h-screen font-sans antialiased">
    <div id="app" class="wrapper">
        <!-- Sidebar  -->
        @include('layouts.sidebar')

        <div id="content">
            <header id="navbar" class="inline-flex flex-row bg-white border-t-2 align-middle">
                <div class="flex-1 text-grey-darker align-middle">
                    <div class="inline-block py-1">
                        <div class="flex">
                            <div class="pl-6">
                                <button id="sidebarCollapse" class="inherit focus:outline-none -ml-3">
                                    <i class="fas fa-align-left mr-1"></i>
                                </button>
                            </div>
                            <div class="hidden md:block ml-4 font-semibold">Your Company Name</div>
                        </div>
                    </div>
                </div>
                <div class="flex-1 text-grey-darker text-right align-middle pr-4">
                    <div class="inline-block">
                        <div class="flex">
                            <div class="py-1">
                                <a href="javascript:;" class="inline-block text-grey-dark hover:text-green mr-5" aria-label="You have 69 unread notifications" data-microtip-position="bottom-left" role="tooltip">
                                    <i class="fas fa-fw fa-bell"></i>
                                </a>
                            </div>
                            <div class="mr-2">
                                <img class="w-6 h-6 rounded-full" src="{{ auth()->user()->avatar_url }}" alt="User Avatar">
                            </div>
                            <button v-on:click="toggleClass('invisible', 'userDropdown')" class="drop-button text-grey-darker focus:outline-none font-semibold tracking-tight">
                                Hola, {{ auth()->user()->first_name }}
                                <svg class="h-3 fill-current opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </button>
                            <div id="userDropdown" class="dropdown dropdown-user absolute pin-r mr-6 mt-10 py-2 rounded shadow-md invisible">
                                <a class="py-2 px-4 hover:bg-blue-dark hover:text-white" href="javascript:;"><i class="fas fa-fw fa-user mr-2"></i> Profile</a>
                                <a class="py-2 px-4 hover:bg-blue-dark hover:text-white" href="{{ route('user.account') }}"><i class="fas fa-fw fa-cog mr-2"></i> Settings</a>
                                {{-- <a class="py-2 px-4 hover:bg-blue-dark hover:text-white" href="javascript:;"><i class="fas fa-fw fa-list mr-2"></i> User Logs</a> --}}
                                <div class="border border-grey-lightest b-1 my-2 mx-4"></div>
                                <a class="py-2 px-4 hover:bg-blue-dark hover:text-white" href="{{ route('logout') }}">
                                    <i class="fas fa-fw fa-sign-out-alt mr-2"></i>{{ __('Sign Out ') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="w-full mx-auto py-10 px-8">
                {{-- @include('layouts.alert') --}}
                @include('layouts.toastr')
                @yield('content')
            </main>

            <footer id="footer">
                <div class="text-center pt-2 md:pt-0 md:float-left">
                    Copyright &copy; 2019 <a href="//ripandi.id" target="_new" rel="noopener" aria-label="Made by Aris Ripandi in Indonesia" data-microtip-position="top" role="tooltip">Aris Ripandi</a>.
                </div>
                <div class="text-center pt-3 pb-4 md:py-0 md:inline-block md:float-right">
                    {{ config('app.name') }} <a href="{{ route('app.updates') }}" aria-label="Click here to check for updates" data-microtip-position="top-left" role="tooltip">{{ Version::format('compact') }}</a>
                </div>
            </footer>
        </div>
    </div>

    <!-- Javascript libraries -->
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
