<?php $sectores = SectorCiudad::listDataSectorCiudad($model->codigoCiudad === null || $model->codigoCiudad == Yii::app()->params->ciudad['*'] ? "" : $model->codigoCiudad); ?>

<?php if(count($sectores) > 1): ?>
	<?php echo CHtml::activeLabelEx($model, 'codigoSector'); ?><div class="space-1"></div>
	<?php echo CHtml::activeDropDownList($model, 'codigoSector', CHtml::listData($sectores, 'codigoSector', 'nombreSector'), array('class' => 'estado', 'class' => 'form-control', 'empty' => array(Yii::app()->params->sector['*'] => 'Todos los sectores')))?>
	<?php echo CHtml::error($model, 'codigoSector'); ?>
<?php elseif (count($sectores) == 1) : ?>
	<?php echo CHtml::activeHiddenField($model, 'codigoSector', array('class' => 'estado', 'class' => 'form-control', 'value' => Yii::app()->params->sector['sinSector']))?>
<?php else: ?>
	<?php echo CHtml::activeHiddenField($model, 'codigoSector', array('class' => 'estado', 'class' => 'form-control', 'value' => Yii::app()->params->sector['*']))?>
<?php endif; ?>