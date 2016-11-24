<?php
//CVarDumper::dump($objUsuario,10, true);
?>

<?php //$idUnico = uniqid() ?>

    <div class="row">
        <div class="col-md-3">
            <input id="busqueda-buscar-vitalcall" type="text" placeholder="Descripción" class="form-control input-sm"  maxlength="50" > 
        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-danger btn-sm" data-role="busquedaproducto-vitalcall"><i class="glyphicon glyphicon-search"></i>Buscar</button>
        </div>
    </div>

<div class="space-2"></div>

<div class="panel-group" id="accordion-formulas" role="tablist" aria-multiselectable="true">
    <?php foreach ($objUsuario->listFormulasVC as $objFormulaVC): ?>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-<?= $objFormulaVC->idFormula ?>">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion-formulas" href="#collapse-<?= $objFormulaVC->idFormula ?>" aria-expanded="false" aria-controls="collapse-<?= $objFormulaVC->idFormula ?>"> <?= $objFormulaVC->nombreMedico ?> - <?= $objFormulaVC->institucion ?> </a>
                </h4>
            </div>
            <div id="collapse-<?= $objFormulaVC->idFormula ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-<?= $objFormulaVC->idFormula ?>">
                <div class="panel-body">

                    <table class="table table-input table-bordered table-hover table-striped">
                        <tbody>
                            <tr>
                                <th>C&oacute;digo</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Antes</th>
                                <th>Ahorro</th>
                                <th>Ahora</th>
                                <th></th>
                            </tr>
                            <?php foreach ($objFormulaVC->listProductosVC as $objProductoVC): ?>
                                <?php //$idUnico = uniqid() ?>
                                <?php $objPrecio = new PrecioProducto($objProductoVC->objProducto, $objSectorCiudad, Yii::app()->params->perfil['vitalCall']); ?>

                                <?php if ($objProductoVC->objProducto->fraccionado == 1): ?>
                                    <tr style="vertical-align: middle">
                                        <td rowspan='2'><?= $objProductoVC->codigoProducto ?></td>
                                        <td rowspan='2'>
                                            <?php if ($objPrecio->tieneBeneficio()): ?>
                                                <!--descuento-->
                                                <div class=""><?php echo $objPrecio->getPorcentajeDescuento() ?>% dcto</div>
                                            <?php endif; ?>

                                            <img src="<?php echo Yii::app()->request->baseUrl . $objProductoVC->objProducto->rutaImagen(); ?>" class="img-responsive noimagenProduct product-prom">
                                            <div><?= $objProductoVC->objProducto->descripcionProducto ?></div>
                                            <div><?= $objProductoVC->objProducto->presentacionProducto ?></div>
                                        </td>

                                        <td style="min-width:180px">
                                            <div class="form-inline text-center">
                                                <?php if ($objProductoVC->esVigente() && $objPrecio->inicializado()): ?>
                                                    <div class="ressete btn-xs">
                                                        <input type="text" id="cantidad-producto-unidad-<?= $objFormulaVC->idFormula ?>-<?= $objProductoVC->idProductoVitalCall ?>" maxlength="3" value="0" />
                                                    </div>
                                                <?php else: ?>
                                                    Producto no vigente
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <span style="text-decoration: line-through;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']) ?></span>
                                            <?php if ($objProductoVC->objProducto->objImpuesto->porcentaje > 0): ?>
                                                <div style="font-size: 10px;color: #000">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objProductoVC->objProducto->objImpuesto->porcentaje) ?> IVA</div>
                                            <?php endif; ?>
                                        </td>


                                        <td class="text-right">
                                            <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']) ?>
                                        </td>

                                        <td class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                                        <td rowspan='2'>
                                            <?php if ($objProductoVC->esVigente() && $objPrecio->inicializado()): ?>
                                                <button type="button" class="btn btn-primary btn-block btn-xs" data-role="cargar-vitalcall" data-tipo="1" data-formula="<?= $objFormulaVC->idFormula ?>" data-producto="<?= $objProductoVC->idProductoVitalCall ?>">Añadir <img src="<?= Yii::app()->baseUrl ?>/images/desktop/button-carrito.png" alt=""></button>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-primary btn-block btn-xs disabled">Añadir <img src="<?= Yii::app()->baseUrl ?>/images/desktop/button-carrito.png" alt=""></button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="min-width:180px;"  class="text-center">
                                            U.M.V
                                            <?php if ($objProductoVC->objProducto->objMedidaFraccion !== null): ?>
                                                <br/>
                                                <?php echo $objProductoVC->objProducto->objMedidaFraccion->descripcionMedidaFraccion ?> X <?php echo $objProductoVC->objProducto->unidadFraccionamiento ?>
                                            <?php endif; ?>
                                            <div class="form-inline text-center">
                                                <?php if ($objProductoVC->esVigente() && $objPrecio->inicializado()): ?>
                                                    <div class="ressete btn-xs">
                                                        <input type="text" id="cantidad-producto-fraccion-<?= $objFormulaVC->idFormula ?>-<?= $objProductoVC->idProductoVitalCall ?>" maxlength="3" value="0" />
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                Producto no vigente
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-right">
                                            <span style="text-decoration: line-through;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_FRACCION, false), Yii::app()->params->formatoMoneda['moneda']) ?></span>
                                            <?php if ($objProductoVC->objProducto->objImpuesto->porcentaje > 0): ?>
                                                <div style="font-size: 10px;color: #000">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objProductoVC->objProducto->objImpuesto->porcentaje) ?> IVA</div>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-right">
                                            <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_FRACCION), Yii::app()->params->formatoMoneda['moneda']) ?>
                                        </td>
                                        <td class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_FRACCION), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                                    </tr>  
                                <?php else: ?>
                                    <tr style="vertical-align: middle">
                                        <td><?php echo $objProductoVC->codigoProducto ?><br></td>
                                        <td>
                                            <img src="<?php echo Yii::app()->request->baseUrl . $objProductoVC->objProducto->rutaImagen(); ?>" class="img-responsive noimagenProduct product-prom">
                                            <?= $objProductoVC->objProducto->descripcionProducto ?><br>
                                            <?= $objProductoVC->objProducto->presentacionProducto ?><br>
                                        </td>
                                        <td style="min-width:180px">
                                            <div class="form-inline text-center">
                                                <?php if ($objProductoVC->esVigente() && $objPrecio->inicializado()): ?>
                                                    <div class="ressete btn-xs">
                                                        <input type="text" id="cantidad-producto-unidad-<?= $objFormulaVC->idFormula ?>-<?= $objProductoVC->idProductoVitalCall ?>" maxlength="3" value="0" />
                                                    </div>
                                                <?php else: ?>
                                                    Producto no vigente
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <span style="text-decoration: line-through;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']) ?></span>
                                            <?php if ($objProductoVC->objProducto->objImpuesto->porcentaje > 0): ?>
                                                <div style="font-size: 10px;color: #000">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objProductoVC->objProducto->objImpuesto->porcentaje) ?> IVA</div>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-right">
                                            <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']) ?>
                                        </td>
                                        <td class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                                        <td>
                                            <?php if ($objProductoVC->esVigente() && $objPrecio->inicializado()): ?>
                                                <button type="button" class="btn btn-primary btn-block btn-xs" data-role="cargar-vitalcall" data-tipo="1" data-formula="<?= $objFormulaVC->idFormula ?>" data-producto="<?= $objProductoVC->idProductoVitalCall ?>">Añadir <img src="<?= Yii::app()->baseUrl ?>/images/desktop/button-carrito.png" alt=""></button>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-primary btn-block btn-xs disabled">Añadir <img src="<?= Yii::app()->baseUrl ?>/images/desktop/button-carrito.png" alt=""></button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>