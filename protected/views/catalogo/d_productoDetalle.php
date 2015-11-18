<section>	
    <br>
</section>

<section>
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-6">
                <div id="<?php echo $objProducto->codigoProducto ?>" class="">
                    <?php if (empty($objProducto->listImagenesGrandes)): ?>
                        <div class="item"><img class='img-responsive' src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->producto['noImagen']['grande']; ?>" alt="<?php echo $objProducto->descripcionProducto ?>" title="<?php echo $objProducto->descripcionProducto ?>"></div>
                    <?php else: ?>
                        <div class="col-md-10">
                            <div id="gallery" class="ad-gallery">
                                <div class="ad-image-wrapper">
                                </div>
                                <div class="ad-controls">
                                </div>
                                <div class="ad-nav">
                                    <div class="ad-thumbs">
                                        <ul class="ad-thumb-list">
                                            <?php foreach ($objProducto->listImagenesGrandes as $imagen): ?>
                                                <li>
                                                    <a style="width:60%" href="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['grande']] . $imagen->rutaImagen; ?>">
                                                        <img class="img-responsive"src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['mini']] . $imagen->rutaImagen; ?>" >
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>  

            <div class="col-md-6 content-txt2 border-left">
                <div class="descripciones">
                    <?php if (!in_array($objProducto->idUnidadNegocioBI, Yii::app()->params->calificacion['categoriasNoCalificacion'])): ?>
                        <div class="col-md-12">
                            <h4 style="margin-bottom:0px;">Califica el producto</h4>
                            <div id="raty-lectura-producto-<?php echo $objProducto->codigoProducto ?>" data-role="raty" data-readonly="true" data-score="<?php echo $objProducto->getCalificacion() ?>" class="clst_cal_str"></div>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-12" style="color:#A3A3A3;font-size: 16px;">
                        <h3 style="color: #ED1C24;"><?php echo $objProducto->descripcionProducto ?> <!-- Titulo del producto --></h3>
                        <div><span><?php echo $objProducto->presentacionProducto ?></span></div>
                        <div><span>Código: <?php echo $objProducto->codigoProducto ?></span></div>
                        <?php if ($objPrecio->getFlete() > 0): ?>
                            <div><span>Flete: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getFlete(), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
                        <?php endif; ?>
                        <?php if ($objPrecio->getTiempoEntrega() > 0): ?>
                            <div><span>Tiempo de entrega: <?php echo $objPrecio->getTiempoEntrega() ?> horas</span></div>
                        <?php endif; ?>

                        <?php if ($objPrecio->inicializado()): ?>
                            <?php if ($objProducto->fraccionado == 1): ?> 
                                <!-- Producto fraccionado -->
                            </div>
                        </div>
                        <div class="col-md-12" style="color:#A3A3A3;font-size: 16px;">
                            <div class="col-md-12" style="margin-top:12px;">
                                <div class="col-md-6 contenedor">
                                    <div class="sep-dashed"><label for="uno" checked=""><span></span><?php echo $objProducto->presentacionProducto ?></label><br/></div>
                                    <?php if ($objProducto->mostrarAhorroVirtual == 1 && $objPrecio->getPorcentajeDescuento() > 0 && $objSectorCiudad->objCiudad->excentoImpuestos == 0): ?> 
                                        <div class="sep-dashed"><span class="antes strike"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']); ?></span><br></div>
                                        <div class="sep-dashed"><span class="ahorro">Ahorro:<?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></span><br></div>
                                        <div style="margin-top:8px;margin-bottom:8px;"><span class="ahora"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></span><br></div>
                                    <?php else: ?>
                                        <div style="margin-top:8px;margin-bottom:8px;"><span class="ahora"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']); ?></span><br></div>
                                    <?php endif; ?>         

                                    <div class="col-md-12" style="padding-bottom: 15px;">
                                        <button class="col-md-3 min" style="border:1px solid;" id="disminuir-unidad-<?php echo $objProducto->codigoProducto ?>"  data-role="disminuir-cantidad"  data-producto="<?php echo $objProducto->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>" type="button"><span class="glyphicon glyphicon-minus" style='color: white'></span></button>
                                        <div class="col-md-6 select-cantidad"><input id="cantidad-producto-unidad-<?php echo $objProducto->codigoProducto ?>" class="increment" type="text" data-role="validar-cantidad-unidad"  data-producto="<?php echo $objProducto->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>"  maxlength="3" value="1" data-total="700"/></div>
                                        <button class="col-md-3 min" style="border:1px solid;" id="aumentar-unidad-<?php echo $objProducto->codigoProducto ?>"  data-role="aumentar-cantidad"  data-producto="<?php echo $objProducto->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>" type="button"><span class="glyphicon glyphicon-plus" style='color: white'></span></button></span>
                                    </div>
                                    <div class="col-md-12 subtotal"><span class="">Subtotal: <span id="subtotal-producto-unidad-<?php echo $objProducto->codigoProducto ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></span></span></div>
                                </div>
                                <div class="col-md-6" style="border:2px solid #EAEAEA;">
                                    <br>
                                    <p class="sep-dashed" style="color: #999;font-size: 16px;">Unidad minima de venta <br> (U.M.V)</p>
                                    <div class="sep-dashed"><label for="dos"><span></span> <?php echo $objProducto->objMedidaFraccion->descripcionMedidaFraccion ?> X <?php echo $objProducto->unidadFraccionamiento ?></label><br></div>
                                    <?php if ($objProducto->mostrarAhorroVirtual == 1 && $objPrecio->getPorcentajeDescuento() > 0 && $objSectorCiudad->objCiudad->excentoImpuestos == 0): ?> 
                                        <div class="sep-dashed"><span class="antes strike"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_FRACCION, false), Yii::app()->params->formatoMoneda['moneda']); ?></span><br></div>
                                        <div class="sep-dashed"><span class="ahorro">Ahorro:<?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_FRACCION), Yii::app()->params->formatoMoneda['moneda']); ?></span><br></div>
                                        <div style="margin-top:8px;margin-bottom:8px;"><span class="ahora"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_FRACCION), Yii::app()->params->formatoMoneda['moneda']); ?></span><br></div>
                                    <?php else: ?>
                                        <div style="margin-top:8px;margin-bottom:8px;"><span class="ahora"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_FRACCION, false), Yii::app()->params->formatoMoneda['moneda']); ?></span><br></div>
                                    <?php endif; ?>  
                                    <div class="col-md-12" style="padding-bottom: 15px;">
                                        <button class="col-md-3 min" style="border:1px solid;" id="disminuir-fraccion-<?php echo $objProducto->codigoProducto ?>" onclick="disminuirCantidadFraccionado(<?php echo $objProducto->codigoProducto ?>,<?php echo $objProducto->numeroFracciones ?>,<?php echo $objProducto->unidadFraccionamiento ?>,<?= $objPrecio->getPrecio(Precio::PRECIO_FRACCION) ?>,<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false) ?>)" type="button"><span style='color: white' class="glyphicon glyphicon-minus"></span></button>
                                        <div class="col-md-6 select-cantidad"><input id="cantidad-producto-fraccion-<?php echo $objProducto->codigoProducto ?>" class="increment" type="text" onchange="validarCantidadFraccionado(<?php echo $objProducto->codigoProducto ?>,<?php echo $objProducto->numeroFracciones ?>,<?php echo $objProducto->unidadFraccionamiento ?>,<?= $objPrecio->getPrecio(Precio::PRECIO_FRACCION) ?>,<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false) ?>)" maxlength="3" value="0" data-total="700"/></div>
                                        <button class="col-md-3 min" style="border:1px solid;" id="aumentar-fraccion-<?php echo $objProducto->codigoProducto ?>"   onclick="aumentarCantidadFraccionado(<?php echo $objProducto->codigoProducto ?>,<?php echo $objProducto->numeroFracciones ?>,<?php echo $objProducto->unidadFraccionamiento ?>,<?= $objPrecio->getPrecio(Precio::PRECIO_FRACCION) ?>,<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false) ?>)" type="button"><span style='color: white' class="glyphicon glyphicon-plus"></span></button>
                                    </div>
                                    <div class="col-md-12 subtotal"><span class="">Subtotal: <span id="subtotal-producto-fraccion-<?php echo $objProducto->codigoProducto ?>">$0</span></span></div>
                                    <div class="col-md-12"><div style="width: 5px;height: 9px;"></div></div>
                                </div>				
                            </div>
                        </div>
                        <div class="descripciones">
                        <?php else: ?>
                            <?php if ($objProducto->mostrarAhorroVirtual == 1 && $objPrecio->getPorcentajeDescuento() > 0 && $objSectorCiudad->objCiudad->excentoImpuestos == 0): ?>
                                <div style="margin-top: 15px;"><span class="strike2"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
                                <div><span>Ahorro: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
                                <div><span style="font-weight:bolder;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>	   
                                <?php if ($objProducto->objImpuesto != null && $objProducto->objImpuesto->codigoImpuesto != 0 && $objProducto->objImpuesto->codigoImpuesto != 20): ?>
                                    <?php if ($objSectorCiudad == null || ($objSectorCiudad != null && $objSectorCiudad->objCiudad->excentoImpuestos == 0)): ?>
                                        <p class="">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objProducto->objImpuesto->porcentaje) ?> de impuestos</p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php else: ?>
                                <div style="margin-top: 15px;"></div>
                                <div><span style="font-weight:bolder;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>	
                            <?php endif; ?>
                            <?php if ($objProducto->ventaVirtual == 1): ?>
                                <div style="margin-top: 15px;">
                                    <div class="col-md-12 line-bottom">
                                        <button class="col-md-2 min" style="border:1px solid;" id="disminuir_unidad_<?php echo $objProducto->codigoProducto ?>" data-role="disminuir-cantidad"  data-producto="<?php echo $objProducto->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>"  type="button"><span style="color:white" class="glyphicon glyphicon-minus"></span></button>
                                        <div class="col-md-2 ressete"><input id="cantidad-producto-unidad-<?php echo $objProducto->codigoProducto ?>"  class="increment" type="text" data-role="validar-cantidad-unidad"  data-producto="<?php echo $objProducto->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>" maxlength="3" value="1" data-total="700"/></div>
                                        <button class="col-md-2 min" style="border:1px solid;" id="aumentar_unidad_<?php echo $objProducto->codigoProducto ?>"  data-role="aumentar-cantidad"  data-producto="<?php echo $objProducto->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>" type="button"><span style="color:white" class="glyphicon glyphicon-plus"></span></button>
                                    </div>

                                    <div><span> Subtotal:<span id="subtotal-producto-unidad-<?php echo $objProducto->codigoProducto ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></span></span></div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>   
                    <?php if ($objProducto->ventaVirtual == 1): ?>
                        <?php if ($objSectorCiudad != null): ?>                                  
                            <div class="col-md-12" style="margin-top: 13px;">
                                <?php echo CHtml::link('<div class="button anadir">Añadir&nbsp;<img src="' . Yii::app()->baseUrl . '/images/desktop/carrito-amarillo.png" alt=""></div>', '#', array('data-producto' => $objProducto->codigoProducto, 'data-cargar' => 1, 'class' => '')); ?>
                                <?php echo CHtml::link('<div class="comprar-ahora" >Añadir a la lista</div>', '#', array('class' => '', 'data-tipo' => '1', 'data-role' => 'lstpersonalguardar', 'data-codigo' => $objProducto->codigoProducto)); ?>
                            </div>
                        <?php else: ?>
                            <div class="col-md-12" style="margin-top: 13px;">                             
                                <?php echo CHtml::link('<div class="button anadir">Consultar Precio', $this->createUrl('/sitio/ubicacion'), array(/* 'data-producto' => $objProducto->codigoProducto, 'data-carro' => 1, 'class' => '' */)); ?>                           
                            </div>     
                        <?php endif; ?>                                 
                    <?php else: ?>
                        <div>Este producto lo puede adquirir en nuestros puntos de venta autorizados.</div>
                    <?php endif; ?>
                </div>
            </div>

            <div class=""></div>
            <div class=""></div>
        </div>
    </div>
</section>
<!--descripcion-->
<section>
    <br/>
</section>

<?php if ($objProducto->ventaVirtual == 0): ?>
    <section>
        <div class='container'>
            <div class='row line-bottom2'>
                <div class='col-md-12'>
                    <span class='glyphicon glyphicon-chevron-right der' aria-hidden='true'></span>&nbsp;<h4 style='display:inline-block;'>Puntos de venta disponibles</h4>
                    <p>
                        <?php if (empty($listaPuntoVenta)): ?>
                        <li><p>No hay puntos de venta autorizados</p></li>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <?php foreach ($listaPuntoVenta as $objPuntoVenta): ?>
                                    <tr >
                                        <td><?php echo $objPuntoVenta->nombrePuntoDeVenta ?></td>
                                        <td><?php echo $objPuntoVenta->direccionPuntoDeVenta ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    <?php endif; ?>
                    </p>
                </div>
            </div>
        </div> 
    </section>
<?php endif; ?>


<div class="modal fade" id="modalBodegas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
<section>
    <div class="container">
        <?php ProductoView::generarDetalle($objProducto->objDetalle, 1) ?>
        <!-- Porcentaje de las calificaciones -->
        <?php if (!in_array($objProducto->idUnidadNegocioBI, Yii::app()->params->calificacion['categoriasNoCalificacion'])): ?>
            <?php $porcentajes = $objProducto->getArrayCalificacion(); ?>
            <div class="row line-bottom2">
                <div class="col-md-12">
                    <span class="glyphicon glyphicon-chevron-right der" aria-hidden="true"></span>&nbsp;<h4 style="display:inline-block;"> Resumen reseñas del producto</h4>
                    <div class="col-md-12"><br></div>
                    <div class="col-md-6">

                        <div class="col-md-12">
                            <div class="col-md-3"><p>5 Estrellas </p></div>
                            <div class="col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $porcentajes[5] ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $porcentajes[5] ?>%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-3"><p>4 Estrellas </p></div>
                            <div class="col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $porcentajes[4] ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $porcentajes[4] ?>%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-3"><p>3 Estrellas </p></div>
                            <div class="col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $porcentajes[3] ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $porcentajes[3] ?>%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-3"><p>2 Estrellas </p></div>
                            <div class="col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $porcentajes[2] ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $porcentajes[2] ?>%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-3"><p>1 Estrella </p></div>
                            <div class="col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $porcentajes[1] ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $porcentajes[1] ?>%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12 content-resena">	
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="avg_sumary_<?php echo $objProducto->codigoProducto ?>" data-role="raty" data-readonly="true" data-score="<?php echo $objProducto->getCalificacion() ?>" class="clst_cal_str"></div>
                                </div>
                                <div class="col-md-6"><p style="margin:0px;font-size:20px;color:#999;"><?php echo $objProducto->getContadorCalificaciones(); ?> Reseña(s)</p></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">	
                                    <?php if (Yii::app()->user->isGuest): ?>
                                        <p class="">Iniciar sesión para calificar este producto</p>
                                    <?php elseif ($objCalificacion == null): ?>
                                        <a href="#" data-producto="<?php echo $objProducto->codigoProducto ?>" data-toggle="modal" data-target="#modal-calificacion"><div class="button-resena">Escribe una reseña&nbsp;<span class="glyphicon glyphicon-chevron-right" style="color:#fff;"></span></div></a>
                                    <?php else: ?>
                                        <table class="">
                                            <tr>
                                                <td>Tu calificación:</td>
                                                <td>
                                                    <div id="calificacion-raty-<?php echo $objProducto->codigoProducto ?>" data-role="raty" data-readonly="true" data-score="<?php echo $objCalificacion->calificacion ?>" class="clst_cal_str"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Puedes volver a calificar dentro de <?php echo $objCalificacion->getDiferencia()->format('%h horas y %i minutos'); ?></td>
                                            </tr>
                                        </table>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <span class="glyphicon glyphicon-chevron-right der" aria-hidden="true"></span>&nbsp;<h4 style="display:inline-block;"> Reseñas del producto</h4>
                    </div>
                    <div class="col-md-12"><br></div>
                    <?php $contadorCalificacion = 0 ?>
                    <?php foreach ($objProducto->listCalificaciones as $objComentario): ?>
                        <?php if ($objComentario->aprobado == 1): ?>
                            <?php $contadorCalificacion++; ?>
                            <div class="col-md-2">
                                <div class="col-md-12">	
                                    <div class="row">
                                        <div id="rating-<?php echo $objComentario->codigoProducto ?>" data-role="raty" data-readonly="true" data-score="<?php echo $objComentario->calificacion ?>" class="clst_cal_str"></div>
                                    </div>
                                    <div class="row">
                                        <p style="color:#999;font-weight:bolder;" ><?php echo $objComentario->objUsuario->nombre; ?><br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10 border-left">
                                <h4 style="margin-bottom:0px;color:#ED1C24;"><?php echo $objComentario->titulo; ?></h4>
                                <p style="text-align:justify;"><?php echo $objComentario->comentario ?></p>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if ($contadorCalificacion <= 0): ?>
                        <p> Nadie ha calificado este producto aún</p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
</section>

<section>
    <div class="col-md-12">
        <?php if (!Yii::app()->user->isGuest): ?>
            <?php if ($objCalificacion == null): ?>
                <?php
                $this->renderPartial('_d_calificarProducto', array(
                    'objProducto' => $objProducto,
                    'objFormCalificacion' => $objFormCalificacion
                ))
                ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php if ($objProducto->codigoEspecial !== null && $objProducto->codigoEspecial != 0): ?>
            <div class=""><span></span></div>
            <p class="">
                <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial'] . $objProducto->objCodigoEspecial->rutaIcono; ?>" >
                <?php echo $objProducto->objCodigoEspecial->descripcion ?>
            </p>
        <?php endif; ?>
    </div>
</section>    

<?php if (!empty($listRelacionados)): ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 title">
                    <h2 class="productos-destacados"><span><i class="glyphicon glyphicon-chevron-right"></i></span> Productos relacionados</h2>
                </div>
            </div>
        </div>

        <div id="owl-relacionados" class="owl-carousel slide-productos">
            <?php foreach ($listRelacionados as $objRelacionado): ?>
                <div class="item">
                    <ul class="listaProductos">
                        <?php
                        $this->renderPartial('_d_productoElemento', array(
                            'data' => $objRelacionado->objProductoRelacionado,
                            'vista' => 'relacionado'
                        ));
                        ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>
