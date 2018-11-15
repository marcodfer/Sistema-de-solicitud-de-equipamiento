@extends('layoutBase')

@section('titulo')
	Lista de Solicitudes
@stop

@section('contenido')

	<div class="col-md-12">


<div class="card">
  <div class="card-header" data-background-color="green">
      <h4 class="title">Tickets</h4>
  </div>
  <div class="card-content table-responsive">
<form action="ListaSolicitud" method="POST" class="form-horizontal" role="form">

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
		<th>Rut Solicitante</th>
		<th>Sala</th>  
		<th>Ver detalle</th></thead>

		
		<tbody>
		@foreach($ListaS as $listaS)
		<tr>
			<td>{{ $listaS -> sol_fecha_creacion }}</td>
			<td>{{ $listaS -> sol_fecha_entrega }}</td>
			<td>{{ $listaS -> sol_codigo }}</td>
			<td>{{ $listaS -> usu_rut }}</td>
			<td>{{ $listaS -> sal_codigo }}</td>
			<td><a href="{{ url('/detalle-soporte')}}"><input type="button" id="detalle" value="..." ></a></td>
		</tr>
		@endforeach
	</tbody>
	</table></div>
</form>
  	</div>
	
      </div>
      </div>

@stop