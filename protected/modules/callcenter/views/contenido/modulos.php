<?php if ($model->isNewRecord): ?>
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
                <?php echo $form->dropDownList($model, 'tipo', Yii::app()->params->callcenter['modulosConfigurados']['tiposModulos'], array('encode'=>false, 'class' => 'tipo form-control', 'disabled' => $model->isNewRecord ? false : true)); ?>
                <?php echo $form->error($model, 'tipo'); ?>
            </div>

            <div class="form-group"> <!-- calendario -->
                <?php echo $form->labelEx($model, 'descripcion'); ?>
                <?php echo $form->textField($model, 'descripcion', array('class' => 'descripcion form-control',)); ?>
                <?php echo $form->error($model, 'descripcion'); ?>
            </div>

            <div class="form-group"> <!-- calendario -->
                <?php echo $form->labelEx($model, 'titulo'); ?>
                <?php echo $form->textField($model, 'titulo', array('class' => 'titulo form-control',)); ?>
                <?php echo $form->error($model, 'titulo'); ?>
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
                <?php echo $form->error($model, 'inicio'); ?>
            </div> 
            <div class="form-group"> <!-- calendario -->
                <?php echo $form->labelEx($model, 'fin'); ?>
                <?php
                $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
                    'model' => $model,
                    'attribute' => 'fin',
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
                <?php echo $form->error($model, 'fin'); ?>
            </div>
            <div class="form-group">
                <!-- checkbox -->
                <?php echo $form->labelEx($model, 'dias'); ?><div class="space-1"></div>
                <?php echo $form->checkboxList($model, 'dias', Yii::app()->params->callcenter['modulosConfigurados']['diasSemana'], array('class' => 'dias', 'style' => 'display:inline', 'separator' => '&nbsp;', 'template' => '<div class="col-md-1">{input}{label}</div>')) ?>
                <?php echo $form->error($model, 'dias'); ?>
            </div>
            <div style="height: 10px"></div>
            
            <?php if ($model->tipo == ModulosConfigurados::TIPO_PRODUCTOS_CUADRICULA || $model->tipo == ModulosConfigurados::TIPO_PRODUCTOS): ?>
                <div class="form-group">
                    <!-- checkbox -->
                    <?php echo $form->labelEx($model, 'aleatorio'); ?><div class="space-1"></div>
                    <?php echo $form->dropDownList($model, 'aleatorio', Yii::app()->params->callcenter['modulosConfigurados']['booleanos'], array('prompt' => 'Seleccione...', 'id' => 'aleatorio', 'data-role' => 'aleatorio', 'class' => 'form-control')) ?>
                    <?php echo $form->error($model, 'aleatorio'); ?>
                </div>
                <div class="form-group"> <!-- calendario -->
                    <?php echo $form->labelEx($model, 'lineas'); ?>
                    <?php echo $form->textField($model, 'lineas', array('id' => 'lineas', 'class' => 'lineas form-control', 'disabled' => ($model->aleatorio == 1) ? false : true)); ?>
                    <?php echo $form->error($model, 'lineas'); ?>
                </div>
                <div class="form-group">
                    <!-- checkbox -->
                    <?php echo $form->labelEx($model, 'agotado'); ?><div class="space-1"></div>
                    <?php echo $form->dropDownList($model, 'agotado', Yii::app()->params->callcenter['modulosConfigurados']['booleanos'], array('id' => 'agotado', 'class' => 'form-control')) ?>
                    <?php echo $form->error($model, 'agotado'); ?>
                </div>
            <?php endif; ?>
            <?php if ($model->tipo == ModulosConfigurados::TIPO_PRODUCTOS_BANNER): ?>
                <div class="form-group">
                    <!-- checkbox -->
                    <?php echo $form->labelEx($model, 'agotado'); ?><div class="space-1"></div>
                    <?php echo $form->dropDownList($model, 'agotado', Yii::app()->params->callcenter['modulosConfigurados']['booleanos'], array('id' => 'agotado', 'class' => 'form-control')) ?>
                    <?php echo $form->error($model, 'agotado'); ?>
                </div>
            <?php endif; ?>
            <?php if (!$model->isNewRecord): ?>
                <div class="form-group">
                    <!-- checkbox -->
                    <?php echo $form->labelEx($model, 'estado'); ?><div class="space-1"></div>
                    <?php echo $form->dropDownList($model, 'estado', Yii::app()->params->callcenter['modulosConfigurados']['estadosModulos'], array('class' => 'estado', 'class' => 'form-control')) ?>
                    <?php echo $form->error($model, 'estado'); ?>
                </div>
            <?php endif; ?>
            <div class="form-group">
                <!-- checkbox -->
                <?php echo $form->labelEx($model, 'autenticacion'); ?><div class="space-1"></div>
                <?php echo $form->dropDownList($model, 'autenticacion', Yii::app()->params->callcenter['modulosConfigurados']['autenticacion']['estados'], array('encode' => false, 'id' => 'autenticacion', 'class' => 'form-control')) ?>
                <?php echo $form->error($model, 'autenticacion'); ?>
            </div>
            <?php if ($model->tipo == ModulosConfigurados::TIPO_MENU_CONFIGURABLE || $model->tipo == ModulosConfigurados::TIPO_GRUPO_MODULOS): ?>
			<div class="form-group">
                <!-- checkbox -->
                <?php echo $form->labelEx($model, 'urlAmigable'); ?><div class="space-1"></div>
                <?php echo $form->textField($model, 'urlAmigable', array('encode' => false, 'id' => 'autenticacion', 'class' => 'form-control')) ?>
                <?php echo $form->error($model, 'urlAmigable'); ?>
            </div>
            <div class="form-group">
                <!-- checkbox -->
                <?php echo $form->labelEx($model, 'esMundo'); ?><div class="space-1"></div>
                <?php echo $form->dropDownList($model, 'esMundo', array(0 => 'No', 1 => 'Si'), array('encode' => false, 'id' => 'autenticacion', 'class' => 'form-control')) ?>
                <?php echo $form->error($model, 'esMundo'); ?>
            </div>
			<?php endif; ?>
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo CHtml::submitButton('Guardar Módulo', array('class' => "btn btn-default")); ?>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
        <?php if ($model->isNewRecord): ?>
        </div>
    </div>
<?php endif; ?>
