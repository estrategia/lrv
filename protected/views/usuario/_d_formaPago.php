<?php $listDatafono = array(); ?>
<?php $modelClass = get_class($model); ?>

<div class="panel-group" id="accordion-formaPago" role="tablist" aria-multiselectable="true">
    <?php foreach ($listFormaPago as $idx => $objFormaPago): ?>
        <?php if (in_array($objFormaPago->idFormaPago, Yii::app()->params->formaPago['tarjetasDatafono'])): ?>
            <?php $listDatafono[] = $objFormaPago; ?>
            <?php continue; ?>
        <?php endif; ?>

        <div class="panel panel-default ">
            <div class="panel-heading head-desplegable" role="tab" id="heading-formapago-<?php echo $objFormaPago->idFormaPago ?>">
                <h4 class="panel-title">
                    <a data-role="usuario-pagoexpress-formapago" class="<?php echo ($objFormaPago->idFormaPago == Yii::app()->params->formaPago['idCredirebaja'] && $model->idFormaPago == $objFormaPago->idFormaPago ? "" : "collapsed") ?>" aria-expanded="<?php echo ($objFormaPago->idFormaPago == Yii::app()->params->formaPago['idCredirebaja'] && $model->idFormaPago == $objFormaPago->idFormaPago ? "true" : "false") ?>" data-toggle="collapse" data-parent="#accordion-formaPago" href="#collapse-formapago-<?php echo $objFormaPago->idFormaPago ?>" aria-controls="collapse-formapago-<?php echo $objFormaPago->idFormaPago ?>">
                        <input type="radio" data-credirebaja="<?php echo $objFormaPago->idFormaPago == Yii::app()->params->formaPago['idCredirebaja'] ? "1" : "0" ?>" name="<?php echo $modelClass ?>[idFormaPago]" id="<?php echo $modelClass ?>_idFormaPago_<?php echo $objFormaPago->idFormaPago ?>" value="<?php echo $objFormaPago->idFormaPago ?>" <?php echo ($model->idFormaPago == $objFormaPago->idFormaPago ? "checked" : "") ?>>
                        <label><?php echo $objFormaPago->formaPago ?></label>
                    </a>
                </h4>
            </div>
            <?php if ($objFormaPago->idFormaPago == Yii::app()->params->formaPago['idCredirebaja']): ?>
                <div class="panel-collapse collapse <?php echo ($objFormaPago->idFormaPago == Yii::app()->params->formaPago['idCredirebaja'] && $model->idFormaPago == $objFormaPago->idFormaPago ? "in" : "") ?>" id="collapse-formapago-<?php echo $objFormaPago->idFormaPago ?>" role="tabpanel" aria-labelledby="heading-formapago-<?php echo $objFormaPago->idFormaPago ?>">
                    <div class="panel-body">
                        <div class="col-md-8 info-oficina">
                            <?php echo $form->labelEx($model, 'numeroTarjeta'); ?>
                            <?php echo $form->textField($model, 'numeroTarjeta', array('class' => 'form-control', 'placeholder' => '000000000000', 'maxlength' => 12)); ?>
                            <?php echo $form->error($model, 'numeroTarjeta', array('class'=>'text-danger')); ?>
                        </div>
                        <div class="col-md-4 info-oficina">
                            <?php echo $form->labelEx($model, 'cuotasTarjeta'); ?>
                            <?php echo $form->dropDownList($model, 'cuotasTarjeta', FormaPagoForm::listDataCuotas(), array('class' => 'form-control select', 'placeholder' => '0', 'style' => "border-radius:0px;")); ?>
                            <?php echo $form->error($model, 'cuotasTarjeta', array('class'=>'text-danger')); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

    <div class="panel panel-default ">
        <div class="panel-heading head-desplegable" role="tab" id="heading-formapago-datafono">
            <h4 class="panel-title">
                <a class="<?php echo (in_array($model->idFormaPago, Yii::app()->params->formaPago['tarjetasDatafono']) ? "" : "collapsed") ?>" data-toggle="collapse" data-parent="#accordion-formaPago" href="#collapse-formapago-datafono" aria-expanded="<?php echo (in_array($model->idFormaPago, Yii::app()->params->formaPago['tarjetasDatafono']) ? "true" : "false") ?>" aria-controls="collapse-formapago-datafono">
                    Datáfono
                </a>
            </h4>
        </div>
        <div id="collapse-formapago-datafono" class="panel-collapse collapse <?php echo ( in_array($model->idFormaPago, Yii::app()->params->formaPago['tarjetasDatafono']) ? "in" : "" ) ?>" role="tabpanel" aria-labelledby="heading-formapago-datafono">
            <div class="panel-body">
                <?php foreach ($listDatafono as $idx => $objFormaPago): ?>
                    <div>
                        <input class="float-left" type="radio" data-credirebaja="<?php echo $objFormaPago->idFormaPago == Yii::app()->params->formaPago['idCredirebaja'] ? "1" : "0" ?>" name="<?php echo $modelClass ?>[idFormaPago]" id="<?php echo $modelClass ?>_idFormaPago_<?php echo $objFormaPago->idFormaPago ?>" value="<?php echo $objFormaPago->idFormaPago ?>" <?php echo ($model->idFormaPago == $objFormaPago->idFormaPago ? "checked" : "") ?>>
                        <label for="<?php echo $modelClass ?>_idFormaPago_<?php echo $objFormaPago->idFormaPago ?>"><?php echo $objFormaPago->formaPago ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php echo $form->error($model, 'idFormaPago', array('class'=>'text-danger')); ?>
