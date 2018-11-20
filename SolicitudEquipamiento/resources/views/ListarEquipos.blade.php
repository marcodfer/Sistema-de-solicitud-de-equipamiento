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

 
  <form action="/show" method="POST">
  <div class="input-group">
    <div class="col-lg-16">
    <span class="input-group-addon"><i class="fa fa-search"></i></span>
    <input class="form-control" id="myInput" type="text" placeholder="Buscar">
  </div>
</div>
	<div class="datagrid" ><table>
		<thead><th>Codigo</th>
      <th>Fecha de adquisición</th>
		<th>Tipo</th>
		<th>N° de serie</th>
		<th>Marca</th>
		<th>Modelo</th>
		<th>Estado</th> 
		<th>Ver detalle</th></thead>
          <tbody id="myTable">
          @foreach($TablaInventario as $DatoEquipo)
          <tr><td>{{$DatoEquipo -> equ_codigo}}</td><td>{{$DatoEquipo -> equ_fecha_adquisicion}}</td><td>{{ $DatoEquipo -> tip_nombre}}</td><td>{{$DatoEquipo -> equ_numero_serie}}</td><td>{{$DatoEquipo -> equ_marca}}</td><td>{{$DatoEquipo -> equ_modelo}}</td><td>{{ $DatoEquipo-> est_nombre}}</td><td><a href="{{url('/DetalleDeEquipo/'.$DatoEquipo->equ_codigo)}}"><input type="button" id="detalle" value="..."></a></td></tr>
          @endforeach
	<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
		
	</tbody>
  </form>
	</table></div>
	</div>
      </div>
      </div>
  </div>
</div>

@stop