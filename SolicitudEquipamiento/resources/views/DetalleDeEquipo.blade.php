@extends('layoutBase')

@section('titulo')
  Detalle del Equipo
@stop

@section('contenido')


<!-- Aqui empieza la vista para un nuevo ticket -->
            <div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="green">
      <h4 class="title" >Equipo {{$detalle -> equ_codigo}}</h4>
  </div>
  <div class="card-content table-responsive">


    <form action="{{url('/update')}}" method="POST">
    {{csrf_field()}}
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
      <div class="col-lg-10">
      <input type="text" name="tip_nombre" required class="form-control" readonly="true"  id="tip_nombre" placeholder="Tipo de equipo" value="{{$detalle -> tip_nombre}}"> 
      </div>
    </div>
    <div class="form-group" hidden="true">
      <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
      <div class="col-lg-10">
        <select name="tip_nombres" hidden="true" readonly="true" class="form-control" required>
          <option value="{{$detalle -> equ_tipo_equipo}}" hidden="">{{$detalle -> tip_nombre}}</option>
        </select>
      </div>
    </div>
    <br><br>
   
    <div class="form-group" hidden="true">
      <label for="inputEmail1" class="col-lg-2 control-label" hidden="true">Codigo Equipo</label>
      <div class="col-lg-10">
        <input type="text" name="equ_codigo" maxlength="15"  pattern="[A-Za-z0-9]" required class="form-control" readonly="true"  id="equ_codigo" placeholder="Codigo del equipo" value="{{$detalle -> equ_codigo}}"> 
      </div>
    </div>
    <div class="form-group" >
      <label for="inputEmail1" class="col-lg-2 control-label">Marca</label>
      <div class="col-lg-10">
        <input type="text" name="equ_marca"  maxlength="30" <?php if($detalle -> est_codigo== 2 ||  $detalle -> est_codigo== 3) {  ?> readonly="true" <?php } ?> required class="form-control"  id="equ_marca" placeholder="Marca del equipo" pattern="[A-Za-z0-9]{6,30}"   value="{{$detalle -> equ_marca}}">
      </div>
    </div>
    <div class="form-group" >
      <label for="inputEmail1" class="col-lg-2 control-label">Modelo</label>
      <div class="col-lg-10">
        <input type="text" name="equ_modelo" <?php if($detalle -> est_codigo== 2 || $detalle -> est_codigo== 3){  ?> readonly="true" <?php } ?> maxlength="30" pattern="[A-Za-z0-9]{6,30}"   required class="form-control"   id="equ_modelo" placeholder="Modelo del equipo" value="{{$detalle -> equ_modelo}}">
      </div>
    </div>
    <div class="form-group" >
      <label for="inputEmail1" class="col-lg-2 control-label">Numero de serie</label>
      <div class="col-lg-10">
        <input type="text" name="equ_numero_serie" <?php if($detalle -> est_codigo== 2 || $detalle -> est_codigo== 3){  ?> readonly="true" <?php } ?> required class="form-control"  pattern="[A-Za-z0-9]{6,30}" id="equ_numero_serie" maxlength="30" placeholder="Numero de serie del equipo" value="{{$detalle -> equ_numero_serie}}">
      </div>
    </div>
    <div class="form-group" >
      <label for="inputEmail1" class="col-lg-2 control-label">Fecha de adquisicion</label>
      <div class="col-lg-10">
        <input type="date" <?php if($detalle -> est_codigo== 2 || $detalle -> est_codigo== 3){  ?> readonly="true" <?php } ?> name="equ_fecha_adquisicion" required class="form-control"  id="inputNombre" placeholder="Fecha de adquisicion del equipo" value="{{$detalle -> equ_fecha_adquisicion}}">
      </div>
    </div>
    <div class="form-group" <?php if($detalle -> est_codigo== 2 || $detalle -> est_codigo== 3){  ?> readonly="true" <?php } ?>>
      <label for="inputEmail1" class="col-lg-2 control-label">Estado</label>
      <div class="col-lg-10">
        <input type="text" name="est_codigo" disabled="true" required class="form-control"  id="est_codigo" placeholder="Estado" value="{{$detalle -> est_nombre}}">
      </div>
    </div>
    <div class="form-group" <?php if($detalle -> est_codigo== 2 || $detalle -> est_codigo== 3){  ?> readonly="true" <?php } ?>>
      <label for="inputEmail1" class="col-lg-2 control-label">Cambiar estado:</label>
      <div class="col-lg-10">
        <select name="EstadoC"   class="form-control" required>
        <option value="0">Seleccione un estado</option>
          @foreach($estado as $estad)
            <option value="{{ $estad -> est_codigo }}">{{ $estad -> est_nombre }}</option>
          @endforeach
        </select>
      </div>

<div class="form-group"  <?php if($detalle -> est_codigo== 4){  ?>style="display: block" <?php } ?>   id = "fMantencion" style="display: none" >
          <label for="fechaInicio" class="col-lg-2 control-label">Fecha de Inicio</label>
            <div class="col-lg-10">
             <input type="date" name="FInicio"   class="form-control" <?php if($detalle -> est_codigo== 4){  ?> value="{{$detalle -> equ_fecha_inicio}}" readonly="true" <?php  } ?>  id="FInicio" placeholder="Fecha de inicio mantencion" onclick="boton()" value="">
            </div>

            <label for="fechaTermino" class="col-lg-2 control-label">Fecha de Termino</label>
            <div class="col-lg-10">
             <input type="date"  name="FTermino" <?php if($detalle -> est_codigo== 4){  ?> value="{{$detalle -> equ_fecha_fin}}" readonly="true" <?php  } ?>  class="form-control"  id="FTermino"  placeholder="Fecha de termino mantencion" >
            </div>

            <label for="Comentario" class="col-lg-2 control-label">Comentario</label>
            <div class="col-lg-10" >
             <textarea class="form-control z-depth-1" <?php if($detalle -> est_codigo== 4){  ?> readonly="true"  <?php } ?> pattern="[A-Za-z0-9]{6,30}"  id="Mtextarea" name="Mtextarea" placeholder="Agregue un Comentario" maxlength="500" rows="3" cols="10"><?php if($detalle -> est_codigo == 4){  ?>{{$detalle -> equ_observacion}}  <?php } ?></textarea>
            </div>
      </div>

      <div class="form-group"   <?php if($detalle -> est_codigo== 3){  ?>style="display: block" <?php } ?> id = "fBaja" style="display: none" >
          
            <label for="Comentario" class="col-lg-2 control-label">Comentario</label>
            <div class="col-lg-10" >
             <textarea class="form-control z-depth-1" <?php if($detalle -> est_codigo== 3){  ?> readonly="true"  <?php } ?>  id="Btextarea" name="Btextarea" placeholder="Agregue un Comentario"  rows="3" pattern="[A-Za-z0-9]{6,30}" maxlength="500" cols="10"><?php if($detalle -> est_codigo== 3){  ?>{{$detalle -> equ_observacion}}  <?php } ?></textarea>

           </div>
             <div <?php if($detalle -> est_codigo != 3){  ?>  style="display: none" <?php } ?>>
             <label for="fechaIngresoB" <?php if($detalle -> est_codigo != 3){  ?> style="display: none" <?php  } ?>  class="col-lg-2 control-label">Fecha de baja
              </label>
              <div class="col-lg-10" >
             <input type="text" name="FingresoB"  class="form-control"  id="FingresoB"  <?php if($detalle -> est_codigo== 3){  ?> value="{{$detalle -> equ_fecha}}" readonly="true" <?php  } ?> >
            </div>
            </div>

      </div>
      <script type="text/javascript">
      $(document).ready(function(){
      $("select.form-control").change(function(){
        var selectedEstado = $(this).children("option:selected").val();

        var mantencion = document.getElementById ( "mantencion" );
          var baja = document.getElementById ( "baja" );
          var fBaja = document.getElementById ( "fBaja" );
          var fMantencion = document.getElementById ( "fMantencion" );
          var finicio = document.getElementById('FInicio');
          var ftermino = document.getElementById('FTermino');
          var mtextarea = document.getElementById('Mtextarea');
          var btextarea = document.getElementById('Btextarea');


           if(selectedEstado == 4){
            if (confirm("¿Esta seguro de cambiar estado a mantencion?")) {
              fMantencion.style.display = "block";
              fBaja.style.display = "none";
              finicio.required = true;
              ftermino.required = true;
              mtextarea.required = true;
              baja.checked = false;               
            }  


          }else if(selectedEstado == 3){
            if (confirm("¿Esta seguro de dar de baja?")) {
              fBaja.style.display = "block";
              fMantencion.style.display = "none";
              finicio.required = false;
              ftermino.required = false;
              mtextarea.required = false;
              btextarea.required = true;
            }

          }else if(selectedEstado == 1){
            if (confirm("¿Esta seguro de cambiar estado a disponible?")) {
              fBaja.style.display = "none";
              fMantencion.style.display = "none";
              finicio.required = false;
              ftermino.required = false;
              mtextarea.required = false;
              btextarea.required = false;
            }
          }
            else if(selectedEstado == 0){
              fBaja.style.display = "none";
              fMantencion.style.display = "none";
              finicio.required = false;
              ftermino.required = false;
              mtextarea.required = false;
              btextarea.required = false;
            }


              });
      });

      $(document).ready(function () {
        $('#mensaje_error').hide();  
      });

      $("#FTermino").keyup(function () {
        var cont = $('#FInicio').val();
        var cont2 = $('#FTermino').val();
        document.getElementById('FInicio');
          var ftermino = document.getElementById('FTermino');
        if (cont > cont2) {
        alert("Fecha de inicio no debe ser menor que fecha de termino");
    } else {
        $('#mensaje_error').show();
    }

      });
        </script> 
    </div>
    
    <div class="form-group">
      <div class="col-lg-10">
        <button type="submit" name="mod" value="Modificar" class="btn btn-success" <?php if($detalle -> est_codigo== 2 ){  ?> disabled="true" <?php } ?> >Modificar</button>
      <a href="{{ url('/ListarEquipos')}}" class="btn btn-secondary" role="button">Volver</a>
      
      </div>
    </div>
    <div class="form-group" style="display: none">
      <label for="inputEmail1" class="col-lg-2 control-label">Fecha de adquisicion</label>
      <div class="col-lg-10">
        <input type="datetime" name="equ_fecha_ingreso" required class="form-control"  id="inputNombre" placeholder="Fecha de adquisicion del equipo" value="{{$detalle -> equ_fecha_ingreso}}">
      </div>
    </div>

  </form>
  </div>
</div>
</div>


@stop