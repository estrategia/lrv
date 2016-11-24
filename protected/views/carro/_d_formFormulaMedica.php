<?php
// Formulario para adicionar formulas médicas
/* $form = $this->beginWidget('CActiveForm', array(
  'id' => 'form-formula',
  'enableClientValidation' => true,

  'errorMessageCssClass' => 'has-error',
  'clientOptions' => array(

  'errorCssClass' => 'has-error',
  'successCssClass' => 'has-success',
  ))
  ); */
?>
<form id='form-formula' >
    <fieldset>

        <div class="space-2"></div>
        <div class="coment confirmacioncompra">
            <div class="form-group">
                <!-- checkbox -->
                <?php
                echo CHtml::radioButton('tipo-formula', false, array(
                    'value'=>'2',
                    'name'=>'tipo-formula',
                    'uncheckValue'=>null, 
                    'onClick' => 'mostrarTipoFormula(this.value)' 
                )); 
                ?> Cargar fórmula médica
                <?php echo CHtml::radioButton('tipo-formula', false, array(
                    'value'=>'1',
                    'name'=>'tipo-formula',
                    'uncheckValue'=>null, 
                    'onClick' => 'mostrarTipoFormula(this.value)' 
                )); ?> Adjuntar Información del Médico
                
            </div>
            <div id='describir-formula' class="display-none">
            <div class='row'>
                <div class="col-sm-4 ">
                    <?= $form->label($model, 'nombreMedico') ?>
                    <?= $form->textField($model, 'nombreMedico', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('nombreMedico'))) ?>
                    <?php echo $form->error($model, 'nombreMedico'); ?>
                </div>
                <div class="col-sm-4 ">
                    <?= $form->label($model, 'institucion') ?>
                    <?= $form->textField($model, 'institucion', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('institucion'))) ?>
                    <?php echo $form->error($model, 'nombreMedico'); ?>
                </div>
                <div class="col-sm-4 ">
                    <?= $form->label($model, 'registroMedico') ?>
                    <?= $form->textField($model, 'registroMedico', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('registroMedico'))) ?>
                    <?php echo $form->error($model, 'registroMedico'); ?>
                </div>
            </div>
            <div class="space-2"></div>
            <div class='row'>
                <div class="col-sm-4 ">
                    <?= $form->label($model, 'telefono') ?>
                    <?= $form->textField($model, 'telefono', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('telefono'))) ?>
                    <?php echo $form->error($model, 'telefono'); ?>
                </div>
				<div class="col-sm-4 ">
                    <?= $form->label($model, 'correoElectronico') ?>
                    <?= $form->textField($model, 'correoElectronico', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('correoElectronico'))) ?>
                    <?php echo $form->error($model, 'correoElectronico'); ?>
                </div>
            </div>
            </div>
            <div id='anexar-formula' class="display-none">
            <div class="space-2"></div>
            <label>Se debe adjuntar la fórmula médica escaneada, o la imagen tomada desde el celular o cámara fotográfica, o el archivo PDF que la contenga.</label>
            <div class='row'>
                <div class="col-sm-12">
                    <?php echo $form->labelEx($model, 'formulaMedica', array()); ?>
                    <?php echo CHtml::activeFileField($model, 'formulaMedica', array('value' => $model->formulaMedica)); ?>
                    <?php echo $form->error($model, 'formulaMedica', array( 'class' => "rojo")); ?>
                </div>
            </div>
            </div>
            <div class="space-2"></div>
            <div class='row'>
                <div class="col-sm-12 ">
                    <button class="editar" id="btn-adicionar-formula">Adicionar Formula</button>
                </div>
            </div>
            <div id='formulasAdicionadas'>
                <?php
                // Lista de formulas adicionadas
                $this->renderPartial('_d_formulasMedicasAdicionadas');
                ?>
            </div>
        </div>
        </fielset>
        <?php
        // $this->endWidget()?>