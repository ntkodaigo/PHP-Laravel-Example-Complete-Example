$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });

var documentosTable;

$(function(){
   	jQuery("a[name=idcliente_edit]").click(function(){

   		if (!jQuery("input[name=idcliente]").prop("readonly"))
   		{
   			var formData = {
	            id: jQuery("input[name=idcliente]").attr('value'),
        	}

  			$.ajax({
	            type: 'POST',
	            url: '/clientes/update',
	            /*headers: {
            		'X-CSRF-TOKEN': jQuery('input[name="_token"]').attr('value')
        		},
    			beforeSend: function(xhr){
    				xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('value'));
    			},*/
	            /*dataType: 'json',*/
	            data: {"id":1, _token: "{{ csrf_token() }}"},
               	success:function(data){
	                  $("#msg").html(data.msg);
               	},
               	error:function(data){ 
        			alert("error!!!!", data);
    			}
        	});
   		}

   		jQuery("input[name=idcliente]").attr("readonly",false);

		jQuery("a[name=idcliente_edit]").attr("value",'Guardar');

   	// ,input[name=description]
	});

	$('#birth-date .input-group.date').datepicker({
		language: "es",
	    calendarWeeks: true,
	    autoclose: true,
	    format: "dd/mm/yyyy",
	});
});

/*$('#frmNewCliente').on('submit',function(e){
        e.preventDefault();
        var form=$('#frmNewCliente');
        var formData=form.serialize();
        var url=form.attr('action');

        $.post(url, formData, function(response){
		    if(response.success)
		    {
		        document.getElementById('idmarca').value=response.data;
		    }
		}, 'json');
    });*/

function botoninsertar2()
{
	var data = { id : 1};

	$.post('/documento/'+1, data, function(response){
	    if(response.success)
	    {
	        document.getElementById('idmarca').value=response.data;
	    }
	}, 'json');
}