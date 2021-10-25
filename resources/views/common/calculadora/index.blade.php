@extends('adminlte::page')

@section('title', 'Nuevo Usuario')

@section('content')

<div class="container">
    
    <div class="row">
        
        <div class="col-lg-10 card d-flex justify-content-center mx-auto my-3 p-5">       
            @include('partials._status')
            <h2>Generador de Presupuesto</h2>
            <form method="POST" action="{{route('calculadora.generate')}}" class="mt-3">
                @csrf
               
                <h5>Datos del Cliente</h5>
            <hr>
                <div class="form-row">
                    <div class="form-group col-md-6 first">
                        <label for="name">Nombres</label>
                        <input type="text" class="form-control @error('nombre') is-invalid 
                        @enderror" value="{{old('nombre')}}" id="name" name="nombre" onkeyup="toUpperCaseField(this)" required>
                        @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 first">
                        <label for="lastname">Apellidos</label>
                        <input type="text" class="form-control @error('apellido') is-invalid 
                        @enderror" value="{{old('apellido')}}" id="lastname" name="apellido" onkeyup="toUpperCaseField(this)" required>
                        @error('apellido')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="form-group col-md-6 first">
                        <label for="email">Correo Electronico</label>
                        <input type="email" class="form-control @error('email') is-invalid 
                        @enderror" value="{{old('email')}}" id="email" name="email" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="form-group col-md-6 first">
                        <label for="tel">Telefono</label>
                        <input type="text" class="form-control @error('telefono') is-invalid 
                        @enderror" value="{{old('telefono')}}" id="tel" name="telefono" onkeyup="local_tel_mask(this);" required>
                        @error('telefono')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>    
                <hr>
                
                <h5>Datos del Credito</h5>
                
                <hr>
                <div class="form-row">
                <div class="form-group col-md-6 first">
                    <label for="interes">% de Interes</label>
                    <select class="form-control @error('interes') is-invalid 
                        @enderror" name='interes' id="interes" required>
                        <option disabled selected>% de interes</option>
                        <option value="0.01">1%</option>
                        <option value="0.02">2%</option>
                        <option value="0.025">2.5%</option>
                        <option value="0.03">3%</option>
                        <option value="0.035">3.5%</option>
                        <option value="0.04">4%</option>
                        <option value="0.045">4.5%</option>
                        <option value="0.05">5%</option>
                        <option value="0.055">5.5%</option>
                    </select>
                </div>
                <div class="form-group col-md-6 first">
                    <label for="monto">Monto a Otorgar</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="number" class="form-control @error('monto') is-invalid 
                        @enderror" value="{{old('monto')}}" id="monto" name="monto" onkeydown="money_mask(this);" required>
                        @error('monto')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-6 first">
                    <label for="cuotas">Numero de Cuotas</label>
                    <input type="number" class="form-control @error('cuotas') is-invalid 
                    @enderror" value="{{old('cuotas')}}" id="cuotas" name="cuotas" required>
                    @error('cuotas')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>  
                <div class="form-group col-md-6 first">
                    <label for="dpago">Dia de Pago</label>
                    <input type="number" class="form-control @error('dpago') is-invalid 
                    @enderror" value="{{old('dpago')}}" id="dpago" name="dpago" maxlength="2" required>
                    @error('dpago')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>  
                <div class="form-group col-md-6 first">
                    <label for="totales">Sumar Totales</label>
                    <select class="form-control @error('totales') is-invalid 
                        @enderror" name='totales' id="totales" required>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </div>
            </div>
            <hr>
                
                <h5>Datos del Vehiculo</h5>
                
                <hr>
                <div class="form-row">
                
                <div class="form-group col-md-6 first">
                    <label for="placa">Placa</label>
                    <input type="text" class="form-control @error('placa') is-invalid 
                    @enderror" value="{{old('placa')}}" id="placa" name="placa" onkeydown="n_placa_mask(this)" required>
                    @error('placa')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>  
                <div class="form-group col-md-6 first">
                    <label for="marca">Marca</label>
                    <input type="text" class="form-control @error('marca') is-invalid 
                    @enderror" value="{{old('marca')}}" id="marca" name="marca" onkeyup="toUpperCaseField(this)" required>
                    @error('marca')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>  
                <div class="form-group col-md-6 first">
                    <label for="modelo">Modelo</label>
                    <input type="text" class="form-control @error('modelo') is-invalid 
                    @enderror" value="{{old('modelo')}}" id="modelo" name="modelo" onkeyup="toUpperCaseField(this)" required>
                    @error('modelo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> 
                <div class="form-group col-md-6 first">
                    <label for="anio">A&ntilde;o</label>
                    <input type="number" class="form-control @error('anio') is-invalid 
                    @enderror" value="{{old('anio')}}" id="anio" name="anio" maxlength="4" required>
                    @error('anio')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> 
            </div>
            <div class="form-button pt-4"> <button type="submit" class="btn btn-primary btn-block btn-lg"
                id="btn-pwd"><span>Generar Presupuesto</span></button> </div>
            </div>
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