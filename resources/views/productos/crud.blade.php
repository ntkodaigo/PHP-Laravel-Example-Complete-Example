@extends('layout')
    
@section('content')


 <center><h3>PRODUCTOS</h3></center>

    <form id="frm_producto" method="POST" action="@if ($key == 'c') /productos/add @else /productos/{{ $producto->idproducto }} @endif" class="col-md-6">
    @if ($key == 'u')
    {{method_field ('PATCH')}}
    @endif
        
        <div class="form-group">Codigo
            <input type="text" name="codigoproducto" class="form-control"
            @if ($key=='u')
            value="{{ $producto->codigoproducto }}"
            @endif>
        </div>

        <div class="form-group">Nombre
            <input type="text" name="nombreproducto" class="form-control"
            @if ($key=='u')
            value="{{ $producto->nombreproducto }}"
            @endif>
        </div>

        <div class="form-group">Marca
            <input type="text" name="marcaproducto" class="form-control"
            @if ($key=='u')
            value="{{ $producto->marcaproducto }}"
            @endif>
        </div>

        <div class="form-group">Modelo
            <input type="text" name="modeloproducto" class="form-control"
            @if ($key=='u')
            value="{{ $producto->modeloproducto }}"
            @endif>
        </div>

        <div class="form-group">Descripcion
            <input type="text" name="descripcionproducto" class="form-control"
            @if ($key=='u')
            value="{{ $producto->descripcionproducto }}"
            @endif>
        </div>

        Categoria Producto
        <div class="form-group dropdown">
            <select id="idcategoriaproducto" name="idcategoriaproducto" class="btn btn-info btn-lg dropdown-toggle">
                <option selected="true" >Seleccione Categoria</option>
                @foreach($categoriaproductos as $categoriaproducto)
                <option id="{{ $categoriaproducto -> idcategoriaproducto }}" value="{{ $categoriaproducto -> idcategoriaproducto }}">{{ $categoriaproducto-> nombrecategoriaproducto }}</option>
                @endforeach
            </select>
        </div>

        <!-- Falta el filtro de los combobox segun su categoria -->
        Subcategoria Producto
        <div class="form-group dropdown">
            <select id="idsubcategoriaproducto" name="idsubcategoriaproducto" class="btn btn-info btn-lg dropdown-toggle">
                @foreach($subcategoriaproductos as $subcategoriaproducto)
                <option id="{{ $subcategoriaproducto -> idcategoriaproducto }}" value="{{ $subcategoriaproducto -> idsubcategoriaproducto }}">{{ $subcategoriaproducto-> nombresubcategoriaproducto }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button id="save_producto" type="submit" class="btn btn-info btn-lg">Agregar producto</button>
        </div>
        {{ csrf_field() }}

    </form>
@stop


@section('footer')
    <script type="text/javascript">
            $(document).ready(function(){
                var names = $('#idsubcategoriaproducto option').clone();
                $('#idsubcategoriaproducto').empty();

                @if($key=='u')
                {
                    $('#idcategoriaproducto option[value=' + {{ $producto -> idcategoriaproducto }} + ']').attr('selected', true);
                    
                    var val = $('#idcategoriaproducto').children(":selected").attr("id");
                    names.filter(function(idx, el) {
                        return $(el).attr("id")===(val);
                    }).appendTo('#idsubcategoriaproducto');
                

                    $('#idsubcategoriaproducto option[value=' + {{ $producto -> idsubcategoriaproducto }} + ']').attr('selected', true);
                };
                @endif
            });
            var names = $('#idsubcategoriaproducto option').clone();

            $('#idcategoriaproducto').change(function() {
                var val = $(this).children(":selected").attr("id");
                $('#idsubcategoriaproducto').empty();
                names.filter(function(idx, el) {
                    return $(el).attr("id")===(val);
                }).appendTo('#idsubcategoriaproducto');
            });

            $('#frm_producto').on('submit',function(e){
              jQuery("button[id=save_producto]").attr("disable",true);
            });
    </script>
@stop