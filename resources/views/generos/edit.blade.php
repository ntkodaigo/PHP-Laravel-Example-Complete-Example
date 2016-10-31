@extends('layout')
    
@section('content')
   
   <h1>Editar Genero</h1>
   <div class="row">
       <form method="POST" action="/generos/{{ $genero->idgenero }}" >

       {{method_field ('PATCH')}}
           
        <div class="form-group">
            <input type="text" name="nombregenero" value="{{ $genero -> nombregenero}}" class="form-control"> </input>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Actualizar Genero</button>

        </div>
        {{csrf_field()}}
       </form>
     </div>

@endsection