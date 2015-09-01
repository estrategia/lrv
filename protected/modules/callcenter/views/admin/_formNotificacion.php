<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'id' => "notificacion-form",
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
    <?php echo $form->dropDownList($model, 'tipoObservacion', Yii::app()->params->callcenter['notificacion']['tipo'], array('prompt' => 'Seleccionar', 'class' => 'form-control', 'data-compra'=> $objCompra->idCompra)); ?>
    <?php echo $form->error($model, 'tipoObservacion'); ?>
</div>

<div class="form-group">
    <?php //echo $form->labelEx($model, 'observacion'); ?>
    <?php echo $form->textArea($model, 'observacion', array('class' => 'form-control', 'maxlength' => 1000, 'rows' => '10')); ?>
    <?php echo $form->error($model, 'observacion'); ?>
</div>

<?php echo $form->hiddenField($model, 'idCompra'); ?>

<?php
echo CHtml::ajaxSubmitButton('Guardar Observación', Yii::app()->createUrl('/callcenter/admin/observacionpedido'), array(
    'beforeSend' => new CJavaScriptExpression("function(){Loading.show(); $('#notificacion-form input[type=submit]').attr('disabled', 'disabled');}"),
    'success' => new CJavaScriptExpression("function(data){
                data = $.parseJSON(data);
                if(data.result=='ok'){
                    $('#notificacion-form')[0].reset();
                    $('#div-pedido-observaciones').html(data.response.htmlObservaciones);
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
    'complete' => new CJavaScriptExpression("function(){ $('#notificacion-form input[type=submit]').removeAttr('disabled');}"),
    'error' => new CJavaScriptExpression("function(jqXHR, textStatus, errorThrown){
                Loading.hide();
                alert('Error: ' + errorThrown);
            }")), array('id' => uniqid(), 'class' => 'btn btn-default',));
?>
<?php $this->endWidget(); ?>