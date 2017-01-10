<?php $form = $this->beginWidget('CActiveForm', array(
    // 'id'=>'plantillas-form',
    // // 'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
)); ?>

<?php echo $form->errorSummary($modelo); ?>

  <div class="row">
    <div class="form-group">
      <?php echo $form->labelEx($modelo,'contenido'); ?>
      <?php
        $this->widget('application.widgets.editMe.widgets.ExtEditMe', array(
          'model' => $modelo,
          'attribute' => 'contenido',
        ));
      ?>
      <?php echo $form->error($modelo,'contenido'); ?>
    </div>
  </div>

  <div class="row submit">
    <?php echo CHtml::submitButton('Actualizar', array('class' => 'btn btn-default')); ?>
  </div>

<?php $this->endWidget(); ?>