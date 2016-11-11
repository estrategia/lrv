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
                <?php //echo $form->textField($modelPago, 'nombreMedico', array('class' => 'form-control', 'maxlength' => 100, 'placeholder' => $modelPago->getAttributeLabel('nombreMedico'))); ?>
                <?php
					$this->widget ( 'zii.widgets.jui.CJuiAutoComplete', array (
							'model' => $modelPago,
							 'id' => 'FormaPagoTelefarmaForm_nombreMedico',
							'name' => 'FormaPagoTelefarmaForm[nombreMedico]',
							'source' => $this->createUrl('carro/autocompleteMedico'),
							'value' => $modelPago->nombreMedico,
							// additional javascript options for the autocomplete plugin
							'options' => array (
									'minLength' => '3' ,
									'select'=>"js: function(event, ui) {
										        $('#FormaPagoTelefarmaForm_registroMedico').val(ui.item['registroMedico']);
										        $('#FormaPagoTelefarmaForm_institucionMedico').val(ui.item['institucion']);
												$('#FormaPagoTelefarmaForm_telefonoMedico').val(ui.item['telefono']);
												$('#FormaPagoTelefarmaForm_correoElectronicoMedico').val(ui.item['correo']);
										     }"
							),
							'htmlOptions' => array (
									'class' => 'form-control',
							) 
					)) ;?>
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
