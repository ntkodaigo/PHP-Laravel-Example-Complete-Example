$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });

var documentosTable;
var telefonosTable;
var anexosTable;
var directionsTable;
var correosTable;
var profesionsTable;
var vehiculosTable;

$(function(){
   	jQuery("a[name=nombres_edit]").click(function(){
   		if (!jQuery("input[name=nombres]").prop("readonly"))
   		{
   			var formData = {
	            nombres: $("#nombres").val()
	            //_method: jQuery("input[name=_method]").attr('value')
        	}
        	var id = jQuery("input[name=idpersonanatural]").attr('value');
			var url = "/clientes/update/pn/" + id;

        	$.post(url, formData, function(response){
			    if(response.success)
			    {
			    	jQuery("input[name=nombres]").attr("readonly",true);
			    	jQuery("span[name=nombres_edit_glyph]").attr("class",'glyphicon glyphicon-pencil');
			    }
			}, 'json');
   		}
   		else
   		{
   			jQuery("input[name=nombres]").attr("readonly",false);
   			$('#nombres').focus();
			jQuery("span[name=nombres_edit_glyph]").attr("class",'glyphicon glyphicon-floppy-disk');
   		}
	});

	jQuery("a[name=aPaterno_edit]").click(function(){
   		if (!jQuery("input[name=apellido_paterno]").prop("readonly"))
   		{
   			var formData = {
	            apellido_paterno: $("#apellido_paterno").val()
	            //_method: jQuery("input[name=_method]").attr('value')
        	}
        	var id = jQuery("input[name=idpersonanatural]").attr('value');
			var url = "/clientes/update/pn/" + id;

        	$.post(url, formData, function(response){
			    if(response.success)
			    {
			    	jQuery("input[name=apellido_paterno]").attr("readonly",true);
			    	jQuery("span[name=aPaterno_edit_glyph]").attr("class",'glyphicon glyphicon-pencil');
			    }
			}, 'json');
   		}
   		else
   		{
   			jQuery("input[name=apellido_paterno]").attr("readonly",false);
   			$('#apellido_paterno').focus();
			jQuery("span[name=aPaterno_edit_glyph]").attr("class",'glyphicon glyphicon-floppy-disk');
   		}
	});

	jQuery("a[name=aMaterno_edit]").click(function(){
   		if (!jQuery("input[name=apellido_materno]").prop("readonly"))
   		{
   			var formData = {
	            apellido_materno: $("#apellido_materno").val()
	            //_method: jQuery("input[name=_method]").attr('value')
        	}
        	var id = jQuery("input[name=idpersonanatural]").attr('value');
			var url = "/clientes/update/pn/" + id;

        	$.post(url, formData, function(response){
			    if(response.success)
			    {
			    	jQuery("input[name=apellido_materno]").attr("readonly",true);
			    	jQuery("span[name=aMaterno_edit_glyph]").attr("class",'glyphicon glyphicon-pencil');
			    }
			}, 'json');
   		}
   		else
   		{
   			jQuery("input[name=apellido_materno]").attr("readonly",false);
   			$('#apellido_materno').focus();
			jQuery("span[name=aMaterno_edit_glyph]").attr("class",'glyphicon glyphicon-floppy-disk');
   		}
	});

	jQuery("a[name=aMaterno_edit]").click(function(){
   		if (!jQuery("input[name=fechanacimientocreacion]").prop("readonly"))
   		{
   			var formData = {
	            fechanacimientocreacion: $("#fechanacimientocreacion").val()
	            //_method: jQuery("input[name=_method]").attr('value')
        	}
        	var id = jQuery("input[name=idpersonanatural]").attr('value');
			var url = "/clientes/update/pn/" + id;

        	$.post(url, formData, function(response){
			    if(response.success)
			    {
			    	jQuery("input[name=apellido_materno]").attr("readonly",true);
			    	jQuery("span[name=aMaterno_edit_glyph]").attr("class",'glyphicon glyphicon-pencil');
			    }
			}, 'json');
   		}
   		else
   		{
   			jQuery("input[name=apellido_materno]").attr("readonly",false);
   			$('#apellido_materno').focus();
			jQuery("span[name=aMaterno_edit_glyph]").attr("class",'glyphicon glyphicon-floppy-disk');
   		}
	});


	/*$('#birth-date .input-group.date').datepicker({
		language: "es",
	    calendarWeeks: true,
	    autoclose: true,
	    format: "dd/mm/yyyy",
	});*/
});

$('#frmClientePN').on('submit',function(e){
	jQuery("button[id=save_cliente]").attr("disabled",true);
});
$('#frmDocumento').on('submit',function(e){
	jQuery("input[id=regdocumento]").attr("disabled",true);
});
$('#frmTelefono').on('submit',function(e){
	jQuery("input[id=regtelefono]").attr("disabled",true);
});

$('#nombres').keypress(function(event){
  if(event.keyCode == 13){
    $('#nombres_edit').click();
  }
});
$('#apellido_paterno').keypress(function(event){
  if(event.keyCode == 13){
    $('#aPaterno_edit').click();
  }
});
$('#apellido_materno').keypress(function(event){
  if(event.keyCode == 13){
    $('#aMaterno_edit').click();
  }
});

/*$('#save_cliente').click(function(){
	
});*/

$('#frmDocumento').on('submit',function(e){
        e.preventDefault();
        var form=$('#frmDocumento');
        var formData=form.serialize();
        var url=form.attr('action');

        $.post(url, formData, function(response){
		    if(response.success)
		    {
				$('#documento-modal').modal('hide');
				documentosTable.ajax.reload();
		    }
		    else
		    {
				$('#documento-modal').modal('hide');
				documentosTable.ajax.reload();

				alert("El tipo de documento ya existe, intente con otro tipo de documento por favor.");	    	
		    }

		    $( '#frmDocumento' ).each(function(){
			    this.reset();
			});
		}, 'json');
});

function btnNewDocumento()
{
	jQuery("input[id=regdocumento]").attr("disabled",false);

	$('#numerodocumento').attr('value', '');
	$('#idtipodocumento option:disabled').each(
		function()
		{
			$(this).removeAttr('disabled');
		}
	);
	$('#idtipodocumento option:selected').each(
		function()
		{
			$(this).removeAttr('selected');
		}
	);
	$('#idtipodocumento option:first').attr('selected', true);

	var id = jQuery("input[name=idpersonanatural]").attr('value');
	jQuery("form[id=frmDocumento ]").attr('action','/clientes/pn/' + id + '/documentos/add');
}

function btnUpdateDocumento(idTipoDoc, numDoc)
{
	jQuery("input[id=regdocumento]").attr("disabled",false);

	$('#numerodocumento').attr('value', numDoc);
	$('#idtipodocumento option[value=' + idTipoDoc + ']').attr('selected', true).attr('disabled', false).siblings().attr('disabled', true).attr('selected', false);

	var id = jQuery("input[name=idpersonanatural]").attr('value');
	jQuery("form[id=frmDocumento]").attr('action','/clientes/pn/' + id + '/documentos/update');
}

function btnDeleteDocumento(idTipoDoc)
{
	if (confirm("¿Está seguro?"))
	{
	    // continue with delete
		var id = jQuery("input[name=idpersonanatural]").attr('value');
		var url="/clientes/pn/" + id + "/documentos/delete";
		var formData = {
	        idtipodocumento: idTipoDoc
	        //_method: jQuery("input[name=_method]").attr('value')
		}

	    $.post(url, formData, function(response){
		    if(response.success)
		    {
	             documentosTable.ajax.reload();
		    }
		    else
		    {
		    	alert("Hubo algún error.");
		    }
		}, 'json');
	}
}

$('#frmTelefono').on('submit',function(e){
        e.preventDefault();
        var form=$('#frmTelefono');
        var formData=form.serialize();
        var url=form.attr('action');

        $.post(url, formData, function(response){
		    if(response.success)
		    {
				$('#telefono-modal').modal('hide');
				telefonosTable.ajax.reload();
		    }

		    $( '#frmTelefono' ).each(function(){
			    this.reset();
			});
		}, 'json');
});

function btnNewTelefono()
{
	jQuery("input[id=regtelefono]").attr("disabled",false);

	$('#numeropersonatelefono').attr('value', '');
	$('#idtipotelefono option:selected').each(
		function()
		{
			$(this).removeAttr('selected');
		}
	);
	$('#idtipotelefono option:first').prop('selected', true);

	var id = jQuery("input[name=idpersona]").attr('value');
	jQuery("form[id=frmTelefono]").attr('action','/clientes/' + id + '/telefonos/add');

	$('#anexos-table-node').each(
		function()
		{
			$(this).hide();
		}
	);

	/*if (anexosTable != null)
	{
		$(anexosTable.table().node()).each(
			function()
			{
				$(this).hide();
			}
		);
	}*/
}

function btnUpdateTelefono(idPerTelf, idTipoTelf, numTelf)
{
	jQuery("input[id=regtelefono]").attr("disabled",false);

	jQuery("input[name=idpersonatelefono]").attr('value', idPerTelf);
	$('#numeropersonatelefono').attr('value', numTelf);
	$('#idtipotelefono option[value=' + idTipoTelf + ']').prop('selected', true).siblings().prop('selected', false);

	var id = jQuery("input[name=idpersona]").attr('value');
	jQuery("form[id=frmTelefono]").attr('action','/clientes/' + id + '/telefonos/update');

	$('#anexos-table-node').each(
		function()
		{
			$(this).show();
		}
	);

	if (anexosTable == null)
	{
		anexosTable = $('#anexos-table').DataTable({
	          processing: true,
	          serverSide: true,
	          ajax:'/anexosData/' + idPerTelf,
	          pageLength: 3,
	          lengthMenu: [3, 6, 10, 15, 20],
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

		/*anexosTable.page.len( 3 ).draw();*/
	}
	else
	{
		anexosTable.ajax.url('/anexosData/' + idPerTelf).load();
		anexosTable.page.len(3).draw();
	}
}

function btnDeleteTelefono(idPerTelf)
{
	if (confirm("¿Está seguro?"))
	{
		/*var id = jQuery("input[name=idpersona]").attr('value');*/
		var url="/clientes/telefonos/"+ idPerTelf +"/delete";
		var formData = {
	        idpersonatelefono: idPerTelf
	        //_method: jQuery("input[name=_method]").attr('value')
		}

	    $.post(url, formData, function(response){
		    if(response.success)
		    {
	             telefonosTable.ajax.reload();
		    }
		    else
		    {
		    	alert("FAIL");
		    }
		}, 'json');
	}
}

$('#frmAnexo').on('submit',function(e){
        e.preventDefault();
        var form=$('#frmAnexo');
        var formData=form.serialize();
        var url=form.attr('action');

        $.post(url, formData, function(response){
		    if(response.success)
		    {
				$('#anexo-modal').modal('hide');
				anexosTable.ajax.reload();
		    }

		    $( '#frmAnexo' ).each(function(){
		    	if ($(this).attr('name') != '_token')
			    	this.reset();
			});
		}, 'json');
});

function btnNewAnexo()
{
	$("#anexo-modal").removeClass('PopUp').addClass('PopUp-focus');

	jQuery("input[id=reganexo]").attr("disabled",false);

	$('#numeroanexotelefono').attr('value', '');
	
	var id = jQuery("input[name=idpersonatelefono]").attr('value');

	jQuery("form[id=frmAnexo]").attr('action','/clientes/telefonos/' + id + '/anexos/add');
}

function btnUpdateAnexo(idAnex, numAnexTelf)
{

}

function btnDeleteAnexo(idAnex)
{

}