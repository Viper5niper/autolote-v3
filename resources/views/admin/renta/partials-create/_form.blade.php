@csrf
@php
    print_r($vehiculo)
@endphp
<div class="form-row">
    <div class="form-group col-md-6 first">
        <label for="renta_inicio">Inicio</label>
        <input type="date" name="inicio" class="form-control @error('inicio') is-invalid 
        @enderror" id="renta_inicio" value="{{old('inicio')}}"
            required>
        @error('inicio')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-6 first">
        <label for="renta_final">Final</label>
        <input type="date" name="final" class="form-control @error('final') is-invalid 
      @enderror" id="renta_final" value="{{old('final')}}" 
            disabled>
        @error('final')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-6 first">
        <label for="renta_ndr">N Dias de Renta</label>
        <input type="number" min="1" max="366" name="dias" class="form-control @error('dias') is-invalid 
        @enderror" id="renta_ndr" value="{{old('dias')}}"
            required>
        @error('dias')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-6 first">
        <label for="renta_monto">Monto</label>
        <input type="number" accept="any" name="monto" class="form-control @error('monto') is-invalid 
        @enderror" id="renta_monto" palceholder="$" value="{{old('monto')}}"
            required>
        @error('monto')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-button pt-4"> <button type="submit"
    class="btn btn-primary btn-block btn-lg"><span>{{$btnText}}</span></button> </div>
</div>