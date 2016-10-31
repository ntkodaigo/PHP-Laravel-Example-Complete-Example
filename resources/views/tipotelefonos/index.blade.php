@extends('layout')
    
@section('content')


 <h1>Lista de Tipos de Telefono</h1>
    <div class="row">
            <ul class="list-group">
                @foreach($tipotelefonos as $tipotelefono)
                 <li class=" col-md-8 list-group-item">

                 <div class="col-md-8">{{$tipotelefono-> nombretipotelefono}}
                 </div>

                  <div class="col-md-2 btn btn-primary">

                     <a href="/tipotelefonos/{{ $tipotelefono->idtipotelefono }}/edit">Editar</a>

                 </div>
                 <form action="/tipotelefonos/{{ $tipotelefono->idtipotelefono }}/delete" method="POST">
                     {{method_field('DELETE')}}

                     <button class="col-md-2 btn btn-primary">Eliminar</button>

                     {{csrf_field()}}
                 </form> 
                 

                </li>
        

    @endforeach
    </ul>
        
</div>


    <h3>Inserte el Tipo de Telefono</h3>
    <form method="POST" action="/tipotelefonos/add">
        <div class="form-group">
            <input type="text" name="nombretipotelefono" class="form-control">

        </div>
        
        <div>
            
            <button type="submit" class="btn btn-primary">Agregar Tipo de Telefono</button>

        </div>
        {{ csrf_field() }}

    </form>

@endsection
