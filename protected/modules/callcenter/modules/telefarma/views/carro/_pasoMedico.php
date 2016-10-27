<div class="center center-verticaly">
    <?php
        $form = $this->beginWidget('CActiveForm', array(
            'enableClientValidation' => true,
            'id' => "form-datosmedico",
            'htmlOptions' => array(
                'class' => 'form-horizontal'
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

        <div class="form-group form-group-sm">
            <?php echo $form->labelEx($modelPago, 'registroMedico', array('class' => 'col-md-5 control-label')); ?>
            <div class="col-md-7">
                <?php echo $form->textField($modelPago, 'registroMedico', array('class' => 'form-control', 'maxlength' => 15, 'placeholder' => $modelPago->getAttributeLabel('registroMedico'))); ?>
                <?php echo $form->error($modelPago, 'registroMedico', array('class' => 'text-danger')); ?>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <?php echo $form->labelEx($modelPago, 'nombreMedico', array('class' => 'col-md-5 control-label')); ?>
            <div class="col-md-7">
                <?php echo $form->textField($modelPago, 'nombreMedico', array('class' => 'form-control', 'maxlength' => 100, 'placeholder' => $modelPago->getAttributeLabel('nombreMedico'))); ?>
                <?php echo $form->error($modelPago, 'nombreMedico', array('class' => 'text-danger')); ?>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <?php echo $form->labelEx($modelPago, 'institucionMedico', array('class' => 'col-md-5 control-label')); ?>
            <div class="col-md-7">
                <?php echo $form->textField($modelPago, 'institucionMedico', array('class' => 'form-control', 'maxlength' => 100, 'placeholder' => $modelPago->getAttributeLabel('institucionMedico'))); ?>
                <?php echo $form->error($modelPago, 'institucionMedico', array('class' => 'text-danger')); ?>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <?php echo $form->labelEx($modelPago, 'telefonoMedico', array('class' => 'col-md-5 control-label')); ?>
            <div class="col-md-7">
                <?php echo $form->textField($modelPago, 'telefonoMedico', array('class' => 'form-control', 'maxlength' => 15, 'placeholder' => $modelPago->getAttributeLabel('telefonoMedico'))); ?>
                <?php echo $form->error($modelPago, 'telefonoMedico', array('class' => 'text-danger')); ?>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <?php echo $form->labelEx($modelPago, 'correoElectronicoMedico', array('class' => 'col-md-5 control-label')); ?>
            <div class="col-md-7">
                <?php echo $form->emailField($modelPago, 'correoElectronicoMedico', array('class' => 'form-control', 'maxlength' => 100, 'placeholder' => $modelPago->getAttributeLabel('correoElectronicoMedico'))); ?>
                <?php echo $form->error($modelPago, 'correoElectronicoMedico', array('class' => 'text-danger')); ?>
            </div>
        </div>

        <?php $this->endWidget(); ?>
</div>
