
<?php
$form = $this->beginWidget('CActiveForm', array(
'enableClientValidation' => true,
 'enableAjaxValidation' => false,
 'htmlOptions' => array(
'id' => "operador-form",
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


<?php echo $form->errorSummary($model, null, null, array('class' => 'text-danger')); ?>

<div class="form-group">
    <?php echo $form->labelEx($model, 'inicio'); ?>
    <?php $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
                    'model' => $model,
                    'attribute' => 'inicio',
                    'language' => 'es',
                    'mode'=>'date'  ,
                    'options' => array(
                        'showAnim' => 'slide',
                        'dateFormat' => 'yy-mm-dd',
                        "changeYear" => true,
                        "changeMonth" => true,
                        "yearRange" => (Date("Y")-1) . ":" . (Date("Y"))
                    ),
                    'htmlOptions' => array(
                        'class' => 'form-control',
                        'size' => '10',
                        'placeholder' => 'yyyy-mm-dd',
                    ),
                ));?>
    <?php echo $form->error($model, 'inicio'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'fin'); ?>
    <?php $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
                    'model' => $model,
                    'attribute' => 'fin',
                    'language' => 'es',
                    'mode'=>'date'  ,
                    'options' => array(
                        'showAnim' => 'slide',
                        'dateFormat' => 'yy-mm-dd',
                        "changeYear" => true,
                        "changeMonth" => true,
                        "yearRange" => (Date("Y")-1) . ":" . (Date("Y"))
                    ),
                    'htmlOptions' => array(
                        'class' => 'form-control',
                        'size' => '10',
                        'placeholder' => 'yyyy-mm-dd',
                    ),
                ));?>
    <?php echo $form->error($model, 'fin'); ?>
</div>

<?php echo CHtml::submitButton('Generar', array('class' => "btn btn-default")); ?>


<?php $this->endWidget(); ?>
