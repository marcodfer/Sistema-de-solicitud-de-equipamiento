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
  <link href="assets/css/estilos.css" rel="stylesheet" />
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
            <a href="./layoutAdm.php">
              <i class="fa fa-home"></i>
              <p>Inicio</p>
            </a>
          </li>
          <li>
            <a href="./ticket-soporte.html">
              <i class="fa fa-file-text-o"></i>
              <p>Solicitudes</p>  
            </a>
          </li>
          <li>
            <a href="./Inventario.html">
              <i class="fa fa-list"></i>
              <p>Inventario</p>
            </a>
          </li>
          <li>
            <a href="./equipoAdm.php">
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

<!-- Aqui empieza la vista para un nuevo ticket -->



            <div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="green">
      <h4 class="title">Equipo 024</h4>
  </div>
  <div class="card-content table-responsive">
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
      <div class="col-lg-10">
        <select name="kind_id" disabled="" class="form-control" required>
          <option>Equipo de Redes y Telecomunicación</option>
          <option>Equipo Portátil</option>
        </select>
      </div>
    </div>
    <br><br>
    <div class="form-group">
      <center><label>Datos del equipo</label></center>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Marca</label>
      <div class="col-lg-10">
        <input type="text" name="title" required class="form-control" id="inputModelo" placeholder="Marca del equipo" value="Cisco">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Modelo</label>
      <div class="col-lg-10">
        <input type="text" name="title" required class="form-control" id="inputModelo" placeholder="Modelo del equipo" value="Catalyst 2960">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Numero de serie</label>
      <div class="col-lg-10">
        <input type="text" name="title" required class="form-control" id="inputNumeroSerie" placeholder="Numero de serie del equipo" value="109874">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Estado</label>
      <div class="col-lg-10">
        <select name="kind_id" class="form-control" required>
          <option>Disponible</option>
          <option>Ocupado</option>
          <option>Dado de baja</option>
          <option>Mantenimiento</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Fecha de adquisicion</label>
      <div class="col-lg-10">
        <input type="text" name="title" required class="form-control" id="inputNombre" placeholder="Fecha de adquisicion del equipo" value="12-03-2018">
      </div>
    </div>
    <div class="form-group">
        <a href="Inventario.html"><input type="submit" id="BCancelar" value="Modificar"></a>
        <a href="Inventario.html"><input type="submit" id="BVolver" value="Volver"></a>
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