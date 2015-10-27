<div class="space-3"></div>

<div class="row">
    <!-- Menu de ordenamiento -->

    <!-- Menu de filtros -->
    <?php if (isset($formFiltro) || isset($formOrdenamiento)): ?>
        <div class="col-md-2 menu-categorias cat-collapsables">
            <?php if (isset($formFiltro)): ?>
                <div class="panel-group" id="accordion-filtros" role="tablist" aria-multiselectable="true">
                    <?php $this->renderPartial('_d_formFiltro', array('formFiltro' => $formFiltro, 'tipoBusqueda' => $tipoBusqueda)); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($formOrdenamiento)): ?>
                <div class="panel-group" id="accordion-ordenamiento" role="tablist" aria-multiselectable="true">
                    <?php $this->renderPartial('_d_formOrdenamiento', array('formOrdenamiento' => $formOrdenamiento, 'objSectorCiudad' => $objSectorCiudad)); ?>
                </div>
            <?php endif; ?>

        </div>
    <?php endif; ?>

    <div class="col-md-<?php echo (isset($formFiltro) || isset($formOrdenamiento)) ? "10" : "12" ?> side">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8">
                </div>

                <?php if ($imagenBusqueda != null): ?>
                    <img src="<?php echo Yii::app()->request->baseUrl . $imagenBusqueda; ?>" class="ajustada">
                <?php endif; ?>
                <?php if (count($listProductos) + count($listCombos) > 0): ?>   
                    <div class="col-md-2">    
                        <div class="option-list">
                            <select name="items-page" class="form-control"id="items-page" onchange="actualizarNumerosPagina()">
                                <option value="5">5</option>
                                <option value="10" selected="">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">    
                        <div class="btn-group">
                            <button class="btn-white btn" data-type="cuadricula" type="button"><span  class="glyphicon glyphicon-th" alt="Cuadricula"></span></button>
                            <button class="btn-white btn" data-type="lineal" type="button"><span  class="glyphicon glyphicon-th-list" alt="Cuadricula"></span></button>
                        </div>
                    </div>
                <?php endif; ?>    
                <div class="clear"></div>
            </div>
        </div>
        <br/>

        <?php if ($dataprovider === null): ?>
            <span class="empty">Seleccionar ciudad para obtener lista de productos</span>
        <?php else: ?>

            <?php foreach ($listCombos as $objCombo): ?>
                <li class="c_list_prod">
                    <div class="ui-field-contain clst_prod_cont">
                        <?php
                        $this->renderPartial('_d_comboElemento', array(
                            'objCombo' => $objCombo,
                            'objPrecio' => new PrecioCombo($objCombo),
                        ));
                        ?>
                    </div>
                </li>
            <?php endforeach; ?>
            <div id="lista-productos" class="list_cuadricula">
                <section>
                    <div class="col-md-12">
                        <div class="row">

                            <ul class="listaProductos">
                                <?php
                                $this->widget('zii.widgets.CListView', array(
                                    'id' => 'id-productos-list',
                                    'dataProvider' => $dataprovider,
                                    //'template' => "{items}\n{pager}",
                                    //'summaryText' => "{start} - {end} из {count}",
                                    'template' => "{summary}<div class='col-md-12'>{items}</div><br/><br/><div class='col-md-12'>{pager}</div>",
                                    'itemView' => '_d_productoElemento',
                                    'beforeAjaxUpdate' => new CJavaScriptExpression("function() {/*loadingClass(2); Loading.show();*/}"),
                                    'afterAjaxUpdate' => new CJavaScriptExpression("function(id,data) { /*Loading.hide(); */$('span[id^=\'rating_\'] > input').rating({'readOnly':true});$('.pop_codigo').popover();}"),
                                    'pager' => array('class' => 'CLinkPager', 'header' => ''),
                                ));
                                ?>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        <?php endif; ?>
    </div>
</div>

  <?php if(isset($modulos)):?>
                <?php $this->renderPartial('/sitio/d_modulosTienda', array(
                            'modulosTienda' => $modulos
                ));?>
                
        <?php endif;?>  
