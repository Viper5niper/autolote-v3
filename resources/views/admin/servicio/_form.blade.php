@csrf
<div class="form-row">
    <div class="form-group col-md-6 first">
        <label for="cod">Codigo</label>
        <input type="text" name="cod" class="form-control @error('cod') is-invalid 
            @enderror" id="cod" placeholder="XX000" value="{{old('cod',$servicio->cod)}}"
        readonly>
        @error('cod')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-6 first"> 
        <label for="area_empresa">Area del servicio</label>
        @if (isset($servicio->area_empresa))
            <select name="area_empresa" id="area_empresa"  class="form-control" disabled>
                @if ($servicio->area_empresa === "STP")
                    <option value="STP" selected>Taller de Pintura</option>
                    <option value="STA">Taller Automotriz</option>
                    <option value="SC">CarWash</option>
                    <option value="O">Otro</option>
                @elseif ($servicio->area_empresa === "STA")
                    <option value="STP">Taller de Pintura</option>
                    <option value="STA" selected>Taller Automotriz</option>
                    <option value="SC">CarWash</option>
                    <option value="O">Otro</option>
                @elseif ($servicio->area_empresa === "SC")
                    <option value="STP">Taller de Pintura</option>
                    <option value="STA">Taller Automotriz</option>
                    <option value="SC" selected>CarWash</option>
                    <option value="O">Otro</option>
                @else
                    <option value="STP">Taller de Pintura</option>
                    <option value="STA">Taller Automotriz</option>
                    <option value="SC">CarWash</option>
                    <option value="O" selected>Otro</option>
                @endif
                
            @else
            <select name="area_empresa" id="area_empresa"  class="form-control">
                <option value="STP">Taller de Pintura</option>
                <option value="STA">Taller Automotriz</option>
                <option value="SC">CarWash</option>
                <option value="O">Otro</option>
            @endif
        </select>
    </div>
    <div class="form-group col-md-6 first">
        <label for="precio">Precio</label>
        <input type="number" accept="any" name="precio" class="form-control @error('precio') is-invalid 
        @enderror" id="precio" palceholder="$" value="{{old('precio',$servicio->precio )}}"
            required>
        @error('precio')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-6 first">
        <label for="descuento">Descuento</label>
        <input type="number" min="0" max="100" name="descuento" class="form-control @error('descuento') is-invalid 
        @enderror" id="descuento" palceholder="$" value="{{old('descuento',$servicio->descuento * 100)}}"
            required>
        @error('descuento')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-12 first">
        <label for="descripcion">Descripcion</label>
        <input type="textarea" name="descripcion" class="form-control @error('descripcion') is-invalid 
            @enderror" id="descripcion" placeholder="" value="{{old('descripcion',$servicio->descripcion)}}"
        required>
        @error('descripcion')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-button pt-4"> <button type="submit"
    class="btn btn-primary btn-block btn-lg"><span>{{$btnText}}</span></button> </div>
</div>

