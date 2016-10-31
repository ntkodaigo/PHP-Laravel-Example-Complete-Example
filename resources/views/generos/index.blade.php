@extends('layout')
    
@section('content')


 <h1>Lista de Generos</h1>
    <div class="row">
            <ul class="list-group">
                @foreach($generos as $genero)
                 <li class=" col-md-8 list-group-item">

                 <div class="col-md-8">{{$genero-> nombregenero}}
                 </div>

                  <div class="col-md-2 btn btn-primary">

                     <a href="/generos/{{ $genero->idgenero }}/edit">Editar</a>

                 </div>
                 <form action="/generos/{{ $genero->idgenero }}/delete" method="POST">
                     {{method_field('DELETE')}}

                     <button class="col-md-2 btn btn-primary">Eliminar</button>

                     {{csrf_field()}}
                 </form> 
                 

                </li>
        

    @endforeach
    </ul>
        
</div>


    <h3>Inserte Nuevo Genero</h3>
    <form method="POST" action="/generos/add">
        <div class="form-group">
            <input type="text" name="nombregenero" class="form-control">

        </div>
        
        <div>
            
            <button type="submit" class="btn btn-primary">Agregar Genero</button>

        </div>
        {{ csrf_field() }}

    </form>

@endsection
