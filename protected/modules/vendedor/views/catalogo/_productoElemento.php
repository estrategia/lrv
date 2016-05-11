<!-- descuento -->
<?php if ($objPrecio->tieneBeneficio()): ?>
    <div class="cdiv_prod_desc">
        <div class="c_prod_desc">
            <p><?php echo $objPrecio->getPorcentajeDescuento() ?> % <span>dcto</span></p>
        </div>
    </div>
<?php endif; ?>

<?php if ($objProducto->fraccionado == 1): ?>
    <div class="cdiv_prod_frc">
        <div class="c_prod_frc">
            <p class="">Producto fraccionado</p>
        </div>
    </div>
<?php endif; ?>
<div class="clst_cont_top <?php echo ($objProducto->fraccionado == 1 ? ' top_frc' : '') ?> ">
    <div class="clst_pro_img">
        <a href="<?php echo ($objPrecio->inicializado() ? CController::createUrl('/catalogo/producto', array('producto' => $objProducto->codigoProducto, 'descripcion' => $objProducto->getCadenaUrl())) : "#") ?>" data-ajax="false">
            <img src="<?php echo Yii::app()->request->baseUrl . $objProducto->rutaImagen() ?>" class="ui-li-thumb">
        </a>
    </div>

    <?php if ($objProducto->codigoEspecial != 0): ?>
        <a href="#popup-especial-<?php echo $objProducto->codigoEspecial ?>" data-rel="popup" class="c_lst_pop_spcl">
            <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial'] . $objProducto->objCodigoEspecial->rutaIcono; ?>" >
        </a>
    <?php endif; ?>

    <!-- producto agregado -->
    <a href="" class="clst_slct_prod<?php echo (Yii::app()->shoppingCartSalesman->contains($objProducto->codigoProducto) ? " active" : "") ?>" id="icono-producto-agregado-<?php echo $objProducto->codigoProducto ?>">
        <img src="<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_seleccionado.png">
    </a>
    <!-- producto agregado -->

    <div class="clst_cont_pr_prod">
        <h2><a href="<?php echo ($objPrecio->inicializado() ? CController::createUrl('catalogo/producto', array('producto' => $objProducto->codigoProducto, 'descripcion' => $objProducto->getCadenaUrl())) : "#") ?>" data-ajax="false"><?php echo $objProducto->descripcionProducto ?></a></h2>
        <p><?php echo $objProducto->presentacionProducto ?></p>
        <?php if (!in_array($objProducto->idUnidadNegocioBI, Yii::app()->params->calificacion['categoriasNoCalificacion'])): ?>
            <div id="raty-lectura-producto-<?php echo $objProducto->codigoProducto ?>" data-role="raty" data-readonly="true" data-score="<?php echo $objProducto->getCalificacion() ?>" class="clst_cal_str"></div>
        <?php endif; ?>
        <?php if ($objPrecio->inicializado()): ?>
            <?php if ($objProducto->mostrarAhorroVirtual == 1 && $objPrecio->getAhorro(Precio::PRECIO_UNIDAD) > 0): ?>
                <div class="clst_pre_ant"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']); ?></div>
                <div class="clst_pre_act"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?>  <span class="whitespace-normal">[Ahorro <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?>]</span></div>
            <?php else: ?>
                <div class="clst_pre_act" style="padding-bottom:1em;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
            <?php endif; ?>

            <?php if ($objPrecio->getFlete() > 0): ?>
                <div class="whitespace-normal">[Flete <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getFlete(), Yii::app()->params->formatoMoneda['moneda']); ?>]</div>
            <?php endif; ?>
            <?php if ($objPrecio->getTiempoEntrega() > 0): ?>
                <div class="whitespace-normal">[Tiempo de entrega <?php echo $objPrecio->getTiempoEntrega() ?> horas]</div>
            <?php endif; ?>
        <?php endif; ?>
        <?php foreach ($objPrecio->getPuntosDescripcion() as $descripcionPunto): ?>
            <span class="label label-primary"><?= $descripcionPunto ?></span>
        <?php endforeach; ?>
    </div>
    <div class="clear"></div>
</div>

<?php if ($vista == "listaCatalogo"): ?>
    <?php if ($this->objSectorCiudad == null): ?>
        <table class="ui-responsive ctable_list_prod">
            <tbody>
                <tr>
                    <td class="ctd_03">
                        <?php echo CHtml::link('Consultar precio', '#popup-consultarprecio', array('data-rel' => "popup", 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r')); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php elseif ($objPrecio->inicializado()): ?>
        <table class="ui-responsive ctable_list_prod">
            <tbody>
                <tr>
                    <?php if ($objProducto->ventaVirtual != 0): ?>
                        <td class="ctd_01">
                            <input type="number" placeholder="0" id="cantidad-producto-unidad-<?php echo $objProducto->codigoProducto ?>" class="cbtn_cant" onchange="subtotalUnidadProducto(<?php echo $objProducto->codigoProducto ?>);" data-mini="true" value="1">
                        </td>
                        <td class="ctd_02">
                            <p>Subtotal</p>
                            <p id="subtotal-producto-unidad-<?php echo $objProducto->codigoProducto ?>" style="font-size:medium;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></p>
                        </td>
                    <?php endif; ?>
                    <td class="ctd_03">
                        <?php if ($objProducto->ventaVirtual == 0): ?>
                            <?php echo CHtml::link('Ver producto', "#popup-carro-controlada-$objProducto->codigoProducto", array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-r', 'data-rel' => 'popup', 'data-mini' => 'true')); ?>
                        <?php else: ?>
                            <?php echo CHtml::link('Añadir al carro', '#', array('data-producto' => $objProducto->codigoProducto, 'data-cargar' => 1, 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-r btn-y', 'data-mini' => 'true')); ?>
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php else: ?>
        <table class="ui-responsive ctable_list_prod">
            <tbody>
                <tr>
                    <td class="ctd_03">
                        <?php echo CHtml::link('Producto agotado', '#', array('data-rel' => "popup", 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r')); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php endif; ?>
<?php endif; ?>
