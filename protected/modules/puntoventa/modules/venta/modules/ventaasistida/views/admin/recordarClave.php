<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'class' => 'form-inline',
        'id' => "clave-form",
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
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Por favor ingrese la cédula del usuario.</h3>
    </div>
    <div class="panel-body">

        <div class='row'>
            <div class='col-md-3'>
                <?php echo $form->textField($model, 'identificacionUsuario', array('placeholder' => $model->getAttributeLabel('identificacionUsuario'), 'class' => 'form-control', 'style' => 'width:100%')); ?>
            </div>
            <div class='col-md-2'>
                <?php echo CHtml::submitButton('Cambiar Clave', array('class' => "btn btn-default")); ?>
            </div>
            <div class='col-md-7'></div>
        </div>
        <div class='row'>
            <div class='col-md-3'>
                <?php echo $form->error($model, 'identificacionUsuario', array('class' => 'text-left text-danger')); ?>
            </div>
            <div class='col-md-2'></div>
            <div class='col-md-7'></div>
        </div>
        <?php if ($model->nuevaClave !== null): ?>
            <div class='row'>
                <div class='col-md-3'>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Nueva clave: </strong> <?php echo $model->nuevaClave ?>
                    </div>
                </div>
                <div class='col-md-9'></div>
            </div>
        <?php endif ?>




    </div>
</div>
<?php $this->endWidget(); ?>
