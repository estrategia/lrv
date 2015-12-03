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
<?php $listDatafono = array(); ?>
<div class="row">
    <div class="col-md-12 center">
        <?php foreach ($listFormaPago as $idx => $objFormaPago): ?>
            <?php if (in_array($objFormaPago->idFormaPago, Yii::app()->params->formaPago['tarjetasDatafono'])): ?>
                <?php $listDatafono[] = $objFormaPago; ?>
                <?php continue; ?>
            <?php endif; ?>
            <div data-role="formapago" data-tipo="<?= $objFormaPago->idFormaPago ?>"class="forma-pago<?php echo ($modelPago->idFormaPago == $objFormaPago->idFormaPago ? " activo" : "" ) ?>">
                <span>&bull;</span> <?php echo $objFormaPago->formaPago ?> <i class="glyphicon glyphicon-chevron-right icon-right-pagar"></i>
                <?php if ($objFormaPago->idFormaPago == Yii::app()->params->formaPago['idCredirebaja']): ?>
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
                <?php elseif ($objFormaPago->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']): ?>
                    <div data-role="formapago-logo-pagoenlinea" class="row<?php echo ($modelPago->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela'] ? "" : " display-none" ) ?>">
                        <div class="col-md-12 center">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/logo_pse.png" />
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        <?php endforeach; ?>
        <?php if (!empty_lrv($listDatafono)): ?>
            <div data-role="formapago" data-tipo="datafono" class="forma-pago<?php echo (in_array($modelPago->idFormaPago, Yii::app()->params->formaPago['tarjetasDatafono']) ? " activo" : "" ) ?>">
                <span>&bull;</span> Datafono <i class="glyphicon glyphicon-chevron-right icon-right-pagar"></i>
            </div>
        <?php endif; ?>
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
                        <?php foreach ($listDatafono as $idx => $objFormaPago): ?>
                            <div>
                                <input type="radio" value="<?= $objFormaPago->idFormaPago ?>" id="idFormaPago_<?= $objFormaPago->idFormaPago ?>" name="idFormaPago">
                                <label for="idFormaPago_<?= $objFormaPago->idFormaPago ?>"><?= $objFormaPago->formaPago ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-md-6 info-oficina">
                        <?php foreach ($listDatafono as $idx => $objFormaPago): ?>
                            <div data-role="formapago-logo-<?= $objFormaPago->idFormaPago ?>" class="display-none">
                                <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->formaPago['tarjetasDatafonoLogo'][$objFormaPago->idFormaPago]; ?>" class="ajustada"/>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer center">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
