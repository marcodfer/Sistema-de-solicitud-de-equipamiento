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
{{csrf_field()}}
  <div class="form-group">
    <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-search"></i></span>
      <input type="number" name="qTicket" class="form-control" placeholder="Codigo Ticket" required>
    </div>
    </div><?php $usuarios = json_decode(Session::get('miSesion')) ?>

    <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-search"></i></span>
      <input type="text" name="bRut"<?php if($usuarios[0]->tip_nombre != 'Soporte'){ ?> readonly value="{{$usuarios[0]->usu_rut}}"  <?php  } ?>  class="form-control" placeholder="Rut Solicitante" >
    </div>
    </div>
    

    <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-th-list"></i></span>

      <select name="bEstSolicitud" class="form-control" >
        <option value="" > Estado Solicitud </option>
        @foreach($EstSolicitudes as $EstSolicitud)
        <option value="{{ $EstSolicitud -> est_codigo }}"> {{ $EstSolicitud -> est_nombre }} </option>
        @endforeach 
      </select>

    </div>
    </div>

    <div class="col-lg-2">
    <button type="submit" name="Buscar" value="Buscar" class="btn btn-default">Buscar</button>
    </div>
	</div>
	<div class="datagrid"><table>
		<thead><th>Codigo</th>
		<th>Titulo</th>
		<th>Fecha de Entrega</th>
		<th>Rut del Solicitante</th>
		<th>Estado</th>  
    <th>Sala</th> 
		<th>Ver detalle</th></thead>

		
		<tbody>
		@foreach($ListaS as $listaS)
		<tr>
      <td>{{ $listaS -> sol_codigo }}</td>
			<td>{{ $listaS -> sol_titulo }}</td>
			<td>{{ $listaS -> sol_fecha_entrega }}</td>
			<td>{{ $listaS -> usu_rut }}</td>
      <td>{{ $listaS -> est_nombre }}
			<td>{{ $listaS -> sal_codigo }}</td>
			<td><a href="{{ url('/detalle-soporte')}}"><input type="button" id="detalle" value="..." ></a></td>
		</tr>
		@endforeach
	</tbody>
	</table>
</div>
<center>{!! $ListaS->render() !!}</center>
  @if(count($ListaS) == 0 )

  <h4 align="center"> Busqueda Sin Resultados </h4>

  @endif
</form>
  	</div>
	
      </div>
      </div>



@stop