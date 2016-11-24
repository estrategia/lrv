<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <ul class="messages">
        <?php foreach ($mensajes as $idx => $mensaje): ?>
            <li><div class="<?php echo $idx ?>-msg"><?php echo $mensaje ?></div></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div class="ui-content c_form_rgs ui-body-c">
    <h2>Adicionar dirección de despacho</h2>
    <?php $this->renderPartial('_direccionForm', array('model' => $model)); ?>
    <?php echo CHtml::link('Cancelar', CController::createUrl('/cliente/direcciones'), array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n', 'data-ajax' => "false")); ?>
</div>
