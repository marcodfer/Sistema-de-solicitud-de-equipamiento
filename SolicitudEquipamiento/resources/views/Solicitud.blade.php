@extends('layoutBase')

@section('titulo')
	Solicitud de Equipamiento
@stop

@section('contenido')
	<div class="col-lg-3 col-md-6 col-sm-6">
		<div class="card card-stats">
        	<div class="card-header" data-background-color="green">
          		<i class="fa fa-check" style="font-size:15px;" ></i>
        	</div>

        	<div class="card-content">
          		<p class="category">Aceptados</p>
          		<h3 class="title">{{ $AceptadoSol[0]->AceptadoSol }}</h3>
        	</div>
    	</div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
		<div class="card card-stats">
			<div class="card-header" data-background-color="orange">
				<i class="fa fa-clock-o" style="font-size:15px;" ></i>
            </div>

            <div class="card-content">
				<p class="category">Pendientes</p>
				<h3 class="title">{{ $PendienteSol[0]->PendienteSol }}</h3>
            </div>
		</div>
    </div>
	
	<div class="col-lg-3 col-md-6 col-sm-6">
		<div class="card card-stats">
			<div class="card-header" data-background-color="red">
				<i class="fa fa-times" style="font-size:15px;" ></i>
			</div>
			
			<div class="card-content">
				<p class="category">Rechazados</p>
				<h3 class="title">{{ $RechazadoSol[0]->RechazadoSol }}</h3>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="card">
  			<div class="card-header" data-background-color="green">
      			<h4 class="title">Nueva Solicitud</h4>
			</div>
			<div class="card-content table-responsive">
        <?php $usuarios = json_decode(Session::get('miSesion')) ?>
				<div class="form-group">
					<label for="inputEmail1" class="col-lg-2 control-label">Nombre del solicitante</label>
					
					<div class="col-lg-10">
						<input type="text" name="title"<?php if($usuarios[0]->tip_nombre != 'Soporte'){ ?> readonly<?php } ?> required class="form-control" id="inputNombre" placeholder="Nombre del solicitante" value="{{$usuarios[0]->usu_nombre}}">
					</div>
				</div>
        <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Titulo de la solicitud</label>
            
            <div class="col-lg-10">
              <input type="text" name="sol_titulo" class="form-control" id="inputAsunto" placeholder="Titulo" value="{{ old('asunto') }}">
              </div>
        </div>
				<div class="form-group">
      				<label for="inputEmail1" class="col-lg-2 control-label">Asunto de la solicitud</label>
  					
  					<div class="col-lg-10">
    					<input type="text" name="sol_motivo" class="form-control" id="inputAsunto" placeholder="Asunto" value="{{ old('asunto') }}">
      				</div>
				</div>
			    
			    <div class="form-group">
					<label for="inputEmail1" class="col-lg-2 control-label">Sede</label>
			
					<div class="col-lg-10">
      <select name="sede" id="sede" class="form-control">
        <option value="" value="" disable="true" selected="true">Seleccione sede</option>
        @foreach ($lista_sede as $sede)
          <option value="{{$sede -> sed_codigo}}">{{$sede -> sed_nombre}}</option>
        @endforeach
        </select>
      </div>
			    </div>

			    <div class="form-group">
					<label for="inputEmail1" class="col-lg-2 control-label">Aula</label>
					
					<div class="col-lg-10">
            <select name="aula" id="aula" class="form-control">
              <option value="" disable="true" selected="true">Selecione aula</option>
            </select>
					</div>
			    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Tipo de equipo</label>
      <div class="col-lg-10">
        <select name="equ_tipo_equipo" id="equ_tipo_equipo" class="form-control">
          @foreach($lista_tipoE as $TipoEquipo)
            <option value='{{$TipoEquipo->tip_id}}'>{{$TipoEquipo -> tip_nombre}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Cantidad de equipos</label>
      <div class="col-lg-10">
          <input type="number" id="cantidad" name="cantidad" min="1" max="10" required class="form-control" placeholder="Cantidad de equipos">
      </div>
    </div></br><br><br><br><span></span>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Equipos disponibles</label>
  <div class="datagrid">
    <table>

    <thead><th>Codigo</th>
    <th>Modelo</th>
    <th>Marca</th>
    <th>N° de serie</th></thead>
    <tbody>
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
        <input type="datetime-local" name="fecha" class="form-control" id="inputNombre" value="{{ old('fecha') }}">
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
  {{csrf_field()}}
<script >
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:'{{ route("Solicitud.buscar-equipo") }}',
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data);
   }
  })
 }

 $(document).on('keyup', '#cantidad', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>

@stop

