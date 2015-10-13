
        <?php $mensajes = Yii::app()->user->getFlashes(); ?>
        <?php if ($mensajes): ?>
            <ul class="messages">
                <?php foreach ($mensajes as $idx => $mensaje): ?>
                    <li><div class="<?php echo $idx ?>-msg"><?php echo $mensaje ?></div></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#crearcuenta">

                    <div class="row">
                       <div class="col-md-12">
                                <span class="glyphicon glyphicon-chevron-right der" aria-hidden="true"></span>&nbsp;
                                        <h4 style="display:inline-block;"> 	
                                            <?php if ($model->getScenario() == 'registro') : ?>
                                                Registro de cuenta
                                            <?php elseif ($model->getScenario() == 'actualizar'): ?>
                                                Actualizar cuenta
                                            <?php endif; ?>
                                       </h4>
                       </div>
                    </div>
                  </a>
            </div>
       <div id="crearcuenta" class="accordion-body collapse ">
            <div class="accordion-inner">
                <div class='space-1'></div>
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'enableClientValidation' => true,
                        'htmlOptions' => array(
                            'id' => "form-registro", 'class' => "ui-bar ui-bar-c ui-corner-all", 'data-ajax' => "false"
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
                    <section>
                        <fieldset>
                            <div class="row line-bottom2">
                                <?php if ($model->getScenario() == 'registro') : ?>
                                    <div class="">
                                        <div class="col-md-4">
                                            <?php echo $form->labelEx($model, 'cedula', array('class' => 'ui-hidden-accessible')); ?>
                                            <?php echo $form->textField($model, 'cedula', array('placeholder' => $model->getAttributeLabel('cedula'),'class'=>'form-control')); ?>
                                            <?php echo $form->error($model, 'cedula'); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($model->getScenario() == 'actualizar') : ?>
                                    <div class="">
                                        <div class="col-md-4">
                                            <?php echo $form->labelEx($model, 'cedula', array('class' => 'ui-hidden-accessible')); ?>
                                            <?php echo $form->textField($model, 'cedula', array('disabled' => 'disabled','class'=>'form-control')); ?>
                                            <?php echo $form->error($model, 'cedula'); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="">
                                        <div class="col-md-4">
                                            <?php echo $form->labelEx($model, 'nombre', array('class' => 'ui-hidden-accessible')); ?>
                                            <?php echo $form->textField($model, 'nombre', array('placeholder' => $model->getAttributeLabel('nombre'),'class'=>'form-control')); ?>
                                            <?php echo $form->error($model, 'nombre'); ?>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-4">
                                            <?php echo $form->labelEx($model, 'apellido', array('class' => 'ui-hidden-accessible')); ?>
                                            <?php echo $form->textField($model, 'apellido', array('placeholder' => $model->getAttributeLabel('apellido'),'class'=>'form-control')); ?>
                                            <?php echo $form->error($model, 'apellido'); ?>
                                        </div>
                                </div>
                                <div class="">
                                        <div class="col-md-4">
                                            <?php echo $form->labelEx($model, 'correoElectronico', array('class' => 'ui-hidden-accessible')); ?>
                                            <?php echo $form->emailField($model, 'correoElectronico', array('placeholder' => $model->getAttributeLabel('correoElectronico'),'class'=>'form-control')); ?>
                                            <?php echo $form->error($model, 'correoElectronico'); ?>
                                        </div>
                                </div>
                                <div class='space-1'></div>
                                <div class="">
                                        <div class="col-md-4">
                                            <?php echo $form->labelEx($model, 'genero'); ?>
                                            <div class="space-1" ></div>
                                            <?php foreach (Yii::app()->params->generos as $valor => $nombre): ?>
                                              <label for="RegistroForm_genero_<?php echo $valor ?>" class="c_label_rg"><?php echo $nombre ?></label>
                                              <input type="radio" name="RegistroForm[genero]" id="RegistroForm_genero_<?php echo $valor ?>" value="<?php echo $valor ?>" <?php echo ($model->genero == $valor ? "checked='checked'" : "") ?>>
                                           <?php endforeach; ?>
                                           <?php echo $form->error($model, 'genero'); ?>
                                        </div>
                                </div>
                                <div class="">
                                        <div class="col-md-4">
                                            <?php echo $form->labelEx($model, 'fechaNacimiento'); ?>
                                            <?php echo $form->textField($model, 'fechaNacimiento',array('class'=>'form-control')); ?>
                                            <?php echo $form->error($model, 'fechaNacimiento'); ?>
                                        </div>
                                </div>
                                <div class="">
                                        <div class="col-md-4">
                                            <?php echo $form->labelEx($model, 'clave', array('class' => 'ui-hidden-accessible')); ?>
                                            <?php echo $form->passwordField($model, 'clave', array('placeholder' => $model->getAttributeLabel('clave'), 'autocomplete' => 'off','class'=>'form-control')); ?>
                                            <?php echo $form->error($model, 'clave'); ?>
                                        </div>
                                </div>
                                <div class="">
                                        <div class="col-md-4">
                                            <?php echo $form->labelEx($model, 'claveConfirmar', array('class' => 'ui-hidden-accessible')); ?>
                                            <?php echo $form->passwordField($model, 'claveConfirmar', array('placeholder' => $model->getAttributeLabel('claveConfirmar'), 'autocomplete' => 'off','class'=>'form-control')); ?>
                                            <?php echo $form->error($model, 'claveConfirmar'); ?>
                                        </div>
                                </div>
                                <?php if ($model->getScenario() == 'registro') : ?>
                                    <div class="">
                                        <div class="col-md-6">
                                            <?php echo $form->labelEx($model, 'condiciones', array('class' => '')); ?>
                                            <?php echo $form->checkBox($model, 'condiciones', array("style"=>"display:block")); ?>
                                            <?php echo $form->error($model, 'condiciones'); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($model->getScenario() == 'actualizar') : ?>
                                    <div class="">
                                        <div class="col-md-4">
                                            <?php echo $form->labelEx($model, 'profesion', array('class' => 'ui-hidden-accessible')); ?>
                                            <?php echo $form->textField($model, 'profesion', array('placeholder' => $model->getAttributeLabel('profesion'),"class"=>"form-control")); ?>
                                            <?php echo $form->error($model, 'profesion'); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </fieldset>
                    </section>
                    <div class="">
                        <div class="col-md-4">
                            <?php if ($model->getScenario() == 'registro') : ?>
                                <?php echo CHtml::link('Ver condiciones', "#dialog-condiciones", array('class' => 'c_olv_pass', 'data-transition' => 'flip','data-toggle'=>"modal", 'data-target'=>"#modalTerminos")); ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php /* echo CHtml::submitButton(($model->getScenario() == 'actualizar' ? 'Guardar' : 'Registrar'), array('class' => 'c_bt_sendrc')); */ ?>

                    <div class="">
                        <input class='btn btn-primary' type="submit" data-enhanced="true" value="<?= ($model->getScenario() == 'actualizar' ? 'Guardar' : 'Registrar') ?>">
                    </div>
                    <?php $this->endWidget(); ?>
                </div>

                <?php if ($model->getScenario() == 'registro') : ?>
                    <?php /* $this->extraContentList[] = "<div data-role='panel' id='panel-condiciones' data-display='push' data-position-fixed='true'>" . $this->renderPartial('/sitio/condiciones', null, true) . "<a href='#' class='ui-btn ui-btn-r' data-rel='close'>Cerrar</a></div>" */ ?>
                    <?php /* $this->extraPageList[] = "<div data-role='page' id='page-condiciones'><div data-role='main' class='ui-content'>" . $this->renderPartial('/sitio/condiciones', null, true) . "<a href='#' class='ui-btn ui-btn-r' data-rel='back'>Cerrar</a></div></div>" */ ?>
                     <!-- Modal -->
                  <div class="modal fade" id="modalTerminos" role="dialog">
                    <div class="modal-dialog" style='width:1000px'>

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Condiciones de uso</h4>
                        </div>
                        <div class="modal-body">
                          <?php echo $this->renderPartial('/sitio/condiciones', null, true); ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
            </div>
        <?php endif; ?>
             <!--
        <?php             
        echo CHtml::button('Volver', array(
                    'name' => 'btnBack',
                    'class' => 'uibutton loading confirm',
                    'style' => 'width:150px;',
                    'onclick' => "history.go(-1)",
                        )
                );
        ?>-->
        <script>
          $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '<Ant',
                nextText: 'Sig>',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                weekHeader: 'Sm',
                dateFormat: 'yy-mm-dd',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: '',
                changeMonth: true,
                changeYear: true,
                yearRange: '<?php echo date("Y")-100;?>:<?php echo date("Y")+100;?>'
            };
         $.datepicker.setDefaults($.datepicker.regional['es']);
          $(function() {
            $( "#RegistroForm_fechaNacimiento" ).datepicker();
          });
          </script>