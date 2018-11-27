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
      <input type="text" name="TBuscar" id="myInput" class="form-control" placeholder="Palabra clave">
    </div>
    </div>
</div>
 @foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg)) 
<div class="success" role="alert">
  <strong>Se han guardado datos con exito</strong> 
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
 @endif @endforeach 
  <form action="/show" method="POST">
    <br>
	<div class="datagrid"><table id="Busqueda">
  
        
		<thead><th>Codigo</th>
      <th>Fecha de adquisición</th>
		<th>Tipo</th>
		<th>N° de serie</th>
		<th>Marca</th>
		<th>Modelo</th>
		<th>Estado</th> 
		<th>Ver detalle</th></thead>
          <tbody id="myTable" >
         @foreach($TablaInventario as $DatoEquipo)
          <tr><td>{{$DatoEquipo -> equ_codigo}}</td><td>{{$DatoEquipo -> equ_fecha_adquisicion}}</td><td>{{ $DatoEquipo -> tip_nombre}}</td><td>{{$DatoEquipo -> equ_numero_serie}}</td><td>{{$DatoEquipo -> equ_marca}}</td><td>{{$DatoEquipo -> equ_modelo}}</td><td>{{ $DatoEquipo-> est_nombre}}</td><td><a href="{{url('/DetalleDeEquipo/'.$DatoEquipo->equ_codigo)}}"><input type="button" id="detalle" value="..."></a></td></tr>
          @endforeach
	</tbody>
  </form>
	</table></div>
	<center>{!! $TablaInventario->links() !!}</center>

  <script type="text/javascript">

/*$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {

      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});*/


 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:'{{ route("Filtrar.filtrar-equipo") }}',
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data);
   }
  })
 }
//text  compararlo con el input cantidad 
 $(document).on('keyup', '#myInput', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
        </script> 

	</div>
		


	</form>
      </div>
      </div>


  </div>
</div>

@stop