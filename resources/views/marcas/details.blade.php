@extends('layout')
    
@section('content')
   
   <h1>Marca {{ $marca->nombremarca }}</h1>
   <div class="row">

      <h3>Modelos asociados</h3>
        <ul class="list-group">
          @foreach ($marca->modelos as $modelo)
                 <li class=" col-md-8 list-group-item">

                 <div class="col-md-8">{{ $modelo->nombremodelo }}
                 </div>

                <a href="/modelos/{{ $modelo->idmodelo }}/edit">
                    <button class="col-md-2 btn btn-primary">

                        Editar

                    </button></a>
                 <form action="/modelos/{{ $modelo->idmodelo }}/delete" method="POST">
                     {{method_field('DELETE')}}

                     <button class="col-md-2 btn btn-primary">Eliminar</button>

                     {{csrf_field()}}
                 </form> 
                </li>
          @endforeach
        </ul>
        
     </div>

    <h3>Nuevo Modelo</h3>
    <form method="POST" action="/modelos/add">
        <div class="form-group">
            <input type="text" name="nombremodelo" class="form-control">
        </div>

        <input type="hidden" name="idmarca" value="{{ $marca->idmarca }}">
        
        <div>
            <button type="submit" class="btn btn-primary">Agregar Modelo</button>
        </div>
        {{ csrf_field() }}
      </form>

@endsection
