 @extends('layoutBase')

@section('titulo')
  Lista de Equipos
@stop

@section('contenido')
{{csrf_field()}}
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
      <input type="text" name="myInput" id="myInput" pattern="[A-Za-z0-9]{6,30}" class="form-control" placeholder="Palabra clave">
    </div>
    </div>
</div>
 @foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg)) 
<div class="success" role="alert">
  <strong>Se han guardado datos con exito</strong> 
</div>
 @endif @endforeach 
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
    <tbody>
  </tbody>

  </table></div>
  <script>


/*$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {

      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});*/
$(document).ready(function(){
fetch_customer_data();
 function fetch_customer_data(query = '')
 {
  console.log(query);
  $.ajax({
   url:'{{ route("ListaEquipos.filtrar") }}',
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    console.log(data);
    $('tbody').html(data);
   },
   error:function(data){
    console.log(data);
    console.log(data.errors);
   }
  })
 }
//text  compararlo con el input cantidad 
 $(document).on('keyup', '#myInput', function(){
  var query = $(this).val();
  console.log(query);
  fetch_customer_data(query);
 });
 });

function detalle()
{
  document.getElementById("detalle").innerHTML = "Hello World";
}
        </script> 

  </div>
    


  </form>
      </div>
      </div>


  </div>
</div>

@stop