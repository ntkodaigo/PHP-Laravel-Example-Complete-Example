<!-- Modal -->
  <div class="modal fade" id="marca" role="dialog"  >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modelo Info</h4>
        </div>
        <div class="modal-body">
        <form action="" method="POST" id="frmModelo" >
       {{method_field ('PATCH')}}
          <div class="row">
          	<div class="col-lg-4 col-sm-4">
          	<div class="form-group">
              <input type="hidden" name="idmodelo" id="idmodelo">
          		<input type="text" name="nombremodelo" id="nombremodelo" placeholder="Nombre de la Modelo">
          	</div>
          	</div>
          </div>
        </div>

        <div class="modal-footer">
          <input type="submit" name="nombremarca" id="regmarca" class="btn btn-primary" >
          
            <button id="closebutton" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
       
        </form>
      </div>      
    </div>
  </div>