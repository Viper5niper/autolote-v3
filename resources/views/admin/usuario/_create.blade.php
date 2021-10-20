@csrf
<div class="form-row">
    <div class="form-group col-md-6 first">
        <label for="name">Nombre de Usuario</label>
        <input type="text" class="form-control @error('name') is-invalid 
        @enderror" value="{{old('name')}}" id="name" name="name" required>
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6 first">
        <label for="email">Correo Electronico</label>
        <input type="email" class="form-control @error('email') is-invalid 
        @enderror" value="{{old('email')}}" id="email" name="email" required>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6 first">
        <label for="id_empleado">DUI del Empleado</label>
        <input type="text" class="form-control @error('empleado_id') is-invalid 
        @enderror" value="{{old('empleado_id')}}" id="id_empleado" name="empleado_id" onkeyup="this.value = pass(this.value);" required>
        @error('empleado_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6 first">
        <label for="password">Contrase&ntilde;a</label>
        <input type="text" class="form-control @error('password') is-invalid 
        @enderror" value="{{old('empleado_id')}}" id="password" name="password" disabled>
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <select class="form-control @error('email') is-invalid 
        @enderror" name='role' required>
        <option disabled selected>Seleccione un Rol</option>
        <option value="1">Admin</option>
        <option value="2">Usuario</option>
    </select>
    @error('role')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<div class="form-button pt-4"> <button type="submit" class="btn btn-primary btn-block btn-lg"
        id="btn-pwd"><span>{{$btnText}}</span></button> </div>
</div>

<script>
    function pass(doc){
        //let doc = document.getElementById('id_empleado').value;
        document.getElementById('password').value = doc;
        
        if (doc.match(/^\d{8}$/) !== null) {
            return doc + '-';
        } else if (doc.match(/^\d{8}\-\d{0}$/) !== null) {
            return doc + '-';
        }
        
        return cadena;
    }
</script>