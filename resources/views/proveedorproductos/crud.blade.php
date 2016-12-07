@extends('layout')
    
@section('content')


 <center><h3>COMPRAS</h3></center>

    <form id="frm_almacen" method="POST" action="@if ($key == 'c') /proveedorproductos/add @else /proveedorproductos/{{ $proveedorproducto->idproveedor }} @endif" class="col-md-6">
    @if ($key == 'u')
    {{method_field ('PATCH')}}
    @endif

        <div class="form-group"> ID Proveedor
            <input type="text" id="proveedor-id" name="idproveedor" class="form-control" placeholder="Escoja una Proveedor" readonly 
            @if ($key=='u')
            value="{{ $proveedorproducto->idproveedor }}"
            @endif>
        </div>

        <div class="form-group"> ID Producto
            <input type="text" id="product-id" name="idproducto" class="form-control" placeholder="Escoja una Producto" readonly 
            @if ($key=='u')
            value="{{ $proveedorproducto->idproducto }}"
            @endif>
        </div>

        <div class="form-group"> ID Categoria
            <input type="text" id="categoria-id" name="idcategoriaproducto" class="form-control" placeholder="Escoja una Producto" readonly 
            @if ($key=='u')
            value="{{ $proveedorproducto->idcategoriaproducto }}"
            @endif>
        </div>

        <div class="form-group"> ID Subcategoria
            <input type="text" id="subcategoria-id" name="idsubcategoriaproducto" class="form-control" placeholder="Escoja una Producto" readonly 
            @if ($key=='u')
            value="{{ $proveedorproducto->idsubcategoriaproducto }}"
            @endif>
        </div>

        <div>
            <button id="save_producto" type="submit" class="btn btn-info btn-lg">Agregar producto</button>
        </div>
        {{ csrf_field() }}

    </form>
    <div class="col-xs-12"> Productos</div>
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
        });

    table_prov = $('#table-proveedor').DataTable({
            ajax:'{{URL::asset('/proveedoresData')}}',
            columns: [
                { data: 'persona.personabytype.nombres', name: 'persona.personabytype.nombres', defaultContent: '<i>No tiene</i>'},
                { data: 'persona.personabytype.apellido_paterno', name: 'persona.personabytype.apellido_paterno', defaultContent: '<i>No tiene</i>'},
                { data: 'persona.personabytype.apellido_materno', name: 'persona.personabytype.apellido_materno', defaultContent: '<i>No tiene</i>'},
                { data: 'persona.personabytype.razonsocial', name: 'persona.personabytype.razonsocial', defaultContent: '<i>No tiene</i>'},
                { data: 'persona.personabytype.ruc', name: 'persona.personabytype.ruc', defaultContent: '<i>No tiene</i>'},
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ] 
        });

    });

  function AgregarProducto(idproducto, idcategoriaproducto, idsubcategoriaproducto)
{
  document.getElementById('product-id').value = idproducto;
  document.getElementById('categoria-id').value = idcategoriaproducto;
  document.getElementById('subcategoria-id').value = idsubcategoriaproducto;
}

function AgregarProveedor(persona)
{
  document.getElementById('proveedor-id').value = persona;
}
</script>
@endpush