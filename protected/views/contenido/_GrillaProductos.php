<div class="ui-content no-padding-bottom no-padding-top">
    <h1 class="ct_result"><?php echo $objModulo->descripcion ?></h1>
</div>

<ul data-role="listview" data-inset="true" data-icon="false" class="c_list_prod_cont" style="margin-top: -1px">
    <?php foreach ($objModulo->getListaProductos($this->objSectorCiudad) as $objProducto): ?>
        <li class="c_list_prod combo_list_item">
            <div class="ui-field-contain clst_prod_cont">
                <?php
                $this->renderPartial('/catalogo/_productoElemento', array(
                    'objProducto' => $objProducto,
                    'objPrecio' => new PrecioProducto($objProducto, $this->objSectorCiudad, Yii::app()->shoppingCart->getCodigoPerfil()),
                    'vista' => 'listaCatalogo',
                ));
                ?>
            </div>
            <?php if ($objProducto->ventaVirtual == 0): ?>
                <div data-role="popup" id="popup-carro-controlada-<?php echo $objProducto->codigoProducto ?>" data-dismissible="false" data-position-to="window" data-theme="a" class="c_lst_pop_cont">
                    <div data-role="main">
                        <div data-role="content">
                            Este producto requiere venta controlada. Por favor ver detalle del producto para mayor información.
                            <?php echo CHtml::link('Ver detalle', CController::createUrl('/catalogo/producto', array('producto' => $objProducto->codigoProducto, 'descripcion' => $objProducto->getCadenaUrl())), array('data-ajax' => "false", 'class' => 'ui-btn ui-corner-all ui-shadow cprod_add_car_spcl')); ?>
                            <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow cprod_canc_spcl">Cancelar</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>

<?php if ($this->objSectorCiudad == null): ?>
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