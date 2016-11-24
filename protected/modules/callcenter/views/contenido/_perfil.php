 <?php
            $form = $this->beginWidget('CActiveForm', array(
                'enableClientValidation' => true,
                'enableAjaxValidation' => false,
                'htmlOptions' => array(
                    'id' => "perfil-form",
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
                         <!-- checkbox -->
                    <?php echo $form->labelEx($modelPerfil, 'idPerfil'); ?><div class="space-1"></div>
                    <?php echo $form->checkboxList($modelPerfil, 'idPerfil', CHtml::listData($perfiles,'codigoPerfil','nombrePerfil'), array('class' => 'dias','style' => 'display:inline', 'separator' => '&nbsp;', 'template' => '<div class="col-md-1">{input}{label}</div>'))?> <br />
                    <?php echo $form->error($modelPerfil, 'idPerfil'); ?>
        </div>

        <div class="col-md-12">
                <div class="form-group">
                    <?php echo CHtml::submitButton('Guardar Perfiles', array('class' => "btn btn-default")); ?>
                </div>
           </div>

 <?php $this->endWidget(); ?>

