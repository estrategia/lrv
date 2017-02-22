<form id="addcategory" method="post" name="addcategory">
    <div class="row">
        <div class="col-md-3">
            Categoria Desktop: 
                <?php echo Select2::dropDownList('select-ciudades-modulos-desktop', null, CHtml::listData(CategoriaTienda::model()->findAll(array(
                		'condition' => 'idCategoriaPadre is NULL AND tipoDispositivo =:dispositivo',
                		'params' => array(
                				':dispositivo' => Yii::app()->params->dispositivo['desktop']	
                		)
                )), 'idCategoriaTienda', 'nombreCategoriaTienda'), array('data-role' => 'promocion-categoria', 'id' => 'select-categoria-promocion-desktop', 'style' => 'width: 80%;')) ?>
        </div>
        <div class="col-md-3">
            Categoria Movil: 
                <?php echo Select2::dropDownList('select-ciudades-modulos-movil', null, CHtml::listData(CategoriaTienda::model()->findAll(array(
                		'condition' => 'idCategoriaPadre is NULL AND tipoDispositivo =:dispositivo',
                		'params' => array(
                				':dispositivo' => Yii::app()->params->dispositivo['movil']	
                		)
                )), 'idCategoriaTienda', 'nombreCategoriaTienda'), array('data-role' => 'promocion-categoria', 'id' => 'select-categoria-promocion-movil', 'style' => 'width: 80%;')) ?>
        </div>
        <div class="col-md-1">
            <button id="btn-pedido-buscar" type="button" class="btn btn-danger btn-sm" data-promocion="<?php echo $model->idPromocion?>" data-role="add-categoria-promocion" ><i class="glyphicon glyphicon-plus"></i> Añadir</button>
        </div>
    </div>
</form>
<div class="space-1"></div>
<div class="panel-body">
	<div class="row">
		<div class="col-md-12" id="lista-sectores">
			<?php $this->renderPartial('_listaCategorias',array('categorias' => $model->listCategoriasTienda))?>
		</div>
	</div>
</div>