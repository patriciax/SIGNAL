@extends('partials.layout')

@section('content')

    @if(session('alert'))
        <ul class="collection">
          <li class="collection-item teal darken-3"><h5 class="center-align" style="color: white;">{{session('alert')}}</h5></li>
        </ul>
    @endif

    <div class="container container--card">
        <h3 class="center-align">Imprimir Carga Familiar</h3>

		<form action="{{url('/carga_familiar_pdf')}}" method="post" id="form_buscar">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
		        <div class="input-field col s10">
		          <input id="cedula" type="text" class="validate" name="cedula">
		          <label for="cedula">Cedula</label>
				</div>
				<div class="col s2">
					<div class="">
						<p class="">
							<a class="waves-effect waves-light btn btn-medium" onclick="verificar()"><i class="material-icons">search</i></a>
						</p>
					</div>
				</div>
	      	</div>
			
			<br>
			<br>

			<p class="right-align">
	      		<a class="waves-effect waves-light btn btn-medium" target="_blank" href="{{url('/carga_familiar_todos_pdf')}}"><i class="material-icons right">search</i>Imprimir todos</a>
	      	</p>

		</form>
    </div>

	<script>
	
		function verificar(){
			var cedula = document.getElementById('cedula').value;

			if(!cedula){
				Materialize.toast('Cedula necesaria', 4000);
			}

			else{
				document.getElementById('form_buscar').submit();
			}

		}
	
	</script>

@endsection