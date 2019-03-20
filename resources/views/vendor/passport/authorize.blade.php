@extends('layouts.auth')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
                    <div class="font-semibold bg-grey-lightest text-grey-darker py-5 mb-0 rounded-t text-center">Authorization Request</div>
                    <div class="w-full p-8 text-grey-dark">
                        <p><strong>{{ $client->name }}</strong> is requesting permission to access your account.</p>
                        @if (count($scopes) > 0)
                            <div class="scopes">
                                <p><strong>This application will be able to:</strong></p>
                                <ul>
                                    @foreach ($scopes as $scope)
                                        <li>{{ $scope->description }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="w-full p-5">
                        <div class="flex w-full">
                            <!-- Authorize Button -->
                            <div class="flex-1 m-2">
                                <form method="post" action="{{ route('passport.authorizations.approve') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="state" value="{{ $request->state }}">
                                    <input type="hidden" name="client_id" value="{{ $client->id }}">
                                    <button class="w-full appearance-none no-underline block text-center text-white hover:text-white py-3 rounded outline-none bg-green hover:bg-green-dark">
                                        <i class="fas fa-fw fa-check mr-2"></i>Authorize
                                    </button>
                                </form>
                            </div>

                            <!-- Cancel Button -->
                            <div class="flex-1 m-2">
                                <form method="post" action="{{ route('passport.authorizations.deny') }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" name="state" value="{{ $request->state }}">
                                    <input type="hidden" name="client_id" value="{{ $client->id }}">
                                    <button class="w-full appearance-none no-underline block text-center text-white hover:text-white py-3 rounded outline-none bg-red hover:bg-red-dark">
                                        <i class="fas fa-fw fa-ban mr-2"></i>Revoke
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
