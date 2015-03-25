<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <ul class="messages">
        <?php foreach ($mensajes as $idx => $mensaje): ?>
            <li><div class="<?php echo $idx ?>-msg"><?php echo $mensaje ?></div></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


<div class="ui-content ui-body-c">
    <?php if ($objUsuario == null): ?>
        <h2> Este enlace ya no se encuentra disponible. </h2>
    <?php else: ?>
        <h2>Restablecer contraseña</h2>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'enableClientValidation' => true,
            'htmlOptions' => array(
                'id' => "form-restablecer", 'class' => "ui-bar ui-bar-a ui-corner-all", 'data-ajax'=>"false"
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
                <?php echo $form->labelEx($model, 'clave', array('class' => 'ui-hidden-accessible')); ?>
                <?php echo $form->passwordField($model, 'clave', array('placeholder' => $model->getAttributeLabel('clave'), 'autocomplete' => 'off')); ?>
                <?php echo $form->error($model, 'clave'); ?>
            </div>
            <div class="ui-field-container">
                <?php echo $form->labelEx($model, 'claveConfirmar', array('class' => 'ui-hidden-accessible')); ?>
                <?php echo $form->passwordField($model, 'claveConfirmar', array('placeholder' => $model->getAttributeLabel('claveConfirmar'), 'autocomplete' => 'off')); ?>
                <?php echo $form->error($model, 'claveConfirmar'); ?>
            </div>
            <?php echo $form->hiddenField($model, 'cedula'); ?>
        </fieldset>
        <?php /* echo CHtml::submitButton('Guardar'); */ ?>
        <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
            Guardar
            <input type="submit" data-enhanced="true" value="Guardar">
        </div>
        <?php $this->endWidget(); ?>
    <?php endif; ?>
</div>