<div class="ui-content no-padding-bottom no-padding-top">
    <h1 class="ct_result"><?= count($listProductos) + count($listCombos) ?> resultados para <?= $nombreBusqueda ?></h1>
</div>

<div class="ui-content no-padding-top" style="margin-top: -5px">
    <?php //if(isset($formFiltro) || isset($formOrdenamiento)):?>
        <div class="ccont_filtro">
            <div class="left">
                <a href="<?php echo $this->createUrl("/sitio/categorias") ?>" data-ajax="false">
                    <img src="<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_categorias.png" alt="Categorias" title="Categorias" >
                </a>
            </div>
            <div class="right">
                <?php if (isset($formFiltro)): ?>
                    <a href="#panel-filtro">
                        <img src="<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_filtrar.png" alt="Filtrar" >
                    </a>
                <?php endif; ?>

                <?php if (isset($formOrdenamiento)): ?>
                    <a href="#panel-ordenamiento">
                        <img src="<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_ordenar.png" alt="Ordenar">
                    </a>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="clear"></div>
    <?php //endif;?>
    <?php if ($imagenBusqueda != null): ?>
        <img src="<?php echo Yii::app()->request->baseUrl . $imagenBusqueda; ?>" class="ajustada">
    <?php endif; ?>

    <ul data-role="listview" data-inset="true" data-icon="false" class="c_list_prod_cont" style="margin-top: -1px">
        <?php foreach ($listCombos as $objCombo): ?>
            <li class="c_list_prod combo_list_item">
                <div class="ui-field-contain clst_prod_cont">
                    <?php
                    $this->renderPartial('_comboElemento', array(
                        'objCombo' => $objCombo,
                        'objPrecio' => new PrecioCombo($objCombo),
                        'vista' => 'listaCatalogo',
                    ));
                    ?>
                </div>
            </li>
        <?php endforeach; ?>
        <?php foreach ($listProductos as $objProducto): ?>
            <li class="c_list_prod">
                <div class="ui-field-contain clst_prod_cont">
                    <?php
                    $this->renderPartial('_productoElemento', array(
                        'objProducto' => $objProducto,
                        'objPrecio' => new PrecioProducto($objProducto, $objSectorCiudad, $codigoPerfil),
                        'vista' => 'listaCatalogo',
                    ));
                    ?>
                </div>
                <?php if ($objProducto->ventaVirtual == 0): ?>
                    <div data-role="popup" id="popup-carro-controlada-<?php echo $objProducto->codigoProducto ?>" data-dismissible="false" data-position-to="window" data-theme="a" class="c_lst_pop_cont">
                        <div data-role="main">
                            <div data-role="content">
                                Este producto requiere venta controlada. Por favor ver detalle del producto para mayor información.
                                <?php echo CHtml::link('Ver detalle', CController::createUrl('/catalogo/producto', array('producto' => $objProducto->codigoProducto,'descripcion'=>  Producto::cadenaUrl($objProducto->descripcionProducto))), array('data-ajax' => "false", 'class' => 'ui-btn ui-corner-all ui-shadow cprod_add_car_spcl')); ?>
                                <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow cprod_canc_spcl">Cancelar</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php if (!empty($msgCodigoEspecial)): ?>
        <table class="codEspecial">
            <tbody>
                <?php foreach ($msgCodigoEspecial as $especial): ?>
                    <tr>
                        <td><img class="icon_codigo_especial" src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial'] . $especial->rutaIcono; ?>" ></td>
                        <td><?php echo $especial->descripcion ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php if (isset($formOrdenamiento)) $this->extraContentList[] = $this->renderPartial('_formOrdenamiento', array('formOrdenamiento' => $formOrdenamiento, 'objSectorCiudad' => $objSectorCiudad), true); ?>
<?php if (isset($formFiltro)) $this->extraContentList[] = $this->renderPartial('_formFiltro', array('formFiltro' => $formFiltro, 'tipoBusqueda' => $tipoBusqueda), true); ?>

<?php foreach ($listCodigoEspecial as $especial): ?>
    <div data-role="popup" id="popup-especial-<?php echo $especial->codigoEspecial ?>" data-dismissible="false" data-theme="a" data-position-to="window" class="c_lst_pop_cont">
        <!-- <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a> -->
        <div data-role="main">
            <div data-role="content">
                <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial'] . $especial->rutaIcono; ?>" >
                <p><?php echo $especial->descripcion ?></p>
            </div>
        </div>
        <div data-role="footer">
            <!-- <a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-r" data-rel="back">Cerrar</a> -->
            <?php echo CHtml::link('Cerrar', '#', array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-r', 'data-mini' => 'true', 'data-rel' => 'back')); ?>
        </div>
    </div>
<?php endforeach; ?>

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
