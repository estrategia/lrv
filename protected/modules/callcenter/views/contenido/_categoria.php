<?php
    $form = $this->beginWidget('CActiveForm', array(
         'enableClientValidation' => true,
         'enableAjaxValidation' => false,
         'htmlOptions' => array(
              'id' => "remision-form",
              'role' => 'form',
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
<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($ubicacionModel); ?>
<div class="form-group">
      <?php echo $form->labelEx($ubicacionModel, 'ubicacion'); ?>
      <?php echo $form->dropDownList($ubicacionModel, 'ubicacion', Yii::app()->params->callcenter['modulosConfigurados']['ubicacionModulos'],  array('prompt' => 'Seleccione..','data-role' => 'ubicacion-modulo','class' => 'tipo form-control', 'disabled' => $ubicacionModel->isNewRecord ? false : true)); ?>
      <?php echo $form->error($ubicacionModel, 'ubicacion'); ?>
</div>

<div id="ubicacion-categoria"></div>

<div class="form-group">
      <?php echo $form->labelEx($ubicacionModel, 'orden'); ?>
      <?php echo $form->textField($ubicacionModel, 'orden', array('class' => 'orden form-control', 'size' => 20, 'maxlength' => 20, )); ?>
      <?php echo $form->error($ubicacionModel, 'orden'); ?>
</div>

<?php echo CHtml::submitButton( 'Agregar' , array('class' => "btn btn-default")); ?>

<?php $this->endWidget(); ?>


<div class="space-1"></div>
<div class="panel-body">
	<div class="row">
		<div class="col-md-12" id="lista-ubicaciones">
			<?php $this->renderPartial('_listaUbicaciones',array('ubicaciones' => $ubicaciones))?>
		</div>
	</div>
</div>