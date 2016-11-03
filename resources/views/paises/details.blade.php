@extends('layout')
    
@section('content')
   
   <h1>Pais {{ $pais->nombrepais }}</h1>
   <div class="row">

      <h3>Departamentos asociados</h3>
        <ul class="list-group">
          @foreach ($pais -> departamentos as $departamento)
                 <li class=" col-md-8 list-group-item">

                 <div class="col-md-8">{{ $departamento->nombredepartamento }}
                 </div>

                <a href="/departamentos/{{ $departamento->iddepartamento }}/edit">
                    <button class="col-md-2 btn btn-primary">

                        Editar

                    </button></a>
                 <form action="/departamentos/{{ $departamento->iddepartamento }}/delete" method="POST">
                     {{method_field('DELETE')}}

                     <button class="col-md-2 btn btn-primary">Eliminar</button>

                     {{csrf_field()}}
                 </form> 
                </li>
          @endforeach
        </ul>
        
     </div>

    <h3>Nuevo Departamento</h3>
    <form method="POST" action="/departamentos/add">
        <div class="form-group">
            <input type="text" name="nombredepartamento" class="form-control">
        </div>

        <input type="hidden" name="idpais" value="{{ $pais->idpais }}">
        
        <div>
            <button type="submit" class="btn btn-primary">Agregar Departamento</button>
        </div>
        {{ csrf_field() }}
      </form>

@endsection
