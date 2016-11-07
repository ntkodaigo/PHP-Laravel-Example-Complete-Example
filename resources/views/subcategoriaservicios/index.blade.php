@extends('layout')
    
@section('content')


 <h1>Lista de Subcategoria de Servicios</h1>
    <div class="row">
            <ul class="list-group">
                @foreach($subcategoriaservicios as $subcategoriaservicio)
                 <li class=" col-md-8 list-group-item">

                 <div class="col-md-8">{{$subcategoriaservicio-> nombresubcategoriaservicio}}
                 </div>

                <a href="/subcategoriaservicios/{{ $subcategoriaservicio->idsubcategoriaservicio }}/edit">
                    <button class="col-md-2 btn btn-primary">

                        Editar

                    </button></a>
                 <form action="/subcategoriaservicios/{{ $subcategoriaservicio->idsubcategoriaservicio }}/delete" method="POST">
                     {{method_field('DELETE')}}

                     <button class="col-md-2 btn btn-primary">Eliminar</button>

                     {{csrf_field()}}
                 </form> 
                </li>
    @endforeach
    </ul>
        
</div>


    <h3>Inserte Subcategoria de Servicios</h3>
    <form method="POST" action="/subcategoriaservicios/add">
        <div class="form-group">
            <input type="text" name="nombresubcategoriaservicio" class="form-control">
        </div>

        <div class="form-group dropdown">
            <select name="idcategoriaservicio" class="btn btn-primary dropdown-toggle">
                @foreach ($categoriaservicios as $categoriaservicio)
                <option value="{{ $categoriaservicio -> idcategoriaservicio }}">{{ $categoriaservicio-> nombrecategoriaservicio }}</option>
                @endforeach
            </select>
        </div>
        
        <div>
            <button type="submit" class="btn btn-primary">Agregar Subcategoria de Servicios</button>
        </div>
        {{ csrf_field() }}

    </form>

@endsection