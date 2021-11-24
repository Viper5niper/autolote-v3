@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Informacion del cliente</h1>
@stop


@section('content')

<form method="" action="" class="mt-3">
    @csrf
    <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="cliente_nombre">Nombres</label>
          <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" id="cliente_nombre" placeholder="Donald J." value="{{$nombre}}" disabled>
            @error('nombre')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
          <label for="cliente_apellido">Apellidos</label>
          <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" id="cliente_apellido" placeholder="Trump" value="{{$apellido}}" disabled>
            @error('apellido')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label for="cliente_email">E-mail</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="cliente_email" placeholder="Trump@mail.com" value="{{$email}}" disabled>
              @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

      </div>
      <div class="form-row">

        <div class="col-md-6 mb-3">
            <label for="cliente_direccion">Direccion</label>
            <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" id="cliente_direccion" placeholder="" value="{{$direccion}}" disabled>
            @error('direccion')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-3 mb-3">
            <label for="cliente_telefono"># Telefono</label>
            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" id="cliente_telefono" placeholder="" value="{{$telefono}}" disabled>
            @error('telefono')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-3 mb-3">
            <label for="cliente_celular"># Celular</label>
            <input type="text" name="celular" class="form-control @error('celular') is-invalid @enderror" id="cliente_celular" placeholder="" value="{{$celular}}" disabled>
            @error('celular')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-2 mb-3">
            <label for="cliente_tipo_doc">Tipo Doc.</label>
            <select type="text" name="tipo_doc" class="form-control @error('tipo_doc') is-invalid @enderror" id="cliente_tipo_doc" placeholder="{{$tipo_doc}}" disabled>
                <option default value="dui">DUI</option>
                <option value="pasaporte">Passaporte</option>
            </select>
            @error('tipo_doc')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-5 mb-3">
            <label for="cliente_doc"># Documento</label>
            <input type="text" name="doc" class="form-control @error('doc') is-invalid @enderror" id="cliente_doc" placeholder="" value="{{$doc}}" disabled>
            @error('doc')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-5 mb-3">
            <label for="cliente_licencia"># Licencia</label>
            <input type="text" name="licencia" class="form-control @error('licencia') is-invalid @enderror" id="cliente_licencia" placeholder="" value="{{$licencia}}" disabled>
            @error('licencia')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
      </div>

      <a class="btn btn-primary" href="{{route('cliente.edit', ['cliente'=> $id])}}">Editar</a>
      <a class="btn btn-secondary" href="{{route('cliente')}}">Ir a Lista de clientes</a>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop