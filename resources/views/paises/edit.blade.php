@extends('layout')
    
@section('content')
   
   <h1>Editar Pais</h1>
   <div class="row">
       <form method="POST" action="/paises/{{ $pais->idpais }}" >

       {{method_field ('PATCH')}}
           
        <div class="form-group">
            <input type="text" name="nombrepais" value="{{ $pais -> nombrepais }}" class="form-control"> </input>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Actualizar Pais</button>

        </div>
        {{csrf_field()}}
       </form>
     </div>

@endsection
