@extends('layout')
    
@section('content')
   
   <h1>Editar Marca</h1>
   <div class="row">
       <form method="POST" action="/marcas/{{ $marca->idmarca }}" class="col-md-6">

       {{method_field ('PATCH')}}
           
        <div class="form-group">
            <input type="text" name="nombremarca" value="{{ $marca -> nombremarca}}" class="form-control"> </input>
        </div>
        <div>
            <button type="submit" class="btn btn-info btn-lg">Actualizar Marca</button>

        </div>
        {{csrf_field()}}
       </form>
     </div>

@endsection
