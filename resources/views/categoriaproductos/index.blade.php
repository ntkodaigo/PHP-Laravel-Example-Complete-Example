@extends('layout')
    
@section('content')

<center><h3>CATEGORIA PRODUCTOS</h3></center>
<a href="#">
<!-- <button type="button" class="btn btn-info btn-lg" id="add">Nuevo Categoria</button> -->
<h3>Inserte Categoria de Producto</h3>
    <form method="POST" action="/categoriaproductos/add" class="col-md-6">
        <div class="form-group">
            <input type="text" name="nombrecategoriaproducto" class="form-control">

        </div>
        
        <div>
            
            <button type="submit" class="btn btn-info btn-lg">Agregar Categoria de Producto</button>

        </div>
        {{ csrf_field() }}

    </form>
</a>
<div class="panel-body">
    <table class="table table-hover">
      <caption>Categoria Info</caption>
      <thead>
        <th>Nombre Categoria</th>
      </thead>
      <tbody >
        @foreach($categoriaproductos as $categoriaproducto)
        <tr id="{{$categoriaproducto->idcategoriaproducto}}">
          <td>
            {{$categoriaproducto->nombrecategoriaproducto}}
          </td>
          <td>
            <a href="/categoriaproductos/{{$categoriaproducto->idcategoriaproducto}}/edit">
            <button class="btn btn-success btn-edit">Editar</button>
            </a>
          </td>
          <td>
            <form action="/categoriaproductos/{{$categoriaproducto->idcategoriaproducto}}/delete" method="POST">
                {{method_field('DELETE')}}
                <button class="btn btn-danger btn-delete">Eliminar</button>
                {{csrf_field()}}
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@stop
@section('footer')
  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }

    })


      $('#add').on('click',function()
        {
          $('#categoriaproducto').modal('show');
        });

      function mostrar()
      {

      }

      $('#frmCategoriaproducto').on('submit',function(e){
          e.preventDefault();
          var form=$('#frmCategoriaproducto');
          var formData=form.serialize();
          var url=form.attr('action');
          $.ajax({
              type : 'post',
              url : url,
              data : formData,
              success : function(data){
                   console.log(data);
                   $('#categoriaproducto').modal('hide');
                   $('#categoriaproducto').trigger('reset');
                   $('#nombrecategoriaproducto').focus();
                   return data;
              },
              error : function(data){
                   

              }              
          });
      });
    </script>
    @stop