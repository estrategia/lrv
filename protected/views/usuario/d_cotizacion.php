<div class="row">
    <div class="col-md-12">
        <?php echo CHtml::link('Agregar al carro', "#", array("data-role" => "cotizaciondetalle", "data-cotizacion" => $objCotizacion->idCotizacion, 'class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Exportar cotizaci&oacute;n', $this->createUrl("/usuario/cotizacionpdf", array('cotizacion' => $objCotizacion->idCotizacion)), array('class' => 'btn btn-default')); ?>
    </div>
</div>
<div class="space-1"></div>
<div class="row">
    <div class="col-md-12">
        <table  class="table table-bordered table-hover">
            <thead>
            <th colspan="2">Datos de Cotizaci&oacute;n</th>
            </thead>
            <tr>
                <td>N&uacute;mero cotizaci&oacute;n</td>
                <td><?php echo $objCotizacion->idCotizacion ?></td>
            </tr>
            <tr>
                <td>Fecha cotizaci&oacute;n</td>
                <td><?php echo $objCotizacion->fechaCotizacion ?></td>
            </tr>
            <tr>
                <td>Ubicaci&oacute;n</td>
                <td><?php echo $objCotizacion->objCiudad->nombreCiudad . " - " . $objCotizacion->objSector->nombreSector ?></td>
            </tr>
        </table> 
    </div>
</div>

<?php
$this->renderPartial("_d_listarProductos", array(
    "tituloTabla" => "Productos de la cotizaci&oacute;n",
    "items" => $objCotizacion->listCotizacionItems,
    "mostrarPago" => true,
    "objeto" => $objCotizacion
));
?>