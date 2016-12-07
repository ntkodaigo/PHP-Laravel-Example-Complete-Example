@extends('layout')

@section('header')
	<link rel="stylesheet" href="{{ URL::asset('css/clientes.crud.css') }}">
@stop
    
@section('content')
	@if ($key == 'u' || $key == 's')
		@if ($personaTypeName == 'Persona Natural')
			@include('personanatural/documento')
			@include('personanatural/profesion')
		@endif

		@include('personas/telefono')
		@include('personas/anexo')
		@include('personas/direccion')
		@include('personas/correo')

		@if ($entityName == 'Cliente')
			@include('clientes/clientevehiculo')
			@include('clientes/clientevehiculorevision')
			@include('clientes/vehiculo')
			@include('clientes/revision')
			@include('clientes/select-servicio')
			@include('clientes/select-tecnico')
			@include('clientes/factura')
		@endif
	@endif
		<!--div class="row"-->
			<!--div class="col-md-6 col-md-offset-3"-->
			<center>
				<h2>{{ $title }} {{ $entityName }} - {{ $personaTypeName }}</h2>
			</center>
			@if($key == 'c')
				<center>
					<h4>Asegurese de que la persona no exista buscándola en la opción "Búsqueda de personas" o en "Lista de" en cada rol, a su izquierda.</h4>
				</center>
			@endif
			<br>
			<form class="form-horizontal" role="form" id="frmPersona" method="POST"
				@if ($key == 'c')
					@if ($personaTypeName == 'Persona Natural')
						@if ($entityName == 'Cliente')
							action="/clientes/add/pn"
						@elseif ($entityName == 'Proveedor')
							action="/proveedores/add/pn"
						@elseif ($entityName == 'Técnico')
							action="/tecnicos/add"
						@endif
					@elseif ($personaTypeName == 'Persona Jurídica')
						@if ($entityName == 'Cliente')
							action="/clientes/add/pj"
						@elseif ($entityName == 'Proveedor')
							action="/proveedores/add/pj"
						@endif
					@endif
				@endif
				>
				@if ($key == 'u' || $key == 's')
					{{method_field ('PATCH')}}
				@endif

				@if ($key == 'u' || $key == 's')
					@if ($personaTypeName == 'Persona Natural')
						<input type="hidden" name="idpersonanatural" value="{{ $personanatural->idpersonanatural }}">

						<input type="hidden" name="idpersona" value="{{ $personanatural->persona->idpersona }}">
						@if ($entityName == 'Cliente')
							<input type="hidden" name="idcliente" value="{{ $personanatural->persona->cliente->idcliente }}">
						@elseif ($entityName == 'Proveedor')
							<input type="hidden" name="idproveedor" value="{{ $personanatural->persona->proveedor->idproveedor }}">
						@elseif ($entityName == 'Técnico')
							<input type="hidden" name="idtecnico" value="{{ $personanatural->tecnico->idtecnico }}">
						@endif
					@elseif ($personaTypeName == 'Persona Jurídica')
						<input type="hidden" name="idpersonajuridica" value="{{ $personajuridica->idpersonajuridica }}">

						<input type="hidden" name="idpersona" value="{{ $personajuridica->persona->idpersona }}">

						@if ($entityName == 'Cliente')
							<input type="hidden" name="idcliente" value="{{ $personajuridica->persona->cliente->idcliente }}">
						@elseif ($entityName == 'Proveedor')
							<input type="hidden" name="idproveedor" value="{{ $personajuridica->persona->proveedor->idproveedor }}">
						@endif
					@endif
				@endif	

				@if ($personaTypeName == 'Persona Natural')
			        <div class="form-group">
			            <label for="nombres" class="col-sm-3 col-form-label">Nombres</label>
			            <div class="col-sm-8">
			    			<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Escribe sus nombres" 
							@if ($key == 's')
								value="{{ $personanatural->nombres }}"  
			    				readonly
			    			@endif>
						</div>
						@if ($key == 's')
							<div class="col-sm-1">
				    			<a href="#" class="btn btn-primary btn-md" id="nombres_edit" name="nombres_edit">
	    							<span name="nombres_edit_glyph" class="glyphicon glyphicon-pencil"></span>  
	  							</a>
				    		</div>
			    		@endif
			        </div>
			        
			        <div class="form-group">
			            <label for="apellido_paterno" class="col-sm-3 col-form-label">Apellido Paterno</label>
			            <div class="col-sm-8">
			    			<input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Escribe su apellido paterno" 
			    			@if ($key == 's')
			    				value="{{ $personanatural->apellido_paterno }}"  
			    				readonly
			    			@endif>
						</div>
						@if ($key == 's')
							<div class="col-sm-1">
				    			<a href="#" class="btn btn-primary btn-md" id="aPaterno_edit" name="aPaterno_edit">
	    							<span name="aPaterno_edit_glyph" class="glyphicon glyphicon-pencil"></span>  
	  							</a>
				    		</div>
			    		@endif
			        </div>

			        <div class="form-group">
			            <label for="apellido_materno" class="col-sm-3 col-form-label">Apellido Materno</label>
			            <div class="col-sm-8">
			    			<input type="text" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Escribe su apellido materno" 
			    			@if ($key == 's')
			    				value="{{ $personanatural->apellido_materno }}"  
			    				readonly
			    			@endif>
						</div>
						@if ($key == 's')
							<div class="col-sm-1">
				    			<a href="#" class="btn btn-primary btn-md" id="aMaterno_edit" name="aMaterno_edit">
	    							<span name="aMaterno_edit_glyph" class="glyphicon glyphicon-pencil"></span>  
	  							</a>
				    		</div>
			    		@endif
			        </div>

			        <div class="form-group">
			            <label for="idgenero" class="col-sm-3 col-form-label">Género</label>
			            @if ($key == 's')
			            	<input type="hidden" id="genero-key" disabled>
			            @endif
			            <div class="col-sm-8">
				            <select name="idgenero" id="idgenero" class="form-control dropdown-toggle">
				                @foreach ($generos as $genero)
				                	<option value="{{ $genero -> idgenero }}" 
				                	@if ($key == 's')
				                		@if ($genero->idgenero === $personanatural->generos[0]->idgenero)
				                			selected
			                			@else
			                				disabled
				                		@endif
			                		@endif
				                	>
				                		{{ ucfirst($genero-> nombregenero) }}
				                	</option>
				                @endforeach
				            </select>
			            </div>
			            @if ($key == 's')
							<div class="col-sm-1">
				    			<a href="#" class="btn btn-primary btn-md" id="genero_edit" name="genero_edit">
	    							<span name="genero_edit_glyph" class="glyphicon glyphicon-pencil"></span>  
	  							</a>
				    		</div>
			    		@endif
			        </div>

		        @elseif ($personaTypeName == 'Persona Jurídica')
		        	<div class="form-group">
			            <label for="razonsocial" class="col-sm-3 col-form-label">Razón Social</label>
			            <div class="col-sm-8">
			    			<input type="text" class="form-control" id="razonsocial" name="razonsocial" placeholder="Escribe su Razón Social" 
							@if ($key == 's')
								value="{{ $personajuridica->razonsocial }}"  
			    				readonly
			    			@endif>
						</div>
						@if ($key == 's')
							<div class="col-sm-1">
				    			<a href="#" class="btn btn-primary btn-md" id="razonsocial_edit" name="razonsocial_edit">
	    							<span name="razonsocial_edit_glyph" class="glyphicon glyphicon-pencil"></span>  
	  							</a>
				    		</div>
			    		@endif
			        </div>
			        
			        <div class="form-group">
			            <label for="ruc" class="col-sm-3 col-form-label">RUC</label>
			            <div class="col-sm-8">
			    			<input type="text" class="form-control" id="ruc" name="ruc" placeholder="Escribe su RUC" 
			    			@if ($key == 's')
			    				value="{{ $personajuridica->ruc }}"  
			    				readonly
			    			@endif>
						</div>
						@if ($key == 's')
							<div class="col-sm-1">
				    			<a href="#" class="btn btn-primary btn-md" id="ruc_edit" name="ruc_edit">
	    							<span name="ruc_edit_glyph" class="glyphicon glyphicon-pencil"></span>  
	  							</a>
				    		</div>
			    		@endif
			        </div>
		        @endif

		        <div id="birth-date" class="form-group">
		            <label class="col-sm-3 col-form-label">
		            	@if ($personaTypeName == 'Persona Natural')
		            		Fecha de nacimiento
	            		@elseif ($personaTypeName == 'Persona Jurídica')
	            			Fecha de creación
	            		@endif
		            </label>
		            <!--div class="col-sm-8">
		    			<input data-provide="datepicker" class="datepicker form-control" data-date-format="dd/mm/yyyy" id="fechanacimientocreacion" name="fechanacimientocreacion" placeholder="2000/01/01">
					</div-->
					
					<div class="col-sm-8">
						<input type="date" id="fechanacimientocreacion" name="fechanacimientocreacion" class="form-control" 
						@if ($key == 's')
							@if ($personaTypeName == 'Persona Natural')
								value="{{ explode(' ', $personanatural->persona->nacimientocreacion->fechanacimientocreacion)[0] }}"
							@elseif ($personaTypeName == 'Persona Jurídica')
								value="{{ explode(' ', $personajuridica->persona->nacimientocreacion->fechanacimientocreacion)[0] }}"
							@endif
		    				readonly
		    			@else
		    				value="2000-01-01"
		    			@endif>
					</div>
					@if ($key == 's')
						<div class="col-sm-1" >
			    			<a href="#" class="btn btn-primary btn-md" id="fnc_edit" name="fnc_edit">
    							<span name="fechanac_edit_glyph" class="glyphicon glyphicon-pencil"></span>  
  							</a>
			    		</div>
		    		@endif
		        </div>

		        {{ csrf_field() }}
		        
		        @if ($key == 'c' || $key == 'u')
		        	<button class="btn btn-success" id="save_persona" style="float: right;" type="submit"><i class="glyphicon glyphicon-edit"></i>Guardar</button>
		        @endif
		        <br><br>

		        @if ($key == 's')
		        	@if ($entityName == 'Cliente')
			        	<div class="alert alert-info" role="alert"><h2 style="color: black;">Vehiculos asignados al Cliente</h2></div>
						<button data-toggle="modal" data-target="#clientevehiculo-modal" type="button" onclick="btnNewClienteVehiculo()"><i class="glyphicon glyphicon-book"></i>Nuevo Vehiculo del Cliente</button>

						<br><br>

						<table class="table table-hover" id="clientevehiculos-table">
					        <thead class="thead-inverse">
					            <tr>
					                <th>Placa</th>
					                <th>Marca</th>
					                <th>Modelo</th>
					                <th>Año</th>
					                <th>Acciones</th>
					            </tr>
					        </thead>
					    </table>

					    <div class="alert alert-info" role="alert"><h2 style="color: black;">Facturas pactadas con el Cliente</h2></div>


					    <button data-toggle="modal" data-target="#factura-modal" type="button" onclick="btnNewFactura()"><i class="glyphicon glyphicon-book"></i>Nueva Factura</button>

					    


				    @elseif ($entityName == 'Proveedor')
				    	<div class="alert alert-info" role="alert"><h2 style="color: black;">Productos que ofrece el Proveedor</h2></div>
				    	<div class="alert alert-info" role="alert"><h2 style="color: black;">Compras efectuadas previamente</h2></div>
			    	@elseif ($entityName == 'Técnico')
			    		<div class="alert alert-info" role="alert"><h2 style="color: black;">Revisiones pactadas por el Técnico</h2></div>
				    @endif

				    @if ($personaTypeName == 'Persona Natural')
						<div class="alert alert-info" role="alert"><h2 style="color: black;">Documentos</h2></div>
						<button data-toggle="modal" data-target="#documento-modal" type="button" onclick="btnNewDocumento()"><i class="glyphicon glyphicon-book"></i>Nuevo Documento</button>

						<br><br>

						<table class="table table-hover" id="documentos-table">
					        <thead class="thead-inverse">
					            <tr>
					                <th>Tipo Documento</th>
					                <th>Numero documento</th>
					                <th>Acciones</th>
					            </tr>
					        </thead>
					    </table>
				    @endif

					<div class="alert alert-info" role="alert"><h2 style="color: black;">Teléfonos</h2></div>
					<button data-toggle="modal" data-target="#telefono-modal" type="button" onclick="btnNewTelefono()"><i class="glyphicon glyphicon-book"></i>Nuevo Telefono</button>

					<br><br>

					<table class="table table-hover" id="telefonos-table">
				        <thead class="thead-inverse">
				            <tr>
				                <th>Tipo de Teléfono</th>
				                <th>Numero de Teléfono</th>
				                <th>Acciones</th>
				            </tr>
				        </thead>
				    </table>

					<div class="alert alert-info" role="alert"><h2 style="color: black;">Direcciones</h2></div>
					<button data-toggle="modal" data-target="#direccion-modal" type="button" onclick="btnNewDireccion()"><i class="glyphicon glyphicon-book"></i>Nueva Direccion</button>

					<br><br>

					<table class="table table-hover" id="direcciones-table">
				        <thead class="thead-inverse">
				            <tr>
				                <th>Direccion</th>
				                <th>Pais</th>
				                <th>Departamento</th>
				                <th>Provincia</th>
				                <th>Distrito</th>
				                <th>Acciones</th>
				            </tr>
				        </thead>
				    </table>

					<div class="alert alert-info" role="alert"><h2 style="color: black;">Correos Electrónicos</h2></div>
					<button data-toggle="modal" data-target="#correo-modal" type="button" onclick="btnNewCorreo()"><i class="glyphicon glyphicon-book"></i>Nuevo Correo Electrónico</button>

					<br><br>

					<table class="table table-hover" id="correos-table">
				        <thead class="thead-inverse">
				            <tr>
				                <th>Correo Electrónico</th>
				                <th>Acciones</th>
				            </tr>
				        </thead>
				    </table>

				    @if ($personaTypeName == 'Persona Natural')
						<div class="alert alert-info" role="alert"><h2 style="color: black;">Profesiones</h2></div>
						<button data-toggle="modal" data-target="#profesion-modal" type="button" onclick="btnNewProfesion()"><i class="glyphicon glyphicon-book"></i>Nueva Profesion</button>

						<br><br>

						<table class="table table-hover" id="profesiones-table">
					        <thead class="thead-inverse">
					            <tr>
					                <th>Profesion</th>
					                <th>Acciones</th>
					            </tr>
					        </thead>
					    </table>
				    @endif
				@endif
		    </form>
		    <!--/div>
	    </div-->
@stop

@section('footer')
	<script src="{{ URL::asset('js/personas.crud.js') }}"> </script>
@stop

@push('scripts')

<script type="text/javascript">
	$(function() {
		@if ($key == 's')
			@if ($personaTypeName == 'Persona Natural')
		      documentosTable = $('#documentos-table').DataTable({
		          ajax:'/documentosData/{{ $personanatural->idpersonanatural }}',
		          /*aoColumnDefs: [
				      { sType: 'string', aTargets: [ 0 ] }
			      ],*/
		          columns: [
		              { data: 'nombretipodocumento', name: 'nombretipodocumento', defaultContent: '<i>No tiene</i>' },
		              { data: 'pivot.numerodocumento', name: 'pivot.numerodocumento' },
		              { data: 'action', name: 'action', orderable: false, searchable: false}
		          ]
		      });
		  	@endif

		  	var ajaxString;
		  	@if ($personaTypeName == 'Persona Natural')
		      	ajaxString = '/telefonosData/{{ $personanatural->persona->idpersona }}';
	      	@elseif ($personaTypeName == 'Persona Jurídica')
	      	  	ajaxString = '/telefonosData/{{ $personajuridica->persona->idpersona }}';
	      	@endif

	      	telefonosTable = $('#telefonos-table').DataTable({
      		  ajax: ajaxString,
		      columns: [
		          { data: 'nombretipotelefono', name: 'nombretipotelefono', searchable: true },
		          { data: 'pivot.numeropersonatelefono', name: 'pivot.numeropersonatelefono' },
		          { data: 'action', name: 'action', orderable: false, searchable: false}
		      ],
		      createdRow: function ( row, data, index ) {
		      		var text = $('td', row).eq(0).html();
		            $('td', row).eq(0).html(capitalizeFirstLetter(text));
		      }
	      	});
	      	@if ($personaTypeName == 'Persona Natural')
		      @if ($personanatural->persona->hasTelefonos())
			      anexosTable = $('#anexos-table').DataTable({
			          ajax:'/anexosData/{{ $personanatural->persona->personatelefonos()->first()->idpersonatelefono }}',
			          columns: [
			              { data: 'numeroanexotelefono', name: 'numeroanexotelefono' },
			              { data: 'action', name: 'action', orderable: false, searchable: false}
			          ]
			      });
		      @endif
		    @elseif ($personaTypeName == 'Persona Jurídica')
		      @if ($personajuridica->persona->hasTelefonos())
			      anexosTable = $('#anexos-table').DataTable({
			          ajax:'/anexosData/{{ $personajuridica->persona->personatelefonos()->first()->idpersonatelefono }}',
			          columns: [
			              { data: 'numeroanexotelefono', name: 'numeroanexotelefono' },
			              { data: 'action', name: 'action', orderable: false, searchable: false}
			          ]
			      });
		      @endif
		    @endif
			
			@if ($personaTypeName == 'Persona Natural')
	          	ajaxString = '/direccionesData/{{ $personanatural->persona->idpersona }}';
	        @elseif ($personaTypeName == 'Persona Jurídica')
	          	ajaxString = '/direccionesData/{{ $personajuridica->persona->idpersona }}';
      	    @endif

		    direccionesTable = $('#direcciones-table').DataTable({
		      ajax: ajaxString,
	          columns: [
	              { data: 'nombredireccionpersona', name: 'nombredireccionpersona' },
	              { data: 'pais.nombrepais', name: 'pais.nombrepais' },
	              { data: 'departamento.nombredepartamento', name: 'departamento.nombredepartamento' },
	              { data: 'provincia.nombreprovincia', name: 'provincia.nombreprovincia' },
	              { data: 'distrito.nombredistrito', name: 'distrito.nombredistrito' },
	              { data: 'action', name: 'action', orderable: false, searchable: false}
	          ]
	        });

		    @if ($personaTypeName == 'Persona Natural')
	          	ajaxString = '/correosData/{{ $personanatural->persona->idpersona }}';
	        @elseif ($personaTypeName == 'Persona Jurídica')
	          	ajaxString = '/correosData/{{ $personajuridica->persona->idpersona }}';
      	  	@endif

	        correosTable = $('#correos-table').DataTable({
	          ajax: ajaxString,
	          columns: [
	              { data: 'direccioncorreoelectronico', name: 'direccioncorreoelectronico' },
	              { data: 'action', name: 'action', orderable: false, searchable: false}
	          ]
	        });

	        @if ($personaTypeName == 'Persona Natural')
		      profesionesTable = $('#profesiones-table').DataTable({
		          ajax:'/profesionesData/{{ $personanatural->idpersonanatural }}',
		          columns: [
		              { data: 'nombretipoprofesion', name: 'nombretipoprofesion' },
		              { data: 'action', name: 'action', orderable: false, searchable: false}
		          ]
		      });
	        @endif

	        @if ($entityName == 'Cliente')

	        	@if ($personaTypeName == 'Persona Natural')
		          	ajaxString = '/vehiculosData/{{ $personanatural->persona->cliente->idcliente }}';
		        @elseif ($personaTypeName == 'Persona Jurídica')
		          	ajaxString = '/vehiculosData/{{ $personajuridica->persona->cliente->idcliente }}';
	          	@endif

		        clienteVehiculosTable = $('#clientevehiculos-table').DataTable({
		          ajax: ajaxString,
		          columns: [
		              { data: 'numeroplacavehivulo', name: 'numeroplacavehivulo' },
		              { data: 'marca.nombremarca', name: 'marca.nombremarca' },
		              { data: 'modelo.nombremodelo', name: 'modelo.nombremodelo' },
		              { data: 'aniovehiculo', name: 'aniovehiculo' },
		              { data: 'action', name: 'action', orderable: false, searchable: false}
		          ]
		        });

		        vehiculosTable = $('#vehiculos-table').DataTable({
		          ajax:'/vehiculosData/select',
		          columns: [
		              { data: 'numeroplacavehivulo', name: 'numeroplacavehivulo' },
		              { data: 'marca.nombremarca', name: 'marca.nombremarca' },
		              { data: 'modelo.nombremodelo', name: 'modelo.nombremodelo' },
		              { data: 'aniovehiculo', name: 'aniovehiculo' },
		              { data: 'action', name: 'action', orderable: false, searchable: false}
		          ]
		        });

		        vehiculosTable.page.len(3).draw();
	        @endif
	    @endif

  	});

  	function capitalizeFirstLetter(string) {
	    return String(string).charAt(0).toUpperCase() + String(string).slice(1);
	}

	function getBaseUrl() {
	    var re = new RegExp(/^.*\//);
    	return re.exec(window.location.href);
	}

</script>
@endpush