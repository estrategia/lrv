<?php $this->pageTitle = Yii::app()->name . " - " . $objProducto->descripcionProducto; ?>

<div class="ui-content c_cont_detail_prod">
    <h1><?php echo $objProducto->descripcionProducto ?></h1>
    <h2><?php echo $objProducto->presentacionProducto ?></h2>
    <h2>Código: <?php echo $objProducto->codigoProducto ?></h2>
    <?php foreach ($objPrecio->getPuntosDescripcion() as $descripcionPunto): ?>
        <h2 class="left"><span class="label label-primary"><?= $descripcionPunto ?></span></h2>
    <?php endforeach; ?>
    <div class="cdt_prod_spc"></div>
    
    <?php if ($objPrecio->getFlete() > 0): ?>
        <h3>Flete: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getFlete(), Yii::app()->params->formatoMoneda['moneda']); ?></h3>
    <?php endif; ?>
    <?php if ($objPrecio->getTiempoEntrega() > 0): ?>
        <h3>Tiempo de entrega: <?php echo $objPrecio->getTiempoEntrega() ?> horas</h3>
    <?php endif; ?>

    <!-- <div class="cdt_line_spc"><span></span></div>-->

    <?php if ($objPrecio->tieneBeneficio()): ?>
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
    <div id="owl-productodetalle-<?php echo $objProducto->codigoProducto ?>" class="owl-carousel owl-theme owl-productodetalle">
        <?php $listImagenes = $objProducto->listImagenesGrandes() ?>
        <?php if (empty($listImagenes)): ?>
            <div class="item"><img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->producto['noImagen']['grande']; ?>" alt="<?php echo $objProducto->descripcionProducto ?>" title="<?php echo $objProducto->descripcionProducto ?>"></div>
        <?php else: ?>
            <?php foreach ($listImagenes as $imagen): ?>
                <div class="item"><img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['grande']] . $imagen->rutaImagen; ?>" alt="<?php echo $imagen->nombreImagen ?>" title="<?php echo $imagen->tituloImagen ?>"></div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="cdt_line_spc"><span></span></div>

    <?php if (!in_array($objProducto->idUnidadNegocioBI, Yii::app()->params->calificacion['categoriasNoCalificacion'])): ?>
        <div id="raty-lectura-producto-<?php echo $objProducto->codigoProducto ?>" data-role="raty" data-readonly="true" data-score="<?php echo $objProducto->getCalificacion() ?>" class="clst_cal_str"></div>
        <?php $calificacion = $objProducto->getCalificacion(true) ?>
        <div><strong>Total votos:</strong> <?php echo $calificacion['votos'] ?></div>
        <div><strong>Votación:</strong> <?php echo $calificacion['calificacion'] ?></div>
        <?php if (Yii::app()->user->isGuest): ?>
            <p class="txt_inise_cal_stars">Iniciar sesión para calificar este producto</p>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ($objPrecio->inicializado()): ?>
        <?php if ($objProducto->fraccionado == 1): ?>
            <table  class="ui-responsive ctbl_prod_frc">
                <thead class="ctbl_head">
                    <tr>
                        <th>
                <div class="ctbl_presentacion">
                    <label data-icon="false" class="ctbl_chk_lb"><?php echo $objProducto->presentacionProducto ?></label>
                </div>
                </th>
                <th align="right">
                <div class="frc_btn_cant">
                    <input type="number" placeholder="0" value="0" id="cantidad-producto-unidad-<?php echo $objProducto->codigoProducto ?>" onchange="subtotalParcialProductoFraccion(<?php echo $objProducto->codigoProducto ?>,<?php echo $objProducto->numeroFracciones ?>,<?php echo $objProducto->unidadFraccionamiento ?>);" class="dtl_cant_prod_01">
                </div>
                </th>
                <th>
                <div class="ctbl_subtotal">
                    <span class="txt_sub">Subtotal</span> <span id="subtotal-producto-unidad-<?php echo $objProducto->codigoProducto ?>">$0</span>
                </div>
                </th>
                </tr>
                </thead>
                <tbody>
                    <tr class="ctbl_tl">
                        <td style="text-align:left;">Precio regular</td>
                        <td>Ahorro</td>
                        <td style="text-align:right;"><span>Precio</span></td>
                    </tr>
                    <tr>
                        <td class="txt_pre_lst"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']); ?></td>
                        <td class="txt_ahor"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></td>
                        <td class="txt_pre" align="right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="ui-responsive ctbl_prod_frc ctbl_color_prod_frc">
                <thead class="ctbl_head_g2">
                    <tr>
                        <th>
                <div class="ctbl_presentacion">
                    <label data-icon="false" class="ctbl_chk_lb"><?php echo $objProducto->objMedidaFraccion->descripcionMedidaFraccion ?> X <?php echo $objProducto->unidadFraccionamiento ?></label>                            
                </div>
                </th>
                <th  align="right">
                <div class="frc_btn_cant">
                    <input type="number" placeholder="0" value="0" id="cantidad-producto-fraccion-<?php echo $objProducto->codigoProducto ?>" onchange="subtotalParcialProductoFraccion(<?php echo $objProducto->codigoProducto ?>,<?php echo $objProducto->numeroFracciones ?>,<?php echo $objProducto->unidadFraccionamiento ?>);">
                </div>
                </th>
                <th>
                <div class="ctbl_subtotal">
                    <span class="txt_sub">Subtotal</span> <span id="subtotal-producto-fraccion-<?php echo $objProducto->codigoProducto ?>">$0</span>
                </div>
                </th>
                </tr>
                </thead>
                <tbody>
                    <tr class="ctbl_tl">
                        <td style="text-align:left;">Precio regular</td>
                        <td>Ahorro</td>
                        <td style="text-align:right;"><span>Precio</span></td>
                    </tr>
                    <tr>
                        <td class="txt_pre_lst"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_FRACCION, false), Yii::app()->params->formatoMoneda['moneda']); ?></td>
                        <td class="txt_ahor"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_FRACCION), Yii::app()->params->formatoMoneda['moneda']); ?></td>
                        <td class="txt_pre" align="right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_FRACCION), Yii::app()->params->formatoMoneda['moneda']); ?></td>
                    </tr>
                </tbody>
            </table>

            <div class="cprod_frc_total">Total: <span id="total-producto-<?php echo $objProducto->codigoProducto ?>">$0</span></div>

        <?php else: ?>
            <div class="ccont_dtl_prod">
                <div class="cdtl_prod_pr">
                    <?php if ($objProducto->mostrarAhorroVirtual == 1 && $objPrecio->getPorcentajeDescuento() > 0): ?>
                        <table class="ui-responsive ctbl_prod_frc table-precios">
                            <tbody>
                                <tr class="ctbl_tl">
                                    <td style="text-align:left;">Precio regular</td>
                                    <td>Ahorro</td>
                                    <td style="text-align:right;"><span>Precio</span></td>
                                </tr>
                                <tr>
                                    <td class="txt_pre_lst"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']); ?></td>
                                    <td class="txt_ahor"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></td>
                                    <td class="txt_pre" align="right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <div class="cdt_txt_alg">Precio: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
                    <?php endif; ?>
                </div>
                <div class="cdtl_pro_cant">
                    <div class="cbtn_prod_cant_02"><input type="number" placeholder="0" value="1" id="cantidad-producto-unidad-<?php echo $objProducto->codigoProducto ?>" onchange="subtotalUnidadProducto(<?php echo $objProducto->codigoProducto ?>);"></div>
                    <div class="cpro_total_02"><span class="txt_cant_total">Total</span> <span id="subtotal-producto-unidad-<?php echo $objProducto->codigoProducto ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
                    <?php if ($objProducto->objImpuesto != null && $objProducto->objImpuesto->codigoImpuesto != 0 && $objProducto->objImpuesto->codigoImpuesto != 20): ?>
                        <?php if ($objSectorCiudad == null || ($objSectorCiudad != null && $objSectorCiudad->objCiudad->excentoImpuestos == 0)): ?>
                            <p class="txt_cant_incl">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objProducto->objImpuesto->porcentaje) ?> de impuestos</p>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="clear"></div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ($objProducto->ventaVirtual == 1): ?>
        <?php if ($objSectorCiudad == null): ?>
            <?php echo CHtml::link('Consultar precio', '#popup-consultarprecio', array('data-rel' => "popup", 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r')); ?>
        <?php else: ?>
            <?php echo CHtml::link('Añadir al carro', '#', array('data-producto' => $objProducto->codigoProducto, 'data-cargar' => 1, 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r btn_frc_add_car')); ?>
        <?php endif; ?>

        <?php if (!Yii::app()->user->isGuest): ?>
            <?php echo CHtml::link('Guardar en la lista personal', '#', array('data-role' => 'lstpersonalguardar', 'data-tipo' => 1, 'data-codigo' => $objProducto->codigoProducto, 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n btn_add_lst_pr')); ?>
        <?php endif; ?>
    <?php else: ?>
        <div>Este producto lo puede adquirir en nuestros puntos de venta autorizados.</div>
    <?php endif; ?>

    <?php if ($objProducto->ventaVirtual == 0): ?>
        <div data-role="collapsible" data-iconpos="right" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-theme="r">
            <h3>Puntos de venta disponibles</h3>
            <ul data-role="listview" data-inset="false" data-icon="false" class="cdtl_ptos_venta">
                <?php if (empty($listaPuntoVenta)): ?>
                    <li><p>No hay puntos de venta autorizados</p></li>
                <?php else: ?>
                    <?php foreach ($listaPuntoVenta as $objPuntoVenta): ?>
                        <li>
                            <p><?php echo $objPuntoVenta->nombrePuntoDeVenta ?></p>
                            <p><?php echo $objPuntoVenta->direccionPuntoDeVenta ?></p>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="cdtl_div_ln"></div>

    <?php ProductoView::generarDetalle($objProducto->objDetalle) ?>

    <div class="cdtl_div_ln"></div>

    <?php if (!in_array($objProducto->idUnidadNegocioBI, Yii::app()->params->calificacion['categoriasNoCalificacion'])): ?>
        <div data-role="collapsible" data-iconpos="right" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" class="c_cont_com_prod ui-nodisc-icon ui-alt-icon">
            <h3>Comentarios del producto</h3>
            <ul data-role="listview" data-inset="false" data-icon="false">
                <?php $contadorCalificacion = 0; ?>
                <?php foreach ($objProducto->listCalificaciones as $objComentario): ?>
                    <?php if ($objComentario->aprobado == 1): ?>
                        <?php $contadorCalificacion++; ?>
                        <li class="cdtl_coment">
                            <h3><?php echo $objComentario->objUsuario->nombre ?></h3>
                            <div class="cdtl_coment_img">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/icons_comments.png">
                            </div>
                            <div class="cdtl_coment_txt">                            
                                <p> 
                                    <?php echo $objComentario->comentario ?>
                                </p>
                            </div>
                        </li>
                    <?php elseif ($objComentario->aprobado == 0 && $objComentario->identificacionUsuario == Yii::app()->user->name): ?>
                        <?php $contadorCalificacion++; ?>
                        <li class="cdtl_coment">
                            <h3><?php echo $objComentario->objUsuario->nombre ?> <strong>(Pendiente de revisión)</strong></h3>
                            <div class="cdtl_coment_img">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/icons_comments.png">
                            </div>
                            <div class="cdtl_coment_txt">                            
                                <p> 
                                    <?php echo $objComentario->comentario ?>
                                </p>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php if ($contadorCalificacion <= 0): ?>
                    <li class="cdtl_coment">
                        <p> 
                            Nadie ha calificado este producto aún
                        </p>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <?php if (!Yii::app()->user->isGuest): ?>
            <?php if ($objCalificacion == null): ?>
                <form id="form-calificacion-producto-<?php echo $objProducto->codigoProducto ?>">
                    <label for="calificacion-titulo-<?php echo $objProducto->codigoProducto ?>" class="ui-hidden-accessible cdtl_coment_titulo">Título:</label>
                    <input type="text" id="calificacion-titulo-<?php echo $objProducto->codigoProducto ?>" placeholder="Título" class="cdtl_input_titulo" maxlength="70">
                    <label for="calificacion-comentario-<?php echo $objProducto->codigoProducto ?>" class="ui-hidden-accessible">Comentario:</label>
                    <textarea data-countchar='div-comentario-contador' id="calificacion-comentario-<?php echo $objProducto->codigoProducto ?>" placeholder="Comentario" maxlength="250" class="cdtl_textarea_coment" style="border:1px solid #e4e4e4;"></textarea>
                    <div class="maxCaract">[Máximo 250 caracteres] <span id="div-comentario-contador"></span></div>
                    <div id="calificacion-raty-<?php echo $objProducto->codigoProducto ?>" data-role="raty" data-readonly="false" data-score="0" class="clst_cal_str"></div>
                    <button data-role="calificacion" data-producto="<?php echo $objProducto->codigoProducto ?>" class="ui-btn ui-corner-all ui-shadow cdtl_button_calf">Agregar comentario</button>
                </form>
            <?php else: ?>
                <table class="ui-responsive">
                    <tr>
                        <td>Tu calificación:</td>
                        <td><div id="calificacion-raty-<?php echo $objProducto->codigoProducto ?>" data-role="raty" data-readonly="true" data-score="<?php echo $objCalificacion->calificacion ?>"></div></td>
                    </tr>
                    <tr>
                        <td colspan="2">Puedes volver a calificar dentro de <?php echo $objCalificacion->getDiferencia()->format('%h horas y %i minutos'); ?></td>
                    </tr>
                </table>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ($objProducto->codigoEspecial !== null && $objProducto->codigoEspecial != 0): ?>
        <div class="cdt_line_spc"><span></span></div>
        <p class="cdtl_prod_txt_ley">
            <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial'] . $objProducto->objCodigoEspecial->rutaIcono; ?>" >
            <?php echo $objProducto->objCodigoEspecial->descripcion ?>
        </p>
    <?php endif; ?>
</div>
<?php if (!empty($listRelacionados)): ?>
    <div class="productosRelacionados ui-content">
        <h2>Productos Relacionados</h2>
        <div id="slide-relacionados" class="owl-carousel owl-theme">
            <?php foreach ($listRelacionados as $objRelacionado): ?>
                <div class="item"><?php
                    $this->renderPartial('_productoSlide', array(
                        'objProducto' => $objRelacionado->objProductoRelacionado,
                        'objPrecio' => new PrecioProducto($objRelacionado->objProductoRelacionado, $objSectorCiudad, $codigoPerfil),
                            //'objSectorCiudad' => $objSectorCiudad,
                            //'codigoPerfil' => $codigoPerfil
                    ));
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<?php if ($objSectorCiudad == null): ?>
    <div data-role="popup" id="popup-consultarprecio" data-dismissible="false" data-theme="a" data-position-to="window" class="c_lst_pop_cont">
        <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
        <div data-role="main">
            <div data-role="content">
                <h2>Seleccionar ubicación para consultar precio</h2>
                <?php echo CHtml::link('Seleccionar ubicación', $this->createUrl('/sitio/ubicacion'), array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n', 'data-mini' => 'true', 'data-ajax' => 'false')); ?>
                <?php echo CHtml::link('Cerrar', '#', array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r', 'data-mini' => 'true', 'data-rel' => 'back')); ?>
            </div>
        </div>
    </div>
<?php endif; ?>


