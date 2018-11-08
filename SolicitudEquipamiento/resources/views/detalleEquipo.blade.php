<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Solicitud de Equipamiento</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/estilos.css')}}" rel="stylesheet" />
  <link href="{{asset('css/material-dashboard.css')}}" rel="stylesheet"/>
  <link href="{{asset('font-awesome/css/font-awesome.min.csss')}}" rel="stylesheet">
  <script src="js/jquery.min.js" type="text/javascript"></script>
  <link href="{{asset('fullcalendar/fullcalendar.min.css')}}" rel='stylesheet' />
  <link href="{{asset('fullcalendar/fullcalendar.print.css')}}" media='print' />
  <script src='fullcalendar/moment.min.js'></script>
  <script src='fullcalendar/fullcalendar.min.js'></script>


</head>

<body>
  <div class="wrapper">

    <div class="sidebar" data-color="blue">
      <div class="logo">
        <a href="" class="simple-text">
          CIISA
        </a>
      </div>

      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="">
            <a href="{{ url('/layoutAdm')}}">
              <i class="fa fa-home"></i>
              <p>Inicio</p>
            </a>
          </li>
          <li>
            <a href="{{ url('/ticket-soporte')}}">
              <i class="fa fa-file-text-o"></i>
              <p>Solicitudes</p>  
            </a>
          </li>
          <li>
            <a href="{{ url('/Inventario')}}">
              <i class="fa fa-list"></i>
              <p>Inventario</p>
            </a>
          </li>
          <li>
            <a href="{{ url('/equipoAdm')}}">
              <i class="fa fa-laptop"></i>
              <p>Agregar Equipo</p>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="main-panel">
      <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user"></i>
                   &nbsp;
                </a>
                <ul class="dropdown-menu">
                  <li><a href="https://umas.ciisa.cl/alumnosnet/alumnos.asp" target="_blank">Portal de Alumnos</a></li>
                  <li class="divider"></li>
                  <li><a href="logout.php">Salir</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="content">
      <div class="container-fluid">
          <!-- Aqui comienza la vista de tickets -->

          <div class="row">
  <div class="col-md-12">

<!-- Aqui empieza la vista para un nuevo ticket -->
            <div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="green">
      <h4 class="title">Equipo</h4>
  </div>
  <div class="card-content table-responsive">
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
      <div class="col-lg-10">
        <select name="kind_id" disabled="true" class="form-control" required>
          <option value="{{$detalle -> tip_nombre}}" >{{$detalle -> tip_nombre}}</option>
        </select>
      </div>
    </div>
    <br><br>
    <form action="/update" method="POST">
    <div class="form-group">
      <center><label>Datos del equipo</label></center>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Codigo Equipo</label>
      <div class="col-lg-10">
        <input type="text" name="title" disabled="true" required class="form-control"   id="inputModelo" placeholder="Codigo del equipo" value="{{$detalle -> equ_codigo}}"> <a href="{{ url('/Inventario')}}" class="btn btn-success" role="button">Modificar</a>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Marca</label>
      <div class="col-lg-10">
        <input type="text" name="title" required class="form-control"  id="inputModelo" placeholder="Marca del equipo" value="{{$detalle -> equ_marca}}">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Modelo</label>
      <div class="col-lg-10">
        <input type="text" name="title" required class="form-control"   id="inputModelo" placeholder="Modelo del equipo" value="{{$detalle -> equ_modelo}}">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Numero de serie</label>
      <div class="col-lg-10">
        <input type="text" name="title" required class="form-control"  id="inputNumeroSerie" placeholder="Numero de serie del equipo" value="{{$detalle -> equ_numero_serie}}">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Fecha de adquisicion</label>
      <div class="col-lg-10">
        <input type="text" name="title" required class="form-control"  id="inputNombre" placeholder="Fecha de adquisicion del equipo" value="{{$detalle -> equ_fecha_adquisicion}}">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Estado</label>
      <div class="col-lg-10">
        <select name="kind_id" disabled="true" class="form-control" required>
          <option  value="{{$detalle -> est_nombre}}" >{{$detalle -> est_nombre}}</option>
        </select>
      </div>
    </div>
    <div  class="form-check">
      <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label for="mantencion">
          <input type="checkbox" id="mantencion" name="options" value="mantencion" onclick="ShowMantencion()" class="only-one"> Mantencion
        </label>
        <label for="baja">
          <input type="checkbox" id="baja" name="options" value="baja" onclick="ShowDarDeBaja() " class="only-one"> Dar De Baja
        </label>
        
      <div class="form-group"  id = "fMantencion" style="display: none" >
          <label for="fechaInicio" class="col-lg-2 control-label">Fecha de Inicio</label>
            <div class="col-lg-10">
             <input type="date" name="title" required class="form-control"  id="FInicio" placeholder="Fecha de inicio mantencion" value="">
            </div>

            <label for="fechaTermino" class="col-lg-2 control-label">Fecha de Termino</label>
            <div class="col-lg-10">
             <input type="date" name="title" required class="form-control"  id="FTermino" placeholder="Fecha de termino mantencion" value="">
            </div>

            <label for="Comentario" class="col-lg-2 control-label">Comentario</label>
            <div class="col-lg-10" >
             <textarea class="form-control z-depth-1" name="Mtextarea"placeholder="Agregue un Comentario"  rows="10" cols="50"></textarea>
            </div>
      </div>

      <div class="form-group"  id = "fBaja" style="display: none" >
          
            <label for="Comentario" class="col-lg-2 control-label">Comentario</label>
            <div class="col-lg-10" >
             <textarea class="form-control z-depth-1" name="Btextarea" placeholder="Agregue un Comentario"  rows="10" cols="50"></textarea>
            </div>
      </div>
         <script type="text/javascript">


          function ShowMantencion() {
          var mantencion = document.getElementById ( "mantencion" );
          var baja = document.getElementById ( "baja" );
          var fBaja = document.getElementById ( "fBaja" );
          var fMantencion = document.getElementById ( "fMantencion" );
          fMantencion.style.display = mantencion.checked? "block": "none" ;
          baja.checked = false;
          fBaja.style.display = mantencion.checked? "none": "block" ;
          }
          function ShowDarDeBaja() {
          var baja = document.getElementById ( "baja" );
          var mantencion = document.getElementById ( "mantencion" );
          var fBaja = document.getElementById ( "fBaja" );
          var fMantencion = document.getElementById ( "fMantencion" );
          fBaja.style.display = baja.checked? "block" : "none" ;
          mantencion.checked = false;
          fMantencion.style.display = baja.checked? "none": "block" ;
          }


        </script> 
        
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10">
        <button  class="btn btn-success">Modificar</button>
      <a href="{{ url('/Inventario')}}" class="btn btn-secondary" role="button">Volver</a>
      </div>
    </div>

  </form>
  </div>
</div>
</div>

          <!-- Aqui termina la vista -->
          </div>
    </div>
  </div>
</body>
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <script src="js/material.min.js" type="text/javascript"></script>
  <script src="js/chartist.min.js"></script>
  <script src="js/bootstrap-notify.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
  <script src="js/material-dashboard.js"></script>
  <script src="js/demo.js"></script>

</html>