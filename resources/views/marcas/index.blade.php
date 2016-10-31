@extends('layout')
    
@section('content')


 <h1>Lista de Marcas</h1>
    <div class="row">
            <ul class="list-group">
                @foreach($marcas as $marca)
                 <li class=" col-md-10 list-group-item">

                 <div class="col-md-6">{{$marca-> nombremarca}}
                 </div>

                <a href="/marcas/{{ $marca->idmarca }}/details">
                     <div class="col-md-2 btn btn-primary">

                         Detalles

                     </div>
                 </a>

                <a href="/marcas/{{ $marca->idmarca }}/edit">
                    <div class="col-md-2 btn btn-primary">

                        Editar

                    </div>
                </a>    

                 <form action="/marcas/{{ $marca->idmarca }}/delete" method="POST">
                     {{method_field('DELETE')}}

                     <button class="col-md-2 btn btn-primary">Eliminar</button>

                     {{csrf_field()}}
                 </form> 
                 

                </li>
        

    @endforeach
    </ul>
        
</div>


    <h3>Inserte Marca</h3>
    <form method="POST" action="/marcas/add">
        <div class="form-group">
            <input type="text" name="nombremarca" class="form-control">

        </div>
        
        <div>
            
            <button type="submit" class="btn btn-primary">Agregar Marcas</button>

        </div>
        {{ csrf_field() }}

    </form>

@endsection
