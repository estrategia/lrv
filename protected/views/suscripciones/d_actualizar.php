<div class="container">
<?php if ($producto !== null): ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="border: 1px solid #d2d2d2; margin-top:10px;">
                <div class="row">
                    <div class="col-md-6">
                        <?php $listImagenes = $producto->listImagenesGrandes() ?>
                        <?php if (empty($listImagenes)): ?>
                            <img class='img-responsive' src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->producto['noImagen']['grande']; ?>" alt="<?php echo $producto->descripcionProducto ?>" title="<?php echo $producto->descripcionProducto ?>">
                        <?php else: ?>
                            <img class='img-responsive' src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['grande']] . $listImagenes[0]->rutaImagen; ?>" alt="<?php echo $producto->descripcionProducto ?>" title="<?php echo $producto->descripcionProducto ?>">
                            
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <div class="" style="color:#A3A3A3;font-size: 16px;">
                                <div class="space-2"></div>
                            <h1 style="color: #ED1C24; font-size: 24px;">
                                <!-- Titulo del producto -->
                                <?php echo $producto->descripcionProducto ?>
                            </h1>
                            <div><span><?php echo $producto->presentacionProducto ?></span></div>
                            <div><span>Código: <?php echo $producto->codigoProducto ?></span></div>
                            <br>
                            <?php if ($producto->objCodigoEspecial->codigoEspecial != 0): ?>
                                <div class="detail_especial">
                                    <?php echo $producto->objCodigoEspecial->descripcion ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!in_array($producto->idUnidadNegocioBI, Yii::app()->params->calificacion['categoriasNoCalificacion'])): ?>
                                <div id="raty-lectura-producto-<?php echo $producto->codigoProducto ?>" data-role="raty" data-readonly="true" data-score="<?php echo $producto->getCalificacion() ?>" class="clst_cal_str detail_raty"></div>
                            <?php endif; ?>
                            <?php if (!is_null($suscripcion)): ?>
                                <div class="form-group">
                                    <label class="text-center">Periodos</label>
                                    <input class="form-control" data-role="periodos-suscripcion" type="number" min=<?php echo $suscripcion->periodoActual ?> value=<?php echo $suscripcion->cantidadPeriodos ?>>
                                </div>
                                <div class="form-group">
                                    <button data-role="actualizar-suscripcion" data-id-suscripcion="<?php echo $suscripcion->idSuscripcion ?>" class="btn btn-primary btn-sm">Actualizar suscripcion</button>
                                    <a class="btn btn-primary btn-sm pull-right" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $producto->codigoProducto, 'descripcion' => $producto->getCadenaUrl())) ?>" title="<?php echo $producto->descripcionProducto ?>">Comprar</a>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-8 col-md-offset-2" style="border: 1px solid #d2d2d2; background-color: #d2d2d2;">
                        <?php if (!is_null($suscripcion)): ?>
                            <div class="descripciones">
                                <h4>Condiciones</h4>
                                <p>-El producto se habilitara para compra con descuento del <?php echo $suscripcion->beneficio->dsctoUnid ?>% cada <?php echo Yii::app()->params['longitudPeriodoSuscripcion'] ?> días, una vez realices la primera compra.</p>
                                <p>-Se pueden agregar máximo <?php echo $suscripcion->beneficio->vtaUnid ?> unidades en cada compra.</p>
                            </div>
                        <?php else: ?>
                            <div class="descripciones">
                                <h3 class="text-center">El producto seleccionado no esta disponible para suscripción</h3>
                            </div>
                        <?php endif ?>
                </div>
            </div>
        </div>
<?php endif ?>
</div>
