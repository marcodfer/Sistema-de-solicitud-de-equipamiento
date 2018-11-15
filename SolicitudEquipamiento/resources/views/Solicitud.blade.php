@extends('layoutBase')

@section('titulo')
	Solicitud de Equipamiento
@stop

@section('contenido')
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

	<div class="col-md-12">
		<div class="card">
  			<div class="card-header" data-background-color="green">
      			<h4 class="title">Nueva Solicitud</h4>
			</div>
			<form action="Solicitud" method="POST">
        {{csrf_field()}}
			<div class="card-content table-responsive">
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Tipo de equipo</label>
    			<div class="col-lg-10">
      <select name="equ_tipo_equipo" class="form-control" required>

      @foreach($TiposEquipo as $TipoEquipo)
          <option value='{{$TipoEquipo->tip_id}}'>{{$TipoEquipo -> tip_nombre}}</option>
        @endforeach
        </select>
      </div></div><br><br>
				
				<div class="form-group">
					<center><label>Datos del solicitante</label></center>
    			</div>
        <?php $usuarios = json_decode(Session::get('miSesion')) ?>
				<div class="form-group">
					<label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
					
					<div class="col-lg-10">
						<input type="text" name="title"<?php if($usuarios[0]->tip_nombre != 'Soporte'){ ?> readonly<?php } ?> required class="form-control" id="inputNombre" placeholder="Nombre del solicitante" value="{{$usuarios[0]->usu_nombre}}">
					</div>
				</div>
        <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Titulo</label>
            
            <div class="col-lg-10">
              <input type="text" name="sol_titulo" class="form-control" id="inputAsunto" placeholder="Titulo" value="{{ old('asunto') }}">
              </div>
        </div>
				<div class="form-group">
      				<label for="inputEmail1" class="col-lg-2 control-label">Asunto</label>
  					
  					<div class="col-lg-10">
    					<input type="text" name="sol_motivo" class="form-control" id="inputAsunto" placeholder="Asunto" value="{{ old('asunto') }}">
      				</div>
				</div>
			    
			    <div class="form-group">
					<label for="inputEmail1" class="col-lg-2 control-label">Sede</label>
			
					<div class="col-lg-10">
      <select name="equ_tipo_equipo" class="form-control" required>

      @foreach ($Sedes as $Sede)
          <option value="{{$Sede -> sed_codigo}}">{{$Sede -> sed_nombre}}</option>
        @endforeach
        </select>
      </div>
			    </div>

			    <div class="form-group">
					<label for="inputEmail1" class="col-lg-2 control-label">Aula</label>
					
					<div class="col-lg-10">
						<input type="text" name="aula" class="form-control" id="inputModelo" placeholder="Aula" value="{{ old('aula') }}">
					</div>
			    </div>
          
    <br><br>
    <div class="form-group">
      <center><label>Datos del equipo</label></center>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Cantidad de equipos</label>
      <div class="input-group">
          <input type="number" name="cantidad" min="1" max="10" required class="form-control" placeholder="Cantidad de equipos">
          <span class="input-group-addon"></span>
          <input type="submit" name="botonS" value="buscar" class="btn btn-default">
        </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Equipos disponibles</label>
  <div class="datagrid"><table>
  
        
    <thead><th>Codigo</th>
    <th>Modelo</th>
    <th>Marca</th>
    <th>N° de serie</th></thead>
          <tbody>
  @foreach($TablaInventario as $DatoEquipo)
    <tr>
      <td>{{$DatoEquipo -> equ_codigo}}</td>
      <td>{{$DatoEquipo -> equ_modelo}}</td>
      <td>{{$DatoEquipo -> equ_marca}}</td>
      <td>{{$DatoEquipo -> equ_numero_serie}}</td>
    </tr>
  @endforeach
  </tbody>
  </table></div>
  

  </div>
    <!--<div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">El computador portátil se presta con los siguientes accesorios</label>
      <div class="col-lg-10">
        <input type="checkbox" name="title" class="form-control" id="inputPder">Cable de alimentación y cargador
        <input type="checkbox" name="title" class="form-control" id="inputMouse">Mouse
      </div> 
    </div> -->
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Fecha de uso</label>
      <div class="col-lg-10">
        <input type="date" name="fecha" class="form-control" id="inputNombre" value="{{ old('fecha') }}">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Fecha de uso</label>
      <div class="col-lg-10">
        <input type="time" name="hora" class="form-control" id="inputNombre" value="{{ old('hora') }}">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-offset-2 col-lg-10">
        <button type="submit" name='generar' class="btn btn-default" value="generar">Generar solicitud</button>
      </div>
    </div>
  </div>
</form>
</div>
</div>
@stop