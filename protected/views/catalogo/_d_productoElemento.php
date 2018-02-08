<?php $idUnico = uniqid() ?>

<?php if (isset($vista)): ?>
    <?php if ($vista == "slider"): ?>
        <li class="col-md-12 border-left">
        <?php elseif ($vista == "comparacion"): ?>
        <li class="--col-md-<?php echo $colums; ?> border-left" id="comparacion-producto-<?php echo $data->codigoProducto ?>">
        <?php elseif ($vista == "grid"): ?>
        <li class="border-dotted">
        <?php endif; ?>
    <?php else: ?>
        <?php $vista = "busqueda" ?>
    <li class="border-dotted" >
    <span class="chispa-productos ">-89%</span>
    <?php endif; ?>

    <div class="content-product">
        <?php $objPrecio = new PrecioProducto($data, $this->objSectorCiudad, Yii::app()->shoppingCart->getCodigoPerfil()); ?>
        <div class="img-list-products">
            <?php if ($objPrecio->tieneBeneficio() && $data->mostrarAhorroVirtual == 1): ?>
              <div class="cdiv_prod_desc"><?php echo $objPrecio->getPorcentajeDescuento() ?>%</div>
            <?php endif; ?>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto, 'descripcion' => $data->getCadenaUrl())) ?>">
               <img src="<?php echo Yii::app()->request->baseUrl . $data->rutaImagen(); ?>" class="img-responsive noimagenProduct product-prom">
            </a>
            <?php if (!in_array($data->idUnidadNegocioBI, Yii::app()->params->calificacion['categoriasNoCalificacion']) && $vista != 'slider'): ?>
                <div class="" style="text-align:center">
                    <div class="ranking-list" >
                        <div id="raty-lectura-producto-<?php echo $data->codigoProducto ?>" data-role="raty" data-readonly="true" data-score="<?php echo $data->getCalificacion() ?>"></div>
                    </div>
                </div>
            <?php elseif ($vista != 'slider'): ?>
            <?php endif; ?>
        </div>


        <div class="content_product">
            <div class="nombre-product">
                <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto, 'descripcion' => $data->getCadenaUrl())) ?>" title="<?php echo $data->descripcionProducto ?>">
                    <div class="descripcion-grid text-truncate">
                        <?php echo $data->descripcionProducto ?>
                    </div>
                    <div class="descripcion-lineal" style="display:none">
                        <?php echo $data->descripcionProducto ?>
                    </div>
                </a>
            </div>
            <div class="line-bottom">
                <div class="descripcion-grid text-truncate">
                    <span><?php echo $data->presentacionProducto; ?></span>
                </div>
                <div class="descripcion-lineal" style="display:none">
                    <?php echo $data->presentacionProducto ?>
                </div>


                <!-- Precio del producto -->
                <?php if ($objPrecio->inicializado()): ?>
                    <?php if ($data->mostrarAhorroVirtual == 1 && $objPrecio->getAhorro(Precio::PRECIO_UNIDAD) > 0 && $this->objSectorCiudad->objCiudad->excentoImpuestos != 1): ?>
                        <div class="prices_status">
                            <table style="margin: 10px 0; width: 100%; margin-bottom: 10px;">
                                <tr>
                                    <td valing="middle">
                                        <div style="line-height: 15px;">
                                            <span class="antes">Antes: <span class="strike"> <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']); ?></span></span> <br>
                                            <span class="ahorro">Ahorro: <span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></span></span>
                                        </div>
                                    </td>
                                    <td valign="middle">
                                        <div class="price">
                                            <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="price text-center" style="margin-top:20px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
                    <?php endif; ?>
                    <?php if ($objPrecio->getFlete() > 0): ?>
                        <p>Flete: <span> <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getFlete(), Yii::app()->params->formatoMoneda['moneda']); ?>]</span></p>
                    <?php endif; ?>
                    <?php if ($objPrecio->tieneTiempoEntrega()): ?>
                        <p> Tiempo de entrega: <span> Entre <?php echo $objPrecio->getTiempoEntrega('start') ?> y <?php echo $objPrecio->getTiempoEntrega('end') ?> d&iacute;as</span></p>
                    <?php endif; ?>
                <?php endif; ?>


                <?php // CVarDumper::dump($objPrecio,10,true) ?>
                <?php $suscripcion = $objPrecio->getSuscripcion() ?>
                <?php if($objPrecio->conSuscripcion() && $suscripcion == null): ?>
                    <a href="<?php echo CController::createUrl('/suscripciones/suscribirse', array('codigoProducto' => $data->codigoProducto)) ?>" class="btn-suscribete-ahorra">Suscribete y ahorra</a>
                <?php elseif($objPrecio->getSuscripcion() != null): ?>
                    <?php $mensaje = "Ahorro por suscripción: $". $objPrecio->getAhorroUnidadSuscripcion() . " Descuento por suscripción: " . $suscripcion->descuentoProducto . "% Cantidad maxima: " . $suscripcion->cantidadDisponiblePeriodoActual . " unidades" ?>
                    <a class=" btn btn-default btn-block btn-sm" href="#" onclick="return false" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="<?php echo $mensaje ?>">
                        Descuento por suscripción
                    </a>
                <?php else: ?>

                <?php endif; ?>

            </div>



       </div>

        <?php if ($this->objSectorCiudad == null): ?>
            <?php echo CHtml::link('<div class="btn btn-primary btn-block">Consultar precio</div>', $this->createUrl('/sitio/ubicacion'), array()); ?>

        <?php elseif ($data->ventaVirtual == 1 && $objPrecio->inicializado() && $vista != 'slider'): ?>

        	<?php if ($data->fraccionado == 1): ?>
        	 <div class="botones-fraccionados">
             <div class="botones"><?php echo CHtml::link('Unidades', CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto, 'descripcion' => $data->getCadenaUrl())), array()); ?></div>
             <div class="botones"><?php echo CHtml::link('Fracciones', CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto, 'descripcion' => $data->getCadenaUrl())), array()); ?></div>
           </div>
        	<?php else:?>
            <div class="botones-list">
                <div class="row">
                    <div class="col-xs-6 not_padding">
                        <div class="group-botones-cantidad">
                            <button data-role="disminuir-cantidad" data-id="<?php echo $idUnico ?>" id="disminuir-unidad-<?php echo $data->codigoProducto ?>" data-producto="<?php echo $data->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>" type="button">-</button>
                            <input style="width:35px;" class="increment btn-xs" id="cantidad-producto-unidad-<?php echo $data->codigoProducto ?>-<?php echo $idUnico ?>" data-id="<?php echo $idUnico ?>"  class="increment" type="text" data-role="validar-cantidad-unidad"  data-producto="<?php echo $data->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>" maxlength="3" value="1" data-total="700"/>
                            <button data-role="aumentar-cantidad" data-id="<?php echo $idUnico ?>"  id="aumentar-unidad-<?php echo $data->codigoProducto ?>" data-producto="<?php echo $data->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>" type="button">+</button>
                        </div>
                    </div>
                    <div class="col-xs-6 not_padding">
                    <?php if($this->objSectorCiudad->esDefecto()): ?>
                    	<?php echo CHtml::link('<div style="margin: 0;padding: 0px 17px;" class="btn btn-primary btn-block btn-xs">Añadir <img style="margin-top: -5px; margin-left: 5px;" src="' . Yii::app()->baseUrl . '/images/desktop/button-carrito.png" alt=""></div>', CController::createUrl('/sitio/ubicacion'), array()); ?>
                    <?php else: ?>
                    	<?php echo CHtml::link('<div style="margin: 0;padding: 0px 17px;" class="btn btn-primary btn-block btn-xs">Añadir <img style="margin-top: -5px; margin-left: 5px;" src="' . Yii::app()->baseUrl . '/images/desktop/button-carrito.png" alt=""></div>', '#', array('data-producto' => $data->codigoProducto, 'data-cargar' => 1, 'data-id' => $idUnico)); ?>
                    <?php endif;?>
                    </div>
                </div>
                <?php if (isset($vista) && $vista == "comparacion"): /* ?>
                  <div class=" btnQuitarComparar">
                  <?php echo CHtml::link('<div class="btn btn-primary btn-block">Quitar elemento <img src="' . Yii::app()->baseUrl . '/images/desktop/button-carrito.png" alt=""></div>', '#', array('data-producto' => $data->codigoProducto, 'data-role' => 'quitarComparar')); ?>
                  </div>
                  <?php */ elseif (!isset($vista)): /* ?>
                  <div class=" btnComparar">
                  <?php echo CHtml::link('<div class="btn btn-primary btn-block">Comparar <img src="' . Yii::app()->baseUrl . '/images/desktop/button-carrito.png" alt=""></div>', '#', array('data-producto' => $data->codigoProducto, 'data-role' => 'comparar')); ?>
                  </div>
                  <?php */endif; ?>
            </div>
            <?php endif;?>
        <?php elseif (!$objPrecio->inicializado()): ?>
            <div class="col-md-12">
                <?php echo CHtml::link('<div class="btn btn-primary btn-block btn-xs">Agotado</div>', CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto, 'descripcion' => $data->getCadenaUrl())), array()); ?>
            </div>
        <?php elseif ($vista != 'slider'): ?>
            <div class="botones-list">
                <?php echo CHtml::link('<div class="btn btn-primary btn-block">Ver producto</div>', CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto))); ?>
            </div>
        <?php endif; ?>

        <?php if ($vista != 'slider'): ?>
            <div class="iconos_right">

              <div class="ico-puntos">4.5 <span class="glyphicon glyphicon-star"></span></div>

                <!-- producto agregado -->
                <a href="" class="itm_ico clst_slct_prod<?php echo (Yii::app()->shoppingCart->contains($data->codigoProducto) ? " active" : "") ?>" id="icono-producto-agregado-<?php echo $data->codigoProducto ?>">
                    <img width="20" src="<?php echo Yii::app()->request->baseUrl ?>/images/desktop/icon_seleccionado.png">
                </a>
                <!-- puntos agregado -->
                <?php if ($objPrecio->tienePuntos()): ?>
                    <a class="itm_ico" href="#" onclick="return false" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<?php echo implode(", ", $objPrecio->getPuntosDescripcion()) ?>"><div class="cod_puntos">Pts<br/></div></a>
                <?php endif; ?>

                <?php if ($data->objCodigoEspecial->codigoEspecial != 0): ?>
                    <!--codigo especial-->
                    <a class="itm_ico pop_codigo product-prom cod_especial" href="#" onclick="return false" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="<?php echo $data->objCodigoEspecial->descripcion ?>">
                        <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial'] . 'desktop/' . $data->objCodigoEspecial->rutaIcono ?>"/>
                    </a>
                <?php endif; ?>

                <?php if ($data->fraccionado == 1): ?>
                    <!--fraccionado-->
                    <div class="itm_ico fraccion_text" title="Producto Fraccionado"><span>F</span></div>
                <?php endif; ?>

                <?php if ($data->ventaVirtual == 1 && !Yii::app()->user->isGuest): ?>
                    <!--adicionar a lista-->
                    <a href="#" data-tipo="1" class="itm_ico button-lista" title="Añadir a lista" data-role="lstpersonalguardar" data-id="<?php echo $idUnico ?>" data-codigo="<?php echo $data->codigoProducto ?>"><span class="text_add_list">Añadir a lista</span> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                    </a>
                <?php endif; ?>

                <!--comparar-->
                <?php if (isset($vista) && $vista == "comparacion"): ?>
                    <div class=" btnQuitarComparar itm_ico">
                        <?php echo CHtml::link('<span class="glyphicon glyphicon-remove"></span>', '#', array('data-producto' => $data->codigoProducto, 'data-role' => 'quitarComparar', 'title' => 'Quitar elemento')); ?>
                    </div>
                <?php else: ?>
                    <?php if ($data->ventaVirtual == 1): ?>
                        <div class="btnComparar itm_ico">
                            <?php echo CHtml::link('<img width="20" src="'.Yii::app()->request->baseUrl .'/images/desktop/icono-comparar.png">', '#', array('data-producto' => $data->codigoProducto, 'data-role' => 'comparar', 'title' => 'Comparar')); ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</li>
