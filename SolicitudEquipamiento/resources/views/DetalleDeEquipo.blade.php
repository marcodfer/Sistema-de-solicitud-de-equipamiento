@extends('layoutBase')

@section('titulo')
	Lista de Solicitudes
@stop

@section('contenido')


<!-- Aqui empieza la vista para un nuevo ticket -->
            <div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="green">
      <h4 class="title">Equipo</h4>
  </div>
  <div class="card-content table-responsive">

    <form action="{{url('/update')}}" method="POST">
    {{csrf_field()}}
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
      <div class="col-lg-10">
        <select name="equ_tipo_equipo" id="equ_tipo_equipo" disabled="true" class="form-control">
          <option value="{{$detalle -> equ_tipo_equipo}}" >{{$detalle -> tip_nombre}}</option>
        </select>
      </div>
    </div>
    <br><br>
    <div class="form-group">
      <center><label>Datos del equipo</label></center>
    </div>
    <div class="form-group" style="visibility:hidden">
      <label for="Codigo" class="col-lg-2 control-label">Codigo Equipo</label>
      <div class="col-lg-10">
         <input type="text" name="equ_codigox" required class="form-control"  id="equ_codigox" placeholder="Codigo del equipo" value="{{$detalle -> equ_codigo}}"  >
      </div>
    </div
    <div class="form-group">
      <label for="Codigo" class="col-lg-2 control-label">Codigo Equipo</label>
      <div class="col-lg-10">

        <input type="text" name="equ_codigo" required class="form-control" disabled="true"  id="equ_codigo" placeholder="Codigo del equipo" value="{{$detalle -> equ_codigo}}">


        <button type="button" class="btn btn-success" onclick="ModCod()">Modificar</button>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Marca</label>
      <div class="col-lg-10">
        <input type="text" name="equ_marca" required class="form-control"  id="equ_marca" placeholder="Marca del equipo" value="{{$detalle -> equ_marca}}">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Modelo</label>
      <div class="col-lg-10">
        <input type="text" name="equ_modelo" required class="form-control"   id="equ_modelo" placeholder="Modelo del equipo" value="{{$detalle -> equ_modelo}}">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Numero de serie</label>
      <div class="col-lg-10">
        <input type="text" name="equ_numero_serie" required class="form-control"  id="equ_numero_serie" placeholder="Numero de serie del equipo" value="{{$detalle -> equ_numero_serie}}">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Fecha de adquisicion</label>
      <div class="col-lg-10">
        <input type="date" name="equ_fecha_adquisicion" required class="form-control"  id="inputNombre" placeholder="Fecha de adquisicion del equipo" value="{{$detalle -> equ_fecha_adquisicion}}">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Estado</label>
      <div class="col-lg-10">
        <input type="text" name="est_codigo" disabled="true" required class="form-control"  id="est_codigo" placeholder="Estado" value="{{$detalle -> est_nombre}}">
      </div>
    </div>
    <div  class="form-check">
        <label for="mantencion">
          <input type="checkbox" id="mantencion" name="options" value="mantencion" onclick="ShowMantencion()" class="only-one"> Mantencion
        </label>
        <label for="baja">
          <input type="checkbox" id="baja" name="options" value="baja" onclick="ShowDarDeBaja() " class="only-one"> Dar De Baja
        </label>
        
      <div class="form-group"  id = "fMantencion" style="display: none" >
          <label for="fechaInicio" class="col-lg-2 control-label">Fecha de Inicio</label>
            <div class="col-lg-10">
             <input type="date" name="FInicio"  class="form-control"  id="FInicio" placeholder="Fecha de inicio mantencion" value="">
            </div>

            <label for="fechaTermino" class="col-lg-2 control-label">Fecha de Termino</label>
            <div class="col-lg-10">
             <input type="date" name="FTermino"  class="form-control"  id="FTermino" placeholder="Fecha de termino mantencion" value="">
            </div>

            <label for="Comentario" class="col-lg-2 control-label">Comentario</label>
            <div class="col-lg-10" >
             <textarea class="form-control z-depth-1"  id="Mtextarea" name="Mtextarea" placeholder="Agregue un Comentario"  rows="10" cols="50"></textarea>
            </div>
      </div>

      <div class="form-group"  id = "fBaja" style="display: none" >
          
            <label for="Comentario" class="col-lg-2 control-label">Comentario</label>
            <div class="col-lg-10" >
             <textarea class="form-control z-depth-1"  id="Btextarea" name="Btextarea" placeholder="Agregue un Comentario"  rows="10" cols="50"></textarea>
            </div>
      </div>

         <script type="text/javascript">

          function ModCod() {
          var mensaje = confirm("Esta seguro de modificar Codigo?");
          if (mensaje) {
              var Codigo = document.getElementById ( "Codigo" );
              var equ_codigo = document.getElementById('equ_codigo');
              equ_codigo.disabled=false;
          } 
          }

          var mantencion = document.getElementById ( "mantencion" );
          var baja = document.getElementById ( "baja" );
          var fBaja = document.getElementById ( "fBaja" );
          var fMantencion = document.getElementById ( "fMantencion" );

          var finicio = document.getElementById('FInicio');
          var ftermino = document.getElementById('FTermino');
          var mtextarea = document.getElementById('Mtextarea');
          var btextarea = document.getElementById('Btextarea');

          function ShowMantencion() {
          if(mantencion.checked){
              fMantencion.style.display = "block";
              fBaja.style.display = "none";

              finicio.required = true;
              ftermino.required = true;
              mtextarea.required = true;

              baja.checked = false;
          }else if(!mantencion.checked && !baja.checked){
              fBaja.style.display = "none";
              fMantencion.style.display = "none";
              finicio.required = false;
              ftermino.required = false;
              mtextarea.required = false;
              btextarea.required = false;
            }
          }
          function ShowDarDeBaja() {
          if(baja.checked){
              fBaja.style.display = "block";
              fMantencion.style.display = "none";
              btextarea.required = true;
              mantencion.checked = false;
              
            }else if(!mantencion.checked && !baja.checked){
              fBaja.style.display = "none";
              fMantencion.style.display = "none";
              finicio.required = false;
              ftermino.required = false;
              mtextarea.required = false;
              btextarea.required = false;
            }
          }


        </script> 
    </div>
    <div class="form-group">
      <div class="col-lg-10">
        <button type="submit" class="btn btn-success">Modificar</button>
      <a href="{{ url('/ListarEquipos')}}" class="btn btn-secondary" role="button">Volver</a>
      </div>
    </div>

  </form>
  </div>
</div>
</div>


@stop