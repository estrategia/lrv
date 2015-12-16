<?php $idUnico = uniqid() ?>

<?php if (isset($vista)): ?>
    <?php if ($vista == "slider"): ?>
        <li class="col-md-12 border-left">
        <?php elseif ($vista == "comparacion"): ?>
        <li class="--col-md-<?php echo $colums; ?> border-left" id="comparacion-producto-<?php echo $data->codigoProducto ?>">
        <?php elseif ($vista == "grid"): ?>
        <li class="border-left">        
        <?php endif; ?>
    <?php else: ?>  
        <?php $vista = "busqueda" ?>
    <li class="border-left" >
    <?php endif; ?>

    <div class=" content-txt2">
        <?php $objPrecio = new PrecioProducto($data, $this->objSectorCiudad, Yii::app()->shoppingCart->getCodigoPerfil()); ?>
        <div class="img-list-products">
            <?php if ($objPrecio->tieneBeneficio()): ?>
                <!--descuento-->
                <div class="cdiv_prod_desc"><?php echo $objPrecio->getPorcentajeDescuento() ?>% dcto</div>
            <?php endif; ?>
            <?php if ($objPrecio->inicializado()): ?>
                <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto, 'descripcion' => $data->getCadenaUrl())) ?>">
                <?php endif; ?>    
                <img src="<?php echo Yii::app()->request->baseUrl . $data->rutaImagen(); ?>" class="img-responsive noimagenProduct product-prom">
                <?php if ($objPrecio->inicializado()): ?>    
                </a>
            <?php endif; ?>
            <?php if (!in_array($data->idUnidadNegocioBI, Yii::app()->params->calificacion['categoriasNoCalificacion']) && $vista != 'slider'): ?>
                <div class="" style="text-align:center">
                    <div class="ranking-list" >
                        <div id="raty-lectura-producto-<?php echo $data->codigoProducto ?>" data-role="raty" data-readonly="true" data-score="<?php echo $data->getCalificacion() ?>"></div>                 
                    </div>
                </div>
            <?php elseif ($vista != 'slider'): ?>
                <div style="height:46px;"></div>
            <?php endif; ?>

        </div>


        <div class="content_product">
            <div class="">
                <p style="">
                    <?php if ($objPrecio->inicializado()): ?>
                        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto, 'descripcion' => $data->getCadenaUrl())) ?>" title='<?php echo $data->descripcionProducto ?>'>
                        <?php endif; ?>
                        <div class="descripcion-grid text-truncate">
                            <?php echo $data->descripcionProducto ?>
                        </div>
                        <div class="descripcion-lineal" style="display:none">
                            <?php echo $data->descripcionProducto ?>
                        </div>
                        <?php if ($objPrecio->inicializado()): ?>    
                        </a>
                    <?php endif; ?>
                </p>  
            </div>
            <div class="line-bottom">
                <div class="descripcion-grid text-truncate">
                    <span><?php echo $data->presentacionProducto; ?></span>
                </div>
                <div class="descripcion-lineal" style="display:none">
                    <?php echo $data->presentacionProducto ?>
                </div>
            </div>

            <!-- Precio del producto -->
            <?php if ($objPrecio->inicializado()): ?>
                <?php if ($data->mostrarAhorroVirtual == 1 && $objPrecio->getAhorro(Precio::PRECIO_UNIDAD) > 0 && $this->objSectorCiudad->objCiudad->excentoImpuestos != 1): ?>
                    <div class="prices_status"> 
                        <table style="margin-top: 15px; width: 100%;">
                            <tr>
                                <td valing="middle">

                                    <p>
                                        Antes: <span class="strike2"> <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']); ?></span><br/>
                                        Ahorro: <span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></span>
                                    </p>
                                </td>
                                <td valign="middle" align="right">
                                    <div class="price">
                                        <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="price"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
                <?php endif; ?>
                <?php if ($objPrecio->getFlete() > 0): ?>
                    <p>Flete: <span> <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getFlete(), Yii::app()->params->formatoMoneda['moneda']); ?>]</span></p>
                <?php endif; ?>
                <?php if ($objPrecio->getTiempoEntrega() > 0): ?>
                    <p> Tiempo de entrega: <span> <?php echo $objPrecio->getTiempoEntrega() ?> horas</span></p>
                <?php endif; ?>

            <?php endif; ?>


        </div>

        <?php if ($this->objSectorCiudad == null): ?>
            <?php echo CHtml::link('<div class="button">Cosultar precio</div>', $this->createUrl('/sitio/ubicacion'), array()); ?>

        <?php elseif ($data->ventaVirtual == 1 && $objPrecio->inicializado() && $vista != 'slider'): ?>
            <div class="botones-list">
                <div class="row">
                    <div class="col-xs-7 padd2">
                        <div class="group-botones-cantidad">
                            <button class="btn-addless-cantidad" data-role="disminuir-cantidad" data-id="<?php echo $idUnico ?>" id="disminuir-unidad-<?php echo $data->codigoProducto ?>" data-producto="<?php echo $data->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>" type="button"><span style="color:red" class="glyphicon glyphicon-minus"></span></button>

                            <div class="ressete">
                                <input id="cantidad-producto-unidad-<?php echo $data->codigoProducto ?>-<?php echo $idUnico ?>" data-id="<?php echo $idUnico ?>"  class="increment" type="text" data-role="validar-cantidad-unidad"  data-producto="<?php echo $data->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>" maxlength="3" value="1" data-total="700"/>
                            </div>
                            <button class="btn-addless-cantidad" data-role="aumentar-cantidad" data-id="<?php echo $idUnico ?>"  id="aumentar-unidad-<?php echo $data->codigoProducto ?>" data-producto="<?php echo $data->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>" type="button"><span style="color:red" class="glyphicon glyphicon-plus"></span></button>

                        </div>
                    </div>
                    <div class="col-xs-5 padd2">
                        <?php echo CHtml::link('<div class="button">Añadir <img src="' . Yii::app()->baseUrl . '/images/desktop/button-carrito.png" alt=""></div>', '#', array('data-producto' => $data->codigoProducto, 'data-cargar' => 1, 'data-id' => $idUnico)); ?>
                    </div>
                </div>
                <?php if (isset($vista) && $vista == "comparacion"): /* ?>
                  <div class=" btnQuitarComparar">
                  <?php echo CHtml::link('<div class="button">Quitar elemento <img src="' . Yii::app()->baseUrl . '/images/desktop/button-carrito.png" alt=""></div>', '#', array('data-producto' => $data->codigoProducto, 'data-role' => 'quitarComparar')); ?>
                  </div>
                  <?php */ elseif (!isset($vista)): /* ?>
                  <div class=" btnComparar">
                  <?php echo CHtml::link('<div class="button">Comparar <img src="' . Yii::app()->baseUrl . '/images/desktop/button-carrito.png" alt=""></div>', '#', array('data-producto' => $data->codigoProducto, 'data-role' => 'comparar')); ?>
                  </div>
                  <?php */endif; ?>
            </div>
        <?php elseif (!$objPrecio->inicializado()): ?>
            <div class="col-md-12">
                <?php echo CHtml::link('<div class="button">Agotado</div>', '#', array('disabled' => 'true', 'onclick' => 'return false;')); ?>
            </div>
        <?php elseif ($vista != 'slider'): ?>
            <div class="botones-list">
                <?php echo CHtml::link('<div class="button">Ver producto</div>', CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto))); ?>
            </div>
        <?php endif; ?>
        <?php if ($vista != 'slider'): ?>
            <div class="iconos_right"> 


                <!-- producto agregado -->
                <a href="" class="itm_ico clst_slct_prod<?php echo (Yii::app()->shoppingCart->contains($data->codigoProducto) ? " active" : "") ?>" id="icono-producto-agregado-<?php echo $data->codigoProducto ?>">
                    <img src="<?php echo Yii::app()->request->baseUrl ?>/images/desktop/icon_seleccionado.png">
                </a>
                <!-- puntos agregado -->
                <?php if ($objPrecio->tienePuntos()): ?>
                    <a class="itm_ico" href="#" onclick="return false" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<?php echo implode(", ", $objPrecio->getPuntosDescripcion()) ?>"><div class="cod_puntos">Pts<br/></div></a>  
                  <!--  <div class="itm_ico cod_puntos">Pts<br/><span></span></div> -->
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
                    <a href="#" data-tipo="1" class="itm_ico button-lista" title="Añadir a lista" data-role="lstpersonalguardar" data-codigo="<?php echo $data->codigoProducto ?>"><span class="text_add_list">Añadir a lista</span> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                    </a>
                <?php endif; ?>

                <!--comparar-->
                <?php if (isset($vista) && $vista == "comparacion"): ?>
                    <div class=" btnQuitarComparar itm_ico">
                        <?php echo CHtml::link('<span class="glyphicon glyphicon-remove"></span>', '#', array('data-producto' => $data->codigoProducto, 'data-role' => 'quitarComparar', 'title' => 'Quitar elemento')); ?>
                    </div>
                <?php else: ?>
                    <div class=" btnComparar itm_ico">
                        <?php echo CHtml::link('<span class="glyphicon glyphicon-duplicate"></span>', '#', array('data-producto' => $data->codigoProducto, 'data-role' => 'comparar', 'title' => 'Comparar')); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>  
</li>
