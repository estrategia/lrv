<?php $this->pageTitle = Yii::app()->name . " - " . $objProducto->descripcionProducto; ?>

<div class="ui-content c_cont_detail_prod">
    <h1><?php echo $objProducto->descripcionProducto ?></h1>
    <h2><?php echo $objProducto->presentacionProducto ?></h2>
    <h2>Código: <?php echo $objProducto->codigoProducto ?></h2>
    <?php if ($objProducto->fraccionado == 1): ?>
       <!--  <div class="cdiv_prod_frc">
            <div class="c_prod_frc">
                <p class="">Producto fraccionado</p>
            </div>
        </div>  -->
    <?php endif; ?>
    <div id="owl-productodetalle-<?php echo $objProducto->codigoProducto ?>" class="owl-carousel owl-theme owl-productodetalle">
        <?php $listImagenes = $objProducto->listImagenesGrandes() ?>
        <?php if (empty($listImagenes)): ?>
            <div class="item"><img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->producto['noImagen']['grande']; ?>" alt="<?php echo $objProducto->descripcionProducto ?>" title="<?php echo $objProducto->descripcionProducto ?>"></div>
        <?php else: ?>
            <?php foreach ($listImagenes as $imagen): ?>
                <div class="item"><img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['grande']] . $imagen->rutaImagen; ?>" alt="<?php echo $imagen->nombreImagen ?>" title="<?php echo $imagen->tituloImagen ?>"></div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <?php if ($objProducto->ventaVirtual == 0): ?>
        <div data-role="collapsible" data-iconpos="right" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-theme="r">
            <h3>Puntos de venta disponibles</h3>
            <ul data-role="listview" data-inset="false" data-icon="false" class="cdtl_ptos_venta">
                <?php if (empty($listaPuntoVenta)): ?>
                    <li><p>No hay puntos de venta autorizados</p></li>
                <?php else: ?>
                    <?php foreach ($listaPuntoVenta as $objPuntoVenta): ?>
                        <li>
                            <p><?php echo $objPuntoVenta->nombrePuntoDeVenta ?></p>
                            <p><?php echo $objPuntoVenta->direccionPuntoDeVenta ?></p>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="cdtl_div_ln"></div>

    <?php $this->renderPartial('_productoElementoDetalle', array('objProducto' => $objProducto));?>

    <div class="cdtl_div_ln"></div>
    <label for="">Cantidad de periodos</label>
    <input data-role="periodos-suscripcion" style="border: 1px solid grey" type="text">
    <button data-role="crear-suscripcion" data-id-producto="<?php echo $objProducto->codigoProducto ?>" class="ui-btn ui-input-btn ui-corner-all ui-shadow ui-btn-inline">Crear</button>
        
</div>

