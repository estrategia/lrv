<?php $idUnico = uniqid() ?>

<div class="space-3"></div>
<section class="product_detail">
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
                    <div class="col-md-12" style="color:#A3A3A3;font-size: 16px;">

                        <h3 style="color: #ED1C24;">
                        <!-- producto agregado -->
                            <a href="" class="itm_ico clst_slct_prod<?php echo (Yii::app()->shoppingCart->contains($objProducto->codigoProducto) ? " active" : "") ?>" id="icono-producto-agregado-<?php echo $objProducto->codigoProducto ?>">
                                <img src="<?php echo Yii::app()->request->baseUrl ?>/images/desktop/icon_seleccionado.png">
                            </a>
                           <?php echo $objProducto->descripcionProducto ?></h3>
                        <div><span><?php echo $objProducto->presentacionProducto ?></span></div>
                        <div><span>Código: <?php echo $objProducto->codigoProducto ?></span></div>
						<?php if ($objProducto->objCodigoEspecial->codigoEspecial != 0): ?>
                            <div class="detail_especial">
                                <?php echo $objProducto->objCodigoEspecial->descripcion ?>
                            </div>
                        <?php endif; ?>
                       <!--     <div id="raty-lectura-producto-<?php echo $objProducto->codigoProducto ?>" data-role="raty" data-readonly="true" data-score="<?php echo $objProducto->getCalificacion() ?>" class=""></div> -->
                        <!-- <p>Cantidad agregada al carro: <?php echo $cantidadCarro ?></p> -->

                        <?php if ($objProducto->mostrarAhorroVirtual == 1 && $objPrecio->getPorcentajeDescuento() > 0 /* && $objSectorCiudad->objCiudad->excentoImpuestos==0 */): ?>

  <table style="margin-top: 15px;">
    <tr>
        <td valing="middle">
          <div style="margin-top: 15px;"><span class="strike2"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
          <div><span>Ahorro: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
        </td>
        <td valing="middle">
          <div class="pricened"><span ><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
        </td>
    </tr>
  </table>



                        <?php else: ?>
                            <div style="margin-top: 15px;"></div>
                            <div><span style="font-weight:bolder;color: #e90000 !important;font-size: 1.5em;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
                        <?php endif; ?>
                        <br/>
                        <?php if($unidadesDisponibles > 0):?>
                          <div style="margin-bottom:15px;">
                            Entrega en condiciones normales:
                            <a href='#' data-toggle="modal" data-target="#modalCondicionesNormales">
                              <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                            </a>
                          </div>

            <div id="modalCondicionesNormales" class="modal fade" role="dialog">
						  <div class="modal-dialog">
						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Condiciones</h4>
						      </div>
						      <div class="modal-body">
						        <p>Los productos agregados ser&aacute;n entregados seg&uacute;n la programaci&oacute;n que realices al momento de finalizar la compra.</p>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						      </div>
						    </div>

						  </div>
						</div>

						<div class="col-md-12 line-bottom">
                            <button class="col-md-2 min" style="border:1px solid;" id="disminuir_cantidad_ubicacion_<?php echo $objProducto->codigoProducto ?>" onclick="cambioUnidadesUbicacion('<?php echo $objProducto->codigoProducto ?>',<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>, 0)" type="button"><span  class="glyphicon glyphicon-minus"></span></button>
                            <div class="col-md-2 ressete"><input id="cantidad-producto-ubicacion-<?php echo $objProducto->codigoProducto ?>" onchange="subtotalProductoBodega(<?php echo $objProducto->codigoProducto ?>);"  class="increment" type="text" onchange="validarCantidadUnidad(<?php echo $objProducto->codigoProducto ?>,<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>)" maxlength="3" value="<?php echo $cantidadUbicacion ?>" data-total="700"/></div>
                            <button class="col-md-2 min" style="border:1px solid;" id="aumentar_cantidad_ubicacion_<?php echo $objProducto->codigoProducto ?>" onclick="cambioUnidadesUbicacion('<?php echo $objProducto->codigoProducto ?>',<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>, 1)" type="button"><span class="glyphicon glyphicon-plus"></span></button>
                        </div>
                        <div class="">
                            <span class="txt_sub">Subtotal</span> <span id="subtotal-producto-ubicacion-<?php echo $objProducto->codigoProducto ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) * $cantidadUbicacion, Yii::app()->params->formatoMoneda['moneda']); ?></span>
                        </div>
                        <br/>
                        <?php endif;?>

                        <div style="margin-bottom:15px;">
                          Entrega en <?php echo Yii::app()->shoppingCart->getDeliveryStored() ?> horas:
                          <a href='#' data-toggle="modal" data-target="#modalCondicionesBodega">
                          <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                          </a>
                        </div>

                        <div id="modalCondicionesBodega" class="modal fade" role="dialog">
						  <div class="modal-dialog">
						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Condiciones</h4>
						      </div>
						      <div class="modal-body">
						        <p>Los productos agregados ser&aacute;n entregados en el tiempo estipulado y tendr&aacute;n un cobro adicional de env&iacute;o que ser&aacute; calculado al final de la compra..</p>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						      </div>
						    </div>

						  </div>
						</div>
                        <div class="col-md-12 line-bottom">
                            <button class="col-md-2 min" style="border:1px solid;" id="disminuir_cantidad_bodega_<?php echo $objProducto->codigoProducto ?>" onclick="cambioUnidadesBodega('<?php echo $objProducto->codigoProducto ?>',<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>, 0)" type="button"><span class="glyphicon glyphicon-minus"></span></button>
                            <div class="col-md-2 ressete"><input class="increment" type="text" id="cantidad-producto-bodega-<?php echo $objProducto->codigoProducto ?>" onchange="subtotalProductoBodega(<?php echo $objProducto->codigoProducto ?>);" maxlength="3" value="<?php echo $cantidadBodega ?>" data-total="700"/></div>
                            <button class="col-md-2 min" style="border:1px solid;" id="aumentar_cantidad_bodega_<?php echo $objProducto->codigoProducto ?>" onclick="cambioUnidadesBodega('<?php echo $objProducto->codigoProducto ?>',<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>, 1)" type="button"><span class="glyphicon glyphicon-plus"></span></button>
                        </div>
                        <div class="">
                            <span class="txt_sub">Subtotal</span> <span id="subtotal-producto-bodega-<?php echo $objProducto->codigoProducto ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) * $cantidadBodega, Yii::app()->params->formatoMoneda['moneda']); ?></span>
                        </div>

                        <br/>
                        <div class="">Total: <span id="total-producto-<?php echo $objProducto->codigoProducto ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) * ($cantidadBodega + $cantidadUbicacion), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
                        <br/>
                        <?php echo CHtml::link('<div class="btn btn-primary btn-block" >Añadir <img src="' . Yii::app()->baseUrl . '/images/desktop/button-carrito.png" alt=""></div>', '#', array('data-producto' => $objProducto->codigoProducto, 'data-cargar' => 3)); ?>
						<?php if (!Yii::app()->user->isGuest): ?>
                                    <?php echo "<div class='space-1'></div>" ?>
                                    <?php echo CHtml::link('<div class="btn btn-default btn-block" >Añadir a la lista</div>', '#', array('class' => '', 'data-tipo' => '1', 'data-role' => 'lstpersonalguardar', 'data-codigo' => $objProducto->codigoProducto, 'data-id' => $idUnico)); ?>
                                <?php endif; ?>
                                <!--adicionar a lista -->
                                <?php echo "<div class='space-1'></div>" ?>
                                <?php echo CHtml::link('<div class="btn btn-default btn-block" >Comparar</div>', '#', array('class' => '', 'data-producto' => $objProducto->codigoProducto,'data-role' => 'comparar','data-id' => $idUnico)); ?>

                        <?php /*if ($objProducto->codigoEspecial !== null && $objProducto->codigoEspecial != 0): ?>
                            <div class=""><span></span></div>
                            <p class="">
                                <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial'] . 'desktop/' . $objProducto->objCodigoEspecial->rutaIcono; ?>" >
                                <?php echo $objProducto->objCodigoEspecial->descripcion ?>
                            </p>
                        <?php endif;*/ ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="space-3"></div>


<section>
    <div class="container">
         <div class='row line-bottom2'>
            <div class='col-md-12'>
              <hr>
                 
                 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                   <div class="panel panel-default">
                     <div class="panel-heading" role="tab" id="headingOne">
                       <h4 class="panel-title">
                         <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           POLITICAS DE CAMBIOS Y DEVOLUCIONES.
                         </a>
                       </h4>
                     </div>
                     <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                       <div class="panel-body">
                       <span class='glyphicon glyphicon-chevron-right der' aria-hidden='true'></span>&nbsp;<h4 style='display:inline-block;color:#EA0001;font-weight: bold;'>Retracto (producto recibido pero no lo quiero)</h4>
                         <p>El costo de env&iacute;o del PRODUCTO al vendedor lo asume: COMPRADOR <br/>
                         Tiempo solicitud retracto: 5 d&iacute;as<br/>
                         Tiempo de respuesta: 5 d&iacute;as<br/>
                         </p>
                         <span class='glyphicon glyphicon-chevron-right der' aria-hidden='true'></span>&nbsp;<h4 style='display:inline-block;color:#EA0001;font-weight: bold;'>Devoluci&oacute;n (no recib&iacute; el producto / recib&iacute; producto malo)</h4>
                         <p>El costo de env&iacute;o del PRODUCTO al vendedor lo asume: Vendedor <br/>
                         Costo de env&iacute;o al cliente lo asume: Vendedor <br/>
                         Tiempo solicitud devoluci&oacute;n: 5 d&iacute;as <br/>
                         Tiempo de respuesta: 5 d&iacute;as <br/>
                         </p>
                         <span class='glyphicon glyphicon-chevron-right der' aria-hidden='true'></span>&nbsp;<h4 style='display:inline-block;color:#EA0001;font-weight: bold;'>Garant&iacute;a (el producto se ve averi&oacute;)</h4>
                         <p>El costo de env&iacute;o del PRODUCTO al vendedor lo asume: Vendedor<br/>
                         El costo de env&iacute;o del PRODUCTO al cliente lo asume: Vendedor<br/>
                         Solicitud garant&iacute;a, por producto<br/>
                         Tiempo de respuesta: 30 d&iacute;as despu&eacute;s de recibido el PRODUCTO<br/>
                       </div>
                     </div>
                   </div>
               </div>
            </div>
         </div>
      </div>
</section>
