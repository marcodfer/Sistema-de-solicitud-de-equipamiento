<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Solicitud de Equipamiento</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/estilos.css" rel="stylesheet" />
  <link href="css/material-dashboard.css" rel="stylesheet"/>
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet"> 
  <script src="js/jquery.min.js" type="text/javascript"></script>
  <link href='fullcalendar/fullcalendar.min.css' rel='stylesheet' />
  <link href='fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
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
        <!-- Aqui empieza la vista de cantidad y tipo de ticket -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                  <i class="fa fa-check"></i>
                </div>
                <div class="card-content">
                  <p class="category">Aceptados</p>
                  <h3 class="title">2</h3>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header" data-background-color="orange">
                  <i class="fa fa-clock-o"></i>
                </div>
                <div class="card-content">
                  <p class="category">Pendientes</p>
                  <h3 class="title">3</h3>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header" data-background-color="red">
                  <i class="fa fa-times"></i>
                </div>
                <div class="card-content">
                  <p class="category">Rechazados</p>
                  <h3 class="title">1</h3>
                </div>
              </div>
            </div>

<!-- Aqui empieza la vista para un nuevo ticket -->



            <div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="green">
      <h4 class="title">Nueva Solicitud</h4>
  </div>
  <div class="card-content table-responsive">
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
      <div class="col-lg-10">
        <select name="kind_id" class="form-control" required>
          <option>Equipo de Redes y Telecomunicación</option>
          <option>Equipo Portátil</option>
        </select>
      </div>
    </div>
    <br><br>
    <div class="form-group">
      <center><label>Datos del solicitante</label></center>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
      <div class="col-lg-10">
        <input type="text" name="title" required class="form-control" id="inputNombre" placeholder="Nombre del solicitante" value="">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Asunto</label>
      <div class="col-lg-10">
        <input type="text" name="title" required class="form-control" id="inputAsunto" placeholder="Asunto">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Tipo de solicitante</label>
      <div class="col-lg-10">
        <select name="kind_id" class="form-control" required>
          <option>Alumno</option>
          <option>Profesor</option>
          <option>Administrativo</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Sede</label>
      <div class="col-lg-10">
        <select name="kind_id" class="form-control" required>
          <option>Santa Lucia</option>
          <option>Republica</option>
          <option>Alameda</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Aula</label>
      <div class="col-lg-10">
        <input type="text" name="title" disabled required class="form-control" id="inputModelo" placeholder="Aula">
      </div>
    </div>
    <br><br>
    <div class="form-group">
      <center><label>Datos del equipo</label></center>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Codigo de equipo</label>
      <div class="input-group">
          <input type="text" name="title" required class="form-control" id="inputModelo" placeholder="Codigo unico del equipo">
          <span class="input-group-addon"></span>
          <button type="submit" class="btn btn-default">Agregar</button>
        </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Agregados</label>
    <div class="datagrid2">
        <table>
    <thead><th width="175">Equipo 0023<input type="button" id="cancelar"value="×"></th>
    <th width="175">Equipo 0024<input type="button" id="cancelar"value="×"></th>
  
    </thead>
    </table>
  </div>
</div>
<div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Fabricante</label>
      <div class="col-lg-10">
        <input type="text" name="title" disabled required class="form-control" id="inputModelo" placeholder="Modelo del equipo" value="">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Modelo</label>
      <div class="col-lg-10">
        <input type="text" name="title" disabled required class="form-control" id="inputModelo" placeholder="Modelo del equipo" value="">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Numero de serie</label>
      <div class="col-lg-10">
        <input type="text" name="title" disabled required class="form-control" id="inputNumeroSerie" placeholder="Numero de serie del equipo" value="">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">El computador portátil se presta con los siguientes accesorios</label>
      <div class="col-lg-10">
        <input type="checkbox" name="title" class="form-control" id="inputPder">Cable de alimentación y cargador
        <input type="checkbox" name="title" class="form-control" id="inputMouse">Mouse
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Fecha de uso</label>
      <div class="col-lg-10">
        <input type="date" name="title" required class="form-control" id="inputNombre" placeholder="Titulo">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-offset-2 col-lg-10">
        <button type="submit" class="btn btn-default">Generar solicitud</button>
      </div>
    </div>
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