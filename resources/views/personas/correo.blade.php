  <!-- Modal -->
  <div class="modal fade" id="correo-modal" role="dialog"  >
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Correo</h4>
        </div>
        <div class="modal-body">
          <form action="" method="POST" id="frmCorreo">
            <input type="hidden" name="idcorreoelectronico" value="">
            <div class="row">
            	<div class="col-sm-8">
              	<div class="form-group">
              		<input type="text" name="direccioncorreoelectronico" id="direccioncorreoelectronico" placeholder="Correo electronico" value="">
              	</div>
            	</div>
            </div>

            <div class="modal-footer">
              <input type="submit" id="regcorreo" class="btn btn-primary" value="Guardar">
              
              <button id="closebutton" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>

          </form>
        </div>      
      </div>
    </div>
  </div>