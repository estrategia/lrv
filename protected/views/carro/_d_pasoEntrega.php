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
    <?php echo $form->dropDownList($modelPago, 'fechaEntrega', CHtml::listData($listHorarios, 'fecha', 'etiqueta'), array('encode' => false, 'prompt' => '[Seleccione Fecha y Hora de Entrega]', 'placeholder' => $modelPago->getAttributeLabel('fechaEntrega'), 'class' => 'form-control date-time', 'style' => "border-radius:0px;")); ?>
    <?php echo $form->error($modelPago, 'fechaEntrega', array('class' => 'text-danger')); ?>


    <?php $this->endWidget(); ?>
</div>

