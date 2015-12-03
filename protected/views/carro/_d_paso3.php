<h3 class="text-center title-desp">Forma de pago</h3>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'form-pago-pago',
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

<?php //$this->renderPartial('/carro/_d_formaPago', array('form' => $form, 'model' => $modelPago, 'listFormaPago' => $listFormaPago)) ?>

<div class="row">
    <div class="col-md-12 center">
        <div data-role="formapago" data-tipo="1"class="forma-pago<?php echo ($modelPago->idFormaPago == 1 ? " activo" : "" ) ?>">
            <span>&bull;</span> Efectivo <i class="glyphicon glyphicon-chevron-right icon-right-pagar"></i>
        </div>
        <div data-role="formapago" data-tipo="datafono" class="forma-pago<?php echo (in_array($modelPago->idFormaPago, Yii::app()->params->formaPago['tarjetasDatafono']) ? " activo" : "" ) ?>">
            <span>&bull;</span> Datafono <i class="glyphicon glyphicon-chevron-right icon-right-pagar"></i>
        </div>
        <div data-role="formapago" data-tipo="3"  class="forma-pago<?php echo ($modelPago->idFormaPago == 3 ? " activo" : "" ) ?>">
            <span>&bull;</span> Pago en linea <i class="glyphicon glyphicon-chevron-right icon-right-pagar"></i>
            <div data-role="formapago-logo-pagoenlinea" class="row<?php echo ($modelPago->idFormaPago == 3 ? "" : " display-none" ) ?>">
                <div class="col-md-12 center">
                    <img src="/lrv/images/iconos/logo_pse.png" />
                </div>
            </div>
        </div>
        <div data-role="formapago" data-tipo="2" class="forma-pago<?php echo ($modelPago->idFormaPago == 2 ? " activo" : "" ) ?>">
            <span>&bull;</span> Credirebaja <i class="glyphicon glyphicon-chevron-right icon-right-pagar"></i>
            <div class="row">
                <div class="col-md-8 info-oficina">
                    <?php echo $form->labelEx($modelPago, 'numeroTarjeta'); ?>
                    <?php echo $form->textField($modelPago, 'numeroTarjeta', array('class' => 'form-control', 'placeholder' => '000000000000', 'maxlength' => 12)); ?>
                    <?php echo $form->error($modelPago, 'numeroTarjeta', array('class' => 'text-danger')); ?>
                </div>
                <div class="col-md-3 info-oficina">
                    <?php echo $form->labelEx($modelPago, 'cuotasTarjeta'); ?>
                    <?php echo $form->dropDownList($modelPago, 'cuotasTarjeta', FormaPagoForm::listDataCuotas(), array('class' => 'form-control select', 'placeholder' => '0', 'style' => "border-radius:0px;")); ?>
                    <?php echo $form->error($modelPago, 'cuotasTarjeta', array('class' => 'text-danger')); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" value="<?php echo $modelPago->idFormaPago ?>" id="FormaPagoForm_idFormaPago" name="FormaPagoForm[idFormaPago]">
<?php echo $form->error($modelPago, 'idFormaPago', array('class' => 'text-danger center')); ?>

<?php if ($modelPago->bono !== null): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="forma-pago">
                <span>&bull;</span> Bono cliente fiel
                <div class="row">
                    <div class="col-md-12">
                        <p>Valor de bono: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $modelPago->bono['valor'], Yii::app()->params->formatoMoneda['moneda']); ?></p>
                        <p>Vigencia inicial del bono: <?php echo $modelPago->bono['vigenciaInicio'] ?></p>
                        <p>Vigencia final del bono: <?php echo $modelPago->bono['vigenciaFin'] ?></p>
                        <br>
                        <p>¿Desea utilizar el bono?</p>
                        <div class="radio">
                            <label><input type="radio" id="FormaPagoForm_usoBono_1" name="FormaPagoForm[usoBono]" value="1" <?php echo ($modelPago->usoBono == 1 ? "checked" : "") ?>>Si</label>
                            <label style="margin-left: 15px;"><input type="radio" id="FormaPagoForm_usoBono_0" name="FormaPagoForm[usoBono]" value="0" <?php echo ($modelPago->usoBono != 1 ? "checked" : "") ?>>No</label>
                        </div>
                        <?php echo $form->error($modelPago, 'usoBono', array('class' => 'text-danger')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php $this->endWidget(); ?>

<div class="modal fade" id="modal-formapago" tabindex="-1" role="dialog" aria-labelledby="modal-formapago-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="modal-formapago-label">Datafono</h4>
            </div>
            <div class="modal-body body-scroll">
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <input type="radio" value="11" id="idFormaPago_11" name="idFormaPago">
                            <label for="idFormaPago_11">Tarjeta Big Pass</label>
                        </div>
                        <div>
                            <input type="radio" value="10" id="idFormaPago_10" name="idFormaPago">
                            <label for="idFormaPago_10">Tarjeta Éxito</label>
                        </div>
                        <div>
                            <input type="radio" value="9" id="idFormaPago_9" name="idFormaPago">
                            <label for="idFormaPago_9">Tarjeta Master Crédito</label>
                        </div>
                        <div>
                            <input type="radio" value="8" id="idFormaPago_8" name="idFormaPago">
                            <label for="idFormaPago_8">Tarjeta Master Debito</label>
                        </div>
                        <div>
                            <input type="radio" value="12" id="idFormaPago_12" name="idFormaPago">
                            <label for="idFormaPago_12">Tarjeta Sodexxo</label>
                        </div>
                        <div>
                            <input type="radio" value="6" id="idFormaPago_6" name="idFormaPago">
                            <label for="idFormaPago_6">Tarjeta Visa Crédito</label>
                        </div>
                        <div>
                            <input type="radio" value="5" id="idFormaPago_5" name="idFormaPago">
                            <label for="idFormaPago_5">Tarjeta Visa Debito</label>
                        </div>
                        <div>
                            <input type="radio" value="7" id="idFormaPago_7" name="idFormaPago">
                            <label for="idFormaPago_7">Tarjeta Visa Electron</label>
                        </div>
                    </div>
                    <div class="col-md-6 info-oficina">
                        <div data-role="formapago-logo-11" class="display-none">
                            <img src="/lrv/images/iconos/bigpass_logo.png" class="ajustada"/>
                        </div>
                        <div data-role="formapago-logo-10" class="display-none">
                            <img src="/lrv/images/iconos/exito_logo.png" class="ajustada"/>
                        </div>
                        <div data-role="formapago-logo-9" class="display-none">
                            <img src="/lrv/images/iconos/mastercard_logo.png" class="ajustada"/>
                        </div>
                        <div data-role="formapago-logo-8" class="display-none">
                            <img src="/lrv/images/iconos/maestro_logo.png" class="ajustada"/>
                        </div>
                        <div data-role="formapago-logo-12" class="display-none">
                            <img src="/lrv/images/iconos/sodexo_logo.png" class="ajustada"/>
                        </div>
                        <div data-role="formapago-logo-6" class="display-none">
                            <img src="/lrv/images/iconos/visa_logo2.png" class="ajustada"/>
                        </div>
                        <div data-role="formapago-logo-5" class="display-none">
                            <img src="/lrv/images/iconos/visa_logo2.png" class="ajustada"/>
                        </div>
                        <div data-role="formapago-logo-7" class="display-none">
                            <img src="/lrv/images/iconos/visaelectron_logo.png" class="ajustada"/>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer center">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
