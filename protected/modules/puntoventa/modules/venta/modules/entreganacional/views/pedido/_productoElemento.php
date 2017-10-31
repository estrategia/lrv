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
        <?php $objPrecio = new PrecioProducto($data, Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->getObjSectorCiudadOrigen(), Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->getCodigoPerfil()); ?>
        <div class="img-list-products">
            <?php if ($objPrecio->tieneBeneficio() && $data->mostrarAhorroVirtual == 1): ?>
                <!--descuento-->
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
                <div style="height:46px;"></div>
            <?php endif; ?>

        </div>


        <div class="content_product">
            <div class="">
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
                    <div class="price text-center" style="margin-top:20px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
                <?php endif; ?>
                <?php if ($objPrecio->getFlete() > 0): ?>
                    <p>Flete: <span> <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getFlete(), Yii::app()->params->formatoMoneda['moneda']); ?>]</span></p>
                <?php endif; ?>
                <?php if ($objPrecio->getTiempoEntrega() > 0): ?>
                    <p> Tiempo de entrega: <span> <?php echo $objPrecio->getTiempoEntrega() ?> horas</span></p>
                <?php endif; ?>

            <?php endif; ?>


        </div>

        <?php if (Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->getObjSectorCiudadOrigen() == null): ?>
            <?php echo CHtml::link('<div class="btn btn-primary btn-block">Consultar precio</div>', $this->createUrl('/sitio/ubicacion'), array()); ?>

        <?php elseif ($data->ventaVirtual == 1 && $objPrecio->inicializado() && $vista != 'slider'): ?>
            <div class="botones-list">
            
            	 <?php if ($data->fraccionado == 1): ?>
            	  	<div class="row">
	                    <div class="col-xs-6 ">
	                    	<?php echo CHtml::link('<div class="btn btn-primary btn-block btn-xs">Añadir Unidades</div>', CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto, 'descripcion' => $data->getCadenaUrl())), array()); ?>
	                    </div>
	                    <div class="col-xs-6 ">
	                    	<?php echo CHtml::link('<div class="btn btn-primary btn-block btn-xs">Añadir Fracciones</div>', CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto, 'descripcion' => $data->getCadenaUrl())), array('data-producto' => $data->codigoProducto, 'data-cargar' => 1, 'data-id' => $idUnico)); ?>
	                    </div>
	                 </div>
            	 <?php else:?>
	                <div class="row">
	                    <div class="col-xs-6 not_padding">
	                        <div class="group-botones-cantidad">
	                            <button class="btn btn-default btn-xs" data-role="disminuir-cantidad" data-id="<?php echo $idUnico ?>" id="disminuir-unidad-<?php echo $data->codigoProducto ?>" data-producto="<?php echo $data->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>" type="button"><span class="glyphicon glyphicon-minus"></span></button>
	
	                            <div class="ressete btn-xs">
	                                <input id="cantidad-producto-unidad-<?php echo $data->codigoProducto ?>-<?php echo $idUnico ?>" data-id="<?php echo $idUnico ?>"  class="increment" type="text" data-role="validar-cantidad-unidad"  data-producto="<?php echo $data->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>" maxlength="3" value="1" data-total="700"/>
	                            </div>
	                            <button class="btn btn-default btn-xs" data-role="aumentar-cantidad" data-id="<?php echo $idUnico ?>"  id="aumentar-unidad-<?php echo $data->codigoProducto ?>" data-producto="<?php echo $data->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) ?>" type="button"><span class="glyphicon glyphicon-plus"></span></button>
	
	                        </div>
	                    </div>
	                    <div class="col-xs-6 not_padding">
	                        <?php echo CHtml::link('<div class="btn btn-primary btn-block btn-xs">Añadir <img src="' . Yii::app()->baseUrl . '/images/desktop/button-carrito.png" alt=""></div>', '#', array('data-producto' => $data->codigoProducto, 'data-cargar' => 1, 'data-id' => $idUnico)); ?>
	                    </div>
	                </div>
                <?php endif;?>
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


                <!-- producto agregado -->
                <a href="" class="itm_ico clst_slct_prod<?php echo (Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->contains($data->codigoProducto) ? " active" : "") ?>" id="icono-producto-agregado-<?php echo $data->codigoProducto ?>">
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
                

                <!--comparar-->
                <?php if (isset($vista) && $vista == "comparacion"): ?>
                    <div class=" btnQuitarComparar itm_ico">
                        <?php echo CHtml::link('<span class="glyphicon glyphicon-remove"></span>', '#', array('data-producto' => $data->codigoProducto, 'data-role' => 'quitarComparar', 'title' => 'Quitar elemento')); ?>
                    </div>
                <?php else: ?>
                    <?php if ($data->ventaVirtual == 1): ?>
                        <div class=" btnComparar itm_ico">
                            <?php echo CHtml::link('<span class="glyphicon glyphicon-duplicate"></span>', '#', array('data-producto' => $data->codigoProducto, 'data-role' => 'comparar', 'title' => 'Comparar')); ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>  
</li>
