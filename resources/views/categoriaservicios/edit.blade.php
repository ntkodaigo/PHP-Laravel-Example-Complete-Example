@extends('layout')
    
@section('content')
   
   <h1>Editar Categoria de Servicio</h1>
   <div class="row">
       <form method="POST" action="/categoriaservicios/{{ $categoriaservicio->idcategoriaservicio  }}" >

       {{method_field ('PATCH')}}
           
        <div class="form-group">
            <input type="text" name="nombrecategoriaservicio" value="{{ $categoriaservicio -> nombrecategoriaservicio }}" class="form-control"> </input>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Actualizar Categoria de Servicio</button>

        </div>
        {{csrf_field()}}
       </form>
     </div>

@endsection



