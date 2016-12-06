@extends('layout')
    
@section('content')


 <h1>Lista de Vehiculos</h1>
    <div class="row">
            <ul class="list-group">
                @foreach($marcas as $marca)
                 <li class=" col-md-10 list-group-item">

                 <div class="col-md-6">{{$marca-> nombremarca}}
                 </div>

                <a href="/marcas/{{ $marca->idmarca }}/details">
                     <div class="col-md-2 btn btn-primary">

                         Detalles

                     </div>
                 </a>

                <a href="/marcas/{{ $marca->idmarca }}/edit">
                    <div class="col-md-2 btn btn-primary">

                        Editar

                    </div>
                </a>    

                <form action="/marcas/{{ $marca->idmarca }}/delete" method="POST">
                    {{method_field('DELETE')}}
                    <button class="col-md-2 btn btn-primary">Eliminar</button>
                    {{csrf_field()}}
                </form> 
                 

                </li>
        

    @endforeach
    </ul>
        
</div>


    <h3>Inserte Vehiculo</h3>
    <form class="form-horizontal" role="form" method="POST" action="/vehiculos/add">

        <input type="hidden" name="idvehiculo" value="">
        
          <div class="modal-body">
            <div class="form-group">
              <label for="numeroplacavehivulo" class="col-sm-3 control-label">Numero de placa</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="numeroplacavehivulo" name="numeroplacavehivulo">
              </div>
            </div>

            <div class="form-group">
              <label for="idmarca" class="col-sm-3 control-label">Marca</label>
              <div class="col-sm-9">
                <select id="idmarca" name="idmarca" class="form-control dropdown-toggle">
                    @foreach ($marcas as $marca)
                      <option value="{{ $marca -> idmarca }}">
                        {{ ucfirst($marca-> nombremarca) }}
                      </option>
                    @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="idmodelo" class="col-sm-3 control-label">Modelo</label>
              <div class="col-sm-9">
                <select id="idmodelo" name="idmodelo" class="form-control dropdown-toggle">
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="aniovehiculo" class="col-sm-3 control-label">Año</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="aniovehiculo" name="aniovehiculo">
              </div>
            </div>

            <div class="form-group">
              <label for="descripcion" class="col-sm-3 control-label">Descripcion</label>
              <div class="col-sm-9">
                <textarea class="form-control" rows="4" id="descripcion" name="descripcion"></textarea>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <input type="submit" id="regvehiculo" class="btn btn-primary" value="Guardar">
            
            <button id="closebutton" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>

        {{ csrf_field() }}

    </form>

@endsection

@push('scripts')

<script type="text/javascript">

$(function(){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

    $("#idmarca").prop("selectedIndex", -1);
});

$('#idmarca').on('change', function() {
    var data = {
            idmarca: $(this).val()
            //_method: jQuery("input[name=_method]").attr('value')
    }
    $.post('/marcas/' + $(this).val() + '/modelos', data, function(response){
        if(response.success)
        {
            var modelosSelect = $('#idmodelo').empty();
            $.each(response.modelos, function(i, modelo){
                $('<option/>', {
                    value:modelo.idmodelo,
                    text:modelo.nombremodelo
                }).appendTo(modelosSelect);
            })

            $("#idmodelo").prop("selectedIndex", -1);
        }
    }, 'json');
});

</script>
@endpush

