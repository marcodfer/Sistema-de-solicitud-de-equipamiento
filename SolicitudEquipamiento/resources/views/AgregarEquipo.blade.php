@extends('layoutBase')

@section('titulo')
	Agregar Equipo
@stop

@section('contenido')

	<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="green">
      <h4 class="title">Nuevo Equipo</h4>
  </div>
   <form action="/create" method="POST">
    {{ csrf_field() }}
  <div class="card-content table-responsive">
    <div class="form-group">
      <center><label>Datos del equipo</label></center>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
      <div class="col-lg-10">
    <div class="col-lg-10">
      <select name="equ_tipo_equipo" class="form-control" required>

      @foreach ($TipoEquipo as $TiposEquipo)
          <option value="{{$TiposEquipo -> tip_id}}">{{$TiposEquipo -> tip_nombre}}</option>
        @endforeach
        </select>
      </div>
      </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Numero asignado al equipo</label>
      <div class="col-lg-10">
        <input type="text" name="equ_codigo" required class="form-control" id="inputNombre" placeholder="Codigo unico del equipo">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Marca</label>
      <div class="col-lg-10">
        <input type="text" name="equ_marca" required class="form-control" id="inputModelo" placeholder="Marca del equipo">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Modelo</label>
      <div class="col-lg-10">
        <input type="text" name="equ_modelo" required class="form-control" id="inputModelo" placeholder="Modelo del equipo">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Numero de serie</label>
      <div class="col-lg-10">
        <input type="text" name="equ_numero_serie" required class="form-control" id="inputNumeroSerie" placeholder="Numero de serie del equipo">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Fecha de adquisicion</label>
      <div class="col-lg-10">
        <input type="date" name="equ_fecha_adquisicion" required class="form-control" id="inputNombre" placeholder="Fecha de adquisicion del equipo">
      </div>  
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label"  style="visibility:hidden" >Estado</label>
      <div class="col-lg-10">
        <input type="number" name="est_codigo" required class="form-control" id="inputModelo" placeholder="Modelo del equipo" Value="1" disabled="true"  style="visibility:hidden">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-offset-2 col-lg-10">
        <button type="submit" class="btn btn-default">Agregar Equipo</button>
      </div>
    </div>
    
  </div>
  </form>
</div>
</div>

@stop