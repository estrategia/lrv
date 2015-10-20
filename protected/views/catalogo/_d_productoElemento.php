<!-- descuento -->
<?php /* if ($objPrecio->tieneBeneficio()): ?>
    <div class="cdiv_prod_desc">
        <div class="c_prod_desc">
            <p><?php echo $objPrecio->getPorcentajeDescuento() ?> % <span>dcto</span></p>
        </div>
    </div>
<?php endif; ?>

<?php if ($objProducto->fraccionado == 1): ?>
    <div class="cdiv_prod_frc">
        <div class="c_prod_frc">
            <p class="">Producto fraccionado</p>
        </div>
    </div>
<?php endif; ?>
<div style="clear:both;"></div>
<div class="clst_cont_top">
    <?php $imagen = $objProducto->objImagen(YII::app()->params->producto['tipoImagen']['mini']); ?>

    <?php if ($imagen == null): ?>
        <div class="">
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $objProducto->codigoProducto)) ?>" data-ajax="false">
                <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->producto['noImagen']['mini']; ?>" class="ui-li-thumb">
            </a>
        </div>
    <?php else: ?>
        <div class="">
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $objProducto->codigoProducto)) ?>" data-ajax="false">
                <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['mini']] . $imagen->rutaImagen; ?>" class="ui-li-thumb">
            </a>
        </div>
    <?php endif; ?>
    <?php if ($objProducto->codigoEspecial != 0): ?>
        <a href="#popup-especial-<?php echo $objProducto->codigoEspecial ?>" data-rel="popup" class="">
            <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial'] . $objProducto->objCodigoEspecial->rutaIcono; ?>" >
        </a>
    <?php endif; ?>

    <!-- producto seleccionado -->
    <?php if (Yii::app()->shoppingCart->contains($objProducto->codigoProducto)): ?>
        <a href="" class="">
            <img src="<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_seleccionado.png">
        </a>
    <?php endif; ?>
    <!-- producto seleccionado -->
    <div class="space-1"></div>
    <div class="">
        <h4><a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $objProducto->codigoProducto)) ?>" data-ajax="false"><?php echo $objProducto->descripcionProducto ?></a></h4>
        <p><?php echo $objProducto->presentacionProducto ?></p>
        <!-- estrella de calificación -->
        <div id="raty-lectura-producto-<?php echo $objProducto->codigoProducto ?>" data-role="raty" data-readonly="true" data-score="<?php echo $objProducto->getCalificacion() ?>" class=""></div>
        <?php if ($objPrecio->inicializado()): ?>
            <?php if ($objProducto->mostrarAhorroVirtual == 1 && $objPrecio->getAhorro(Precio::PRECIO_UNIDAD) > 0): ?>
                <div class=""><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']); ?></div>
                <div class=""><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?>  <span>[Ahorro <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?>]</span></div>
            <?php else: ?>
                <div class="" style="padding-bottom:1em;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
            <?php endif; ?>

            <?php if ($objPrecio->getFlete() > 0): ?>
                <div>[Flete <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getFlete(), Yii::app()->params->formatoMoneda['moneda']); ?>]</div>
            <?php endif; ?>
                <?php if ($objPrecio->getTiempoEntrega() > 0): ?>
                <div>[Tiempo de entrega <?php echo $objPrecio->getTiempoEntrega() ?> horas]</div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<?php if ($objPrecio->inicializado()): ?>
    <table class="ui-responsive ctable_list_prod">
        <tbody>
            <tr>
                <td class="ctd_01">
                    <input type="number" placeholder="0" id="cantidad-producto-unidad-<?php echo $objProducto->codigoProducto ?>" class="cbtn_cant" onchange="subtotalUnidadProducto(<?php echo $objProducto->codigoProducto ?>);" data-mini="true" value="1">
                </td>
                <td class="ctd_02">
                    <p>Subtotal</p>
                    <p id="subtotal-producto-unidad-<?php echo $objProducto->codigoProducto ?>" style="font-size:medium;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></p>
                </td>
                <td class="ctd_03">
                    <?php if ($objProducto->ventaVirtual == 0): ?>
                        <?php echo CHtml::link('Añadir al carro', "#popup-carro-controlada-$objProducto->codigoProducto", array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-r', 'data-rel' => 'popup', 'data-mini' => 'true')); ?>
                    <?php else: ?>
                        <?php echo CHtml::link('Añadir al carro', '#', array('data-producto' => $objProducto->codigoProducto, 'data-cargar' => 1, 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-r', 'data-mini' => 'true')); ?>
                    <?php endif; ?>
                </td>
            </tr>
        </tbody>
    </table>
<?php endif; ?>
 * 
*/
?>
<?php if(isset($vista)):?>
    <?php if($vista == "relacionado"):?>
        <div class="col-md-12 border-left">
    <?php endif;?>
<?php else:?>    
    <div class="col-md-3 border-left">
<?php endif;?>
	<div class="col-md-12 content-txt2">
                            <?php /*if ($data['tipo_producto'] == Productos::PRODUCTO_ESPECIAL): ?>
                               <img src ="<?php echo Yii::app()->getBaseUrl() . Yii::app()->params->imagenespecial ?>" alt="icono-medida" title="Producto a la medida" class="icon_special"/>
                            <?php endif;*/ ?>
                            <?php
                           /* $class = ($data['tipo_producto'] == Productos::PRODUCTO_ESPECIAL)? "prod-especial": "";
                            echo CHtml::link("<img class='mediana $class' src = '" . ProductosImagenes::imagenPresentacion($data['codigo_producto']) . "' alt = ' " . $data['presentacion_producto'] . "'>", array('/tienda/catalogo/producto', 'id' => $data['codigo_producto']), array('rel' => 'tooltip', 'id' => 'img-list_' . $data['codigo_producto'], 'title' => $data['nombre_producto'], 'data-title' => $data['nombre_producto'], 'data-original-title' => $data['nombre_producto']));
                           */ ?>
                            <?php $objProducto = new Producto(); ?>
                            <?php $objSectorCiudad = null;
                                    if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
                                        $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];
                            ?>        
                            <?php $objPrecio= new PrecioProducto($data, $objSectorCiudad, Yii::app()->shoppingCart->getCodigoPerfil());?>
                            <?php if ($objPrecio->tieneBeneficio()): ?>
                                        <div class="cdiv_prod_desc">
                                            <div class="c_prod_desc">
                                                <p><?php echo $objPrecio->getPorcentajeDescuento() ?> % <span>dcto</span></p>
                                            </div>
                                        </div>
                            <?php endif; ?>
                                    <?php $imagen = $objProducto->objImagenDesktop(YII::app()->params->producto['tipoImagen']['mini'],$data->listImagenes);?>
                                    <?php if ($imagen == null): ?>
                                            <div class="">
                                                <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto)) ?>" data-ajax="false">
                                                    <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->producto['noImagen']['grande']; ?>" class="img-responsive product-prom">
                                                </a>
                                            </div>
                                        <?php else: ?>
                                            <div class="">
                                                <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto)) ?>" data-ajax="false">
                                                    <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['mini']] . $imagen['rutaImagen']; ?>" class="img-responsive product-prom">
                                                </a>
                                            </div>
                                        <?php endif; ?> 
                                        <?php if(!in_array($data->idUnidadNegocioBI, Yii::app()->params->calificacion['categoriasNoCalificacion'])): ?>
                                                <div class="col-md-12" style="text-align:center">
                                                    <div class="ranking-list" > 
                                                        <?php 
                                                            $this->widget('CStarRating',array(
                                                                        'name'=>'rating_'.$data->codigoProducto,
                                                                        'value'=>floor($data->calificacion),
                                                                        'minRating'=>1,
                                                                        'maxRating'=>5,
                                                                        'starCount'=>5,
                                                                        'readOnly'=>true
                                                                        )); 
                                                        ?> 
                                                        <?php   if($data->objCodigoEspecial->rutaIcono !=""):?>
                                                                    <a class='pop_codigo img-responsive product-prom' role="button" data-toggle="popover" title="" data-content="<?php echo $data->objCodigoEspecial->descripcion?>" >
                                                                        <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial']."/".$data->objCodigoEspecial->rutaIcono?>"/>
                                                                    </a>
                                                        <?php endif;?>    
                                                    </div>
                                                   <!-- <a href="#"><i class="star-on" title="5.0"></i></a>
                                                    <a href="#"><i class="star-on" title="5.0"></i></a>
                                                    <a href="#"><i class="star-on" title="5.0"></i></a>
                                                    <a href="#"><i class="star-off" title="5.0"></i></a>
                                                    <a href="#"><i class="star-off" title="5.0"></i></a> -->
                                                </div>
                                        <?php endif;?>
                                        <div class="col-md-12">
                                            <div class="line-bottom">
                                                <p style="min-height: 41px">
                                                    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto)) ?>" title='<?php echo $data->descripcionProducto?>' data-ajax="false">
                                                        <?php if(strlen($data->descripcionProducto)>20):?>
                                                            <?php echo substr($data->descripcionProducto,0,20)."..." ?>
                                                        <?php else:?>
                                                            <?php echo $data->descripcionProducto ?>
                                                        <?php endif;?>
                                                    </a>
                                                </p>  
                                            </div>
                                            <div class="line-bottom">
                                                    <?php if(strlen($data->presentacionProducto)>15):?>
                                                        <span><?php echo substr($data->presentacionProducto,0,14) ?>...</span>
                                                    <?php else:?>
                                                            <?php echo $data->presentacionProducto  ?>
                                                    <?php endif;?>
                                            </div>
                                            <!--    <div class="description"><p><?php echo $data->descripcionProducto ?></p></div> -->
                                            <!-- Precio del producto -->
                                                <?php if($objPrecio->inicializado()): ?>
                                                        <?php if ($data->mostrarAhorroVirtual == 1 && $objPrecio->getAhorro(Precio::PRECIO_UNIDAD) > 0 && $objSectorCiudad->objCiudad->excentoImpuestos!=1): ?>
                                                        <div class=""> 
                                                           <div class="price">
                                                                 <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?>
                                                           </div>
                                                            <p>
                                                                Antes: <span class="strike2"> <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']); ?></span><br/>
                                                                Ahorro: <span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></span>
                                                            </p>
                                                        <?php else: ?>
                                                                 <div class="price" style="padding-bottom:1em;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
                                                        <?php endif; ?>
                                                        <?php if ($objPrecio->getFlete() > 0): ?>
                                                                 <p>Flete: <span> <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getFlete(), Yii::app()->params->formatoMoneda['moneda']); ?>]</span></p>
                                                        <?php endif; ?>
                                                        <?php if ($objPrecio->getTiempoEntrega() > 0): ?>
                                                                 <p> Tiempo de entrega: <span> <?php echo $objPrecio->getTiempoEntrega() ?> horas</span></p>
                                                        <?php endif; ?>
                                                       </div>
                                                      <!--  <div class='price'><?php  echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(), Yii::app()->params->formatoMoneda['moneda']); ?></div>ç
                                                      -->
                                                <?php endif;?>
                                            </div>
                                    <?php if($data->fraccionado==1):?>
                                        <br/> PRODUCTO FRACCIONADO
                                    <?php endif;?> 
                                    <?php if($data->ventaVirtual==1):?>
                                        <!-- <?php echo $objProducto['codigoProducto']?> -->
                                        <div class="col-md-12">
                                            <button class="col-md-3" style="border:0px solid;" id="disminuir-unidad-<?php echo $data->codigoProducto ?>" onclick="disminuirCantidad(<?php echo $data->codigoProducto ?>,<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD)?>)" type="button"><span style="color:red" class="glyphicon glyphicon-minus"></span></button>
                                             <div class="col-md-6 ressete">
                                                <input id="cantidad-producto-unidad-<?php echo $data->codigoProducto ?>" class="increment" type="text" onchange="validarCantidadUnidad(<?php echo $data->codigoProducto ?>,<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD)?>)" maxlength="3" value="1" data-total="700"/>
                                             </div>
                                                <button class="col-md-3" style="border:0px solid;" id="aumentar-unidad-<?php echo $data->codigoProducto ?>" onclick="aumentarCantidad(<?php echo $data->codigoProducto ?>,<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD)?>)" type="button"><span style="color:red" class="glyphicon glyphicon-plus"></span></button>
                                        </div>
                                        <div class="col-md-12">
                                            <?php echo CHtml::link('<div class="button">Añadir <img src="'.Yii::app()->baseUrl.'/images/desktop/button-carrito.png" alt=""></div>', '#', array('data-producto' => $data->codigoProducto, 'data-carro' => 1)); ?>
                                        </div>
                                        <div class="col-md-12">	
                                            <a href="#">
                                                    <div class="button-lista">Añadir a lista&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </div>
                                            </a>
                                        </div>
                                    <?php else:?>
                                         <div class="col-md-12">
                                            <?php echo CHtml::link('<div class="button">Ver producto</div>', CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto))); ?>
                                         </div>
                                    <?php endif;?>    
        </div>
</div>