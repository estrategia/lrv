<div class="center center-verticaly">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'form-pago-entrega',
        'enableClientValidation' => true,
        //'action' => Yii::app()->createUrl('/carro/pagar', array('paso' => $modelPago->getScenario(), 'post' => 'true')),
        'htmlOptions' => array(
        //'class' => "", 'data-ajax' => "false"
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


    <?php //echo $form->labelEx($modelPago, 'fechaEntrega', array('class' => 'control-label')); ?>
    <?php if(Yii::app()->shoppingCart->getStoredItemsCount() > 0 && Yii::app()->shoppingCart->getItemsCountNormal() == 0):?>
    	<?php $horaEntrega = Yii::app()->shoppingCart->getHourStore();?>
    	<?php echo $form->hiddenField($modelPago, 'fechaEntrega', array('encode' => false, 'readonly' => 'true', 'value' => $horaEntrega['value'], 'placeholder' => $modelPago->getAttributeLabel('fechaEntrega'), 'class' => 'form-control date-time', 'style' => "border-radius:0px;"));?>
    	<?php echo $form->textField($modelPago, 'fechaEntrega', array('encode' => false, 'disabled' => 'true', 'value' => $horaEntrega['label'], 'placeholder' => $modelPago->getAttributeLabel('fechaEntrega'), 'class' => 'form-control date-time', 'style' => "border-radius:0px;"));?>
    	<?php echo $form->error($modelPago, 'fechaEntrega', array('class' => 'text-danger')); ?>
    <?php else:?>
    <?php echo $form->dropDownList($modelPago, 'fechaEntrega', CHtml::listData($listHorarios, 'fecha', 'etiqueta'), array('encode' => false, 'prompt' => '[Seleccione Fecha y Hora de Entrega]', 'placeholder' => $modelPago->getAttributeLabel('fechaEntrega'), 'class' => 'form-control date-time', 'style' => "border-radius:0px;")); ?>
    <?php echo $form->error($modelPago, 'fechaEntrega', array('class' => 'text-danger')); ?>
	<?php endif;?>

    <?php $this->endWidget(); ?>
</div>

