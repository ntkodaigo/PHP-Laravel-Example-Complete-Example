@extends('layout')
    
@section('content')
   
   <h1>Editar Pais</h1>
   <div class="row">
       <form method="POST" action="/departamentos/{{ $departamento->iddepartamento }}" >

       {{method_field ('PATCH')}}
           
        <div class="form-group">
            <input type="text" name="nombredepartamento" value="{{ $departamento -> nombredepartamento}}" class="form-control"> </input>
        </div>

        <div class="form-group dropdown">
            <select name="idpais" class="btn btn-primary dropdown-toggle">
                @foreach ($pais as $pais)
                  @if ($pais->idpais === $departamento->idpais)
                    <option value="{{ $pais -> idpais }}" selected>{{ $pais-> nombrepais }}</option>
                  @else
                    <option value="{{ $pais -> idpais }}">{{ $pais-> nombrepais }}</option>
                  @endif
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Actualizar Pais</button>

        </div>
        {{csrf_field()}}
       </form>
     </div>

@endsection
