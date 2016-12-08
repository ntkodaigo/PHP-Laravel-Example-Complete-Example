@extends('layout')
    
@section('content')


 <center><h3>ALMACEN</h3></center>

    <form id="frm_almacen" method="POST" action="@if ($key == 'c') /almacenes/add @else /almacenes/{{ $almacen->idcompra }} @endif" class="col-md-6">
    @if ($key == 'u')
    {{method_field ('PATCH')}}
    @endif

        <div class="form-group">Compra
            <input type="text" name="idcompra" class="form-control" placeholder="Escoja una Compra" readonly 
            @if ($key=='u')
            value="{{ $almacen->idcompra }}"
            @endif>
        </div>

        <div class="form-group">Fecha de almacen
            <input type="date" name="fechaalmacen" class="form-control"
            @if ($key=='u')
            value="{{ $almacen->fechaalmacen }}"
            @endif>
        </div>

        <div class="form-group">Ubicacion
            <input type="text" name="ubicacion" class="form-control"
            @if ($key=='u')
            value="{{ $almacen->ubicacion }}"
            @endif>
        </div>

        <div class="form-group">Lote
            <input type="text" name="lote" class="form-control"
            @if ($key=='u')
            value="{{ $almacen->lote }}"
            @endif>
        </div>

        <div>
            <button id="save_producto" type="submit" class="btn btn-info btn-lg">Agregar producto</button>
        </div>
        {{ csrf_field() }}

    </form>

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


@section('footer')
    <script type="text/javascript">
            $('#frm_almacen').on('submit',function(e){
              jQuery("button[id=save_producto]").attr("disable",true);
            });
    </script>
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
            ajax:'{{URL::asset('/compras/dataToSelect')}}',
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

  function btnSelectCompraToAlmacen(idCompra)
  {
    $('input[name=idcompra]').attr("value", idCompra);
  }

  function btnDeleteAlmacen(almacen)
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