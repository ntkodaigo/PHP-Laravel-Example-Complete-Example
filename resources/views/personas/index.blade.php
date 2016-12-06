@extends('layout')
    
@section('content')
	
	@include('personas/roles')
	<center>
		<h2>Lista de personas del Sistema</h2>
	</center>

	<center>
		<h4>En esta tabla se muestran todas las personas previamente registradas. Busque a la persona antes de registrar una nueva, puede usar los datos previamente registrados para registrarlo con un nuevo rol (Cliente, Proveedor o Tecnico). </h4>
	</center>

	<br>

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
	              { data: 'personabytype.nombres', name: 'personabytype.nombres', defaultContent: '<i style="color: lightgray;">No tiene</i>'},
	              { data: 'personabytype.apellido_paterno', name: 'personabytype.apellido_paterno', defaultContent: '<i style="color: lightgray;">No tiene</i>'},
	              { data: 'personabytype.apellido_materno', name: 'personabytype.apellido_materno', defaultContent: '<i style="color: lightgray;">No tiene</i>'},
	              { data: 'personabytype.razonsocial', name: 'personabytype.razonsocial', defaultContent: '<i style="color: lightgray;">No tiene</i>'},
	              { data: 'personabytype.ruc', name: 'personabytype.ruc', defaultContent: '<i style="color: lightgray;">No tiene</i>'},
	              { data: 'action', name: 'action', orderable: false, searchable: false}
	          ]
	      });

		//personasTable.page.len(10).draw();
	});

	function btnAllRoles(idpersona, persona_type)
	{
		var url="/personas/" + idpersona + "/searchRoles";
		var formData = {
	        idpersona: idpersona
	        //_method: jQuery("input[name=_method]").attr('value')
		}

		hideAllRoles();

	    $.post(url, formData, function(response){
		    if(response.success)
		    {
	             switch(persona_type)
	             {
	             	case "AppPersonanatural":
	             		// Cliente layer is 1
	             		if ((response.rollayer & 1) > 0)
	             		{
	             			$('#cliente-rol-node').each(
								function()
								{
									$(this).show();
								}
							);

							$('a[id=cliente-rol]').attr("href", '/clientes/show/pn/' + idpersona);
	             		}
	             		else
	             		{
	             			$('#cliente-new-rol-node').each(
								function()
								{
									$(this).show();
								}
							);

	             			$("form[id=cliente-new-rol]").attr('action','/clientes/addfrom/' + idpersona + '/pn');
	             		}
	             		// Proveedor layer is 2
	             		if((response.rollayer & 2) > 0)
	             		{
	             			$('#proveedor-rol-node').each(
								function()
								{
									$(this).show();
								}
							);

							$('a[id=proveedor-rol]').attr("href", '/proveedores/show/pn/' + idpersona);
	             		}
	             		else
	             		{
	             			$('#proveedor-new-rol-node').each(
								function()
								{
									$(this).show();
								}
							);

	             			$("form[id=proveedor-new-rol]").attr('action','/proveedores/addfrom/' + idpersona + '/pn');
	             		}
	             		// Tecnico layer is 4
	             		if((response.rollayer & 4) > 0)
	             		{
	             			$('#tecnico-rol-node').each(
								function()
								{
									$(this).show();
								}
							);

							$('a[id=tecnico-rol]').attr("href", '/tecnicos/show/' + idpersona);
	             		}
	             		else
	             		{
	             			$('#tecnico-new-rol-node').each(
								function()
								{
									$(this).show();
								}
							);

	             			$("form[id=tecnico-new-rol]").attr('action','/tecnicos/addfrom/' + idpersona);
	             		}

	             		if (response.rollayer == 7)
	             			showRegisterToLabel(false);
	             		else
	             			showRegisterToLabel(true);
	             		break;
             		case "AppPersonajuridica":
             			// Clientes layer is 1
             			if ((response.rollayer & 1) > 0)
	             		{
	             			$('#cliente-rol-node').each(
								function()
								{
									$(this).show();
								}
							);

							$('a[id=cliente-rol]').attr("href", '/clientes/show/pj/' + idpersona);
	             		}
	             		else
	             		{
	             			$('#cliente-new-rol-node').each(
								function()
								{
									$(this).show();
								}
							);

	             			$("form[id=cliente-new-rol]").attr('action','/clientes/addfrom/' + idpersona + '/pj');
	             		}
	             		// Proveedor layer is 2
	             		if((response.rollayer & 2) > 0)
	             		{
	             			$('#proveedor-rol-node').each(
								function()
								{
									$(this).show();
								}
							);

							$('a[id=proveedor-rol]').attr("href", '/proveedores/show/pj/' + idpersona);
	             		}
	             		else
	             		{
	             			$('#proveedor-new-rol-node').each(
								function()
								{
									$(this).show();
								}
							);

	             			$("form[id=proveedor-new-rol]").attr('action','/proveedores/addfrom/' + idpersona + '/pj');
	             		}

	             		if (response.rollayer == 3)
	             			showRegisterToLabel(false);
	             		else
	             			showRegisterToLabel(true);
             			break;
	             }
		    }
		    else
		    {
		    	alert("Hubo algún error.");
		    }
		}, 'json');
	}

	function hideAllRoles()
	{
		$('#cliente-rol-node').each(
			function()
			{
				$(this).hide();
			}
		);
		$('#proveedor-rol-node').each(
			function()
			{
				$(this).hide();
			}
		);
		$('#tecnico-rol-node').each(
			function()
			{
				$(this).hide();
			}
		);

		$('#cliente-new-rol-node').each(
			function()
			{
				$(this).hide();
			}
		);
		$('#proveedor-new-rol-node').each(
			function()
			{
				$(this).hide();
			}
		);
		$('#tecnico-new-rol-node').each(
			function()
			{
				$(this).hide();
			}
		);
	}

	function showRegisterToLabel(show)
	{
		$('#register-to-label').each(
			function()
			{
				if (!show)
					$(this).hide();
				else
					$(this).show();
			}
		);
	}
</script>
@endpush