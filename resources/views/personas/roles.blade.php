  <!-- Modal -->
  <div class="modal fade" id="roles-modal" role="dialog"  >
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Esta persona esta registrado como:</h4>
        </div>
        <form class="form-horizontal" role="form" id="frmRoles">

          <div class="modal-body">
            <div class="form-group">
              <div class="col-sm-4">
                <button id="cliente-rol" type="button" class="form-control btn btn-default">Cliente</button>
              </div>
              <div class="col-sm-4">
                <button id="proveedor-rol" type="button" class="form-control btn btn-default">Proveedor</button>
              </div>
              <div class="col-sm-4">
                <button id="tecnico-rol" type="button" class="form-control btn btn-default">Tecnico</button>
              </div>
            </div>

            <div class="form-group">
              <label for="numeroplacavehivulo" class="col-sm-12 control-label" style="text-align: center;">Ninguno</label>
            </div>

            <div id="register-to-node">
              <h4 class="modal-title">Registrar esta persona como:</h4>
              <br>
              <div class="form-group">
                <div class="col-sm-4">
                  <button id="cliente-rol" type="button" class="form-control btn btn-default">Cliente</button>
                </div>
                <div class="col-sm-4">
                  <button id="proveedor-rol" type="button" class="form-control btn btn-default">Proveedor</button>
                </div>
                <div class="col-sm-4">
                  <button id="tecnico-rol" type="button" class="form-control btn btn-default">Tecnico</button>
                </div>
              </div>
            </div>

          </div>

          <div class="modal-footer">          
            <button id="closebutton" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>

        </form>
             
      </div>
    </div>
  </div>