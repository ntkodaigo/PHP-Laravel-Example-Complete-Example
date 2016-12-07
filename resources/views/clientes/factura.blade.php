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

          <input type="hidden" name="idarticulo" value="">

         

          <div class="modal-body">

            <div class="form-group">
              <div class="col-sm-6">
                <button type="button" data-toggle="modal" data-target="#select-productos-modal" onclick="btnShowProductos()" class="form-control btn btn-default" id="btnselectproducto" name="btnselectproducto">Seleccionar Producto</button>
              </div>
              <div class="col-sm-6">
                <button type="button" data-toggle="modal" data-target="#select-servicio-modal"  onclick="" class="form-control btn btn-default" id="btnselectproducto" name="btnselectproducto">Seleccionar Servicio</button>
              </div>
            </div>

             <div class="form-group">
              <label for="nombreproducto" class="col-sm-3 control-label">Producto</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="nombreproducto" value="" placeholder="Seleccione un Producto" readonly>
              </div>
          </div>




            <div class="form-group">
              <label for="fechaemision" class="col-sm-3 control-label">Fecha de Emisión</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" id="fechaemision" name="fechaemision">
              </div>
            </div>


            <div class="form-group">
              <label for="fechaemision" class="col-sm-3 control-label">Fecha de Emisión</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" id="fechaemision" name="fechaemision">
              </div>
            </div>

            <div class="form-group">
              <label for="idmodelo" class="col-sm-3 control-label">Modelo</label>
              <div class="col-sm-9">
                <select id="idmodelo" name="idmodelo" class="form-control dropdown-toggle">
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="aniovehiculo" class="col-sm-3 control-label">Año</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="aniovehiculo" name="aniovehiculo">
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