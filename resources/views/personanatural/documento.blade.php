  <!-- Modal -->
  <div class="modal fade" id="documento-modal" role="dialog"  >
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Documento</h4>
        </div>
        <div class="modal-body">
          <form action="" method="POST" id="frmDocumento">

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <select id="idtipodocumento" name="idtipodocumento" class="form-control dropdown-toggle">
                    @foreach ($tipodocumentos as $documento)
                      <option value="{{ $documento -> idtipodocumento }}">
                        {{ ucfirst($documento-> nombretipodocumento) }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
            	<div class="col-sm-4">
              	<div class="form-group">
              		<input type="text" name="numerodocumento" id="numerodocumento" placeholder="Numero del documento" value="">
              	</div>
            	</div>
            </div>

            <div class="modal-footer">
              <input type="submit" id="regdocumento" class="btn btn-primary" value="Guardar">
              
              <button id="closebutton" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>

          </form>
        </div>      
      </div>
    </div>
  </div>