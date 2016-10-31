@extends('layout')
    
@section('content')
   
   <h1>Editar Tipo de Impuesto</h1>
   <div class="row">
       <form method="POST" action="/tipoimpuestos/{{ $tipoimpuesto->idtipoimpuesto }}" >

       {{method_field ('PATCH')}}
           
        <div class="form-group">
            <input type="text" name="nombretipoimpuesto" value="{{ $tipoimpuesto -> nombretipoimpuesto}}" class="form-control"> </input>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Actualizar Tipo de Impuesto</button>

        </div>
        {{csrf_field()}}
       </form>
     </div>

@endsection
