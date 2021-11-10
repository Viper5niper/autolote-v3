@csrf
<div class="form-row">
    <input type="text" name="cliente_id" hidden class="form-control mx-1" value="{{$cliente->id ?? null}}">
    <input type="text" name="vehiculo_id" hidden class="form-control mx-1" value="{{$vehiculo->id ?? null}}">
    <div class="form-group col-md-4 first"> 
        <label for="venta_tipo">Tipo de venta</label>
        <select name="tipo_venta" id="venta_tipo"  class="form-control" onchange="show_hidden_input(['prima_div','prima_label','prima',
        'interes_div','interes_label','interes','n_couta_div','n_couta_label','n_couta'],'credito','venta_tipo')">
            <option value="contado">Contado</option>
            <option value="credito">Credito</option>
        </select>
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
        <select name="tipo" id="factura_tipo"  class="form-control" onchange="allow_ncr('renta_ncr','factura_tipo','renta_ncr_label')">
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
    <div class="form-group col-md-4 first">
        <label for="fecha_venta">Fecha</label>
        <input type="date" name="fecha_venta" class="form-control @error('fecha_venta') is-invalid 
        @enderror" id="fecha_venta" value="{{old('fecha_venta')}}" 
            required>
        @error('fecha_venta')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-4 first" id="interes_div" hidden> 
        <label for="interes" id="interes_label" hidden>Interes</label>
        <select class="form-control @error('interes') is-invalid 
            @enderror" name='interes' id="interes" hidden>
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
    <div class="form-group col-md-4 first" id="prima_div" hidden>
        <label for="prima" id="prima_label" hidden>Prima</label>
        <input type="number" accept="any" name="prima" class="form-control @error('prima') is-invalid 
        @enderror" id="prima" palceholder="$" value="{{old('prima')}}"
            hidden>
        @error('prima')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-4 first" id="n_couta_div" hidden>
        <label for="n_couta" id="n_couta_label" hidden>N Coutas</label>
        <input type="number" accept="any" name="n_coutas" class="form-control @error('n_coutas') is-invalid 
        @enderror" id="n_couta" palceholder="$" value="{{old('n_coutas')}}"
            hidden>
        @error('n_coutas')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-4 first">
        <label for="renta_ncr" id="renta_ncr_label" hidden>N# Registro</label>
        <input type="number" accept="any" name="ncr" class="form-control @error('ncr') is-invalid 
        @enderror" id="renta_ncr" value="{{old('ncr')}}" hidden>
        @error('ncr')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
   
    <input type="text" name="factura_id" value="" hidden>
    <input type="text" name="json_array" value="" hidden>
</div>
<div class="form-button pt-4"> <button type="submit"
    class="btn btn-primary btn-block btn-lg"><span>{{$btnText}}</span></button> </div>
</div>
