@extends('layout')
    
@section('content')


 <h3>Productos</h3>
    <div class="row">
            <ul class="list-group">
                @foreach($productos as $producto)
                 <li class=" col-md-8 list-group-item">

                 <div class="col-md-8">{{$producto-> nombreproducto}}
                 </div>

                <a href="/productos/{{ $producto->idproducto }}/edit">
                    <button class="col-md-2 btn btn-primary">

                        Editar

                    </button></a>
                 <form action="/productos/{{ $producto->idproducto }}/delete" method="POST">
                     {{method_field('DELETE')}}

                     <button class="col-md-2 btn btn-primary">Eliminar</button>

                     {{csrf_field()}}
                 </form> 
                </li>
    @endforeach
    </ul>
        
</div>


    <h3>Nuevo producto</h3>
    <form method="POST" action="/productos/add">
        
        <div class="form-group">Codigo
            <input type="text" name="codigoproducto" class="form-control">
        </div>

        <div class="form-group">Nombre
            <input type="text" name="nombreproducto" class="form-control">
        </div>

        <div class="form-group">Marca
            <input type="text" name="marcaproducto" class="form-control">
        </div>

        <div class="form-group">Modelo
            <input type="text" name="modeloproducto" class="form-control">
        </div>

        <div class="form-group">Descripcion
            <input type="text" name="descripcionproducto" class="form-control">
        </div>

        Categoria Producto
        <div class="form-group dropdown">
            <select id="idcategoriaproducto" name="idcategoriaproducto" class="btn btn-primary dropdown-toggle">
                <option selected="true" >Seleccione Categoria</option>
                @foreach($categoriaproductos as $categoriaproducto)
                <option id="{{ $categoriaproducto -> idcategoriaproducto }}" value="{{ $categoriaproducto -> idcategoriaproducto }}">{{ $categoriaproducto-> nombrecategoriaproducto }}</option>
                @endforeach
            </select>
        </div>

        <!-- Falta el filtro de los combobox segun su categoria -->
        Subcategoria Producto
        <div class="form-group dropdown">
            <select id="idsubcategoriaproducto" name="idsubcategoriaproducto" class="btn btn-primary dropdown-toggle">
                @foreach($subcategoriaproductos as $subcategoriaproducto)
                <option id="{{ $subcategoriaproducto -> idcategoriaproducto }}" value="{{ $subcategoriaproducto -> idsubcategoriaproducto }}">{{ $subcategoriaproducto-> nombresubcategoriaproducto }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Agregar producto</button>
        </div>
        {{ csrf_field() }}

    </form>


@stop


@section('footer')
<script type="text/javascript">
        $(document).ready(function(){
            $('#idsubcategoriaproducto').empty();
        });
        var names = $('#idsubcategoriaproducto option').clone();

        $('#idcategoriaproducto').change(function() {
            var val = $(this).children(":selected").attr("id");
            $('#idsubcategoriaproducto').empty();
            names.filter(function(idx, el) {
                return $(el).attr("id")===(val);
            }).appendTo('#idsubcategoriaproducto');
        });
    </script>
@stop