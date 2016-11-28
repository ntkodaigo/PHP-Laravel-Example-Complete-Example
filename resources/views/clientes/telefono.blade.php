  <!-- Modal -->
  <div class="modal fade" id="telefono-modal" role="dialog"  >
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Telefono</h3>
        </div>
        <div class="modal-body">
          <form action="" method="POST" id="frmTelefono">
            <input type="hidden" name="idpersonatelefono" value="">
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <select id="idtipotelefono" name="idtipotelefono" class="form-control dropdown-toggle">
                    @foreach ($tipotelefonos as $telefono)
                      <option value="{{ $telefono -> idtipotelefono }}">
                        {{ ucfirst($telefono-> nombretipotelefono) }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
            	<div class="col-sm-4">
              	<div class="form-group">
              		<input type="text" name="numeropersonatelefono" id="numeropersonatelefono" placeholder="Numero de teléfono" value="">
              	</div>
            	</div>
              <div class="col-sm-12" id="anexos-table-node">
                <div class="modal-header">
                  <h4 class="modal-title">Anexos</h4>
                </div>
                <button data-toggle="modal" data-target="#anexo-modal" type="button" onclick="btnNewAnexo()"><i class="glyphicon glyphicon-book"></i>Nuevo Anexo</button>
                <br><br>
                <table class="table table-hover" id="anexos-table">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Numero de Anexo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
              </div>
            </div>

            <div class="modal-footer">
              <input type="submit" id="regtelefono" class="btn btn-primary" value="Guardar">
              <button id="closebutton" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>

          </form>
        </div>      
      </div>
    </div>
  </div>