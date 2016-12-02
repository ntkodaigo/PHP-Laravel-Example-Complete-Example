  <!-- Modal -->
  <div class="modal fade" id="direccion-modal" role="dialog"  >
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Direccion</h4>
        </div>
        <div class="modal-body">
          <form action="" method="POST" id="frmDireccion">
            <input type="hidden" name="iddireccionpersona" value="">
            <!--div class="row">
              <div class="col-sm-4"-->
                <div class="form-group">
                  <select id="idpais" name="idpais" class="form-control dropdown-toggle">
                    @foreach ($paises as $pais)
                      <option value="{{ $pais -> idpais }}">
                        {{ ucfirst($pais -> nombrepais) }}
                      </option>
                    @endforeach
                  </select>
                  <select id="iddepartamento" name="iddepartamento" class="form-control dropdown-toggle">
                  </select>
                  <select id="idprovincia" name="idprovincia" class="form-control dropdown-toggle">
                  </select>
                  <select id="iddistrito" name="iddistrito" class="form-control dropdown-toggle">
                  </select>
                </div>
              <!--/div-->
            	<!--div class="col-sm-4"-->
              	<div class="form-group">
              		<input type="text" name="nombredireccionpersona" id="nombredireccionpersona" placeholder="Direccion" value="">
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
  </div>