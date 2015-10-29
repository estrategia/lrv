<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <?php foreach ($mensajes as $idx => $mensaje): ?>
        <div class="alert alert-<?php echo $idx ?> alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $mensaje ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<div class="box-inner">
    <div class="box-header well">
        <div class="col-lg-1">
            <h2><i class="glyphicon glyphicon-file"></i> Modulos</h2>
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
                <?php echo $form->labelEx($model, 'tipo'); ?>
                <?php echo $form->dropDownList($model, 'tipo', Yii::app()->params->callcenter['modulosConfigurados']['tiposModulos'],  array('class' => 'tipo form-control')); ?>
                <?php echo $form->error($model, 'tipo'); ?>
            </div>
            
            <div class="form-group"> <!-- calendario -->
                <?php echo $form->labelEx($model, 'descripcion'); ?>
                <?php echo $form->textField($model, 'descripcion', array('class' => 'descripcion form-control', 'size' => 20, 'maxlength' => 20, )); ?>
                <?php echo $form->error($model, 'descripcion'); ?>
            </div>
            
            <div class="form-group"> <!-- calendario -->
                <?php echo $form->labelEx($model, 'inicio'); ?>
               <?php 
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'inicio',
                        'language' => 'es',
                        'options' => array(
                            'showAnim' => 'slide',
                            'dateFormat' => 'yy-mm-dd',
                            "changeYear" => true,
                            "changeMonth" => true,
                            "yearRange" => Date("Y").":".(Date("Y")+1)
                        ),
                        'htmlOptions' => array(
                            'class' => 'form-control',
                            'size' => '10',
                            'maxlength' => '10',
                            'placeholder' => 'yyyy-mm-dd',
                        ),
                    ));
                ?>
                <?php echo $form->error($model, 'inicio'); ?>
            </div>
            
            <div class="form-group"> <!-- calendario -->
                <?php echo $form->labelEx($model, 'fin'); ?>
                <?php 
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'fin',
                        'language' => 'es',
                        'options' => array(
                            'showAnim' => 'slide',
                            'dateFormat' => 'yy-mm-dd',
                            "changeYear" => true,
                            "changeMonth" => true,
                            "yearRange" => Date("Y").":".(Date("Y")+1)
                        ),
                        'htmlOptions' => array(
                            'class' => 'form-control',
                            'size' => '10',
                            'maxlength' => '10',
                            'placeholder' => 'yyyy-mm-dd',
                        ),
                    ));
                ?>
                <?php echo $form->error($model, 'fin'); ?>
            </div>
            
            <div class="form-group">
                 <!-- checkbox -->
                <?php echo $form->labelEx($model, 'dias'); ?>
                <?php  echo $form->checkboxList($model, 'dias', Yii::app()->params->callcenter['modulosConfigurados']['diasSemana'],array('class' => 'dias','style' => 'display:block'))?>
                <?php echo $form->error($model, 'dias'); ?>
            </div>
            
            <div class="form-group">
                 <!-- checkbox -->
                <?php echo $form->labelEx($model, 'orden'); ?>
                <?php  echo $form->numberField($model, 'orden', Yii::app()->params->callcenter['modulosConfigurados']['diasSemana'],array('class' => 'orden','style' => 'display:block'))?>
                <?php echo $form->error($model, 'orden'); ?>
            </div>
            <?php echo CHtml::submitButton('Guardar Módulo', array('class' => "btn btn-default")); ?>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>