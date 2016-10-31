@extends('layout')
    
@section('content')
   
   <h1>Editar Tipo de Profesion</h1>
   <div class="row">
       <form method="POST" action="/tipoprofesions/{{ $tipoprofesion->idtipoprofesion }}" >

       {{method_field ('PATCH')}}
           
        <div class="form-group">
            <input type="text" name="nombretipoprofesion" value="{{ $tipoprofesion -> nombretipoprofesion}}" class="form-control"> </input>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Actualizar Tipo de Profesion</button>

        </div>
        {{csrf_field()}}
       </form>
     </div>

@endsection
