<h3 class="text-center title-desp">Confirmación del pedido</h3>
<div class="row confirm">
    <div class="" style="margin-top:20px;">
        <div class="col-md-4">
            <?php if ($objDireccion !== null): ?>
                <p>Dirección de despacho:</p>
            <?php endif; ?>

            <p>Forma de pago:</p>
            <?php if ($modelPago->fechaEntrega != null && !empty($modelPago->fechaEntrega)): ?>
                <p class="rojo">Datos de entrega:</p>
            <?php endif; ?>

        </div>
        <div class="col-md-6">
            <?php if ($objDireccion !== null): ?>
                <p><?php echo $objDireccion->descripcion ?></p>
            <?php endif; ?>
            <p><?php echo $objFormaPago->formaPago ?></p>

            <?php if ($modelPago->fechaEntrega != null && !empty($modelPago->fechaEntrega)): ?>
                <p class="rojo"><?php echo $modelPago->fechaEntrega ?></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-md-12" style="margin-top:20px;">
        <div class="row">
        <div class="col-md-4">
            <p>Subtotal:</p>
            <p>Envío:</p>
            <?php if (Yii::app()->shoppingCart->getExtraShipping() > 0): ?>
                <p>Flete adicional:</p>
            <?php endif; ?>
            <?php if (Yii::app()->shoppingCart->getBono() > 0): ?>
                <p>Bono:</p>
            <?php endif; ?>
            <?php if (Yii::app()->shoppingCart->getObjCiudad()->excentoImpuestos == 0 && Yii::app()->shoppingCart->getTaxPrice() > 0): ?>
                <p>Impuesto incluidos:</p>
            <?php endif; ?>

            <?php if (Yii::app()->shoppingCart->getDiscountPrice(true) > 0): ?>
                <p class="rojo">Su ahorro:</p>
            <?php endif; ?>
        </div>
        <div class="col-md-6">
            <p><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            <p><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            <?php if (Yii::app()->shoppingCart->getExtraShipping() > 0): ?>
                <p><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getExtraShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            <?php endif; ?>
            <?php if (Yii::app()->shoppingCart->getBono() > 0): ?>
                <p><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getBono(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            <?php endif; ?>
            <?php if (Yii::app()->shoppingCart->getObjCiudad()->excentoImpuestos == 0 && Yii::app()->shoppingCart->getTaxPrice() > 0): ?>
                <p><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getTaxPrice(), Yii::app()->params->formatoMoneda['moneda']) ?></p>
            <?php endif; ?>
            <?php if (Yii::app()->shoppingCart->getDiscountPrice(true) > 0): ?>
                <p class="rojo"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getDiscountPrice(true), Yii::app()->params->formatoMoneda['moneda']) ?></p>
            <?php endif; ?>
        </div>
        </div>
    </div>
</div>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'form-pago-confirmacion',
    'enableClientValidation' => true,
    'action' => Yii::app()->createUrl('/carro/pagar', array('paso' => $modelPago->getScenario(), 'post' => 'true')),
    'htmlOptions' => array(
        'class' => ""
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

<fieldset>
    <?php if (empty($modelPago->listCodigoEspecial)): ?>
        <?php echo $form->hiddenField($modelPago, 'confirmacion'); ?>
        <?php echo $form->error($modelPago, 'confirmacion', array('class'=>'text-danger')); ?>
    <?php else: ?>
        <table data-role="table" class="ui-responsive">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($modelPago->listCodigoEspecial as $objEspecial): ?>
                    <tr>
                        <td></td>
                        <td><img align="left" class="iconConfirmacion" src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial'] . $objEspecial->rutaIcono; ?>" ><?php echo $objEspecial->condicionCompra ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="coment">
            <div class="checkbox">
                <?php echo $form->checkBox($modelPago, 'confirmacion', array()); ?>
                <label class="clst_check" for="FormaPagoForm_confirmacion"><span></span> <?php echo $modelPago->getAttributeLabel('confirmacion')?></label>
                <?php echo $form->error($modelPago, 'confirmacion', array('class'=>'text-danger')); ?>
            </div>
        </div>
    <?php endif; ?>
</fieldset>


<div style="margin-top:40px;">
    <div class="row" style="background-color:#fff;">
        <div class="col-sm-6 col-md-offset-3">
            <p class="text-center" style="margin-top:20px;color:#A4A4A4;font-size:20px;">TOTAL A PAGAR: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getTotalCost(), Yii::app()->params->formatoMoneda['moneda']) ?></p>
        </div>
        <div class="col-sm-6 col-md-offset-3">
            <button class="adicionar" style="width:100%;margin-bottom:26px;" id="btn-carropagar-siguiente" data-origin="<?php echo Yii::app()->params->pagar['pasos'][4] ?>" data-redirect="finalizar">Finalizar compra</button>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>
