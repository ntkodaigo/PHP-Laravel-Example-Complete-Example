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
              <div class="col-sm-4" id="cliente-rol-node">
                <a id="cliente-rol" target="_blank" href=""><div class="form-control btn btn-default">Cliente</div></a>
              </div>
              <div class="col-sm-4" id="proveedor-rol-node">
                <a id="proveedor-rol" target="_blank" href=""><div class="form-control btn btn-default">Proveedor</div></a>
              </div>
              <div class="col-sm-4" id="tecnico-rol-node">
                <a id="tecnico-rol" target="_blank" href=""><div class="form-control btn btn-default">Tecnico</div></a>
              </div>
            </div>

            <!--div class="form-group" id="none-node">
              <label for="numeroplacavehivulo" class="col-sm-12 control-label" style="text-align: center;">Ninguno</label>
            </div-->

            <div id="register-to-node">
              <h4 id="register-to-label" class="modal-title">Registrar esta persona como:</h4>
              <br>
              <div class="form-group">
                <div class="col-sm-4" id="cliente-new-rol-node">
                  <form id="cliente-new-rol" action="" method="POST">
                    {{csrf_field()}}
                    <button type="submit" class="form-control btn btn-default">Cliente</button>
                  </form>
                </div>
                <div class="col-sm-4" id="proveedor-new-rol-node">
                  <form id="proveedor-new-rol" action="" method="POST">
                    {{csrf_field()}}
                    <button type="submit" class="form-control btn btn-default">Proveedor</button>
                  </form>
                </div>
                <div class="col-sm-4" id="tecnico-new-rol-node">
                  <form id="tecnico-new-rol" action="" method="POST">
                    {{csrf_field()}}
                    <button class="form-control btn btn-default">Técnico</button>
                  </form>
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