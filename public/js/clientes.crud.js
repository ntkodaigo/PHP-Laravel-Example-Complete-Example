$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });

var documentosTable;

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

	$('#birth-date .input-group.date').datepicker({
		language: "es",
	    calendarWeeks: true,
	    autoclose: true,
	    format: "dd/mm/yyyy",
	});
});

$('#frmClientePN').on('submit',function(e){
	jQuery("button[id=save_cliente]").attr("disabled",true);
});

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
		    	alert("FAIL");
		    }
		}, 'json');
});

$('#nombres').keypress(function(event){
  if(event.keyCode == 13){
    $('#nombres_edit').click();
  }
});

/*$('#save_cliente').click(function(){
	
});*/

function btnUpdateDocumento(idTipoDoc, numDoc)
{
	$('#numerodocumento').attr('value', numDoc);
	$('#idtipodocumento option[value=' + idTipoDoc + ']').attr('selected', true);

	var id = jQuery("input[name=idpersonanatural]").attr('value');
	jQuery("form[id=frmDocumento]").attr('action','/clientes/pn/' + id + '/documentos/update');
}

function btnDeleteDocumento(idTipoDoc)
{
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
	    	alert("FAIL");
	    }
	}, 'json');
}