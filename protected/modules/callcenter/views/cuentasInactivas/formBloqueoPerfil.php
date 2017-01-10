
    <div class="box-inner">
        <div class="box-header well">
            <div class="col-lg-1">
                <h2>  Bloqueo perfil</h2>
            </div>
        </div>
        <div class="box-content row">
        <div class="col-lg-12 col-md-12">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'enableClientValidation' => true,
                'enableAjaxValidation' => false,
                'htmlOptions' => array(
                    'id' => "remision-form",
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
            <p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

            <?php echo $form->errorSummary($model); ?>

			<div class="form-group">
                <?php echo $form->labelEx($model, 'perfil'); ?><div class="space-1"></div>
                <?php echo $form->dropDownList($model, 'perfil', CHtml::listData(Perfil::model()->findAll(),'codigoPerfil','nombrePerfil'), array('class' => 'form-control')) ?>
                <?php echo $form->error($model, 'perfil'); ?>
            </div>
            
            <div class="form-group">
                <?php echo $form->labelEx($model, 'diasBloqueo'); ?>
                <?php echo $form->textField($model, 'diasBloqueo', array('class' => 'diasBloqueo form-control',)); ?>
                <?php echo $form->error($model, 'diasBloqueo'); ?>
            </div>

            <div class="form-group"> 
                <?php echo $form->labelEx($model, 'cantidadCompras'); ?>
                <?php echo $form->textField($model, 'cantidadCompras',  array('class' => 'cantidadCompras form-control')) ?>
                <?php echo $form->error($model, 'cantidadCompras'); ?>
            </div>
         
          	<div class="form-group"> 
                <?php echo $form->labelEx($model, 'acumuladoCompras'); ?>
                <?php echo $form->textField($model, 'acumuladoCompras', array('class' => 'acumuladoCompras form-control',)); ?>
                <?php echo $form->error($model, 'acumuladoCompras'); ?>
            </div>
            <div class="col-md-12">
                    <div class="form-group">
                        <?php echo CHtml::submitButton('Guardar', array('class' => "btn btn-default")); ?>
                    </div>
            </div>
                <?php $this->endWidget(); ?>
        </div>
      </div>
  </div>