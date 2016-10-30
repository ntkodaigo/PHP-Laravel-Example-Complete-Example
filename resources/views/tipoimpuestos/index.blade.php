@extends('layout')
    
@section('content')


 <h1>Todos Los Tipos de Impuestos</h1>
    <div class="row">
            <ul class="list-group">
                @foreach($tipoimpuestos as $tipoimpuesto)
                 <li class=" col-md-8 list-group-item">

                 <div class="col-md-8">{{$tipoimpuesto-> nombretipoimpuesto}}</div>

                <!--  <div class="col-md-2 btn btn-primary">

                     <a href="/tipoimpuestos/{{ $tipoimpuesto->id }}/edit">Editar</a>

                 </div>
                 <form action="/tipoimpuestos/{{ $tipoimpuesto->id }}/delete" method="POST">
                     {{method_field('DELETE')}}

                     <button class="col-md-2 btn btn-primary">Eliminar</button>

                     {{csrf_field()}}
                 </form> -->
                 

                </li>
        

    @endforeach
    </ul>
        
</div>


    <h3>Inserte el Tipo de Impuesto</h3>
    <form method="POST" action="/tipoimpuestos/add">
        <div class="form-group">
            <input type="text" name="" class="form-control">

        </div>
        
        <div>
            
            <button type="submit" class="btn btn-primary">Agregar Tipo de Impuesto</button>

        </div>
        {{ csrf_field() }}

    </form>

@endsection
