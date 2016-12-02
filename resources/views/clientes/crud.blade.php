@extends('layout')

@section('header')
	<link rel="stylesheet" href="{{ URL::asset('css/clientes.crud.css') }}">
@stop
    
@section('content')

	@if ($key == 'u' || $key == 's')
		@include('clientes/documento')
		@include('clientes/telefono')
		@include('clientes/anexo')
		@include('clientes/direccion')
		@include('clientes/correo')
		@include('clientes/profesion')
		@include('clientes/clientevehiculo')
		@include('clientes/vehiculo')
	@endif
		<!--div class="row"-->
			<!--div class="col-md-6 col-md-offset-3"-->
				<h1>{{ $title }} {{ $entityName }} - {{ $clienteTypeName }}</h1>
				<form id="frmClientePN" method="POST"
					@if ($key == 'c')
						@if ($clienteTypeName == 'Persona Natural')
							action="/clientes/add/pn"
						@elseif ($clienteTypeName == 'Persona Juridica')
							action="/clientes/add/pj"
						@endif
					@endif
					>
					@if ($key == 'u' || $key == 's')
						{{method_field ('PATCH')}}
					@endif

					@if ($key == 'u' || $key == 's')
						@if ($clienteTypeName == 'Persona Natural')
							<input type="hidden" name="idpersonanatural" value="{{ $personanatural->idpersonanatural }}">

							<input type="hidden" name="idpersona" value="{{ $personanatural->persona->idpersona }}">

							<input type="hidden" name="idcliente" value="{{ $personanatural->persona->cliente->idcliente }}">
						@endif
					@endif	

			        <div class="form-group">
			            <label for="nombres" class="col-sm-2 col-form-label">Nombres</label>
			            <div class="col-sm-8">
			    			<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Mario" 
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

			        <br><br><br>
			        
			        <div class="form-group">
			            <label for="apellido_paterno" class="col-sm-2 col-form-label">Apellido Paterno</label>
			            <div class="col-sm-8">
			    			<input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Bross" @if ($key == 's')
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

			        <br><br><br>

			        <div class="form-group">
			            <label for="apellido_materno" class="col-sm-2 col-form-label">Apellido Materno</label>
			            <div class="col-sm-8">
			    			<input type="text" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Bross" 
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

			        <br><br><br>

			        <div id="birth-date" class="form-group">
			            <label class="col-sm-2 col-form-label">Fecha de nacimiento</label>
			            <!--div class="col-sm-8">
			    			<input data-provide="datepicker" class="datepicker form-control" data-date-format="dd/mm/yyyy" id="fechanacimientocreacion" name="fechanacimientocreacion" placeholder="2000/01/01">
						</div-->
						
						<div class="col-sm-8">
  							<input type="date" id="fechanacimientocreacion" name="fechanacimientocreacion" class="form-control" 
  							@if ($key == 's')
  								value="{{ explode(' ', $personanatural->persona->nacimientocreacion->fechanacimientocreacion)[0] }}" 
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

			        <br><br><br>

			        <div class="form-group">
			            <label for="idgenero" class="col-sm-2 col-form-label">Género</label>
			            <div class="col-sm-8">
				            <select name="idgenero" class="form-control dropdown-toggle">
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

			        {{ csrf_field() }}
			        
			        @if ($key == 'c' || $key == 'u')
			        	<button id="save_cliente" type="submit"><i class="glyphicon glyphicon-edit"></i>Guardar</button>
			        @endif

			        <br><br>
			        @if ($key == 's')
			        <div class="alert alert-info" role="alert"><h2 style="color: black;">Vehiculos del cliente</h2></div>
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
			    </form>
		    <!--/div>
	    </div-->
@stop

@section('footer')
	<script src="{{ URL::asset('js/clientes.crud.js') }}"> </script>
@stop

@push('scripts')

<script type="text/javascript">
	$(function() {

		@if ($key == 's' )
	      documentosTable = $('#documentos-table').DataTable({
	          processing: true,
	          serverSide: true,
	          ajax:'/documentosData/{{ $personanatural->idpersonanatural }}',
	          columns: [
	              { data: 'nombretipodocumento', name: 'nombretipodocumento' },
	              { data: 'pivot.numerodocumento', name: 'pivot.numerodocumento' },
	              { data: 'action', name: 'action', orderable: false, searchable: false}
	          ],
	          language: {
		            lengthMenu: "Mostrando _MENU_ registros por pagina",
		            zeroRecords: "Nada encontrado - lo siento",
		            info: "Mostrando página _PAGE_ de _PAGES_",
		            infoEmpty: "Ningún registro disponible",
		            emptyTable: "No hay datos en la tabla",
		            infoFiltered: "(encontrados de _MAX_ registros totales)",
		            search: "<i class='glyphicon glyphicon-search'></i>",
	                paginate: {
	                    previous: "Ant",
	                    next: "Sig",
	                    last: "Último",
	                    first: "Primero",
	                    page: "Página",
	                    pageOf: "de"
		        	}
		        }
	      });

	      telefonosTable = $('#telefonos-table').DataTable({
	          processing: true,
	          serverSide: true,

	          ajax:'/telefonosData/{{ $personanatural->persona->idpersona }}',
	          columns: [
	              { data: 'nombretipotelefono', name: 'nombretipotelefono', searchable: true },
	              { data: 'pivot.numeropersonatelefono', name: 'pivot.numeropersonatelefono' },
	              { data: 'action', name: 'action', orderable: false, searchable: false}
	          ],
	          createdRow: function ( row, data, index ) {
	          		var text = $('td', row).eq(0).html();
	                $('td', row).eq(0).html(capitalizeFirstLetter(text));
	          },
	          language: {
		            lengthMenu: "Mostrando _MENU_ registros por pagina",
		            zeroRecords: "Nada encontrado - lo siento",
		            info: "Mostrando página _PAGE_ de _PAGES_",
		            infoEmpty: "Ningún registro disponible",
		            emptyTable: "No hay datos en la tabla",
		            infoFiltered: "(encontrados de _MAX_ registros totales)",
		            search: "<i class='glyphicon glyphicon-search'></i>",
	                paginate: {
	                    previous: "Ant",
	                    next: "Sig",
	                    last: "Último",
	                    first: "Primero",
	                    page: "Página",
	                    pageOf: "de"
		        	}
		        }
	      });

	      @if ($personanatural->persona->hasTelefonos())
		      anexosTable = $('#anexos-table').DataTable({
		          processing: true,
		          serverSide: true,
		          ajax:'/anexosData/{{ $personanatural->persona->personatelefonos()->first()->idpersonatelefono }}',
		          columns: [
		              { data: 'numeroanexotelefono', name: 'numeroanexotelefono' },
		              { data: 'action', name: 'action', orderable: false, searchable: false}
		          ],
		          language: {
			            lengthMenu: "Mostrando _MENU_ registros por pagina",
			            zeroRecords: "Nada encontrado - lo siento",
			            info: "Mostrando página _PAGE_ de _PAGES_",
			            infoEmpty: "Ningún registro disponible",
			            emptyTable: "No hay datos en la tabla",
			            infoFiltered: "(encontrados de _MAX_ registros totales)",
			            search: "<i class='glyphicon glyphicon-search'></i>",
		                paginate: {
		                    previous: "Ant",
		                    next: "Sig",
		                    last: "Último",
		                    first: "Primero",
		                    page: "Página",
		                    pageOf: "de"
			        	}
			        }
		      });
		  @endif

		  direccionesTable = $('#direcciones-table').DataTable({
	          processing: true,
	          serverSide: true,

	          ajax:'/direccionesData/{{ $personanatural->persona->idpersona }}',
	          columns: [
	              { data: 'nombredireccionpersona', name: 'nombredireccionpersona' },
	              { data: 'pais.nombrepais', name: 'pais.nombrepais' },
	              { data: 'departamento.nombredepartamento', name: 'departamento.nombredepartamento' },
	              { data: 'provincia.nombreprovincia', name: 'provincia.nombreprovincia' },
	              { data: 'distrito.nombredistrito', name: 'distrito.nombredistrito' },
	              { data: 'action', name: 'action', orderable: false, searchable: false}
	          ],
	          /*createdRow: function ( row, data, index ) {
	          		var text = $('td', row).eq(0).html();
	                $('td', row).eq(0).html(capitalizeFirstLetter(text));
	          },*/
	          language: {
		            lengthMenu: "Mostrando _MENU_ registros por pagina",
		            zeroRecords: "Nada encontrado - lo siento",
		            info: "Mostrando página _PAGE_ de _PAGES_",
		            infoEmpty: "Ningún registro disponible",
		            emptyTable: "No hay datos en la tabla",
		            infoFiltered: "(encontrados de _MAX_ registros totales)",
		            search: "<i class='glyphicon glyphicon-search'></i>",
	                paginate: {
	                    previous: "Ant",
	                    next: "Sig",
	                    last: "Último",
	                    first: "Primero",
	                    page: "Página",
	                    pageOf: "de"
		        	}
		        }
	      });

	      correosTable = $('#correos-table').DataTable({
	          processing: true,
	          serverSide: true,

	          ajax:'/correosData/{{ $personanatural->persona->idpersona }}',
	          columns: [
	              { data: 'direccioncorreoelectronico', name: 'direccioncorreoelectronico' },
	              { data: 'action', name: 'action', orderable: false, searchable: false}
	          ],
	          /*createdRow: function ( row, data, index ) {
	          		var text = $('td', row).eq(0).html();
	                $('td', row).eq(0).html(capitalizeFirstLetter(text));
	          },*/
	          language: {
		            lengthMenu: "Mostrando _MENU_ registros por pagina",
		            zeroRecords: "Nada encontrado - lo siento",
		            info: "Mostrando página _PAGE_ de _PAGES_",
		            infoEmpty: "Ningún registro disponible",
		            emptyTable: "No hay datos en la tabla",
		            infoFiltered: "(encontrados de _MAX_ registros totales)",
		            search: "<i class='glyphicon glyphicon-search'></i>",
	                paginate: {
	                    previous: "Ant",
	                    next: "Sig",
	                    last: "Último",
	                    first: "Primero",
	                    page: "Página",
	                    pageOf: "de"
		        	}
		        }
	      });

	      profesionesTable = $('#profesiones-table').DataTable({
	          processing: true,
	          serverSide: true,

	          ajax:'/profesionesData/{{ $personanatural->idpersonanatural }}',
	          columns: [
	              { data: 'nombretipoprofesion', name: 'nombretipoprofesion' },
	              { data: 'action', name: 'action', orderable: false, searchable: false}
	          ],
	          /*createdRow: function ( row, data, index ) {
	          		var text = $('td', row).eq(0).html();
	                $('td', row).eq(0).html(capitalizeFirstLetter(text));
	          },*/
	          language: {
		            lengthMenu: "Mostrando _MENU_ registros por pagina",
		            zeroRecords: "Nada encontrado - lo siento",
		            info: "Mostrando página _PAGE_ de _PAGES_",
		            infoEmpty: "Ningún registro disponible",
		            emptyTable: "No hay datos en la tabla",
		            infoFiltered: "(encontrados de _MAX_ registros totales)",
		            search: "<i class='glyphicon glyphicon-search'></i>",
	                paginate: {
	                    previous: "Ant",
	                    next: "Sig",
	                    last: "Último",
	                    first: "Primero",
	                    page: "Página",
	                    pageOf: "de"
		        	}
		        }
	      });

	      clienteVehiculosTable = $('#clientevehiculos-table').DataTable({
	          processing: true,
	          serverSide: true,

	          ajax:'/vehiculosData/{{ $personanatural->persona->cliente->idcliente }}',
	          columns: [
	              { data: 'numeroplacavehivulo', name: 'numeroplacavehivulo' },
	              { data: 'marca.nombremarca', name: 'marca.nombremarca' },
	              { data: 'modelo.nombremodelo', name: 'modelo.nombremodelo' },
	              { data: 'añovehiculo', name: 'añovehiculo' },
	              { data: 'action', name: 'action', orderable: false, searchable: false}
	          ],
	          /*createdRow: function ( row, data, index ) {
	          		var text = $('td', row).eq(0).html();
	                $('td', row).eq(0).html(capitalizeFirstLetter(text));
	          },*/
	          language: {
		            lengthMenu: "Mostrando _MENU_ registros por pagina",
		            zeroRecords: "Nada encontrado - lo siento",
		            info: "Mostrando página _PAGE_ de _PAGES_",
		            infoEmpty: "Ningún registro disponible",
		            emptyTable: "No hay datos en la tabla",
		            infoFiltered: "(encontrados de _MAX_ registros totales)",
		            search: "<i class='glyphicon glyphicon-search'></i>",
	                paginate: {
	                    previous: "Ant",
	                    next: "Sig",
	                    last: "Último",
	                    first: "Primero",
	                    page: "Página",
	                    pageOf: "de"
		        	}
		        }
	      });

	      vehiculosTable = $('#vehiculos-table').DataTable({
	          processing: true,
	          serverSide: true,

	          ajax:'/vehiculosData/select',
	          columns: [
	              { data: 'numeroplacavehivulo', name: 'numeroplacavehivulo' },
	              { data: 'marca.nombremarca', name: 'marca.nombremarca' },
	              { data: 'modelo.nombremodelo', name: 'modelo.nombremodelo' },
	              { data: 'añovehiculo', name: 'añovehiculo' },
	              { data: 'action', name: 'action', orderable: false, searchable: false}
	          ],
	          /*createdRow: function ( row, data, index ) {
	          		var text = $('td', row).eq(0).html();
	                $('td', row).eq(0).html(capitalizeFirstLetter(text));
	          },*/
	          language: {
		            lengthMenu: "Mostrando _MENU_ registros por pagina",
		            zeroRecords: "Nada encontrado - lo siento",
		            info: "Mostrando página _PAGE_ de _PAGES_",
		            infoEmpty: "Ningún registro disponible",
		            emptyTable: "No hay datos en la tabla",
		            infoFiltered: "(encontrados de _MAX_ registros totales)",
		            search: "<i class='glyphicon glyphicon-search'></i>",
	                paginate: {
	                    previous: "Ant",
	                    next: "Sig",
	                    last: "Último",
	                    first: "Primero",
	                    page: "Página",
	                    pageOf: "de"
		        	}
		        }
	      });

	      vehiculosTable.page.len(3).draw();
      	@endif

  	});

  	function capitalizeFirstLetter(string) {
	    return String(string).charAt(0).toUpperCase() + String(string).slice(1);
	}

</script>
@endpush