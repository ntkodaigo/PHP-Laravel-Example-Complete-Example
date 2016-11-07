@extends('layout')
    
@section('content')


 <h3>Lista de Departamentos</h3>
    <div class="row">
            <ul class="list-group">
                @foreach($departamentos as $departamento)
                 <li class=" col-md-8 list-group-item">

                 <div class="col-md-8">{{$departamento-> nombredepartamento}}
                 </div>

                <a href="/departamentos/{{ $departamento->iddepartamento }}/edit">
                    <button class="col-md-2 btn btn-primary">

                        Editar

                    </button></a>
                 <form action="/departamentos/{{ $departamento->iddepartamento }}/delete" method="POST">
                     {{method_field('DELETE')}}

                     <button class="col-md-2 btn btn-primary">Eliminar</button>

                     {{csrf_field()}}
                 </form> 
                </li>
    @endforeach
    </ul>
        
</div>


    <h3>Nuevo Departamento</h3>
    <form method="POST" action="/departamentos/add">
        <div class="form-group">
            <input type="text" name="nombredepartamento" class="form-control">
        </div>

        <div class="form-group dropdown">
            <select name="idpais" class="btn btn-primary dropdown-toggle">
                @foreach ($pais as $pais)
                <option value="{{ $pais -> idpais }}">{{ $pais-> nombrepais }}</option>
                @endforeach
            </select>
        </div>
        
        <div>
            <button type="submit" class="btn btn-primary">Agregar Departamento</button>
        </div>
        {{ csrf_field() }}

    </form>

@endsection
