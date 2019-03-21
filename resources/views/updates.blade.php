@extends('layouts.app')

@section('content')
    <div class="flex items-center mb-6">
        <div class="container mx-auto">
            @role('superadmin')
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
                    <div class="w-full p-6">
                        <p>I am a superadmin, yeaaayy!</p>
                    </div>
                </div>
            @else @include('layouts.no-permission')
            @endrole
        </div>
    </div>
@endsection
