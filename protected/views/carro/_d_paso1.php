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
    <div id="div-direcciones-pasoscompra">
        <?php $this->renderPartial('/usuario/_d_direccionesLista', array('listDirecciones' => $listDirecciones, 'radio' => true, 'idDireccionSeleccionada' => $modelPago->idDireccionDespacho)) ?>
    </div>

    <div id="FormaPagoForm_idDireccionDespacho_em_" class="text-danger" style="display: none;"></div>
    <div class="col-md-4">
        <?php echo CHtml::link('Adicionar direcci&oacute;n', "#", array('data-role' => 'direccion-adicionar-modal', 'data-pagoexpress' => 0, 'class' => 'btn btn-primary adicionar')); ?>
    </div>
<?php endif; ?>