@if (session('status'))
    <x-adminlte-alert theme="{{ session('status') ? session('status') : 'info'}}" title="Peticion procesada." dismissable>
        {{ session('message') }}
    </x-adminlte-alert>
@endif