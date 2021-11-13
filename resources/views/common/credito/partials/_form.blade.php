<div class="form-group col-md-4 first">
    <label for="fecha">Fecha</label>
    <input type="date" accept="any" name="fecha" class="form-control @error('fecha') is-invalid
    @enderror" id="fecha" palceholder="$" onchange="calc(this);" value="{{old('fecha')}}">
    @error('fecha')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group col-md-4 first">
    <label for="monto">Monto</label>
    <input type="number" min=1 accept="any" name="monto" class="form-control @error('monto') is-invalid
    @enderror" onchange="calc(this);" id="monto" palceholder="$" value="{{old('monto')}}">
    @error('monto')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group col-md-4 first">
    <label for="dias">Dias Facturados</label>
    <input type="number" min="1" accept="any" name="dias" class="form-control @error('dias') is-invalid
    @enderror" onchange="calc(this);" id="dias" palceholder="$" value="{{old('dias')}}">
    @error('dias')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group col-md-4 first">
    <label for="mora">$ Mora</label>
    <input type="number" accept="any" min=0 name="mora" class="form-control @error('mora') is-invalid
    @enderror" onchange="calc(this);" id="mora" value="{{old('mora')}}">
    @error('mora')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group col-md-4 first">
    <label for="interes">Interes</label>
    <input type="number" accept="any" name="interes" class="form-control @error('interes') is-invalid
    @enderror" id="interes" value="{{old('interes')}}" readonly>
    @error('interes')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
@if ($info['credito']['json_array']['tipo'] === 'credito')
    <div class="form-group col-md-4 first">
    <label for="iva">IVA</label>
    <input type="number" accept="any" name="iva" class="form-control @error('iva') is-invalid
    @enderror" id="iva" value="{{old('iva')}}" readonly>
    @error('iva')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<input type="text" name="subtotal" id="subtotal" hidden>
@endif
<div class="form-group col-md-4 first">
    <label for="abonado">Total abonado</label>
    <input type="number" accept="any" name="abonado" class="form-control @error('abonado') is-invalid
    @enderror" id="abonado" value="{{old('abonado')}}" readonly>
    @error('abonado')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group col-md-4 first">
    <label for="saldo">Nuevo Saldo</label>
    <input type="number" accept="any" name="saldo" class="form-control @error('saldo') is-invalid
    @enderror" id="saldo" value="{{old('saldo')}}" readonly>
    @error('saldo')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
