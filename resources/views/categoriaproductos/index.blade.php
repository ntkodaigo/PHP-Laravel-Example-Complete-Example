@extends('layout')
    
@section('content')


 <h1>Lista de Categoria de Productos</h1>
    <div class="row">
            <ul class="list-group">
                @foreach($categoriaproductos as $categoriaproducto)
                 <li class=" col-md-8 list-group-item">

                 <div class="col-md-8">{{$categoriaproducto-> nombrecategoriaproducto}}
                 </div>

                  <div class="col-md-2 btn btn-primary">

                     <a href="/categoriaproductos/{{ $categoriaproducto->idcategoriaproducto }}/edit">Editar</a>

                 </div>
                 <form action="/categoriaproductos/{{ $categoriaproducto->idcategoriaproducto }}/delete" method="POST">
                     {{method_field('DELETE')}}

                     <button class="col-md-2 btn btn-primary">Eliminar</button>

                     {{csrf_field()}}
                 </form> 
                 

                </li>
        

    @endforeach
    </ul>
        
</div>


    <h3>Inserte Categoria de Producto</h3>
    <form method="POST" action="/categoriaproductos/add">
        <div class="form-group">
            <input type="text" name="nombrecategoriaproducto" class="form-control">

        </div>
        
        <div>
            
            <button type="submit" class="btn btn-primary">Agregar Categoria de Producto</button>

        </div>
        {{ csrf_field() }}

    </form>

@endsection