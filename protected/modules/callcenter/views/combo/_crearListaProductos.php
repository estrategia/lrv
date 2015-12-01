<div class="box-content row">
	<div class="panel-group" id="collapsibleset-productos-contenido" role="tablist" aria-multiselectable="true" style="margin-top:20px;">
	    <div class="panel panel-default">
	        <div class="panel-heading head-desplegable" role="tab" id="encabezado-buscar-productos-contenido">
	          <h4 class="panel-title">
	            <a role="button" class="" id="" data-toggle="collapse" data-parent="#collapsibleset-productos-contenido" href="#collapsible-cuerpo-productos-contenido" aria-expanded="true" aria-controls="collapsible-cuerpo-productos-contenido">
	            	Agregar productos
	            </a>
	          </h4>
	        </div>
	        <div style="height:5px;background-color: #F5F5F5;border-top: 1px solid #E9E1E1;"></div>
	        <div id="collapsible-cuerpo-productos-contenido" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="encabezado-buscar-productos-contenido">
	            <div class="panel-body">
                    	    <div class="row">
                                <?php if($model->idBeneficio == null):?>
                                    <form id="addproducto" method="post" name="addproducto">
                                             <div class="col-md-5 col-md-offset-3">
                                                <div class="form-group">
                                                   <input type="text" placeholder="Descripción" class="form-control input-sm"  data-combo="<?php echo $model->idCombo ?>" maxlength="50" id="combo-busqueda-buscar"> 
                                                </div>
                                             </div>
                                             <div class="col-md-1">
                                                <div class="form-group">
                                                    <button id="btn-pedido-buscar" type="button" class="btn btn-danger btn-sm" data-role="busqueda-producto-combo" data-combo="<?php echo $model->idCombo ?>"><i class="glyphicon glyphicon-search"></i> Buscar</button>
                                                </div>
                                             </div>
                                    </form>
                                <?php endif;?>
			    </div>		   
			    <div class="panel-body">
				 <div class="row">
					 <div class="col-md-12">
						 <div id="contenido-productos-lista">
							 <?php $this->renderPartial('_listaComboProductos', array("model" => $model)); ?>
						 </div>
					 </div>
				 </div>
                            </div>
	            </div>
	        </div>
	    </div>
    </div>
</div>