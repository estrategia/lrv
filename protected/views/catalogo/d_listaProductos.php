<div class="space-3"></div>
<div class="">
    
    <?php if (isset($formOrdenamiento)): ?>
        <a href="#panel-ordenamiento">
            <!--<img src="<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_ordenar.png" onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_ordenar_activo.png'" onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_ordenar.png'">-->
            <img src="<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_ordenar.png" alt="Ordenar">
        </a>
    <?php endif; ?>
</div>

<div class="row">
                <!-- Menú de filtros -->
		<div class="col-md-2 menu-categorias cat-collapsables">
                               <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h4 class="panel-title">
				        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="background:none;">
				          Marca <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
				        </a>
				      </h4>
				    </div>
				    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				      <div class="panel-body">
				        <ul>
				        	<a href="#"><li>Mimadito</li></a>
				        	<a href="#"><li>Jhonson</li></a>
				        	<a href="#"><li>JGB</li></a>
				        	<a href="#"><li>Día baby</li>
				        </ul></a>
				      </div>
				    </div>
				  </div>
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingTwo">
				      <h4 class="panel-title">
				        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="background:none;">
				          Atributos <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
				        </a>
				      </h4>
				    </div>
				    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				      <div class="panel-body">
				        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, tenetur, illum optio deleniti eveniet.
				      </div>
				    </div>
				  </div>
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingThree">
				      <h4 class="panel-title">
				        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="background:none;" >
				          Precio <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
				        </a>
				      </h4>
				    </div>
				    <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
				      <div class="panel-body">	
				        <input id="rango-precios" class="span2" value="" data-slider-min="100" data-slider-max="1000" data-slider-step="5" data-slider-value="[950,450]"/>
				        <input class="search-priced" value="$950"/>
				        	<span>-</span>
				        <input class="search-priced" value="$950"/>
                                        <a href="#"><img src="<?php echo Yii::app()->baseUrl?>/images/desktop/ico-lupa.png"></a>
				      </div>
				    </div>
				  </div>
				   <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingFour">
				      <h4 class="panel-title">
				        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour" style="background:none;" >
				          Calificación <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
				        </a>
				      </h4>
				    </div>
				    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
				      <div class="panel-body">
				        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
				      </div>
				    </div>
				  </div>
				</div> 
			</div>
                
			<div class="col-md-10 side">
                              <div class="row">
                                    <div class="col-md-12">
                                            <div class="col-md-8">
                                                <h1 class="ct_result">Resultados de búsqueda: <?php echo $nombreBusqueda ?></h1>
                                                <p class="cp_result"><?= count($listProductos) + count($listCombos) ?> resultados</p>
                                            </div>

                                            <?php if ($imagenBusqueda != null): ?>
                                                <img src="<?php echo Yii::app()->request->baseUrl . $imagenBusqueda; ?>" class="ajustada">
                                            <?php endif; ?>
                                                
                                            <?php if(count($listProductos) + count($listCombos) >0 ):?>   
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
                                            <?php endif;?>    
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
                                                                            <?php $this->widget('zii.widgets.CListView', array(
                                                                                'id' => 'id-productos-list',
                                                                                'dataProvider' => $dataprovider,
                                                                                'template' => "<div class='col-md-12'>{items}</div><br/><br/><div class='col-md-12'>{pager}</div>",
                                                                                'itemView' => '_d_productoElemento',
                                                                                'beforeAjaxUpdate' => new CJavaScriptExpression("function() {/*loadingClass(2); Loading.show();*/}"),
                                                                                'afterAjaxUpdate' => new CJavaScriptExpression("function(id,data) { /*Loading.hide(); */$('span[id^=\'rating_\'] > input').rating({'readOnly':true});$('.pop_codigo').popover();}"),
                                                                                'pager' => array('class' => 'CLinkPager', 'header' => ''),
                                                                            )); ?>
                                                                        </ul>
                                                            </div>
                                                    </div>
                                                </section>
                                            </div>
                                        <?php endif; ?>
                        </div>
</div>
                    


  <?php /*
   <div class="row-fluid">
       
        <?php $i=0;
            foreach ($listProductos as $objProducto): 
                $i++; 
        ?>
            
            <div class="span2" align="center">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"></legend>
                    <div class="modul_pro">
                        <?php
                            $this->renderPartial('_d_productoElemento', array(
                                'objProducto' => $objProducto,
                                'objPrecio' => new PrecioProducto($objProducto, $objSectorCiudad, $codigoPerfil),
                            ));
                         ?>
                    </div>
                    <div class="ui-input-text ui-body-inherit ui-corner-all ui-mini ui-shadow-inset">
                        <input id="cantidad-producto-unidad-11867" class="cbtn_cant" type="number" value="1" data-mini="true" onchange="subtotalUnidadProducto(11867);" placeholder="0">
                    </div>
                </fieldset>
            </div>
            <?php if($i%3==0):?>
                </div>
                <div class="space-1"></div>
                <div class="row-fluid">
            <?php endif;?>
        <?php endforeach;?>
    </div>
   * 
   */?>
                    
       <!--
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
       -->
</div>
<!--
<?php /*if (isset($formOrdenamiento)) $this->extraContentList[] = $this->renderPartial('_formOrdenamiento', array('formOrdenamiento' => $formOrdenamiento, 'objSectorCiudad' => $objSectorCiudad), true); ?>
 <?php if (isset($formFiltro)) $this->extraContentList[] = $this->renderPartial('_formFiltro', array('formFiltro' => $formFiltro, 'tipoBusqueda' => $tipoBusqueda), true);*/ ?>
-->

<?php /*foreach ($listCodigoEspecial as $especial): ?>
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
            <?php echo CHtml::link('Cerrar', '#', array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-r', 'data-mini' => 'true', 'data-rel'=>'back')); ?>
        </div>
    </div>
<?php endforeach; ?>*/
?>
<script>

$('#items-page').select2({});
            
function actualizarNumerosPagina(){
    var items= $('#items-page').val();
    $.fn.yiiListView.update('id-productos-list', {data: {pageSize: items}});
}

</script>