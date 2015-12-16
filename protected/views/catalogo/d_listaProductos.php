<?php $cantidadItems = isset($cantidadItems) ? $cantidadItems : 4 ?>
<div class="space-1"></div>
<div class="container-fluid">
    <div class="row">
        <!-- Menu de ordenamiento -->

        <!-- Menu de filtros -->
        <?php if (isset($formFiltro) || isset($formOrdenamiento)): ?>
            <div class="col-md-2 menu-categorias cat-collapsables">
                <h3>Filtrar por:</h3>
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
                    <?php if ($imagenBusqueda != null): ?>
                        <p align="center"><img alt="lo sentimos no se han encontrado resultados" src="<?php echo Yii::app()->request->baseUrl . $imagenBusqueda; ?>" class="ajustada"></p>
                    <?php else: ?>
                        <?php if ($dataprovider != null /* && !empty($dataprovider->getData()) */): ?> 
                            <div class="option-list">
                                Productos por página
                                <select name="items-page" class="form-control"id="items-page" onchange="actualizarNumerosPagina()">
                                    <?php foreach (Yii::app()->params->busqueda['productosPorPagina'] as $pagina): ?>
                                        <option value="<?php echo $pagina ?>" <?php echo (($dataprovider != null && $dataprovider->getPagination()->getPageSize() == $pagina) ? "selected" : "") ?>><?php echo $pagina ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>  
                            <div class="btn-group viewsList">
                                <button class="btn-white btn" data-role="tipovista-listaproductos" data-active="true" data-type="cuadricula" type="button"><span  class="glyphicon glyphicon-th" alt="Cuadricula"></span></button>
                                <button class="btn-white btn" data-role="tipovista-listaproductos" data-active="false" data-type="lineal" type="button"><span  class="glyphicon glyphicon-th-list" alt="Cuadricula"></span></button>
                            </div>
                            <div class="option-list ordering_item">
                                Ordenar por
                                <select class="form-control" id="items-page">
                                    <option value="0">Precio Ascendente</option>
                                    <option value="">Precio Descendente</option>
                                    <option value="">Nombre</option>
                                    <option value="">Presentación</option>
                                    <option value="">Ninguno</option>
                                </select>
                            </div>
                        <?php endif; ?>   
                    <?php endif; ?> 
                    <div class="clear"></div>
                </div>
            </div>
            <br/>

            <?php if ($dataprovider != null): ?> 
                <?php if ($listCombos != null): ?>
                    <div id="slide-combos" class="owl-carousel slide-productos">
                        <?php foreach ($listCombos as $objCombo): ?>
                            <div class="item">
                                <?php
                                $this->renderPartial('_d_comboElemento', array(
                                    'objCombo' => $objCombo,
                                    'objPrecio' => new PrecioCombo($objCombo),
                                ));
                                ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <div id="lista-productos" class="list_cuadricula">
                    <section>
                        <?php
                        $this->widget('zii.widgets.CListView', array(
                            'id' => 'id-productos-list',
                            'dataProvider' => $dataprovider,
                            //'template' => "{items}\n{pager}",
                            //'summaryText' => "{start} - {end} из {count}",
                            'template' => "{summary}<ul class='listaProductos'>{items}</ul><div class='clear'></div>{pager}",
                            'itemsCssClass' => "items items$cantidadItems",
                            'itemView' => '_d_productoElemento',
                            'beforeAjaxUpdate' => new CJavaScriptExpression("function() {Loading.show();}"),
                            'afterAjaxUpdate' => new CJavaScriptExpression("function(id,data) { Loading.hide(); raty();$('[data-toggle=\"popover\"]').popover();  listaProductoVistaActualizar();}"),
                            'pager' => array('class' => 'CLinkPager', 'header' => ''),
                        ));
                        ?>
                    </section>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php if (isset($listModulos)): ?>
    <?php
    $this->renderPartial('/contenido/d_modulos', array(
        'listModulos' => $listModulos
    ));
    ?>

<?php endif; ?>  
