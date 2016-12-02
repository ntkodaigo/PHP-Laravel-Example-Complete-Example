  <!-- Modal -->
  <div class="modal fade" id="vehiculo-modal" role="dialog"  >
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Vehiculo</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" action="" method="POST" id="frmVehiculo">

            <div class="form-group">
              <label for="numeroplacavehivulo" class="col-sm-3 control-label">Numero de placa</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="numeroplacavehivulo" name="numeroplacavehivulo">
              </div>
            </div>

            <div class="form-group">
              <label for="idmarca" class="col-sm-3 control-label">Marca</label>
              <div class="col-sm-9">
                <select id="idmarca" name="idmarca" class="form-control dropdown-toggle">
                    @foreach ($marcas as $marca)
                      <option value="{{ $marca -> idmarca }}">
                        {{ ucfirst($marca-> nombremarca) }}
                      </option>
                    @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="idmarca" class="col-sm-3 control-label">Modelos</label>
              <div class="col-sm-9">
                <select id="idmodelo" name="idmodelo" class="form-control dropdown-toggle">
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="añovehiculo" class="col-sm-3 control-label">Año</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="añovehiculo" name="añovehiculo">
              </div>
            </div>

            <div class="form-group">
              <label for="descripcion" class="col-sm-3 control-label">Descripcion</label>
              <div class="col-sm-9">
                <textarea class="form-control" rows="4" id="descripcion" name="descripcion"></textarea>
              </div>
            </div>
        </div> 

        <div class="modal-footer">
          <input type="submit" id="regvehiculo" class="btn btn-primary" value="Guardar">
          
          <button id="closebutton" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>

          </form>
             
      </div>
    </div>
  </div>