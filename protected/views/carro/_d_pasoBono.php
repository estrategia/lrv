<?php if ($modelPago->bono !== null): ?>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'form-pago-bono',
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
    <div class="bono">
        <div>Tipo de bono:<span class="result_bono">Cliente Fiel</span></div>
        <div>Valor de bono: <span class="result_bono"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $modelPago->bono['valor'], Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
        <div>Vigencia inicial del bono: <span class="result_bono"><?php echo $modelPago->bono['vigenciaInicio'] ?></span></div>
        <div>Vigencia final del bono: <span class="result_bono"><?php echo $modelPago->bono['vigenciaFin'] ?></span></div>
        <div class="space-1"></div>
        <p class="center">¿Desea utilizar el bono?</p>
        <div class="radio center">
            <label><input type="radio" id="FormaPagoForm_usoBono_1" name="FormaPagoForm[usoBono]" value="1" <?php echo ($modelPago->usoBono == 1 ? "checked" : "") ?>>Si</label>
            <label style="margin-left: 15px;"><input type="radio" id="FormaPagoForm_usoBono_0" name="FormaPagoForm[usoBono]" value="0" <?php echo ($modelPago->usoBono != 1 ? "checked" : "") ?>>No</label>
        </div>
        <?php echo $form->error($modelPago, 'usoBono', array('class' => 'text-danger')); ?>
    </div>
    <?php $this->endWidget(); ?>
<?php else: ?>
    <div class="sold-out">
        <img class="ajustada" src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/sold-out.png" alt="">
    </div>
<?php endif; ?>


