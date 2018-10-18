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
          <!-- Aqui comienza la vista de tickets -->

          <div class="row">
  <div class="col-md-12">


<div class="card">
  <div class="card-header" data-background-color="green">
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
    <input type="button" id="buscar" value="Buscar">
    </div>
	</div>
	<div class="datagrid"><table>
		<thead><th>Fecha solicitud</th>
		<th>Fecha retiro</th>
		<th>Ticket</th>
		<th>Nombre</th>
		<th>Tipo</th>
		<th>Cantidad</th>
		<th>Estado</th> 
		<th>Ver detalle</th></thead>

		
		<tbody>
		<tr><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><a href="{{ url('/detalle-soporte')}}"><input type="button" id="detalle" value="..." ></a></td></tr>
		
	</tbody>
	</table></div>

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