@extends('layout')
    
@section('content')


 <h1>Lista de Tipos de Documentos</h1>
    <div class="row">
            <ul class="list-group">
                @foreach($tipodocumentos as $tipodocumento)
                 <li class=" col-md-8 list-group-item">

                 <div class="col-md-8">{{$tipodocumento-> nombretipodocumento}}
                 </div>

                 <div class="col-md-2 btn btn-primary">

                     <a href="/tipodocumentos/{{ $tipodocumento->idtipodocumento }}/edit">Editar</a>

                 </div>

                 <form action="/tipodocumentos/{{ $tipodocumento->idtipodocumento }}/delete" method="POST">
                     {{method_field('DELETE')}}

                     <button class="col-md-2 btn btn-primary">Eliminar</button>

                     {{csrf_field()}}
                 </form> 

                </li>
        

    @endforeach
    </ul>
        
</div>


    <h3>Inserte el Tipo de Documento</h3>
    <form method="POST" action="/tipodocumentos/add">
        <div class="form-group">
            <input type="text" name="nombretipodocumento" class="form-control">

        </div>
        
        <div>
            
            <button type="submit" class="btn btn-primary">Agregar Tipo de Documento</button>

        </div>
        {{ csrf_field() }}

    </form>

@endsection