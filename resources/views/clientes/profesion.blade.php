  <!-- Modal -->
  <div class="modal fade" id="profesion-modal" role="dialog"  >
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Profesion</h4>
        </div>
        <div class="modal-body">
          <form action="" method="POST" id="frmProfesion">

            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <select id="idtipoprofesion" name="idtipoprofesion" class="form-control dropdown-toggle">
                    @foreach ($tipoProfesiones as $profesion)
                      <option value="{{ $profesion -> idtipoprofesion }}">
                        {{ ucfirst($profesion-> nombretipoprofesion) }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <input type="submit" id="regprofesion" class="btn btn-primary" value="Guardar">
              
              <button id="closebutton" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>

          </form>
        </div>      
      </div>
    </div>
  </div>