  <!-- Modal -->
  <div class="modal fade" id="direccion-modal" role="dialog"  >
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Direccion</h4>
        </div>
        <form class="form-horizontal" role="form" action="" method="POST" id="frmDireccion">
          <div class="modal-body">
            <input type="hidden" name="iddireccionpersona" value="">
            <!--div class="row">
              <div class="col-sm-4"-->
              <div class="form-group">
                <label for="idpais" class="col-sm-3 control-label">Pais: </label>
                <div class="col-sm-9">
                  <select id="idpais" name="idpais" class="form-control dropdown-toggle">
                  @foreach ($paises as $pais)
                    <option value="{{ $pais -> idpais }}">
                      {{ ucfirst($pais -> nombrepais) }}
                    </option>
                  @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="idiostrito" class="col-sm-3 control-label">Departamento: </label>
                <div class="col-sm-9">
                  <select id="iddepartamento" name="iddepartamento" class="form-control dropdown-toggle">
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="idprovincia" class="col-sm-3 control-label">Provincia: </label>
                <div class="col-sm-9">
                  <select id="idprovincia" name="idprovincia" class="form-control dropdown-toggle">
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="iddistrito" class="col-sm-3 control-label">Distrito: </label>
                <div class="col-sm-9">
                  <select id="iddistrito" name="iddistrito" class="form-control dropdown-toggle">
                  </select>
                </div>
              </div> 
              <!--/div-->
            	<!--div class="col-sm-4"-->
            	<div class="form-group">
                <label for="nombredireccionpersona" class="col-sm-3 control-label">Direccion: </label>
                <div class="col-sm-9">
          		    <input type="text" class="form-control" name="nombredireccionpersona" id="nombredireccionpersona" placeholder="Direccion" value="">
                </div>
              </div>
          	</div>
            	<!--/div-->
            <!--/div-->

            <div class="modal-footer">
              <input type="submit" id="regdireccion" class="btn btn-primary" value="Guardar">
              <button id="closebutton" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>

          </form>
        </div>      
      </div>
  </div>