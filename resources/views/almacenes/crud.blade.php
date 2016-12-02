@extends('layout')
    
@section('content')


 <center><h3>ALMACEN</h3></center>

    <form id="frm_almacen" method="POST" action="@if ($key == 'c') /almacenes/add @else /almacenes/{{ $almacen->idcompra }} @endif" class="col-md-6">
    @if ($key == 'u')
    {{method_field ('PATCH')}}
    @endif

        <div class="form-group">Compra
            <input type="text" name="idcompra" class="form-control" placeholder="Escoja una Compra" disabled="true" 
            @if ($key=='u')
            value="{{ $almacen->idcompra }}"
            @endif>
        </div>

        <div class="form-group">Fecha de almacen
            <input type="text" name="codigoproducto" class="form-control"
            @if ($key=='u')
            value="{{ $producto->codigoproducto }}"
            @endif>
        </div>

        <div class="form-group">Ubicacion
            <input type="text" name="nombreproducto" class="form-control"
            @if ($key=='u')
            value="{{ $producto->nombreproducto }}"
            @endif>
        </div>

        <div class="form-group">Lote
            <input type="text" name="marcaproducto" class="form-control"
            @if ($key=='u')
            value="{{ $producto->marcaproducto }}"
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
                          <th>Id Compra</th>
                          <th>Proveedor</th>
                          <th>Producto</th>
                          <th>Cantidad</th>
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
            ajax:'{{URL::asset('/almacenes/data')}}',
            columns: [
                { data: 'idcompra', name: 'idcompra' },
                { data: 'idproveedor', name: 'idproveedor' },
                { data: 'nombreproducto ', name: 'nombreproducto ' },
                { data: 'cantidadcompra ', name: 'cantidadcompra ' },
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