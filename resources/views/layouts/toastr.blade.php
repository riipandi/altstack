@if (($msg = session('status')) || ($msg = session('message')) || ($msg = session('info')))
    <toastr-component type="info" title="Information" msg="{{ $msg }}"></toastr-component>
@endif

@if ($msg = session('success'))
    <toastr-component type="success" title="Success" msg="{{ $msg }}"></toastr-component>
@endif

@if ($msg = session('warning'))
    <toastr-component type="warning" title="Warning" msg="{{ $msg }}"></toastr-component>
@endif

@if ($msg = session('error'))
    <toastr-component type="error" title="Error" msg="{{ $msg }}"></toastr-component>
@endif
