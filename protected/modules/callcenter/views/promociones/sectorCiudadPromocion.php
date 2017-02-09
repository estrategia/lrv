<form id="addproducto" method="post" name="addproducto">
    <div class="row">
        <div class="col-md-3">
            Ciudad: 
                <?php echo Select2::dropDownList('select-ciudades-modulos', null, CHtml::listData($ciudades, 'codigoCiudad', 'nombreCiudad'), array('prompt' => 'Todas las ciudades y sectores', 'data-role' => 'promocion-ciudad', 'id' => 'select-ciudad-promocion', 'style' => 'width: 80%;')) ?>
        </div>
        <div id='div-sector-promocion' class="col-md-3" style="display:none">
            Sector:
            
        </div>
        <input type="hidden" name='sector-select' id='sector-select' value='0'>
        <div class="col-md-1">
            <button id="btn-pedido-buscar" type="button" class="btn btn-danger btn-sm" data-promocion="<?php echo $model->idPromocion?>" data-role="add-sector-ciudad-promocion" promocion="<?php echo $model->idPromocion ?>"><i class="glyphicon glyphicon-plus"></i> Añadir</button>
        </div>
    </div>
</form>
<div class="space-1"></div>
<div class="panel-body">
	<div class="row">
		<div class="col-md-12" id="lista-sectores">
			<?php $this->renderPartial('_listaSectoresCiudades',array('sectores' => $model->listSectorCiudad))?>
		</div>
	</div>
</div>