<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'form-pago-comentario',
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

<div class="form-group">
    <?php echo $form->labelEx($modelPago, 'comentario', array('class' => 'control-label')); ?>
    <?php echo $form->textArea($modelPago, 'comentario', array('class' => 'form-control', 'rows' => 3, 'data-countchar' => 'div-comentario-contador', 'maxlength' => 250, /* 'placeholder' => $modelPago->getAttributeLabel('comentario') */)); ?>
    <p>[Máximo 250 caracteres] <span id="div-comentario-contador"></span></p>
        <?php echo $form->error($modelPago, 'comentario', array('class' => 'text-danger')); ?>
</div>
<?php $this->endWidget(); ?>
<div class="bot-button">
    <button data-redirect="confirmacion" data-origin="informacion" id="btn-carropagar-siguiente" class="btn btn-primary">Continuar</button>
</div>