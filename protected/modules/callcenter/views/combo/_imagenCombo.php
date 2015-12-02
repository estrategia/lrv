<?php
    $form = $this->beginWidget('CActiveForm', array(
         'enableClientValidation' => true,
         'htmlOptions' => array(
              'role' => 'form',
             'enctype' => 'multipart/form-data'
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
                <?php echo $form->labelEx($modelImagen, 'nombreImagen'); ?>
                <?php echo $form->textField($modelImagen, 'nombreImagen', array('class' => 'nombreImagen form-control')); ?>
                <?php echo $form->error($modelImagen, 'nombreImagen'); ?>
           </div>

           <div class="form-group">
                <?php echo $form->labelEx($modelImagen, 'tituloImagen'); ?>
                <?php echo $form->textField($modelImagen, 'tituloImagen', array('class' => 'tituloImagen form-control')); ?>
                <?php echo $form->error($modelImagen, 'tituloImagen'); ?>
           </div>

           <div class="form-group">
                <?php echo $form->labelEx($modelImagen, 'descripcionImagen'); ?>
                <?php echo $form->textArea($modelImagen, 'descripcionImagen', array('class' => 'descripcionImagen form-control')); ?>
                <?php echo $form->error($modelImagen, 'descripcionImagen'); ?>
           </div>
            
           <div class="form-group">
                <?php echo $form->labelEx($modelImagen, 'ordenImagen'); ?>
                <?php echo $form->textField($modelImagen, 'ordenImagen', array('class' => 'ordenImagen form-control')); ?>
                <?php echo $form->error($modelImagen, 'ordenImagen'); ?>
           </div>

           <div class="form-group">
                <?php echo $form->labelEx($modelImagen, 'tipoImagen'); ?>
                <?php echo $form->dropdownlist($modelImagen, 'tipoImagen',  Yii::app()->params->producto['tipoImagenSelect'] , array('class' => 'tipoImagen form-control')); ?>
                <?php echo $form->error($modelImagen, 'tipoImagen'); ?>
           </div>
         
           <div class='form-group'>   
                       <?php   echo   $form->labelEx($modelImagen, 'rutaImagen', array()); ?>
                       <?php   echo   CHtml::activeFileField($modelImagen, 'rutaImagen', array('value' => $modelImagen->rutaImagen)); ?>
                       <?php   echo   $form->error($modelImagen, 'rutaImagen', array());?>
           </div>

           <div class='form-group'>
                       <?php  echo      CHtml::submitButton('Guardar',array('id' => 'btnCargar','class' => 'btn btn-primary btn-large'), array('id' => 'btnCargar','class' => 'btn btn-primary btn-large'));?>
           </div>

<?php $this->endWidget(); ?>
<div id="lista-imagenes">
<?php 

    $this->renderPartial('_listaImagenes',array(
        'listaImagenes' => $model->listImagenesCombo
    ));
    
?>
</div>