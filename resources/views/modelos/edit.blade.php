@extends('layout')
    
@section('content')
   
   <h1>Editar Marca</h1>
   <div class="row">
       <form method="POST" action="/modelos/{{ $modelo->idmodelo }}" >

       {{method_field ('PATCH')}}
           
        <div class="form-group">
            <input type="text" name="nombremodelo" value="{{ $modelo -> nombremodelo}}" class="form-control"> </input>
        </div>

        <div class="form-group dropdown">
            <select name="idmarca" class="btn btn-primary dropdown-toggle">
                @foreach ($marcas as $marca)
                  @if ($marca->idmarca === $modelo->idmarca)
                    <option value="{{ $marca -> idmarca }}" selected>{{ $marca-> nombremarca }}</option>
                  @else
                    <option value="{{ $marca -> idmarca }}">{{ $marca-> nombremarca }}</option>
                  @endif
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Actualizar Marca</button>

        </div>
        {{csrf_field()}}
       </form>
     </div>

@endsection
