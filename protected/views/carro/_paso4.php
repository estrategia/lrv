<h1>Confirmación del pedido</h1>

<div class="ui-field-container ui-bar ui-bar-a ui-corner-all">
    <div>
        <div>Dirección de despacho:</div>
        <div><?php echo $objDireccion->descripcion ?></div>
    </div>

    <div>
        <div>Forma de pago:</div>
        <div><?php echo $objFormaPago->formaPago ?></div>
    </div>

    <div>
        <div>Datos de entrega:</div>
        <div><?php echo $modelPago->fechaEntrega ?></div>
    </div>
</div>

<div class="space-2"></div>

<div class="ui-field-container ui-bar ui-bar-a ui-corner-all">
    <div>
        <div>Subtotal:</div>
        <div><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></div>
    </div>

    <div>
        <div>Envío:</div>
        <div><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></div>
    </div>

    <div>
        <div>Flete adicional:</div>
        <div><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getExtraShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></div>
    </div>

    <div>
        <div>Impuesto incluidos:</div>
        <div><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getTaxPrice(), Yii::app()->params->formatoMoneda['moneda']) ?></div>
    </div>

    <div>
        <div>Su ahorro:</div>
        <div><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getDiscountPrice(true), Yii::app()->params->formatoMoneda['moneda']) ?></div>
    </div>

    <div class="space-2"></div>

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
                            <td><img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial'] . $objEspecial->rutaIcono; ?>" ></td>
                            <td><?php echo $objEspecial->descripcion ?></td>
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



    <div class="ui-field-container ui-bar ui-bar-a ui-corner-all">
        <div>Total a pagar <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getTotalCost(), Yii::app()->params->formatoMoneda['moneda']) ?></div>
        <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
            Finalizar compra
            <input type="button" data-enhanced="true" value="Finalizar compra" id="btn-carropagar-siguiente" data-origin="<?php echo Yii::app()->params->pagar['pasos'][4] ?>" data-redirect="finalizar">
        </div>
    </div>

    <?php $this->endWidget(); ?>
</div>

