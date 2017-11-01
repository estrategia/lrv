<div data-role="tipoentrega-habilitar" data-habilitar="<?php echo Yii::app()->params->entrega['tipo']['domicilio'] ?>" class="center center-verticaly">
    <?php
        $form = $this->beginWidget('CActiveForm', array(
            'enableClientValidation' => true,
            'id' => "form-direccion-pagoinvitado",
            'htmlOptions' => array(
                'class' => 'form-horizontal'
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

        <div class="form-group form-group-sm">
            <?php echo $form->labelEx($modelPago, 'nombre', array('class' => 'col-md-5 control-label')); ?>
            <div class="col-md-7">
                <?php echo $form->textField($modelPago, 'nombre', array('class' => 'form-control', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('nombre'))); ?>
                <?php echo $form->error($modelPago, 'nombre', array('class' => 'text-danger')); ?>
            </div>
        </div>
        
        <?php $this->endWidget(); ?>
</div>