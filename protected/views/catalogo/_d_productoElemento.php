<?php if (isset($vista)): ?>
    <?php if ($vista == "relacionado"): ?>
        <li class="col-md-12 border-left">
        <?php elseif ($vista == "comparacion"): ?>
        <li class="--col-md-<?php echo $colums; ?> border-left" id="comparacion-producto-<?php echo $data->codigoProducto ?>">
        <?php elseif ($vista == "grid"): ?>
        <li class="col-md-4 border-left">        
        <?php endif; ?>
    <?php else: ?>    
    <li class="border-left" >
    <?php endif; ?>

    <div class=" content-txt2">
        <?php $objPrecio = new PrecioProducto($data, $this->objSectorCiudad, Yii::app()->shoppingCart->getCodigoPerfil()); ?>
        <div class="img-list-products">
            <?php if ($objPrecio->tieneBeneficio()): ?>
            <!--descuento-->
                <div class="cdiv_prod_desc"><?php echo $objPrecio->getPorcentajeDescuento() ?>% <span>dcto</span></div>
            <?php endif; ?>
            <?php if ($objPrecio->inicializado()):?>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto, 'descripcion' => $data->getCadenaUrl())) ?>">
            <?php endif;?>    
                <img src="<?php echo Yii::app()->request->baseUrl . $data->rutaImagen(); ?>" class="img-responsive noimagenProduct product-prom">
            <?php if ($objPrecio->inicializado()):?>    
            </a>
            <?php endif;?>
            <!-- producto agregado -->
            <a href="" class="clst_slct_prod<?php echo (Yii::app()->shoppingCart->contains($data->codigoProducto) ? " active" : "") ?>" id="icono-producto-agregado-<?php echo $data->codigoProducto ?>">
                <img src="<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_seleccionado.png">
            </a>
            <!-- producto agregado -->
        </div>

       
        <div class="content_product">
            <div class="line-bottom">
                <p style="min-height: 41px">
                    <?php if ($objPrecio->inicializado()):?>
                    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto, 'descripcion' => $data->getCadenaUrl())) ?>" title='<?php echo $data->descripcionProducto ?>'>
                    <?php endif;?>
                        <?php if (strlen($data->descripcionProducto) > 20): ?>
                            <?php echo substr($data->descripcionProducto, 0, 20) . "..." ?>
                        <?php else: ?>
                            <?php echo $data->descripcionProducto ?>
                        <?php endif; ?>
                    <?php if ($objPrecio->inicializado()):?>    
                    </a>
                    <?php endif;?>
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
                <?php if ($data->mostrarAhorroVirtual == 1 && $objPrecio->getAhorro(Precio::PRECIO_UNIDAD) > 0 && $this->objSectorCiudad->objCiudad->excentoImpuestos != 1): ?>
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

            
        </div>

        <?php if ($this->objSectorCiudad == null): ?>
            <div class="col-md-12">
                <?php echo CHtml::link('<div class="button">Cosultar precio</div>', $this->createUrl('/sitio/ubicacion'), array()); ?>
            </div>
        <?php elseif ($data->ventaVirtual == 1 && $objPrecio->inicializado()): ?>
            <div class="botones-list">
                <?php echo CHtml::link('<div class="button">Añadir <img src="' . Yii::app()->baseUrl . '/images/desktop/carrito-amarillo.png" alt=""></div>', '#', array('data-producto' => $data->codigoProducto, 'data-cargar' => 1)); ?>
                <div class="container-fluid group-botones-cantidad">
                    <div class="row">
                        <div class="col-xs-3" style="padding-left: 0px; padding-right: 2px;">
                            <button class="btn-addless-cantidad" data-role="disminuir-cantidad" id="disminuir-unidad-<?php echo $data->codigoProducto ?>" data-producto="<?php echo $data->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>" type="button"><span style="color:red" class="glyphicon glyphicon-minus"></span></button>
                        </div>
                        <div class="col-xs-6 ressete">
                            <input id="cantidad-producto-unidad-<?php echo $data->codigoProducto ?>" class="increment" type="text" data-role="validar-cantidad-unidad"  data-producto="<?php echo $data->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>" maxlength="3" value="1" data-total="700"/>
                        </div>
                        <div class="col-xs-3" style="padding-left: 2px; padding-right: 0;">
                            <button class="btn-addless-cantidad" data-role="aumentar-cantidad"  id="aumentar-unidad-<?php echo $data->codigoProducto ?>" data-producto="<?php echo $data->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>" type="button"><span style="color:red" class="glyphicon glyphicon-plus"></span></button>
                        </div>
                    </div>
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
                 <?php if (!in_array($data->idUnidadNegocioBI, Yii::app()->params->calificacion['categoriasNoCalificacion'])): ?>
            <div class="" style="text-align:center">
                <div class="ranking-list" >
                    <div id="raty-lectura-producto-<?php echo $data->codigoProducto ?>" data-role="raty" data-readonly="true" data-score="<?php echo $data->getCalificacion() ?>"></div>
                </div>
            </div>
        <?php endif; ?>
            </div>
        <?php elseif (!$objPrecio->inicializado()): ?>
            <div class="col-md-12">
                <?php echo CHtml::link('<div class="button">Producto Agotado</div>', '#', array('disabled' => 'true')); ?>
            </div>
        <?php else: ?>
            <div class="botones-list">
                <?php echo CHtml::link('<div class="button">Ver producto</div>', CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto))); ?>
                 <?php if (!in_array($data->idUnidadNegocioBI, Yii::app()->params->calificacion['categoriasNoCalificacion'])): ?>
            <div class="" style="text-align:center">
                <div class="ranking-list" >
                    <div id="raty-lectura-producto-<?php echo $data->codigoProducto ?>" data-role="raty" data-readonly="true" data-score="<?php echo $data->getCalificacion() ?>"></div>                 
                </div>
            </div>
        <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="iconos_right"> 
            <div class="itm_ico cod_puntos">pts<br><span>x2</span></div>
            <?php if ($data->objCodigoEspecial->rutaIcono != ""): ?>
            <!--codigo especial verde-->
                <a class='itm_ico pop_codigo product-prom cod_especial' role="button" data-toggle="popover" title="Codigo especial" data-content="<?php echo $data->objCodigoEspecial->descripcion ?>" >
                    <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial'] . "/" . $data->objCodigoEspecial->rutaIcono ?>"/>
                </a>
            <?php endif; ?>
            <?php if ($data->fraccionado == 1): ?>
            <!--fraccionado-->
            <div class="itm_ico fraccion_text" title="Producto Fraccionado"><span>F</span>Fracci&oacute;n</div>
            <?php endif; ?>
            <?php if ($data->ventaVirtual == 1 && $objPrecio->inicializado()):  ?>
            <!--adicionar a lista-->
                <a href="#" data-tipo="1" class="itm_ico button-lista" title="Añadir a lista" data-role="lstpersonalguardar" data-codigo="<?php echo $data->codigoProducto ?>"><span class="text_add_list">Añadir a lista</span> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>
            <?php endif; ?>
        </div>
    </div>  
</li>
