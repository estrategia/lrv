<?php if(isset($vista)):?>
    <?php if($vista == "relacionado"):?>
        <div class="col-md-12 border-left">
    <?php elseif($vista == "comparacion"):?>
            <div class="col-md-2 border-left" id="comparacion-producto-<?php echo $data->codigoProducto?>">
    <?php endif;?>
<?php else:?>    
    <div class="col-md-3 border-left" >
<?php endif;?>
      
	<div class="col-md-12 content-txt2">
                        
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
                                                                        'name'=> (isset($vista) && $vista == "comparacion")?'rating_calificacion_'.$data->codigoProducto:'rating_'.$data->codigoProducto,
                                                                        'value'=>floor($data->calificacion),
                                                                        'minRating'=>1,
                                                                        'maxRating'=>5,
                                                                        'starCount'=>5,
                                                                        'readOnly'=>true,
                                                                        'htmlOptions' => array(
                                                                                'class' => (isset($vista) && $vista == "comparacion")?'calificacion-comparar':'')
                                                                        )); 
                                                        ?> 
                                                        <?php   if($data->objCodigoEspecial->rutaIcono !=""):?>
                                                                    <a class='pop_codigo img-responsive product-prom' role="button" data-toggle="popover" title="" data-content="<?php echo $data->objCodigoEspecial->descripcion?>" >
                                                                        <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial']."/".$data->objCodigoEspecial->rutaIcono?>"/>
                                                                    </a>
                                                        <?php endif;?>    
                                                    </div>
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
                                                        </div>
                                                        <?php else: ?>
                                                                 <div class="price" style="padding-bottom:1em;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
                                                        <?php endif; ?>
                                                        <?php if ($objPrecio->getFlete() > 0): ?>
                                                                 <p>Flete: <span> <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getFlete(), Yii::app()->params->formatoMoneda['moneda']); ?>]</span></p>
                                                        <?php endif; ?>
                                                        <?php if ($objPrecio->getTiempoEntrega() > 0): ?>
                                                                 <p> Tiempo de entrega: <span> <?php echo $objPrecio->getTiempoEntrega() ?> horas</span></p>
                                                        <?php endif; ?>
                                                       
                                                <?php endif;?>
                                       </div>
                                    <?php if($data->fraccionado==1):?>
                                        <br/> PRODUCTO FRACCIONADO
                                    <?php endif;?> 
                                    <?php if($data->ventaVirtual==1):?>
                                        <!-- <?php echo $objProducto['codigoProducto']?> -->
                                        <div class="col-md-12">
                                            <button class="col-md-3" style="border:0px solid;" data-role="disminuir-cantidad" id="disminuir-unidad-<?php echo $data->codigoProducto ?>" data-producto="<?php echo $data->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD)?>" type="button"><span style="color:red" class="glyphicon glyphicon-minus"></span></button>
                                             <div class="col-md-6 ressete">
                                                <input id="cantidad-producto-unidad-<?php echo $data->codigoProducto ?>" class="increment" type="text" onchange="validarCantidadUnidad(<?php echo $data->codigoProducto ?>,<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD)?>)" maxlength="3" value="1" data-total="700"/>
                                             </div>
                                                <button class="col-md-3" style="border:0px solid;" data-role="aumentar-cantidad"  id="aumentar-unidad-<?php echo $data->codigoProducto ?>" data-producto="<?php echo $data->codigoProducto ?>" data-precio="<?= $objPrecio->getPrecio(Precio::PRECIO_UNIDAD)?>" type="button"><span style="color:red" class="glyphicon glyphicon-plus"></span></button>
                                        </div>
                                        <div class="col-md-12">
                                            <?php echo CHtml::link('<div class="button">Añadir <img src="'.Yii::app()->baseUrl.'/images/desktop/button-carrito.png" alt=""></div>', '#', array('data-producto' => $data->codigoProducto, 'data-cargar' => 1)); ?>
                                        </div>
                                        <div class="col-md-12">	
                                            <a href="#" data-tipo="1" data-role="lstpersonalguardar" data-codigo="<?php echo $data->codigoProducto?>">
                                                    <div class="button-lista"   >Añadir a lista&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </div>
                                            </a>
                                        </div>
                                        
                                        <?php if(isset($vista) && $vista == "comparacion"):?>
                                            <div class="col-md-12 btnQuitarComparar">
                                                <?php echo CHtml::link('<div class="button">Quitar elemento <img src="'.Yii::app()->baseUrl.'/images/desktop/carrito-amarillo.png" alt=""></div>', '#', array('data-producto' => $data->codigoProducto, 'data-role' => 'quitarComparar')); ?>
                                            </div>
                                        <?php elseif(!isset($vista)):?>
                                            <div class="col-md-12 btnComparar">
                                                <?php echo CHtml::link('<div class="button">Comparar <img src="'.Yii::app()->baseUrl.'/images/desktop/carrito-amarillo.png" alt=""></div>', '#', array('data-producto' => $data->codigoProducto, 'data-role' => 'comparar')); ?>
                                            </div>
                                        <?php endif;?>
                                    <?php else:?>
                                         <div class="col-md-12">
                                            <?php echo CHtml::link('<div class="button">Ver producto</div>', CController::createUrl('/catalogo/producto', array('producto' => $data->codigoProducto))); ?>
                                         </div>
                                    <?php endif;?>    
        </div>  
</div>