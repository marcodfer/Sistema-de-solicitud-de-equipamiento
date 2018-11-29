@extends('layoutBase')

@section('titulo')
	Detalle de Solicitud
@stop

@section('contenido')

	<?php $usuarios = json_decode(Session::get('miSesion')) ?>
	<form action="/Solicitud/Detalle/modificar" method="POST">
    {{ csrf_field() }}
	<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="green">
      <h4 class="title">Solicitud {{ $listaSolicitud[0]->sol_codigo }} </h4>
  </div>
  <div class="card-content table-responsive">
    <input type="hidden" name="codigo" id="codigo" value="{{ $listaSolicitud[0]->sol_codigo }}">

  	<div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Rut del solicitante</label>
      <div class="col-lg-10">
        <input type="text" name="rut" readonly="true" class="form-control" id="rut" placeholder="Rut" value="{{ $listaSolicitud[0]->usu_rut }}" >
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Titulo</label>
      <div class="col-lg-10">
        <input type="text" name="titulo" readonly="true"  class="form-control" id="titulo" placeholder="Titulo" value="{{ $listaSolicitud[0]->sol_titulo }}" >
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Asunto</label>
      <div class="col-lg-10">
        <input type="text" name="asunto" readonly="true" class="form-control" id="asunto" placeholder="Asunto" value="">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1"  class="col-lg-2 control-label">Tipo de solicitante</label>
      <div class="col-lg-10">
        <input type="text" name="tipo_solicitante" class="form-control" id="tipo_solicitante" placeholder="Titulo" value="{{ $listaSolicitud[0] -> tip_nombre }}" readonly="true">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1"  class="col-lg-2 control-label">Tipo de solicitante</label>
      <div class="col-lg-10">
        <input type="text" name="estado" class="form-control" id="estado" placeholder="Estado" value="{{ $listaSolicitud[0] -> est_nombre }}" readonly="true">
      </div>
    </div>
<div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Equipos solicitados</label>
    <div class="datagrid"><table>
		<thead>
		<th>Codigo</th>
		<th>Modelo</th>
		<th>Marca</th>  
    	<th>Numero de Serie</th> 
		<th>Tipo de Equipo</th>
		<?php if($usuarios[0]->tip_nombre == 'Soporte'){ ?><th>Quitar Equipo</th><?php } ?>
	</thead>

		
		<tbody>
		@foreach($equipos as $equipo)
		<tr>
      		<td>{{ $equipo -> equ_codigo }}</td>
			<td>{{ $equipo -> equ_modelo }}</td>
			<td>{{ $equipo -> equ_marca }}</td>
			<td>{{ $equipo -> equ_numero_serie }}</td>
      		<td>{{ $equipo -> tip_nombre }}</td>
      		<?php if($usuarios[0]->tip_nombre == 'Soporte'){ ?><td><a href="{{url('quitarEquipo',['idEquipo'=> $equipo->equ_codigo, 'idSolicitud' => $listaSolicitud[0]->sol_codigo])}}"><input type="button" id="detalle" value="x" ></a></td></td><?php } ?>
		</tr>
		@endforeach
	</tbody>
	</table>
	</div>
</div>
    <!--<div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">El computador portátil se presta con los siguientes accesorios</label>
      <div class="col-lg-10">
        <input type="checkbox" name="title" class="form-control" id="inputPder">Cable de alimentación y cargador
        <input type="checkbox" name="title" class="form-control" id="inputMouse">Mouse
      </div>
    </div>-->
    <div class="form-group">
      <br><br><br>
      <label for="inputEmail1" class="col-lg-2 control-label">Fecha de uso</label>
      <div class="col-lg-10">
        <input type="text" name="fecha" readonly="true" required class="form-control" id="fecha" placeholder="Titulo" value="{{ $listaSolicitud[0] -> sol_fecha_entrega }}">
      </div>
    </div>
    <?php if($usuarios[0]->tip_nombre == 'Soporte'){ ?>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Modificaciónes</label>
    <div class="datagrid"><table>
		<thead>
		<th>Rut</th>
		<th>Accion</th>
		<th>Equipo</th>  
    	<th>Fecha de Modificacion</th>
	</thead>

		
		<tbody>
		@foreach($eliminados as $eliminado)
		<tr>
      		<td>{{ $eliminado -> aud_rut }}</td>
			<td>{{ $eliminado -> aud_observacion }}</td>
			<td>{{ $eliminado -> equ_codigo }}</td>
			<td>{{ $eliminado -> aud_fecha_modificacion }}</td>
		</tr>
		@endforeach
	</tbody>
	</table>
	</div>
</div>
<?php if ($listaSolicitud[0] -> est_nombre == 'Pendiente') { ?>
<div class="form-group">
      <br><br><br>
      <label for="inputEmail1" class="col-lg-2 control-label">Fecha de uso</label>
      <div class="col-lg-10">
        <input type="text" name="fecha" readonly="true" required class="form-control" id="fecha" placeholder="Titulo" value="{{ $listaSolicitud[0] -> sol_fecha_entrega }}">
      </div>
    </div>
  <?php } ?>
  <div class="form-group">
      <div class="col-lg-10">
        <?php if ($listaSolicitud[0] -> est_nombre == 'Pendiente') { ?>
          <button type="submit" name="action" class="btn btn-success" value="aceptar">Aceptar</button>
          <button type="submit" name="action" class="btn btn-danger" value="rechazar">Rechazar</button>
        <?php }elseif ($listaSolicitud[0] -> est_nombre == 'Aceptada') { ?>
          <button type="submit" name="action" class="btn btn-success" value="finalizar">Finalizar</button>
        <?php } ?>
      </div>
  </div>

  <?php }else{ ?>

    <div class="form-group">
      <div class="col-lg-10">
        <?php if ($listaSolicitud[0] -> est_nombre == 'Pendiente' || $listaSolicitud[0] -> est_nombre == 'Aceptada') { ?>
          <button type="submit" name="action" class="btn btn-danger" value="cancelar">Cancelar</button>
        <?php } ?>
      </div>
  </div>

  <?php } ?>
  </div>
</div>
</div>
</form>
@stop