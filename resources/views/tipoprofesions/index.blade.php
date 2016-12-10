@extends('layout')
    
@section('content')


 <h1>Lista de Tipos de Profesion</h1>
    <div class="row">
            <ul class="list-group">
                @foreach($tipoprofesions as $tipoprofesion)
                 <li class=" col-md-8 list-group-item">

                 <div class="col-md-8">{{$tipoprofesion-> nombretipoprofesion}}
                 </div>

                  <div class="col-md-2 btn btn-primary">

                     <a href="/tipoprofesions/{{ $tipoprofesion->idtipoprofesion }}/edit" style="color: white;">Editar</a>

                 </div>
                 <form action="/tipoprofesions/{{ $tipoprofesion->idtipoprofesion }}/delete" method="POST">
                     {{method_field('DELETE')}}

                     <button class="col-md-2 btn btn-primary">Eliminar</button>

                     {{csrf_field()}}
                 </form> 
                 

                </li>
        

    @endforeach
    </ul>
        
</div>


    <h3>Inserte el Tipo de Profesion</h3>
    <form method="POST" action="/tipoprofesions/add">
        <div class="form-group">
            <input type="text" name="nombretipoprofesion" class="form-control">

        </div>
        
        <div>
            
            <button type="submit" class="btn btn-primary">Agregar Tipo de Profesion</button>

        </div>
        {{ csrf_field() }}

    </form>

@endsection
