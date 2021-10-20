@extends('adminlte::page')

@section('title', 'Nuevo Usuario')

@section('content')

<div class="container">
    
    <div class="row">
        
        <div class="col-lg-10 card d-flex justify-content-center mx-auto my-3 p-5">       
            @include('partials._status')
            <h2>Crear Usuario</h2>
           
            <form method="POST" action="{{ route('user.store') }}" class="mt-3">
                @include('admin.usuario._create',['btnText'=>'Registrar Usuario'])
            </form>
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