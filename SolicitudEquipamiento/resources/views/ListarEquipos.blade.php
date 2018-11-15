 @extends('layoutBase')

@section('titulo')
  Lista de Equipos
@stop

@section('contenido')

 <div class="col-md-12">


<div class="card">
  <div class="card-header" data-background-color="green">
      <h4 class="title">Inventario</h4>
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
  <form action="/show" method="POST">
	<div class="datagrid"><table>
  
        
		<thead><th>Codigo</th>
      <th>Fecha de adquisición</th>
		<th>Tipo</th>
		<th>N° de serie</th>
		<th>Marca</th>
		<th>Modelo</th>
		<th>Estado</th> 
		<th>Ver detalle</th></thead>
          <tbody>
          @foreach($TablaInventario as $DatoEquipo)
          <tr><td>{{$DatoEquipo -> equ_codigo}}</td><td>{{$DatoEquipo -> equ_fecha_adquisicion}}</td><td>{{ $DatoEquipo -> tip_nombre}}</td><td>{{$DatoEquipo -> equ_numero_serie}}</td><td>{{$DatoEquipo -> equ_marca}}</td><td>{{$DatoEquipo -> equ_modelo}}</td><td>{{ $DatoEquipo-> est_nombre}}</td><td><a href="{{url('/DetalleDeEquipo/'.$DatoEquipo->equ_codigo)}}"><input type="button" id="detalle" value="..."></a></td></tr>
          @endforeach
		
		
	</tbody>
  </form>
	</table></div>
	

	</div>
		


	</form>
      </div>
      </div>


  </div>
</div>

@stop