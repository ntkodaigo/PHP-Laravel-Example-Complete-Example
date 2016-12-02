  <!-- Modal -->
  <div class="modal fade" id="clientevehiculo-modal" role="dialog"  >
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Todos los vehiculos registrados</h3>
        </div>
        <div class="modal-body">
          <form action="" method="POST" id="frmClientevehiculo">
            <input type="hidden" name="idpersonatelefono" value="">
            <!--div class="row"-->
              <div class="col-sm-12" id="vehiculos-table-node">
                <div class="modal-header">
                  <h4 class="modal-title">Seleccione un vehiculo de la tabla</h4>
                </div>
                <table class="table table-hover" id="vehiculos-table">
                    <thead class="thead-inverse">
                        <tr>
                          <th>Placa</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th>Año</th>
                          <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
                <h4 class="modal-title">¿No existe?</h4>
                <button data-toggle="modal" data-target="#vehiculo-modal" type="button" onclick="btnNewVehiculo()"><i class="glyphicon glyphicon-book"></i>Nuevo registro de vehiculo</button>
                <br><br>
              </div>
            <!--/div-->

            <div class="modal-footer">
              <!--input type="submit" id="regtelefono" class="btn btn-primary" value="Guardar"-->
              <button id="closebutton" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>

          </form>
        </div>      
      </div>
    </div>
  </div>