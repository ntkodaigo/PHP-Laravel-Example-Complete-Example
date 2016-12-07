  <!-- Modal -->
  <div class="modal fade" id="select-servicio-modal" role="dialog"  >
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Seleccione un Servicio de la tabla</h4>
        </div>
        <div class="form-horizontal">

          <div class="modal-body">
            <div class="form-group">
              <div class="col-sm-12">
                <table class="table table-hover col-sm-12" id="servicios-table">
                  <thead class="thead-inverse">
                      <tr>
                          <th>Nombre</th>
                          <th>Categoría</th>
                          <th>Sub-categoría</th>
                          <th>Acciones</th>
                      </tr>
                  </thead>
                </table>
              </div>
            </div>

          </div>

          <div class="modal-footer">           
            <button id="closebutton" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>

        </div>
             
      </div>
    </div>
  </div>