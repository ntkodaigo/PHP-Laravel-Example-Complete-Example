  <!-- Modal -->
  <div class="modal fade" id="clivehrevision-modal" role="dialog"  >
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Revisiones del Vehiculo </h3>
          <h4 class="modal-title" id="numeroplaca">Placa: NNNAAA14</h4>
        </div>
        <div class="form-horizontal">
        
          <div class="modal-body">
            <div class="form-group">
              <dir class="col-sm-4"></dir>
              <button class="col-sm-3" data-toggle="modal" data-target="#revision-modal" type="button" onclick="btnNewRevision()"><i class="glyphicon glyphicon-book"></i>Nueva Revisión</button>
              <br><br>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <table class="table table-hover col-sm-12" id="clivehrevisiones-table">
                  <thead class="thead-inverse">
                      <tr>
                          <th>Servicio</th>
                          <th>Técnico</th>
                          <th>Fecha</th>
                          <th>Estado</th>
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