@extends('layout')
    
@section('content')

<center><h3>CATEGORIA PRODUCTOS</h3></center>
<a href="#">
<!-- <button type="button" class="btn btn-info btn-lg" id="add">Nuevo Categoria</button> -->
</a>
<h3>Inserte Subcategoria de Producto</h3>
    <form method="POST" action="/subcategoriaproductos/add" class="col-md-6">
        <div class="form-group">
            <input type="text" name="nombresubcategoriaproducto" class="form-control">
        </div>

        <div class="form-group dropdown">
            <select name="idcategoriaproducto" class="btn btn-info btn-lg dropdown-toggle">
                @foreach ($categoriaproductos as $categoriaproducto)
                <option value="{{ $categoriaproducto -> idcategoriaproducto }}">{{ $categoriaproducto-> nombrecategoriaproducto }}</option>
                @endforeach
            </select>
        </div>
        
        <div>
            <button type="submit" class="btn btn-info btn-lg">Agregar Subcategoria de Producto</button>
        </div>
        {{ csrf_field() }}

    </form>
<div class="panel-body">
    <table class="table table-hover">
      <caption>Subcategoria Info</caption>
      <thead>
        <th>Nombre Subcategoria</th>
      </thead>
      <tbody >
        @foreach($subcategoriaproductos as $subcategoriaproducto)
        <tr id="{{$subcategoriaproducto->idsubcategoriaproducto}}">
          <td>
            {{$subcategoriaproducto->nombresubcategoriaproducto}}
          </td>
          <td>
            <a href="/subcategoriaproductos/{{$subcategoriaproducto->idsubcategoriaproducto}}/edit">
            <button class="btn btn-success btn-edit">Editar</button>
            </a>
          </td>
          <td>
            <form action="/subcategoriaproductos/{{$subcategoriaproducto->idsubcategoriaproducto}}/delete" method="POST">
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
          $('#subcategoriaproducto').modal('show');
        });

      function mostrar()
      {

      }

      $('#frmSubcategoriaproducto').on('submit',function(e){
          e.preventDefault();
          var form=$('#frmSubcategoriaproducto');
          var formData=form.serialize();
          var url=form.attr('action');
          $.ajax({
              type : 'post',
              url : url,
              data : formData,
              success : function(data){
                   console.log(data);
                   $('#subcategoriaproducto').modal('hide');
                   $('#subcategoriaproducto').trigger('reset');
                   $('#nombresubcategoriaproducto').focus();
                   return data;
              },
              error : function(data){
                   

              }              
          });
      });
    </script>
    @stop