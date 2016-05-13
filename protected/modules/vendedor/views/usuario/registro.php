<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <ul class="messages">
        <?php foreach ($mensajes as $idx => $mensaje): ?>
            <li><div class="<?php echo $idx ?>-msg"><?php echo $mensaje ?></div></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div class="<?php echo $model->getContentClass() ?> c_form_rgs ui-body-c">
    <?php if (!($model->getTitleForm() == "")): ?>
        <h2>
            <?php echo $model->getTitleForm() ?>
        </h2>
    <?php endif; ?>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'enableClientValidation' => true,
        //'action' => $model->getScenario() == 'invitado' ? Yii::app()->createUrl('/usuario/invitado') : null,
        'htmlOptions' => array(
            'id' => "form-registro", 'class' => "ui-bar ui-bar-c ui-corner-all", 'data-ajax' => "false"
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

    <?php if ($model->getScenario() == "contrasena"): ?>
        <fieldset>
            <div class="ui-field-container">
                <?php echo $form->labelEx($model, 'clave', array('class' => '')); ?>
                <?php echo $form->passwordField($model, 'clave', array('maxlength' => 15, 'placeholder' => $model->getAttributeLabel('clave'), 'autocomplete' => 'off', 'ismxfilled' => 0)); ?>
                <?php echo $form->error($model, 'clave'); ?>
            </div>

            <div class="ui-field-container">
                <?php echo $form->labelEx($model, 'claveConfirmar', array('class' => '')); ?>
                <?php echo $form->passwordField($model, 'claveConfirmar', array('maxlength' => 15, 'placeholder' => $model->getAttributeLabel('claveConfirmar'), 'autocomplete' => 'off')); ?>
                <?php echo $form->error($model, 'claveConfirmar'); ?>
            </div>
        </fieldset>
    <?php endif; ?>



    <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
        <?= $model->getSubmitName() ?>
        <input type="<?= $model->getSubmitType() ?>" data-registro="<?php echo $model->getScenario() ?>" data-enhanced="true" value="<?= $model->getSubmitName() ?>">
    </div>
    <?php $this->endWidget(); ?>
</div>

