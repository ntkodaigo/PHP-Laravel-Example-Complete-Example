@extends('layout')
    
@section('content')
@include('marcas/newMarca')

    <button data-toggle="modal" data-target="#marca" onclick="botoninsertar()"><i class="glyphicon glyphicon-edit"></i>Nueva Marca</button>

    <table class="table table-bordered" id="marca-table">
        <thead>

            <tr>
                <th>Id</th>
                <th>Nombre de la Marca</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script type="text/javascript">


function botoninsertar()
{
  document.getElementById('idmarca').value='';
  document.getElementById('nombremarca').value='';
  jQuery("form[id=frmMarca]").attr('action','/marcas/add');
}

function updatemarca(id)
{
   $('#marca').modal('show');

}

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  }
});

//$('.btn-edit').on('click',function(){
// alert($(this).data('idmarca'));
//});

  $('#btneditar').on('click',function()
    {
      $('#marca').modal('show');
    });

 $('#updatemarca').on('click',function()
    {
      $('#marca').modal('show');
    });


function botoneditar(idmarca , nombremarca, enlace)
{
  document.getElementById('idmarca').value=idmarca;
  document.getElementById('nombremarca').value=String(nombremarca);
  jQuery("form[id=frmMarca]").attr('action',enlace);

}

function butoneliminar(idmarca)
{
      alert(idmarca);

      //var formData={"idmarca":idmarca};
      var url='/marcas/idmarca/delete';
      $.ajax({
          type : 'post',
          url : url,
          //data : formData,
          success : function(data){
               alert(data);
               table.ajax.reload();
               //return data;
          },
          error : function(data){
               table.ajax.reload();

          }
        });              
}

var table;

  $('#frmMarca').on('submit',function(e){
      e.preventDefault();
      var form=$('#frmMarca');
      var formData=form.serialize();
      var url=form.attr('action');
      $.ajax({
          type : 'post',
          url : url,
          data : formData,
          success : function(data){
               console.log(data);
               $('#marca').modal('hide');
               table.ajax.reload();
               addRow(data);
               return data;
          },
          error : function(data){
               table.ajax.reload();

          }              
      });
  });

$(function() {
    table = $('#marca-table').DataTable({
        processing: true,
        serverSide: true,
        ajax:'{{URL::asset('data')}}',
        columns: [
            { data: 'idmarca', name: 'idmarca' },
            { data: 'nombremarca', name: 'nombremarca' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

});




</script>
@endpush
