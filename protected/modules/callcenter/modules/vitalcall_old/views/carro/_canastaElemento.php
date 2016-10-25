<div class="clst_cont_top">
            <div class="row not_margin">
                <div class="col-sm-4 center-verticaly-car">
                    <div class="clst_pro_img">
                        <a href="#" >
                            <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl . $position->getObjProducto()->rutaImagen(); ?>" class="ui-li-thumb">
                        </a>
                    </div>
                </div>
                <div class="col-sm-8 carro-descripcion">
                    <div class="clst_cont_pr_prod">
                        <a href="#" ><strong><?php echo $position->getObjProducto()->descripcionProducto ?></strong></a>
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
