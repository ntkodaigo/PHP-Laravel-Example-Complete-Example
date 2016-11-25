@extends('layout')
    
@section('content')

	@if ($key == 'u' || $key == 's')
		@include('clientes/documento')
		@include('clientes/telefono');
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
						<input type="hidden" name="idpersonanatural" value="{{ $personanatural->idpersonanatural }}">

						<input type="hidden" name="idpersona" value="{{ $personanatural->persona->idpersona }}">
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
			        
			        @if ($key == 'c' || $key == 'u')
			        	<button id="save_cliente" type="submit"><i class="glyphicon glyphicon-edit"></i>Guardar</button>
			        @endif

			        <br><br>
			        @if ($key == 's')
						<div class="alert alert-info" role="alert"><h2>Documentos</h2></div>
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

						<div class="alert alert-info" role="alert"><h2>Teléfonos</h2></div>
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

						<div class="alert alert-info" role="alert"><h2>Direcciones</h2></div>

						<div class="alert alert-info" role="alert"><h2>Correos Electrónicos</h2></div>

						<div class="alert alert-info" role="alert"><h2>Profesiones</h2></div>
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

      	@endif

  	});

  	function capitalizeFirstLetter(string) {
	    return String(string).charAt(0).toUpperCase() + String(string).slice(1);
	}

</script>
@endpush