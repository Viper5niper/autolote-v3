@extends('adminlte::page')

@section('title', 'Bienvenido')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="row d-flex justify-content-center">
        {{-- <div class="col-md-12">
           <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23A79B8E&ctz=America%2FEl_Salvador&showTitle=0&showNav=0&showDate=0&showPrint=0&showTabs=0&showCalendars=0&showTz=0&mode=MONTH&src=YXoxNzAwMUB1ZXMuZWR1LnN2&src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&src=ZXMuc3YjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%23039BE5&color=%2333B679&color=%230B8043" style="border-width:0;" frameborder="0" width="1000" height="600"scrolling="no"></iframe>
        </div> --}}
        <div class="col-md-12 row">
            <div class="col-md-6">
                <x-adminlte-small-box title="Vehiculos" text="Vista de Vehiculos" icon="fas fa-fw fa-car text-white"
                theme="dark" url="#" url-text="Ir"/>
            </div>
            <div class="col-md-6">
                <x-adminlte-small-box title="Clientes" text="Vista de Clientes" icon="fas fa-fw fa-user-friends text-white"
                theme="dark" url="#" url-text="Ir"/>
            </div>
            <div class="col-md-6">
                <x-adminlte-small-box title="Usuarios" text="Vista de Usuarios" icon="fas fa-fw fa-user-friends text-white"
                theme="dark" url="#" url-text="Ir"/>
            </div>
            <div class="col-md-6">
                <x-adminlte-small-box title="Empleados" text="Vista de Empleados" icon="fas fa-fw fa-user-friends text-white"
                theme="dark" url="#" url-text="Ir"/>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop