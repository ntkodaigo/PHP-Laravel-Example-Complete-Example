@extends('layout')
    
@section('content')
	
	@include('personas/roles')

	<h1>Lista de personas del Sistema</h1>

	<input type="hidden" name="idpersona">

	<table class="table table-hover" id="personas-table">
        <thead class="thead-inverse">
            <tr>
                <th>Nombres</th>
                <th>A. Paterno</th>
                <th>A. Materno</th>
                <th>Razon Social</th>
                <th>Ruc</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>

@stop

@push('scripts')
<script type="text/javascript">

	var personasTable;

	// datatables default
	$.extend( true, $.fn.dataTable.defaults, {
	    processing: true,
	  	serverSide: true,
	  	pageLength: 10,
	  	lengthMenu: [3, 6, 10, 15, 20, 50, 75, 100],
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
	} );

	$(function(){
		$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		  });

		personasTable = $('#personas-table').DataTable({
	          ajax:'/personasData',
	          columns: [
	              { data: 'personabytype.nombres', name: 'personabytype.nombres', defaultContent: '<i>No tiene</i>'},
	              { data: 'personabytype.apellido_paterno', name: 'personabytype.apellido_paterno', defaultContent: '<i>No tiene</i>'},
	              { data: 'personabytype.apellido_materno', name: 'personabytype.apellido_materno', defaultContent: '<i>No tiene</i>'},
	              { data: 'personabytype.razonsocial', name: 'personabytype.razonsocial', defaultContent: '<i>No tiene</i>'},
	              { data: 'personabytype.ruc', name: 'personabytype.ruc', defaultContent: '<i>No tiene</i>'},
	              { data: 'action', name: 'action', orderable: false, searchable: false}
	          ]
	      });

		//personasTable.page.len(10).draw();
	});

	function btnAllRoles(idpersona)
	{
		
	}
</script>
@endpush