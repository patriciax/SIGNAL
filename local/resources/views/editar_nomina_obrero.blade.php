@extends('partials.layout')

@section('content')
    
    
     @if(session('alert'))
        <ul class="collection">
          <li class="collection-item teal darken-3"><h5 class="center-align" style="color: white;">{{session('alert')}}</h5></li>
        </ul>
      @endif

		<table class="bordered center-align">
        	<thead>
          <tr>
              <!-- <th data-field="id">Id</th> -->
              <th data-field="numero">Numero</th>
              <th data-field="tipo">Tipo</th>
              <th data-field="fecha_inicio">Fecha inicio</th>
              <th data-field="fecha_fin">Fecha fin</th>
              <th data-field="monto">Asignaciones</th>
              <th data-field="monto">Deducciones</th>
              <th data-field="monto">Patronal</th>
              <th class="center-align" data-field="acciones">Acciones</th>
          </tr>
        </thead>

        <tbody>

		@foreach($nominas as $nomina)
          <tr>
            <!-- <td>
              {{$nomina->id}}
            </td> -->
            <td>
            	{{$nomina->n_nomina}}
            </td>
            <td>
            	{{$nomina->tipo}}
            </td>
            <td>
            	{{$nomina->fecha_inicio}}
            </td>
            <td>
            	{{$nomina->fecha_fin}}
            </td>
            <td>
            	{{number_format($nomina->asignaciones, 2, ',', '.')}}
            </td>
            <td>
            	{{number_format($nomina->deducciones, 2, ',', '.')}}
            </td>
            <td>
            	{{number_format($nomina->patronal, 2, ',', '.')}}
            </td>
            <td class="center-align center-flex">
                
                @if($nomina->status == 0)

            		<a class="waves-effect btn btn-small gray tooltipped" data-position="left" data-tooltip="Editar" href="{{url('/editar_nomina_obrero_form/'.$nomina->id)}}"><i class="material-icons">edit</i></a>
            		<a class="waves-effect btn  btn-small gray tooltipped" data-position="top" data-tooltip="Eliminar" onclick="eliminar({{$nomina->id}})"><i class="material-icons">delete</i>
            			<form method="post" style="display:none;" action="{{url('/eliminar_nomina_obrero/'.$nomina->id)}}" id="form_eliminar{{$nomina->id}}">
            			    <input type="hidden" name="_token" value="{{ csrf_token() }}">
            			</form>
            		</a>

                @endif
                
            		<a class="waves-effect btn btn-small gray tooltipped" data-position="bottom" data-tooltip="Descargar txt" href="{{url('/descargar/'.$nomina->id)}}"><i class="material-icons">archive</i></a>
            		<a class="btn btn-small gray tooltipped waves-effect" target="_blank" data-position="top" data-tooltip="Generar Reporte" href="{{url('reporte/'.$nomina->id)}}" ><i class="material-icons">assignment</i></a>
            	
            </td>
          </tr>

		@endforeach

		</tbody>
      </table>

      {!! $nominas->setPath('') !!}
	
	<script>

    function eliminar(id){
        swal({
          title: "¿Estás seguro?",
          text: "¡Eliminarás la nomina!",
          type: "warning",
          showCancelButton: true,
          cancelButtonText: "No", 
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Si!",
          closeOnConfirm: false
        },
        function(){
          document.getElementById('form_eliminar'+id).submit();
        });
      }


    </script>

@endsection