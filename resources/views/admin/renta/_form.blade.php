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
        <label for="vehiculo_color">Color</label>
        <input type="text" name="color" class="form-control @error('color') is-invalid 
        @enderror" id="vehiculo_color" placeholder="ROJO" value="{{old('color',$vehiculo->color)}}"
            onKeyUp="mayus(this);" required>
        @error('color')
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
</div>
<script type="">
    function mayus(e) {
    e.value = e.value.toUpperCase();
  }
</script>

<div class="form-button pt-4"> <button type="submit"
        class="btn btn-primary btn-block btn-lg"><span>{{$btnText}}</span></button> </div>

</div>