var documentosTable;
var telefonosTable;
var anexosTable;
var direccionesTable;
var correosTable;
var profesionesTable;
var clienteVehiculosTable;
var vehiculosTable;
var clivehRevisionesTable;
var tecnicosTable;
var serviciosTable;
var productosTable;
var isFacturaSelected;
var facturasTable;

// datatables default
$.extend( true, $.fn.dataTable.defaults, {
    processing: true,
  	serverSide: true,
  	pageLength: 6,
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

   	jQuery("a[name=nombres_edit]").click(function(){
   		if (!jQuery("input[name=nombres]").prop("readonly"))
   		{
   			var formData = {
	            nombres: $("#nombres").val()
	            //_method: jQuery("input[name=_method]").attr('value')
        	}
        	var id = jQuery("input[name=idpersonanatural]").attr('value');
			var url = "/pn/" + id + "/update";

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
			var url = "/pn/" + id + "/update";

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
			var url = "/pn/" + id + "/update";

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

	jQuery("a[name=fnc_edit]").click(function(){
   		if (!jQuery("input[name=fechanacimientocreacion]").prop("readonly"))
   		{
   			var formData = {
	            fechanacimientocreacion: $("#fechanacimientocreacion").val()
	            //_method: jQuery("input[name=_method]").attr('value')
        	}
        	var id = jQuery("input[name=idpersona]").attr('value');
			var url = "/personas/" + id +"/update/nac-creac";

        	$.post(url, formData, function(response){
			    if(response.success)
			    {
			    	jQuery("input[name=fechanacimientocreacion]").attr("readonly",true);
			    	jQuery("span[name=fnc_edit_glyph]").attr("class",'glyphicon glyphicon-pencil');
			    }
			}, 'json');
   		}
   		else
   		{
   			jQuery("input[name=fechanacimientocreacion]").attr("readonly",false);
   			$('#fechanacimientocreacion').focus();
			jQuery("span[name=fnc_edit_glyph]").attr("class",'glyphicon glyphicon-floppy-disk');
   		}
	});

	jQuery("a[name=genero_edit]").click(function(){
   		if (!jQuery("input[id=genero-key]").prop("disabled"))
   		{
   			var formData = {
	            idgenero: $("#idgenero").val()
	            //_method: jQuery("input[name=_method]").attr('value')
        	}
        	var id = jQuery("input[name=idpersonanatural]").attr('value');
			var url = "/pn/" + id + "/update/genero";

        	$.post(url, formData, function(response){
			    if(response.success)
			    {
			    	$("input[id=genero-key]").prop("disabled", true);
			    	$('#idgenero option:selected').siblings().prop('disabled', true);
			    	jQuery("span[name=genero_edit_glyph]").attr("class",'glyphicon glyphicon-pencil');
			    }
			}, 'json');
   		}
   		else
   		{
   			$("input[id=genero-key]").prop("disabled", false);
   			$('#idgenero option').prop("disabled", false);
   			$('#idgenero').focus();
			jQuery("span[name=genero_edit_glyph]").attr("class",'glyphicon glyphicon-floppy-disk');
   		}
	});

	/* --- PERSONA JURIDICA --- */
	jQuery("a[name=razonsocial_edit]").click(function(){
   		if (!jQuery("input[name=razonsocial]").prop("readonly"))
   		{
   			var formData = {
	            razonsocial: $("#razonsocial").val()
	            //_method: jQuery("input[name=_method]").attr('value')
        	}
        	var id = jQuery("input[name=idpersonajuridica]").attr('value');
			var url = "/pj/" + id + "/update";

        	$.post(url, formData, function(response){
			    if(response.success)
			    {
			    	jQuery("input[name=razonsocial]").attr("readonly",true);
			    	jQuery("span[name=razonsocial_edit_glyph]").attr("class",'glyphicon glyphicon-pencil');
			    }
			}, 'json');
   		}
   		else
   		{
   			jQuery("input[name=razonsocial]").attr("readonly",false);
   			$('#razonsocial').focus();
			jQuery("span[name=razonsocial_edit_glyph]").attr("class",'glyphicon glyphicon-floppy-disk');
   		}
	});

	jQuery("a[name=ruc_edit]").click(function(){
   		if (!jQuery("input[name=ruc]").prop("readonly"))
   		{
   			var formData = {
	            ruc: $("#ruc").val()
	            //_method: jQuery("input[name=_method]").attr('value')
        	}
        	var id = jQuery("input[name=idpersonajuridica]").attr('value');
			var url = "/pj/" + id + "/update";

        	$.post(url, formData, function(response){
			    if(response.success)
			    {
			    	jQuery("input[name=ruc]").attr("readonly",true);
			    	jQuery("span[name=ruc_edit_glyph]").attr("class",'glyphicon glyphicon-pencil');
			    }
			}, 'json');
   		}
   		else
   		{
   			jQuery("input[name=ruc]").attr("readonly",false);
   			$('#ruc').focus();
			jQuery("span[name=ruc_edit_glyph]").attr("class",'glyphicon glyphicon-floppy-disk');
   		}
	});

	/*$('#birth-date .input-group.date').datepicker({
		language: "es",
	    calendarWeeks: true,
	    autoclose: true,
	    format: "dd/mm/yyyy",
	});*/
	
});

$('#frmPersona').on('submit',function(e){
	jQuery("button[id=save_persona]").attr("disabled",true);
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
$('#frmVehiculo').on('submit',function(e){
	jQuery("input[id=regvehiculo]").attr("disabled",true);
});
$('#frmRevision').on('submit',function(e){
	$("input[id=regrevision]").attr("disabled", true);
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

$('#fechanacimientocreacion').keypress(function(event){
  if(event.keyCode == 13){
    $('#fnc_edit').click();
  }
});

$('#idgenero').keypress(function(event){
  if(event.keyCode == 13){
    $('#genero_edit').click();
  }
});

$('#razonsocial').keypress(function(event){
  if(event.keyCode == 13){
    $('#razonsocial_edit').click();
  }
});

$('#ruc').keypress(function(event){
  if(event.keyCode == 13){
    $('#ruc_edit').click();
  }
});

$('#idpais').on('change', function() {
	var data = {
	        idpais: $(this).val()
	        //_method: jQuery("input[name=_method]").attr('value')
	}
  	$.post('/paises/' + $(this).val() + '/departamentos', data, function(response){
	    if(response.success)
	    {
	        var departamentosSelect = $('#iddepartamento').empty();
	        $.each(response.departamentos, function(i, departamento){
	            $('<option/>', {
	                value:departamento.iddepartamento,
	                text:departamento.nombredepartamento
	            }).appendTo(departamentosSelect);
	        })

	        $("#iddepartamento").prop("selectedIndex", -1);

	        $('#idprovincia').empty();
	        $("#idprovincia").prop("selectedIndex", -1);

	        $('#iddistrito').empty();
	        $("#iddistrito").prop("selectedIndex", -1);
	    }
	}, 'json');
});

$('#iddepartamento').on('change', function() {
	var data = {
	        iddepartamento: $(this).val()
	        //_method: jQuery("input[name=_method]").attr('value')
	}
  	$.post('/departamentos/' + $(this).val() + '/provincias', data, function(response){
	    if(response.success)
	    {
	        var selectToFill = $('#idprovincia').empty();
	        $.each(response.provincias, function(i, provincia){
	            $('<option/>', {
	                value:provincia.idprovincia,
	                text:provincia.nombreprovincia
	            }).appendTo(selectToFill);
	        })

	        $("#idprovincia").prop("selectedIndex", -1);

	        $('#iddistrito').empty();
	        $("#iddistrito").prop("selectedIndex", -1);
	    }
	}, 'json');
});

$('#idprovincia').on('change', function() {
	var data = {
	        idprovincia: $(this).val()
	        //_method: jQuery("input[name=_method]").attr('value')
	}
  	$.post('/provincias/' + $(this).val() + '/distritos', data, function(response){
	    if(response.success)
	    {
	        var selectToFill = $('#iddistrito').empty();
	        $.each(response.distritos, function(i, distrito){
	            $('<option/>', {
	                value:distrito.iddistrito,
	                text:distrito.nombredistrito
	            }).appendTo(selectToFill);
	        })

	        $("#iddistrito").prop("selectedIndex", -1);
	    }
	}, 'json');
});

$('#idmarca').on('change', function() {
	var data = {
	        idmarca: $(this).val()
	        //_method: jQuery("input[name=_method]").attr('value')
	}
  	$.post('/marcas/' + $(this).val() + '/modelos', data, function(response){
	    if(response.success)
	    {
	        var modelosSelect = $('#idmodelo').empty();
	        $.each(response.modelos, function(i, modelo){
	            $('<option/>', {
	                value:modelo.idmodelo,
	                text:modelo.nombremodelo
	            }).appendTo(modelosSelect);
	        })

	        $("#idmodelo").prop("selectedIndex", -1);
	    }
	}, 'json');
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
	jQuery("form[id=frmDocumento ]").attr('action','/pn/' + id + '/documentos/add');
}

function btnUpdateDocumento(idTipoDoc, numDoc)
{
	jQuery("input[id=regdocumento]").attr("disabled",false);

	$('#numerodocumento').attr('value', numDoc);
	$('#idtipodocumento option[value=' + idTipoDoc + ']').prop('selected', true).prop('disabled', false).siblings().prop('disabled', true).prop('selected', false);

	var id = jQuery("input[name=idpersonanatural]").attr('value');
	jQuery("form[id=frmDocumento]").attr('action','/pn/' + id + '/documentos/update');
}

function btnDeleteDocumento(idTipoDoc)
{
	if (confirm("¿Está seguro?"))
	{
	    // continue with delete
		var id = jQuery("input[name=idpersonanatural]").attr('value');
		var url="/pn/" + id + "/documentos/delete";
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
	jQuery("form[id=frmTelefono]").attr('action','/p/' + id + '/telefonos/add');

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
	jQuery("form[id=frmTelefono]").attr('action','/p/' + id + '/telefonos/update');

	$('#anexos-table-node').each(
		function()
		{
			$(this).show();
		}
	);

	if (anexosTable == null)
	{
		anexosTable = $('#anexos-table').DataTable({
	          ajax:'/anexosData/' + idPerTelf,
	          pageLength: 3,
	          columns: [
	              { data: 'numeroanexotelefono', name: 'numeroanexotelefono' },
	              { data: 'action', name: 'action', orderable: false, searchable: false}
	          ]
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
	if (confirm("Tambien borrara los anexos asociados. ¿Está seguro?"))
	{
		/*var id = jQuery("input[name=idpersona]").attr('value');*/
		var url="/p/telefonos/"+ idPerTelf +"/delete";
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
	jQuery("form[id=frmAnexo]").attr('action','/p/telefonos/' + id + '/anexos/add');
}

function btnUpdateAnexo(idAnex, numAnexTelf)
{
	jQuery("input[name=idanexo]").attr('value', idAnex);
	$('#numeroanexotelefono').attr('value', numAnexTelf);

	$("#anexo-modal").removeClass('PopUp').addClass('PopUp-focus');

	jQuery("input[id=reganexo]").attr("disabled",false);

	var id = jQuery("input[name=idpersonatelefono]").attr('value');
	jQuery("form[id=frmAnexo]").attr('action','/p/telefonos/' + id + '/anexos/update');
}

function btnDeleteAnexo(idAnex)
{
	if (confirm("¿Está seguro?"))
	{
		/*var id = jQuery("input[name=idpersona]").attr('value');*/
		var url="/p/anexotelefonos/"+ idAnex +"/delete";
		/*var token = jQuery("input[name=_token]").attr('value');*/
		var formData = {
	        idanexo: idAnex
	        //_method: jQuery("input[name=_method]").attr('value')
		}

		/*$.ajaxPrefilter(function(options, originalOptions, xhr) { // this will run before each request
	        var token = $('meta[name="csrf-token"]').attr('content'); // or _token, whichever you are using

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

        var thereAreDistrito = false;
	    var inputs = formData.split("&");

	    for (i = 0; i < inputs.length; i++) { 
		    if (inputs[i].includes("iddistrito"))
		    {
		    	thereAreDistrito = true;
		    	break;
		    }
		}

        if (thereAreDistrito)
        {
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
    	}
    	else
    	{
    		alert("Debe seleccionar un distrito.");

    		jQuery("input[id=regdireccion]").attr("disabled",false);
    	}
});

function btnNewDireccion()
{
	jQuery("input[id=regdireccion]").attr("disabled",false);

	$('#nombredireccionpersona').attr('value', '');
	
	var id = jQuery("input[name=idpersona]").attr('value');
	jQuery("form[id=frmDireccion]").attr('action','/p/' + id + '/direcciones/add');

	$("#idpais").prop("selectedIndex", -1);
	        
    $('#iddepartamento').empty();
    $("#iddepartamento").prop("selectedIndex", -1);

    $('#idprovincia').empty();
    $("#idprovincia").prop("selectedIndex", -1);

    $('#iddistrito').empty();
    $("#iddistrito").prop("selectedIndex", -1);
}

function btnUpdateDireccion(idDirec, nomDirPer, idpais, iddepartamento, idprovincia, iddistrito)
{
	jQuery("input[id=regdireccion]").attr("disabled",false);

	jQuery("input[name=iddireccionpersona]").attr('value', idDirec);
	$('#nombredireccionpersona').attr('value', nomDirPer);

	var id = jQuery("input[name=idpersona]").attr('value');
	jQuery("form[id=frmDireccion]").attr('action','/p/' + id + '/direcciones/update');

	$('#idpais option[value=' + idpais + ']').prop('selected', true).prop('disabled', false).siblings().prop('disabled', false).prop('selected', false);
	/*$('#idpais').change();*/
	var data = {
	        idpais: $('#idpais').val()
	        //_method: jQuery("input[name=_method]").attr('value')
	}
	$.post('/paises/' + $('#idpais').val() + '/departamentos', data, function(response){
	    if(response.success)
	    {
	        var departamentosSelect = $('#iddepartamento').empty();
	        $.each(response.departamentos, function(i, departamento){
	            $('<option/>', {
	                value:departamento.iddepartamento,
	                text:departamento.nombredepartamento
	            }).appendTo(departamentosSelect);
	        })

	        $('#iddepartamento option[value=' + iddepartamento + ']').attr('selected', true).attr('disabled', false).siblings().attr('disabled', false).attr('selected', false);
	        $.post('/departamentos/' + $('#iddepartamento').val() + '/provincias', data, function(response){
			    if(response.success)
			    {
			        var provinciasSelect = $('#idprovincia').empty();
			        $.each(response.provincias, function(i, provincia){
			            $('<option/>', {
			                value:provincia.idprovincia,
			                text:provincia.nombreprovincia
			            }).appendTo(provinciasSelect);
			        })

			        $('#idprovincia option[value=' + idprovincia + ']').attr('selected', true).attr('disabled', false).siblings().attr('disabled', false).attr('selected', false);
			        $.post('/provincias/' + $('#idprovincia').val() + '/distritos', data, function(response){
					    if(response.success)
					    {
					        var distritosSelect = $('#iddistrito').empty();
					        $.each(response.distritos, function(i, distrito){
					            $('<option/>', {
					                value:distrito.iddistrito,
					                text:distrito.nombredistrito
					            }).appendTo(distritosSelect);
					        })

					        $('#iddistrito option[value=' + iddistrito + ']').attr('selected', true).attr('disabled', false).siblings().attr('disabled', false).attr('selected', false);
					    }
					}, 'json');
			    }
			}, 'json');
	    }
	}, 'json');
}

function btnDeleteDireccion(idDirec)
{
	if (confirm("¿Está seguro?"))
	{
		var url="/p/direcciones/"+ idDirec +"/delete";
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
	jQuery("form[id=frmCorreo]").attr('action','/p/' + id + '/correos/add');
}

function btnUpdateCorreo(idCorreo, dirCorreo)
{
	jQuery("input[id=regcorreo]").attr("disabled",false);

	jQuery("input[name=idcorreoelectronico]").attr('value', idCorreo);
	$('#direccioncorreoelectronico').attr('value', dirCorreo);

	var id = jQuery("input[name=idpersona]").attr('value');
	jQuery("form[id=frmCorreo]").attr('action','/p/' + id + '/correos/update');
}

function btnDeleteCorreo(idCorreo)
{
	if (confirm("¿Está seguro?"))
	{
		var url="/p/correos/"+ idCorreo +"/delete";
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
		    else
		    {
		    	alert("Esta profesion ya fue asignada a este cliente.");
		    }

		    $( '#frmProfesion' ).each(function(){
		    	this.reset();
			});
		}, 'json');
});

function btnNewProfesion()
{
	jQuery("input[id=regprofesion]").attr("disabled",false);

	$('#idtipoprofesion option:first').prop('selected', true).prop('disabled', false).siblings().prop('disabled', false).prop('selected', false);
	
	var id = jQuery("input[name=idpersonanatural]").attr('value');
	jQuery("form[id=frmProfesion]").attr('action','/pn/' + id + '/profesiones/add');
}

function btnUpdateProfesion(idTipoProf)
{
	jQuery("input[id=regprofesion]").attr("disabled",false);

	$('#idtipoprofesion option[value=' + idTipoProf + ']').prop('selected', true).prop('disabled', false).siblings().prop('disabled', true).prop('selected', false);

	var id = jQuery("input[name=idpersonanatural]").attr('value');
	jQuery("form[id=frmProfesion]").attr('action','/pn/' + id + '/profesiones/update');
}

function btnDeleteProfesion(idTipoProf)
{
	if (confirm("¿Está seguro?"))
	{
		var id = jQuery("input[name=idpersonanatural]").attr('value');
		var url="/pn/"+ id +"/profesiones/delete";
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
				vehiculosTable.ajax.reload();
				clienteVehiculosTable.ajax.reload();
		    }

		    $( '#frmVehiculo' ).each(function(){
		    	this.reset();
			});
		}, 'json');
});

function btnNewClienteVehiculo()
{
}

function btnStoreClienteVehiculo(idVehiculo)
{
	if (confirm("¿Asignar este vehículo al cliente?"))
	{
		var id = jQuery("input[name=idcliente]").attr('value');
		var url="/clientes/"+ id +"/vehiculos/add";
		var formData = {
	        idvehiculo: idVehiculo
		}

	    $.post(url, formData, function(response){
		    if(response.success)
		    {
	             clienteVehiculosTable.ajax.reload();
	             $('#clientevehiculo-modal').modal('hide');
		    }
		    else
		    {
		    	alert("El vehículo ya fue asignado a este cliente anteriormente.");
		    }
		}, 'json');
	}
}

function btnDeleteClienteVehiculo(idVeh)
{
	if (confirm("No se borraran datos del vehiculo, solo lo relacionado a este cliente incluyendo ¡sus revisiones! ¿Está seguro?"))
	{
		var id = jQuery("input[name=idcliente]").attr('value');
		var url="/clientes/"+ id +"/vehiculos/delete";
		var formData = {
	        idvehiculo: idVeh
		}

	    $.post(url, formData, function(response){
		    if(response.success)
		    {
	             clienteVehiculosTable.ajax.reload();
		    }
		    else
		    {
		    	alert("FAIL");
		    }
		}, 'json');
	}
}

function btnNewVehiculo()
{
	$("#vehiculo-modal").removeClass('PopUp').addClass('PopUp-focus');

	jQuery("input[id=regvehiculo]").attr("disabled",false);

	$("#idmarca").prop("selectedIndex", -1);
	$('#idmodelo').empty();
	$("#idmodelo").prop("selectedIndex", -1);
	$("#aniovehiculo").attr("value", '');
	$("#numeroplacavehivulo").attr("value", '');
	$("#descripcion").html('');

	jQuery("form[id=frmVehiculo]").attr('action','/vehiculos/add/ajax');
}

function btnUpdateVehiculo(idVeh, idMar, idMol, anio, numPlaca, descrip)
{
	$("#vehiculo-modal").removeClass('PopUp').addClass('PopUp-focus');

	jQuery("input[id=regvehiculo]").attr("disabled",false);

	$("input[name=idvehiculo]").attr("value", idVeh);

	$('#idmarca option[value=' + idMar + ']').prop('selected', true).prop('disabled', false).siblings().prop('disabled', false).prop('selected', false);
	/*$('#idpais').change();*/
	var data = {
	        idmarca: idMar
	        //_method: jQuery("input[name=_method]").attr('value')
	}
	$.post('/marcas/' + idMar + '/modelos', data, function(response){
	    if(response.success)
	    {
	        var modelosSelect = $('#idmodelo').empty();
	        $.each(response.modelos, function(i, modelo){
	            $('<option/>', {
	                value:modelo.idmodelo,
	                text:modelo.nombremodelo
	            }).appendTo(modelosSelect);
	        })

	        $('#idmodelo option[value=' + idMol + ']').prop('selected', true).prop('disabled', false).siblings().prop('disabled', false).prop('selected', false);
	    }
	}, 'json');
	
	$("#aniovehiculo").attr("value", anio);
	$("#numeroplacavehivulo").attr("value", numPlaca);
	$("#descripcion").html(descrip);

	jQuery("form[id=frmVehiculo]").attr('action','/vehiculos/' + idVeh + '/update/ajax');
}

function btnDeleteVehiculo(idVeh)
{
	if (confirm("Borrara datos de este vehiculo y todos los clientes asociados. ¿Está seguro?"))
	{
		var url="/vehiculos/"+ idVeh +"/delete";
		var formData = {
	        idvehiculo: idVeh
		}

	    $.post(url, formData, function(response){
		    if(response.success)
		    {
	             vehiculosTable.ajax.reload();
	             clienteVehiculosTable.ajax.reload();
		    }
		    else
		    {
		    	alert("FAIL");
		    }
		}, 'json');
	}
}

function btnRevisionesVehiculo(idVeh, numPlaca)
{
	$("input[name=idvehiculo]").attr("value", idVeh);
	$('#numeroplaca').html("Placa: " + numPlaca);

	var id;

	if (clivehRevisionesTable == null)
	{
		id = $('input[name=idcliente]').attr("value");
		clivehRevisionesTable = $('#clivehrevisiones-table').DataTable({
	          ajax: '/vehiculos/' + idVeh + '/revisionesData/' + id,
	          columns: [
	              { data: 'servicio.nombreservicio', name: 'servicio.nombreservicio' },
	              { data: 'tecnico.personanatural.nombres', name: 'tecnico.personanatural.nombres' },
	              { data: 'fecharevision', name: 'fecharevision' },
	              { data: 'estadorevision', name: 'estadorevision' },
	              { data: 'action', name: 'action', orderable: false, searchable: false}
	          ]
	      });

		clivehRevisionesTable.page.len(3).draw();
	}
	else
	{
		id = $('input[name=idcliente]').attr("value");
		clivehRevisionesTable.ajax.url('/vehiculos/'+ idVeh +'/revisionesData/' + id).load();
		clivehRevisionesTable.page.len(3).draw();
	}
}

function btnShowTecnicosTable()
{
	if (tecnicosTable == null)
	{
		tecnicosTable = $('#tecnicos-table').DataTable({
	          ajax: '/tecnicosData/select',
	          columns: [
	              { data: 'personanatural.nombres', name: 'personanatural.nombres' },
	              { data: 'personanatural.apellido_paterno', name: 'personanatural.apellido_paterno' },
	              { data: 'personanatural.apellido_materno', name: 'personanatural.apellido_materno' },
	              { data: 'action', name: 'action', orderable: false, searchable: false}
	          ]
	      });

		tecnicosTable.page.len(3).draw();
	}
	else
	{
		tecnicosTable.ajax.reload();
		tecnicosTable.page.len(3).draw();
	}
}

function btnShowServicosTable()
{
	if (serviciosTable == null)
	{
		serviciosTable = $('#servicios-table').DataTable({
	          ajax: '/serviciosData/select',
	          columns: [
	              { data: 'nombreservicio', name: 'nombreservicio' },
	              { data: 'categoriaservicio.nombrecategoriaservicio', name: 'categoriaservicio.nombrecategoriaservicio' },
	              { data: 'subcategoriaservicio.nombresubcategoriaservicio', name: 'subcategoriaservicio.nombresubcategoriaservicio' },
	              { data: 'action', name: 'action', orderable: false, searchable: false}
	          ]
	      });

		serviciosTable.page.len(3).draw();
	}
	else
	{
		serviciosTable.ajax.reload();
		serviciosTable.page.len(3).draw();
	}
}

function btnSelectTecnico(idTec, tecFullname)
{
	$('input[name=idtecnico]').attr("value", idTec);
	$('input[id=nombretecnico]').attr("value", tecFullname);

	$('#select-tecnico-modal').modal('hide');
}

function btnSelectServicio(idSer, serName)
{
	if (isFacturaSelected)
	{
		$('input[name=idarticulo]').attr("value", idSer);
		$('input[id=nombreproducto]').attr("value", serName);
	}
	else
	{
		$('input[name=idservicio]').attr("value", idSer);
		$('input[id=nombreservicio]').attr("value", serName);
	}
	$('#select-servicio-modal').modal('hide');
}

$('#frmRevision').on('submit',function(e){
    e.preventDefault();
    var form=$('#frmRevision');
    var formData=form.serialize();
    var url=form.attr('action');

    $.post(url, formData, function(response){
	    if(response.success)
	    {
			$('#revision-modal').modal('hide');
			clivehRevisionesTable.ajax.reload();
	    }

	    $( '#frmRevision' ).each(function(){
	    	this.reset();
		});
	}, 'json');
});

function btnNewRevision()
{
	isFacturaSelected = false;

	$("input[id=regrevision]").attr("disabled",false);

	var idVeh = $("input[name=idvehiculo]").attr("value");
	var idCli = $("input[name=idcliente]").attr("value");
	$("form[id=frmRevision]").attr('action','/clientes/' + idCli + '/vehiculos/' + idVeh + '/revisiones/add');
}

function btnUpdateRevision(idRev, idTec, idSer, kilom, estado, tiempo, fecha, fechaPos, periodo, tecNombre, serNombre)
{
	$("input[id=regrevision]").attr("disabled",false);

	$('input[name=idrevision]').attr("value", idRev);
	$('input[name=idtecnico]').attr("value", idTec);
	$('input[name=idservicio]').attr("value", idSer);
	$('input[name=kilometrajerevision]').attr("value", kilom);
	$('input[name=estadorevision]').attr("value", estado);
	$('input[name=tiemporeparacion]').attr("value", tiempo);
	$('input[name=fecharevision]').attr("value", fecha);
	$('input[name=fecharevisionposterior]').attr("value", fechaPos);
	$('input[name=periodorevision]').attr("value", periodo);
	$('input[id=nombretecnico]').attr("value", tecNombre);
	$('input[id=nombreservicio]').attr("value", serNombre);

	var idCli = $("input[name=idcliente]").attr("value");
	$("form[id=frmRevision]").attr('action','/clientes/' + idCli + '/vehiculos/revisiones/update');
}

function btnDeleteRevision(idRev)
{
	if (confirm("Borrara los datos de esta revisión. ¿Está seguro?"))
	{
		var url="/revisiones/"+ idRev +"/delete";
		var formData = {
	        idrevision: idRev
		}

	    $.post(url, formData, function(response){
		    if(response.success)
		    {
	             clivehRevisionesTable.ajax.reload();
		    }
		    else
		    {
		    	alert("FAIL");
		    }
		}, 'json');
	}
}

function btnNewFactura()
{
	isFacturaSelected = true;
}

function btnShowProductos()
{
	if (productosTable == null)
	{
		productosTable = $('#productos-table').DataTable({
	          ajax: '/productosData/select',
	          columns: [
	              { data: 'codigoproducto', name: 'codigoproducto' },
	              { data: 'nombreproducto', name: 'nombreproducto' },
	              { data: 'marcaproducto', name: 'marcaproducto' },
	              { data: 'modeloproducto', name: 'modeloproducto' },
	              { data: 'action', name: 'action', orderable: false, searchable: false}
	          ]
	      });

		serviciosTable.page.len(3).draw();
	}
	else
	{
		serviciosTable.ajax.reload();
		serviciosTable.page.len(3).draw();
	}
}

function btnSelectProducto(idArt, proName)
{
	$('input[name=idarticulo]').attr("value", idArt);
	$('input[id=nombreproducto]').attr("value", proName);
	
	$('#select-productos-modal').modal('hide');
	

}
