<!-- descuento -->
<!-- <div class="cdiv_prod_desc">
    <div class="c_prod_desc">
        <p>10% <span>dcto</span></p>
    </div>
</div> -->

<?php if ($objProducto->fraccionado == 1): ?>
    <div class="cdiv_prod_frc">
        <div class="c_prod_frc">
            <p class="">Producto fraccionado</p>
        </div>
    </div>
<?php endif; ?>

<div class="clst_cont_top">
    <?php $imagen = $objProducto->objImagen(YII::app()->params->producto['tipoImagen']['mini']); ?>

    <?php if ($imagen == null): ?>
        <div class="clst_pro_img">
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $objProducto->codigoProducto)) ?>" data-ajax="false">
                <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->producto['noImagen']['mini']; ?>" class="ui-li-thumb">
            </a>
        </div>
    <?php else: ?>
        <div class="clst_pro_img">
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $objProducto->codigoProducto)) ?>" data-ajax="false">
                <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['mini']] . $imagen->rutaImagen; ?>" class="ui-li-thumb">
            </a>
        </div>
    <?php endif; ?>
    <?php if ($objProducto->codigoEspecial != 0): ?>
        <a href="#popup-especial-<?php echo $objProducto->codigoEspecial ?>" data-rel="popup" class="c_lst_pop_spcl">
            <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial'] . $objProducto->objCodigoEspecial->rutaIcono; ?>" >
        </a>
    <?php endif; ?>

    <!-- producto seleccionado -->
    <?php if (Yii::app()->shoppingCart->contains($objProducto->codigoProducto)): ?>
        <a href="" class="clst_slct_prod">
            <img src="<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_seleccionado.png">
        </a>
    <?php endif; ?>
    <!-- producto seleccionado -->

    <div class="clst_cont_pr_prod">
        <h2><a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $objProducto->codigoProducto)) ?>" data-ajax="false"><?php echo $objProducto->descripcionProducto ?></a></h2>
        <p><?php echo $objProducto->presentacionProducto ?></p>
        <div id="raty-lectura-producto-<?php echo $objProducto->codigoProducto ?>" data-role="raty" data-readonly="true" data-score="<?php echo $objProducto->getCalificacion() ?>" class="clst_cal_str"></div>
        <?php if ($objSectorCiudad != null): ?>
            <?php $objPrecio = $objProducto->getPrecio($objSectorCiudad->codigoCiudad, $objSectorCiudad->codigoSector, $codigoPerfil); ?>
            <?php if ($objProducto->mostrarAhorroVirtual == 1 && $objPrecio->getAhorro(Precio::PRECIO_UNIDAD) > 0): ?>
                <div class="clst_pre_ant"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']); ?></div>
                <div class="clst_pre_act"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?>  <span>[Ahorro <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?>]</span></div>
            <?php else: ?>
                <div class="clst_pre_act" style="padding-bottom:1em;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<?php if ($objSectorCiudad != null): ?>
    <?php $objPrecio = $objProducto->getPrecio($objSectorCiudad->codigoCiudad, $objSectorCiudad->codigoSector, $codigoPerfil); ?>
    <table class="ui-responsive ctable_list_prod">
        <tbody>
            <tr>
                <td class="ctd_01">
                    <input type="number" placeholder="0" id="cantidad-producto-unidad-<?php echo $objProducto->codigoProducto ?>" class="cbtn_cant" onchange="subtotalUnidadProducto(<?php echo $objProducto->codigoProducto ?>);" data-mini="true" value="1">
                </td>
                <td class="ctd_02">
                    <p>Subtotal</p>
                    <p id="subtotal-producto-unidad-<?php echo $objProducto->codigoProducto ?>" style="font-size:medium;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></p>
                </td>
                <td class="ctd_03">
                    <?php if ($objProducto->ventaVirtual == 0): ?>
                        <?php echo CHtml::link('Añadir al carro', "#popup-carro-controlada-$objProducto->codigoProducto", array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-r', 'data-rel' => 'popup', 'data-mini' => 'true')); ?>
                    <?php else: ?>
                        <?php echo CHtml::link('Añadir al carro', '#', array('data-producto' => $objProducto->codigoProducto, 'data-cargar' => 1, 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-r', 'data-mini' => 'true')); ?>
                    <?php endif; ?>
                </td>
            </tr>
        </tbody>
    </table>
<?php endif; ?>