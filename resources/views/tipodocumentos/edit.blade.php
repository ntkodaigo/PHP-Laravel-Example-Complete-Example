@extends('layout')
    
@section('content')
   
   <h1>Editar Tipo de Documento</h1>
   <div class="row">
       <form method="POST" action="/tipodocumentos/{{ $tipodocumento->idtipodocumento }}" >

       {{method_field ('PATCH')}}
           
        <div class="form-group">
            <input type="text" name="nombretipodocumento" value="{{ $tipodocumento -> nombretipodocumento}}" class="form-control"> </input>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Actualizar Tipo de Impuesto</button>

        </div>
        {{csrf_field()}}
       </form>
     </div>

@endsection
