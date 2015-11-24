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

<?php $this->renderPartial('/carro/_d_formaPago', array('form' => $form, 'model' => $modelPago, 'listFormaPago' => $listFormaPago)) ?>

<?php if ($modelPago->bono !== null): ?>
    <div class="col-md-12 coment">
        <p style="margin-bottom:5px;"><?php echo $modelPago->getAttributeLabel('usoBono'); ?></p>
        <div class="col-md-12" style="background-color: #fff;">
            <div class="col-md-12" style="padding:10px;">
                <p>Nombre o tipo de bono: Bono cliente fiel</p>
                <p>Valor de bono: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $modelPago->bono['valor'], Yii::app()->params->formatoMoneda['moneda']); ?></p>
                <p>Vigencia inicial del bono: <?php echo $modelPago->bono['vigenciaInicio'] ?></p>
                <p>Vigencia final del bono: <?php echo $modelPago->bono['vigenciaFin'] ?></p>
                <br>
                <p>¿Desea utilizar el bono?</p>
                <div class="radio">
                    <label><input type="radio" id="FormaPagoForm_usoBono_1" name="FormaPagoForm[usoBono]" value="1" <?php echo ($modelPago->usoBono == 1 ? "checked" : "") ?>>Si</label>
                    <label style="margin-left: 15px;"><input type="radio" id="FormaPagoForm_usoBono_0" name="FormaPagoForm[usoBono]" value="0" <?php echo ($modelPago->usoBono != 1 ? "checked" : "") ?>>No</label>
                </div>
                <?php echo $form->error($modelPago, 'usoBono', array('class'=>'text-danger')); ?>
            </div>
        </div>
    </div>
<?php endif; ?>




<?php $this->endWidget(); ?>
