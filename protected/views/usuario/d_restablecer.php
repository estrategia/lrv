<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <ul class="messages">
        <?php foreach ($mensajes as $idx => $mensaje): ?>
            <li><div class="<?php echo $idx ?>-msg"><?php echo $mensaje ?></div></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div class="">
    <?php if ($objUsuario == null): ?>
        <h2> Este enlace ya no se encuentra disponible. </h2>
    <?php else: ?>
        <div class="row">
            <div class="col-md-12">
                    <span class="glyphicon glyphicon-chevron-right der" aria-hidden="true"></span>&nbsp;
                                <h4 style="display:inline-block;"> Restablecer contraseña</h4>
            </div>            
        </div>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'enableClientValidation' => true,
            'htmlOptions' => array(
                'id' => "form-restablecer", 'class' => "ui-bar ui-bar-a ui-corner-all", 'data-ajax'=>"false"
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
        <div class="row">
                <div class="col-md-4">
                    <?php echo $form->labelEx($model, 'clave', array('class' => 'ui-hidden-accessible')); ?>
                    <?php echo $form->passwordField($model, 'clave', array('placeholder' => $model->getAttributeLabel('clave'), 'autocomplete' => 'off','class'=>'form-control')); ?>
                    <?php echo $form->error($model, 'clave'); ?>
                </div>
        </div>
        <div class='space-1'></div>
        <div class="row">
                <div class="col-md-4">
                <?php echo $form->labelEx($model, 'claveConfirmar', array('class' => 'ui-hidden-accessible')); ?>
                <?php echo $form->passwordField($model, 'claveConfirmar', array('placeholder' => $model->getAttributeLabel('claveConfirmar'), 'autocomplete' => 'off','class'=>'form-control')); ?>
                <?php echo $form->error($model, 'claveConfirmar'); ?>
                </div>
        </div>
        <div class='space-1'></div>
            <?php echo $form->hiddenField($model, 'cedula'); ?>
        
        <?php /* echo CHtml::submitButton('Guardar'); */ ?>
        <div class="row">
            <div class="col-md-4">
               <input type="submit" class="btn btn-primary" data-enhanced="true" value="Guardar">
            </div>
        </div>
        <?php $this->endWidget(); ?>
    <?php endif; ?>
</div>