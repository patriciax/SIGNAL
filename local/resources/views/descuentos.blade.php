@extends('partials.layout')

@section('content')

	@if(session('alert'))
        <ul class="collection">
          <li class="collection-item teal darken-3"><h5 class="center-align" style="color: white;">{{session('alert')}}</h5></li>
        </ul>
    @endif

	<div class="float-btn">
		<p class="center-align">
			<a class="btn-floating btn btn-small waves-effect waves-light modal-trigger" href="#modal_descuento"><i class="material-icons">add</i></a>
		</p>

	</div>
	<div class="container container--card">
<table class="bordered">
		<thead>
			<tr>
				<th>Cedula</th>
				<th>Nombre</th>
				<th>Deuda Inicial</th>
				<th>Deuda Actual</th>
				<th>Cuota</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($descuentos as $descuento)
				<tr>
					<td>
						{{$descuento->cedula}}
					</td>
					<td>
						{{$descuento->nombre}} {{$descuento->apellido}}
					</td>
					<td>
						{{$descuento->deuda_inicial}}
					</td>
					<td>
						{{$descuento->deuda_actual}}
					</td>
					<td>
						{{$descuento->cuota}}
					</td>
					<td class="center-flex">
						<p>
							<a class="waves-effect waves-light btn btn-small gray"><i class="material-icons right" onclick="eliminar({{$descuento->id}})">delete</i></a>
							<form style="display: none;" method="post" action="{{url('/borrar_descuento/'.$descuento->id)}}" id="eliminar{{$descuento->id}}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
							</form>
						</p>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	</div>
	

	<!-- Modal -->
		<div id="modal_descuento" class="modal">
			 <div class="close-modal">
				<a href="#!" class="right-align modal-action modal-close waves-effect waves-green btn-flat "><i class="material-icons right">close</i></a>

			</div>
			
    		<div class="modal-content">
      			<h4>Datos</h4>
      			<form method="POST" action="{{url('/crear_descuento')}}" id="form_descuento">
      				<input type="hidden" name="_token" value="{{ csrf_token() }}">
      				<div class="row">
				        <div class="input-field col s12">
				          <input id="cedula" type="text" class="validate" name="cedula">
				          <label for="cedula">Cedula</label>
				        </div>
				    </div>
				    <div class="row">
				        <div class="input-field col s12">
				          <input id="deuda_inicial" type="text" class="validate" name="deuda_inicial">
				          <label for="deuda_inicial">Deuda Inicial</label>
				        </div>
				    </div>
				    <div class="row">
				        <div class="input-field col s12">
				          <input id="cuota" type="text" class="validate" name="cuota">
				          <label for="cuota">Cuota</label>
				        </div>
				    </div>
				    <p class="right-align">
				    	<a class="waves-effect waves-light btn btn-medium" onclick="verificar()">Crear<i class="material-icons "></i></a>
				    </p>
      			</form>
    		</div>
    	
  		</div>

	<!---->

	<script type="text/javascript">
		$(document).ready(function(){
			$('#descuento').modal();
		});

		function verificar(){

			var cedula;
			var deuda_inicial;
			var cuota;

			cedula = document.getElementById('cedula').value;
			deuda_inicial = document.getElementById('deuda_inicial').value;
			cuota = document.getElementById('cuota').value;

			document.getElementById('form_descuento').submit();
		}

		function eliminar(id){
			swal({
				title: "¿Estás seguro?",
				text: "¡Eliminarás el descuento!",
				type: "warning",
				showCancelButton: true,
				cancelButtonText: "No",
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Si!",
				closeOnConfirm: false
			},
			function(){
				document.getElementById('eliminar'+id).submit();
			});
		}
	</script>

@endsection
