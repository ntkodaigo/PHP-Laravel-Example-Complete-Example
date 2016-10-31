@extends('layout')
    
@section('content')


 <h1>Lista de Paises</h1>
    <div class="row">
            <ul class="list-group">
                @foreach($paises as $pais)
                 <li class=" col-md-8 list-group-item">

                 <div class="col-md-8">{{$pais-> nombrepais}}
                 </div>

                 <div class="col-md-2 btn btn-primary">

                     <a href="/paises/{{ $pais->idpais }}/edit">Editar</a>

                 </div>
                 
                  <form action="/paises/{{ $pais->idpais }}/delete" method="POST">
                     {{method_field('DELETE')}}

                     <button class="col-md-2 btn btn-primary">Eliminar</button>

                     {{csrf_field()}}
                 </form> 

                </li>
        

   				@endforeach
    </ul>
        
</div>


    <h3>Inserte el Pais</h3>
    <form method="POST" action="/paises/add">
        <div class="form-group">
            <input type="text" name="nombrepais" class="form-control">

        </div>
        
        <div>
            
            <button type="submit" class="btn btn-primary">Agregar Nuevo Pais</button>

        </div>
        {{ csrf_field() }}

    </form>

@endsection
