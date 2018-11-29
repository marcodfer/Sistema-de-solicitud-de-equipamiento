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
      <form action="Solicitud" method="POST" id="formGenerar">
        {{ csrf_field() }}
			<div class="card-content table-responsive">
        <?php $usuarios = json_decode(Session::get('miSesion')) ?>
				<div class="form-group {{ $errors->has('usu_rut') ? 'has-error' : '' }}">
					<label for="inputEmail1"  class="col-lg-2 control-label">Rut de solicitante</label>
					
					<div class="col-lg-10">
						<input type="text" name="rut"<?php if($usuarios[0]->tip_nombre != 'Soporte'){ ?> readonly="true" <?php } ?> required class="form-control" id="rut" name="rut" placeholder="Nombre del solicitante" value="{{$usuarios[0]->usu_rut}}" maxlength="11" pattern="[0-9]{7,8}-[0-9Kk]{1}" >
            {!! $errors->first('usu_rut', '<span class="help-block">:message</span>') !!}
					</div>
				</div>
        <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Titulo de la solicitud</label>
            
            <div class="col-lg-10">
              <input type="text" name="sol_titulo" class="form-control" maxlength="60" pattern="[A-Za-z0-9]{6,30}" required id="titulo" placeholder="Titulo" value="{{ old('asunto') }}">
              </div>
        </div>
				<div class="form-group">
      				<label for="inputEmail1" class="col-lg-2 control-label">Asunto de la solicitud</label>
  					
  					<div class="col-lg-10">
    					<input type="text" name="sol_motivo" class="form-control" maxlength="150" pattern="[A-Za-z0-9]{6,30}" required id="asunto" placeholder="Asunto" >
      				</div>
				</div>
			    
			    <div class="form-group">
					<label for="inputEmail1" class="col-lg-2 control-label">Sede</label>
			
					<div class="col-lg-10">
      <select name="sede" id="sede" class="form-control" required >
        <option value="" disabled selected="true">Seleccione sede</option>
        @foreach ($lista_sede as $sede)
          <option value="{{$sede -> sed_codigo}}">{{$sede -> sed_nombre}}</option>
        @endforeach
        </select>
      </div>
			    </div>

			    <div class="form-group">
					<label for="inputEmail1" class="col-lg-2 control-label">Aula</label>
					
					<div class="col-lg-10">
            <select name="aula" id="aula" class="form-control" required>
              
            </select>
					</div>
			    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Tipo de equipo</label>
      <div class="col-lg-10">
        <select name="equ_tipo_equipo" id="equ_tipo_equipo" required class="form-control">
          <option value='' disabled selected="true" >Selecciona el tipo de equipo</option>
          @foreach($lista_tipoE as $TipoEquipo)
            <option value='{{$TipoEquipo->tip_id}}'>{{$TipoEquipo -> tip_nombre}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Cantidad de equipos</label>
      <div class="col-lg-10">
          <input type="number" id="cantidad" pattern="[0-9]" maxlength="3" name="cantidad" min="1" max="10" class="form-control" placeholder="Cantidad de equipos">
      </div>
    </div>
    <br><br><br><br><br><br><br><br>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Equipos disponibles</label>
  <div class="datagrid">
    <table id="tabla-equipo">
      <input type="hidden" id="hidden-equipo" value="0">
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
        <input type="date" name="fecha" class="form-control" pattern="[0-9]" id="fecha" required value="" >
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Hora de uso</label>
      <div class="col-lg-10">
        <input type="time" name="hora" min="09:00" max="22:30" pattern="[0-9]"  class="form-control" required id="hora" >
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-offset-2 col-lg-10">
        <button type="submit" id="generar" name='generar' class="btn btn-success" value="generar">Generar solicitud</button>
      </div>
    </div>
  </div>
</form>
</div>
<script >
$(document).ready(function(){

  window.onload = function(){
  var fecha = new Date();
  var mes = fecha.getMonth()+1;
  var hora = fecha.getHours();
  var minuto = fecha.getMinutes();
  var dia = fecha.getDate();
  var dia = dia +1;
  var ano = fecha.getFullYear();
  
  console.log(tiempo);
  if(hora<10)
    hora='0'+hora;
  if(minuto<10)
    minuto='0'+minuto;
  if(dia<10)
    dia='0'+dia;
  if(mes<10)
    mes='0'+mes;
  var tiempo = hora+":"+minuto;
  document.getElementById('fecha').value=ano+"-"+mes+"-"+dia;
  document.getElementById('fecha').min=ano+"-"+mes+"-"+dia;
  document.getElementById('hora').value=tiempo;
}

 fetch_customer_data();
fetch_customer_data1();

 var select = document.getElementById('equ_tipo_equipo');
select.addEventListener('change',
  function(){
    var query = $('#cantidad').val();
    var query1 = this.options[select.selectedIndex];
    fetch_customer_data(query,query1.value);
  });

var select = document.getElementById('sede');
select.addEventListener('change',
  function(){
    var query = this.options[select.selectedIndex];
    fetch_customer_data1(query.value);
  });

function fetch_customer_data1(query = '')
 {
  $.ajax({
   url:'{{ route("Solicitud.generar-sala") }}',
   method:'GET',
   data:{query:query},
   success:function(data)
   {
    $('#aula').html(data);
   }
  })
 }

 function fetch_customer_data(query = '',query1 = '')
 {
  $.ajax({
   url:'{{ route("Solicitud.buscar-equipo") }}',
   method:'GET',
   data:{query:query,query1:query1},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data);
   }
  })
 }

 $(document).on('keyup', '#cantidad', function(){
  var query = $(this).val();
  var query1 = $('#equ_tipo_equipo').val();
  fetch_customer_data(query,query1);
 });
});
</script>

@stop

