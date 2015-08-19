<div class="modal fade" id="modal-beneficios-compra" tabindex="-1" role="dialog" aria-labelledby="modal-beneficios-compra-label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="modal-beneficios-compra-label">Beneficios de producto : <?php echo $objItem->codigoProducto ?><br/><?php echo $objItem->descripcion . " - " . $objItem->presentacion ?></h4>
            </div>
            <div class="modal-body body-scroll">
                <table class="table table-bordered table-hover table-striped">
                    <tbody>
                        <tr>
                            <th class="center vertical-center">Tipo</th>
                            <th class="center vertical-center">Fecha Inicio</th>
                            <th class="center vertical-center">Fecha Fin</th>
                            <th class="center vertical-center">Descuento Unidad</th>
                            <th class="center vertical-center">Descuento Fracción</th>
                            <th class="center vertical-center">Precio Descuento Unidad</th>
                            <th class="center vertical-center">Precio Descuento Fracción</th>
                         <!--   <th class="center vertical-center">Nit Proveedor</th>
                            <th class="center vertical-center"># Promo Fiel</th>-->
                            <th class="center vertical-center">Cliente</th>
                        </tr>
                        <?php foreach ($objItem->listBeneficios as $objBeneficio): ?>
                            <tr>
                                <td class="center vertical-center"><?php echo $objBeneficio->objBeneficioTipo->descripcion ?></td>
                                <td class="center vertical-center"><?php echo $objBeneficio->fechaIni ?></td>
                                <td class="center vertical-center"><?php echo $objBeneficio->fechaFin ?></td>
                                <td class="center vertical-center"><?php echo $objBeneficio->dsctoUnid ?>%</td>
                                <td class="center vertical-center"><?php echo $objBeneficio->dsctoFrac ?>%</td>
                                <td class="center vertical-center"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Precio::redondear($objItem->precioBaseUnidad*$objBeneficio->dsctoUnid/100, 1), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                                <td class="center vertical-center"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Precio::redondear($objItem->precioBaseFraccion*$objBeneficio->dsctoFrac/100, 1), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                             <!--   <td class="center vertical-center"><?php echo $objBeneficio->nitProv ?></td>
                                <td class="center vertical-center"><?php echo $objBeneficio->promoFiel ?></td> -->
                                <td class="center vertical-center"><?php echo Yii::app()->params->beneficios['swobligaCli'][$objBeneficio->swobligaCli] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>