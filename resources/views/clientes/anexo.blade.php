  <!-- Modal -->
  <div class="modal fade" id="anexo-modal" role="dialog"  >
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Anexo</h4>
        </div>
        <div class="modal-body">
          <form action="" method="POST" id="frmAnexo">

            <div class="row">
            	<div class="col-sm-4">
              	<div class="form-group">
              		<input type="text" name="numeroanexotelefono" id="numeroanexotelefono" placeholder="Numero de anexo teléfono" value="">
              	</div>
            	</div>
            </div>

            {{ csrf_field() }}

            <div class="modal-footer">
              <input type="submit" id="reganexo" class="btn btn-primary" value="Guardar">
              
              <button id="closebutton" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>

          </form>
        </div>      
      </div>
    </div>
  </div>