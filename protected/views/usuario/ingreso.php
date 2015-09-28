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
            <?php echo $form->labelEx($model, 'username', array('class' => 'ui-hidden-accessible')); ?>
            <?php echo $form->numberField($model, 'username', array('placeholder' => $model->getAttributeLabel('username'))); ?>
            <?php echo $form->error($model, 'username'); ?>
        </div>
        <div class="ui-field-container" data-theme="c">
            <?php echo $form->labelEx($model, 'password', array('class' => 'ui-hidden-accessible')); ?>
            <?php echo $form->passwordField($model, 'password', array('placeholder' => $model->getAttributeLabel('password'))); ?>
            <?php echo $form->error($model, 'password'); ?>
        </div>
    </fieldset>
    <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
        Ingresar
        <input type="button" data-registro="autenticar" data-enhanced="true" value="Ingresar">
    </div>

    <?php $this->endWidget(); ?>
</div>