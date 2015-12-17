<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <?php foreach ($mensajes as $idx => $mensaje): ?>
        <div class="alert alert-dismissable alert-<?php echo $idx; ?>">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $mensaje; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    'htmlOptions' => array(
        'id' => "form-registro", 'class' => "",
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

    <div class="row">
        <div class="col-md-4">
            <?php echo $form->labelEx($model, 'clave'); ?>
            <?php echo $form->passwordField($model, 'clave', array('placeholder' => $model->getAttributeLabel('clave'), 'autocomplete' => 'off', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'clave', array("class" => "text-danger")); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?php echo $form->labelEx($model, 'claveConfirmar'); ?>
            <?php echo $form->passwordField($model, 'claveConfirmar', array('placeholder' => $model->getAttributeLabel('claveConfirmar'), 'autocomplete' => 'off', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'claveConfirmar', array("class" => "text-danger")); ?>
        </div>
    </div>
    <div class="space-1"></div>
<?php else: ?>
    <div class="row">
        <div class="col-sm-6">
            <?php if ($model->getScenario() == 'registro' || $model->getScenario() == 'invitado') : ?>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'cedula'); ?>
                    <?php echo $form->textField($model, 'cedula', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('cedula'), 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'cedula', array("class" => "text-danger")); ?>
                </div>
            <?php endif; ?>
            <?php if ($model->getScenario() == 'actualizar') : ?>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'cedula'); ?>
                    <?php echo $form->textField($model, 'cedula', array('disabled' => 'disabled', 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'cedula', array("class" => "text-danger")); ?>
                </div>
            <?php endif; ?>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'nombre'); ?>
                <?php echo $form->textField($model, 'nombre', array('placeholder' => $model->getAttributeLabel('nombre'), 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'nombre', array("class" => "text-danger")); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'apellido'); ?>
                <?php echo $form->textField($model, 'apellido', array('placeholder' => $model->getAttributeLabel('apellido'), 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'apellido', array("class" => "text-danger")); ?>
            </div>
            <div class="form-group">
                <?php if ($model->getScenario() == 'actualizar') : ?>
                    <?php echo $form->labelEx($model, 'correoElectronico'); ?>
                    <?php echo $form->emailField($model, 'correoElectronico', array('placeholder' => $model->getAttributeLabel('correoElectronico'), 'class' => 'form-control', 'disabled' => 'disabled')); ?>
                    <?php echo $form->error($model, 'correoElectronico', array("class" => "text-danger")); ?>
                <?php else: ?>
                    <?php echo $form->labelEx($model, 'correoElectronico'); ?>
                    <?php echo $form->emailField($model, 'correoElectronico', array('placeholder' => $model->getAttributeLabel('correoElectronico'), 'class' => 'form-control', 'maxlength' => 50)); ?>
                    <?php echo $form->error($model, 'correoElectronico', array("class" => "text-danger")); ?>
                <?php endif; ?>
            </div>
            <?php if ($model->getScenario() == 'registro' || $model->getScenario() == 'invitado') : ?>

                <?php echo $form->checkBox($model, 'condiciones', array("style" => "display:block;float:left;")); ?>
                <?php echo $form->labelEx($model, 'condiciones'); ?>

                <?php echo $form->error($model, 'condiciones', array("class" => "text-danger")); ?>


            <?php endif; ?>
            <?php if ($model->getScenario() == 'registro' || $model->getScenario() == 'invitado') : ?>

                <div class="form-group">
                    <?php echo CHtml::link('Ver condiciones', "#dialog-condiciones", array('class' => 'c_olv_pass', 'data-transition' => 'flip', 'data-toggle' => "modal", 'data-target' => "#modalTerminos")); ?>
                </div>

            <?php endif; ?>

        </div>
        <div class="col-sm-6">
            <?php if ($model->getScenario() != 'invitado') : ?>
                <div class="form-group">

                    <?php echo $form->labelEx($model, 'genero'); ?>
                    <div class="space-1" ></div>

                    <?php foreach (Yii::app()->params->generos as $valor => $nombre): ?>

                        <label for="RegistroForm_genero_<?php echo $valor ?>" class="c_label_rg"><?php echo $nombre ?></label>
                        <input type="radio" name="RegistroForm[genero]" id="RegistroForm_genero_<?php echo $valor ?>" value="<?php echo $valor ?>" <?php echo ($model->genero == $valor ? "checked='checked'" : "") ?>>

                    <?php endforeach; ?>

                    <?php echo $form->error($model, 'genero'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'fechaNacimiento'); ?>
                    <?php //echo $form->textField($model, 'fechaNacimiento',array('class'=>'form-control')); ?>
                    <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'fechaNacimiento',
                        'language' => 'es',
                        'options' => array(
                            'showAnim' => 'slide',
                            'dateFormat' => 'yy-mm-dd',
                            "changeYear" => true,
                            "changeMonth" => true,
                            "yearRange" => "1900:2015"
                        ),
                        'htmlOptions' => array(
                            'class' => 'form-control',
                            'size' => '10',
                            'maxlength' => '10',
                            'placeholder' => 'yyyy-mm-dd',
                        ),
                    ));
                    ?>

                    <?php echo $form->error($model, 'fechaNacimiento'); ?>

                </div>

            <?php endif; ?>
            <?php if ($model->getScenario() == 'registro') : ?>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'clave'); ?>
                    <?php echo $form->passwordField($model, 'clave', array('placeholder' => $model->getAttributeLabel('clave'), 'autocomplete' => 'off', 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'clave', array("class" => "text-danger")); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'claveConfirmar'); ?>
                    <?php echo $form->passwordField($model, 'claveConfirmar', array('placeholder' => $model->getAttributeLabel('claveConfirmar'), 'autocomplete' => 'off', 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'claveConfirmar', array("class" => "text-danger")); ?>

                </div>

            <?php endif; ?>

            <?php if ($model->getScenario() == 'actualizar') : ?>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'profesion', array('style' => 'display:block;')); ?>
                    <?php echo $form->dropDownList($model, 'profesion', CHtml::listData(ProfesionCliente::listData(), 'codigoProfesion', 'nombreProfesion'), array('class'=>'ciudades', 'prompt' => $model->getAttributeLabel('profesion'), 'encode' => false)); ?>
                    <?php echo $form->error($model, 'profesion', array("class" => "text-danger")); ?>
                </div>

            <?php endif; ?>

        </div>
    </div>

<?php endif; ?>

<div class="row">
    <div class="col-md-4">
        <?php if ($model->getScenario() == 'registro' || $model->getScenario() == 'invitado'): ?>
            <input class='btn btn-primary' type="button" data-enhanced="true" data-registro-desktop="registro" value="Registrar">
        <?php elseif ($model->getScenario() == 'actualizar'): ?>
            <input class='btn btn-primary' type="submit" data-enhanced="true" value="Guardar">
        <?php elseif ($model->getScenario() == "contrasena"): ?>
            <input class='btn btn-primary' type="submit" data-enhanced="true" value="Actualizar">
        <?php endif; ?>
    </div>
</div>

<?php $this->endWidget(); ?>

<?php if ($model->getScenario() == 'registro' || $model->getScenario() == 'invitado') : ?>
    <div class="modal fade" id="modalTerminos" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Condiciones de uso</h4>
                </div>
                <div class="modal-body body-scroll">
                    <?php echo $this->renderPartial('/sitio/condiciones', null, true); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
