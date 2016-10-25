<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'id' => "observacion-form",
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

<div class="form-group">
    <?php echo $form->labelEx($model, 'tipoObservacion'); ?>
    <?php echo $form->dropDownList($model, 'tipoObservacion', $model->listTipoObservacion(), array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'tipoObservacion'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'estado', array('style' => 'display:block')); ?>
    <?php echo $form->radioButtonList($model, 'estado', Yii::app()->params->callcenter['observacion']['estado'], array('separator' => " | ")); ?>
    <?php echo $form->error($model, 'estado'); ?>
</div>

<div class="form-group">
    <?php //echo $form->labelEx($model, 'observacion'); ?>
    <?php echo $form->textArea($model, 'observacion', array('class' => 'form-control', 'maxlength' => 500, 'rows'=>5, 'style' => 'width:85%')); ?>
    <?php echo $form->error($model, 'observacion'); ?>
</div>

<?php echo $form->hiddenField($model, 'idCompra'); ?>

<?php
echo CHtml::ajaxSubmitButton('Guardar Observación', Yii::app()->createUrl('/callcenter/admin/observacionpedido'), array(
    'beforeSend' => new CJavaScriptExpression("function(){Loading.show(); $('#observacion-form input[type=submit]').attr('disabled', 'disabled');}"),
    'success' => new CJavaScriptExpression("function(data){
                data = $.parseJSON(data);
                if(data.result=='ok'){
                    $('#observacion-form')[0].reset();
                    $('#div-pedido-observaciones').html(data.response.htmlObservaciones);
                    if (data.response.htmlEncabezado) {
                        $('#div-encabezado-pedido').html(data.response.htmlEncabezado);
                    }
                }else if(data.result=='error'){
                    alert(data.response);
                }else{
                    $.each(data,function(element,error){
                        $('#'+element+'_em_').html(error);
                        $('#'+element+'_em_').css('display','block');
                    });
                }
                Loading.hide();
            }"),
    'complete' => new CJavaScriptExpression("function(){ $('#observacion-form input[type=submit]').removeAttr('disabled');}"),
    'error' => new CJavaScriptExpression("function(jqXHR, textStatus, errorThrown){
                Loading.hide();
                alert('Error: ' + errorThrown);
            }")), array('id' => uniqid(), 'class' => 'btn btn-default',));
?>
<?php $this->endWidget(); ?>









