<fieldset>
    <div data-role="collapsibleset">
        <div data-role="collapsible">
            <h3>Adjuntar fórmula médica</h3>
            <div class="ui-field-container">
                <?php echo $form->labelEx($model, 'formulaMedica', array('class' => '')); ?>
                <?php echo CHtml::activeFileField($model, 'formulaMedica', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('formulaMedica'))); ?>
                <?php // echo $form->error($model, 'formulaMedica'); ?>
            </div>
			<div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
                Guardar Formula
                <input type="button" data-enhanced="true" value="Finalizar compra" onclick="" id="btn-adicionar-formula"  data-tipo="2">
            </div>
        </div>
        <div data-role="collapsible">
            <h3>Adjuntar datos del médico</h3>
            <div class="ui-field-container">
                <?php echo $form->labelEx($model, 'nombreMedico', array('class' => 'ui-mini')); ?>
                <?php echo $form->textField($model, 'nombreMedico', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('nombreMedico'))); ?>
                <?php echo $form->error($model, 'nombreMedico'); ?>
            </div>
            <div class="ui-field-container">
                <?php echo $form->labelEx($model, 'institucion', array('class' => '')); ?>
                <?php echo $form->textField($model, 'institucion', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('institucion'))); ?>
                <?php echo $form->error($model, 'institucion'); ?>
            </div>
            <div class="ui-field-container">
                <?php echo $form->labelEx($model, 'registroMedico', array('class' => '')); ?>
                <?php echo $form->textField($model, 'registroMedico', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('registroMedico'))); ?>
                <?php echo $form->error($model, 'registroMedico'); ?>
            </div>
            <div class="ui-field-container">
                <?php echo $form->labelEx($model, 'telefono', array('class' => '')); ?>
                <?php echo $form->textField($model, 'telefono', array('maxlength' => 100, 'placeholder' => $model->getAttributeLabel('telefono'))); ?>
                <?php echo $form->error($model, 'telefono'); ?>
            </div>
            <div class="ui-field-container">
                <?php echo $form->labelEx($model, 'correoElectronico', array('class' => '')); ?>
                <?php echo $form->textField($model, 'correoElectronico', array('maxlength' => 100, 'placeholder' => $model->getAttributeLabel('correoElectronico'))); ?>
                <?php echo $form->error($model, 'correoElectronico'); ?>
            </div>
			<div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
                Guardar Formula
                <input type="button" data-enhanced="true" value="Finalizar compra" onclick="" id="btn-adicionar-formula"  data-tipo="1">
            </div>
        </div>

        
    </div>
    
    <div class="space-2"></div>

    <div data-role="collapsibleset">
        <div data-role="collapsible">
            <h3>Formulas Adicionadas</h3>
            <div id="formulasAdicionadas">
                <?php $this->renderPartial('_formulasMedicasAdicionadas') ?>
            </div>
        </div>
    </div>

</fieldset>