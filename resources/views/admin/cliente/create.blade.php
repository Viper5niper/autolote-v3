@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 card mx-auto my-3 p-5">
            <h2>Crear Cliente</h2>
            <hr>
            <div class="col">
                <form method="POST" action="{{ route('cliente.store') }}" class="mt-3">
                    @include('admin.cliente._form',['cliente'=> $cliente])

                    <button class="btn btn-primary btn-block btn-lg mt-4" type="submit">Crear cliente</button>
                </form>
            </div>
        </div>
    </div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://unpkg.com/imask"></script>
    <script src="/js/utilities.js"></script>
@stop