@extends('layout')
    
@section('content')

    <h1>Inserte Categoria de Servicio</h1>
    <form method="POST" action="/categoriaservicios/add" class="col-md-6">
        <div class="form-group">
            <input type="text" name="nombrecategoriaservicio" class="form-control">

        </div>
        
        <div>
            
            <button type="submit" class="btn btn-info btn-lg">Agregar Categoria de Servicio</button>

        </div>
        {{ csrf_field() }}

    </form>
    
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
            ajax:'{{URL::asset('/categoriaservicios/data')}}',
            columns: [
                { data: 'nombrecategoriaservicio', name: 'nombrecategoriaservicio' },
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

  function btnDeleteCategoriaServicio(categoriaservicio)
{
  var url="/categoriaservicios/" + categoriaservicio + "/delete";
  var data = {idcategoriaservicio:categoriaservicio}

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