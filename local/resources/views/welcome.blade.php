<!DOCTYPE html>
<html>
    <head>
       @include('partials.head')
    </head>
    
    <body>
        
   
       
    
           
           <div class="row">
<!--                
               <div class="col l6 s12">
                   <div class="row">
                   		<div class="col s12">
			        <div class="card-panel z-depth-5 v-align animated slideInUp">

			        	<h4 class="center-align">Consulta tu recibo de pago</h4>
			          <form method="post" action="{{url('/verificar_nomina')}}">
			          <input type="hidden" name="_token" value="{{ csrf_token() }}">
			          	<div class="row">
			        		<div class="input-field col s12">
			          			<input id="email" type="text" class="validate" name="cedula">
			          			<label for="email">Cedula</label>
			        		</div>
			      		</div>

			          <p class="center-align"><button class="waves-effect waves-light btn" type="submit"><i class="material-icons right">send</i>Iniciar</button></p>

			          </form>
			        </div>
			      </div>
                   </div>

                   <div class="row">
                   		<div class="col s12">
			        <div class="card-panel z-depth-5 v-align animated slideInUp">

			        	<h4 class="center-align">Genera tu constancia de trabajo</h4>
			          <form method="post" action="{{url('/generarConstancia/2')}}">
			          <input type="hidden" name="_token" value="{{ csrf_token() }}">
			          	<div class="row">
			        		<div class="input-field col s12">
			          			<input id="cedula2" type="text" class="validate" name="cedula">
			          			<label for="cedula2">Cedula</label>
			        		</div>
			      		</div>

			          <p class="center-align"><button class="waves-effect waves-light btn" type="submit"><i class="material-icons right">send</i>Iniciar</button></p>

			          </form>
			        </div>
			      </div>
                   </div>
               </div> -->
               
               <div class="card-content__login">
                   
                   <div class="card-center">
        <div class=" v-align animated slideInUp">
		<div class="content-login">
        <div class="circle">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
        	<h4 class="center-align">Signal</h4>
          <form method="post" action="{{url('/handlelogin')}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          	<div class="row">
        		<div class="input-field col s12">
          			<input id="email" type="email" class="validate" name="email" autocomplete="off">
          			<label for="email"><i class="material-icons ">person</i>Correo</label>
        		</div>
      		</div>
          	<div class="row">
        		<div class="input-field col s12">
          			<input id="password" type="password" class="validate" name="password">
          			<label for="password"><i class="material-icons ">https</i>Clave</label>
        		</div>
      		</div>

          <p class="center-align"><button class="waves-effect  btn" type="submit">Iniciar</button></p>

		  </form>
		  @if(session('alert'))
        <ul class="alert-welcome__content">
          <li class="collection-item alert-welcome__item"><h5 class="center-align" style="color: white;">{{session('alert')}}</h5></li>
        </ul>
      @endif
        </div>
      </div>
	
                   
               </div>
               
           </div>
           
	
		
        
    </body>
    
</html>