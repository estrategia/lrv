  <?php if ($dataprovider != null): ?> 
                <?php /* if ($listCombos != null): ?>
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
                <?php endif; */?>
                <div id="lista-productos" class="list_cuadricula">
                    <section>
                        <?php
                        $this->widget('zii.widgets.CListView', array(
                            'id' => 'id-productos-list',
                            'dataProvider' => $dataprovider,
                            //'template' => "{items}\n{pager}",
                            //'summaryText' => "{start} - {end} из {count}",
                            'template' => "{summary}<ul class='listaProductos'>{items}</ul><div class='clear'></div>{pager}",
                            'itemsCssClass' => "items items4",
                            'itemView' => '_productoElemento',
                            'beforeAjaxUpdate' => new CJavaScriptExpression("function() {Loading.show();}"),
                            'afterAjaxUpdate' => new CJavaScriptExpression("function(id,data) { $('html, body').animate({ scrollTop: 0 }, 600);
                                                        Loading.hide(); raty();$('[data-toggle=\"popover\"]').popover();  listaProductoVistaActualizar();}"),
                            'pager' => array('class' => 'CLinkPager', 'header' => ''),
                        ));
                        ?>
                    </section>
                </div>
            <?php endif; ?>