<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <?php foreach ($mensajes as $idx => $mensaje): ?>
        <div class="alert alert-<?php echo $idx ?> alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $mensaje ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<div class="box-inner">
	<?php
        $form = $this->beginWidget('CActiveForm', array(
            'enableClientValidation' => true,
            'enableAjaxValidation' => false,
            'htmlOptions' => array(
                'id' => "contenido-html-form",
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
    <div class="box-content row">
        <div class="col-lg-12 col-md-12">
            <p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

            <?php echo $form->errorSummary($model); ?>
            
            <div class="form-group">
                <?php echo $form->labelEx($model, 'contenido'); ?>
                <?php echo $form->textArea($model, 'contenido',  array('class' => 'tipo form-control', 'data-role' => 'modulo-contenido-html')); ?>
                <?php echo $form->error($model, 'contenido'); ?>
            </div>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-2 col-md-offset-10">
        	<?php echo CHtml::submitButton('Guardar Módulo', array('class' => "btn btn-default")); ?>
        </div>
    </div>
    <?php $this->endWidget(); ?>
    <?php if(isset($listaProductos) && $listaProductos): ?>
    	<?php $this->renderPartial('contenidoCrearListaProductos', array("model" => $model)); ?>
    <?php endif; ?>
</div>