<!DOCTYPE html>
<html lang="es">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Cambiar Contrase&ntilde;a</title>

</head>

<body>
    <main class="mt-5">
        <div class="container col-lg-6">
            <div class="card">
                <div class="card-header">
                    Cambio de Contrase&ntilde;a
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                    @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                    <form class="form-horizontal" method="POST" action="{{ route('perfil.change') }}">
                                        {{ csrf_field() }}

                                        <div
                                            class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                            <label for="new-password" class="col-md-4 control-label">Contrase&ntilde;a
                                                Actual</label>

                                            <div class="col-md-12">
                                                <input id="current-password" type="password" class="form-control"
                                                    name="current-password" required>

                                                @if ($errors->has('current-password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('current-password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                            <label for="new-password" class="col-md-4 control-label">Nueva
                                                Contrase&ntilde;a</label>

                                            <div class="col-md-12">
                                                <input id="new-password" type="password" class="form-control"
                                                    name="new-password" required>

                                                @if ($errors->has('new-password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('new-password') ? 'La contraseñas no coinciden' : ""}}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="new-password-confirm" class="col-md-4 control-label">Confirme
                                                Nueva Contrase&ntilde;a</label>
                                            <div class="col-md-12">
                                                <input id="new-password-confirm" type="password" class="form-control"
                                                    name="new-password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary col-md-6 mx-2">
                                                    Cambiar Contrase&ntilde;a
                                                </button>
                                                <a href="{{route("perfil")}}" class="btn btn-primary col-md-5 ml-4">
                                                    Volver
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>