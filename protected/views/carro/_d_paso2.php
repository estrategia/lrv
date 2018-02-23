<div class="container desplegables">
    <div class="row">
        <div class="col-md-12">
            Resumen
            
            <div class="row confirm">
                <div class="" style="margin-top:20px;">
                              
                		<div class="col-md-2">
                        <p>Subtotal:</p>
                        <p>Envío:</p>
                    </div>
                    
                    <div class="col-md-2">
                        <p><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
                        <p><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getTotalShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
                    </div>
                    
                    <div class="col-md-3">
                    		Total a pagar: 
                        <p><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getTotalCostClient(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
                    </div>
                		
                    <div class="col-md-2">
                        <?php if ($objDireccion !== null): ?>
                            <p>Dirección de despacho:</p>
                        <?php endif; ?>
                        <p>Forma de pago:</p>

                    </div>
                    <div class="col-md-2">
                        <?php if ($objDireccion !== null): ?>
                            <p><?php echo $objDireccion->descripcion ?></p>
                        <?php endif; ?>
                        <p><?php echo $objFormaPago->formaPago ?></p>

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
                    		<p>Terminos y condiciones</p>
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
                            <label class="clst_check" for="FormaPagoForm_confirmacion"><span></span> <?php echo $modelPago->getAttributeLabel('confirmacion') ?></label>
                            <?php echo $form->error($modelPago, 'confirmacion', array('class' => 'text-danger')); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </fieldset>

            <div id="form-formula-medica" class="display-none">
                <?php $this->renderPartial('_d_formFormulaMedica', array('model' => new FormulasMedicas(), 'form' => $form))?>
            </div>

            <div style="margin-top:40px;">
                <div class="row" style="background-color:#fff;">
                    <div class="col-sm-6 col-md-offset-3">
                        <button class="adicionar" style="width:100%;margin-bottom:26px;" id="btn-carropagar-siguiente" data-origin="<?php echo $paso ?>" data-redirect="finalizar">Finalizar compra</button>
                    </div>
                </div>
            </div>

            <?php $this->endWidget(); ?>

        </div>
    </div>
    <div class="space-1"></div>
    <?php if (!$modelPago->pagoExpress): ?>
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
    <?php endif; ?>
</div>
