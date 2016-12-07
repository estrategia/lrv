<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <ul class="messages">
        <?php foreach ($mensajes as $idx => $mensaje): ?>
            <li><div class="<?php echo $idx ?>-msg"><?php echo $mensaje ?></div></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div class="ui-body-c">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'enableClientValidation' => true,
        'htmlOptions' => array(
            'id' => "form-recordar", 'class' => "ui-bar ui-bar-a ui-corner-all", 'data-ajax'=>"false"
        ),
        'errorMessageCssClass' => 'has-error',
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange' => true,
            'errorCssClass' => 'has-error',
            'successCssClass' => 'has-success',
        ))
    );
    ?>
    <fieldset>
        <div class="ui-field-container">
            <?php echo $form->labelEx($model, 'correoElectronico', array('class' => 'ui-hidden-accessible')); ?>
            <?php echo $form->textField($model, 'correoElectronico', array('placeholder' => $model->getAttributeLabel('correoElectronico'))); ?>
            <?php echo $form->error($model, 'correoElectronico'); ?>
        </div>
    </fieldset>
    <?php /* echo CHtml::submitButton('Recordar', array('class' => 'c_bt_sendrc')); */ ?>
    <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
        Recordar
        <input type="button" data-registro="recordar" data-enhanced="true" value="Recordar">
    </div>
    <?php $this->endWidget(); ?>
</div>