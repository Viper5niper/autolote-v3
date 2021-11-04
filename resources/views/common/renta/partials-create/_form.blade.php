@csrf
<div class="form-row">
    <input type="text" name="cliente_id" hidden class="form-control mx-1" value="{{$cliente->id ?? null}}">
    <input type="text" name="vehiculo_id" hidden class="form-control mx-1" value="{{$vehiculo->id ?? null}}">

    <div class="form-group col-md-4 first">
        <label for="renta_inicio">Inicio</label>
        <input type="date" name="inicio" class="form-control @error('inicio') is-invalid 
        @enderror" id="renta_inicio" value="{{old('inicio')}}"
            required>
        @error('inicio')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-4 first">
        <label for="renta_final">Final</label>
        <input type="date" name="final" class="form-control @error('final') is-invalid 
      @enderror" id="renta_final" value="{{old('final')}}" onchange="fechafinal()"
            disabled>
        @error('final')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-4 first">
        <label for="renta_ndr">N Dias de Renta</label>
        <input type="number" min="1" max="366" name="dias" class="form-control @error('dias') is-invalid 
        @enderror" id="renta_ndr" value="{{old('dias')}}"
            required>
        @error('dias')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-4 first">
        <label for="renta_monto">Monto</label>
        <input type="number" accept="any" name="monto" class="form-control @error('monto') is-invalid 
        @enderror" id="renta_monto" palceholder="$" value="{{old('monto')}}"
            required>
        @error('monto')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-4 first"> 
        <label for="factura_tipo">Tipo de Factura</label>
        <select name="tipo" id="factura_tipo"  class="form-control">
            <option value="consumidor">Consumidor Final</option>
            <option value="credito">Credito Fiscal</option>
        </select>
    </div>
    <div class="form-group col-md-4 first">
        <label for="renta_factura_id">N# factura</label>
        <input type="number" accept="any" name="n_factura" class="form-control @error('n_factura') is-invalid 
        @enderror" id="renta_factura_id" palceholder="$" value="{{old('n_factura')}}"
            required>
        @error('n_factura')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <input type="text" name="factura_id" value="" hidden>
    <input type="text" name="json_array" value="" hidden>
</div>
<div class="form-button pt-4"> <button type="submit"
    class="btn btn-primary btn-block btn-lg"><span>{{$btnText}}</span></button> </div>
</div>