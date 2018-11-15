@extends('Solicitud')

@section('listaED')
	@foreach($TablaInventario as $DatoEquipo)
		<tr>
			<td>{{$DatoEquipo -> equ_codigo}}</td>
			<td>{{$DatoEquipo -> equ_modelo}}</td>
			<td>{{$DatoEquipo -> equ_marca}}</td>
			<td>{{$DatoEquipo -> equ_numero_serie}}</td>
		</tr>
	@endforeach
@stop