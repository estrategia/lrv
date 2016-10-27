<div class="container desplegables">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center title-desp">Confirmación del pedido</h3>
            <div class="row confirm">
                <div class="" style="margin-top:20px;">
                    <div class="col-md-4">
                        <?php if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']): ?>
                            <p>Dirección de recogida:</p>
                        <?php endif; ?>
                        
                        <?php if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
                            <p>Dirección de despacho:</p>
                        <?php endif; ?>

                        <p>Forma de pago:</p>
                        <?php if ($modelPago->fechaEntrega != null && !empty($modelPago->fechaEntrega)): ?>
                            <p class="rojo">Datos de entrega:</p>
                        <?php endif; ?>

                    </div>
                    <div class="col-md-6">
                        <?php if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']): ?>
                            <p><?php echo $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta][2] . " / " .  $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta][3] ?></p>
                        <?php endif; ?>
                        
                        <?php if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
                            <p><?php echo $modelPago->objDireccion->barrio . " / " .  $modelPago->objDireccion->direccion?></p>
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
                            <?php if (Yii::app()->shoppingCartVitalCall->getExtraShipping() > 0): ?>
                                <p>Flete adicional:</p>
                            <?php endif; ?>
                            <?php if (Yii::app()->shoppingCartVitalCall->getObjCiudad()->excentoImpuestos == 0 && Yii::app()->shoppingCartVitalCall->getTaxPrice() > 0): ?>
                                <p>Impuesto incluidos:</p>
                            <?php endif; ?>

                            <?php if (Yii::app()->shoppingCartVitalCall->getDiscountPrice(true) > 0): ?>
                                <p class="rojo">Su ahorro:</p>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCartVitalCall->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
                            <p><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCartVitalCall->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
                            <?php if (Yii::app()->shoppingCartVitalCall->getExtraShipping() > 0): ?>
                                <p><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCartVitalCall->getExtraShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
                            <?php endif; ?>
                                 <?php if (Yii::app()->shoppingCartVitalCall->getObjCiudad()->excentoImpuestos == 0 && Yii::app()->shoppingCartVitalCall->getTaxPrice() > 0): ?>
                                <p><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCartVitalCall->getTaxPrice(), Yii::app()->params->formatoMoneda['moneda']) ?></p>
                            <?php endif; ?>
                            <?php if (Yii::app()->shoppingCartVitalCall->getDiscountPrice(true) > 0): ?>
                                <p class="rojo"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCartVitalCall->getDiscountPrice(true), Yii::app()->params->formatoMoneda['moneda']) ?></p>
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
                    'class' => "",
                    'enctype' => 'multipart/form-data'
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
                    <?php echo $form->error($modelPago, 'confirmacion', array('class' => 'text-danger')); ?>
                <?php else: ?>
                    <div class="space-2"></div>
                    <div class="coment confirmacioncompra">
                        <table data-role="table" class="ui-responsive">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $confirmacion = array() ?>
                                <?php foreach ($modelPago->listCodigoEspecial as $objEspecial): ?>
                                    <?php if ($objEspecial->codigoEspecial == Yii::app()->params->tipoFormulaMedica): ?>
                                        <?php $confirmacion = array('onChange' => 'visualizarFormulaMedica()'); ?>
                                    <?php endif; ?>
                                    <tr>
                                        <td></td>
                                        <td><img align="left" class="iconConfirmacion" src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial'] . 'desktop/' . $objEspecial->rutaIcono; ?>" >&nbsp;<?php echo $objEspecial->condicionCompra ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="space-2"></div>
                        <div class="checkbox">
                            <?php echo $form->checkBox($modelPago, 'confirmacion', $confirmacion); ?>
                            <label class="clst_check" for="FormaPagoVitalCallForm_confirmacion"><span></span> <?php echo $modelPago->getAttributeLabel('confirmacion') ?></label>
                            <?php echo $form->error($modelPago, 'confirmacion', array('class' => 'text-danger')); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </fieldset>

            <div id="form-formula-medica" class="display-none">
                <?php $this->renderPartial('_formFormulaMedica', array('model' => new FormulasMedicas(), 'form' => $form))?>
            </div>

            <div style="margin-top:40px;">
                <div class="row" style="background-color:#fff;">
                    <div class="col-sm-6 col-md-offset-3">
                        <p class="text-center" style="margin-top:20px;color:#A4A4A4;font-size:20px;">TOTAL A PAGAR: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCartVitalCall->getTotalCost(), Yii::app()->params->formatoMoneda['moneda']) ?></p>
                    </div>
                    <div class="col-sm-6 col-md-offset-3">
                        <button class="adicionar" style="width:100%;margin-bottom:26px;" id="btn-carropagar-siguiente" data-origin="<?php echo $paso ?>" data-redirect="finalizar">Finalizar compra</button>
                    </div>
                </div>
            </div>

            <?php $this->endWidget(); ?>

        </div>
    </div>
    <div class="space-1"></div>
        <div class="row">
            <div class="col-md-12">
                <?php if ($pasoAnterior !== null): ?>
                    <button class="editar" id="btn-carropagar-anterior" data-origin="<?php echo $paso ?>" data-redirect="<?php echo $pasoAnterior ?>">Atr&aacute;s</button>
                <?php endif; ?>
                <?php if ($pasoSiguiente !== null): ?>
                    <button class="adicionar" id="btn-carropagar-siguiente" data-origin="<?php echo $paso ?>" data-redirect="<?php echo $pasoSiguiente ?>">Continuar</button>
                <?php endif; ?>
            </div>
        </div>
</div>