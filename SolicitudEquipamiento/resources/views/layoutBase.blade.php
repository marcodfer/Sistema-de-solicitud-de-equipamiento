<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>@yield('titulo')</title>

  
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
  <?php $usuarios = json_decode(Session::get('miSesion')) ?>
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
            <a href="{{ url('/ListaSolicitud')}}">
              <i class="fa fa-file-text-o"></i>
              <p>Solicitudes</p>  
            </a>
          </li>
          <?php if($usuarios[0]->tip_nombre == 'Soporte'){ ?>
          <li>
            <a href="{{ url('/ListarEquipos')}}">
              <i class="fa fa-list"></i>
              <p>Inventario</p>
            </a>
          </li>
          <li>
            <a href="{{ url('/AgregarEquipo')}}">
              <i class="fa fa-laptop"></i>
              <p>Agregar Equipo</p>
            </a>
          </li>
        <?php } ?>
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
                   {{$usuarios[0]->usu_nombre}}                </a>
                <ul class="dropdown-menu">
                  <li><a href="https://umas.ciisa.cl/alumnosnet/alumnos.asp" target="_blank">Portal de Alumnos</a></li>
                  <li class="divider"></li>
                  <li><a href="{{ url('/login')}}">Salir</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            @section('contenido')
            @show

          </div>
        </div>
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