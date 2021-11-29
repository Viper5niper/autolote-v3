@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content')
@include('partials._status')
<div class="container">
    
    <div class="row">
        
        <div class="col-lg-10 card d-flex justify-content-center mx-auto my-3 p-5">       
            @include('partials._status')
            <h2>Editar Usuario</h2>
           
            <form method="POST" action="{{ route('user.update',[$usuario->id]) }}" class="mt-3">
                @method('PATCH')
                @include('admin.usuario._edit',['btnText'=>'Guadar Cambios', $usuario])
            </form>
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