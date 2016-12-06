@extends('layout')
    
@section('content')


 <center><h3>FACTURA</h3></center>




    <form id="frm_factura" method="POST" action="@if ($key == 'c') /facturas @else /facturas/{{ $factura->idfactura }} @endif" class="col-md-6">
    @if ($key == 'u')
    {{method_field ('PATCH')}}
    @endif



        <div class="form-body">
            <table class="table table-hover" id="table-cliente">
                      <thead class="thead-inverse">
                          <tr>
                              <th>Nombre Cliente</th>
                          </tr>
                      </thead>
                  </table>
        </div>


        <div class="panel-body">
            <table class="table table-hover" id="table-articulo">
                      <thead class="thead-inverse">
                          <tr>
                              <th>Nombre Articulo</th>
                          </tr>
                      </thead>
                  </table>
        </div>


        
        <div class="form-group">Fecha de Emisión
            <input type="date" name="fechaemision" class="form-control"
            @if ($key=='u')
            value="{{ $factura->fechaemision }}"
            @endif>
        </div>

        <div class="form-group">Orden De Compra
            <input type="text" name="ordencompra" class="form-control"
            @if ($key=='u')
            value="{{ $factura->ordencompra }}"
            @endif>
        </div>

        <div class="form-group">Documento Referencial
            <input type="text" name="documentoreferencial" class="form-control"
            @if ($key=='u')
            value="{{ $factura->documentoreferencial }}"
            @endif>
        </div>

        <div class="form-group">Guia Remisión
            <input type="text" name="guiaremision" class="form-control"
            @if ($key=='u')
            value="{{ $factura->guiaremision }}"
            @endif>
        </div>

        <div class="form-group">Cantidad
            <input type="text" name="cantidad" class="form-control"
            @if ($key=='u')
            value="{{ $factura->cantidad }}"
            @endif>
        </div>

        <div class="form-group">Precio Unitario
            <input type="text" name="preciounitario" class="form-control"
            @if ($key=='u')
            value="{{ $factura->preciounitario }}"
            @endif>
        </div>

        <div class="form-group">Descuento
            <input type="text" name="descuento" class="form-control"
            @if ($key=='u')
            value="{{ $factura->descuento }}"
            @endif>
        </div>

        <div class="form-group">IGV
            <input type="text" name="igv" class="form-control"
            @if ($key=='u')
            value="{{ $factura->igv }}"
            @endif>
        </div>

        <div class="form-group">Estado
            <input type="text" name="estado" class="form-control"
            @if ($key=='u')
            value="{{ $factura->estado }}"
            @endif>
        </div>




@stop