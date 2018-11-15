<!DOCTYPE html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<html>
<head>
    <title>Inicio de Sesion</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style type="text/css">
        @import 'css/dlogin.css';
    </style>
</head>
<body id="LoginForm">
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <p>Solicitud de Equipamiento</p>
   <h6>CIISA</h6>
   </div>
    <form action="IniciarSesion" method="POST">
        {{csrf_field()}}
        <div class="form-group {{ $errors->has('usu_rut') ? 'has-error' : '' }}">
            <input type="text" class="form-control" name="usu_rut" placeholder="Rut" value="{{ old('usu_rut') }}">
            {!! $errors->first('usu_rut', '<span class="help-block">:message</span>>') !!}
        </div>

        <div class="form-group">
            <input type="password" class="form-control" name="usu_contraseña" placeholder="Password">
            {!! $errors->first('usu_contraseña', '<span class="help-block">:message</span>>') !!}
        </div>

        <button type="submit" class="btn btn-primary">Ingresar</button>

        <div class="form-group-d">
            <input type="checkbox" name="fancy-checkbox-success" id="fancy-checkbox-success" autocomplete="off" />
            <div class="btn-group">
                <label for="fancy-checkbox-success" class="btn btn-success">
                    <span class="checkBoxAllow fas fa-check"></span>
                <span class="nonCheckBoxAllow fas fa-times"></span>
                </label>
                <label for="fancy-checkbox-success" class="btn btn-default active">
                    Recordarme
                </label>
            </div>
        </div>

    </form>
    </div>
</div>
</body>
</html>


