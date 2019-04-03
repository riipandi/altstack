@extends('layouts.app')

@section('content')
    <div class="flex items-center mb-6">
        <div class="w-full mx-auto">
            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
                <passport-clients></passport-clients>
                {{-- <passport-authorized-clients></passport-authorized-clients> --}}
                {{-- <passport-personal-access-tokens></passport-personal-access-tokens> --}}
            </div>
        </div>
    </div>
@endsection
