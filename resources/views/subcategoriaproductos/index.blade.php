@extends('layout')
    
@section('content')


 <h1>Lista de Subcategoria de Productos</h1>
    <div class="row">
            <ul class="list-group">
                @foreach($subcategoriaproductos as $subcategoriaproducto)
                 <li class=" col-md-8 list-group-item">

                 <div class="col-md-8">{{$subcategoriaproducto-> nombresubcategoriaproducto}}
                 </div>

                <a href="/subcategoriaproductos/{{ $subcategoriaproducto->idsubcategoriaproducto }}/edit">
                    <button class="col-md-2 btn btn-primary">

                        Editar

                    </button></a>
                 <form action="/subcategoriaproductos/{{ $subcategoriaproducto->idsubcategoriaproducto }}/delete" method="POST">
                     {{method_field('DELETE')}}

                     <button class="col-md-2 btn btn-primary">Eliminar</button>

                     {{csrf_field()}}
                 </form> 
                </li>
    @endforeach
    </ul>
        
</div>


    <h3>Inserte Subcategoria de Producto</h3>
    <form method="POST" action="/subcategoriaproductos/add">
        <div class="form-group">
            <input type="text" name="nombresubcategoriaproducto" class="form-control">
        </div>

        <div class="form-group dropdown">
            <select name="idcategoriaproducto" class="btn btn-primary dropdown-toggle">
                @foreach ($categoriaproductos as $categoriaproducto)
                <option value="{{ $categoriaproducto -> idcategoriaproducto }}">{{ $categoriaproducto-> nombrecategoriaproducto }}</option>
                @endforeach
            </select>
        </div>
        
        <div>
            <button type="submit" class="btn btn-primary">Agregar Subcategoria de Producto</button>
        </div>
        {{ csrf_field() }}

    </form>

@endsection