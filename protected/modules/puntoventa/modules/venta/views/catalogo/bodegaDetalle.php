<div class="space-3"></div>
<section>
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-6">
                <?php $listImagenes = $objProducto->listImagenesGrandes() ?>
                <?php if (empty($listImagenes)): ?>
                    <div class="item"><img class='img-responsive' src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->producto['noImagen']['grande']; ?>" alt="<?php echo $objProducto->descripcionProducto ?>" title="<?php echo $objProducto->descripcionProducto ?>"></div>
                <?php else: ?>
                    <div class="">
                        <div id="gallery" class="ad-gallery">
                            <div class="ad-image-wrapper">
                            </div>
                            <div class="ad-controls">
                            </div>
                            <div class="ad-nav">
                                <div class="ad-thumbs">
                                    <ul class="ad-thumb-list">
                                        <?php foreach ($listImagenes as $imagen): ?>
                                            <li>
                                                <a href="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['grande']] . $imagen->rutaImagen; ?>">
                                                    <img   class="img-responsive noimagenProduct product-prom"src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['grande']] . $imagen->rutaImagen; ?>" >
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div> 
            <div class="col-md-6 content-txt2 border-left">
                <div class="descripciones">
                    <div class="col-md-12" style="color:#A3A3A3;font-size: 16px;">
                        <h3 style="color: #ED1C24;"><?php echo $objProducto->descripcionProducto ?></h3>
                        <div><span><?php echo $objProducto->presentacionProducto ?></span></div>
                        <div><span>Código: <?php echo $objProducto->codigoProducto ?></span></div>

                       <!--     <div id="raty-lectura-producto-<?php echo $objProducto->codigoProducto ?>" data-role="raty" data-readonly="true" data-score="<?php echo $objProducto->getCalificacion() ?>" class=""></div> -->
                        <p>Cantidad agregada al carro: <?php echo $cantidadCarro ?></p>

                        <?php if ($objProducto->mostrarAhorroVirtual == 1 && $objPrecio->getPorcentajeDescuento() > 0 /* && $objSectorCiudad->objCiudad->excentoImpuestos==0 */): ?>
                            <div style="margin-top: 15px;"><span class="strike2"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
                            <div><span>Ahorro: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
                            <div><span style="font-weight:bolder;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>	   
                        <?php else: ?>
                            <div style="margin-top: 15px;"></div>
                            <div><span style="font-weight:bolder;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>	
                        <?php endif; ?>
                        <br/>
                        Entrega inmediata:
                        <div class="col-md-12 line-bottom">
                            <button class="col-md-2 min" style="border:1px solid;" id="disminuir_cantidad_ubicacion_<?php echo $objProducto->codigoProducto ?>" onclick="cambioUnidadesUbicacion('<?php echo $objProducto->codigoProducto ?>',<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>, 0)" type="button"><span class="glyphicon glyphicon-minus"></span></button>
                            <div class="col-md-2 ressete"><input id="cantidad-producto-ubicacion-<?php echo $objProducto->codigoProducto ?>" onchange="subtotalProductoBodega(<?php echo $objProducto->codigoProducto ?>,<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>);"  class="increment" type="text" onchange="validarCantidadUnidad(<?php echo $objProducto->codigoProducto ?>,<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>)" maxlength="3" value="<?php echo $cantidadUbicacion ?>" data-total="700"/></div>
                            <button class="col-md-2 min" style="border:1px solid;" id="aumentar_cantidad_ubicacion_<?php echo $objProducto->codigoProducto ?>" onclick="cambioUnidadesUbicacion('<?php echo $objProducto->codigoProducto ?>',<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>, 1)" type="button"><span  class="glyphicon glyphicon-plus"></span></button>
                        </div>
                        <div class="">
                            <span class="txt_sub">Subtotal</span> <span id="subtotal-producto-ubicacion-<?php echo $objProducto->codigoProducto ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) * $cantidadUbicacion, Yii::app()->params->formatoMoneda['moneda']); ?></span>
                        </div>
                        <br/>
                        Domicilio <?php echo Yii::app()->shoppingCartVitalCall->getDeliveryStored() ?> hrs:
                        <div class="col-md-12 line-bottom">
                            <button class="col-md-2 min" style="border:1px solid;" id="disminuir_cantidad_bodega_<?php echo $objProducto->codigoProducto ?>" onclick="cambioUnidadesBodega('<?php echo $objProducto->codigoProducto ?>',<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>, 0)" type="button"><span class="glyphicon glyphicon-minus"></span></button>
                            <div class="col-md-2 ressete"><input class="increment" type="text" id="cantidad-producto-bodega-<?php echo $objProducto->codigoProducto ?>" onchange="subtotalProductoBodega(<?php echo $objProducto->codigoProducto ?>,<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>);" maxlength="3" value="<?php echo $cantidadBodega ?>" data-total="700"/></div>
                            <button class="col-md-2 min" style="border:1px solid;" id="aumentar_cantidad_bodega_<?php echo $objProducto->codigoProducto ?>" onclick="cambioUnidadesBodega('<?php echo $objProducto->codigoProducto ?>',<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>, 1)" type="button"><span class="glyphicon glyphicon-plus"></span></button>
                        </div>
                        <div class="">
                            <span class="txt_sub">Subtotal</span> <span id="subtotal-producto-bodega-<?php echo $objProducto->codigoProducto ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) * $cantidadBodega, Yii::app()->params->formatoMoneda['moneda']); ?></span>
                        </div>
                        
                        <br/>
                        <div class="">Total: <span id="total-producto-<?php echo $objProducto->codigoProducto ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) * ($cantidadBodega + $cantidadUbicacion), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
                        <br/>
                        <?php echo CHtml::link('<div class="btn btn-primary btn-block" >Añadir <img src="' . Yii::app()->baseUrl . '/images/desktop/button-carrito.png" alt=""></div>', '#', array('data-producto' => $objProducto->codigoProducto, 'data-cargar-telefarma' => 3)); ?>


                        <?php if ($objProducto->codigoEspecial !== null && $objProducto->codigoEspecial != 0): ?>
                            <div class=""><span></span></div>
                            <p class="">
                                <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial'] . 'desktop/' . $objProducto->objCodigoEspecial->rutaIcono; ?>" >
                                <?php echo $objProducto->objCodigoEspecial->descripcion ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="space-3"></div>