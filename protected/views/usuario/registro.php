<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <ul class="messages">
        <?php foreach ($mensajes as $idx => $mensaje): ?>
            <li><div class="<?php echo $idx ?>-msg"><?php echo $mensaje ?></div></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div class="<?php echo $model->getContentClass() ?> c_form_rgs ui-body-c">
    <?php if (!($model->getTitleForm()=="")): ?>
        <h2>
            <?php echo $model->getTitleForm() ?>
        </h2>
    <?php endif;?>
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
        <?php else: ?>
        <fieldset>
                <?php if ($model->getScenario() == 'registro' || $model->getScenario() == 'invitado') : ?>
                <div class="ui-field-container">
                    <?php echo $form->labelEx($model, 'cedula', array('class' => '')); ?>
                    <?php echo $form->numberField($model, 'cedula', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('cedula'))); ?>
                <?php echo $form->error($model, 'cedula'); ?>
                </div>
            <?php endif; ?>
                <?php if ($model->getScenario() == 'actualizar') : ?>
                <div class="ui-field-container">
                    <?php echo $form->labelEx($model, 'cedula', array('class' => '')); ?>
                    <?php echo $form->textField($model, 'cedula', array('disabled' => 'disabled')); ?>
                <?php echo $form->error($model, 'cedula'); ?>
                </div>
    <?php endif; ?>


            <div class="ui-field-container">
                <?php echo $form->labelEx($model, 'nombre', array('class' => '')); ?>
                <?php echo $form->textField($model, 'nombre', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('nombre'))); ?>
    <?php echo $form->error($model, 'nombre'); ?>
            </div>
            <div class="ui-field-container">
                <?php echo $form->labelEx($model, 'apellido', array('class' => '')); ?>
                <?php echo $form->textField($model, 'apellido', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('apellido'))); ?>
    <?php echo $form->error($model, 'apellido'); ?>
            </div>

                <?php if ($model->getScenario() == 'actualizar') : ?>
                <div class="ui-field-container">
                    <?php echo $form->labelEx($model, 'correoElectronico', array('class' => '')); ?>
                    <?php echo $form->emailField($model, 'correoElectronico', array('disabled' => 'disabled', 'placeholder' => $model->getAttributeLabel('correoElectronico'))); ?>
                <?php echo $form->error($model, 'correoElectronico'); ?>
                </div>
                <?php else: ?>
                <div class="ui-field-container">
                    <?php echo $form->labelEx($model, 'correoElectronico', array('class' => '')); ?>
                    <?php echo $form->emailField($model, 'correoElectronico', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('correoElectronico'))); ?>
                <?php echo $form->error($model, 'correoElectronico'); ?>
                </div>
            <?php endif; ?>

    <?php if ($model->getScenario() != 'invitado') : ?>
                <fieldset data-role="controlgroup" data-type="horizontal">
                    <legend><?php echo $form->labelEx($model, 'genero'); ?></legend>
        <?php foreach (Yii::app()->params->generos as $valor => $nombre): ?>
                        <label for="RegistroForm_genero_<?php echo $valor ?>" class="c_label_rg"><?php echo $nombre ?></label>
                        <input type="radio" name="RegistroForm[genero]" id="RegistroForm_genero_<?php echo $valor ?>" value="<?php echo $valor ?>" <?php echo ($model->genero == $valor ? "checked='checked'" : "") ?>>
                    <?php endforeach; ?>
        <?php echo $form->error($model, 'genero'); ?>
                </fieldset>

                <div class="ui-field-container">
                    <?php echo $form->labelEx($model, 'fechaNacimiento'); ?>
                    <?php echo $form->dateField($model, 'fechaNacimiento', array('placeholder' => 'yyyy-mm-dd')); ?>
                <?php echo $form->error($model, 'fechaNacimiento'); ?>
                </div>
            <?php endif; ?>

                <?php if ($model->getScenario() == 'registro') : ?>
                <div class="ui-field-container">
                    <?php echo $form->labelEx($model, 'clave', array('class' => '')); ?>
                    <?php echo $form->passwordField($model, 'clave', array('maxlength' => 15, 'placeholder' => $model->getAttributeLabel('clave'), 'autocomplete' => 'off')); ?>
        <?php echo $form->error($model, 'clave'); ?>
                </div>

                <div class="ui-field-container">
                    <?php echo $form->labelEx($model, 'claveConfirmar', array('class' => '')); ?>
                    <?php echo $form->passwordField($model, 'claveConfirmar', array('maxlength' => 15, 'placeholder' => $model->getAttributeLabel('claveConfirmar'), 'autocomplete' => 'off')); ?>
                <?php echo $form->error($model, 'claveConfirmar'); ?>
                </div>
            <?php endif; ?>

                <?php if ($model->getScenario() == 'registro' || $model->getScenario() == 'invitado') : ?>
                <div class="ui-field-container">
                    <?php echo $form->labelEx($model, 'condiciones', array('class' => 'c_cond_rg')); ?>
                    <?php echo $form->checkBox($model, 'condiciones', array('data-mini' => 'true')); ?>
                <?php echo $form->error($model, 'condiciones'); ?>
                </div>
            <?php endif; ?>
                <?php if ($model->getScenario() == 'actualizar') : ?>
                <div class="ui-field-container">
                    <?php echo $form->labelEx($model, 'profesion', array('class' => '')); ?>
                    <?php echo $form->dropDownList($model, 'profesion', CHtml::listData(ProfesionCliente::listData(), 'codigoProfesion', 'nombreProfesion'), array('prompt' => $model->getAttributeLabel('profesion'), 'encode' => false, 'data-native-menu' => true)); ?>
                <?php echo $form->error($model, 'profesion'); ?>
                </div>
        <?php endif; ?>
        </fieldset>
        <?php if ($model->getScenario() == 'registro' || $model->getScenario() == 'invitado') : ?>
            <?php echo CHtml::link('Ver condiciones', "#dialog-condiciones", array('class' => 'c_olv_pass', 'data-transition' => 'flip')); ?>
        <?php endif; ?>

<?php endif; ?>



    <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
<?= $model->getSubmitName() ?>
        <input type="<?= $model->getSubmitType() ?>" data-registro="<?php echo $model->getScenario() ?>" data-enhanced="true" value="<?= $model->getSubmitName() ?>">
    </div>
<?php $this->endWidget(); ?>
</div>

<?php if ($model->getScenario() == 'registro' || $model->getScenario() == 'invitado') : ?>
    <?php /* $this->extraContentList[] = "<div data-role='panel' id='panel-condiciones' data-display='push' data-position-fixed='true'>" . $this->renderPartial('/sitio/condiciones', null, true) . "<a href='#' class='ui-btn ui-btn-r' data-rel='close'>Cerrar</a></div>" */ ?>
    <?php /* $this->extraPageList[] = "<div data-role='page' id='page-condiciones'><div data-role='main' class='ui-content'>" . $this->renderPartial('/sitio/condiciones', null, true) . "<a href='#' class='ui-btn ui-btn-r' data-rel='back'>Cerrar</a></div></div>" */ ?>
    <?php $this->extraPageList[] = $this->renderPartial('/sitio/condicionesDialog', null, true); ?>
<?php endif; ?>
