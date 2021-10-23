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
    <label for="empleado_dui">DUI</label>
    <input type="text"  name="doc" maxlength="10" class="form-control @error('doc') is-invalid 
        @enderror" id="empleado_dui" placeholder="" onkeydown="ddui(this)" value="{{old('doc',$empleado->doc)}}"
         required>
    @error('doc')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_nit">NIT</label>
    <input type="text" name="nit" class="form-control @error('nit') is-invalid 
        @enderror" id="empleado_nit" placeholder="" onkeydown="dnit(this)" value="{{old('nit',$empleado->nit)}}">
    @error('nit')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_telefono">Telefono</label>
    <input type="text" name="telefono" class="form-control @error('telefono') is-invalid 
        @enderror" id="empleado_telefono" placeholder="" onkeydown="tel(this)" value="{{old('telefono',$empleado->telefono)}}"
      onKeyUp="mayus(this);" required>
    @error('telefono')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_celular">Celular</label>
    <input type="text" name="celular" class="form-control @error('celular') is-invalid 
        @enderror" id="empleado_celular" placeholder="" onkeydown="tel(this)" value="{{old('celular',$empleado->celular)}}"
      onKeyUp="mayus(this);">
    @error('celular')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_isss">N ISSS</label>
    <input type="text" name="isss" class="form-control @error('isss') is-invalid 
        @enderror" id="empleado_isss" placeholder="" value="{{old('isss',$empleado->isss)}}" onKeyUp="mayus(this);">
    @error('isss')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_nup">N NUP</label>
    <input type="text" name="nup" class="form-control @error('nup') is-invalid 
        @enderror" id="empleado_nup" placeholder="" value="{{old('nup',$empleado->nup)}}" onKeyUp="mayus(this);">
    @error('nup')
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
    <label for="empleado_area">Area Asignado</label>
    <input type="text" name="area_empresa" class="form-control @error('area_empresa') is-invalid 
        @enderror" id="empleado_area" placeholder="" value="{{old('area_empresa',$empleado->area_empresa)}}"
      onKeyUp="mayus(this);" required>
    @error('area_empresa')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_cargo">Cargo</label>
    <input type="text" name="cargo" class="form-control @error('cargo') is-invalid 
        @enderror" id="empleado_cargo" placeholder="" value="{{old('cargo',$empleado->cargo)}}" onKeyUp="mayus(this);"
      required>
    @error('cargo')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="s" name="licencia">
      <label class="form-check-label" for="licencia">
        Licencia de Conducir
      </label>
    </div>
  </div>

  <div class="form-group col-md-6 first">
    <label for="images">Subir Fotografia</label>
    <input type="file" name="images[]" id="images" accept="image/png, image/pneg, image/jpeg,image/jpg"
      class="form-control">
  </div>
</div>

<script type="text/javascript">
  function mayus(e) {
    e.value = e.value.toUpperCase();
  }

  function ddui(e) {
      var maskOptions = {
      mask: '00000000-0'
      };
      var mask = IMask(e, maskOptions);
  }

  function dnit(e) {
      var maskOptions = {
      mask: '0000-000000-000-0'
      };
      var mask = IMask(e, maskOptions);
  }

  function tel(e) {
      var maskOptions = {
      mask: '0000-0000'
      };
      var mask = IMask(e, maskOptions);
  }
</script>
<div class="form-button pt-4"> <button type="submit"
    class="btn btn-primary btn-block btn-lg"><span>{{$btnText}}</span></button> </div>

</div>