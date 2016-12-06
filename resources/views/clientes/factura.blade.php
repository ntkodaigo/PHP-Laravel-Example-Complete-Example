<!-- Modal -->
  <div class="modal fade" id="factura-modal" role="dialog"  >
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Factura</h4>
        </div>
        <form class="form-horizontal" role="form" action="" method="POST" id="frmFactura">

          <input type="hidden" name="idfactura" value="">

          <div class="modal-body">


           <div tclass="col-sm-4" id="tecnico-new-rol-node">            
              <button type="button" class="form-control btn btn-default">Seleccionar Producto</button>
          </div>

           <div class="col-sm-4" id="tecnico-new-rol-node">            
              <button type="button" class="form-control btn btn-default">Seleccionar Servicio</button>
          </div>


            <div class="form-group">
              <label for="fechaemision" class="col-sm-3 control-label">Fecha de Emisión</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" id="fechaemision" name="fechaemision">
              </div>
            </div>

          <div class="modal-footer">
            <input type="submit" id="ragfactura" class="btn btn-primary" value="Guardar">
            
            <button id="closebutton" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>

        </form>
             
      </div>
    </div>
  </div>