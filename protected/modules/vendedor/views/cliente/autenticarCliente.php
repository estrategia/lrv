
<div class="ui-body-c">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'enableClientValidation' => true,
        //'action' => Yii::app()->createUrl('/usuario/autenticar'),
        'htmlOptions' => array(
            'id' => "form-autenticar", 'class' => "ui-bar ui-bar-c ui-corner-all", 'data-ajax'=>"false"
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
    <fieldset>
        <div class="ui-field-container" data-theme="c">
            <?php echo $form->labelEx($model, 'identificacionUsuario', array('class' => 'ui-hidden-accessible')); ?>
            <?php echo $form->numberField($model, 'identificacionUsuario', array('placeholder' => $model->getAttributeLabel('identificacionUsuario'))); ?>
            <?php echo $form->error($model, 'identificacionUsuario'); ?>
            <?php echo CHtml::hiddenField('identicacionCliente', "", array('id' => 'identificacionCliente'));?>
        </div>
    </fieldset>
    <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
        Buscar cliente
        <input type="button" data-role='buscar-cliente' data-enhanced="true" value="Buscar">
    </div>
    
    <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
        Cliente invitado
        <input type="button" data-role='cliente-invitado' data-enhanced="true" value="Buscar">
    </div>
    <div id="informacionCliente"></div>
    <?php $this->endWidget(); ?>
</div>