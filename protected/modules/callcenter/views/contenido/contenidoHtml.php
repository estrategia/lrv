<div class="box-inner">
	<div class="box-content row">
        <div class="col-lg-12 col-md-12">
            <p class="note">Campos con <span class="required">*</span> son obligatorios.</p>
            <?php if(!isset($listaProductos) || !$listaProductos): ?>

            <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'enableClientValidation' => true,
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array(
                        'id' => "contenido-html-form",
                        'role' => 'form',
                    ),
                    //'action' => Yii::app()->createUrl('/callcenter/contenido/crearcontenidohtml'),
                    'errorMessageCssClass' => 'has-error',
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                        'validateOnChange' => true,
                        'errorCssClass' => 'has-error',
                        'successCssClass' => 'has-success',
                    ))
                );
            ?>
            <?php endif; ?>


            <?php echo CHtml::errorSummary($model); ?>
            
            <div class="form-group">
                <?php echo CHtml::activeLabelEx($model, 'contenido'); ?>
                <?php echo CHtml::activeTextArea($model, 'contenido',  array('class' => 'tipo form-control', 'data-role' => 'modulo-contenido-html')); ?>
                <?php //echo CHtml::error($model, 'contenido'); ?>
                <?php echo CHtml::activeHiddenField($model, 'idModulo'); ?>
            </div>
        </div>
    </div>
    
    <?php if(isset($listaProductos) && $listaProductos): ?>
    	<?php $this->renderPartial('contenidoCrearListaProductos', array("model" => $model, 'arrayMarcas' => $arrayMarcas)); ?>
    <?php else: ?>
        <div class="row">
            <?php echo CHtml::submitButton('Guardar Módulo', array('class' => "btn btn-default")); ?>
            <?php $this->endWidget(); ?>
        </div>
    <?php endif; ?>
</div>