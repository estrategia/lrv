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
                        <?php $this->renderPartial('_formFiltro', array('formFiltro' => $formFiltro)); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="col-md-<?php echo (isset($formFiltro) || isset($formOrdenamiento)) ? "10" : "12" ?> side" <?php echo (empty($this->breadcrumbs) ? "" : "style='margin-top:-45px;'") ?>>
            <div class="row">
                <div class="col-md-12">
                    <?php if ($imagenBusqueda != null): ?>
                        <p align="center"><img alt="lo sentimos no se han encontrado resultados" src="<?php echo Yii::app()->request->baseUrl . $imagenBusqueda; ?>" class="ajustada"></p>
                    <?php else: ?>
                        <?php if ($dataprovider != null /* && !empty($dataprovider->getData()) */): ?> 
                            <div class="option-list">
                                Productos por página
                                <select name="items-page" class="form-control ciudades" id="items-page" onchange="actualizarNumerosPagina()">
                                    <?php foreach (Yii::app()->params->busqueda['productosPorPagina'][$cantidadItems] as $pagina): ?>
                                        <option value="<?php echo $pagina ?>" <?php echo (($dataprovider != null && $dataprovider->getPagination()->getPageSize() == $pagina) ? "selected" : "") ?>><?php echo $pagina ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <?php if (isset($formOrdenamiento)): ?>
                                <?php $this->renderPartial('_formOrdenamiento', array('formOrdenamiento' => $formOrdenamiento, 'objSectorCiudad' => $objSectorCiudad)); ?>
                            <?php endif; ?>
                        <?php endif; ?>   
                    <?php endif; ?> 
                    <div class="clear"></div>
                </div>
            </div>
            <br/>

            <?php if ($dataprovider != null): ?> 
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
                            'itemView' => '_productoElemento',
                            'beforeAjaxUpdate' => new CJavaScriptExpression("function() {Loading.show();}"),
                            'afterAjaxUpdate' => new CJavaScriptExpression("function(id,data) { $('html, body').animate({ scrollTop: 0 }, 600);
                                                        Loading.hide(); raty();$('[data-toggle=\"popover\"]').popover();}"),
                            'pager' => array('class' => 'CLinkPager', 'header' => ''),
                        ));
                        ?>
                    </section>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php if (isset($msgCodigoEspecial) && !empty($msgCodigoEspecial)): ?>
                <table class="codEspecial">
                    <tbody>
                        <?php foreach ($msgCodigoEspecial as $especial): ?>
                            <tr>
                                <td><img class="icon_codigo_especial" src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial'] . 'desktop/' . $especial->rutaIcono; ?>" ></td>
                                <td><?php echo $especial->descripcion ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
