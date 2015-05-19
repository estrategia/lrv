<div class="contentConfirmacion">
    <h1>Confirmación del pedido</h1>

    <div class="blockPago">
        <table>
            <?php if ($objDireccion !== null): ?>
                <tr>
                    <td>Dirección de despacho:</td>
                    <td><?php echo $objDireccion->descripcion ?></td>
                </tr>
            <?php endif; ?>
            <tr>
                <td>Forma de pago:</td>
                <td><?php echo $objFormaPago->formaPago ?></td>
            </tr>
            <?php if ($modelPago->fechaEntrega != null && !empty($modelPago->fechaEntrega)): ?>
                <tr class="rowRed">
                    <td>Datos de entrega:</td>
                    <td><?php echo $modelPago->fechaEntrega ?></td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

    <div class="space-2"></div>

    <div class="blockPago">
        <table>
            <tr>
                <td>Subtotal:</td>
                <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
            </tr>
            <tr>
                <td>Envío:</td>
                <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
            </tr>
            <?php if (Yii::app()->shoppingCart->getExtraShipping() > 0): ?>
                <tr>
                    <td>Flete adicional:</td>
                    <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getExtraShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
                </tr>
            <?php endif; ?>
            <?php if (Yii::app()->shoppingCart->getBono() > 0): ?>
                <tr>
                    <td>Bono:</td>
                    <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getBono(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
                </tr>
            <?php endif; ?>
            <?php if (Yii::app()->shoppingCart->getObjCiudad()->excentoImpuestos == 0 && Yii::app()->shoppingCart->getTaxPrice() > 0): ?>
                <tr>
                    <td>Impuesto incluidos:</td>
                    <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getTaxPrice(), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                </tr>
            <?php endif; ?>
            <?php if (Yii::app()->shoppingCart->getDiscountPrice(true) > 0): ?>
                <tr class="rowRed">
                    <td>Su ahorro:</td>
                    <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getDiscountPrice(true), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                </tr>
            <?php endif; ?>
        </table>
        <div class="space-2"></div>
    </div>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'form-pago-confirmacion',
        'enableClientValidation' => true,
        'action' => Yii::app()->createUrl('/carro/pagar', array('paso' => $modelPago->getScenario(), 'post' => 'true')),
        'htmlOptions' => array(
            'class' => "", 'data-ajax' => "false"
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
            <?php echo $form->error($modelPago, 'confirmacion'); ?>
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
                            <td><img align="left" class="iconConfirmacion" src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial'] . $objEspecial->rutaIcono; ?>" ><?php echo $objEspecial->descripcion ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="ui-field-container">
                <?php echo $form->labelEx($modelPago, 'confirmacion'); ?>
                <?php echo $form->checkBox($modelPago, 'confirmacion', array('data-mini' => 'true')); ?>
                <?php echo $form->error($modelPago, 'confirmacion'); ?>
            </div>
        <?php endif; ?>
    </fieldset>

    <div class="btnPagarConfirmacion ui-field-container ui-bar ui-bar-a ui-corner-all">
        <div>Total a pagar <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getTotalCost(), Yii::app()->params->formatoMoneda['moneda']) ?></div>
        <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
            Finalizar compra
            <input type="button" data-enhanced="true" value="Finalizar compra" id="btn-carropagar-siguiente" data-origin="<?php echo Yii::app()->params->pagar['pasos'][4] ?>" data-redirect="finalizar">
        </div>
    </div>

    <?php $this->endWidget(); ?>
</div>