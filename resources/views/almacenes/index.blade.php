@extends('layout')
    
@section('content')

<center><h3>PRODUCTOS ALMACEN</h3></center>
<a href="/almacenes/new">
<button type="button" class="btn btn-info btn-lg" id="add">Agregar Producto en Almacen</button>
</a>
<div class="panel-body">
    <table class="table table-hover" id="table-producto">
                  <thead class="thead-inverse">
                      <tr>
                          <th>Codigo Producto</th>
                          <th>Nombre Producto</th>
                          <th>Ubicacion</th>
                          <th>Lote</th>
                          <th>Acciones</th>
                      </tr>
                  </thead>
              </table>
  </div>
@stop
@push('scripts')

<script type="text/javascript">

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });

  var table;

  $(function() {

    table = $('#table-producto').DataTable({
            processing: true,
            serverSide: true,
            ajax:'{{URL::asset('/almacenes/data')}}',
            columns: [
                { data: 'producto.codigoproducto', name: 'producto.codigoproducto' },
                { data: 'producto.nombreproducto', name: 'producto.nombreproducto' },
                { data: 'ubicacion', name: 'ubicacion' },
                { data: 'lote', name: 'lote' },
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

    });

  function btnDeleteProducto(almacen)
{
  var url="/almacenes/" + almacen + "/delete";
  var data = {idcompra:almacen}

    $.post(url, data, function(response){
      if(response.success)
      {
             table.ajax.reload();
      }
      else
      {
        alert("FAIL");
      }
  }, 'json');
}
</script>
@endpush