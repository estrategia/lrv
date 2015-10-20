<?php if ($modelPago->pagoInvitado): ?>
    <h3 class="text-center title-desp"><span class="glyphicon glyphicon-map-marker"></span>Direcci&oacute;n de despacho</h3>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'enableClientValidation' => true,
        //'action' => ($model->isNewRecord ? Yii::app()->createUrl('/usuario/direccionCrear') : Yii::app()->createUrl('/usuario/direccionActualizar', array('id' => $model->idDireccionDespacho))),
        'id' => "form-direccion-pagoinvitado",
        'htmlOptions' => array(
            'class' => "ui-bar ui-bar-c ui-corner-all", 'data-ajax' => "false"
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

    <div class="col-md-12 coment">
        <?php //echo $form->labelEx($modelPago, 'descripcion', array('class' => 'ui-mini')); ?>
        <?php echo $form->textField($modelPago, 'descripcion', array('maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('descripcion'))); ?>
        <?php echo $form->error($modelPago, 'descripcion', array('class' => 'text-danger')); ?>
    </div>
    <div class="col-md-12 coment">
        <?php echo $form->labelEx($modelPago, 'nombre', array('class' => '')); ?>
        <?php echo $form->textField($modelPago, 'nombre', array('maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('nombre'))); ?>
        <?php echo $form->error($modelPago, 'nombre', array('class' => 'text-danger')); ?>
    </div>
    <div class="col-md-12 coment">
        <?php echo $form->labelEx($modelPago, 'correoElectronico', array('class' => '')); ?>
        <?php echo $form->emailField($modelPago, 'correoElectronico', array('maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('correoElectronico'))); ?>
        <?php echo $form->error($modelPago, 'correoElectronico', array('class' => 'text-danger')); ?>
    </div>
    <div class="col-md-12 coment">
        <?php echo $form->labelEx($modelPago, 'direccion', array('class' => '')); ?>
        <?php echo $form->textField($modelPago, 'direccion', array('maxlength' => 100, 'placeholder' => $modelPago->getAttributeLabel('direccion'))); ?>
        <?php echo $form->error($modelPago, 'direccion', array('class' => 'text-danger')); ?>
    </div>

    <div class="col-md-12 coment">
        <?php echo $form->labelEx($modelPago, 'barrio', array('class' => '')); ?>
        <?php echo $form->textField($modelPago, 'barrio', array('maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('barrio'))); ?>
        <?php echo $form->error($modelPago, 'barrio', array('class' => 'text-danger')); ?>
    </div>
    <div class="col-md-12 coment">
        <?php echo $form->labelEx($modelPago, 'telefono', array('class' => '')); ?>
        <?php echo $form->textField($modelPago, 'telefono', array('maxlength' => 11, 'placeholder' => $modelPago->getAttributeLabel('telefono'))); ?>
        <?php echo $form->error($modelPago, 'telefono', array('class' => 'text-danger')); ?>
    </div>
    <div class="col-md-12 coment">
        <?php echo $form->labelEx($modelPago, 'extension', array('class' => '')); ?>
        <?php echo $form->textField($modelPago, 'extension', array('maxlength' => 5, 'placeholder' => $modelPago->getAttributeLabel('extension'))); ?>
        <?php echo $form->error($modelPago, 'extension', array('class' => 'text-danger')); ?>
    </div>
    <div class="col-md-12 coment">
        <?php echo $form->labelEx($modelPago, 'celular', array('class' => '')); ?>
        <?php echo $form->textField($modelPago, 'celular', array('maxlength' => 20, 'placeholder' => $modelPago->getAttributeLabel('celular'))); ?>
        <?php echo $form->error($modelPago, 'celular', array('class' => 'text-danger')); ?>
    </div>

    <?php $this->endWidget(); ?>
<?php else: ?>
    <h3 class="text-center title-desp"><span class="glyphicon glyphicon-map-marker"></span>Direcci&oacute;nes de despacho</h3>
    <div class="panel-group" id="accordion-direcciones" role="tablist" aria-multiselectable="true" style="margin-top:20px;">
        <?php foreach ($listDirecciones as $idx => $model): ?>
            <div class="panel panel-default">
                <div class="panel-heading head-desplegable" role="tab" id="heading-direccion-<?php echo $model->idDireccionDespacho ?>">
                    <h4 class="panel-title">
                        <input type="radio" name="FormaPagoForm[idDireccionDespacho]" id="direccion-<?php echo $model->idDireccionDespacho ?>" value="<?php echo $model->idDireccionDespacho ?>" <?php echo ($modelPago->idDireccionDespacho == $model->idDireccionDespacho ? "checked" : "") ?>>
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion-direcciones" href="#collapse-direccion-<?php echo $model->idDireccionDespacho ?>" aria-expanded="false" aria-controls="collapse-direccion-<?php echo $model->idDireccionDespacho ?>">
                            <?php echo $model->descripcion ?>
                        </a>
                    </h4>
                </div>
                <div style="height:5px;background-color: #F5F5F5;border-top: 1px solid #E9E1E1;"></div>
                <div id="collapse-direccion-<?php echo $model->idDireccionDespacho ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-direccion-<?php echo $model->idDireccionDespacho ?>">
                    <div class="panel-body" id="div-direccion-vista-<?php echo $model->idDireccionDespacho ?>">
                        <?php $this->renderPartial('/usuario/_d_direccionVista', array('model' => $model, 'editar' => true)); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div id="FormaPagoForm_idDireccionDespacho_em_" class="text-danger" style="display: none;"></div>
    <div class="col-md-4"><button class="adicionar">Adicionar dirección</button></div>

<?php endif; ?>