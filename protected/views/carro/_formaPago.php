<?php $listDatafono = array(); ?>
<?php $modelClass = get_class($model); ?>
<?php foreach ($listFormaPago as $idx => $objFormaPago): ?>
    <?php if (in_array($objFormaPago->idFormaPago, Yii::app()->params->formaPago['tarjetasDatafono'])): ?>
        <?php $listDatafono[] = $objFormaPago; ?>
        <?php continue; ?>
    <?php endif; ?>
    <label for="<?php echo $modelClass ?>_idFormaPago_<?php echo $objFormaPago->idFormaPago ?>"><?php echo $objFormaPago->formaPago ?></label>
    <input type="radio" data-credirebaja="<?php echo $objFormaPago->idFormaPago == Yii::app()->params->formaPago['idCredirebaja'] ? "1" : "0" ?>" name="<?php echo $modelClass ?>[idFormaPago]" id="<?php echo $modelClass ?>_idFormaPago_<?php echo $objFormaPago->idFormaPago ?>" value="<?php echo $objFormaPago->idFormaPago ?>" <?php echo ($model->idFormaPago == $objFormaPago->idFormaPago ? "checked" : "") ?>>
    <?php if ($objFormaPago->idFormaPago == Yii::app()->params->formaPago['idCredirebaja']): ?>
        <div id="div-credirebaja">
            <div class="ui-field-container ui-bar ui-bar-a ui-corner-all">
                <?php echo $form->labelEx($model, 'numeroTarjeta'); ?>
                <?php echo $form->numberField($model, 'numeroTarjeta', array('placeholder' => '000000000000', 'maxlength' => 12)); ?>
                <?php echo $form->error($model, 'numeroTarjeta'); ?>
                <?php echo $form->labelEx($model, 'cuotasTarjeta'); ?>
                <?php echo $form->dropDownList($model, 'cuotasTarjeta', FormaPagoForm::listDataCuotas(), array('placeholder' => '0')); ?>
                <?php echo $form->error($model, 'cuotasTarjeta'); ?>
            </div>
            <div class="space-2"></div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>

<div data-role="collapsible" data-collapsed="<?php echo ( in_array($model->idFormaPago, Yii::app()->params->formaPago['tarjetasDatafono']) ? "false" : "true" ) ?>" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-content-theme="a">
    <legend>Datafono</legend>
    <?php foreach ($listDatafono as $idx => $objFormaPago): ?>
        <label for="<?php echo $modelClass ?>_idFormaPago_<?php echo $objFormaPago->idFormaPago ?>"><?php echo $objFormaPago->formaPago ?></label>
        <input type="radio" data-credirebaja="<?php echo $objFormaPago->idFormaPago == Yii::app()->params->formaPago['idCredirebaja'] ? "1" : "0" ?>" name="<?php echo $modelClass ?>[idFormaPago]" id="<?php echo $modelClass ?>_idFormaPago_<?php echo $objFormaPago->idFormaPago ?>" value="<?php echo $objFormaPago->idFormaPago ?>" <?php echo ($model->idFormaPago == $objFormaPago->idFormaPago ? "checked" : "") ?>>
    <?php endforeach; ?>
</div>
<?php echo $form->error($model, 'idFormaPago'); ?>