<div class="clst_cont_top">
    <?php if ($position->isProduct()): ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="clst_pro_img">
                    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto, 'descripcion' => $position->objProducto->getCadenaUrl())) ?>" data-ajax="false">
                        <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl . $position->objProducto->rutaImagen(); ?>" class="ui-li-thumb">
                    </a>
                </div>
            </div>
            <div class="col-sm-8 carro-descripcion">
                <div class="clst_cont_pr_prod">
                    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto, 'descripcion' => $position->objProducto->getCadenaUrl())) ?>" data-ajax="false"><strong><?php echo $position->objProducto->descripcionProducto ?></strong></a>
                    <br>
                    <?php if ($position->getQuantity(true) > 0): ?>
                        <span>U.M.V: <?php echo $position->getQuantity(true); ?></span>
                    <?php endif; ?>
                    <span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPrice(), Yii::app()->params->formatoMoneda['moneda']); ?></span><br>
                    Cantidad: <?php echo $position->getQuantity(); ?> <br>
                </div>
            </div>
        </div>
    </div>
       
<?php /* ?>
        <div class="clst_cont_pr_prod">
            <h2><a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto, 'descripcion' => $position->objProducto->getCadenaUrl())) ?>" data-ajax="false"><?php echo $position->objProducto->descripcionProducto ?></a></h2>
            <p><?php echo $position->objProducto->presentacionProducto ?></p>

            <div class="clst_pre_act"><span>Cantidad: <?php echo $position->getQuantity(); ?></span></div>
            <?php if ($position->getQuantity(true) > 0): ?>
                <div class="clst_pre_act"><span>U.M.V: <?php echo $position->getQuantity(true); ?></span></div>
            <?php endif; ?>
            <div class="clst_pre_act"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPrice(), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
        </div>*/?>
    <?php elseif ($position->isCombo()): ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="clst_pro_img">
                    <a href="<?php echo CController::createUrl('/catalogo/combo', array('combo' => $position->objCombo->idCombo, 'descripcion' => $position->objCombo->getCadenaUrl())) ?>" data-ajax="false">
                        <img src="<?php echo Yii::app()->request->baseUrl . $position->objCombo->rutaImagen(); ?>" class="ui-li-thumb">
                    </a>
                </div>
            </div>
            <div class="col-sm-8 carro-descripcion">
                <div class="clst_cont_pr_prod">
                    <a href="<?php echo CController::createUrl('/catalogo/combo', array('combo' => $position->objCombo->idCombo, 'descripcion' => $position->objCombo->getCadenaUrl())) ?>" data-ajax="false"><strong><?php echo $position->objCombo->descripcionCombo ?></strong></a><br>
                  
                    <span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPrice(), Yii::app()->params->formatoMoneda['moneda']); ?></span><br>
                    Cantidad: <?php echo $position->getQuantity(); ?> <br>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
