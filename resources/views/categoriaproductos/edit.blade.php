@extends('layout')
    
@section('content')
   
   <h1>Editar Categoria de Producto</h1>
   <div class="row">
       <form method="POST" action="/categoriaproductos/{{ $categoriaproducto->idcategoriaproducto }}" >

       {{method_field ('PATCH')}}
           
        <div class="form-group">
            <input type="text" name="nombrecategoriaproducto" value="{{ $categoriaproducto -> nombrecategoriaproducto}}" class="form-control"> </input>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Actualizar Categoria de Producto</button>

        </div>
        {{csrf_field()}}
       </form>
     </div>

@endsection
