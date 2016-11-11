@extends('layout')
    
@section('content')

		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1>Registro de {{ $entityName }}</h1>
				<form method="POST" action="/clientes/add">
					@if ($key == 'u')
						{{method_field ('PATCH')}}
					@endif
			        <div class="form-group">
			            <label for="idcliente" class="col-sm-2 col-form-label">DNI</label>
			            <div class="col-sm-8">
			    			<input type="text" class="form-control" id="idcliente" name="idcliente" placeholder="48238255" readonly>
						</div>
						<div class="col-sm-2">
			    			<a href="#" class="form-control btn btn-primary btn-lg" id="idcliente_edit" name="idcliente_edit">
    							<span class="glyphicon glyphicon-pencil"></span>  
  							</a>
			    		</div>
			        </div>
			        
			        <div id = 'msg'>This message will be replaced using Ajax. 
         			Click the button to replace the message.</div>

         			{{ csrf_field() }}
			    </form>
		    </div>
	    </div>
@stop

@section('footer')
	<script src="{{ URL::asset('js/clientes.crud.js') }}"> </script>
@stop