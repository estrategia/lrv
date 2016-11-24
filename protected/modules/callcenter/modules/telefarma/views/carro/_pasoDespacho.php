<div data-role="tipoentrega-habilitar" data-habilitar="<?php echo Yii::app()->params->entrega['tipo']['domicilio'] ?>" class="center center-verticaly<?php echo ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio'] ? "" : " display-none") ?>">
    <?php
        $form = $this->beginWidget('CActiveForm', array(
            'enableClientValidation' => true,
            'id' => "form-direccion-pagoinvitado",
            'htmlOptions' => array(
                'class' => 'form-horizontal'
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

        <div class="form-group form-group-sm">
            <?php echo $form->labelEx($modelPago, 'nombre', array('class' => 'col-md-5 control-label')); ?>
            <div class="col-md-7">
                <?php echo $form->textField($modelPago, 'nombre', array('class' => 'form-control', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('nombre'))); ?>
                <?php echo $form->error($modelPago, 'nombre', array('class' => 'text-danger')); ?>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <?php echo $form->labelEx($modelPago, 'correoElectronico', array('class' => 'col-md-5 control-label')); ?>
            <div class="col-md-7">
                <?php echo $form->emailField($modelPago, 'correoElectronico', array('class' => 'form-control', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('correoElectronico'))); ?>
                <?php echo $form->error($modelPago, 'correoElectronico', array('class' => 'text-danger')); ?>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <?php echo $form->labelEx($modelPago, 'direccion', array('class' => 'col-md-5 control-label')); ?>
            <div class="col-md-7">
                <?php echo $form->textField($modelPago, 'direccion', array('class' => 'form-control', 'maxlength' => 100, 'placeholder' => $modelPago->getAttributeLabel('direccion'))); ?>
                <?php echo $form->error($modelPago, 'direccion', array('class' => 'text-danger')); ?>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <?php echo $form->labelEx($modelPago, 'barrio', array('class' => 'col-md-5 control-label')); ?>
            <div class="col-md-7">
                <?php echo $form->textField($modelPago, 'barrio', array('class' => 'form-control', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('barrio'))); ?>
                <?php echo $form->error($modelPago, 'barrio', array('class' => 'text-danger')); ?>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <?php echo $form->labelEx($modelPago, 'telefono', array('class' => 'col-md-5 control-label')); ?>
            <div class="col-md-7">
                <?php echo $form->textField($modelPago, 'telefono', array('class' => 'form-control', 'maxlength' => 11, 'placeholder' => $modelPago->getAttributeLabel('telefono'))); ?>
                <?php echo $form->error($modelPago, 'telefono', array('class' => 'text-danger')); ?>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <?php echo $form->labelEx($modelPago, 'extension', array('class' => 'col-md-5 control-label')); ?>
            <div class="col-md-7">
                <?php echo $form->textField($modelPago, 'extension', array('class' => 'form-control', 'maxlength' => 5, 'placeholder' => $modelPago->getAttributeLabel('extension'))); ?>
                <?php echo $form->error($modelPago, 'extension', array('class' => 'text-danger')); ?>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <?php echo $form->labelEx($modelPago, 'celular', array('class' => 'col-md-5 control-label')); ?>
            <div class="col-md-7">
                <?php echo $form->textField($modelPago, 'celular', array('class' => 'form-control', 'maxlength' => 20, 'placeholder' => $modelPago->getAttributeLabel('celular'))); ?>
                <?php echo $form->error($modelPago, 'celular', array('class' => 'text-danger')); ?>
            </div>
        </div>

        <?php $this->endWidget(); ?>
</div>

<div data-role="tipoentrega-habilitar" data-habilitar="<?php echo Yii::app()->params->entrega['tipo']['presencial'] ?>" class="center center-verticaly border-gray<?php echo ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial'] ? "" : " display-none") ?>">
    <h4 class="grey">Punto de venta entrega</h4>
    <p class="grey" id="pasoporel-seleccion-pdv-nombre"><?php echo ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial'] && $modelPago->indicePuntoVenta!=null && isset($modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta])? $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta][2] : "") ?></p>
    <p class="grey" id="pasoporel-seleccion-pdv-direccion"><?php echo ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial'] && $modelPago->indicePuntoVenta!=null && isset($modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta])? $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta][3] : "")   ?></p>
</div>

<input type="hidden" id="FormaPagoTelefarmaForm_indicePuntoVenta" name="FormaPagoTelefarmaForm[indicePuntoVenta]" value="<?php echo ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial'] ?  $modelPago->indicePuntoVenta : "") ?>">
<div id="FormaPagoTelefarmaForm_indicePuntoVenta_em_" class="text-danger text-center" style="display: none;"></div>
