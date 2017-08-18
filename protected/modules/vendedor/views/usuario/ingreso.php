
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
        <div class="ui-field-container">
                    <?php echo $form->labelEx($model, 'condiciones', array('class' => 'c_cond_rg')); ?>
                    <?php echo $form->checkBox($model, 'condiciones', array('data-mini' => 'true')); ?>
                <?php echo $form->error($model, 'condiciones'); ?>
        </div>
    </fieldset>
    <?php echo CHtml::link('Ver condiciones', "#dialog-condiciones", array('class' => 'c_olv_pass', 'data-transition' => 'flip')); ?>
    <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
        Ingresar
        <input type="button" data-vendedor='autenticar' data-enhanced="true" value="Ingresar">
    </div>
	<?php $this->extraPageList[] = $this->renderPartial('/sitio/condicionesDialog', null, true); ?>
    <?php $this->endWidget(); ?>
</div>