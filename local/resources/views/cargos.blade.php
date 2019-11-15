@extends('partials.layout')


@section('content')
    
       @if(session('alert'))
        <ul class="collection">
          <li class="collection-item teal darken-3"><h5 class="center-align" style="color: white;">{{session('alert')}}</h5></li>
        </ul>
      @endif
      <div class="float-btn">
        <p class="center-align"><a class="btn btn-small waves-effect modal-trigger" data-target="modal_cargos"><i class="material-icons">add</i></a></p>
      </div>

    <div class="row">
        
         @foreach($cargos as $cargo)
         
             <div class="col l3">
                <div class="card horizontal">
                  <div class="card-stacked">
                    <div class="card-content">
                        <form id="editar{{$cargo->id}}" method="post" action="{{url('/editar_cargo/'.$cargo->id)}}">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input id="descripcion" name="descripcion" type="text" class="validate" value="{{$cargo->descripcion}}">
                        </form>
                    </div>
                    <div class="card-action">
                      <div class="row center-flex">
                        <a onclick="verificar_editar({{$cargo->id}})" class="btn btn-small gray"><i class="material-icons">edit</i></a>
                        @if($cargo->status == 1)
                          <a onclick="eliminar({{$cargo->id}})" class="btn btn-small gray"><i class="material-icons">delete</i></a>
                          <form method="post" action="{{url('/borrar_cargos/'.$cargo->id)}}" id="eliminar{{$cargo->id}}">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          </form>
                        @else
                          <a onclick="activar({{$cargo->id}})" class="btn btn-small gray"><i class="material-icons">event_available</i></a>
                          <form method="post" action="{{url('/activar_cargos/'.$cargo->id)}}" id="activar{{$cargo->id}}">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          </form>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
         
         @endforeach
        
    </div>

    <div class="modal modal-fixed-footer" id="modal_cargos" style="height: 310px;">
      <div class="close-modal">
        <a href="#!" class="right-align modal-action modal-close waves-effect waves-green btn-flat "><i class="material-icons right">close</i></a>

    </div>
    	<div class="modal-content">
            <h4>Registrar cargo</h4>
            <form action="{{url('/crear_cargo')}}" method="post" id="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="input-field col s12">
                      <input id="nombre" name="nombre" type="text" class="validate">
                      <label for="nombre">Nombre del cargo</label>
                    </div>
                </div>
                  
                <p class="right-align"><a class="btn btn-medium" onclick="verificar()">Registrar<i class="material-icons right">send</i></a></p>
                
            </form>
        
        </div>
    </div>

    <script>

        function verificar(){
          var nombre = document.getElementById('nombre').value;
          if(!nombre){
            Materialize.toast('Nombre necesario', 4000);
          }
          else{
            document.getElementById('form').submit();
          }
        }

        function verificar_editar(id){
          var descripcion = document.getElementById('descripcion').value;
          if(!descripcion){
            Materialize.toast('Descripcion del departamento necesaria', 4000);
          }

          else{
            swal({
              title: "¿Estás seguro?",
              text: "¡Editarás el cargo!",
              type: "warning",
              showCancelButton: true,
              cancelButtonText: "No", 
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Si!",
              closeOnConfirm: false
            },
            function(){
              document.getElementById('editar'+id).submit();
            });
          }

        }
        
        function eliminar(id){
            swal({
              title: "¿Estás seguro?",
              text: "¡Eliminarás el cargo!",
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
        
        function activar(id){
            swal({
          title: "¿Estás seguro?",
          text: "¡Activarás el cargo!",
          type: "warning",
          showCancelButton: true,
          cancelButtonText: "No", 
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Si!",
          closeOnConfirm: false
        },
        function(){
          document.getElementById('activar'+id).submit();
        });
        }
        
    </script>

@endsection