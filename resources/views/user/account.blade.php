@extends('layouts.app')

@section('content')
    <div class="flex items-center mb-6">
        <div class="container mx-auto">
            <div class="mb-4 w-full flex flex-wrap">
                <!-- Side menu -->
                <div class="p-2 w-full md:w-3/4 lg:w-1/4">
                    <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
                        <div class="tracking-wide font-semibold bg-grey-lightest text-sm text-grey-darker py-4 px-6 mb-0 rounded-t">Personal Settings</div>
                        <div class="w-full p-0">
                            <ul class="list-reset">
                                <li><a href="javascript:;" class="block no-underline hover:bg-grey-lighter hover:text-blue text-blue py-3 px-4">Profile</a></li>
                                <li><a href="{{ route('user.account') }}" class="block no-underline hover:bg-grey-lighter hover:text-blue text-blue py-3 px-4">Account</a></li>
                                <li><a href="javascript:;" class="block no-underline hover:bg-grey-lighter hover:text-blue text-blue py-3 px-4">Security</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Main content -->
                <div class="p-2 w-full lg:w-3/4">
                    <!-- row -->
                    <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md mb-6">
                        <div class="tracking-wide font-semibold bg-grey-lightest text-sm text-grey-darker py-4 px-6 mb-0 rounded-t">Account Settings</div>
                        <div class="w-full max-w-md p-6">
                            <form class="w-full form-control" action="{{ route('user.account') }}" method="POST">
                                @csrf
                                <div class="md:flex md:items-center mb-6">
                                    <div class="md:w-1/3 mr-2">
                                        <label class="block text-grey font-semibold md:text-right mb-1 md:mb-0 pr-4" for="name">Your Name</label>
                                    </div>
                                    <div class="md:w-2/3">
                                        <input class="focus:outline-none focus:bg-white focus:border-grey" name="name" id="name" type="text" value="{{ auth()->user()->name }}">
                                    </div>
                                </div>
                                <div class="md:flex md:items-center mb-6">
                                    <div class="md:w-1/3 mr-2">
                                        <label class="block text-grey font-semibold md:text-right mb-1 md:mb-0 pr-4" for="email">Email Address</label>
                                    </div>
                                    <div class="md:w-2/3">
                                        <input class="focus:outline-none focus:bg-white focus:border-grey" name="email" id="email" type="email" value="{{ auth()->user()->email }}">
                                    </div>
                                </div>
                                <div class="md:flex md:items-center mb-6">
                                    <div class="md:w-1/3 mr-2">
                                        <label class="block text-grey font-semibold md:text-right mb-1 md:mb-0 pr-4" for="username">Username</label>
                                    </div>
                                    <div class="md:w-2/3">
                                        <input class="focus:outline-none focus:bg-white focus:border-grey" name="username" id="username" type="text" value="{{ auth()->user()->username }}">
                                    </div>
                                </div>
                                <div class="md:flex md:items-center mb-6">
                                    <div class="md:w-1/3 mr-2">
                                        <label class="block text-grey font-semibold md:text-right mb-1 md:mb-0 pr-4" for="password">Current Password</label>
                                    </div>
                                    <div class="md:w-2/3">
                                        <input class="focus:outline-none focus:bg-white focus:border-grey" name="password" id="password" type="password" placeholder="******************">
                                    </div>
                                </div>
                                <div class="md:flex md:items-center mb-6">
                                    <div class="md:w-1/3 mr-2"></div>
                                    <div class="form-switch inline-block align-middle">
                                        <input type="checkbox" name="check_pass_change" id="check_pass_change" class="form-switch-checkbox" v-on:click="toggleClass('hidden', 'changePassForm')">
                                        <label class="form-switch-label" for="check_pass_change"></label>
                                    </div>
                                    <label class="text-sm text-grey-darker cursor-pointer" for="check_pass_change">Change Password</label>
                                </div>

                                <div id="changePassForm" class="hidden">
                                    <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/3 mr-2">
                                            <label class="block text-grey font-semibold md:text-right mb-1 md:mb-0 pr-4" for="new_password">New Password</label>
                                        </div>
                                        <div class="md:w-2/3">
                                            <input class="bg-grey-lighter appearance-none border border-grey-lighter rounded w-full py-3 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-grey appearance-none" name="new_password" id="new_password" type="password" placeholder="******************">
                                        </div>
                                    </div>
                                    <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/3 mr-2">
                                            <label class="block text-grey font-semibold md:text-right mb-1 md:mb-0 pr-4" for="new_password_confirmation">Confirm Password</label>
                                        </div>
                                        <div class="md:w-2/3">
                                            <input class="bg-grey-lighter appearance-none border border-grey-lighter rounded w-full py-3 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-grey appearance-none" name="new_password_confirmation" id="new_password_confirmation" type="password" placeholder="******************">
                                        </div>
                                    </div>
                                </div>

                                <div class="md:flex md:items-center">
                                    <div class="md:w-1/3 mr-2"></div>
                                    <div class="md:w-2/3">
                                        <button class="shadow bg-blue hover:bg-blue-light focus:shadow-outline focus:outline-none text-white py-3 px-8 rounded" type="submit">
                                            {{ __('Update') }}
                                        </button>
                                        <a href="javascript:;" class="no-underline text-blue hover:text-blue-darker text-sm py-1 px-2 ml-1 focus:outline-none">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- row -->
                    <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
                        <div class="tracking-wide font-semibold bg-grey-lightest text-sm text-grey-darker py-4 px-6 mb-0 rounded-t">Delete Account</div>
                        <div class="w-full p-6">
                            <div class="italic text-sm rounded text-red border border-red-lighter bg-red-lightest px-3 py-4 mb-4">
                                This action is not reversible. All account information will be deleted immediately.
                            </div>
                            <div class="block">
                                <button class="shadow bg-red hover:bg-red-light focus:shadow-outline focus:outline-none text-white py-3 px-6 rounded">
                                    <i class="fas fa-fw fa-trash-alt mr-2"></i>{{ __('Delete my account') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
