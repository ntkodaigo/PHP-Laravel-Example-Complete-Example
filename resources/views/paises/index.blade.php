@extends('layout')
    
@section('content')


 <h1>Lista de Paises</h1>
    <div class="row">
            <ul class="list-group">
                @foreach($paises as $pais)
                 <li class=" col-md-10 list-group-item">

                 <div class="col-md-6">{{$pais-> nombrepais}}
                 </div>

                <a href="/paises/{{ $pais->idpais }}/details">
                     <div class="col-md-2 btn btn-primary">

                         Detalles

                     </div>
                 </a>

                <a href="/paises/{{ $pais->idpais }}/edit">
                    <div class="col-md-2 btn btn-primary">

                        Editar

                    </div>
                </a>    

                 <form action="/paises/{{ $pais->idpais }}/delete" method="POST">
                     {{method_field('DELETE')}}

                     <button class="col-md-2 btn btn-primary">Eliminar</button>

                     {{csrf_field()}}
                 </form> 
                 

                </li>
        

    @endforeach
    </ul>
        
</div>


    <h3>Inserte El Pais</h3>
    <form method="POST" action="/paises/add">
        <div class="form-group">
            <input type="text" name="nombrepais" class="form-control">

        </div>
        
        <div>
            
            <button type="submit" class="btn btn-primary">Agregar Pais</button>

        </div>
        {{ csrf_field() }}

    </form>

@endsection
