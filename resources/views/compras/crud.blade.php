@extends('layout')
    
@section('content')


 <center><h3>COMPRAS</h3></center>

    <form id="frm_almacen" method="POST" action="@if ($key == 'c') /compras/add @else /compras/{{ $compra->idcompra }} @endif" class="col-md-6">
    @if ($key == 'u')
    {{method_field ('PATCH')}}
    @endif

        <div class="form-group"> ID Producto
            <input type="text" id="product-id" name="idproducto" class="form-control" placeholder="Escoja una Producto" disabled="true" 
            @if ($key=='u')
            value="{{ $compra->idproducto }}"
            @endif>
        </div>

        <div class="form-group">Fecha de compra
            <input type="text" name="fechacompra" class="form-control"
            @if ($key=='u')
            value="{{ $compra->fechacompra }}"
            @endif>
        </div>

        <div class="form-group">Cantidad
            <input type="text" name="cantidadcompra" class="form-control"
            @if ($key=='u')
            value="{{ $compra->cantidadcompra }}"
            @endif>
        </div>

        <div class="form-group">Precio
            <input type="text" name="preciocompra" class="form-control"
            @if ($key=='u')
            value="{{ $compra->preciocompra }}"
            @endif>
        </div>

        <div>
            <button id="save_producto" type="submit" class="btn btn-info btn-lg">Agregar compra</button>
        </div>
        {{ csrf_field() }}

    </form>
    <div class=""> Productos</div>
    <div class="panel-body">
    <table class="table table-hover" id="table-producto">
                  <thead class="thead-inverse">
                      <tr>
                          <th>Codigo Producto</th>
                          <th>Nombre Producto</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th>Acciones</th>
                      </tr>
                  </thead>
              </table>
  </div>

  <div class="">Proveedores</div>
    <div class="panel-body">
    <table class="table table-hover" id="table-proveedor">
                  <thead class="thead-inverse">
                      <tr>
                          <th>Nombres</th>
                          <th>A. Paterno</th>
                          <th>A. Materno</th>
                          <th>Razon Social</th>
                          <th>Ruc</th>
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

  // datatables default
  $.extend( true, $.fn.dataTable.defaults, {
      processing: true,
      serverSide: true,
      pageLength: 10,
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

  var table_prod;
  var table_prov;

  $(function() {

    table_prod = $('#table-producto').DataTable({
            ajax:'{{URL::asset('/productos/dataCompras')}}',
            columns: [
                { data: 'codigoproducto', name: 'codigoproducto' },
                { data: 'nombreproducto', name: 'nombreproducto' },
                { data: 'marcaproducto', name: 'marcaproducto' },
                { data: 'modeloproducto', name: 'modeloproducto' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]            
            }
        });

    table_prov = $('#table-proveedor').DataTable({
            ajax:'{{URL::asset('/proveedoresData')}}',
            columns: [
                { data: 'personabytype.nombres', name: 'personabytype.nombres', defaultContent: '<i>No tiene</i>'},
                { data: 'personabytype.apellido_paterno', name: 'personabytype.apellido_paterno', defaultContent: '<i>No tiene</i>'},
                { data: 'personabytype.apellido_materno', name: 'personabytype.apellido_materno', defaultContent: '<i>No tiene</i>'},
                { data: 'personabytype.razonsocial', name: 'personabytype.razonsocial', defaultContent: '<i>No tiene</i>'},
                { data: 'personabytype.ruc', name: 'personabytype.ruc', defaultContent: '<i>No tiene</i>'},
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]            
            }
        });

    });

  function AgregarProducto(producto)
{
  document.getElementById('product-id').value = producto;
}
</script>
@endpush