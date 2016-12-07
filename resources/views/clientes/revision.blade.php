  <!-- Modal -->
  <div class="modal fade" id="revision-modal" role="dialog"  >
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Revisión</h4>
        </div>
        <form class="form-horizontal" role="form" action="" method="POST" id="frmRevision">

          <input type="hidden" name="idrevision" value="">
          <input type="hidden" name="idservicio" value="">
          <input type="hidden" name="idtecnico" value="">

          <div class="modal-body">
            <div class="form-group">
              <dir class="col-sm-1"></dir>
              <button class="col-sm-5" data-toggle="modal" data-target="#select-tecnico-modal" type="button" onclick="btnShowTecnicosTable()"><i class="glyphicon glyphicon-book"></i>Seleccionar un Técnico</button>
              <button class="col-sm-5" data-toggle="modal" data-target="#select-servicio-modal" type="button" onclick="btnShowServicosTable()"><i class="glyphicon glyphicon-book"></i>Seleccionar un Servicio</button>
              <br><br>
            </div>

            <div class="form-group">
              <label for="nombretecnico" class="col-sm-3 control-label">Técnico</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="nombretecnico" value="" placeholder="Seleccione un Técnico" readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="nombreservicio" class="col-sm-3 control-label">Servicio</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="nombreservicio" value="" placeholder="Seleccione un Servicio" readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="kilometrajerevision" class="col-sm-3 control-label">Kilometraje</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="kilometrajerevision" name="kilometrajerevision" value="" placeholder="Escriba el kilometraje">
              </div>
            </div>

            <div class="form-group">
              <label for="estadorevision" class="col-sm-3 control-label">Estado</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="estadorevision" name="estadorevision" value="" placeholder="Escriba el estado">
              </div>
            </div>

            <div class="form-group">
              <label for="tiemporeparacion" class="col-sm-3 control-label">Tiempo de reparación</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="tiemporeparacion" name="tiemporeparacion" value="" placeholder="Escriba el tiempo de reparación">
              </div>
            </div>

            <div class="form-group">
              <label for="fecharevision" class="col-sm-3 control-label">Fecha de reparación</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" id="fecharevision" name="fecharevision" value="" placeholder="Elija una fecha para la reparación">
              </div>
            </div>

            <div class="form-group">
              <label for="fecharevisionposterior" class="col-sm-3 control-label">Fecha de reparación Posterior</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" id="fecharevisionposterior" name="fecharevisionposterior" value="" placeholder="Elija una fecha posterior para la reparación">
              </div>
            </div>

            <div class="form-group">
              <label for="periodorevision" class="col-sm-3 control-label">Periodo</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="periodorevision" name="periodorevision" value="" placeholder="Escriba el periodo">
              </div>
            </div>

          </div>

          <div class="modal-footer">
            <input type="submit" id="regrevision" class="btn btn-primary" value="Guardar">
            
            <button id="closebutton" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>

        </form>
             
      </div>
    </div>
  </div>