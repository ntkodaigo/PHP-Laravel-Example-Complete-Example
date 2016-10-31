@extends('layout')
    
@section('content')
   
   <h1>Editar Tipo Telefono</h1>
   <div class="row">
       <form method="POST" action="/tipotelefonos/{{ $tipotelefono->idtipotelefono }}" >

       {{method_field ('PATCH')}}
           
        <div class="form-group">
            <input type="text" name="nombretipotelefono" value="{{ $tipotelefono -> nombretipotelefono}}" class="form-control"> </input>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Actualizar Tipo de Telefono</button>

        </div>
        {{csrf_field()}}
       </form>
     </div>

@endsection
