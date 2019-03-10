@extends('layouts.app')

@section('content')
    <div class="flex items-center mb-6">
        <div class="w-full mx-auto">
            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
                <div class="font-semibold bg-grey-lightest text-grey-darkest py-3 px-6 mb-0 rounded-t">
                    Dashboard
                </div>
                <div class="w-full p-6">
                    <div>Welcome to your dashboard!</div>
                    <div class="mt-4">
                        <button @click="showToastr('success', 'Horayyyy', 'You got love dude!')" class="shadow bg-green hover:bg-green-light focus:shadow-outline focus:outline-none text-white py-3 px-6 rounded">
                            Example Toastr
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection