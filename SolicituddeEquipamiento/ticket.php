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
              <i class="fa fa-ticket"></i>
              <p>Tickets</p>  
            </a>
          </li>
          <li>
            <a href="./layout.php">
              <i class="fa fa-laptop"></i>
              <p>Inventario</p>
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


<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Tickets</h4>
  </div>
  <div class="card-content table-responsive">
<form class="form-horizontal" role="form">

  <div class="form-group">
    <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-search"></i></span>
      <input type="text" name="q" class="form-control" placeholder="Palabra clave">
    </div>
    </div>
    <div class="col-lg-4">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-th-list"></i></span>
<select name="project_id" class="form-control">
<option value="">Equipo de Redes y Telecomunicación</option>
<option value="">Equipo Portátil</option>
    <option value=""></option>
</select>
    </div>
    </div>
    <div class="col-lg-2">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
      <input type="date" name="date_at" class="form-control" placeholder="Palabra clave">
    </div>
    </div>

    <div class="col-lg-2">
    <button class="btn btn-primary btn-block">Buscar</button>
    </div>

  </div>
</form>
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