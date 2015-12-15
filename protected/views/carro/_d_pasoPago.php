<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'form-pago-pago',
    'enableClientValidation' => true,
    //'action' => Yii::app()->createUrl('/carro/pagar', array('paso' => $modelPago->getScenario(), 'post' => 'true')),
    'htmlOptions' => array(
    //'class' => "", 'data-ajax' => "false"
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

<?php $listDatafono = array(); ?>
        <?php foreach ($listFormaPago as $idx => $objFormaPago): ?>
            <?php if (in_array($objFormaPago->idFormaPago, Yii::app()->params->formaPago['tarjetasDatafono'])): ?>
                <?php $listDatafono[] = $objFormaPago; ?>
                <?php continue; ?>
            <?php endif; ?>

            <div data-role="formapago" data-tipo="<?php echo $objFormaPago->idFormaPago ?>">
                <input type="radio" name="FormaPagoForm[idFormaPago]" id="FormaPagoForm_idFormaPago_<?php echo $objFormaPago->idFormaPago ?>" value="<?php echo $objFormaPago->idFormaPago ?>" <?php echo ($objFormaPago->idFormaPago == $modelPago->idFormaPago ? "checked" : "") ?>> 
                <label for="FormaPagoForm_idFormaPago_<?php echo $objFormaPago->idFormaPago ?>"><?php echo $objFormaPago->formaPago ?></label>
            </div>
        <?php endforeach; ?>
        <?php if (!empty_lrv($listDatafono)): ?>
            <div data-role="formapago" data-tipo="datafono">
                <input type="radio" name="FormaPagoForm[idFormaPago]" id="FormaPagoForm_idFormaPago_datafono" value="<?php echo (in_array($modelPago->idFormaPago, Yii::app()->params->formaPago['tarjetasDatafono']) ? $modelPago->idFormaPago : "" )  ?>" <?php echo (in_array($modelPago->idFormaPago, Yii::app()->params->formaPago['tarjetasDatafono']) ? "checked" : "" ) ?> >
                <label>Datafono</label>
            </div>
        <?php endif; ?>
<div class="space-2"></div>
    <div class="center gray-text border-gray">Selecciona una forma de pago
        <?php foreach ($listFormaPago as $idx => $objFormaPago): ?>
            <?php if (!in_array($objFormaPago->idFormaPago, Yii::app()->params->formaPago['tarjetasDatafono'])): ?>
                <?php if ($objFormaPago->idFormaPago == Yii::app()->params->formaPago['idCredirebaja']): ?>
                    <div data-role="formapago-descripcion" data-tipo="<?= $objFormaPago->idFormaPago ?>" class="row<?php echo ($modelPago->idFormaPago == $objFormaPago->idFormaPago ? "" : " display-none" ) ?>">
                        <div class="col-md-9 info-oficina">
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
                    <div data-role="formapago-descripcion" data-tipo="<?= $objFormaPago->idFormaPago ?>" class="row<?php echo ($modelPago->idFormaPago == $objFormaPago->idFormaPago ? "" : " display-none" ) ?>">
                        <div class="col-md-12 center">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/logo_pse.png" />
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

<?php echo $form->error($modelPago, 'idFormaPago', array('class' => 'text-danger center')); ?>
<?php $this->endWidget(); ?>

<div class="modal fade" id="modal-formapago" tabindex="-1" role="dialog" aria-labelledby="modal-formapago-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="modal-formapago-label">Seleccionar tarjeta para datafono</h4>
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
