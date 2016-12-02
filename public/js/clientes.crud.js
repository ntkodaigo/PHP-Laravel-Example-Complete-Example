var documentosTable;
var telefonosTable;
var anexosTable;
var direccionesTable;
var correosTable;
var profesionesTable;
var clienteVehiculosTable;
var vehiculosTable;
var revisionesVehiculosTable;

$(function(){
	$.ajaxSetup({
	    headers: {
	      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
	    }
	  });

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
$('#frmAnexo').on('submit',function(e){
	jQuery("input[id=reganexo]").attr("disabled",true);
});
$('#frmDireccion').on('submit',function(e){
	jQuery("input[id=regdireccion]").attr("disabled",true);
});
$('#frmCorreo').on('submit',function(e){
	jQuery("input[id=regcorreo]").attr("disabled",true);
});
$('#frmProfesion').on('submit',function(e){
	jQuery("input[id=regprofesion]").attr("disabled",true);
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
		function() { $(this).removeAttr('disabled'); }
	);
	$('#idtipodocumento option:selected').each(
		function() { $(this).removeAttr('selected'); }
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
		    	/*if ($(this).attr('name') != '_token')*/
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
	jQuery("input[name=idanexo]").attr('value', idAnex);
	$('#numeroanexotelefono').attr('value', numAnexTelf);

	$("#anexo-modal").removeClass('PopUp').addClass('PopUp-focus');

	jQuery("input[id=reganexo]").attr("disabled",false);

	var id = jQuery("input[name=idpersonatelefono]").attr('value');
	jQuery("form[id=frmAnexo]").attr('action','/clientes/telefonos/' + id + '/anexos/update');
}

function btnDeleteAnexo(idAnex)
{
	if (confirm("¿Está seguro?"))
	{
		/*var id = jQuery("input[name=idpersona]").attr('value');*/
		var url="/clientes/anexotelefonos/"+ idAnex +"/delete";
		/*var token = jQuery("input[name=_token]").attr('value');*/
		var formData = {
	        idanexo: idAnex
	        //_method: jQuery("input[name=_method]").attr('value')
		}

		/*
		$.ajaxPrefilter(function(options, originalOptions, xhr) { // this will run before each request
	        var token = $('meta[name="_token"]').attr('content'); // or _token, whichever you are using

	        if (token) {
	            return xhr.setRequestHeader('X-CSRF-TOKEN', token); // adds directly to the XmlHttpRequest Object
	        }
	    });*/

	    $.post(url, formData, function(response){
		    if(response.success)
		    {
	             anexosTable.ajax.reload();
		    }
		    else
		    {
		    	alert("FAIL");
		    }
		}, 'json');
	}
}

$('#frmDireccion').on('submit',function(e){
        e.preventDefault();
        var form=$('#frmDireccion');
        var formData=form.serialize();
        var url=form.attr('action');

        $.post(url, formData, function(response){
		    if(response.success)
		    {
				$('#direccion-modal').modal('hide');
				direccionesTable.ajax.reload();
		    }

		    $( '#frmDireccion' ).each(function(){
		    	this.reset();
			});
		}, 'json');
});

function btnNewDireccion()
{
	jQuery("input[id=regdireccion]").attr("disabled",false);

	$('#nombredireccionpersona').attr('value', '');
	
	var id = jQuery("input[name=idpersona]").attr('value');
	jQuery("form[id=frmDireccion]").attr('action','/clientes/' + id + '/direcciones/add');
}

function btnUpdateDireccion(idDirec, nomDirPer, iddistrito)
{
	jQuery("input[id=regdireccion]").attr("disabled",false);

	jQuery("input[name=iddireccionpersona]").attr('value', idDirec);
	$('#nombredireccionpersona').attr('value', nomDirPer);

	var id = jQuery("input[name=idpersona]").attr('value');
	jQuery("form[id=frmDireccion]").attr('action','/clientes/' + id + '/direcciones/update');
}

function btnDeleteDireccion(idDirec)
{
	if (confirm("¿Está seguro?"))
	{
		var url="/clientes/direcciones/"+ idDirec +"/delete";
		var formData = {
	        iddireccionpersona: idDirec
		}

	    $.post(url, formData, function(response){
		    if(response.success)
		    {
	             direccionesTable.ajax.reload();
		    }
		    else
		    {
		    	alert("FAIL");
		    }
		}, 'json');
	}
}

$('#frmCorreo').on('submit',function(e){
        e.preventDefault();
        var form=$('#frmCorreo');
        var formData=form.serialize();
        var url=form.attr('action');

        $.post(url, formData, function(response){
		    if(response.success)
		    {
				$('#correo-modal').modal('hide');
				correosTable.ajax.reload();
		    }

		    $( '#frmCorreo' ).each(function(){
		    	this.reset();
			});
		}, 'json');
});

function btnNewCorreo()
{
	jQuery("input[id=regcorreo]").attr("disabled",false);

	$('#direccioncorreoelectronico').attr('value', '');
	
	var id = jQuery("input[name=idpersona]").attr('value');
	jQuery("form[id=frmCorreo]").attr('action','/clientes/' + id + '/correos/add');
}

function btnUpdateCorreo(idCorreo, dirCorreo)
{
	jQuery("input[id=regcorreo]").attr("disabled",false);

	jQuery("input[name=idcorreoelectronico]").attr('value', idCorreo);
	$('#direccioncorreoelectronico').attr('value', dirCorreo);

	var id = jQuery("input[name=idpersona]").attr('value');
	jQuery("form[id=frmCorreo]").attr('action','/clientes/' + id + '/correos/update');
}

function btnDeleteCorreo(idCorreo)
{
	if (confirm("¿Está seguro?"))
	{
		var url="/clientes/correos/"+ idCorreo +"/delete";
		var formData = {
	        idcorreoelectronico: idCorreo
		}

	    $.post(url, formData, function(response){
		    if(response.success)
		    {
	             correosTable.ajax.reload();
		    }
		    else
		    {
		    	alert("FAIL");
		    }
		}, 'json');
	}
}

$('#frmProfesion').on('submit',function(e){
        e.preventDefault();
        var form=$('#frmProfesion');
        var formData=form.serialize();
        var url=form.attr('action');

        $.post(url, formData, function(response){
		    if(response.success)
		    {
				$('#profesion-modal').modal('hide');
				profesionesTable.ajax.reload();
		    }

		    $( '#frmProfesion' ).each(function(){
		    	this.reset();
			});
		}, 'json');
});

function btnNewProfesion()
{
	jQuery("input[id=regprofesion]").attr("disabled",false);

	$('#idtipoprofesion option:first').attr('selected', true).attr('disabled', false).siblings().attr('disabled', false).attr('selected', false);
	
	var id = jQuery("input[name=idpersonanatural]").attr('value');
	jQuery("form[id=frmProfesion]").attr('action','/clientes/pn/' + id + '/profesiones/add');
}

function btnUpdateProfesion(idTipoProf)
{
	jQuery("input[id=regprofesion]").attr("disabled",false);

	$('#idtipoprofesion option[value=' + idTipoProf + ']').attr('selected', true).attr('disabled', false).siblings().attr('disabled', true).attr('selected', false);

	var id = jQuery("input[name=idpersonanatural]").attr('value');
	jQuery("form[id=frmProfesion]").attr('action','/clientes/pn/' + id + '/profesiones/update');
}

function btnDeleteProfesion(idTipoProf)
{
	if (confirm("¿Está seguro?"))
	{
		var id = jQuery("input[name=idpersonanatural]").attr('value');
		var url="/clientes/pn/"+ id +"/profesiones/delete";
		var formData = {
	        idtipoprofesion: idTipoProf
		}

	    $.post(url, formData, function(response){
		    if(response.success)
		    {
	             profesionesTable.ajax.reload();
		    }
		    else
		    {
		    	alert("FAIL");
		    }
		}, 'json');
	}
}

$('#frmVehiculo').on('submit',function(e){
        e.preventDefault();
        var form=$('#frmVehiculo');
        var formData=form.serialize();
        var url=form.attr('action');

        $.post(url, formData, function(response){
		    if(response.success)
		    {
				$('#vehiculo-modal').modal('hide');
				profesionesTable.ajax.reload();
		    }

		    $( '#frmVehiculo' ).each(function(){
		    	this.reset();
			});
		}, 'json');
});

function btnNewVehiculo()
{
	jQuery("input[id=regvehiculo]").attr("disabled",false);

	var id = jQuery("input[name=idcliente]").attr('value');
	jQuery("form[id=frmProfesion]").attr('action','/clientes/pn/' + id + '/profesiones/add');
}

function btnNewClienteVehiculo()
{
	jQuery("input[id=regvehiculo]").attr("disabled",false);

	var id = jQuery("input[name=idcliente]").attr('value');
	jQuery("form[id=frmProfesion]").attr('action','/clientes/pn/' + id + '/profesiones/add');
}

function btnStoreClienteVehiculo()
{
	jQuery("input[id=regvehiculo]").attr("disabled",false);

	var id = jQuery("input[name=idcliente]").attr('value');
	jQuery("form[id=frmProfesion]").attr('action','/clientes/pn/' + id + '/profesiones/add');
}

function btnUpdateVehiculo(idVeh, idMar, idMol, anio, numPlaca, descrip)
{
	jQuery("input[id=regprofesion]").attr("disabled",false);

	$('#idtipoprofesion option[value=' + idTipoProf + ']').attr('selected', true).attr('disabled', false).siblings().attr('disabled', true).attr('selected', false);

	var id = jQuery("input[name=idpersonanatural]").attr('value');
	jQuery("form[id=frmProfesion]").attr('action','/clientes/pn/' + id + '/profesiones/update');
}

function btnRevisionsVehiculo(idVeh)
{
	if (revisionesVehiculosTable == null)
	{
		revisionesVehiculosTable = $('#anexos-table').DataTable({
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
		revisionesVehiculosTable.ajax.url('/anexosData/' + idPerTelf).load();
		revisionesVehiculosTable.page.len(3).draw();
	}
}

function btnDeleteClienteVehiculo(idVeh)
{
	if (confirm("¿Está seguro?"))
	{
		var id = jQuery("input[name=idpersonanatural]").attr('value');
		var url="/clientes/pn/"+ id +"/profesiones/delete";
		var formData = {
	        idtipoprofesion: idTipoProf
		}

	    $.post(url, formData, function(response){
		    if(response.success)
		    {
	             profesionesTable.ajax.reload();
		    }
		    else
		    {
		    	alert("FAIL");
		    }
		}, 'json');
	}
}

function btnDeleteVehiculo(idVeh)
{
	if (confirm("¿Está seguro?"))
	{
		var id = jQuery("input[name=idpersonanatural]").attr('value');
		var url="/clientes/pn/"+ id +"/profesiones/delete";
		var formData = {
	        idtipoprofesion: idTipoProf
		}

	    $.post(url, formData, function(response){
		    if(response.success)
		    {
	             profesionesTable.ajax.reload();
		    }
		    else
		    {
		    	alert("FAIL");
		    }
		}, 'json');
	}
}