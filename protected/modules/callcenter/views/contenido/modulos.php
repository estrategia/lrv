<?php if($model->isNewRecord): ?>
    <div class="box-inner">
        <div class="box-header well">
            <div class="col-lg-1">
                <h2><i class="glyphicon glyphicon-file"></i> Modulos</h2>
            </div>
        </div>
        <div class="box-content row">
<?php endif; ?>
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
                <?php echo $form->dropDownList($model, 'tipo', Yii::app()->params->callcenter['modulosConfigurados']['tiposModulos'],  array('class' => 'tipo form-control', 'disabled' => $model->isNewRecord ? false : true)); ?>
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
                    $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
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
                    $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker',array(
                        'model'=> $model, //Model object
                        'attribute'=>'fin', //attribute name
                        'mode'=>'datetime', //use "time","date" or "datetime" (default)
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
                <?php echo $form->labelEx($model, 'dias'); ?><div class="space-1"></div>
                <?php echo $form->checkboxList($model, 'dias', Yii::app()->params->callcenter['modulosConfigurados']['diasSemana'],array('class' => 'dias','style' => 'display:inline', 'separator' => '&nbsp;', 'template' => '<div class="col-md-1">{input}{label}</div>'))?>
                <?php echo $form->error($model, 'dias'); ?>
            </div>
            
            <?php if(!$model->isNewRecord):?>
                <div class="form-group">
                     <!-- checkbox -->
                    <?php echo $form->labelEx($model, 'estado'); ?><div class="space-1"></div>
                    <?php echo $form->dropDownList($model, 'estado', Yii::app()->params->callcenter['modulosConfigurados']['estadosModulos'], array('class' => 'estado', 'class' => 'form-control'))?>
                    <?php echo $form->error($model, 'estado'); ?>
                </div>
            <?php endif;?>
            
           <div class="col-md-12">
                <div class="form-group">
                    <?php echo CHtml::submitButton('Guardar Módulo', array('class' => "btn btn-default")); ?>
                </div>
           </div>
            <?php $this->endWidget(); ?>
        </div>
<?php if($model->isNewRecord): ?>
    </div>
</div>
<?php endif; ?>
