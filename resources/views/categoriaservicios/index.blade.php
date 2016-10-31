@extends('layout')
    
@section('content')


 <h1>Lista de Categorias de Servicios</h1>
    <div class="row">
            <ul class="list-group">
                @foreach($categoriaservicios as $categoriaservicio)
                 <li class=" col-md-8 list-group-item">

                 <div class="col-md-8">{{$categoriaservicio-> nombrecategoriaservicio }}
                 </div>

                  <div class="col-md-2 btn btn-primary">

                     <a href="/categoriaservicios/{{ $categoriaservicio->idcategoriaservicio  }}/edit">Editar</a>

                 </div>
                 <form action="/categoriaservicios/{{ $categoriaservicio->idcategoriaservicio  }}/delete" method="POST">
                     {{method_field('DELETE')}}

                     <button class="col-md-2 btn btn-primary">Eliminar</button>

                     {{csrf_field()}}
                 </form> 
                 

                </li>
        

    @endforeach
    </ul>
        
</div>


    <h3>Inserte Categoria de Servicio</h3>
    <form method="POST" action="/categoriaservicios/add">
        <div class="form-group">
            <input type="text" name="nombrecategoriaservicio" class="form-control">

        </div>
        
        <div>
            
            <button type="submit" class="btn btn-primary">Agregar Categoria de Servicio</button>

        </div>
        {{ csrf_field() }}

    </form>

@endsection
