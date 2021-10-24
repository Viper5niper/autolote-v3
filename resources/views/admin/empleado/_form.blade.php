@csrf
<div class="form-row">
  <div class="form-group col-md-6 first">
    <label for="empleado_nombres">Nombres</label>
    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid 
        @enderror" id="empleado_nombres" placeholder="" value="{{old('nombre',$empleado->nombre)}}"
      onKeyUp="toUpperCaseField(this);" required>
    @error('nombre')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_apellidos">Apellidos</label>
    <input type="text" name="apellido" class="form-control @error('apellido') is-invalid 
        @enderror" id="empleado_apellidos" placeholder="" value="{{old('apellido',$empleado->apellido)}}"
      onKeyUp="toUpperCaseField(this);" required>
    @error('apellido')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-12 first">
    <label for="empleado_direccion">Direccion</label>
    <input type="text" name="direccion" class="form-control @error('direccion') is-invalid 
        @enderror" id="empleado_direccion" placeholder="" value="{{old('direccion',$empleado->direccion)}}"
      onKeyUp="toUpperCaseField(this);" required>
    @error('direccion')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_dui">DUI</label>
    <input type="text"  name="doc" maxlength="10" class="form-control @error('doc') is-invalid 
        @enderror" id="empleado_dui" placeholder="" onkeydown="n_dui_mask(this)" value="{{old('doc',$empleado->doc)}}"
         required>
    @error('doc')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_nit">NIT</label>
    <input type="text" name="nit" class="form-control @error('nit') is-invalid 
        @enderror" id="empleado_nit" placeholder="" onkeydown="n_nit_mask(this)" value="{{old('nit',$empleado->nit)}}">
    @error('nit')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_telefono">Telefono</label>
    <input type="text" name="telefono" class="form-control @error('telefono') is-invalid 
        @enderror" id="empleado_telefono" placeholder="" onkeydown="local_tel_mask(this)" value="{{old('telefono',$empleado->telefono)}}"
      onKeyUp="toUpperCaseField(this);" required>
    @error('telefono')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_celular">Celular</label>
    <input type="text" name="celular" class="form-control @error('celular') is-invalid 
        @enderror" id="empleado_celular" placeholder="" onkeydown="local_tel_mask(this)" value="{{old('celular',$empleado->celular)}}"
      onKeyUp="toUpperCaseField(this);">
    @error('celular')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_isss">N ISSS</label>
    <input type="number" name="isss" class="form-control @error('isss') is-invalid 
        @enderror" id="empleado_isss" placeholder="" value="{{old('isss',$empleado->isss)}}" onKeyUp="toUpperCaseField(this);">
    @error('isss')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_nup">N NUP</label>
    <input type="number" name="nup" class="form-control @error('nup') is-invalid 
        @enderror" id="empleado_nup" placeholder="" value="{{old('nup',$empleado->nup)}}" onKeyUp="toUpperCaseField(this);">
    @error('nup')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_profesion">Profesion u Oficio</label>
    <input type="text" name="profesion" class="form-control @error('profesion') is-invalid 
        @enderror" id="empleado_profesion" placeholder="" value="{{old('profesion',$empleado->profesion)}}"
      onKeyUp="toUpperCaseField(this);" required>
    @error('profesion')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_area">Area Asignado</label>
    <input type="text" name="area_empresa" class="form-control @error('area_empresa') is-invalid 
        @enderror" id="empleado_area" placeholder="" value="{{old('area_empresa',$empleado->area_empresa)}}"
      onKeyUp="toUpperCaseField(this);" required>
    @error('area_empresa')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_cargo">Cargo</label>
    <input type="text" name="cargo" class="form-control @error('cargo') is-invalid 
        @enderror" id="empleado_cargo" placeholder="" value="{{old('cargo',$empleado->cargo)}}" onKeyUp="toUpperCaseField(this);"
      required>
    @error('cargo')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first" hidden>
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

<div class="form-button pt-4"> <button type="submit"
    class="btn btn-primary btn-block btn-lg"><span>{{$btnText}}</span></button> </div>

</div>