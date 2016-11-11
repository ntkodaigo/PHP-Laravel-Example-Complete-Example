@extends('layout')
    
@section('content')

		<!--div class="row"-->
			<!--div class="col-md-6 col-md-offset-3"-->
				<h1>Registro de {{ $entityName }}</h1>
				<form method="POST"
					@if ($key == 'c')
						action="/clientes/add"
					@endif>
					@if ($key == 'u')
						{{method_field ('PATCH')}}
					@endif

			        <div class="form-group">
			            <label for="nombres" class="col-sm-2 col-form-label">Nombres</label>
			            <div class="col-sm-8">
			    			<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Mario" 
							@if ($key == 's')
			    				readonly
			    			@endif>
						</div>
						@if ($key == 's')
							<div class="col-sm-1">
				    			<a href="#" class="btn btn-primary btn-md" id="nombres_edit" name="nombres_edit">
	    							<span class="glyphicon glyphicon-pencil"></span>  
	  							</a>
				    		</div>
			    		@endif
			        </div>

			        <br><br><br>
			        
			        <div class="form-group">
			            <label for="nombres" class="col-sm-2 col-form-label">Apellido Paterno</label>
			            <div class="col-sm-8">
			    			<input type="text" class="form-control" id="apellido paterno" name="apellido paterno" placeholder="Bross" @if ($key == 's')
			    				readonly
			    			@endif>
						</div>
						@if ($key == 's')
							<div class="col-sm-1">
				    			<a href="#" class="btn btn-primary btn-md" id="aPaterno_edit" name="aPaterno_edit">
	    							<span class="glyphicon glyphicon-pencil"></span>  
	  							</a>
				    		</div>
			    		@endif
			        </div>

			        <br><br><br>

			        <div class="form-group">
			            <label for="nombres" class="col-sm-2 col-form-label">Apellido Materno</label>
			            <div class="col-sm-8">
			    			<input type="text" class="form-control" id="apellido materno" name="apellido materno" placeholder="Bross" @if ($key == 's')
			    				readonly
			    			@endif>
						</div>
						@if ($key == 's')
							<div class="col-sm-1">
				    			<a href="#" class="btn btn-primary btn-md" id="aMaterno_edit" name="aMaterno_edit">
	    							<span class="glyphicon glyphicon-pencil"></span>  
	  							</a>
				    		</div>
			    		@endif
			        </div>

			        <br><br><br>

			        <div id="birth-date" class="form-group">
			            <label class="col-sm-2 col-form-label">Fecha de nacimiento</label>
			            <!--div class="col-sm-8">
			    			<input data-provide="datepicker" class="datepicker form-control" data-date-format="dd/mm/yyyy" id="fechanacimientocreacion" name="fechanacimientocreacion" placeholder="2000/01/01">
						</div-->
						
						<div class="col-sm-8">
  							<input type="date" id="fechanacimientocreacion" name="fechanacimientocreacion" class="form-control" 
  							@if ($key == 's')
			    				readonly
			    			@endif>
						</div>
						@if ($key == 's')
							<div class="col-sm-1" >
				    			<a href="#" class="btn btn-primary btn-md" id="fnc_edit" name="fnc_edit">
	    							<span class="glyphicon glyphicon-pencil"></span>  
	  							</a>
				    		</div>
			    		@endif
						
						
			        </div>

			        <br><br><br>

			        <div class="form-group">
			            <label for="nombres" class="col-sm-2 col-form-label">Género</label>
			            <div class="col-sm-8">
				            <select name="idgenero" class="form-control dropdown-toggle" 
				            @if ($key == 's')
			    				disabled
			    			@endif>
				                @foreach ($generos as $genero)
				                <option value="{{ $genero -> idgenero }}">{{ ucfirst($genero-> nombregenero) }}</option>
				                @endforeach
				            </select>
			            </div>
			            @if ($key == 's')
							<div class="col-sm-1">
				    			<a href="#" class="btn btn-primary btn-md" id="genero_edit" name="genero_edit">
	    							<span class="glyphicon glyphicon-pencil"></span>  
	  							</a>
				    		</div>
			    		@endif
			        </div>
			        
			        <br><br>

					<div class="alert alert-info" role="alert"><h2>Documentos</h2></div>

					<div class="alert alert-info" role="alert"><h2>Teléfonos</h2></div>

					<div class="alert alert-info" role="alert"><h2>Direcciones</h2></div>

					<div class="alert alert-info" role="alert"><h2>Correos Electrónicos</h2></div>

					<div class="alert alert-info" role="alert"><h2>Profesiones</h2></div>
         			{{ csrf_field() }}
			    </form>
		    <!--/div>
	    </div-->
@stop

@section('footer')
	<script src="{{ URL::asset('js/clientes.crud.js') }}"> </script>
@stop