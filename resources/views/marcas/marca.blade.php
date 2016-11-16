<!DOCTYPE html>
<html lang="en">
<head>
  <title>Marca</title>
  <meta charset="utf-8">
  <meta name="_token" content="{!! csrf_token() !!}"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="panel panel-default">
  
  <div class="panel-heading">
     <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" id="add">Nueva Marca</button>
  </div>
  <div class="panel-body">
  @include('marcas/newMarca')
    <table class="table table-hover">
      <caption>Marca Info</caption>
      <thead>
        <th>ID</th>
        <th>Nombre Marca</th>
      </thead>
      <tbody >
        @foreach($marcas as $marca)
        <tr id="{{$marca -> idmarca}}">
          <td>
            {{$marca -> idmarca}}
          </td>
          <td>
            {{$marca -> nombremarca}}
          </td>
          <td>
            <button class="btn btn-success btn-edit">Editar</button>
            <button class="btn btn-danger btn-delete">Eliminar</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div> 


<script type="text/javascript">
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  }

})


  $('#add').on('click',function()
    {
      $('#marca').modal('show');
    });

  function mostrar()
  {

  }

  $('#frmMarca').on('submit',function(e){
      e.preventDefault();
      var form=$('#frmMarca');
      var formData=form.serialize();
      var url=form.attr('action');
      $.ajax({
          type : 'post',
          url : url,
          data : formData,
          success : function(data){
               console.log(data);
               $('#marca').modal('hide');
               $('#marca').trigger('reset');
               $('#nombremarca').focus();
               return data;
          },
          error : function(data){
               

          }              
      });
  });
</script>
</div>

</body>
</html>
