@extends('layout')
    
@section('content')

<center><h3>COMPRA PRODUCTOS</h3></center>
<a href="/compras/new">
<button type="button" class="btn btn-info btn-lg" id="add">Agregar Compra</button>
</a>
<div class="panel-body">
    <table class="table table-hover" id="table-compra">
        <thead class="thead-inverse">
            <tr>
                <th>Codigo Producto</th>
                <th>Nombre Producto</th>
                <th>Fecha de Compra</th>
                <th>Cantidad de Compra</th>
                <th>Precio de Compra</th>
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

    table = $('#table-compra').DataTable({
            processing: true,
            serverSide: true,
            ajax:'{{URL::asset('/compras/data')}}',
            columns: [
                { data: 'producto.codigoproducto', name: 'producto.codigoproducto' },
                { data: 'producto.nombreproducto', name: 'producto.nombreproducto' },
                { data: 'fechacompra', name: 'fechacompra' },
                { data: 'cantidadcompra', name: 'cantidadcompra' },
                { data: 'preciocompra', name: 'preciocompra' },
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

  function btnDeleteProducto(compra)
{
  var url="/compras/" + compra + "/delete";
  var data = {idcompra:compra}

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