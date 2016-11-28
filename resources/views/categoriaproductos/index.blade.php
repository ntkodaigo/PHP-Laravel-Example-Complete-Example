@extends('layout')
    
@section('content')

<center><h3>CATEGORIA PRODUCTOS</h3></center>
<a href="#">
<!-- <button type="button" class="btn btn-info btn-lg" id="add">Nuevo Categoria</button> -->
<h3>Inserte Categoria de Producto</h3>
    <form method="POST" action="/categoriaproductos/add" class="col-md-6">
        <div class="form-group">
            <input type="text" name="nombrecategoriaproducto" class="form-control">

        </div>
        
        <div>
            
            <button type="submit" class="btn btn-info btn-lg">Agregar Categoria de Producto</button>

        </div>
        {{ csrf_field() }}

    </form>
</a>
<div class="panel-body">
    <table class="table table-hover" id="table-producto">
                  <thead class="thead-inverse">
                      <tr>
                          <th>Nombre Categoria</th>
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
            ajax:'{{URL::asset('/categoriaproductos/data')}}',
            columns: [
                { data: 'nombrecategoriaproducto', name: 'nombrecategoriaproducto' },
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

  function btnDeleteCategoriaProducto(categoriaproducto)
{
  var url="/categoriaproductos/" + categoriaproducto + "/delete";
  var data = {idcategoriaproducto:categoriaproducto}

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