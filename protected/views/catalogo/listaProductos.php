<div class="ccont_filtro">
    <?php if (isset($formFiltro)): ?>
        <a href="#panel-filtro">
            <img src="<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_filtrar.png" onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_filtrar_activo.png'" onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_filtrar.png'" >
        </a>
    <?php endif; ?>

    <?php if (isset($formOrdenamiento)): ?>
        <a href="#panel-ordenamiento">
            <img src="<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_ordenar.png" onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_ordenar_activo.png'" onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_ordenar.png'">
        </a>
    <?php endif; ?>
</div>

<div class="ui-content">
    <!-- <img src="<?php echo Yii::app()->request->baseUrl . $imagenBusqueda; ?>" class="center" style="display: block;width: 80%;height: auto;"> -->
    <div>
        <h3 class="ct_result" style="color:#b40000; font-weight: 700;">Resultados de búsqueda</h3>
        <p class="cp_result"><?= count($listProductos) + count($listCombos) ?> resultados</p>
    </div>

    <?php if ($imagenBusqueda != null): ?>
        <img src="<?php echo Yii::app()->request->baseUrl . $imagenBusqueda; ?>" class="ajustada">
    <?php endif; ?>

    <ul data-role="listview" data-inset="true" data-icon="false" class="c_list_prod_cont">
        <?php foreach ($listCombos as $objCombo): ?>
            <li class="c_list_prod">
                <div class="ui-field-contain clst_prod_cont">
                    <?php
                    $this->renderPartial('_comboElemento', array(
                        'objCombo' => $objCombo,
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
                        'objSectorCiudad' => $objSectorCiudad,
                        'codigoPerfil' => $codigoPerfil,
                    ));
                    ?>
                </div>
                <?php if ($objProducto->ventaVirtual == 0): ?>
                    <div data-role="popup" id="popup-carro-controlada-<?php echo $objProducto->codigoProducto ?>" data-dismissible="false" data-position-to="window" data-theme="a" class="c_lst_pop_cont">
                        <div data-role="main">
                            <div data-role="content">
                                Este producto requiere venta controlada. Por favor ver detalle del producto para mayor información.
                                <?php echo CHtml::link('Ver detalle', CController::createUrl('/catalogo/producto', array('producto' => $objProducto->codigoProducto)), array('data-ajax' => "false", 'class' => 'ui-btn ui-corner-all ui-shadow cprod_add_car_spcl')); ?>
                                <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow cprod_canc_spcl">Cancelar</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php if (!empty($msgCodigoEspecial)): ?>
        <table>
            <tbody>
                <?php foreach ($msgCodigoEspecial as $especial): ?>
                    <tr>
                        <td><img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial'] . $especial->rutaIcono; ?>" ></td>
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
            <!-- <a href="#" data-rel="back">Cerrar</a> -->
        </div>
        <div data-role="footer">
            <a href="#" data-rel="back">Cerrar</a>
        </div>
    </div>
<?php endforeach; ?>