<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Solicitud de Equipamiento</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/material-dashboard.css" rel="stylesheet"/>
  <link href="assets/css/estilos.css" rel="stylesheet" />
  <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <script src="assets/js/jquery.min.js" type="text/javascript"></script>
  <link href='assets/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
  <link href='assets/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
  <script src='assets/fullcalendar/moment.min.js'></script>
  <script src='assets/fullcalendar/fullcalendar.min.js'></script>


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
            <a href="./layout.php">
              <i class="fa fa-home"></i>
              <p>Inicio</p>
            </a>
          </li>
          <li>
            <a href="./ticket.php">
              <i class="fa fa-file-text-o"></i>
              <p>Solicitudes</p>  
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
        <input type="text" name="title" disabled required class="form-control" id="inputNombre" placeholder="Titulo" value="Marco Antonio">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Asunto</label>
      <div class="col-lg-10">
        <input type="text" name="title" required class="form-control" id="inputAsunto" placeholder="Titulo">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Tipo de solicitante</label>
      <div class="col-lg-10">
        <input type="text" name="title" required class="form-control" id="inputNombre" placeholder="Titulo" value="Alumno" disabled>
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
      <label for="inputEmail1" class="col-lg-2 control-label">Cantidad</label>
      <div class="col-lg-10">
        <input type="number" min="1" max="10" name="title" required class="form-control" id="inputNombre" placeholder="Cantidad de equipos" value="2">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Marca</label>
      <div class="col-lg-10">
        <input type="text" name="title" disabled required class="form-control" id="inputModelo" placeholder="Marca del equipo" value="Lenovo, ASUS">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Modelo</label>
      <div class="col-lg-10">
        <input type="text" name="title" disabled required class="form-control" id="inputModelo" placeholder="Modelo del equipo" value="Thinkpad L440, ROG G56JR">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Numero de serie</label>
      <div class="col-lg-10">
        <input type="text" name="title" disabled required class="form-control" id="inputNumeroSerie" placeholder="Numero de serie del equipo" value="20J5A00TCL-PF13V1C8, 20J5A00TCL-PF1K87OP">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">El computador portátil se presta con los siguientes accesorios</label>
      <div class="col-lg-10">
        <input type="checkbox" name="fancy-checkbox-success" id="fancy-checkbox-success" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-success" class="[ btn btn-success ]">
                    <span class="glyphicon glyphicon-ok"></span>
                    <span>&nbsp;</span>
                </label>
                <label for="fancy-checkbox-success" class="[ btn btn-default active ]">
                    Cable de alimentación y cargador
                </label>
            </div>
            <input type="checkbox" name="fancy-checkbox-success2" id="fancy-checkbox-success2" autocomplete="off" />
        <div class="[ btn-group ]">
                <label for="fancy-checkbox-success2" class="[ btn btn-success ]">
                    <span class="glyphicon glyphicon-ok"></span>
                    <span>&nbsp;</span>
                </label>
                <label for="fancy-checkbox-success2" class="[ btn btn-default active ]">
                    Mouse
                </label>
            </div>
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

  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/material.min.js" type="text/javascript"></script>
  <script src="assets/js/chartist.min.js"></script>
  <script src="assets/js/bootstrap-notify.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
  <script src="assets/js/material-dashboard.js"></script>
  <script src="assets/js/demo.js"></script>

</html>