@extends('layout')
    
@section('content')

<center><h3>PRODUCTOS</h3></center>
<a href="/productos/new">
<button type="button" class="btn btn-info btn-lg" id="add">Nuevo Producto</button>
</a>
<div class="panel-body">
    <table class="table table-hover">
      <caption>Producto Info</caption>
      <thead>
        <th>Codigo</th>
        <th>Nombre Producto</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Descripcion</th>
      </thead>
      <tbody >
        @foreach($productos as $producto)
        <tr id="{{$producto->idproducto}}">
          <td>
            {{$producto->codigoproducto}}
          </td>
          <td>
            {{$producto->nombreproducto}}
          </td>
          <td>
            {{$producto->marcaproducto}}
          </td>
          <td>
            {{$producto->modeloproducto}}
          </td>
          <td>
            {{$producto->descripcionproducto}}
          </td>
          <td>
          	<a href="/productos/edit/{{$producto->idproducto}}">
            <button class="btn btn-success btn-edit">Editar</button>
            </a>
          </td>
          <td>
            <form action="/productos/{{$producto->idproducto}}/delete" method="POST">
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
          $('#producto').modal('show');
        });

      function mostrar()
      {

      }

      $('#frmProducto').on('submit',function(e){
          e.preventDefault();
          var form=$('#frmProducto');
          var formData=form.serialize();
          var url=form.attr('action');
          $.ajax({
              type : 'post',
              url : url,
              data : formData,
              success : function(data){
                   console.log(data);
                   $('#producto').modal('hide');
                   $('#producto').trigger('reset');
                   $('#nombreproducto').focus();
                   return data;
              },
              error : function(data){
                   

              }              
          });
      });
    </script>
    @stop