@if (($msg = session('status')) || ($msg = session('message')) || ($msg = session('info')))
    <div class="alert mb-4">
        <div class="text-sm border border-t-8 rounded text-blue-darker border-blue-dark bg-blue-lightest px-3 py-4 mb-4" role="alert">
            {{ $msg }}
        </div>
    </div>
@endif

@if ($msg = session('success'))
    <div class="alert mb-4">
        <div class="text-sm border border-t-8 rounded text-green-darker border-green-dark bg-green-lightest px-3 py-4 mb-4" role="alert">
            {{ $msg }}
        </div>
    </div>
@endif

@if ($msg = session('warning'))
    <div class="alert mb-4">
        <div class="text-sm border border-t-8 rounded text-orange-darker border-orange-dark bg-orange-lightest px-3 py-4 mb-4" role="alert">
            {{ $msg }}
        </div>
    </div>
@endif

@if ($msg = session('error'))
    <div class="alert mb-4">
        <div class="text-sm border border-t-8 rounded text-red-darker border-red-dark bg-red-lightest px-3 py-4 mb-4" role="alert">
            {{ $msg }}
        </div>
    </div>
@endif