@csrf
<div class="form-row">
  <div class="form-group col-md-6 first">
    <label for="empleado_nombres">Nombres</label>
    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid 
        @enderror" id="empleado_nombres" placeholder="" value="{{old('nombre',$empleado->nombre)}}"
      onKeyUp="mayus(this);" required>
    @error('nombre')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_apellidos">Apellidos</label>
    <input type="text" name="apellido" class="form-control @error('apellido') is-invalid 
        @enderror" id="empleado_apellidos" placeholder="" value="{{old('apellido',$empleado->apellido)}}"
      onKeyUp="mayus(this);" required>
    @error('apellido')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-12 first">
    <label for="empleado_direccion">Direccion</label>
    <input type="text" name="direccion" class="form-control @error('direccion') is-invalid 
        @enderror" id="empleado_direccion" placeholder="" value="{{old('direccion',$empleado->direccion)}}"
      onKeyUp="mayus(this);" required>
    @error('direccion')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_telefono">Telefono</label>
    <input type="text" name="telefono" class="form-control @error('telefono') is-invalid 
        @enderror" id="empleado_telefono" placeholder="" value="{{old('telefono',$empleado->telefono)}}"
      onKeyUp="mayus(this);" required>
    @error('telefono')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_celular">Celular</label>
    <input type="text" name="celular" class="form-control @error('celular') is-invalid 
        @enderror" id="empleado_celular" placeholder="" value="{{old('celular',$empleado->celular)}}"
      onKeyUp="mayus(this);">
    @error('celular')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_profesion">Profesion u Oficio</label>
    <input type="text" name="profesion" class="form-control @error('profesion') is-invalid 
        @enderror" id="empleado_profesion" placeholder="" value="{{old('profesion',$empleado->profesion)}}"
      onKeyUp="mayus(this);" required>
    @error('profesion')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group col-md-6 first">
    <label for="images">Subir Fotografia</label>
    <input type="file" name="images[]" id="images" accept="image/png, image/pneg, image/jpeg,image/jpg" class="form-control">
  </div>
</div>
<script type="">
  function mayus(e) {
    e.value = e.value.toUpperCase();
  }
 
</script>

<div class="form-button pt-4"> <button type="submit"
    class="btn btn-primary btn-block btn-lg"><span>{{$btnText}}</span></button> </div>

</div>