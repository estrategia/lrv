
    <div class="box-inner">
        <div class="box-header well">
            <div class="col-lg-1">
                <h2>  Tipos Bonos</h2>
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
                <?php echo $form->labelEx($model, 'concepto'); ?>
                <?php echo $form->textField($model, 'concepto', array('class' => 'concepto form-control',)); ?>
                <?php echo $form->error($model, 'concepto'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'tipo'); ?><div class="space-1"></div>
                <?php echo $form->dropDownList($model, 'tipo', Yii::app()->params->callcenter['bonos']['tipoConfiguracion'], array('id' => 'tipo_bono', 'class' => 'form-control')) ?>
                <?php echo $form->error($model, 'tipo'); ?>
            </div>
            <div class="form-group"> 
                <?php echo $form->labelEx($model, 'estado'); ?>
                <?php echo $form->dropDownList($model, 'estado', Yii::app()->params->callcenter['bonos']['estadoNombre'], array('id' => 'estado', 'class' => 'form-control')) ?>
                <?php echo $form->error($model, 'estado'); ?>
            </div>
            <div style="height: 10px"></div>
            <div id='tipo_1' style="display:<?php echo ($model->tipo != 2)? "block":"none";?>">
                <div class="form-group"> 
                    <?php echo $form->labelEx($model, 'cuenta'); ?>
                    <?php echo $form->textField($model, 'cuenta', array('class' => 'cuenta form-control',)); ?>
                    <?php echo $form->error($model, 'cuenta'); ?>
                </div>

                <div class="form-group"> 
                    <?php echo $form->labelEx($model, 'formaPago'); ?>
                    <?php echo $form->textField($model, 'formaPago', array('class' => 'formaPago form-control',)); ?>
                    <?php echo $form->error($model, 'formaPago'); ?>
                </div>
            </div>
            <div id='tipo_2' style="display:<?php echo ($model->tipo == 2)? "block":"none";?>">
                <div class="form-group"> <!-- calendario -->
                    <?php echo $form->labelEx($model, 'fechaIni'); ?>
                    <?php
                    $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
                        'model' => $model,
                        'attribute' => 'fechaIni',
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
                            "yearRange" => Date("Y") . ":" . (Date("Y") + 1)
                        ),
                        'htmlOptions' => array(
                            'class' => 'form-control',
                            'size' => '10',
                            'maxlength' => '10',
                            'placeholder' => 'yyyy-mm-dd hh:mm',
                        ),
                    ));
                    ?>
                    <?php echo $form->error($model, 'fechaIni'); ?>
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
                            "changeYear" => true,
                            "changeMonth" => true,
                            'hourMin' => 0,
                            'hourMax' => 24,
                            'minuteMin' => 0,
                            'minuteMax' => 60,
                            'timeFormat' => 'hh:mm',
                            "yearRange" => Date("Y") . ":" . (Date("Y") + 1)
                        ),
                        'htmlOptions' => array(
                            'class' => 'form-control',
                            'size' => '10',
                            'maxlength' => '10',
                            'placeholder' => 'yyyy-mm-dd',
                        ),
                    ));
                    ?>
                    <?php echo $form->error($model, 'fechaFin'); ?>
                </div>
                <div class="form-group"> <!-- calendario -->
                        <?php echo $form->labelEx($model, 'cantidadUso'); ?>
                        <?php echo $form->textField($model, 'cantidadUso', array('id' => 'cantidadUso', 'class' => 'cantidadUso form-control')); ?>
                        <?php echo $form->error($model, 'cantidadUso'); ?>
                </div>
                <div class="form-group">
                        <!-- checkbox -->
                        <?php echo $form->labelEx($model, 'valorBono'); ?><div class="space-1"></div>
                        <?php echo $form->textField($model, 'valorBono', array('id' => 'valorBono', 'class' => 'form-control')) ?>
                        <?php echo $form->error($model, 'valorBono'); ?>
                </div>
                <div class="form-group">
                        <!-- checkbox -->
                        <?php echo $form->labelEx($model, 'valorMinCompra'); ?><div class="space-1"></div>
                        <?php echo $form->textField($model, 'valorMinCompra', array('id' => 'valorMinCompra', 'class' => 'form-control')) ?>
                        <?php echo $form->error($model, 'valorMinCompra'); ?>
                </div>
                <div class="form-group">
                        <!-- checkbox -->
                        <?php echo $form->labelEx($model, 'codigoUso'); ?><div class="space-1"></div>
                        <?php echo $form->textField($model, 'codigoUso', array('id' => 'codigoUso', 'class' => 'form-control')) ?>
                        <?php echo $form->error($model, 'codigoUso'); ?>
                </div>
            </div>    
            <div class="col-md-12">
                    <div class="form-group">
                        <?php echo CHtml::submitButton('Guardar Bono', array('class' => "btn btn-default")); ?>
                    </div>
            </div>
                <?php $this->endWidget(); ?>
        </div>
      </div>
  </div>