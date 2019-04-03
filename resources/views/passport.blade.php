@extends('layouts.app')

@section('content')
    <div class="flex items-center mb-6">
        <div class="container mx-auto">
            <passport-clients></passport-clients>
        </div>
    </div>

    {{-- <div class="flex items-center mb-6">
        <div class="container mx-auto">
            <passport-personal-access-tokens></passport-personal-access-tokens>
        </div>
    </div>

    <div class="flex items-center mb-6">
        <div class="container mx-auto">
            <passport-authorized-clients></passport-authorized-clients>
        </div>
    </div> --}}
@endsection
