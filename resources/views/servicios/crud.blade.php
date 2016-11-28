@extends('layout')
    
@section('content')


 <center><h3>SERVICIOS</h3></center>

    <form id="frm_servicio" method="POST" action="@if ($key == 'c') /servicios/add @else /servicios/{{ $servicio->idservicio }} @endif" class="col-md-6">
    @if ($key == 'u')
    {{method_field ('PATCH')}}
    @endif

        <div class="form-group">Nombre
            <input type="text" name="nombreservicio" class="form-control"
            @if ($key=='u')
            value="{{ $servicio->nombreservicio }}"
            @endif>
        </div>

        Categoria Servicio
        <div class="form-group dropdown">
            <select id="idcategoriaservicio" name="idcategoriaservicio" class="btn btn-info btn-lg dropdown-toggle">
                <option selected="true" >Seleccione Categoria</option>
                @foreach($categoriaservicios as $categoriaservicio)
                <option id="{{ $categoriaservicio -> idcategoriaservicio }}" value="{{ $categoriaservicio -> idcategoriaservicio }}">{{ $categoriaservicio-> nombrecategoriaservicio }}</option>
                @endforeach
            </select>
        </div>

        <!-- Falta el filtro de los combobox segun su categoria -->
        Subcategoria Servicio
        <div class="form-group dropdown">
            <select id="idsubcategoriaservicio" name="idsubcategoriaservicio" class="btn btn-info btn-lg dropdown-toggle">
                @foreach($subcategoriaservicios as $subcategoriaservicio)
                <option id="{{ $subcategoriaservicio -> idcategoriaservicio }}" value="{{ $subcategoriaservicio -> idsubcategoriaservicio }}">{{ $subcategoriaservicio-> nombresubcategoriaservicio }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button id="save_producto" type="submit" class="btn btn-info btn-lg">Agregar servicio</button>
        </div>
        {{ csrf_field() }}

    </form>
@stop


@section('footer')
    <script type="text/javascript">
            $(document).ready(function(){
                var names = $('#idsubcategoriaservicio option').clone();
                $('#idsubcategoriaservicio').empty();

                @if($key=='u')
                {
                    $('#idcategoriaservicio option[value=' + {{ $servicio -> idcategoriaservicio }} + ']').attr('selected', true);
                    
                    var val = $('#idcategoriaservicio').children(":selected").attr("id");
                    names.filter(function(idx, el) {
                        return $(el).attr("id")===(val);
                    }).appendTo('#idsubcategoriaservicio');
                

                    $('#idsubcategoriaservicio option[value=' + {{ $servicio -> idsubcategoriaservicio }} + ']').attr('selected', true);
                };
                @endif
            });
            var names = $('#idsubcategoriaservicio option').clone();

            $('#idcategoriaservicio').change(function() {
                var val = $(this).children(":selected").attr("id");
                $('#idsubcategoriaservicio').empty();
                names.filter(function(idx, el) {
                    return $(el).attr("id")===(val);
                }).appendTo('#idsubcategoriaservicio');
            });

            $('#frm_servicio').on('submit',function(e){
              jQuery("button[id=save_servicio]").attr("disable",true);
            });
    </script>
@stop