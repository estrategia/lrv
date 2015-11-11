<?php if (isset($vista)): ?>
    <?php if ($vista == "relacionado"): ?>
        <li class="col-md-12 border-left">
        <?php elseif ($vista == "comparacion"): ?>
            <li class="--col-md-<?php echo $colums; ?> border-left" id="comparacion-producto-<?php echo $data->codigoProducto ?>">
            <?php endif; ?>
        <?php else: ?>    
            <li class="border-left" >
            <?php endif; ?>

            <div class=" content-txt2">
                <?php
                $objSectorCiudad = Yii::app()->shoppingCart->getobjSectorCiudad();?>        
                <?php $objPrecio = new PrecioProducto($data, $objSectorCiudad, Yii::app()->shoppingCart->getCodigoPerfil()); ?>
                <?php if ($objPrecio->tieneBeneficio()): ?>
                    <div class="cdiv_prod_desc">
                        <div class="c_prod_desc">
                            <p><?php echo $objPrecio->getPorcentajeDescuento() ?> % <span>dcto</span></p>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="img-list-products">
                    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto,'descripcion'=>  $data->getCadenaUrl() )) ?>">
                        <img src="<?php echo Yii::app()->request->baseUrl . $data->rutaImagen(); ?>" class="img-responsive product-prom">
                    </a>
                </div>
            </div>
        <?php endif; ?>
        <div class="img-list-products">
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto, 'descripcion' => $data->getCadenaUrl())) ?>">
                <img src="<?php echo Yii::app()->request->baseUrl . $data->rutaImagen(); ?>" class="img-responsive product-prom">
            </a>
            <!-- producto agregado -->
                <a href="" class="clst_slct_prod<?php echo (Yii::app()->shoppingCart->contains($data->codigoProducto) ? " active" : "") ?>" id="icono-producto-agregado-<?php echo $data->codigoProducto ?>">
                    <img src="<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_seleccionado.png">
                </a>
            <!-- producto agregado -->
        </div>

        <?php if (!in_array($data->idUnidadNegocioBI, Yii::app()->params->calificacion['categoriasNoCalificacion'])): ?>
            <div class="" style="text-align:center">
                <div class="ranking-list" >
                    <div id="raty-lectura-producto-<?php echo $data->codigoProducto ?>" data-role="raty" data-readonly="true" data-score="<?php echo $data->getCalificacion() ?>"></div>
                    <?php if ($data->objCodigoEspecial->rutaIcono != ""): ?>
                        <a class='pop_codigo img-responsive product-prom' role="button" data-toggle="popover" title="" data-content="<?php echo $data->objCodigoEspecial->descripcion ?>" >
                            <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial'] . "/" . $data->objCodigoEspecial->rutaIcono ?>"/>
                        </a>
                    <?php endif; ?>    
                </div>
            </div>
        <?php endif; ?>
        <div class="content_product">
            <div class="line-bottom">
                <p style="min-height: 41px">
                    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto, 'descripcion' => $data->getCadenaUrl())) ?>" title='<?php echo $data->descripcionProducto ?>' data-ajax="false">
                        <?php if (strlen($data->descripcionProducto) > 20): ?>
                            <?php echo substr($data->descripcionProducto, 0, 20) . "..." ?>
                        <?php else: ?>
                            <?php echo $data->descripcionProducto ?>
                        <?php endif; ?>
                    </a>
                </p>  
            </div>
            <div class="line-bottom">
                <?php if (strlen($data->presentacionProducto) > 15): ?>
                    <span><?php echo substr($data->presentacionProducto, 0, 14) ?>...</span>
                <?php else: ?>
                    <span><?php echo $data->presentacionProducto; ?></span>
                <?php endif; ?>
            </div>

            <!-- Precio del producto -->
            <?php if ($objPrecio->inicializado()): ?>
                <?php if ($data->mostrarAhorroVirtual == 1 && $objPrecio->getAhorro(Precio::PRECIO_UNIDAD) > 0 && $objSectorCiudad->objCiudad->excentoImpuestos != 1): ?>
                    <div class="prices_status"> 
                        <div class="price">
                            <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?>
                        </div>
                        <p>
                            Antes: <span class="strike2"> <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']); ?></span><br/>
                            Ahorro: <span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></span>
                        </p>
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

            <?php if ($data->fraccionado == 1): ?>
                <span class="fraccion_text">PRODUCTO FRACCIONADO</span>
            <?php endif; ?> 
        </div>
        <?php if ($data->ventaVirtual == 1 && $objPrecio->inicializado()): ?>

            <div class="botones-list">
                <?php echo CHtml::link('<div class="button">Añadir <img src="' . Yii::app()->baseUrl . '/images/desktop/carrito-amarillo.png" alt=""></div>', '#', array('data-producto' => $data->codigoProducto, 'data-cargar' => 1)); ?>

                <div class="container-fluid group-botones-cantidad">
                    <div class="row">
                        <div class="col-xs-3" style="padding-left: 0px; padding-right: 2px;">
                            <button class="btn-addless-cantidad" data-role="disminuir-cantidad" id="disminuir-unidad-<?php echo $data->codigoProducto ?>" data-producto="<?php echo $data->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>" type="button"><span style="color:red" class="glyphicon glyphicon-minus"></span></button>
                        </div>
                        <div class="col-xs-6 ressete">
                            <input id="cantidad-producto-unidad-<?php echo $data->codigoProducto ?>" class="increment" type="text" onchange="validarCantidadUnidad(<?php echo $data->codigoProducto ?>,<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>)" maxlength="3" value="1" data-total="700"/>
                        </div>
                        <div class="col-xs-3" style="padding-left: 2px; padding-right: 0;">
                            <button class="btn-addless-cantidad" data-role="aumentar-cantidad"  id="aumentar-unidad-<?php echo $data->codigoProducto ?>" data-producto="<?php echo $data->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>" type="button"><span style="color:red" class="glyphicon glyphicon-plus"></span></button>
                        </div>
                    </div>
                </div>
                    <div class="">	
                        <a href="#" data-tipo="1" data-role="lstpersonalguardar" data-codigo="<?php echo $data->codigoProducto ?>">
                            <div class="button-lista"   >Añadir a lista&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </div>
                        </a>
                    </div>

                        <?php if (isset($vista) && $vista == "comparacion"): ?>
                        <div class=" btnQuitarComparar">
                        <?php echo CHtml::link('<div class="button">Quitar elemento <img src="' . Yii::app()->baseUrl . '/images/desktop/button-carrito.png" alt=""></div>', '#', array('data-producto' => $data->codigoProducto, 'data-role' => 'quitarComparar')); ?>
                        </div>
                        <?php elseif (!isset($vista)): ?>
                        <div class=" btnComparar">
                        <?php echo CHtml::link('<div class="button">Comparar <img src="' . Yii::app()->baseUrl . '/images/desktop/button-carrito.png" alt=""></div>', '#', array('data-producto' => $data->codigoProducto, 'data-role' => 'comparar')); ?>
                        </div>
                    <?php endif; ?>
                    </div>
                    <?php else: ?>
                    <div class="botones-list">
                    <?php echo CHtml::link('<div class="button">Ver producto</div>', CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto))); ?>
                    </div>
                <?php endif; ?>    
            </div>  
        </li>
