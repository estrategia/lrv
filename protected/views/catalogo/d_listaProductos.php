<div class="space-3"></div>
<div class="container">
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
                                <button class="btn-white btn" data-type="cuadricula" type="button"><span  class="glyphicon glyphicon-th" alt="Cuadricula"></span></button>
                                <button class="btn-white btn" data-type="lineal" type="button"><span  class="glyphicon glyphicon-th-list" alt="Cuadricula"></span></button>
                            </div>
                        <?php endif; ?>   
                    <?php endif; ?> 
                    <div class="clear"></div>
                </div>
            </div>
            <br/>

            <?php if ($dataprovider != null): ?> 
                <?php if ($listCombos != null): ?>
                    <p align="center">
                    <div id="slide-combos" class="owl-carousel">

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
                    </p>

                    <?php /*     <section>
                      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner" role="listbox">
                      <div class="item active">
                      <div class="container">
                      <div class="col-md-12" style="margin-top:30px;">
                      <?php $i=0;?>
                      <?php foreach ($listCombos as $objCombo): ?>
                      <div class="col-md-2 border-right">
                      <?php

                      $this->renderPartial('_d_comboElemento', array(
                      'objCombo' => $objCombo,
                      'objPrecio' => new PrecioCombo($objCombo),
                      ));
                      ?>

                      </div>
                      <?php $i++;?>
                      <?php if($i==4):?>
                      </div>
                      </div>
                      </div>
                      <div class="item">
                      <div class="container">
                      <div class="col-md-12" style="margin-top:30px;">
                      <?php endif;?>
                      <?php endforeach; ?>

                      </div>
                      </div>
                      </div>
                      </div>
                      <!-- Controls -->
                      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                      <i class="prev-slide2"></i>
                      </a>
                      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                      <i class="next-slide2"></i>
                      </a>
                      <!---->
                      </div>
                      </section> */ ?>
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
                            'itemView' => '_d_productoElemento',
                            'beforeAjaxUpdate' => new CJavaScriptExpression("function() {/*loadingClass(2); Loading.show();*/}"),
                            'afterAjaxUpdate' => new CJavaScriptExpression("function(id,data) { /*Loading.hide(); */raty();$('.pop_codigo').popover();}"),
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
