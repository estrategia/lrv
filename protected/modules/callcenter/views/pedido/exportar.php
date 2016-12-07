<?php
$idzona = 'ReporteAnalistaForm_IDZona_' . uniqid();
$idPdv = "ReporteAnalistaForm_IDPuntoDeVenta_" . uniqid();
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    //'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'class' => 'form-horizontal',
        'role' => 'form',
        'id' => 'reporte-pedidos-form'
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
        <?php echo $form->labelEx($model, 'fechaInicio', array('class' => 'control-label col-sm-2')); ?>
        <div class="col-sm-2">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'fechaInicio',
                'language' => 'es',
                'options' => array(
                    'showAnim' => 'slide',
                    'dateFormat' => 'yy-mm-dd',
                ),
                'htmlOptions' => array(
                    'class' => 'form-control input-sm',
                    'size' => '10',
                    'maxlength' => '10',
                    'placeholder' => 'yyyy-mm-dd',
                ),
            ));
            ?>
            </div>
        <?php echo $form->error($model, 'fechaInicio', array('class' => 'text-danger')); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'fechaFin', array('class' => 'control-label col-sm-2')); ?>
        <div class="col-sm-2">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'fechaFin',
                'language' => 'es',
                'options' => array(
                    'showAnim' => 'slide',
                    'dateFormat' => 'yy-mm-dd',
                ),
                'htmlOptions' => array(
                    'class' => 'form-control input-sm',
                    'size' => '10',
                    'maxlength' => '10',
                    'placeholder' => 'yyyy-mm-dd',
                ),
            ));
            ?>
        </div>
        <?php echo $form->error($model, 'fechaFin', array('class' => 'text-danger')); ?>
    </div>

<div class="space"></div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo CHtml::submitButton('Exportar', array('class' => 'btn btn-primary btn-sm')); ?>
    </div>
</div>



<?php $this->endWidget(); ?>
