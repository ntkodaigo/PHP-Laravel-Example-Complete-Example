@extends('layout')
    
@section('content')


 <h1>Lista de Sugerencia precio articulo</h1>
    <div class="row">
            <ul class="list-group">
                @foreach($sugerenciaprecioarticulos as $sugerenciaprecioarticulo)
                 <li class=" col-md-8 list-group-item">

                 <div class="col-md-8">{{$sugerenciaprecioarticulo-> preciosugerido}}
                 </div>

                <a href="/sugerenciaprecioarticulos/{{ $sugerenciaprecioarticulo->idsugerenciaprecioarticulo }}/edit">
                    <button class="col-md-2 btn btn-primary">

                        Editar

                    </button></a>
                 <form action="/sugerenciaprecioarticulos/{{ $sugerenciaprecioarticulo->idsugerenciaprecioarticulo }}/delete" method="POST">
                     {{method_field('DELETE')}}

                     <button class="col-md-2 btn btn-primary">Eliminar</button>

                     {{csrf_field()}}
                 </form> 
                </li>
    @endforeach
    </ul>
        
</div>


    <h3>Inserte Sugerencia precio articulo</h3>
    <form method="POST" action="/sugerenciaprecioarticulos/add">
        <div class="form-group">Precio sugerido
            <input type="text" name="preciosugerido" class="form-control">
        </div>

        <div class="form-group">Descuento Sugerido
            <input type="text" name="descuentosugerido" class="form-control">
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Agregar Sugerencia precio articulo</button>
        </div>
        {{ csrf_field() }}

    </form>

@endsection