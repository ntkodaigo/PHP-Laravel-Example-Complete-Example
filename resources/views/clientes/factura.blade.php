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
                <button type="button" data-toggle="modal" data-target="#select-servicio-modal"  onclick="btnShowServicosTable()" class="form-control btn btn-default" id="btnselectproducto" name="btnselectproducto">Seleccionar Servicio</button>
              </div>
            </div>

             <div class="form-group">
              <label for="nombreproducto" class="col-sm-3 control-label">Producto o Servicio</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="nombreproducto" value="" placeholder="Seleccione un Producto o Servicio" readonly>
              </div>
          </div>

            <div class="form-group">
              <label for="fechaemision" class="col-sm-3 control-label">Fecha de Emisión</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" id="fechaemision" name="fechaemision">
              </div>
            </div>

            <div class="form-group">
              <label for="ordencompra" class="col-sm-3 control-label">Orden de Compra</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" id="ordencompra" name="ordencompra">
              </div>
            </div>

            <div class="form-group">
              <label for="documentoreferencial" class="col-sm-3 control-label">Documento Referencial</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="documentoreferencial" name="documentoreferencial">
              </div>
            </div>

            
            <div class="form-group">
              <label for="guiaremision" class="col-sm-3 control-label">Guia de Remisión</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="guiaremision" name="guiaremision">
              </div>
            </div>            


            <div class="form-group">
              <label for="condicionventa" class="col-sm-3 control-label">Condición de Venta</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="condicionventa" name="condicionventa">
              </div>
            </div>

            <div class="form-group">
              <label for="cantidad" class="col-sm-3 control-label">Cantidad</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="cantidad" name="cantidad">
              </div>
            </div>

            <div class="form-group">
              <label for="preciounitario" class="col-sm-3 control-label">Precio Unitario</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="preciounitario" name="preciounitario">
              </div>
            </div>

            <div class="form-group">
              <label for="descuento" class="col-sm-3 control-label">Descuento</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="descuento" name="descuento">
              </div>
            </div>  


            <div class="form-group">
              <label for="igv" class="col-sm-3 control-label">IGV</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="igv" name="igv">
              </div>
            </div>

           <div class="form-group">
              <label for="estado" class="col-sm-3 control-label">Estado</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="estado" name="estado">
              </div>
            </div>            


          <div class="modal-footer">
            <input type="submit" id="regfactura" class="btn btn-primary" value="Guardar">
            
            <button id="closebutton" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
          
          </div>
        </form>
             
      </div>
    </div>
  </div>