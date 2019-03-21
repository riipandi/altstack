@extends('layouts.app')

@section('content')
    <div class="flex items-center mb-6">
        <div class="container mx-auto">
            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
                <div class="w-full p-6">
                    @role('superadmin')
                        I am a superadmin, yeaaayy!
                    @else
                        You don't have permission to access this page!
                    @endrole
                </div>
            </div>
        </div>
    </div>
@endsection
