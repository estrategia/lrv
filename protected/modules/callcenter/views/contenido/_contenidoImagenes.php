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
                <?php echo $form->labelEx($modelImagen, 'nombre'); ?>
                <?php echo $form->textField($modelImagen, 'nombre', array('class' => 'nombre form-control')); ?>
                <?php echo $form->error($modelImagen, 'nombre'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($modelImagen, 'orden'); ?>
                <?php echo $form->textField($modelImagen, 'orden', array('class' => 'orden form-control')); ?>
                <?php echo $form->error($modelImagen, 'orden'); ?>
            </div>

           <div class="form-group">
                <?php echo $form->labelEx($modelImagen, 'tipoContenido'); ?>
                <?php echo $form->dropDownList($modelImagen, 'tipoContenido', Yii::app()->params->callcenter['modulosConfigurados']['tiposContenidos'],  
                                                array('prompt' => 'Seleccione...', 'class' => 'tipoContenido form-control', 'data-role' => 'validar-contenido')); ?>
                <?php echo $form->error($modelImagen, 'tipoContenido'); ?>
            </div>
            <div id='div-contenido-imagen' style="display: none">
                    <div class="form-group">
                        <?php echo $form->labelEx($modelImagen, 'contenido'); ?>
                        <?php echo $form->textArea($modelImagen, 'contenido', array('class' => 'contenido form-control')); ?>
                        <?php echo $form->error($modelImagen, 'contenido'); ?>
                    </div>
                
                    <div class="form-group">
                        <?php echo $form->labelEx($modelImagen, 'contenidoMovil'); ?>
                        <?php echo $form->textArea($modelImagen, 'contenidoMovil', array('class' => 'contenidoMovil form-control')); ?>
                        <?php echo $form->error($modelImagen, 'contenidoMovil'); ?>
                    </div>
                
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
        'listaImagenes' => $listaImagenes
    ));
    
?>
</div>