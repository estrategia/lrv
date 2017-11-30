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
        <?php $objPrecio = new PrecioProducto($data, $this->objCiudadSectorDestino, Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->getCodigoPerfil(), false, true); ?>
        <div class="img-list-products">
            <?php if ($objPrecio->tieneBeneficio() && $data->mostrarAhorroVirtual == 1): ?>
                <!--descuento-->
                <div class="cdiv_prod_desc"><?php echo $objPrecio->getPorcentajeDescuento() ?>%</div>
            <?php endif; ?>

            <a href="<?php echo CController::createUrl('catalogo/producto', array('producto' => $data->codigoProducto, 'descripcion' => $data->getCadenaUrl())) ?>">
               <img src="<?php echo Yii::app()->request->baseUrl . $data->rutaImagen(); ?>" class="img-responsive noimagenProduct product-prom">
            </a>

            <?php if (!in_array($data->idUnidadNegocioBI, Yii::app()->params->calificacion['categoriasNoCalificacion']) && $vista != 'slider'): ?>
                <div class="" style="text-align:center">
                    <div class="ranking-list" >
                        <div id="raty-lectura-producto-<?php echo $data->codigoProducto ?>" data-role="raty" data-readonly="true" data-score="<?php echo $data->getCalificacion() ?>"></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="content_product">
            <div class="">
                    <div class="descripcion-grid text-truncate">
                        <?php echo $data->descripcionProducto ?>
                    </div>
                    <div class="descripcion-lineal" style="display:none">
                        <?php echo $data->descripcionProducto ?>
                    </div>
            </div>
            <div class="line-bottom">
                <div class="descripcion-grid text-truncate">
                    <span><?php echo $data->presentacionProducto; ?></span> &nbsp;&nbsp;
                </div>
                <div class="descripcion-lineal" style="display:none">
                    <?php echo $data->presentacionProducto ?>
                </div>
            </div>

             <strong><span>Unidades disponibles: <?php echo $data->saldosDisponibles?></span></strong>

            <!-- Precio del producto -->
            <?php if ($objPrecio->inicializado()): ?>
                <?php if ($data->mostrarAhorroVirtual == 1 && $objPrecio->getAhorro(Precio::PRECIO_UNIDAD) > 0 && $this->objCiudadSectorOrigen->objCiudad->excentoImpuestos != 1): ?>
                    <div class="prices_status">
                        <table style="margin-top: 0px; width: 100%;">
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
                    <div class="price text-center" style="margin-top:0px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
                <?php endif; ?>
                <?php if ($objPrecio->getFlete() > 0): ?>
                    <p>Flete: <span> <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getFlete(), Yii::app()->params->formatoMoneda['moneda']); ?>]</span></p>
                <?php endif; ?>
                <?php if ($objPrecio->getTiempoEntrega() > 0): ?>
                    <p> Tiempo de entrega: <span> <?php echo $objPrecio->getTiempoEntrega() ?> horas</span></p>
                <?php endif; ?>
            <?php  else:?>
                <div class="row">
	                    <div class="col-xs-6 ">
	                    	<?php echo CHtml::link('<div class="btn btn-primary btn-block btn-xs">Precio No disponible</div>', '#', array()); ?>
	                    </div>
	            </div>
            <?php endif; ?>
            <?php if ($data->saldosDisponibles):?>
            	<div class="row">
	                <div class="col-xs-12 ">
	                  	<?php echo CHtml::link('<div class="btn btn-primary btn-block btn-xs">Ver producto</div>', CController::createUrl('/puntoventa/venta/ventaasistida/catalogo/producto', array('producto' => $data->codigoProducto, 'descripcion' => $data->getCadenaUrl())), array()); ?>
	                </div>
	             </div>
		     <?php else:?>
		     <div class="row">
	              <div class="col-xs-12 ">
	                	<?php echo CHtml::link('<div class="btn btn-primary btn-block btn-xs">Producto no disponible</div>', '#', array()); ?>
	              </div>
	          </div>
             <?php endif;?>
        </div>
            <div class="iconos_right">
                 <!-- puntos  -->
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
            </div>
    </div>
</li>
