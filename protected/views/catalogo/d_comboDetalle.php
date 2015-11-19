<section>
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="">
                    <div class="col-md-10">
                        <?php if (empty($objCombo->listImagenesComboGrande)): ?>
                            <div class="item"><img class='img-responsive' src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->producto['noImagen']['grande']; ?>" alt="<?php echo $objCombo->descripcionCombo ?>" title="<?php echo $objCombo->descripcionCombo ?>"></div>
                        <?php else: ?>
                            <div id="gallerycombo" class="ad-gallery">
                                <div class="ad-image-wrapper">
                                </div>
                                <div class="ad-controls">
                                </div>
                                <div class="ad-nav">
                                    <div class="ad-thumbs">
                                        <ul class="ad-thumb-list">
                                            <?php foreach ($objCombo->listImagenesComboGrande as $imagen): ?>
                                                <li>
                                                    <a style="width:60%" href="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['grande']] . $imagen->rutaImagen ?>">
                                                        <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['mini']] . $imagen->rutaImagen ?>" >
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>  
            <div class="col-md-6 content-txt2 border-left">
                <div class="descripciones">
                    <div class="col-md-12" style="color:#A3A3A3;font-size: 16px;">
                        <h3 style="color: #ED1C24;"><?php echo $objCombo->descripcionCombo ?></h3>
                        <h4>Este combo incluye los siguientes productos:</h4>
                        <?php foreach ($objCombo->listProductos as $objProducto): ?>
                            <div  style="margin-top: 15px;">
                                <strong><?php echo $objProducto->descripcionProducto ?></strong>
                                <span><?php echo $objProducto->presentacionProducto ?></span>
                            </div>
                        <?php endforeach; ?>
                        <div  style="margin-top: 15px;"><span>Código: <?php echo $objCombo->idCombo ?></span></div>
                        <div class="">
                            <span style="font-weight:bolder;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(), Yii::app()->params->formatoMoneda['moneda']); ?> </span>
                        </div>
                        <div class="col-md-12 line-bottom" style="margin-top: 15px;">
                            <button class="col-md-3 min" style="border:1px solid;" id="btn-disminuir-combo-<?php $objCombo->idCombo ?>" onclick="disminuirCantidadCombo('<?php echo $objCombo->idCombo ?>',<?php echo $objPrecio->getPrecio() ?>)" type="button"><span style='color: white' class="glyphicon glyphicon-minus"></span></button>
                            <div class="col-md-6 select-cantidad"><input id="cantidad-combo-<?php echo $objCombo->idCombo ?>" class="increment" type="text" onchange="validarCantidadCombo(<?php echo $objCombo->idCombo ?>,<?php echo $objProducto->numeroFracciones ?>,<?php echo $objProducto->unidadFraccionamiento ?>,<?= $objPrecio->getPrecio(Precio::PRECIO_FRACCION) ?>,<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false) ?>)" maxlength="3" value="1" data-total="700"/></div>
                            <button class="col-md-3 min" style="border:1px solid;" id="btn-aumentar-combo-<?php echo $objCombo->idCombo ?>"  onclick="aumentarCantidadCombo('<?php echo $objCombo->idCombo ?>',<?php echo $objPrecio->getPrecio() ?>)" type="button"><span style='color: white' class="glyphicon glyphicon-plus"></span></button>
                        </div>
                        <div class=""><span class="txt_cant_total">Subtotal: </span> <span id="subtotal-producto-combo-<?php echo $objCombo->idCombo ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
                        <?php if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']])): ?>                                  
                            <div class="col-md-12" style="margin-top: 13px;">
                                <?php echo CHtml::link('<div class="button anadir">Añadir&nbsp;<img src="' . Yii::app()->baseUrl . '/images/desktop/carrito-amarillo.png" alt=""></div>', '#', array('data-combo' => $objCombo->idCombo, 'data-cargar' => 2, 'class' => '')); ?>
                                <?php echo CHtml::link('<div class="comprar-ahora">Añadir a la lista</div>', '#', array('class' => '', 'data-tipo' => '2', 'data-role' => 'lstpersonalguardar', 'data-codigo' => $objCombo->idCombo)); ?>
                            </div>
                        <?php else: ?>
                            <div class="col-md-12" style="margin-top: 13px;">                             
                                <?php echo CHtml::link('<div class="button anadir">Consultar Precio&nbsp;', '#', array(/* 'data-producto' => $objProducto->codigoProducto, 'data-carro' => 1, 'class' => '' */)); ?>                           
                            </div>     
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
