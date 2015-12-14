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

<div class="col-md-12">
    <div class="row">
        <?php //echo $form->labelEx($modelPago, 'fechaEntrega', array('class' => 'control-label')); ?>
        <?php echo $form->dropDownList($modelPago, 'fechaEntrega', CHtml::listData($listHorarios, 'fecha', 'etiqueta'), array('encode' => false, 'prompt' => '[Seleccione Fecha y Hora de Entrega]', 'placeholder' => $modelPago->getAttributeLabel('fechaEntrega'), 'class' => 'form-control date-time', 'style' => "border-radius:0px;")); ?>
        <?php echo $form->error($modelPago, 'fechaEntrega', array('class' => 'text-danger')); ?>
    </div>
    <div class="space-1"></div>
</div>

<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <div id="clock_id" class="center"></div>
        </div>
        <div class="col-md-6 text-center" style="background-color: #B8B7B7; height: 200px">
            <div id="div-reloj-seleccion" style="font-weight: bolder;font-size: 2em; text-transform:capitalize;"></div>
        </div>
    </div>
    <div class="space-1"></div>
</div>

<?php $this->endWidget(); ?>

<?php Yii::app()->clientScript->registerScript('draw_clock', 'draw_clock()', CClientScript::POS_END); ?>

<?php if (!empty($modelPago->fechaEntrega)): ?>
    <?php Yii::app()->clientScript->registerScript('update_clock', "update_clock('$modelPago->fechaEntrega')", CClientScript::POS_END); ?>
<?php endif; ?>



