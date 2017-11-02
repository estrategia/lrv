<?php $cantidadItems = isset($cantidadItems) ? $cantidadItems : 4 ?>
<div class="space-1"></div>
<?php echo $this->renderPartial('buscar');?>
<div class="container-fluid">
    <div class="row">
        <!-- Menu de ordenamiento -->


	<?php $formSort = ""?>
        <div class="col-md-<?php echo (isset($formFiltro) || isset($formOrdenamiento)) ? "12" : "12" ?> side" <?php echo (empty($this->breadcrumbs) ? "" : "style='margin-top:-45px;'") ?>>
            <div class="row">
                <div class="col-md-12">
                    <?php if ($imagenBusqueda != null): ?>
                        <p align="center"><img alt="lo sentimos no se han encontrado resultados" src="<?php echo Yii::app()->request->baseUrl . $imagenBusqueda; ?>" class="ajustada"></p>
                    <?php else: ?>
                        <?php if ($dataprovider != null /* && !empty($dataprovider->getData()) */): ?>
                           <?php $formSort = "<div class='col-md-2'>
							<div class='option-list'>
                                Productos por página
                                <select name='items-page' class='form-control' id='items-page' onchange='actualizarNumerosPagina()'>";?>
                                    <?php foreach (Yii::app()->params->busqueda['productosPorPagina'][$cantidadItems] as $pagina): ?>
                                     <?php  $formSort .= "<option value='$pagina' ".(($dataprovider != null && $dataprovider->getPagination()->getPageSize() == $pagina) ? "selected" : "")." >$pagina</option>";?>
                                    <?php endforeach; ?>
                  			<?php $formSort .= "</select>
                            	</div>
							</div>";?>

                            <?php if (isset($formOrdenamiento)): ?>
                                <?php $formSort .= $this->renderPartial('_formOrdenamiento', array('formOrdenamiento' => $formOrdenamiento, 'objSectorCiudad' => $objSectorCiudad),true,false); ?>
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
                            'template' => " <div class='row' style='margin-bottom: 25px;'>
                                              <div class='col-md-1 col-md-offset-4'></div>
                                    			     $formSort
                                    				   <div style='margin-top: 20px;' class='menu-bar' data-role='filtros'>
                                    				       <span class='glyphicon glyphicon-th-list'></span>
                                    				   </div
                                               <div class='col-md-3'>{summary}</div>
                            				        </div>
                                            <ul class='listaProductos'>{items}</ul>
                            				{pager}",
                            'itemsCssClass' => "items items$cantidadItems",
                            'itemView' => '_productoElemento',
                            'beforeAjaxUpdate' => new CJavaScriptExpression("function() {Loading.show();}"),
                            'afterAjaxUpdate' => new CJavaScriptExpression("function(id,data) { $('html, body').animate({ scrollTop: 0 }, 600);
                                                        Loading.hide(); raty();$('[data-toggle=\"popover\"]').popover();
                            							$('.menu-bar').on('click', function(){
															$('.sidebar').addClass('mostrar');
														});
														$('.cerrar').on('click', function(){
															$('.sidebar').removeClass('mostrar');
														});}"),
                            'pager' => array('class' => 'CLinkPager', 'header' => ''),
                        ));
                        ?>
                    </section>
                </div>
            <?php endif; ?>
        </div>

        <!-- Menu de filtros -->
        <?php if (isset($formFiltro) || isset($formOrdenamiento)): ?>
          <div class="sidebar">
            <p class="cerrar" data-role='cerrar'>Cerrar <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></p>
            <div class="col-md-12 menu-categorias cat-collapsables">
                <h3>Filtrar por:</h3>
                <?php if (isset($formFiltro)): ?>
                    <div class="panel-group" id="accordion-filtros" role="tablist" aria-multiselectable="true">
                        <?php $this->renderPartial('_formFiltro', array('formFiltro' => $formFiltro)); ?>
                    </div>
                <?php endif; ?>
            </div>
            </div>

        <?php endif; ?>
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
