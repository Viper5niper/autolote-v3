@csrf
<div class="form-row">
  <div class="form-group col-md-6 first">
    <label for="vehiculo_placa">Placa</label>
    <input type="text" name="placa" class="form-control @error('placa') is-invalid 
        @enderror" id="vehiculo_placa" placeholder="P000000" value="{{old('placa',$vehiculo->placa)}}"
      onKeyUp="mayus(this);" required>
    @error('placa')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="vehiculo_vto">VTO</label>
    <input type="month" name="vto" class="form-control @error('vto') is-invalid 
      @enderror" id="vehiculo_vto" placeholder="" value="{{old('vto',$vehiculo->vto)}}" onKeyUp="mayus(this);"
      required>
    @error('vto')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="vehiculo_anio">A&ntilde;o</label>
    <input type="number" name="anio" max="4000" class="form-control @error('anio') is-invalid 
      @enderror" id="vehiculo_anio" placeholder="2020" value="{{old('anio',$vehiculo->anio)}}" onKeyUp="mayus(this);"
      required>
    @error('anio')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="vehiculo_marca">Marca</label>
    <input type="text" name="marca" class="form-control @error('marca') is-invalid 
        @enderror" id="vehiculo_marca" placeholder="TOYOTA" value="{{old('marca',$vehiculo->marca)}}"
      onKeyUp="mayus(this);" required>
    @error('marca')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="vehiculo_modelo">Modelo</label>
    <input type="text" name="modelo" class="form-control @error('modelo') is-invalid 
        @enderror" id="vehiculo_modelo" placeholder="COROLLA" value="{{old('modelo',$vehiculo->modelo)}}"
      onKeyUp="mayus(this);" required>
    @error('modelo')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="vehiculo_capacidad">Capacidad</label>
    <input type="text" name="capacidad" class="form-control @error('capacidad') is-invalid 
      @enderror" id="vehiculo_capacidad" placeholder="" value="{{old('capacidad',$vehiculo->capacidad)}}"
      onKeyUp="mayus(this);" required>
    @error('capacidad')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="vehiculo_tipo">Tipo</label>
    <input type="text" name="tipo" class="form-control @error('tipo') is-invalid 
      @enderror" id="vehiculo_tipo" placeholder="" value="{{old('tipo',$vehiculo->tipo)}}" onKeyUp="mayus(this);"
      required>
    @error('tipo')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="vehiculo_clase">Clase</label>
    <input type="text" name="clase" class="form-control @error('clase') is-invalid 
      @enderror" id="vehiculo_clase" placeholder="" value="{{old('clase',$vehiculo->clase)}}" onKeyUp="mayus(this);"
      required>
    @error('clase')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="vehiculo_traccion">Traccion</label>
    <input type="text" name="traccion" class="form-control @error('traccion') is-invalid 
      @enderror" id="vehiculo_traccion" placeholder="" value="{{old('traccion',$vehiculo->traccion)}}"
      onKeyUp="mayus(this);" required>
    @error('traccion')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="vehiculo_dominio">Dominio</label>
    <input type="text" name="dominio" class="form-control @error('dominio') is-invalid 
      @enderror" id="vehiculo_dominio" placeholder="" value="{{old('dominio',$vehiculo->dominio)}}"
      onKeyUp="mayus(this);" required>
    @error('dominio')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="vehiculo_calidad">En Calidad</label>
    <input type="text" name="calidad" class="form-control @error('calidad') is-invalid 
      @enderror" id="vehiculo_calidad" placeholder="" value="{{old('calidad',$vehiculo->calidad)}}"
      onKeyUp="mayus(this);" required>
    @error('calidad')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="vehiculo_color">Color</label>
    <input type="text" name="color" class="form-control @error('color') is-invalid 
        @enderror" id="vehiculo_color" placeholder="ROJO" value="{{old('color',$vehiculo->color)}}"
      onKeyUp="mayus(this);" required>
    @error('color')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="vehiculo_nchasis">N Chasis</label>
    <input type="text" name="n_chasis" class="form-control @error('n_chasis') is-invalid 
      @enderror" id="vehiculo_nchasis" placeholder="" value="{{old('n_chasis',$vehiculo->n_chasis)}}"
      onKeyUp="mayus(this);" required>
    @error('n_chasis')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="vehiculo_nmotor">N Motor</label>
    <input type="text" name="n_motor" class="form-control @error('n_motor') is-invalid 
        @enderror" id="vehiculo_nmotor" placeholder="" value="{{old('n_motor',$vehiculo->n_motor)}}"
      onKeyUp="mayus(this);" required>
    @error('n_motor')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="vehiculo_nvin">N Vin</label>
    <input type="text" name="n_vin" class="form-control @error('n_vin') is-invalid 
        @enderror" id="vehiculo_nvin" placeholder="" value="{{old('n_vin',$vehiculo->n_vin)}}" onKeyUp="mayus(this);"
      required>
    @error('n_vin')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group col-md-6 first">
    <label for="vehiculo_nps">N Poliza</label>
    <input type="text" name="n_pol_s" class="form-control @error('n_pol_s') is-invalid 
        @enderror" id="vehiculo_nps" placeholder="" value="{{old('n_pol_s',$vehiculo->n_pol_s)}}"
      onKeyUp="mayus(this);">
    @error('n_pol_s')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="vehiculo_vps">V Poliza</label>
    <input type="month" name="v_pol_s" class="form-control @error('v_pol_s') is-invalid 
        @enderror" id="vehiculo_vps" placeholder="" value="{{old('v_pol_s',$vehiculo->v_pol_s)}}"
      onKeyUp="mayus(this);">
    @error('v_pol_s')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="images">Subir Imagenes</label>
    <input type="file" name="images[]" id="images" multiple class="form-control">
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