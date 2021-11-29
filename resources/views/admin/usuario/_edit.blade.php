@csrf
<div class="form-row">
    <div class="form-group col-md-6 first">
        <label for="name">Nombre de Usuario</label>
        <input type="text" class="form-control @error('name') is-invalid 
        @enderror" value="{{old('name', $usuario->name)}}" id="name" name="name" required>
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6 first">
        <label for="email">Correo Electronico</label>
        <input type="email" class="form-control @error('email') is-invalid 
        @enderror" value="{{old('email', $usuario->email)}}" id="email" name="email" required>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6 first">
        <label for="id_empleado">DUI del Empleado</label>
        <input type="text" class="form-control @error('empleado_id') is-invalid 
        @enderror" value="{{old('empleado_id', $usuario->empleado->doc)}}" id="id_empleado" name="empleado_id"
            onkeyup="n_dui_mask(this);" required>
        @error('empleado_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6 first">
        <label for="id_empleado">Tipo de Usuario</label>
        <select class="form-control @error('role') is-invalid 
        @enderror" name='role' required>
            @if ($usuario->role === 1)
            <option value="1" selected>Admin</option>
            <option value="2">Usuario</option>
            <option value="3">Servicios</option>
            @elseif($usuario->role === 2)
            <option value="1">Admin</option>
            <option value="2" selected>Usuario</option>
            <option value="3">Servicios</option>
            @else
            <option value="1">Admin</option>
            <option value="2">Usuario</option>
            <option value="3" selected>Servicios</option>
            @endif
        </select>
        @error('role')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>


<div class="form-button pt-4"> <button type="submit" class="btn btn-primary btn-block btn-lg"
        id="btn-pwd"><span>{{$btnText}}</span></button> </div>
</div>
