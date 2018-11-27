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
      <input type="text" name="TBuscar" id="TBuscar" class="form-control" placeholder="Palabra clave">
    </div>
    </div>

    <div class="col-lg-4">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-th-list"></i></span>
<select name="project_id" class="form-control">
<option value="0">Escoja una opcion</option>
@foreach($tipoequipo as $tipequipo)
<option value="{{ $tipequipo -> tip_id }}">{{ $tipequipo -> tip_nombre }}</option>
  @endforeach
</select>
    </div>
    </div>
    <div class="col-lg-2">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
      <input type="date" name="date_at" class="form-control">
    </div>
    </div>

    <div class="col-lg-2">
      <a href="{{url('/Filtrar')}}"><input class="btn btn-success" name="Buscar" type="submit"  value="Buscar"></a>
    </form>
    </div>
	</div>
 @foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg)) 
<div class=" alert-success" style="color: green">Se han guardado datos con exito!!!!!!</div>
 @endif @endforeach 
  <form action="/show" method="POST">
    <br>
	<div class="datagrid"><table>
  
        
		<thead><th>Codigo</th>
      <th>Fecha de adquisición</th>
		<th>Tipo</th>
		<th>N° de serie</th>
		<th>Marca</th>
		<th>Modelo</th>
		<th>Estado</th> 
		<th>Ver detalle</th></thead>
          <tbody class="contenidobusqueda">
         @foreach($TablaInventario as $DatoEquipo)
          <tr><td>{{$DatoEquipo -> equ_codigo}}</td><td>{{$DatoEquipo -> equ_fecha_adquisicion}}</td><td>{{ $DatoEquipo -> tip_nombre}}</td><td>{{$DatoEquipo -> equ_numero_serie}}</td><td>{{$DatoEquipo -> equ_marca}}</td><td>{{$DatoEquipo -> equ_modelo}}</td><td>{{ $DatoEquipo-> est_nombre}}</td><td><a href="{{url('/DetalleDeEquipo/'.$DatoEquipo->equ_codigo)}}"><input type="button" id="detalle" value="..."></a></td></tr>
          @endforeach
	</tbody>
  </form>
	</table></div>
	<center>{!! $TablaInventario->links() !!}</center>

  <script type="text/javascript">
 
        </script> 

	</div>
		


	</form>
      </div>
      </div>


  </div>
</div>

@stop