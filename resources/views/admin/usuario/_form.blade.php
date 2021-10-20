@csrf
@php
    
@endphp
@if(isset($empleado->id))
<input type="text" name="empleado_id" hidden value="{{old('empleado_id',$empleado->id)}}">
<div class="form-row">
  <div class="form-group col-md-6 first">
    <label for="username">Nombres Empleado</label>
    <input type="text" name="nombre" class="form-control"
        value="{{old('nombre',$empleado->nombre)}}"  disabled>
  <div class="form-group col-md-6 first">
    <label for="username">Apellidos Empleado</label>
    <input type="text" name="apellido" class="form-control"
        value="{{old('apellido',$empleado->apellido)}}"  disabled>
</div>
@endif
<div class="form-row">
  <div class="form-group col-md-6 first">
    <label for="username">Nombre de Usuario</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid 
        @enderror" id="username" placeholder="" value="{{old('name',$usuario->name)}}"  required>
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group col-md-6 first">
    <label for="empleado_nombres">Correo Electronico</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid 
        @enderror" id="empleado_emails" placeholder="" value="{{old('email',$usuario->email)}}" 
      required>
    @error('email')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  
  {{-- Password field --}}
  <div class="form-group col-md-6 first">
    <label for="user_password">Contrase&ntilde;a</label>
    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
      placeholder="{{ __('adminlte::adminlte.password') }}">
    @if($errors->has('password'))
    <div class="invalid-feedback">
      <strong>{{ $errors->first('password') }}</strong>
    </div>
    @endif
  </div>

  {{-- Confirm password field --}}
  <div class="form-group col-md-6 first">
    <label for="user_password_confirmation">Repita la Contrase&ntilde;a</label>
    <input type="password" name="password_confirmation"
      class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
      placeholder="{{ __('adminlte::adminlte.retype_password') }}" onchange="onChangeInputPwd();">
      <span id="spanpwd"></span>
    @if($errors->has('password_confirmation'))
    <div class="invalid-feedback">
      <strong>{{ $errors->first('password_confirmation') }}</strong>
    </div>
    @endif
  </div>
  
  
  <div class="form-group col-md-6 first">
    
    @if (!empty($usuario->role))
    <select class="form-control" name="role">
      @if ($usuario->role == 1)
      <option value="1" selected>Admin</option>
      <option value="2">Usuario</option>
      @else
      <option value="1">Admin</option>
      <option value="2" selected>Usuario</option>
      @endif
    </select>
    @else
    <select class="form-control">
      <option disabled selected>Seleccione un Rol</option>
      <option value="1">Admin</option>
      <option value="2">Usuario</option>
    </select>
    @endif

  </div>

</div>
<script type="">
    function onChangeInputPwd(e) {
        var password = document.getElementsByName("password");
        var confirm = document.getElementsByName("password_confirmation");
        var btnpwd = document.getElementById("btn-pwd");
        
        if (password[0].value != null && confirm[0].value != null) {
            var span = document.getElementById('spanpwd');
            if (confirm[0].value != password[0].value) {
                span.innerHTML = "Las contraseñas no coinciden";
                //btnpwd.disabled = true;
            } else {
                span.innerHTML = "";
                //btnpwd.disabled = false;
            }
        }
    }

    // const onClickShowPwd = () => {
    //     var x = document.getElementById("password");
    //     var y = document.getElementById("pwd2");

    //     if (x.type === "password") { x.type = "text"; }
    //     else { x.type = "password"; }

    //     if (y.type === "password") { y.type = "text"; }
    //     else { y.type = "password"; }
    // }
</script>

<div class="form-button pt-4"> <button type="submit"
    class="btn btn-primary btn-block btn-lg" id="btn-pwd"><span>{{$btnText}}</span></button> </div>
</div>