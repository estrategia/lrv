<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <?php foreach ($mensajes as $idx => $mensaje): ?>
        <div class="alert alert-<?php echo $idx ?> alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $mensaje ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>



<div class="box-header well">
    <div class="col-lg-11">
        <h2><i class="glyphicon glyphicon-file"></i> Modulos</h2>
    </div>
    <!-- <div class="box-icon"> -->
    <div class="col-lg-1">
        <?php $this->renderPartial('_opciones') ?>
    </div>
</div>
<?php $this->renderPartial('_gridModulos', array('model' => $model, 'vista' => 'index')); ?>