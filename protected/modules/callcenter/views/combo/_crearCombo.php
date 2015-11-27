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
                <?php echo $form->labelEx($model, 'descripcionCombo'); ?>
                <?php echo $form->textField($model, 'descripcionCombo', array('class' => 'tipo form-control')); ?>
                <?php echo $form->error($model, 'descripcionCombo'); ?>
            </div>
            
            <div class="form-group"> <!-- calendario -->
                <?php echo $form->labelEx($model, 'fechaInicio'); ?>
               <?php 
                    $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
                        'model' => $model,
                        'attribute' => 'fechaInicio',
                        'language' => 'es',
                        'options' => array(
                            'showAnim' => 'slide',
                            'dateFormat' => 'yy-mm-dd',
                            'timeFormat' => 'hh:mm',
                            "changeYear" => true,
                            "changeMonth" => true,
                            "changeHour" => true,
                            'hourMin' => 0,
                            'hourMax' => 24,
                            'minuteMin' => 0,
                            'minuteMax' => 60,
                            'timeFormat' => 'hh:mm',
                            "yearRange" => Date("Y").":".(Date("Y")+1)
                        ),
                        'htmlOptions' => array(
                            'class' => 'form-control',
                            'size' => '10',
                            'maxlength' => '10',
                            'placeholder' => 'yyyy-mm-dd hh:mm',
                        ),
                    ));
                ?>
                <?php echo $form->error($model, 'fechaInicio'); ?>
            </div> 

            <div class="form-group"> <!-- calendario -->
                <?php echo $form->labelEx($model, 'fechaFin'); ?>
               <?php 
                    $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
                        'model' => $model,
                        'attribute' => 'fechaFin',
                        'language' => 'es',
                        'options' => array(
                            'showAnim' => 'slide',
                            'dateFormat' => 'yy-mm-dd',
                            'timeFormat' => 'hh:mm',
                            "changeYear" => true,
                            "changeMonth" => true,
                            "changeHour" => true,
                            'hourMin' => 0,
                            'hourMax' => 24,
                            'minuteMin' => 0,
                            'minuteMax' => 60,
                            'timeFormat' => 'hh:mm',
                            "yearRange" => Date("Y").":".(Date("Y")+1)
                        ),
                        'htmlOptions' => array(
                            'class' => 'form-control',
                            'size' => '10',
                            'maxlength' => '10',
                            'placeholder' => 'yyyy-mm-dd hh:mm',
                        ),
                    ));
                ?>
                <?php echo $form->error($model, 'fechaFin'); ?>
            </div> 

             <?php if(!$model->isNewRecord):?>
                <div class="form-group">
                     <!-- checkbox -->
                    <?php echo $form->labelEx($model, 'estadoCombo'); ?><div class="space-1"></div>
                    <?php echo $form->dropDownList($model, 'estadoCombo', Yii::app()->params->callcenter['modulosConfigurados']['estadosModulos'], array('class' => 'estado', 'class' => 'form-control'))?>
                    <?php echo $form->error($model, 'estadoCombo'); ?>
                </div>
            <?php endif;?>

            <div class="form-group">
                    <?php echo CHtml::submitButton('Guardar Combo', array('class' => "btn btn-default")); ?>
            </div>


  <?php $this->endWidget(); ?>