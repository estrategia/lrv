<div class="container">
<?php if ($producto !== null): ?>
        <div class="row">
            <div class="col-md-6">
                <?php $listImagenes = $producto->listImagenesGrandes() ?>
                <?php if (empty($listImagenes)): ?>
                    <div class="item"><img class='img-responsive' src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->producto['noImagen']['grande']; ?>" alt="<?php echo $producto->descripcionProducto ?>" title="<?php echo $producto->descripcionProducto ?>"></div>
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
                                                    <img class="img-responsive width-thumb-owl product-prom"src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['grande']] . $imagen->rutaImagen; ?>" alt="<?php echo $imagen->nombreImagen ?>" title="<?php echo $imagen->tituloImagen ?>">
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 content-txt2 border-left">
                <div class="descripciones">
                    <div style="height: auto; overflow: hidden;">

                    </div>
                    <div class="" style="color:#A3A3A3;font-size: 16px;">
                            <div class="space-2"></div>
                        <h1 style="color: #ED1C24; font-size: 24px;">
                            <!-- Titulo del producto -->
                            <?php echo $producto->descripcionProducto ?>
                        </h1>
                        <div><span><?php echo $producto->presentacionProducto ?></span></div>
                        <div><span>Código: <?php echo $producto->codigoProducto ?></span></div>
                        <?php if ($producto->objCodigoEspecial->codigoEspecial != 0): ?>
                            <div class="detail_especial">
                                <?php echo $producto->objCodigoEspecial->descripcion ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!in_array($producto->idUnidadNegocioBI, Yii::app()->params->calificacion['categoriasNoCalificacion'])): ?>
                            <div id="raty-lectura-producto-<?php echo $producto->codigoProducto ?>" data-role="raty" data-readonly="true" data-score="<?php echo $producto->getCalificacion() ?>" class="clst_cal_str detail_raty"></div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if (!is_null($suscripcion)): ?>
                    <div class="descripciones">
                        <h4>Condiciones</h4>
                        <p>-El producto se habilitara para compra con descuento del <?php echo $suscripcion->beneficio->dsctoUnid ?>% cada <?php echo Yii::app()->params['longitudPeriodoSuscripcion'] ?> días, una vez realices la primera compra.</p>
                        <p>-Se pueden agregar máximo <?php echo $suscripcion->beneficio->vtaUnid ?> unidades en cada compra.</p>
                        <span class="text-center"><input class="form-control" data-role="periodos-suscripcion" type="number" min=<?php echo $suscripcion->periodoActual ?> value=<?php echo $suscripcion->cantidadPeriodos ?>></span>
                        <button data-role="actualizar-suscripcion" data-id-suscripcion="<?php echo $suscripcion->idSuscripcion ?>" class="btn btn-primary btn-sm btn-block">Actualizar suscripcion</button>
                    </div>
                <?php else: ?>
                    <div class="descripciones">
                        <h3 class="text-center">El producto seleccionado no esta disponible para suscripción</h3>
                    </div>
                <?php endif ?>
            </div>
        </div>
<?php endif ?>
</div>
